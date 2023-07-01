<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->paginate(5);
        return view('departments.index',compact('departments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function store(Request $request)
    {
        $request->validate([
            'departmentname' => 'required'
        ]);
        Department::create($request->all());
        return redirect()->route('departments.index')
                        ->with('success','Department created successfully.');
    }
    public function edit(Department $department)
    {
        return view('departments.edit',compact('department'));
    }
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'departmentname' => 'required',
        ]);
        $department->update($request->all());
    
        return redirect()->route('departments.index')
                        ->with('success','Department updated successfully');
    }
}
