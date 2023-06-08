@extends('layouts.app')
@section('content')
<main class="w-50 h-100 d-flex align-items-center justify-content-center flex-column m-auto">
    <h1>Edit Employee Data</h1>
<form action="{{url('employee/'.$employee->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    @include('employee.form', ['mode'=>'Edit'])
</form>

</main>
@endsection