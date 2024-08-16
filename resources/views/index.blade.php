@include('partials.__header')

@include('partials.__loader')

@php
    $array = array('sidebar' => 'True');
    $sidebar = array('current' => 'Covid Dashboard','search' => 'off')
@endphp

<x-nav :data="$array"/>

<x-sidebar :menu="$sidebar"/>



<h1 class="flex items-center justify-center text-5xl font-bold ml-28 mt-10  text-green-800">COVID DASHBOARD</h1>
<hr class="border-b border-gray-400 mt-4 w-1/2 absolute left-1/4 ml-20">

<div class="mt-10">
    {{-- <a href="/covid/add"><button class="absolute lg:left-2/4 left-3/4 lg:ml-96 -ml-28 z-20 w-44 bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-3 duration-300 rounded-full lg:my-2 my-3">
        <span class="text-md text-gray-200">Add </span> 
    </button></a> --}}

    <div class="absolute lg:left-1/4 left-40 md:ml-20 lg:-30 ml-0 w-1/2">
        {{ $covids->links()}}
    </div>
</div>

<div class="flex items-center justify-center container lg:mx-auto md:mt-4 mt-24">
    
    <div class="grid grid-cols-1 lg:grid-cols-2 pb-48 ml-32">

        @foreach ($covids as $covid)
                <div class="rounded-xl shadow-lg mx-2 my-3 bg-gray-200">
                    <div class="p-5 flex flex-col relative">
                        <h5 class="text-2xl md:text-xl font-bold mt-1 text-center border-b-2 border-gray-500 pb-1 mb-3">
                            {{$covid->location}}
                            <span class="absolute top-4 right-5">
                                @if ($covid->active < 50 && $covid->active >= 40)
                                    <i class="bi bi-exclamation-triangle-fill text-yellow-500 text-2xl blink-animation" title="The number of COVID-19 cases is increasing."></i>
                                @elseif ($covid->active > 50)
                                    <i class="bi bi-exclamation-octagon-fill text-red-500 text-2xl blink-animation" title="The number of COVID-19 cases has reached a critical level."></i>
                                @endif
                            </span>
                        </h5>
                        
                        <div class="grid grid-cols-3 ">
                            <div class="rounded bg-green-500 px-3 py-4 text-center shadow-lg mx-1">
                                <h1 class="text-md uppercase pb-4 font-bold">Recovered</h1>
                                <h1 class="text-md uppercase font-bold">{{$covid->recovered}}</h1>
                            </div>   
                            <div class="rounded bg-green-900 px-3 py-4 text-center shadow-lg mx-1 text-gray-200">
                                <h1 class="text-md uppercase pb-4 font-bold">Quarantined</h1>
                                <h1 class="text-md uppercase font-bold">{{$covid->quarantined}}</h1>
                            </div>
                            <div class="rounded bg-yellow-400 px-3 py-4 text-center shadow-lg mx-1">
                                <h1 class="text-md uppercase pb-4 font-bold">Active Case</h1>
                                <h1 class="text-md uppercase font-bold">{{$covid->active}}</h1>
                            </div> 
                        </div>

                        <a href="/covid/{{$covid->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 duration-300 rounded mt-4 text-center">Update</a>


                        {{-- <form action="/covid/{{$covid->id}}" method="POST">
                            @method('delete')
                            @csrf
            
                            <button class="mt-2 w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transistion duration-200" type="submit">Delete</button>
            
                        </form> --}}
                    </div>
                </div>
            
        @endforeach

    
     
    </div>
    
</div>

@include('partials.__footer')