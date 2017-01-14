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

   
    


$('#ss').click(function(){



    $('#mytable tr.item').each(function(){

        $(this).find('td').each(function(){


            if ( $( this ).hasClass( "id" ) ) {
                var sid = $(this).html();
                console.log(sid);

            }

            if ( $( this ).hasClass( "mark" ) ) {

               var check =  $('#check_list').prop('checked', true);

                console.log(check);

            }




        });
    });

});
  
});





</script>

    </head>
    <body>

    <?php include "comp/navbar.php"; ?>
	<ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="active"><a href="">UNREGISTERED STUDENTS</a></li>
        

</ul>

    </br>

</head>

<body background="">

    <div class="container">
    <div class="row">
        
        
        <div class="col-md-12">
        <center><h2>Unregistered Students</h2></center>
        <div class="table-responsive">

            <?php $res = unregistered($con); ?>
                      
              <table id="mytable" class="table table-hover">
                   <thead>
                       <tr>
                            <th>id</th>
                           <th>Name</th>
                           <th>Course</th>
                           <th>NIC</th>
                           <th>Register <!--<input type="checkbox" id="selectall"  >--></th>
                       </tr>
                   </thead>

                   <tbody>

                   
                   <?php while ($row = $res->fetch_assoc()) {
						?>
                       <tr class="item">
                            <td class="id"><?php echo $row['id']; ?></td>
                           <td><?php echo $row['name_w_initials']; ?></td>
                           <td><?php echo $row['coursename']; ?></td>
                           <td><?php echo $row['nic']; ?></td>
                           <td class="mark">
						   <?php
						   
						   echo "<center>
                               <a href='markr.php?nic=".$row['nic']."&name=".$row['name_w_initials']."&subid=".$row['coursename']."' class='btn btn-primary' type='submit' name='next'>Enter payment details</a>
                           </center></td>";
						   ?>
                       </tr>
<?php } ?>
               
          </tbody>
        
</table>  





            </div>
            
        </div>
    </div>
</div>




<?php include "../components/page_tail.php";?>


    

 
