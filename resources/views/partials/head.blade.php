<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>

    <!-- PARA QUE SIRVE : ICONO -->
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/font/simple-line-icons/css/simple-line-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/bootstrap-float-label.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/select2-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/fullcalendar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/bootstrap-datepicker3.min.css') }}" />
     <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/bootstrap-tagsinput.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/perfect-scrollbar.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/quill.snow.css')}}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/quill.bubble.css')}}" /> --}}
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/component-custom-switch.min.css') }}" />
 <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/nouislider.min.css')}}" />
 <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/bootstrap-stars.css')}}" />
 <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/cropper.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/dataTables.bootstrap4.min.css') }}"></link>
<link rel="stylesheet" href="{{ asset('bower_components/diseno/src/css/vendor/datatables.responsive.bootstrap4.min.css') }}"></link>
    <link  href="{{ asset('bower_components/diseno/src/css/main.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('js/jquery/jquery.datetimepicker.css')}}"/>

<!-- https://ckeditor.com/cke4/builder -->
<script src="{{ asset('/js/ckeditor/ckeditor.js') }}"></script>


@yield('style')


<script src="{{ asset('js/main.js') }}"></script>

@yield('scripthead')






