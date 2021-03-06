<div>
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
    
        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-800 lg:translate-x-0 lg:static lg:inset-0">
    
            <nav class="mt-10">
                <a class="flex items-center px-6 py-2 mt-4 text-gray-100 bg-gray-700 bg-opacity-25" href="{{route('users.index')}}">
                    <i class="fas fa-user"></i>
                    <span class="mx-3">Users</span>
                </a>
            </nav>
        </div>
        <div class="flex flex-col flex-1 overflow-hidden">
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-yellow-300">
                <form method="post" action="{{route('users.search')}}">
                    @csrf
                    <div class="flex items-center">
                        <button type="submit" @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </button>
        
                        <div class="relative mx-4 lg:mx-0">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>
                            </span>
        
                            <input name="search" class="w-32 pl-10 pr-4 rounded-md form-input sm:w-64 focus:border-indigo-600" type="text" placeholder="Search">
                        </div>
                    </div>
                </form>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 no-scrollbar">
                <div class="container px-6 py-8 mx-auto">
                    <h3 class="text-3xl font-medium text-gray-700">Users</h3>
    
                    <div class="mt-4">
                        <div class="flex flex-wrap -mx-6">
                            <div class="w-full px-6 xl:w-1/2">
                                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">    
                                    <div class="mx-5">
                                        <h4 class="text-2xl font-semibold text-gray-700"><i class="text-blue-900 fas fa-users"></i> {{App\Models\User::where('admin',false)->count()}}</h4>
                                        <div class="text-gray-500">Total Users</div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="w-full px-6 mt-6 xl:w-1/2 xl:mt-0">
                                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                                    <div class="mx-5">
                                        <h4 class="text-2xl font-semibold text-gray-700"><i class="text-green-900 fas fa-user-check"></i>  {{App\Models\User::where('admin',false)->whereNotNull('email_verified_at')->count()}}</h4>
                                        <div class="text-gray-500">Verified Users</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="flex flex-col mt-8">
                        <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                            <div
                                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                                <table class="min-w-full">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Name
                                            </th>
                                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                DJ Type
                                            </th>
                                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                FB
                                            </th>
                                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Status
                                            </th>
                                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Role
                                            </th>
                                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Delete
                                            </th>
                                        </tr>
                                    </thead>
    
                                    <tbody class="bg-white">
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 w-10 h-10">
                                                        <img class="w-10 h-10 rounded-full" src="{{$user->admin == true ? asset('user.png') : 'https://graph.facebook.com/v3.3/'.$user->fb_id.'/picture?type=normal'}}" alt="">
                                                    </div>    
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium leading-5 text-gray-900">
                                                            {{$user->name}}
                                                        </div>
                                                        <div class="text-sm leading-5 text-gray-500">
                                                            {{$user->email}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{$user->type}}</div>
                                                <div class="text-sm text-gray-500">{{$user->country}}</div>
                                            </td>

                                            <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                                <a class="text-blue-800 focus:outline-none" href="{{$user->fb_profile}}" target="_blank"><i class="text-xl fab fa-facebook-square"></i></a>
                                            </td>
    
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <form method="POST" action="{{ route('users.update',$user->id) }}">
                                                @csrf
                                                @method('patch')
                                                    <input type="hidden" name="email_verified_at" value="{{$user->email_verified_at}}">
                                                    <button class="focus:outline-none" type="submit">
                                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full {{is_null($user->email_verified_at) ? 'text-red-800 bg-red-100' : 'text-green-800 bg-green-100'}}">{{is_null($user->email_verified_at) ? 'Not Verified' : 'Verified'}}</span>
                                                    </button>
                                                </form>
                                            </td>
    
                                            <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                                {{$user->admin == 1 ? 'Admin' : 'User'}}
                                            </td>

                                            <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                                <form method="POST" action="{{route('users.destroy',$user->id)}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="text-red-900 focus:outline-none"><i class="text-lg fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
