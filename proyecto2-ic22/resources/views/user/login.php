Login

<?php
if(Session::has('message')){?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?= Session::get('message');?>
</div>
<?php }?>


<form action="http://127.0.0.1:8000/user/validateData" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?=csrf_token()?>" />
    <input type="email" name="email" id="" placeholder="Email">
    <input type="password" name="password" id="" placeholder="Password">
    <input type="submit" value="Save">
</form>