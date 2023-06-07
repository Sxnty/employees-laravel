<label for="firstname">Name</label>
<input type="text" name="firstname" id="" value="{{ isset($employee) ? $employee->firstname : '' }}"/>

<label for="surname">Surname</label>
<input type="text" name="surname" id="" value="{{ isset($employee) ? $employee->surname : '' }}"/>

<label for="email">Email</label>
<input type="email" name="email" id="" value="{{ isset($employee) ? $employee->email : '' }}"/>

<label for="phoneNumber">Phone Number</label>
<input type="number" name="phoneNumber" id="" value="{{ isset($employee) ? $employee->phoneNumber : '' }}"/>

<label for="photo">Photo</label>
<input type="file" name="photo" id="" value="{{ isset($employee) ? $employee->photo : '' }}"/>

<input type="submit" value="Add employee">
