@if (session('toast_success'))
    <script>
        toastr.success("{{ session('toast_success') }}", "Success!", {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true,
        })
    </script>
@endif

@if (session('toast_failed'))
    <script>
        toastr.error("{{ session('toast_failed') }}", "Error!", {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true,
        })
    </script>
@endif
