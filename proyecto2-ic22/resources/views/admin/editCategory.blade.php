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

    <!-- Titulo -->
    <div class="jumbotron">
        <h1 class="display-4">Edit categories</h1>
        <div class="linea_100"></div>
    </div>

    <!-- Cuerpo -->
    <div>
        <form action="<?=url('/admin/'.$category->id)?>" method="post" enctype="multipart/form-data">
            @csrf
            <?= method_field('PATCH')?>
            @include('admin.form')
        </form>
    </div>

    @include('shared/footer')
</body>

</html>