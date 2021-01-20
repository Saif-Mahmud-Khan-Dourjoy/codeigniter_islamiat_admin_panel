<!DOCTYPE html>
<html>
<head>
<title>Display Records</title>
</head>

<body>
<div class="container">
  <div class="my-2">
            <?php echo $this->session->flashdata('content_update'); ?>
      </div>
<table  border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
   
    <th>Template Name</th>
   
    <th>Text</th>
    <th>Audio</th>
    <th>Video</th>
    <th>Image</th>
    <th> Action </th>
  </tr>

    <?php foreach($content as $con){ ?>

  <tr>
    <th><?php echo $con->temp_name ?></th>
    <th><?php echo $con->text ?></th>
   
    <th><audio controls>
          <source src="<?php echo base_url($con->audio) ?>" type="audio/mp3">
        </audio>
    </th>
     <th>
      <video width="320" height="240" controls>
          <source src="<?php echo base_url($con->video) ?>" type="video/mp4">
      </video>
    </th>
    <th>

      <img src="<?php echo base_url($con->image) ?>">
    </th>

    <th>
         <a href="<?php echo base_url('content/edits_content/'.$con->id);?>"><button>Edit</button></a>       
         <a onclick="return confirm('Are you Sure?')" href="<?php echo base_url('content/delete_content/'.$con->id);?>"><button>Delete</button></a>
      </th>
    
  </tr>
  <?php }?>
  
  
</table>
</div>

</body>
</html>