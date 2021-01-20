
<!DOCTYPE html>
<html>
<head>
	<title>Sub Menu</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <style type="text/css">

	 
	 </style>
</head>

<body>

<div class="container mt-5">
	<h3 class="text-center" >Contents</h3>
  <div class="row">
    <?php 
       if(!empty($link)){ ?>
       <a href="<?php echo $link ?>">Click Here</a> 
   <?php
     }else{ ?>
     <!-- <div class="text-center bg-info mb-5 p-2"> -->
     <?php foreach($content as $con){ ?>
     <div class="col-md-4" >
  <div class="card my-2" style="height: 750px">
  <div class="card-body">
    
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
    </div>
    </div>  
       <?php  } ?>

<!--  </div> -->
  <?php }
    

 ?>
  </div>
</div>

</body>
</html>