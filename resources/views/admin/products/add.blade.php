@extends('app')
@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Add Product
        </h2>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('admin.store.product') }}" method="post" enctype="multipart/form-data">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Product Name
                    </span>
                    <input name="name" type="text"
                        class="block w-full mt-1 text-sm @error('name') border-red-600 @enderror dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline-red form-input"
                        placeholder="Enter Product Name" />
                    @error('name')
                        <span class="text-xs text-red-600 dark:text-red-400">
                           {{$message}}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Product Price
                    </span>
                    <input name="price" type="number"
                        class="block w-full mt-1 text-sm @error('name') border-red-600 @enderror dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline-red form-input"
                        placeholder="Enter Product Price" />
                    @error('price')
                        <span class="text-xs text-red-600 dark:text-red-400">
                          {{$message}}
                        </span>
                    @enderror
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Message</span>
                    <textarea
                      class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      rows="3" placeholder="Enter some long form content."></textarea>
                  </label>
            </form>

        </div>
    </div>
@endsection
