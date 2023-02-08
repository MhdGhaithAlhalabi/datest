@extends('layouts.master')
@section('title')
    dashboard
@endsection
@section('page_name')
    dashboard
@endsection
@section('second_directory')
    dashboard
@endsection
@section('first_directory')
    dashboard
@endsection
@section('content')
    <div class="container">
        welcome back <b>{{auth()->user()->name}}</b>
    </div>
@endsection

