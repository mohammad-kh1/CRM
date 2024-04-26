<x-app title="Show Task">
    <div class="p-4 sm:ml-64">

        <div class="border-2 border-gray-200 dashed rounded-lg dark:border-gray-700 mt-14">

            <div class="grid gap-4 grid-cols-2">
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h2 class="text-2xl">Client</h2>
                    <br>
                    <a href="#">
                        <h5 class="mb-2 font-semibold tracking-tight text-gray-900 dark:text-white">{{ $task->client->name }}</h5>
                    </a>
                    <p> {{ $task->client->email }} </p>
                    <p> {{ $task->client->phone_number }} </p>

                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                        {{ $task->client->address }}
                    </p>

                </div>
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h2 class="text-2xl">Assigned user
                    </h2>
                    <br>
                    <a href="#">
                        <h5 class="mb-2 font-semibold tracking-tight text-gray-900 dark:text-white">{{ $task->client->name }}</h5>
                    </a>
                    <p> {{ $task->client->email }} </p>

                </div>
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h2 class="text-2xl"></h2>
                    <br>
                    <a href="#">
                        <h5 class="mb-2 font-semibold tracking-tight text-gray-900 dark:text-white">{{ $task->title }}</h5>
                    </a>
                    <p> {{ $task->description }} </p>

                </div>
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <br>
                    <a href="#">
                        <h5 class="mb-2 font-semibold tracking-tight text-gray-900 dark:text-white">Deadline {{ $task->deadline }}</h5>
                    </a>
                    <a href="#">
                        <h5 class="mb-2 font-semibold tracking-tight text-gray-900 dark:text-white">Status In {{ $task->status }}</h5>
                    </a>
                    <a href="#">
                        <h5 class="mb-2 font-semibold tracking-tight text-gray-900 dark:text-white">Created at {{ $task->created_at->format('Y-m-d') }}</h5>
                    </a>

                </div>
            </div>

        </div>
    </div>
    @push('js')
        <script>
            document.addEventListener("DOMContentLoaded", function () {

            });
        </script>
    @endpush
</x-app>
