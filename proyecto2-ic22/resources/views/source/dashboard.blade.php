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
