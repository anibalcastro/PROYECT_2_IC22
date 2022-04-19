<!--Contenido del menu-->
<?=$head?>
<body>
    <!--Contenido del menu-->
    <?=$menu?>
    <!--Contenido del encabezado-->

    <!--Contenido del formulario-->
    Contenido del formulario
    <form action="{{url('/source')}}" method="post" enctype="multipart/form-data">
        @csrf
    
    </form>
    
    <!--Footer-->
    @include('share/footer');
</body>