<!DOCTYPE html>
<html>
<head>
<title>Display Records</title>
</head>

<body>
<div class="container">
  <div>
     <?php echo $this->session->flashdata('content'); ?>
  </div>
<table width="800" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
   
    <th>Template Name</th>
 
    <th> Action </th>
  </tr>

    <?php foreach($temp as $tem){ ?>

  <tr>

    <th><?php echo $tem->temp_name ?></th>
   
    
    <th>
         <a href="<?php echo base_url('content/add_content/'.$tem->id);?>"><button class="btn btn-info">Add Contents</button></a>       
        
      </th>
    
  </tr>
  <?php }?>
  
  
</table>
</div>

</body>
</html>