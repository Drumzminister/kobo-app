@section('other_js')
    <script>
        window.onbeforeunload = confirmExit;

        function confirmExit() {
            return "Are you sure?";
        }
    </script>
@endsection
