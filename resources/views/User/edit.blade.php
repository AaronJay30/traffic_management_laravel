@include('partials.__header')

@php
    $array = array('sidebar' => 'False');
@endphp

<x-nav :data="$array"/>


<header class="max-w-lg mx-auto mt-10">
        <h1 class="text-4xl font-bold text-gray-800 text-center">Edit {{ $user->name}}</h1>
</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
    <section class="mt-10">
        <form action="/user/{{$user->id}}" method="POST" class="flex flex-col">
            @csrf   
            @method('PUT')
                <div class="mb-6 pt-3 rounded bg-gray-200 ">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Name</label>
                    <input type="text" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3 pb-2" name="name" autocomplete="off" value="{{ $user->name}}">
                    
                    @error('name')
                        <p class="text-red-500 text-xs p-1 bg-white">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200 ">
                    <label for="role" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Role</label>
                    <select class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3 pb-2" name="role">
                        <option value="" {{ $user->role == "" ? 'selected' : ''}}></option>
                        <option value="Client" {{ $user->role == "Client" ? 'selected' : ''}}>Client</option>
                        <option value="Staff" {{ $user->role == "Staff" ? 'selected' : ''}}>Staff</option>
                        <option value="Admin" {{ $user->role == "Admin" ? 'selected' : ''}}>Admin</option>
                        <option value="Developer" {{ $user->role == "Developer" ? 'selected' : ''}}>Developer</option>
                    </select>
                    @error('gender')
                        <p class="text-red-500 text-xs p-1 bg-white">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200 ">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                    <input disabled type="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3 pb-2" name="email" autocomplete="off" value={{ $user->email}}>
                    
                    @error('email')
                        <p class="text-red-500 text-xs p-1 bg-white">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                
                <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transistion duration-200" type="submit">Update</button>
        </form>
    </section>
</main>
