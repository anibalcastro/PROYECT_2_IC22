<!--Contenido del menu-->
<?=$head?>
<body>
    <!--Contenido del menu-->
    <?=$menu?>

    <?php
    if(Session::has('message')){?>
    <div id="alerta" class="alert alert-success alert-dismissible" role="alert">
        <button type="button" onclick="ocultarAlerta()" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <?= Session::get('message');?>
    </div>
    <?php }?>
    
    <!--Contenido del encabezado-->
     <!-- Titulo -->
     <div class="jumbotron">
        <h1 class="display-4">Create New Source</h1>
        <div class="linea_100"></div>
    </div>
    <!--Contenido del formulario-->

    <form action="{{url('/source')}}" method="post" enctype="multipart/form-data">
        @csrf
        <?=$formSource?>
    </form>
    
    <!--Footer-->
    @include('shared/footer')
</body>