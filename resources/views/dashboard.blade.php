<x-app title="Dashboard">
    <x-sidebar />


    @push("js")
        <script>
            function toggleSidebar() {
                var sidebar = document.getElementById('logo-sidebar');
                sidebar.classList.toggle('hidden');
                sidebar.classList.toggle('block');
            }
        </script>

    @endpush
</x-app>
