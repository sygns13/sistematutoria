@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page">
<div class="logo row">
<div class="col-xs-1"></div>
<div class="col-xs-8">
    <img src="{{ asset('/img/logoindex.png') }}" class="img-responsive" id="logo-login">
</div>

<div class="col-xs-3">
    <label class="top-label" style="margin-top: 2em;">Ingeniería de Sistemas e Informática</label>
    <label class="top-label" style="">Facultad de Ciencias</label>
</div>
  
</div>

    <div id="app">
    <center>  
        <div class="login-box" >

        
            <div class="login-logo">
               <a href="{{ url('/home') }}" class="title-login"><b>Acceso</b> al Sistema</a>
            </div><!-- /.login-logo -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Lo sentimos</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-box-body">
        <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p>
        <form action="{{ url('/login') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <login-input-field
                    name="{{ config('auth.providers.users.field','email') }}"
                    domain="{{ config('auth.defaults.domain','') }}"
                    ></login-input-field>
            {{--<div class="form-group has-feedback">--}}
                {{--<input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>--}}
                {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
            {{--</div>--}}
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-7">
                   {{--< <div class="checkbox icheck">
                        <label>
                            <input style="display:none;" type="checkbox" name="remember"> {{ trans('adminlte_lang::message.remember') }}
                        </label>
                    </div> --}}
                </div><!-- /.col -->
                <div class="col-xs-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"><span class="glyphicon glyphicon-off"></span> Ingresar</button>
                </div><!-- /.col -->
            </div>
        </form>

        {{--@include('adminlte::auth.partials.social_login')--}}

       {{--  <a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>
        <a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a>--}}

    </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    </center> 
    </div>
    @include('adminlte::layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection