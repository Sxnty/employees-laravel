<form action="{{url('/employee')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="firstname">Name</label>
    <input type="text" name="firstname" id="" />

    <label for="surname">Surname</label>
    <input type="text" name="surname" id="" />

    <label for="email">Email</label>
    <input type="email" name="email" id="" />

    <label for="phoneNumber">Phone Number</label>
    <input type="number" name="phoneNumber" id="" />

    <label for="photo">Photo</label>
    <input type="file" name="photo" id="" />

    <input type="submit" value="Add employee">
</form>
