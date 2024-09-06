@extends('layout.base')
@section('title', 'Login')

@section('content')
    <div class="my-4">
        <div class=" bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-screen-lg p-8">
            <h1 class="text-2xl my-5 ">Please login and see the products</h1>

            <a href="{{ route('login') }}" class="border px-6 py-2 text-center">Login Here</a>
        </div>
    </div>
@endsection
