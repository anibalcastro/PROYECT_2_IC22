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
    <?php
   // if (sizeof($news) > 0){
        foreach($news as $noticias){
        
            echo $noticias['title'];//TITULO
            echo $noticias['shortDescription'];//DESCRIPCION
            echo $noticias['permanLink'];//LINK
            echo $noticias['date'];//FECHA
            echo $noticias['sourceId'];//FUENTE
            echo $noticias['nameCategory'];//CATEGORIA
            echo $noticias['tags'];//CATEGORIA
            die;
            
            
            
    ?>
    <div class="contNoticias">
        <a target="_blanc" href=<?php echo "$noticias[2]"?>>
            <H6><?php echo $noticias[3];?></H6>
            <h1 class="tituloNoticia"><?php echo $noticias[0] ?></h1>
            <p class="descripcionNoticia"><?php echo $noticias[1]; ?></p>
            <a target="_blanc" href=<?php echo "$noticias[2]"?>>Ver mas</a>
            <H6><?php echo $noticias[4]. " / ".$noticias[5]?></H6>
        </a>
    </div>
    <?php  
  }
//}  
  ?>
    }
    }

    @include('shared/footer');


</body>

</html>
