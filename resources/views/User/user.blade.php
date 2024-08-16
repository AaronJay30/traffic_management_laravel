@include('partials.__header')


@php
    $array = array('sidebar' => 'True');
    $sidebar = array('current' => 'User Management','search' => 'off')
@endphp

<x-nav :data="$array"/>

<x-sidebar :menu="$sidebar"/>


<h1 class="flex items-center justify-center text-5xl font-bold ml-18 lg:ml-28 mt-10 text-green-800 mb-5">USER MANAGEMENT</h1>



<hr class="w-2/3 lg:mx-96 mx-36 mb-5 border-t-1 opacity-20  border-green-950">
<div class="relative overflow-x-auto sm:rounded-lg w-2/3 lg:mx-96 mx-auto">
    
    <a href="/user/add">
        <button class="absolute right-0 w-32 z-20 bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-3 duration-300 rounded-full ">
            <span class="text-md text-gray-200">Add </span> 
        </button>
    </a>

    <div class="pb-4">
        <form action="/user/search" method="GET">
            @csrf
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">

                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" name="search" autocomplete="off" class="block p-2 pl-10 text-sm rounded-lg shadow-md w-1/2 focus:outline-none bg-white text-gray-600" placeholder="Search for items">

            </div>
        </form>
    </div>


    <table class="w-full text-sm text-left dark:text-gray-700" id="myTable">
        <thead class="text-xs text-gray-300 uppercase bg-green-50 dark:bg-green-700 dark:text-gray-100">
            <tr>
                <th scope="col" class="px-2 py-3">
                    @sortablelink('id')
                </th>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('name')
                </th>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('email')
                </th>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('role')
                </th>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('created_at')
                </th>
                <th scope="col" class="px-6 py-3 ">
                    @sortablelink('last_login')
                </th>
                <th scope="col" class="px-2 py-3 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        

        @foreach ($users as $key => $user)

                <tr class=" dark:bg-gray-100 border-b dark:border-b-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-200 duration-200 dark:hover:text-gray-700">
                    
                    <td class="px-2 py-4">
                        {{$user->id}}
                    </td>
                    <td class="px-6 py-4 font-bold  whitespace-nowrap">
                        {{$user->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$user->email}}
                    </td>
                    <td class="px-6 py-4">
                        {{$user->role}}
                    </td>
                    <td class="px-6 py-4">
                        {{\Carbon\Carbon::parse($user->created_at)->format('F d Y')}}
                    </td>
                    <td class="px-6 py-4">
                        @if ($user->last_login == NULL)
                            No Login Activity
                        @else
                            {{\Carbon\Carbon::parse($user->last_login)->format('F d Y - D h:i A')}}
                        @endif
                        
                    </td>
                    <td class="px-2 py-4 flex items-center justify-center">
                        <a href="/user/{{$user->id}}" class="mx-2">
                            <button type="button" class="text-white w-20 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg text-sm px-2.5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square mr-3" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                                Edit
                            </button>
                        </a>
                        <form action="/user/{{$user->id}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  rounded-lg text-sm px-2.5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3 mr-3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                                Delete
                            </button>
                        </form>
                        
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
        <div class="mt-3 pb-48">
            {{$users->appends(\Request::except('page'))->links('pagination::tailwind')}}
        </div>


</div>


@include('partials.__footer')