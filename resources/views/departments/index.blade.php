@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <label>Whoops!</label> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<form action="{{ route('departments.store') }}" method="POST">
    @csrf
    <div class="row my-2">
        <div class="col-sm-6 my-1">
            <input type="text" name="departmentname" class="form-control" placeholder="Department Name">
        </div>
        <div class="col-sm-6 my-1">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Department Name</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($departments as $department)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $department->departmentname }}</td>
        <td>
            <a class="btn btn-secondary" href="{{ route('departments.edit',$department->id) }}">Edit</a>
            <a class="btn btn-primary" href="{{ route('departments.courses.index', $department) }}">Courses</a>
        </td>
    </tr>
    @endforeach
</table>
{!! $departments->links() !!}
@endsection
