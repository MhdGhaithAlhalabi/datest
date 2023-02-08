<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>daTest</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-image: url({{asset('assets/dist/img/welcomeCover.jpg')}})">
<div class="grid h-screen place-items-center">
    @auth()
        <a href="/dashboard" type="button" class="sm:rounded-lg  text-white text-4xl text-bold">you are logged in go to
            <b> Dashboard</b> </a>
        {{-- <form action="/logout" method="post">
             @csrf
             <button type="submit" class="sm:rounded-lg text-white text-4xl text-bold">Logout</button>
         </form>--}}
    @else
        <a href="/login" type="button" class="sm:rounded-lg  text-white text-4xl text-bold">Login</a>
    @endauth
</div>
