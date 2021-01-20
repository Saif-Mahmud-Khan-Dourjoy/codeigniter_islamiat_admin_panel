<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>

</head>
<body>

 <div class="my-2">
            <?php echo $this->session->flashdata('submit'); ?>
 </div>
	<form action="<?php echo base_url('menu/add_menu');?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="icon">Select Icon</label>
    <input type="file" class="form-control" id="icon" name="icon">
    
  </div>


  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
  </div>


    <div class="checkbox">
  <label><input type="checkbox" checked="true" id="parent" onclick="myFunction()" name="parent">Parent? </label>
</div>
 



<div id="ext_link" style="display: none">
   <div class="form-group" id="parent_menu">
    <label for="parent_menu">Select Parent</label>
    <select  name="parent_menu">
      <option value="">Select</option>
      <?php
           
          $this->db->select("*");
           $this->db->from("menu");
           $this->db->where('parent_id',0);
          $qu=$this->db->get();
          $res['menu']= $qu->result();
          
          foreach ($res['menu'] as $key => $menu) { ?>
            <option value=<?php echo $menu->id?>><?php echo $menu->name?></option>
        <?php  } ?>
    </select>
  </div>
   <div class="checkbox">
  <label><input type="checkbox" checked="true" id="ext_link" onclick="myFunction2()" name="ext_link">Ext_link? </label>
</div>

 <div class="form-group" id="ext_link_main" >
    <label for="ext_link">External Link</label>
    <input type="text" class="form-control" name="ext_link_data" id="ext_link_data" placeholder="External Link">
  </div>
  </div>
  
 
  <div class="form-group" style="display: none" id="template_div">
    <label for="template">Select Template</label>
    <select  name="template">
      <option value="">Select</option>
       <?php 
       foreach($temp as $tem){?>
      <option value=<?php echo $tem->id?>><?php echo $tem->temp_name?></option>
       <?php }?>
      
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script type="text/javascript">
	function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("parent");
  // Get the output text
  var  ext_link= document.getElementById("ext_link");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    ext_link.style.display = "none";
  } else {
    ext_link.style.display = "block";
  }
}

  function myFunction2() {
  // Get the checkbox
  var checkBox1 = document.getElementById("ext_link");
  // Get the output text
  var  ext_link_main= document.getElementById("ext_link_main");
  var  template_div= document.getElementById("template_div");

  // If the checkbox is checked, display the output text
  if (checkBox1.checked == true){
    ext_link_main.style.display = "block";
    template_div.style.display = "none";
  } else {
    ext_link_main.style.display = "none";
    template_div.style.display = "block";
  }
}
</script>


</body>
</html>