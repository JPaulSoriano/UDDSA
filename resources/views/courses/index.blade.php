@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif
<form action="{{ route('departments.courses.store', $department)}}" method="POST">
    @csrf
    <div class="row my-2">
        <div class="col-sm-6 my-1">
            <div class="form-group">
                <input type="text" name="coursename" class="form-control" placeholder="Course Name">
            </div>
        </div>
        <div class="col-sm-6 my-1">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
<h6>{{ $department->departmentname }} Department Courses</h6>
<table class="table table-bordered">
    <tr>
        <th>Name</th>
    </tr>
    @foreach ($department->courses as $course)
    <tr>
        <td>{{ $course->coursename }}</td>
    </tr>
    @endforeach
</table>
@endsection