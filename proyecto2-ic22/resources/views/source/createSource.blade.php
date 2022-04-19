<!--Contenido del menu-->
<?=$head?>
<body>
    <!--Contenido del menu-->
    <?=$menu?>
    <!--Contenido del encabezado-->

    <!--Contenido del formulario-->
    <form action="{{url('/admin')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('source.formSource');
    </form>
    
    <!--Footer-->
    @include('share/footer');
</body>