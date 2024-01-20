@extends('app')
@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Add Attribute
        </h2>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('admin.store.attribute',$attribute->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Attribute Name
                    </span>
                    <input name="name" value="{{ old('name', $attribute->name) }}" type="text"
                        class="block w-full mt-1 text-sm @error('name') border-red-600 @enderror dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline-red form-input"
                        placeholder="Enter Attribute Name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                   
                </label>
                <button type="submit"
                    class="mt-5 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection