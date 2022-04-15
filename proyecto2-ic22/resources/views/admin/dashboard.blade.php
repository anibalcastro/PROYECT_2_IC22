<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pageTitle?></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?=asset('css/admin.css')?>" rel="stylesheet" type="text/css">
    <script src="<?=asset('js/shared.js')?>"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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
                <button type="button" class="btn btn-dark" disabled="disabled"><?=$user?></button>
                <a type="button" href="http://127.0.0.1:8000/admin/create"
                    class="btn btn-dark">Categories</a>
                <a type="button" class="btn btn-dark" href="http://127.0.0.1:8000/exit"> Log out</a>
               <!--
                <form action="http://127.0.0.1:8000/admin/logout" method="post">
                    <button type="submit" class="btn btn-dark">Log out</button>
                </form>
                -->
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
        <h1 class="display-4">Categories</h1>
        <div class="linea_100"></div>
    </div>

    <table class="table">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td scope="row">{{ $category->id }}</td>
                <td>{{ $category->nameCategory }}</td>
                <td class = "actions">

                    <a id="edit" type="button" class="btn btn-success" href="<?=url('/admin/'.$category->id.'/edit')?>">Edit</a>
                    
                    <form class="btnDelete" action="{{url('/admin/'.$category->id)}}" method="post">
                        <input type="hidden" name="_token" value="<?=csrf_token()?>" />
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger" onclick="return confirm('Quieres eliminar la categoria?')" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="btnAdd">
        <a type="button" href="http://127.0.0.1:8000/admin/create" class="btn btn-dark">Add New</a>
    </div>

    @include('shared/footer')

</body>

</html>
