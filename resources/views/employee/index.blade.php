<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>

<body>
    <main class="m-5">
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="my-5">Employees list</h1>
            <form action="{{ url('/employee/create') }}" method="GET">
                <button type="submit" class="btn btn-primary mx-1">Add employee</button>
            </form>
        </div>
        <table class="table table-light ">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employees as $employee)
                    <tr d-flex class="align-items-center">
                        <td>{{ $employee->id }}</td>
                        <td>
                            <img src="{{ asset('storage') . '/' . $employee->photo }}" alt="" style="width: 8rem" class="rounded">
                        </td>
                        <td>{{ $employee->firstname }}</td>
                        <td>{{ $employee->surname }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phoneNumber }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <form action="{{ url('/employee/' . $employee->id . '/edit') }}" method="GET">
                                        @csrf
                                        @method('PATCH')
                                        <input type="submit" value="Edit" class="btn btn-link ">
                                    </form>
                                    <form action="{{ url('/employee/' . $employee->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="Delete" class="btn btn-link">
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($employees->isEmpty())
            <div class="alert alert-danger d-flex align-items-center justify-content-between" role="alert">
                <p class="m-0">You dont have any employee.</p>
                <form action="{{ url('/employee/create') }}" method="GET">
                    <button type="submit" class="btn btn-success mx-1"><i class="bi bi-plus-circle"></i></button>
                </form>
            </div>
        @endif
    </main>
</body>

</html>
