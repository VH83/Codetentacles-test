@extends('layout.base')
@section('title', 'Verification')
@section('content')
    <div class="flex items-center justify-center my-4">
        <div class="w-full max-w-md mx-4 lg:mx-auto">
            <div class="bg-white shadow-md rounded-lg p-8">
                <h1 class="text-center mb-6 text-2xl font-bold">Verification</h1>

                <form id="demo-form" action="{{ route('verify-otp', $user) }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="otp" class="block text-gray-700 text-sm font-medium mb-2">Verification OTP</label>
                        <input type="text" name="otp" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter verification OTP">
                    </div>

                    <div class="my-6">
                        <button class=" w-full bg-primary text-white border border-primary hover:text-primary py-2 px-4 rounded hover:bg-white focus:outline-none focus:bg-blue-600">Verify
                        </button>
                    </div>
                </form>

                <div class="flex items-center justify-center mt-4">
                    <p class="text-sm text-gray-600">
                        Didn't receive an OTP?
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-700">Resend Verification OTP</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
