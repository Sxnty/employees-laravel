<form action="{{url('employee/'.$employee->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    @include('employee.form')
</form>
