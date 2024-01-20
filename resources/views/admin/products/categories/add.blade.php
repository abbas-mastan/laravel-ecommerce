@extends('app')
@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Add Category
        </h2>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('admin.store.category',$category->id) }}" method="post" >
                @csrf
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Category Name
                    </span>
                    <input name="name" type="text" value="{{old('name',$category->name)}}"
                        class="block w-full mt-1 text-sm @error('name') border-red-600 @enderror dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline-red form-input"
                        placeholder="Enter Category Name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </label>
                <label class="block text-sm mt-5">
                    <span class="text-gray-700 mb-3 dark:text-gray-400">
                        Category Description
                    </span>
                    <textarea name="description" id="editor" cols="30" rows="5">
                        {{$category->description}}
                    </textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </label>
                <button type="submit" class="mt-5 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Submit
            </button>
            </form>
        </div>
    </div>
@endsection
