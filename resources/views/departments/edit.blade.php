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
<form action="{{ route('departments.update',$department->id) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label>Department Name:</label>
                <input type="text" name="departmentname" value="{{ $department->departmentname }}" class="form-control" placeholder="Department Name">
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection