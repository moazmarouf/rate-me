<script src="{{asset('Site/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('Site/js/popper.min.js')}}"></script>
<script src="{{asset('Site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('Site/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js"></script>
<script src="{{asset('Site/js/scripts.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
            ],
            autoFill: true
        })
        $(buttons)[0].addClass('success')
        ;
    } );
</script>
</body>
@yield('scripts')
</html>
