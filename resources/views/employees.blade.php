@extends('layouts.master')
@section('title')
    employees
@endsection
@section('page_name')
    employees
@endsection
@section('second_directory')
    employees
@endsection
@section('first_directory')
    dashboard
@endsection
@section('content')
    <div class="container">
        <a href="employees/create" class="btn btn-primary">add new employee</a>
        <table class="table table-striped table-responsive">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">first_name</th>
                <th scope="col" width="15%">last_name</th>
                <th scope="col" width="20%">Email</th>
                <th scope="col" width="10%">company</th>
                <th scope="col" width="10%">phone_number</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{ $employee->id }}</th>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->company->name}}</td>
                    <td>{{ $employee->phone_number }}</td>
                    <td>
                        <a href="employees/{{$employee->id}}/edit" class="btn btn-primary">edit</a>
                        <form action="{{route('employees.destroy',$employee->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {!! $employees->links() !!}
        </div>
    </div>
@endsection



