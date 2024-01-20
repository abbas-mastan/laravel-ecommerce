<!DOCTYPE html>
<x-head-section/>
<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        @include('partials.Sidebar')
        <div class="flex flex-col flex-1 w-full">
            @include('partials.Navbar')
            <main class="h-full overflow-y-auto">
                @if (Session::has('message'))
                    <div id="alert" class="flex items-center mx-6 mt-3 justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                        >
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span>{{ Session::get('message') }}</span>
                        </div>
                        <span class="cursor-pointer" id="close">x</span>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
    <script src="{{asset('ckeditor.js')}}"></script>
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

        const close = document.getElementById('close');
        const alert = document.getElementById('alert');
close.addEventListener('click', () => {
  alert.remove();
});
</script>
    @yield('footer')
</body>
</html>
