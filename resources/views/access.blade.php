@extends('layouts.master')
@section('content')

    <div id="main">

        <br>

        <div class="login-card">

            {!! isset($situation) ? $situation : null !!}

            <h1>Acesso</h1>

            <h1><small><div id="show_date"></div></small></h1><br>

            <form action={{ $path }}/acesso method="post" enctype="multipart/form-data">

                <input type="text" name="user" placeholder="Nome" required>
                <input type="password" name="pass" placeholder="Senha" required>
                <input type="submit" name="login" class="login login-submit" value="Acessar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

            </form>

        </div>

        <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

    </div>

    <script>

        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        date = day + ' / ' + month + ' / ' + year;
        document.getElementById("show_date").innerHTML = date;

    </script>


@endsection