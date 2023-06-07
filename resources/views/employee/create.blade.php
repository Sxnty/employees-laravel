<form action="{{url('/employee')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('employee.form')
</form>
