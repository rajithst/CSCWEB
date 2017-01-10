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



<!--start of the navbar<!-->
<?php include "comp/navbar.php"; ?>


<div class="container-fluid">    
  <h1>Directory 1 Submissions</h1><br>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>Student Id</th>
      <th>Submission</th>
      <th>Submitted Date</th>
      <th>Submitted Time</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td><a href="#"><span class=" glyphicon glyphicon-file" style="color: yellow; font-size: 25px;"></span>  File Name</a></td>
      <td>2016-12-1</td>
      <td>11.55 pm</td>
      <td><form><input type="checkbx" name="checkbox"><button></button>></form></td>
    </tr>
    <tr>
      <td>1</td>
      <td><a href="#"><span class=" glyphicon glyphicon-file" style="color: yellow; font-size: 25px;"></span>  File Name</a></td>
      <td>2016-12-1</td>
      <td>11.55 pm</td>
    </tr>
    <tr>
      <td>1</td>
      <td><a href="#"><span class=" glyphicon glyphicon-file" style="color: yellow; font-size: 25px;"></span>  File Name</a></td>
      <td>2016-12-1</td>
      <td>11.55 pm</td>
    </tr>
    <tr>
      <td>1</td>
      <td><a href="#"><span class=" glyphicon glyphicon-file" style="color: yellow; font-size: 25px;"></span>  File Name</a></td>
      <td>2016-12-1</td>
      <td>11.55 pm</td>
    </tr>
    <tr>
      <td>1</td>
      <td><a href="#"><span class=" glyphicon glyphicon-file" style="color: yellow; font-size: 25px;"></span>  File Name</a></td>
      <td>2016-12-1</td>
      <td>11.55 pm</td>
    </tr>
  </tbody>
</table>

    </div>
  </div>
</div>

   

<?php include '../components/course_footer.php'; ?>


