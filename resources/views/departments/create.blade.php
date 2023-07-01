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
<form action="{{ route('departments.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label>Departmen Name:</label>
                <input type="text" name="departmentname" class="form-control" placeholder="Department Name">
            </div>
        </div>
        <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection