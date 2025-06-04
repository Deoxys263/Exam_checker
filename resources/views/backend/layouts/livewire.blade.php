<head>
    @livewireStyles
</head>
<body>
    @yield('content')

    @livewireScripts
    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });

        Livewire.on('datatable.refresh', () => {
    $('table').DataTable().clear().destroy();
    $('table').DataTable();
});
    </script>
</body>
