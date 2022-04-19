<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="<?=asset('css/source.css')?>" rel="stylesheet" type="text/css">
    <script src="<?=asset('js/shared.js')?>"></script>
    <title>Dashboard Source / N-Noticias</title>
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
                <button type="button" class="btn btn-dark" disabled="disabled">Fabricio Castro</button>
                <a type="button" href="http://127.0.0.1:8000/source/create" class="btn btn-dark">New Source</a>
                <a type="button" class="btn btn-dark" href="http://127.0.0.1:8000/exit"> Log out</a>
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
    <h1 class="display-4">Your unique News Cover</h1>
    <div class="linea_100"></div>
    <div id="grupoBtn" class="btn-group flex-wrap" role="group" aria-label="Button group with nested dropdown">
    <a href="#" type="button" type="button" class="btn btn-secondary">Portada</a>
    @foreach ($categories as $category)
    <a href="#" type="button" type="button" class="btn btn-secondary"><?=$category->nameCategory?></a>
    @endforeach
    </div> 
</div>

@include('shared/footer');


</body>

</html>
