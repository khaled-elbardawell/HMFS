<?php

namespace Modules\Reservations\Http\Controllers;

use App\Models\Admin\UserOrganization;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Reservations\Entities\Reservation;
use Modules\Reservations\Http\Requests\ReservationsRequest;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $reservations = Reservation::where("organization_id",session()->get('organization_id'))->page();
        $start_counter = Reservation::getStartCounter();
        return view('reservations::index',compact('reservations','start_counter'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('reservations::create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function store(ReservationsRequest $request)
    {
        try{
            Reservation::create([
                'user_id'          => $request->user_id,
                'doctor_id'        => $request->doctor_id,
                'organization_id'  => session()->get('organization_id'),
                'reservation_date' => $request->reservation_date,
                'reservation_time' => $request->reservation_time,
                'status'          => $request->has('status') ? 1 : 0,
            ]);

               return redirect(route('reservations.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
                return redirect(route('reservations.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method




    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $reservation = Reservation::whereId($id)->first();
        if (!$reservation){  abort(404); }

        // get users
        $sql = "SELECT users.id,users.email,users.name FROM user_organizations
                        INNER JOIN users ON users.id = user_organizations.user_id
                        WHERE user_organizations.organization_id = ?";
        $users = UserOrganization::sqlGet($sql,[session()->get('organization_id')]);

        // get doctors
        $sql = "SELECT users.id,users.email,users.name FROM user_organizations
                INNER JOIN users ON users.id = user_organizations.user_id
                INNER JOIN user_roles ON users.id = user_roles.user_id
                INNER JOIN roles ON roles.id = user_roles.role_id
                WHERE user_organizations.organization_id = ? AND roles.role_type_id = 3";
        $doctors = UserOrganization::sqlGet($sql,[session()->get('organization_id')]);

        return view('reservations::edit',compact('reservation','users','doctors'));
    }// end method



    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ReservationsRequest $request, $id)
    {
        try{
            Reservation::whereId($id)->where('organization_id',session()->get('organization_id'))->update([
                'user_id'          => $request->user_id,
                'doctor_id'        => $request->doctor_id,
                'reservation_date' => $request->reservation_date,
                'reservation_time' => $request->reservation_time,
                'status'=> $request->has('status') ? 1 : 0
            ]);

            return redirect(route('reservations.edit',$id))->with(['alert' => true,'status' => 'success', 'message' => 'Updated successfully']);
        }catch (\Exception $e){
            return redirect(route('reservations.edit',$id))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method



    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            Reservation::whereId($id)->where("organization_id",session()->get('organization_id'))->delete();
            return redirect(route('reservations.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
        }catch (\Exception $e){
            return redirect(route('reservations.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method



    /**
     * Select2 search user By AJAX In Create page
     * @param Request $request
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function users_search(Request $request){
        $query = $request->q;
        if (!$query){
            abort(404);
        }

        $sql = "SELECT users.id,users.email,users.name FROM user_organizations
                        INNER JOIN users ON users.id = user_organizations.user_id
                        WHERE user_organizations.organization_id = ?
                        AND (users.name LIKE ? or users.email LIKE ?)";
        $users = UserOrganization::sqlGet($sql,[session()->get('organization_id'),'%'.$query.'%','%'.$query.'%']);
        return $users;
    }// end method



    /**
     * Select2 search doctor By AJAX In Create page
     * @param Request $request
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function doctors_search(Request $request){
        $query = $request->q;
        if (!$query){
            abort(404);
        }

        $sql = "SELECT users.id,users.email,users.name FROM user_organizations
                INNER JOIN users ON users.id = user_organizations.user_id
                INNER JOIN user_roles ON users.id = user_roles.user_id
                INNER JOIN roles ON roles.id = user_roles.role_id
                WHERE user_organizations.organization_id = ? AND roles.role_type_id = 3
                AND (users.name LIKE ? or users.email LIKE ?)";
        $doctors = UserOrganization::sqlGet($sql,[session()->get('organization_id'),'%'.$query.'%','%'.$query.'%']);
        return $doctors;
    }// end method


}// end class
