@extends('layout.base')

@section('title', 'Products')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <div class="flex justify-between">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Product List</h1>
            <div class="flex gap-2 my-auto">
                    
                <div class="my-auto">
                    @if (Auth::user(''))
                        <a href="{{ route('logout') }}" @class([
                            "bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline",
                            "bg-gray-500" => Route::is('logout')
                        ])>
                            <span>Logout</span>
                        </a>
                    @else
                        <a href="{{ route('/') }}" @class([
                            " bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline",
                            "bg-indigo-500" => Route::is('/')
                        ])>
                            <span>Login</span>
                        </a>
                    @endif
                </div>
                <a href="{{ route('product.create') }}" class="border px-6 my-4 py-2 rounded shadow-md">Add Product</a>

            </div>
        </div>
        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Products Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->amount }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="h-16 w-16 object-cover rounded">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('product.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
