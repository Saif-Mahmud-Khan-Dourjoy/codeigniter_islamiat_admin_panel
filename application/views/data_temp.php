<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<!--     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 -->
    <title>Add template</title>
  </head>
  <body>
      <div class="container my-5">
      <div class="my-2">
            <?php echo $this->session->flashdata('submit'); ?>
      </div>

  	<div class="row">	
   
    
  	<form action="<?php echo base_url();?>template/update" method="post">
  <div class="form-group">
    <label for="name">Template Name</label>
    <?php foreach($temp as $tem){ ?>
    <input type="hidden" name="id" value="<?php echo $tem->id ?>">
    <input type="text" name="temp" class="form-control" value="<?php echo $tem->temp_name ?>" id="name" placeholder="Enter Template Name">
    <?php }?>
  </div>
<div class="checkbox">
  <label><input type="checkbox" value="Text" name="arr[]">Text <input style="width: 50px; margin-top: 5px; margin-left: 20px" type="number" name="serial[]"></label>
</div>
<div class="checkbox">
  <label><input type="checkbox" value="Audio" name="arr[]">Audio<input style="width: 50px; margin-top: 5px; margin-left: 20px" type="number" name="serial[]"></label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" value="Video" name="arr[]" >Video<input style="width: 50px; margin-top: 5px; margin-left: 20px" type="number" name="serial[]"></label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" value="Image" name="arr[]" >Image<input style="width: 50px; margin-top: 5px; margin-left: 20px" type="number" name="serial[]"></label>
</div>
<div>
	<button class="btn btn-success">update</button>
</div>
</form>
</div>
</div>

  
   <!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
  </body>
</html>