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



    $('#mytable tr.item').each(function(){
        $(this).find('td').each(function(){

            if ( $( this ).hasClass( "id" ) ) {
                var sid = $(this).html();
                console.log(sid);

            }

            if ( $( this ).hasClass( "mark" ) ) {

                var smark = $('.checkboxm').is(":checked");

                console.log(smark);






            }


/*

            if ( $( this ).hasClass( "id" ) ) {


            }

*/



        });
    });

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

            <?php $res = unregistered($con); ?>
            <form action="" method="post">           
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                       <tr>
                            <th>id</th>
                           <th>Name</th>
                           <th>Course</th>
                           <th>NIC</th>
                           <th>Register <input type="checkbox" id="selectall"  ></th>
                       </tr>
                   </thead>

                   <tbody>

                   
                   <?php while ($row = $res->fetch_assoc()) { ?>
                       <tr class="item">
                            <td class="id"><?php echo $row['id']; ?></td>
                           <td><?php echo $row['fullname']; ?></td>
                           <td><?php echo $row['coursename']; ?></td>
                           <td><?php echo $row['nic']; ?></td>
                           <td class="mark"><center>
                               <input type="checkbox" value="1" name="check_list[]" class="checkboxm">
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


    

 
