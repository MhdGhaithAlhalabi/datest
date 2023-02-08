@extends('layouts.master')
@section('title')
    company store
@endsection
@section('page_name')
    company store
@endsection
@section('second_directory')
    company store
@endsection
@section('first_directory')
    companies
@endsection
@section('content')
    <div class="container mt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">add company</h3>
            </div>

            <div class="card-body">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="row">


                    <form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">name</label>
                            <label>
                                <input type="text" required name="name" class="form-control" placeholder="name">
                            </label>
                            @if($errors->has('name'))
                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <label>
                                <input type="email" name="email" class="form-control" placeholder="email">
                            </label>
                            @if($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="logo">logo</label>
                            <label>
                                <input type="file" class="form-control" name="logo">
                            </label>
                            @if($errors->has('logo'))
                                <div class="alert alert-danger">{{ $errors->first('logo') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="website">website</label>
                            <label>
                                <input type="text" name="website" class="form-control" placeholder="website">
                            </label>
                            @if($errors->has('website'))
                                <div class="alert alert-danger">{{ $errors->first('website') }}</div>
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


