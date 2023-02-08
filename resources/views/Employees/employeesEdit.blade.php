@extends('layouts.master')
@section('title')
    employee edit
@endsection
@section('css')

@endsection
@section('page_name')
    employee edit
@endsection
@section('second_directory')
    employee edit
@endsection
@section('first_directory')
    employees
@endsection
@section('content')
    <div class="container mt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">edit employee</h3>
            </div>

            <div class="card-body">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="row">
                    <form action="{{route('employees.update',$employee->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="first_name">first name</label>
                            <label>
                                <input type="text" required name="first_name" value="{{$employee->first_name}}" class="form-control" placeholder="first name">
                            </label>
                            @if($errors->has('first_name'))
                                <div class="alert alert-danger">{{ $errors->first('first_name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="last_name">last name</label>
                            <label>
                                <input type="text" value="{{$employee->last_name}}" required name="last_name" class="form-control" placeholder="last name">
                            </label>
                            @if($errors->has('last_name'))
                                <div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <label for="company">company</label>
                            <label>
                                <select class="form-control"  name="company_id" aria-label="Default select example">
                                    <option  value="{{$employee->company->id}}">{{$employee->company->name}}</option>
                                    @foreach($companies as $company)
                                        <option  value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </label>
                            @if($errors->has('company_id'))
                                <div class="alert alert-danger">{{ $errors->first('company_id') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <label>
                                <input type="email" value="{{$employee->email}}" name="email" class="form-control" placeholder="email">
                            </label>
                            @if($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone_number">phone number</label>
                            <label>
                                <input type="text" value="{{$employee->phone_number}}" name="phone_number" class="form-control" placeholder="phone_number">
                            </label>
                            @if($errors->has('phone_number'))
                                <div class="alert alert-danger">{{ $errors->first('phone_number') }}</div>
                            @endif
                        </div>
                        <button type="submit" style="margin-block: 2px" class="btn btn-success btn-block">submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')

@endsection


