<x-app title="Projects">

    <div class="p-4 sm:ml-64">

        <div class="p-4 border-2 border-gray-200 dashed rounded-lg dark:border-gray-700 mt-14">
            @if(session("delete_success"))
                <div
                    class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Success alert!</span> {{ session('delete_success') }}
                    </div>
                </div>
            @endif
            <a href="{{ route('projects.create') }}">
                <button type="button"
                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
                    Create Project
                </button>
            </a>


            <form class="max-w-lg  mb-40" method="GET" action="{{ route('projects.filter') }}" >
                <div class="flex">
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your
                        Email</label>
                    <select onchange="this.form.submit()" id="search-dropdown" name="filter"
                            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                        <option {{ \Illuminate\Support\Facades\Request::get("filter") == "all" ? "selected" : ""  }} value="all">all</option>
                        <option {{ \Illuminate\Support\Facades\Request::get("filter") == "open" ? "selected" : ""  }} value="open">open</option>
                        <option {{ \Illuminate\Support\Facades\Request::get("filter") == "blocked" ? "selected" : ""  }} value="blocked">blocked</option>
                        <option {{ \Illuminate\Support\Facades\Request::get("filter") == "in progress" ? "selected" : ""  }} value="in progress">in progress</option>
                        <option {{ \Illuminate\Support\Facades\Request::get("filter") == "cancelled" ? "selected" : ""  }} value="cancelled">cancelled</option>
                        <option {{ \Illuminate\Support\Facades\Request::get("filter") == "complated" ? "selected" : ""  }} value="complated">complated</option>
                    </select>
                    </div>
                </div>
            </form>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Assigned to
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Client
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deadline
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects  as $project)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="{{ route('projects.show',$project->id) }}">{{ $project->title }}</a>
                            </th>
                            <td class="px-6 py-4">
                                {{ $project->user()->first()->fullName ?? "N/A"}}
                            </td>
                            <td class="px-6 py-4">
                                {{ $project->client->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $project->deadline }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $project->status }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('projects.edit',$project->id) }}"
                                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit
                                </a>
                                <form action="{{ route('projects.destroy',$project->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this Project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(!(request()->path() == "projects/filter"))
                    <div class="p-4">
                        {{ $projects->links()}}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app>
