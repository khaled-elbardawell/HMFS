<?php

namespace Modules\Role\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Role\Entities\Permission;
use Modules\Role\Entities\Role;
use Modules\Role\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $roles = Role::with(['permissions'])->page();
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
     * @param Request $request
     * @return Renderable
     */
    public function store(RoleRequest $request)
    {
        try {
            $role = Role::create([
                'name' => $request->name,
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
        $role = Role::whereId($id)->with(['permissions'])->first();
        $permissions = Permission::all();
        if (!$role){
            abort(404);
        }

        return view('role::edit',compact('role','permissions'));
    }// end method

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(RoleRequest $request, $id)
    {
        $role = Role::whereId($id)->first();
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
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
             Role::whereId($id)->delete();
            return redirect(route('role.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
        }catch (\Exception $e){
            return redirect(route('role.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method
}
