<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DepartmentRequest;
use App\Models\Admin\Department;


class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:departments.index' , ['only' => ['index']]);
        $this->middleware('can:departments.create', ['only' => ['create','store']]);
        $this->middleware('can:departments.edit'  , ['only' => ['edit','update']]);
        $this->middleware('can:departments.delete', ['only' => ['destroy']]);
    }



    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $departments = Department::page();
        $start_counter = Department::getStartCounter();
        return view('admin.Departments.index',compact('departments','start_counter'));
    }// end method





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.Departments.create');
    }// end method




    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(DepartmentRequest $request)
    {
        try{
           Department::create(['name' => $request->name,'description'=> $request->description,'organization_id' => session('organization_id') ]);
          return redirect(route('departments.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
             return redirect(route('departments.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }

    }// end method




    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Department $department)
    {
        return view('admin.Departments.edit',compact('department'));
    }// end method




    /**
     *  Update the specified resource in storage.
     *
     * @param DepartmentRequest $request
     * @param Department $department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(DepartmentRequest $request,Department $department)
    {
        try {
           Department::whereId($department->id)->update([
                'name'       => $request->name,
                'description'=> $request->description,
            ]);
            return redirect(route('departments.edit',$department->id))->with(['alert' => true,'status' => 'success', 'message' => 'Updated successfully']);
        }catch (\Exception $e){
            return redirect(route('departments.edit',$department->id))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method





    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Department $department)
    {
        try {
            $department->delete();
            return redirect(route('departments.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
        }catch (\Exception $e){
            return redirect(route('departments.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method


}// end class
