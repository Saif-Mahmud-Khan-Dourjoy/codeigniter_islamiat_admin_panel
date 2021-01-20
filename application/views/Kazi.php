<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
    	
    </style>

    <title>Templates</title>
  </head>
  <body>
  	<div class="container">
    <div class="jumbotron">
  <h3 class=" text-uppercase text-info text-center" >Contents Of <?php echo $content[0]->temp_name?></h3>
  <hr class="my-4">
   <?php foreach($content as $con){?>
   <div class="text-center bg-info mb-5 p-2">
  	<?php if($con->text){?>
  
  	
  	 <div style="margin-bottom: 30px; margin-top: 5px">
  	 <h3 style="font-weight: 400;" class="text-capitalize"><a style="text-decoration: none; color: #283747  ;" href="<?php echo base_url('data/single_view/'.$con->id);?>"><?php echo $con->text ?></a></h3>
  	</div>
  	
  	<?php } ?>
  	<?php if($con->audio){?>
  	<div style="margin-bottom:30px;">
  	
  	<audio controls>
          <source src="<?php echo base_url($con->audio) ?>" type="audio/mp3">
    </audio>
     </div>
  	<?php } ?>
  	<?php if($con->video){?>
  	<div style="margin-bottom:30px;">  	
  	<video width="320" height="240" controls>
          <source src="<?php echo base_url($con->video) ?>" type="video/mp4">
    </video>
    </div>

  	<?php } ?>
  	<?php if($con->image){?>
  	<div>
  	
  	 <img style="height: 230px; width: 320px" src="<?php echo base_url($con->image) ?>">
  	</div>
  	<?php } ?>
  	</div>
  <?php }?>
  	

 

 
  
</div>
</div>









  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>























<!-- <!doctype html>
<html lang="en">
  <head> -->
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Bootstrap CSS -->
  <!--   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Templates</title>
  </head>
  <body> -->
<!--   	<div class="container">
    <div class="jumbotron">
  <h3 class="display-4 text-uppercase text-info text-center" >Contents Of <?php echo $content[0]->temp_name?></h3>
  <hr class="my-4">
   <?php foreach($content as $con){?>
   <div class="text-center">
  	<?php if($con->text){?>
  	<div>
  	<div>
  	<h4 class="text-info">Text: </h4>
  	</div>
  	 <div>
  	 <h3 style="font-weight: 400" class="text-uppercase"><?php echo $con->text ?></h3>
  	</div>
  	</div>
  	<?php } ?>
  	<?php if($con->audio){?>
  	<div>
  	<h4 class="text-info">Audio: </h4>
  	<audio controls>
          <source src="<?php echo base_url($con->audio) ?>" type="audio/mp3">
    </audio>
     </div>
  	<?php } ?>
  	<?php if($con->video){?>
  	<div>  	<h4 class="text-info">Video: </h4>
  	<video width="320" height="240" controls>
          <source src="<?php echo base_url($con->video) ?>" type="video/mp4">
    </video>
    </div>

  	<?php } ?>
  	<?php if($con->image){?>
  	<div>
  	<h4 class="text-info">Image: </h4>
  	 <img style="height: 230px; width: 320px" src="<?php echo base_url($con->image) ?>">
  	</div>
  	<?php } ?>
  	</div>
  <?php }?>
  	

 

 
  
</div>
</div> -->









 <!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body> -->
<!-- </html> -->

