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
  <h1>Assignment Details</h1><br>
  <center><h2>Course Name</center>
  <div class="row">
    <div class="col-md-12">
  <table class="table table-bordered table-condensed table-hover">
  <thead class="">
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
      <td><a href="#"><span class="glyphicon glyphicon-folder-open" style="color: yellow; font-size: 25px;"></span>  Directory 1</a></td>
      <td>2016-12-1</td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
      <td><form name="f1" action="#" >
          <input id="edit1" type="button" name="edit" value="See submissions">
          </form>
      </td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td><a href="#"><span class="glyphicon glyphicon-folder-open" style="color: yellow; font-size: 25px;"></span>  Directory 1</a></td>
      <td>2016-12-1</td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td><a href="#"><span class="glyphicon glyphicon-folder-open" style="color: yellow; font-size: 25px;"></span>  Directory 1</a></td>
      <td>2016-12-1</td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td><a href="#"><span class="glyphicon glyphicon-folder-open" style="color: yellow; font-size: 25px;"></span> Directory 1</a></td>
      <td>2016-12-1</td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td><a href="#"><span class="glyphicon glyphicon-folder-open" style="color: yellow; font-size: 25px;"></span>  Directory 1</a></td>
      <td>2016-12-1</td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
    </tr>
  </tbody>
</table>

    </div>
  </div>
</div>

   

<?php include '../components/course_footer.php'; ?>


