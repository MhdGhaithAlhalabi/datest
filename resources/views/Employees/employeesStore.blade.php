@extends('layouts.master')
@section('title')
    employee store
@endsection
@section('page_name')
    employee store
@endsection
@section('second_directory')
    employee store
@endsection
@section('first_directory')
    employees
@endsection
@section('content')
    <div class="container mt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">add employee</h3>
            </div>

            <div class="card-body">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="row">


                    <form action="{{route('employees.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">first name</label>
                            <label>
                                <input type="text" required name="first_name" value="{{old('first_name')}}" class="form-control" placeholder="first name">
                            </label>
                            @if($errors->has('first_name'))
                                <div class="alert alert-danger">{{ $errors->first('first_name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="last_name">last name</label>
                            <label>
                                <input type="text" required name="last_name"  value="{{old('last_name')}}" class="form-control" placeholder="last name">
                            </label>
                            @if($errors->has('last_name'))
                                <div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <label for="company">company</label>
                            <label>
                                <select class="form-control" name="company_id" aria-label="Default select example">
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
                                <input type="email" value="{{old('email')}}"  name="email" class="form-control" placeholder="email">
                            </label>
                            @if($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone_number">phone number</label>
                            <label>
                                <input type="text" value="{{old('phone_number')}}" name="phone_number" class="form-control" placeholder="phone_number">
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



