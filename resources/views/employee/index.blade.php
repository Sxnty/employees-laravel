@extends('layouts.app')



    <main class="m-5" d-flex>
        @if (session('message'))
            <div class="alert alert-success" role="alert w-100">
                {{ session('message') }}
            </div>
        @endif
        <div class="d-flex align-items-center justify-content-between flex-column">
            <div class="d-flex align-items-center justify-content-between w-100">
                <h1 class="my-5">Employees list</h1>
                <form action="{{ url('/employee/create') }}" method="GET">
                    <button type="submit" class="btn btn-primary mx-1">Add employee</button>
                </form>
            </div>

        </div>
        <table class="table table-light ">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th> <i class="bi bi-camera-fill"></i> Photo</th>
                    <th> <i class="bi bi-person-fill"></i> Name</th>
                    <th> <i class="bi bi-person-fill"></i> Surname</th>
                    <th> <i class="bi bi-envelope-fill"></i> Email</th>
                    <th> <i class="bi bi-telephone-fill"></i> Phone Number</th>
                    <th> <i class="bi bi-arrow-down-circle-fill"></i> Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employees as $employee)
                    <tr d-flex class="align-items-center">
                        
                        <td>
                            <a href="{{ url('/employee/' . $employee->id) }}">{{ $employee->id }}</a></td>
                        <td>
                            <img src="{{ asset('storage') . '/' . $employee->photo }}" alt=""
                                style="width: 8rem" class="rounded">
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
