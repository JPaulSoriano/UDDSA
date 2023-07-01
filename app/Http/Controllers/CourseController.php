<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Department $department)
    {
        return view('courses.index', compact('department'));
    }
    public function store(Request $request, Department $department)
    {
        $request->validate([
            'coursename' => 'required'
        ]);
        $department->courses()->create($request->all());
        return redirect()->route('departments.courses.index', $department)
                        ->with('success','Course created successfully.');
    }
}
