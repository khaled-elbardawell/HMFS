<?php

namespace Modules\Role\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Role\Entities\Permission;
use Modules\Role\Entities\Role;
use Modules\Role\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:role.index' , ['only' => ['index']]);
        $this->middleware('can:role.create', ['only' => ['create','store']]);
        $this->middleware('can:role.edit'  , ['only' => ['edit','update']]);
        $this->middleware('can:role.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $roles = Role::where('id','!=',1)->where("organization_id",session()->get('organization_id'))->with(['permissions'])->page();
        $start_counter = Role::getStartCounter();
        return view('role::index',compact('roles','start_counter'));
    }// end method

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('role::create',compact('permissions'));
    }// end method



    /**
     * Store a newly created resource in storage.
     * @param RoleRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function store(RoleRequest $request)
    {
        try {
            $role = Role::create([
                'name' => $request->name,
                "organization_id" => session()->get('organization_id')
            ]);

            $role->permissions()->sync($request->permissions??[]);

            return redirect(route('role.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
            return redirect(route('role.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }

    }// end method



    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $role = Role::whereId($id)->where("id",'!=',1)->where(function ($q){
            // All Actions => 3 | just edit => 2 | just delete => 1 | Prevent All Actions => 0
            $q->where('status',3)->orWhere('status',2);
        })->where("organization_id",session()->get('organization_id'))
        ->with(['permissions'])->first();
        if (!$role){
            abort(404);
        }
        $permissions = Permission::all();
        return view('role::edit',compact('role','permissions'));
    }// end method



    /**
     * Update the specified resource in storage.
     *
     * @param RoleRequest $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function update(RoleRequest $request, $id)
    {
        $role = Role::whereId($id)->where("id",'!=',1)->where(function ($q){
                    // All Actions => 3 | just edit => 2 | just delete => 1 | Prevent All Actions => 0
                    $q->where('status',3)->orWhere('status',2);
                })->where("organization_id",session()->get('organization_id'))
                ->first();
        if (!$role){
            abort(404);
        }

        try {
             $role->update([
                'name' => $request->name,
            ]);

            $role->permissions()->sync($request->permissions??[]);

            return redirect(route('role.edit',$id))->with(['alert' => true,'status' => 'success', 'message' => 'Updated successfully']);
        }catch (\Exception $e){
            return redirect(route('role.edit',$id))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }

    }// end method



    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function destroy($id)
    {
        try {
             Role::whereId($id)->where("id",'!=',1)
                 ->where(function ($q){
                    // All Actions => 3 | just edit => 2 | just delete => 1 | Prevent All Actions => 0
                      $q->where('status',3)->orWhere('status',1);
                 })
                 ->where("organization_id",session()->get('organization_id'))
                 ->delete();
            return redirect(route('role.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
        }catch (\Exception $e){
            return redirect(route('role.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method
}
