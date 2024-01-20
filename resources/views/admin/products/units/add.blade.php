@extends('app')
@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Add Unit
        </h2>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('admin.store.unit',$unit->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Unit Name
                    </span>
                    <input name="name" value="{{ old('name', $unit->name) }}" type="text"
                        class="block w-full mt-1 text-sm @error('name') border-red-600 @enderror dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline-red form-input"
                        placeholder="Enter Unit Name" />
                    @error('name')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
               
                <div class="mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Status
                    </span>
                    <div class="mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="radio"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="status" value="active" {{ old('status',$unit->status) == 'active' ? 'checked' : '' }}>
                            <span class="ml-2">Active</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="status" value="inactive" {{ old('status',$unit->status) == 'inactive' ? 'checked' : '' }}>
                            <span class="ml-2">Inactive</span>
                        </label>
                    </div>
                    @error('status')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <button type="submit"
                    class="mt-5 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection
