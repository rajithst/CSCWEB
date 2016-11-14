<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';
require '../core/function/staff.php';
include '../components/page_head.php'; ?>

<script>

$(document).ready(function(){

   
    $('#mytable').DataTable();

$("#selectall").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});

$('#ss').click(function(){
    
      /* $("tr.item").each(function() {*/
        if($("#checkboxId").prop('checked') == true){
            //var quantity1 = $(this).find("td").val();
            console.log('true');

        }else{

           console.log('false');
        }
           
    

        
   
/*});*/
  
});

});



</script>
    </head>
    <body>

    <?php include "comp/navbar.php"; ?>

    </br>

</head>

<body background="">

    <div class="container">
    <div class="row">
        
        
        <div class="col-md-12">
        <h2>Unregistered Students</h2>
        <div class="table-responsive">

            <?php $res = unregistered(); ?>     
            <form action="" method="post">           
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                       <tr>
                            <th>id</th>
                           <th>Name</th>
                           <th>Course</th>
                           <th>NIC</th>
                           <th>Register <input type="checkbox" id="selectall" id="checkboxId"></th>
                       </tr>
                   </thead>

                   <tbody>

                   
                   <?php while ($row = $res->fetch_assoc()) { ?>
                       <tr class="item">
                            <td><?php echo $row['id']; ?></td>
                           <td><?php echo $row['fullname']; ?></td>
                           <td><?php echo $row['coursename']; ?></td>
                           <td><?php echo $row['nic']; ?></td>
                           <td><center>
                               <input type="checkbox" value="1" name="check_list[]">
                           </center></td>
                       </tr>
<?php } ?>
               
          </tbody>
        
</table>  


</form>   

<button type="submit" name="submit" id="ss">Submit</button> 
       
            </div>
            
        </div>
    </div>
</div>




<?php include "../components/page_tail.php";?>


    

 
