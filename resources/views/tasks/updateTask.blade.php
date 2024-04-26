<x-app title="Update Task">
    <div class="p-4 sm:ml-64">

        <div class="border-2 border-gray-200 dashed rounded-lg dark:border-gray-700 mt-14">

            @if(session("update_success"))
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
                        <span class="font-medium">Success alert!</span> {{ session('update_success') }}
                    </div>
                </div>
            @endif
            @if(session("update_fail"))
                <div
                    class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">alert!</span> {{ session('update_fail') }}
                    </div>
                </div>
            @endif
            <form class="mx-auto p-2" method="POST" action="{{ route('tasks.update',$task->id) }}">
                @csrf
                @method("PATCH")
                {{-- START TITLE --}}
                <div class="mb-5 p-2">
                    <div class="mb-5 p-2">
                        <label for="title"
                               class="block mb-2 text-sm font-medium {{ $errors->has('title') ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">
                            Title
                        </label>
                        <input type="text" id="title"
                               class="{{ $errors->has('title') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900' }} text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               name="title" value="{{ old('title', $task->title ) }}"/>
                        @error('title')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>

                </div>
                {{--END TITLE--}}
                {{-- START Description --}}
                <div class="mb-5 p-2">
                    <div class="mb-5 p-2">
                        <label for="description"
                               class="block mb-2 text-sm font-medium {{ $errors->has('description') ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">
                            Description
                        </label>

                        <textarea id="description" rows="4" name="description"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Write your thoughts here...">{{ old("description",$task->description)  }}</textarea>
                        @error('description')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>

                </div>
                {{--END Description--}}
                {{-- START Deadline --}}
                <div class="mb-5 p-2">
                    <div class="mb-5 p-2">
                        <label for="deadline"
                               class="block mb-2 text-sm font-medium {{ $errors->has('deadline') ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">
                            Deadline
                        </label>


                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input datepicker datepicker-orientation="bottom right" datepicker-format="yyyy-mm-dd"  type="text" id="datepick" value="{{ $task->deadline }}" name="deadline"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="Select date">
                        </div>


                        @error('deadline')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- END Deadline --}}
                {{-- START Assigned User --}}
                <div class="mb-5 p-2">
                    <div class="mb-5 p-2">
                        <label for="user_id"
                               class="block mb-2 text-sm font-medium {{ $errors->has('user_id') ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">
                            Assigned User
                        </label>
                        <select id="countries" name="user_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="{{ $task->user->id }}">{{ $task->user->fullName }}</option>
                            @foreach($task->allUsers()->get() as $user)
                                @if($user->id != $task->user->id)
                                    <option value="{{ $user->id }}">{{ $user->fullName }}</option>
                                @endif
                            @endforeach
                        </select>

                        @error('user_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>

                </div>
                {{--  END Assigned User  --}}
                {{-- START Assigned client --}}
                <div class="mb-5 p-2">
                    <div class="mb-5 p-2">
                        <label for="client_id"
                               class="block mb-2 text-sm font-medium {{ $errors->has('client_id') ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">
                            Assigned client </label>
                        <select id="countries" name="client_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="{{ $task->client->id }}">{{ $task->client->name }}</option>
                            @foreach($task->allClients()->get() as $client)
                                @if($task->client->id != $client->id)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @error('client_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>

                </div>
                {{--  END Assigned client  --}}
                {{-- START Assigned project --}}
                <div class="mb-5 p-2">
                    <div class="mb-5 p-2">
                        <label for="project_id"
                               class="block mb-2 text-sm font-medium {{ $errors->has('project_id') ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">
                            Assigned project </label>
                        <select id="countries" name="project_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="{{ $task->project->id }}">{{ $task->project->title }}</option>
                            @foreach($task->allProjects()->get() as $project)
                                @if($task->project->id != $project->id)
                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                @endif
                            @endforeach
                        </select>

                        @error('client_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>

                </div>
                {{--  END Assigned porject  --}}
                {{-- START STATUS --}}
                <div class="mb-5 p-2">
                    <div class="mb-5 p-2">
                        <label for="status"
                               class="block mb-2 text-sm font-medium {{ $errors->has('status') ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">
                            Status </label>
                        <select id="countries" name="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="{{ $task->status  }}">{{ $task->status }}</option>
                            @foreach($task::STATUS_LIST as $status)
                                @if($task->status != $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endif
                            @endforeach
                        </select>

                        @error('client_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>

                </div>
                {{-- END STATUS --}}
                <div class="mb-5 p-2">
                    <button type="submit"
                            class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update User
                    </button>
                </div>

            </form>

        </div>
    </div>
    @push("js")
        <script>
            document.addEventListener("DOMContentLoaded", function () {

            });
        </script>
    @endpush
</x-app>
