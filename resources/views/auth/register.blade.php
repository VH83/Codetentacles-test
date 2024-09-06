@extends('layout.base')
@section('title', 'Register')

@section('content')
    <div class=" flex items-center justify-center bg-gray-50 py-4 lg:min-h-screen px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full shadow rounded p-4 ">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Create an account
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{route('register')}}" method="POST" id="demo-form">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" name="name" type="text" autocomplete="name" required class=" w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary focus:border-primary my-2 sm:text-sm" placeholder="Enter your full name">
                    </div>
                    
                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" autocomplete="email" required class=" w-full px-3 py-2 border rounded border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-primary focus:border-primary my-2 sm:text-sm" placeholder="Email address">
                    </div>

                    <div>
                        <label for="phone" class="sr-only">Phone Number</label>
                        <input id="text" name="phone" type="phone" autocomplete="phone" required class=" w-full px-3 py-2 border rounded border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-primary focus:border-primary my-2 sm:text-sm" placeholder="phone number" required>
                    </div>

                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="new-password" required class=" w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary focus:border-primary my-2 sm:text-sm" placeholder="Password">
                    </div>
                    <div>
                        <label for="conform_password" class="sr-only">Password</label>
                        <input id="conform_password" name="conform_password" type="password" autocomplete="conform_password" required class=" w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary focus:border-primary my-2 sm:text-sm" placeholder="conform password">
                    </div>
                </div>

                <div>
                    <button class=" relative w-full flex justify-center py-2 px-4 border-2 border-black border-transparent text-sm font-medium rounded-md  bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                       
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
