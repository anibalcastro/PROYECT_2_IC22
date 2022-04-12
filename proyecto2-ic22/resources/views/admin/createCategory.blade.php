<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pageTitle?></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<style>
    :root {
        --altura-linea-100: 0.50px;
        --color-linea-100: rgb(255, 246, 246);
    }

    #logo_empresa {
        width: 22%;
        margin-left: 10px;
    }

    .header {
        display: flex;
        justify-content: space-around;
        flex-direction: row;
        align-items: center;
    }

    .jumbotron {
        background-color: #0a4275;
        color: white;
    }

    .linea_100 {
        height: var(--altura-linea-100);
        background-color: var(--color-linea-100);
        width: 88%;
    }

    .table {
        margin: auto;
        width: 80%;

    }

    table th,
    tr {
        text-align: center;
    }

    #edit {
        background-color: green;
        color: white;
    }

    #delete {
        background-color: red;
        color: white;
    }

    .btnAdd {
        width: 80%;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        margin: auto;
        margin-top: 20px;
    }

    footer {
        margin-top: 50px;
    }

    .submenu {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #item {
        color: white;
    }


    /*******************************************************************************************************/
    /*Nueva Categoria formulario*/
    .form-control {
        margin-left: 20px;
        width: 60%;
    }

    #btnSave {
        margin-left: 20px;
        margin-top: 10px;
    }

    a {
        color: white;
    }

</style>

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
                <a type="button" href="http://utnweb.com/web2/Proyecto_1_ISW613/Administrador/ceCategoria.php"
                    class="btn btn-dark">Categories</a>
                <form action="logout.php" method="post">
                    <button type="submit" class="btn btn-dark">Log out</button>
                </form>

            </div>
            </div>

        </nav>
    </header>

    <!-- Titulo -->
    <div class="jumbotron">
        <h1 class="display-4">Create categories</h1>
        <div class="linea_100"></div>
    </div>

    <!-- Cuerpo -->
    <div>
        <form action="{{url('/admin')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" class="form-control" name="name" id="nameCategory" aria-describedby="helpId"
                placeholder="Name Category">
            <div class="linea_100"></div>
            <input name="btnSave" id="btnSave" class="btn btn-primary" type="submit" value="Save">
        </form>
    </div>

    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #0a4275;">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: CTA -->
            <section class="submenu">
                <nav class="nav">
                    <a class="nav-link active" href="#">My Cover</a>
                    <a class="nav-link disabled" href="#">|</a>
                    <a class="nav-link" href="#">About</a>
                    <a class="nav-link disabled" href="#">|</a>
                    <a class="nav-link" href="#">Help</a>
                </nav>
            </section>
            <!-- Section: CTA -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            ©
            <a class="text-white" href="https://mdbootstrap.com/">N Noticias</a>
        </div>
        <!-- Copyright -->
        <!-- Footer -->
        </section>
        </div>
    </footer>
</body>

</html>
