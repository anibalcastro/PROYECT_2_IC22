<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
Creacion de categorias
<form action="{{url('/admin')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="">Name Category</label>
      <input type="text"
        class="form-control" name="name" id="nameCategory" aria-describedby="helpId" placeholder="Name Category">
    </div>
    <input name="btnSave" id="btn" class="btn btn-primary" type="submit" value="Submit">
</form>    
</body>
</html>
