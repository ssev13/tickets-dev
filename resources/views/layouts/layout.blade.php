<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tickets</title>

    {!! Html::style("/css/style.css") !!}
     
<!--    <link href="http://tickets.app/css/style.css" rel="stylesheet"> -->

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto+Slab:300,700' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="notifications"></div>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://tickets.app">web access</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                  <ul class="nav navbar-nav">
                    <li><a href="{{ route('tickets.latest') }} ">Inicio</a></li>

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informes<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('informes.tareas') }}">Tareas</a></li>
                            <li><a href="{{ route('filemanager.files_index') }} ">Archivos</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filtros<span class="caret"></span></a>

                        {!! Html::menu(config('tickets.menu')) !!}

                    </li>
                  </ul>
                <div class="navbar-form navbar-left">
                    {!! Form::open(['route' => ['tickets.search'], 'method' => 'POST']) !!}
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Buscar" name='busqueda'>
                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                    {!! Form::close() !!}
                </div>

                    @include('layouts.login')

                </div>
            </div>
        </div>
    </div>
</nav>

@yield('content')

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>
