<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('AdminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('AdminLTE/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('AdminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('AdminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('AdminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('AdminLTE/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE/dist/js/demo.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>


<script>
    $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var name = button.data('myname');
        var cat_id = button.data('catid');
        var modal = $(this);

        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #cat_id').val(cat_id)
    });

    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var ctid = button.data('catid');
        var modal = $(this);

        modal.find('.modal-body #ctid').val(ctid)
    });


    // edit News
    $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var title = button.data('title');
        var subject = button.data('subject');
        var new_id = button.data('newid');
        var modal = $(this);

        modal.find('.modal-body #title').val(title);
        modal.find('.modal-body #subject').val(subject);
        modal.find('.modal-body #cat_id').val(new_id)
    });

    //Delete News
    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var nid = button.data('newid');
        var modal = $(this);

        modal.find('.modal-body #nid').val(nid)
    });


</script>

