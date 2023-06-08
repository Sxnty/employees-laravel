<div class="form-group">
    <label for="firstname">Name</label>
    <input class="form-control" placeholder="Enter name" type="text" name="firstname" id=""
        value="{{ isset($employee) ? $employee->firstname : '' }}" />
</div>

<div class="form-group">
    <label for="surname">Surname</label>
    <input class="form-control" placeholder="Enter Surname" type="text" name="surname" id=""
        value="{{ isset($employee) ? $employee->surname : '' }}" />
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" placeholder="Enter email" type="email" name="email" id=""
        value="{{ isset($employee) ? $employee->email : '' }}" />
</div>

<div class="form-group">
    <label for="phoneNumber">Phone Number</label>
    <input class="form-control" placeholder="Enter phone number" type="number" name="phoneNumber" id=""
        value="{{ isset($employee) ? $employee->phoneNumber : '' }}" />
</div>

<div class="form-group">
    <label for="photo">Photo</label>
    <input class="form-control" type="file" name="photo" id=""
        value="{{ isset($employee) ? $employee->photo : '' }}" />
</div>
<div class="d-flex w-100  align-items-center">
    <input type="submit" value="{{$mode}} employee" class="btn btn-primary mt-5 ">
    <a href="{{ url('/employee') }}" class="btn btn-secondary d-flex align-items-center justify-content-center mt-5 mx-5 ">Go Back</a>
</div>
