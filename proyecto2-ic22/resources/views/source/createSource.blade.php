<!--Contenido del menu-->
<?=$head?>
<body>
    <!--Contenido del menu-->
    <?=$menu?>
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