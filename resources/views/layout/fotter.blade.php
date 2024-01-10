<script src="{{asset('assets/js/all.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
<!-- <script>
    if (document.getElementById('modaltambah')) {
        const modalTambah = new bootstrap.Modal('#modaltambah');
        @if(Session::has('show_tambah_modal'))
        modalTambah.show();
        @endif
    }
</script> -->
@if($message = Session::get('failed'))
<script>
    Swal.fire('{{$message}}', '', 'warning')
</script>
@endif
@if($message = Session::get('switsuccess'))
<script>
    Swal.fire('{{$message}}', '', 'success')
</script>
@endif
@if($message = Session::get('AlertSuccess'))
<script>
    window.open("http://127.0.0.1:8000/struk")
    Swal.fire('{{$message}}', '', 'success')
</script>
@endif
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>