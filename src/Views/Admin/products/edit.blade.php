@extends('layouts.master')

@section('title')
    Cập nhật sản phẩm
@endsection

@section('badges')
    @if (!empty($_SESSION['errors']))
        <ul>
            @foreach ($_SESSION['errors'] as $error)
            <li class="inline-block bg-red-100 text-red-800 text-sm font-medium mt-4 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">
                {{ $error }}
            </li>
            @endforeach
        </ul>

        @php
            unset($_SESSION['errors']);
        @endphp
    @endif
@endsection

@section('content')
    <form action="{{ url("admin/products/{$product['id']}/update") }}" enctype="multipart/form-data" method="POST" class="container max-w-screen-sm m-auto pt-4">
        <div class="grid place-items-center">
            <div class="w-24 h-24 rounded overflow-hidden border shadow-md">
                <img src="{{ asset($product['thumbnail']) }}" alt="" class="w-full h-full object-cover">
            </div>
            <input type="file" id="thumbnail" name="thumbnail" class="cursor-pointer hidden">
            <label for="thumbnail" class="cursor-pointer font-semibold block w-fit float-right px-6 py-1 mt-2 text-cyan-500 border-2 border-cyan-500 hover:bg-cyan-500 hover:text-white">
                Upload new thumbnail</label>
        </div>
        <div class="mb-4">
            <label for="category" class="block text-gray-700 text-base font-bold mb-2">Category Name</label>
            <select id="category" name="category_id" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
                @foreach ($categoryName as $id => $name)
                <option 
                    @if ($product['category_id'] == $id)
                        selected
                    @endif
                    value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-base font-bold mb-2">Product name</label>
            <input type="text" id="name" name="name" value="{{ $product['name'] }}" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-base font-bold mb-2">Product price</label>
            <input type="number" id="price" name="price" value="{{ $product['price'] }}" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-base font-bold mb-2">Product description</label>
            <textarea id="description" name="description" rows="4" cols="50" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">{{ $product['description'] }}</textarea>
        </div>
    
        <button type="submit" class="font-semibold w-full px-6 py-2 my-2 text-white border-2 border-green-500 bg-green-500 hover:bg-white hover:text-green-500">
            Update
        </button>
    </form>
@endsection