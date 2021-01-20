<!DOCTYPE html>
<html>
<head>
<title>Display Records</title>
</head>

<body>
<div class="container">
  <h1 style="margin-bottom: 20px" class="text-info font-weight-bold"> Choose your Contents </h1>
     <?php $temp_id=$id;?>
     <form action="<?php echo base_url('content/data_add_content/'.$temp_id);?>" method="post" enctype="multipart/form-data">
    <?php
     $length=count($content);

     for($i = 0; $i < $length; $i+=1){
      ?>

      <?php if($content[$i]=='Text'){?>
      <div class="form-group" style="margin-bottom: 20px"> 
    
    <input type="hidden" name="demotext" value="demotext"><br>
    <label for="exampleInputEmail1" >Text</label>
    <input type="text" class="form-control " name="text" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Text">
   </div>
<?php }?>
  <?php if($content[$i]=='Audio'){?>
    <div class="input-group mb-2" style="margin-bottom: 20px">
     <div class="input-group-prepend">
      <input type="hidden" name="demoaudio" value="demoaudio">
    <label class="custom-file-label" for="inputGroupFile01">Choose Audio file</label>
    </div>
   <div class="custom-file">
    <input type="file" class="custom-file-input" name ="audio" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01">
   
       </div>
       </div>
   <?php }?>
   <?php if($content[$i]=='Video'){?>
     <div class="input-group mb-2" style="margin-bottom: 20px">
     <div class="input-group-prepend">
      <input type="hidden" name="demovideo" value="demovideo">
     <label class="custom-file-label" for="inputGroupFile01">Choose Video file</label>
    </div>
   <div class="custom-file">
    <input type="file" class="custom-file-input" name="video" id="inputGroupFile02"
      aria-describedby="inputGroupFileAddon02">
   
       </div>
       </div>
   <?php }?>
    <?php if($content[$i]=='Image'){?>
      <div class="input-group" style="margin-bottom: 20px">
     <div class="input-group-prepend">
    <input type="hidden" name="demoimage" value="demoimage">
   <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
    </div>
   <div class="custom-file">
    <input type="file" class="custom-file-input" name="image" id="inputGroupFile03"
      aria-describedby="inputGroupFileAddon03">
    
       </div>
       </div>
     <?php }?>
     <?php }?>
     <button class="btn btn-info">Submit</button>
  </form>

</div>

</body>
</html>

