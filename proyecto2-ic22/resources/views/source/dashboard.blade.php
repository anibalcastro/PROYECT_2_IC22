<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pageTitle?></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?=asset('css/admin.css')?>" rel="stylesheet" type="text/css">
    <script src="<?=asset('js/shared.js')?>"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>

<body>
    <header id="encabezado">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <div class="header">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c4/Telefe_Noticias_logo_2_%282018%29.png"
                        id="logo_empresa" alt="icon" srcset="logo icon">
            </a>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-dark" disabled="disabled"><?=$nameUser?></button>
                <a type="button" href="<?=$link?>" class="btn btn-dark"><?=$action?></a>
                <a type="button" class="btn btn-dark" href="http://127.0.0.1:8000/exit"> Log out</a>
                <!--
                <form action="http://127.0.0.1:8000/admin/logout" method="post">
                    <button type="submit" class="btn btn-dark">Log out</button>
                </form>
                -->
            </div>
            </div>

        </nav>
    </header>

    <?php
    if(Session::has('message')){?>
    <div id="alerta" class="alert alert-success alert-dismissible" role="alert">
        <button type="button" onclick="ocultarAlerta()" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <?= Session::get('message');?>
    </div>
    <?php }?>

    <div class="jumbotron">
        <h1 class="display-4">Your unique news</h1>
        <div class="linea_100"></div>
    </div>

    <!--Menu de todas las categorias->

    <!-Menu de todas las etiquetas-->


    @include('share/footer');
</body>
