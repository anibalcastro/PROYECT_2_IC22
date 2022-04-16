<header id="encabezado">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <div class="header">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/c4/Telefe_Noticias_logo_2_%282018%29.png"
                    id="logo_empresa" alt="icon" srcset="logo icon">
        </a>
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-dark" disabled="disabled"><?=$nameUser?></button>
            <a type="button" href="<?=$link?>" class="btn btn-dark"><?=$action?></a>
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
