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
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="https://static.vecteezy.com/system/resources/previews/002/318/271/non_2x/user-profile-icon-free-vector.jpg"
                    id="icon" alt="User Icon" />
                <h1>User Registration</h1>
                <div class="linea_100"></div>
            </div>
            <div>
                <!-- register Form -->
                <form action="http://127.0.0.1:8000/register" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="<?=csrf_token()?>" />
                    <input type="text" id="nameUser" class="fadeIn first" name="firstName" placeholder="First Name"
                        required="true">
                    <input type="text" id="lastUser" class="fadeIn first" name="lastName" placeholder="LastName"
                        required="true">
                    <input type="text" id="emailUser" class="fadeIn third" name="email" placeholder="Email"
                        required="true">
                    <input type="password" id="passwordUser" class="fadeIn fourth" name="password"
                        placeholder="Password" required="true">
                    <input type="text" id="adress1" class="fadeIn second" name="adress" placeholder="Adress"
                        required="true">
                    <select name="country" id="country" class="fadeIn second" required="true">
                        <option disabled selected>Country</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Estados Unidos">Estados Unidos</option>
                        <option value="Panamá">Panamá</option>
                    </select>
                    <input type="text" id="phone" class="fadeIn second" name="phone" placeholder="Phone Number"
                        required="true">
                    <input type="hidden" name="roleId" value="2" />

                    <input type="submit" class="fadeIn fourth" value="Sign up">
                </form>

            </div>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="http://127.0.0.1:8000/">I have user</a>
            </div>
        </div>

    </div>

    @include('shared/footer')

</body>

</html>
