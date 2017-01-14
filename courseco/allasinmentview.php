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
  <h1><center>Assignment Details</center></h1><br>
    <div class="row">
     <div class="col-md-3">
     <h4>Select Course :</h4>
     </div>
      <div class="col-md-9">
      <div class="form-group">
      <select class="selectpicker form-control">
        <option>Course 1</option>
        <option>Course 2</option>
        <option>Course 3</option>
      </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>Link Title</th>
      <th>Directory</th>
      <th>Submitted Date</th>
      <th>Due Date</th>
      <th>Due Time</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

    </div>
  </div>
</div>

   

<?php include '../components/course_footer.php'; ?>


