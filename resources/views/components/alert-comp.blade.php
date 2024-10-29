@if (session('alert_success'))
    <script>
        alertSuccess("{{ session('alert_success') }}");
    </script>
@endif

@if (session('alert_failed'))
    <script>
        alertFailed("{{ session('alert_failed') }}");
    </script>
@endif
