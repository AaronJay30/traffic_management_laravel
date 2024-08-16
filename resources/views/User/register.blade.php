@include('partials.__header')

@php
    $array = array('sidebar' => 'False');
@endphp

<x-nav :data="$array"/>

    <main class="flex flex-col lg:flex-row w-full relative">

        <section class=" lg:block hidden ml-40 mt-28 mr-10 w-2/3 opacity-40">
            <img src='{{ asset('img/logo1.png') }}' class="">
        </section>
        
        <section class=" lg:w-full mx-20 mt-10 ">
            
            <form action="/store" method="POST" class="flex flex-col bg-white px-10 py-10 h-auto rounded-xl drop-shadow-lg">
                @csrf   
                <h1 class="text-4xl font-bold text-green-600 text-center mb-5">REGISTER</h1>

                <div class="mb-6 pt-3 rounded bg-gray-200 ">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Name</label>
                    <input type="text" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3 pb-2" name="name" autocomplete="off" value="{{old('name')}}">
                    
                    @error('name')
                        <p class="text-red-500 text-xs p-1 bg-white">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200 ">
                    <label for="role" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Role</label>
                    <select class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3 pb-2" name="role">
                        <option value="" {{old('role') == "" ? 'selected' : ''}} disabled hidden class="text-gray-400">Select your role</option>
                        <option value="Client" {{old('role') == "Client" ? 'selected' : ''}}>Client</option>
                        <option value="Barangay Official" {{old('role') == "Barangay Official" ? 'selected' : ''}}>Barangay Official</option>
                        <option value="Admin" {{old('role') == "Admin" ? 'selected' : ''}}>Admin</option>
                    </select>
                    @error('gender')
                        <p class="text-red-500 text-xs p-1 bg-white">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200 ">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                    <input type="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3 pb-2" name="email" autocomplete="off" value={{old('email')}}>
                    
                    @error('email')
                        <p class="text-red-500 text-xs p-1 bg-white">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                
                <div class="mb-6 pt-3 rounded bg-gray-200 ">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
                    <input type="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3 pb-2" name="password" autocomplete="off">

                    @error('password')
                        <p class="text-red-500 text-xs p-1 bg-white">
                            {{$message}}
                        </p>
                    @enderror
                    
                </div>
                
                <div class="mb-6 pt-3 rounded bg-gray-200 ">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Confirm Password</label>
                    <input type="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3 pb-2" name="password_confirmation" autocomplete="off">

                    @error('password_confirmation')
                        <p class="text-red-500 text-xs p-1 bg-white">
                            {{$message}}
                        </p>
                    @enderror

                </div>
                
                <h4 class="pb-4">Already have an account? <a href="/login" class="text-green-500 hover:text-green-700">Sign in</a></h4>
                <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transistion duration-200" type="submit">Register</button>
            </form>
        </section>
        

    </main>

    <x-footer/>

@include('partials.__footer')

