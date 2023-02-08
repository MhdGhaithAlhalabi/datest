@extends('layouts.master')
@section('title')
    companies
@endsection
@section('page_name')
    companies
@endsection
@section('second_directory')
    companies
@endsection
@section('first_directory')
    dashboard
@endsection
@section('content')
    <div class="container mt-5">
        <a href="companies/create" class="btn btn-primary">add new company</a>

        <table class="table table-striped table-responsive">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col">Email</th>
                <th scope="col" width="10%">logo</th>
                <th scope="col" width="10%">website</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <th scope="row">{{ $company->id }}</th>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td> <img style="width: 400px;height: 200px" src="/storage/logos/{{ $company->logo }}"></td>
                    <td>{{ $company->website }}</td>
                    <td>
                        <div class="row">
                            <a href="companies/{{$company->id}}/edit" class="btn btn-primary">edit</a>
                            <form action="{{route('companies.destroy',$company->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {!! $companies->links() !!}
        </div>
    </div>
@endsection


