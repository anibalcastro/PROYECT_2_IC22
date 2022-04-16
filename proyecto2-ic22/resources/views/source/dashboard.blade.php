<?=$head?>
<body>
    <?=$menu?>
    
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