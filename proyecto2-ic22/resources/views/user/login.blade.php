
<!------ head ---------->
<?=$head?>


<body>
 <!------ menu ---------->
 @include('sharedUser/menu')

    <?php
    if(Session::has('message')){?>
    <div id="alerta" class="alert alert-success alert-dismissible" role="alert">
        <button type="button" onclick="ocultarAlerta()" class="close" data-dismiss="alert" aria-label="Close"><span
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
            <form action="http://127.0.0.1:8000/login" method="post" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="<?=csrf_token()?>" />
                <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email" required="true">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password"
                    required="true">
                <input type="submit" class="fadeIn fourth" name="btnSave" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="http://127.0.0.1:8000/register">Create
                    user.</a>
            </div>

        </div>
    </div>

    @include('shared/footer')
</body>


</html>
