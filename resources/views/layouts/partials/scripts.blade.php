<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/lib/@fortawesome/all.min.js') }}"></script>
<script src="{{ asset('assets/lib/stickyfilljs/stickyfill.min.js') }}"></script>
<script src="{{ asset('assets/lib/sticky-kit/sticky-kit.min.js') }}"></script>
<script src="{{ asset('assets/lib/is_js/is.min.js') }}"></script>
<script src="{{ asset('assets/lib/lodash/lodash.min.js') }}"></script>
<script src="{{ asset('assets/lib/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
<script src="{{ asset('assets/lib/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/lib/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/lib/datatables-bs4/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/lib/datatables.net-responsive/dataTables.responsive.js') }}"></script>
<script src="{{ asset('assets/lib/datatables.net-responsive-bs4/responsive.bootstrap4.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" ></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src='https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
<script src="{{ asset('assets/lib/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/lib/leaflet/leaflet.js') }}"></script>
<script src="{{ asset('assets/lib/leaflet.markercluster/leaflet.markercluster.js') }}"></script>
<script src="{{ asset('assets/lib/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    $(function(){
        function show_popup(){
            $("#alert").animate({ top: 0 })
                .delay(500)
                .fadeOut();
        };
        window.setTimeout( show_popup, 2000 ); // 2 seconds
    });
</script>
@yield('javascript')
