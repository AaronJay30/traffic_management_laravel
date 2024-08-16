@include('partials.__header')

@php
    $array = array('sidebar' => 'False');
@endphp

<x-nav :data="$array"/>


<header class="max-w-lg mx-auto mt-10">
        <h1 class="text-4xl font-bold text-gray-800 text-center">Add New Location</h1>
</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
    <section class="mt-10">
        <form action="/covid/add" method="POST" class="flex flex-col">
            @csrf   

            <div class="mb-6 pt-3 rounded bg-gray-200 ">
                <label for="location" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Location</label>
                <input type="text" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3 pb-2" name="location" autocomplete="off" value={{old('location')}}>
                @error('location')
                    <p class="text-red-500 text-xs p-1 bg-white">
                        {{$message}}
                    </p>
                @enderror
            </div>
            
            
            <div class="mb-6 pt-3 rounded bg-gray-200 ">
                <label for="recovered" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Recovered Patient</label>
                <input type="number" min="0" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3 pb-2" name="recovered" autocomplete="off" value={{old('recovered')}}>
                @error('recovered')
                    <p class="text-red-500 text-xs p-1 bg-white">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-6 pt-3 rounded bg-gray-200 ">
                <label for="quarantined" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Quarantined Patient</label>
                <input type="number" min="0" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3 pb-2" name="quarantined" autocomplete="off" value={{old('quarantined')}}>
                @error('quarantined')
                    <p class="text-red-500 text-xs p-1 bg-white">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-6 pt-3 rounded bg-gray-200 ">
                <label for="active" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Active Case</label>
                <input type="number" min="0" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3 pb-2" name="active" autocomplete="off" value={{old('active')}}>
                @error('active')
                    <p class="text-red-500 text-xs p-1 bg-white">
                        {{$message}}
                    </p>
                @enderror
            </div>
            
            <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transistion duration-200" type="submit">Add New</button>
        </form>
    </section>
</main>


@include('partials.__footer')