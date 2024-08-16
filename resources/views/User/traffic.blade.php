@include('partials.__header')

@php
    $array = array('sidebar' => 'True');
    $sidebar = array('current' => 'Traffic Monitoring','search' => 'off')
@endphp

<x-nav :data="$array"/>

<x-sidebar :menu="$sidebar"/>

<h1 class="text-center text-5xl font-bold text-green-800 mt-10 border-b border-b-gray-400 pb-5 w-1/2 mx-auto">TRAFFIC MONITORING</h1>
<div class="flex items-center justify-center gap-14 lg:ml-60 ml-5 mt-8 lg:flex-row flex-col">
    <div class="bg-white shadow-lg rounded-lg w-[993px] h-[590px] px-4 py-4">
        <img src="{{ asset('img/1.png') }}" class='{{$traffic === "FE Marcos" ? 'block' : 'hidden'}} duration-200' >
        <img src="{{ asset('img/2.png') }}" class='{{$traffic === "Abar 1st" ? 'block' : 'hidden'}} duration-200'>
        <img src="{{ asset('img/3.png') }}" class='{{$traffic === "Calaocan" ? 'block' : 'hidden'}} duration-200'>
        <img src="{{ asset('img/4.png') }}" class='{{$traffic === "Abar 2nd" || $traffic === "Caanawan" ? 'block' : 'hidden'}} duration-200'>
    </div>

    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
        {{-- <h5 class="mb-4 text-2xl font-medium tracking-tight text-gray-600">BARANGAY:</h5> --}}

        <div class="flex-row">
            <div class="flex border-b-2 bg-green-800 rounded-tr-lg rounded-tl-lg px-2">
                <h1 class="p-2 flex text-lg font-bold w-36 uppercase text-center text-white">Barangay </h1>
                <h1 class="p-2 flex text-lg font-bold w-32 uppercase text-center text-white">Active Case</h1>
            </div>
            
            
            @foreach ($barangay as $list)
                <div class="flex border-b-2">
                    <h1 class="p-2 text-lg {{$list->active > 50 ? "text-red-500" : "text-green-500"}} font-medium w-36 uppercase pl-5">{{$list->location}}</h1>
                    <h1 class="border-l-2 pl-6 p-2 text-lg {{$list->active > 50 ? "text-red-500" : "text-green-500"}} font-bold pl-14">{{$list->active}}</h1>
                </div>
            @endforeach
            <div class="flex justify-center mt-2 mb-2 gap-4">
                <div class="flex items-center mr-2">
                    <div class="w-4 h-4 bg-red-500 rounded-full"></div>
                    <p class="ml-2 text-sm text-gray-600">Critical Zone</p>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-green-500 rounded-full"></div>
                    <p class="ml-2 text-sm text-gray-600">Safe Zone</p>
                </div>
            </div>
            
        </div>


    </div>
</div>



{{-- <script type="text/javascript">
        function route(x){
            var ch1, ch2;

            if(x == "core"){
                document.querySelector('.core').classList.toggle('hidden');
                document.querySelector('.off').classList.toggle('hidden');

                if(!document.querySelector('.default').classList.contains('hidden')){
                    document.querySelector('.default').classList.toggle('hidden');
                    document.querySelector('.off').classList.toggle('hidden');
                    document.querySelector('.core').classList.toggle('hidden');
                    document.querySelector('.both').classList.toggle('hidden');
                    document.getElementById('btn1').disabled=true;
                    document.getElementById('btn1').classList.toggle('bg-gray-500');
                    document.getElementById('btn2').disabled=true;
                    document.getElementById('btn2').classList.toggle('bg-red-600');
                    document.getElementById('btn2').classList.toggle('bg-gray-500');
                    document.getElementById('off').disabled=false;
                }


            } else if(x == "default"){
                document.querySelector('.default').classList.toggle('hidden');
                document.querySelector('.off').classList.toggle('hidden');

                if(!document.querySelector('.core').classList.contains('hidden')){
                    document.querySelector('.default').classList.toggle('hidden');
                    document.querySelector('.off').classList.toggle('hidden');
                    document.querySelector('.core').classList.toggle('hidden');
                    document.querySelector('.both').classList.toggle('hidden');
                    document.getElementById('btn1').disabled=true;
                    document.getElementById('btn1').classList.toggle('bg-gray-500');
                    document.getElementById('btn2').disabled=true;
                    document.getElementById('btn2').classList.toggle('bg-red-600');
                    document.getElementById('btn2').classList.toggle('bg-gray-500');
                    document.getElementById('off').disabled=false;
                }

            }
            else if(x == "off"){
                
                if (document.querySelector('.off').classList.contains('hidden')){
                    
                    document.getElementById('btn1').disabled=false;
                    document.getElementById('btn1').classList.toggle('bg-gray-500');
                    document.getElementById('btn2').disabled=false;
                    document.getElementById('btn2').classList.toggle('bg-red-600');
                    document.getElementById('btn2').classList.toggle('bg-gray-500');
                    document.querySelector('.off').classList.toggle('hidden');
                    document.querySelector('.both').classList.toggle('hidden');
                    document.getElementById('off').disabled=true;
                }
            }
        }
</script> --}}

@include('partials.__footer')