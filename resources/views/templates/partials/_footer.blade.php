<!-- plugins:js -->
<script src="{{ asset('assets/node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{ asset('assets/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('vendor/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendor/datatable/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('vendor/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendor/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendor/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('vendor/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendor/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/node_modules/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/morris.js/morris.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js')}}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{ asset('assets/js/misc.js')}}"></script>
<script src="{{ asset('assets/js/settings.js')}}"></script>
<script src="{{ asset('assets/js/todolist.js')}}"></script>
<script src="{{ asset('assets/js/moment.js')}}"></script>
<script src="{{ asset('assets/js/moment-with-locales.js')}}"></script>
<script src="{{ asset('assets/node_modules/axios/dist/axios.min.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
{{-- @include('sweetalert::alert') --}}
@yield('js')
<!-- End custom js for this page-->
