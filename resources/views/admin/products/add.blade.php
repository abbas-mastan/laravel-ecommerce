@extends('app')
@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Add Product
        </h2>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('admin.store.product',$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Product Name
                    </span>
                    <input name="name" value="{{ old('name', $product->name) }}" type="text"
                        class="block w-full mt-1 text-sm @error('name') border-red-600 @enderror dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline-red form-input"
                        placeholder="Enter Product Name" />
                    @error('name')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="mt-4 block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Product Price
                    </span>
                    <input name="price" value="{{ old('price', $product->price) }}" type="number"
                        class="block w-full mt-1 text-sm @error('price') border-red-600 @enderror dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline-red form-input"
                        placeholder="Enter Product Price" />
                    @error('price')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Category
                    </span>
                    <select name="category"
                        class="block w-full mt-1 text-sm @error('category') border-red-600 @enderror dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline-red form-input">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option {{ old('category', $product->category_id) == $category->id ? 'selected' : '' }}
                                value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Product Image
                    </span>
                    <input type="hidden" name="update" value="{{$product->id ? 'yes':'no'}}">
                    <input name="image" type="file"
                        class="block w-full mt-1 text-sm @error('image') border-red-600 @enderror dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline-red form-input" />
                    @error('image')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                @if ($product->id)
                    <img class="w-40 mt-4" src="{{ asset('storage/products/'.$product->image) }}" alt="">
                @endif
                <div class="mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Gender
                    </span>
                    <div class="mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="radio"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="gender" value="men" {{ $product->gender == 'men' ? 'checked' : '' }}>
                            <span class="ml-2">Men's</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="gender" value="women" {{ $product->gender == 'women' ? 'checked' : '' }}>
                            <span class="ml-2">Women's</span>
                        </label>
                    </div>
                    @error('gender')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Description</span>
                    <textarea name="description"
                        class="block w-full mt-1 text-sm @error('description') border-red-600 @enderror dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline-red form-input"
                        rows="3" placeholder="Enter Description here.">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    </label>
                @enderror
                <button type="submit"
                    class="mt-5 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection
