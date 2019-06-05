<head>
    <meta charset="UTF-8">
    <title> Sistema de Tutoría - @yield('htmlheader_title', 'Sistema de Tutoría') </title>
    <link rel="icon" type="image/png" href="{{ asset('/img/unasamicono.png') }}" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/datepicker3.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('/css/alertify.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/fileinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet" media="screen" type="text/css" charset="utf-8" />
    <link href="{{ asset('css/color/bootstrap-colorpicker.css') }}" rel="stylesheet" type="text/css" />

<style type="text/css">
    @media print {
.Noimpre {display:none}
}
</style>
  {{--    <link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />  --}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <script>
        //See https://laracasts.com/discuss/channels/vue/use-trans-in-vuejs
        window.trans = @php
            // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
            $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
            $trans = [];
            foreach ($lang_files as $f) {
                $filename = pathinfo($f)['filename'];
                $trans[$filename] = trans($filename);
            }
            $trans['adminlte_lang_message'] = trans('adminlte_lang::message');
            echo json_encode($trans);
        @endphp
    </script>
</head>
