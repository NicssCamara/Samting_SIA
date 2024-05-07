@extends('layouts.user')
 
@section('title', 'Profile Settings')
 
@section('contents')
<body class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-gradient-to-b from-blue-500 to-sky-500">





    <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">

        <!--Main Col-->
        <div id="profile"
            class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-70 mx-6 lg:mx-0">


            <div class="p-2 md:p-10 text-center lg:text-left">
                <!-- Image for mobile view-->
                <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center"
                    style="background-image: url('https://source.unsplash.com/MP0IUfwrn0A')"></div>

                    <h1 class="text-3xl font-bold pt-8 lg:pt-0">{{ auth()->user()->name }}</h1>
                <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div>
                <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">
    <svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path
            d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
    </svg> Email: {{ auth()->user()->email }}
</p>



                <!-- Use https://simpleicons.org/ to find the svg for your preferred product -->

            </div>

        </div>

        <!--Img Col-->
        <div class="w-full lg:w-2/5">
    <!-- Big profile image for side bar (desktop) -->
    <img src="https://i.pinimg.com/originals/55/e9/50/55e950e30613adfc993e7baf305a8b40.jpg" class="w-64 h-64 object-cover rounded-md">
    <!-- Image from: http://unsplash.com/photos/MP0IUfwrn0A -->


</body>

@endsection