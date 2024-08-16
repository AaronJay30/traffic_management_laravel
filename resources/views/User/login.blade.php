@include('partials.__header')

@php
    $array = array('sidebar' => 'False');
@endphp

<x-nav :data="$array"/>

    <main class="flex flex-col lg:flex-row w-full relative">

        <section class=" lg:block hidden ml-40 mt-28 mr-10 w-2/3 opacity-40">
            <img src='{{ asset('img/logo1.png') }}' class="">
        </section>
        
        <section class=" lg:w-full mx-20 mt-44 ">
            
            <form action="/login/process" method="POST" class="flex flex-col bg-white px-10 py-10 h-auto rounded-xl drop-shadow-lg">
                @csrf   

                <h1 class="text-4xl font-bold text-green-600 text-center mb-5">LOGIN</h1>
                <div class="mb-6 pt-3 rounded bg-gray-200 ">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                    <input type="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" name="email" value={{old('email')}}>
                           
                    @error('email')
                    <p class="text-red-500 text-xs p-1 bg-white">
                        {{$message}}
                    </p>
                    @enderror
                
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200 ">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
                    <input type="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" name="password">

                </div>
                <h4 class="pb-4 text-gray-500">Doesn't have an account? <a href="/register" class="text-green-500 hover:text-green-700">Sign up</a></h4>
                <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transistion duration-200" type="submit">Login</button>
            </form>
        </section>
        

    </main>

    <x-footer/>

@include('partials.__footer')

