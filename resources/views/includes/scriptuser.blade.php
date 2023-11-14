<script src="{{url('./frontend/libraries/retina/retina.js')}}"></script>
<script src="{{url('./frontend/libraries/jquery/jquery-3.4.1.min.js')}}"></script>
<script src="{{url('./frontend/libraries/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{url('./frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
{{--  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="{{url('.frontend/images/tanggal.png')}}" />'
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.datepicker2').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="{{url('.frontend/images/tanggal.png')}}" />'
            }
        });
    });
</script>