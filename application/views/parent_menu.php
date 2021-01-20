
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <style type="text/css">
	 	.txt{
	 		margin-top: -20px;
	 	}
	 
	 </style>
</head>

<body>

<div class="container mt-5">
	<h3 class="text-center" >Menu</h3>
  <div class="row">
  <?php foreach($parent as $main) {?>	
   <a style="text-decoration: none" href="<?php echo base_url('data/sub_menu/'.$main->id);?>">
  <div class="col-md-3">

    <div class="card my-2" style="height: 100px;width: 150px">
    	<img class="card-img-top" style="height: 70px" src="<?php echo base_url($main->icon)?>">
    	<div class="txt text-center text-uppercase font-weight-bold text-danger card-body">
        	<p ><?php echo $main->name?> </p>
      	</div>
    </div>
      
  </div>
  </a>

<?php }?>
    
  </div>
</div>

</body>
</html>