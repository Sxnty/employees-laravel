@extends('layouts.app')
<main class="w-25 m-auto h-100 d-flex justify-content-center flex-column m-auto">
    <section class="heading d-flex align-items-center">
        <img src="{{ asset('storage') . '/' . $employee->photo }}" alt="" style="width: 8rem" class="rounded">
        <div class="heading__text d-flex flex-column align-items-center">
            <h2 class="mx-2">{{ $employee->firstname }} {{ $employee->surname }}</h2>
            <p class="mx-2 my-0">Identificator: {{ $employee->id }}</p>
        </div>
    </section>
    <section class="employee__info mt-5">
        <h3>Contact info</h3>
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item align-items-center d-flex">
                <span class="mt-0">Email: {{ $employee->email }}</span>
            </li>
            <li class="list-group-item align-items-center d-flex">
                <span class="mt-0">Phone Number: {{ $employee->phoneNumber }}</span>
            </li>
            <li class="list-group-item align-items-center d-flex">
                <span class="mt-0">Address: {{ $employee->address }}</span>
            </li>
        </ul>
        <h3 class="my-2">Extra information</h3>
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item align-items-center d-flex">
                <span class="mt-0">Salary: {{ $employee->salary }}</span>
            </li>
            <li class="list-group-item align-items-center d-flex">
                <span class="mt-0">Joined at: {{ $employee->created_at }}</span>
            </li>
        </ul>
        <ul class="list-group list-group-horizontal my-2">
            <li class="list-group-item align-items-center d-flex w-100">
                <span class="mt-0">Note: {{ $employee->employeeNote }}</span>
            </li>
        </ul>
        <a href="{{ url('/employee/' . $employee->id . '/edit') }}" class="btn btn-primary my-2">Edit</a>

        <a href="{{ url('/employee') }}" class="btn btn-secondary my-2">Go Back</a>

    </section>
</main>
