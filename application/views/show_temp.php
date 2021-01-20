<!DOCTYPE html>
<html>
<head>
<title>Display Records</title>
</head>

<body>
<div class="container">
  <div class="my-2">
            <?php echo $this->session->flashdata('submit'); ?>
      </div>
<table width="800" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
   
    <th>Template Name</th>
   
    <th>Contents</th>
    <th> Action </th>
  </tr>

    <?php foreach($temp as $tem){ ?>

  <tr>
    <th><?php echo $tem->temp_name ?></th>
   
    <th><?php echo $tem->contents ?></th>
    <th>
         <a href="<?php echo base_url('template/edits_temp/'.$tem->id);?>"><button>Edit</button></a>       
         <a onclick="return confirm('Are you Sure?')" href="<?php echo base_url('template/delete_temp/'.$tem->id);?>"><button>Delete</button></a>
      </th>
    
  </tr>
  <?php }?>
  
  
</table>
</div>

</body>
</html>