
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Templates</title>
  </head>
  <body>
  	<div class="container">
    <div class="jumbotron">
  <h1 class="display-4 text-info text-center" >Templates</h1>
  <!-- <button class="print">Print</button> -->
  <hr class="my-4">
  <div>
            <?php echo $this->session->flashdata('no'); ?>
      </div>
  <table style="width: 90%" align="center" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
   
    <th >ID NO#</th>
    <th>Template Name</th>
   
    <th> Contents </th>
  </tr>

    <?php foreach($temp as $tem){ ?>

  <tr>
    <th><?php echo $tem->id ?>#</th>
    <th><?php echo $tem->temp_name ?></th>
    <th>
     

      <a href="<?php echo base_url('data/'.$tem->temp_name);?>"><button class="btn btn-info">Contents</button></a> 
       

      </th>
    
  </tr>
  <?php }?>
  
  
</table>
  
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <!--  <script type="text/javascript">
      $(".print").click(function(){
        window.print();
      })
    </script> -->
  </body>
</html>
<!-- 
 <a href="<?php echo base_url('data/'.$tem->temp_name.'/'.$tem->id);?>"><button class="btn btn-info">Contents</button></a> 
 -->

  <!-- <form method="post" action="<?php echo base_url('data/'.$tem->temp_name);?>" >
        <input type="hidden" name="id" value=<?php echo $tem->id;?> >
        <button class="btn btn-info">Content</button>
        
      </form> -->





