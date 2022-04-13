

<?php
/*
if(Session::has('message')){?>
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <?= Session::get('message');?>
</div>
*/
?>


<!--
<form action="http://127.0.0.1:8000/user/validateData" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="//<?=csrf_token()?>" />
    <input type="email" name="email" id="" placeholder="Email">
    <input type="password" name="password" id="" placeholder="Password">
    <input type="submit" value="Save">
</form>
-->


<!------ head ---------->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?=asset('css/login.css')?>" rel="stylesheet" type="text/css" >
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <title>Document</title>
</head>

<!------ menu ---------->

<body>
    <header id="encabezado">
        <nav id="nav" class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="http://utnweb.com/web2/Proyecto_1_ISW613/index.php">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/c4/Telefe_Noticias_logo_2_%282018%29.png"
                    id="logo_empresa" alt="icon" srcset="logo icon">
            </a>
        </nav>
    </header>

    <?php
    if(Session::has('message')){?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <?= Session::get('message');?>
    </div>
    <?php }?>


    <div class="wrapper fadeInDown">
        <div id="formContent">

            <!-- Icon -->
            <div class="fadeIn second">
                <img src="https://static.vecteezy.com/system/resources/previews/002/318/271/non_2x/user-profile-icon-free-vector.jpg"
                    id="icon" alt="User Icon" />
                <h1>Log in</h1>
            </div>

            <!-- Login Form -->
            <form action="http://127.0.0.1:8000/user/validateData" method="post" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="<?=csrf_token()?>" />
                <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email" required="true">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password"
                    required="true">
                <input type="submit" class="fadeIn fourth" name="btnSave" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="http://127.0.0.1:8000/user/create">Create
                    user.</a>
            </div>

        </div>
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
