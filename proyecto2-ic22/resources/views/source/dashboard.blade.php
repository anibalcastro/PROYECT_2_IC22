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

    <!--Search news-->
    <div class="buscador">
        <form id="formSearch" action="{{url('/search')}}" method="post">
            @csrf
            <input type="text" class="form-control" id="inpSearch" name="inpSearch" placeholder='Search New'/>
            <input type="submit" class="btn btn-primary" id="subSearch" name="btnSearch" value="Search">
        </form>
    </div>

    <br>


    @if(sizeof($news) > 0)
    @foreach($news as $noticias)


    <div class="contNoticias">

        <H6><?php echo $noticias->date;?></H6>
        <a target="_blanc" href=<?php echo $noticias->permanLink;?>>
            <h1 class="tituloNoticia"><?php echo $noticias->title;?></h1>
        </a>
        <p class="descripcionNoticia"><?php echo $noticias->shortDescription; ; ?></p>
        <a target="_blanc" href=<?php echo $noticias->permanLink;?>>Ver mas</a>
        <H6><?php echo $noticias->nameSource . " / ". $noticias->nameCategory; ?></H6>
        <H6><?php echo $noticias->tags;?></H6>

    </div>
    @endforeach
    @else
    <H5>No hay noticias relacionadas, si quieres agregar <a href="source/create">click aqui</a></H5>
    @endif
    @include('shared/footer');

</body>

</html>
