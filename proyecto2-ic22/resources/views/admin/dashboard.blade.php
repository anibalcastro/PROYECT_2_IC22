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
