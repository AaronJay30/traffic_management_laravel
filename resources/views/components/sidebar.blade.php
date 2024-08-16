<span class="absolute text-white text-4xl top-8 left-4 cursor-pointer" onclick="Open()">
    <i class="bi bi-filter-left px-2 bg-green-700 rounded-md"></i>
</span>

<div class="sidebar fixed top-[94px] bottom-0 duration-300 left-0 p-2 w-[300px] overflow-y-auto text-center bg-green-800  z-10">
    <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex items-center ">
            <i class="bi bi-person-circle px-2 py-1 rounded-md text-xl"></i>
            <h1 class="font-bold text-gray-200 text-[15px] ml-3">Welcome back <span class="font-bold text-green-400">{{ Auth::user()->name }}</span>! </h1>
            {{-- <i class="bi bi-x-lg cursor-pointer" onclick="Open()"></i> --}}
        </div>
        <hr class="my-2 text-gray-600">

        <?php if(Auth::user()->role == "Barangay Official"){ ?>
            <a href="/"><div class="pt-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer pb-2  {{ $menu['current'] == 'Covid Dashboard' ? "bg-green-600 text-gr-500" : "hover:bg-green-800 text-gray-200 hover:text-gray-100"}}">
                <i class="bi bi-speedometer2 text-xl"></i>
                <span class="text-[15px] ml-4">Covid Dashboard</span>
            </div></a>
        <?php }else { ?>
            <div class="pt-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-200 pb-2 text-green-700 {{ $menu['search'] == 'off' ? "hidden" : "block"}}">
                <i class="bi bi-search text-sm "></i>
                <input type="text" name="search" onkeyup="tableSearch()" id="myInput" placeholder="Search" autocomplete="off" class="text-[15px] ml-4 w-full bg-transparent focus:outline-none">
            </div>
    
            <a href="/"><div class="pt-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer pb-2  {{ $menu['current'] == 'Covid Dashboard' ? "bg-green-700 text-gr-500" : "hover:bg-green-700 text-gray-200 hover:text-gray-100"}}">
                <i class="bi bi-speedometer2 text-xl"></i>
                <span class="text-[15px] ml-4">Covid Dashboard</span>
            </div></a>
    
            <a href="/traffic"><div class="pt-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer pb-2 {{ $menu['current'] == 'Traffic Monitoring' ? "bg-green-700 text-gr-500" : "hover:bg-green-700 text-gray-200 hover:text-gray-100"}}">
                <i class="bi bi-car-front-fill text-xl"></i>
                <span class="text-[15px] ml-4">Traffic Monitoring</span>
            </div></a>
            
            <?php if(Auth::user()->role == "Admin"){ ?>
                <a href="/user"><div class="pt-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer pb-2 {{ $menu['current'] == 'User Management' ? "bg-green-700 text-gr-500" : "hover:bg-green-700 text-gray-200 hover:text-gray-100"}}">
                    <i class="bi bi-people-fill text-xl"></i>
                    <span class="text-[15px] ml-4">User Management</span>
                </div></a>  
            <?php }?>
            
            
    

        <?php } ?>

        <form action="/logout" method="POST" class="pt-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-red-600 pb-2 text-gray-200 hover:text-gray-100">
            @csrf
            <button type="submit">
                <i class="bi bi-box-arrow-in-left text-xl"></i>
                <span class="text-[15px] ml-4">Logout</span>
            </button>
        </form>


    </div>
</div>



    <script type="text/javascript">
        function Open(){
            document.querySelector('.sidebar').classList.toggle('-left-[300px]');
        }
    </script>