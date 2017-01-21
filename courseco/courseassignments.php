<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}

require '../core/init.php';
require '../core/function/coursecode.php';
include '../components/course_head.php'; ?>


</head>
<body>

<?php
if (isset($_GET['id'])) {
    $subid = $_GET['id'];

    $res = getslides($con,$subid);
    while ($row = mysqli_fetch_assoc($res)) {

        $subname = $row['subject'];
        $subid = $row['subjectid'];


    }
}


?>

<!--start of the navbar<!-->
<?php include "comp/navbar.php"; ?>
<div class="row">
  <ul class="breadcrum">
        <li class="completed"><a href="index.php">Home</a></li>
        <li class="completed"><a href="fileupload.php?id=<?php echo $subid; ?>">Add Learning materials</a></li>
        <li class="completed"><a href="addnewassignment.php?id=<?php echo $subid?>">Make Submission Link</a></li>
        <li class="active"><a href="courseassignments.php?id=<?php echo $subid; ?>">View Assignments</a></li>

    </ul>
</div>

</br>

<div class="container-fluid">    
  <center><h1>Assignment Details</h1><center><br>
  <center><h3 style="margin-top: -15px;"><?php echo $subname; ?></h3></center>  <div class="row">
    


    <div class="sidenav col-md-2 col-sm-12 col-xs-12" style="margin-top: 0px;">

        <center>
            <h3>Main menu</h3>
        </center>
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close" style="color: blue; font-size: 20px;">
              </span>Content</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body" style="padding: 0;">
                        <table class="table" style="margin-bottom: 0px;">
                            <tr>
                                <td style="padding-left: 15px;">
                                    <span class="glyphicon glyphicon-pencil text-success" style="margin-right: 10px; color: blue; font-size: 40px;" ></span><a href="courseassignments.php?id=<?php echo $subid; ?>">View Assignments</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="glyphicon glyphicon-pencil text-success" style="margin-right: 10px; color: blue; font-size: 40px;"></span><a href="addnewassignment.php?id=<?php echo $subid?>">Add new Assignment</a>
                                </td>
                            </tr>
                            <!--<tr>
                                <td>
                                    <span class="glyphicon glyphicon-file text-success" style="margin-right: 10px;"></span><a href="http://www.jquery2dotnet.com">Newsletters</a>
                                </td>
                            </tr>-->
                        </table>
                    </div>
                </div>
            </div>


        </div>



        <!--<center><h3> Event Calender</h3></center>
        <div class="monthly" id="mycalendar"></div>-->

    </div>
  
<div class="col-md-10 col-sm-12 col-xs-12" id="tableass">
<?php


  $submissionDetails = getSubmissionData($con,$subid);
  if(mysqli_num_rows($submissionDetails) > 0){
    echo '<form action="" name="deleteform" method="post"  id="">';
    echo '<table class="table table-striped table-inverse">
  <thead class="">
  <tr>
      <th>Link Title</th>
      <th>Submitted Date</th>
      <th>Due Date</th>
      <th style="width: 80px;"></th>
      <th style="width: 80px;"></th>
    </tr>';
    echo '<tbody>';
    while($row = mysqli_fetch_assoc($submissionDetails)){
      /*echo '<tr id="<?php echo $row['.'linktitle'.']?>">';*/
      echo '<tr>';
      echo "<th name='linktitle'><a href=submissionslist.php?assid=".$row['id']."&subid=".$subid.">"."<span class="."glyphicon glyphicon-pencil text-success"."></span>" .$row['linktitle']."</a></th>";
      echo '<td>'.$row["submitted_date"].'</td>';
      echo '<td>'.gmdate("F j, Y, g:i a", $row["edateandtime"]).'</td>';
      //echo '<td>'."endtime".'</td>';
      
      /*echo '<td><button id="<?php echo $row['.'linktitle'.']?>" type="button" class="btn btn-danger" onclick="remove_row(<?php echo $row['.'linktitle'.']?>)">Remove</button></td>';*/
      echo "<td><button type='button' class='btn btn-danger deleteass' id='" . $row['id']."'>Remove</button></td>";
      echo "<td><button type='button' class='btn btn-danger editass' id='" . $row['id']."'>Edit</button></td>";
      //echo "<td><button type='button' class='btn btn-danger editass' onclick='load_edit_page(".$row['id'].")' id='" . $row['id']."'>Edit</button></td>";

      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</form>';
  }else{ ?>
   
   <center>
   
   
            <div class="alert alert-info">
            <strong>No Assignment has been submitted for this subject yet !</strong>
            </div>
   
   
   </center>
   
 <?php  
  }
  

?>
</div>




              
    
  </div>
</div>
  </div>
</div>

   

<?php include '../components/course_footer.php'; ?>

<script type="text/javascript">

$(document).ready(function(){

$('button.deleteass').click(function(){

  var assid = this.id;
  swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
          }).then(function () {

           
          $.ajax({
                type: "POST",
                url: "deleteassignment.php?assid="+assid+"&subid=<?php echo $subid; ?>" ,
                success:function(data) {

                  /*$('#tableass').html("");
                  $('#tableass').html(data);*/

                  location.reload();


                
                }
               });


              
            
          }, function (dismiss) {
     
            if (dismiss === 'cancel') {
              swal(
                'Cancelled',
                'Your ipost is safe',
                'error'
              )
            }
          })


  
})



})


$(document).ready(function(){

$('button.editass').click(function(){

  var assid = this.id;
  window.location.href = "editsubmissionlink.php?assid="+assid+"&subid=<?php echo $subid; ?>";
           
  })



})














</script>
