@extends('layout.base')

@section('title', 'Create Product')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-semibold mb-6 text-gray-800">Create New Product</h1>
        
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Product Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Product Name:</label>
                <input type="text" id="name" name="name" required
                    class="mt-1 block w-full border py-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                
            </div>
            
            <!-- Amount -->
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount:</label>
                <input type="number" id="amount" name="amount" required
                    class="mt-1 block w-full border py-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            
            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea id="description" name="description" rows="4" 
                    class="mt-1 block w-full border py-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
            </div>
            
            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" 
                    class="mt-1 block border py-2 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
               
            </div>
            
            <div>
                <button type="submit" 
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Product
                </button>
            </div>
        </form>
    </div>
@endsection
