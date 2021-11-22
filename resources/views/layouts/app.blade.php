@include('header');
@stack('styles')
@yield('sidebar')
@yield('content')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
@stack('scripts')

</body>
</html>
