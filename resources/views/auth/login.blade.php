@extends('layout.base')
@section('title', 'Login')

@section('content')
    <div class="my-4">
        <div class=" bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-screen-lg">
            <div class="w-full p-10 lg:p-24 lg:w-1/2 container mx-auto">
                <h2 class="text-2xl font-semibold text-gray-700">Sign in</h2>                    
                <div class="mt-4 flex items-center justify-between">
                    <span class="border-b w-1/5 lg:w-1/4"></span>
                    <span class="text-xs text-center text-gray-500 uppercase">or</span>
                    <span class="border-b w-1/2 lg:w-1/4"></span>
                </div>
                <form id="demo-form" class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="rounded-md shadow-sm">
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                            <input class="text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none placeholder:text-xs" name="email" type="email" id="email" placeholder="mail@simmmple.com"  required/>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                            <input class=" text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none placeholder:text-xs" type="password" id="password" name="password"  autocomplete="current-password" required placeholder="Min. 8 characters"/>
                        </div>
                       
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded">
                            <label for="remember-me" class="ml-2 block text-xs text-primary">
                                Remember me
                            </label>
                        </div>

                        <div class="text-xs">
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Forgot password?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button class=" group relative w-full flex justify-center py-2 px-4 border text-sm font-medium rounded-md  border-black    ">
                                Sign in
                        </button>
                    </div>
                </form>
                <div class="mt-4 flex ">
                    <span class="text-xs text-gray-500 ">Not registered yet? <a href="{{route('register')}}" class="text-indigo-600 hover:text-indigo-500">Create an Account</a></span>
                </div>
            </div>
        </div>
    </div>
@endsection
