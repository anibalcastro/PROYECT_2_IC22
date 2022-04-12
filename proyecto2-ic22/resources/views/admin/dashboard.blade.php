Administrador - Dashboard
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
Administrador - Dashboard
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td scope="row">{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>Edit / Delete</td>
            </tr>
            @endforeach
            
        </tbody>
</table>    
</body>
</html>
