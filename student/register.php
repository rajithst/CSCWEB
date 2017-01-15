<?php 

require '../core/base_connection.php';
require '../core/function/student.php';
//require '../core/function/cscco.php';
require '../components/stud_head.php';


?>
<link rel="stylesheet" href="../public/dist/css/student.css">
 <link rel="stylesheet" href="../public/dist/css/studentlogin.css">
<style type="text/css">
  #section{margin-bottom: 20px; }
</style>
    </head>

    <body>

    <header>
    <div class="container">
    <div class="row">
        <div class="col-sm-6" style="margin-top: -14px;">
            <div class="logo"><h3>Computing Service Center Student Portial</h3></div>
        </div>
        <div class="col-sm-6" align="right" >
          <a href="index.php" class="btn btn-primary">Log In</a>
        </div>
    </div>
    </div>
  </header>


<?php

  require '../core/base_connection.php';

  if(!$con){
    die('Cannot connect to the database.');
  }

  $subdetails=getsubdetails($con);

  while($row=mysqli_fetch_array($subdetails)){
    $subid[]=$row[0];
    $subname[]=$row[1];
  }

  $courseErr=$fullnameErr=$ininameErr=$genderErr=$dobErr=$nicErr=$peraddressErr=$mobileErr=$emailErr=$howknowErr='';
  

  if (isset($_POST['submit'])){

    if(empty($_POST['course'])){
      $courseErr='Selecting a course is required.' ;
    }

    if(empty($_POST['fullname'])){
      $fullnameErr='Full name is required.' ;
    }else{
      if(!preg_match('/^[a-zA-Z ]*$/', $_POST['fullname'])){
        $fullnameErr='Only letters and white spaces are allowed.' ;
      }
    }

    if(empty($_POST['ininame'])){
      $ininameErr='* Name with initials are required.' ;
    }else{if(!preg_match('/^[a-zA-Z ]*$/', $_POST['ininame'])){
        $ininameErr='* Only letters and white spaces are allowed.' ;
      }
    }

    if(empty($_POST['gender'])){
      $genderErr='Gender is required.' ;
    }

    if(empty($_POST['dob'])){
      $dobErr= 'Date of birth is required.' ;
    }

    if(empty($_POST['nic'])){
      $nicErr= 'National Identity card number is required';
    }

    if(empty($_POST['peraddress'])){
      $peraddressErr='Permanent address is required.' ;
    }
  
    if(empty($_POST['mobile'])){
      $mobileErr='Mobile number is required.';
    }

    if(empty($_POST['email'])){
      $emailErr='Personal Email is required.';
    }

  }

  function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
  }

?>


<div class="container" style="margin-top: 10px; margin-bottom: 40px; font-size: 18px;">
  
  <div class="panel panel-default">
    <div class="panel-heading"><h3 style="margin-left: 
    10px;"><strong>Application Form</strong></h3></div>
    <div class="panel-body" style="padding: 25px;">

    <form action="" method="post">
      <div class="row">
      
           
           <div class="col-sm-12 col-xs-12" id="section"> 
            <label style="margin-left: 0px;"> Course Name :</label>
            <span style="color:red ;font-size: 13px;"> * <?php echo $courseErr; ?> </span>
           
            <div class="col-sm-12 col-xs-12" id="section">
              <div class="form-group">
                <select class="form-control" name="coursename" style="margin-left: 0px;width:50%">
                  <option style="width:50px;">-- Select Course --</option>
                <?php
              
                  for ($i=0; $i <sizeof($subname) ; $i++) { 
            
                ?>

                  <option style="width:50px;"><?php echo $subname[$i] ; ?></option>

                <?php

                }

                ?>
                </select>
            </div>
          </div>
          </div>
          

        <div class="col-sm-12 col-xs-12" id="section">
          <label class="control-label">Name</label>
          <span style="color:red ;font-size: 13px;"> *
           <?php echo $fullnameErr;?> </span>
          <input type="text" class="form-control" name="fullname" placeholder="Full Name" style="margin-left: 15px; margin-bottom: 5px; width: 90%;">
          <span style="color:red ;font-size: 13px;"><?php echo $ininameErr; ?> </span>
          <input type="text" class="form-control" name="ininame" placeholder="Name With Initials" style="margin-left: 15px; width: 90%;">
        </div>
        <br>

        <label class="control-label" for="dob" style="margin-left: 15px;">Date of Birth</label>
        <span style="color:red;font-size: 13px;"> * <?php echo $dobErr ; ?></span>
        <div class="col-sm-12 col-xs-12" id="section">
          <div class="col-sm-2 col-xs-10" style="margin-left: 0;"> 
            <input type="text" class="form-control" name="dob" placeholder="DD-MM-YY">
          </div>
          <div class="col-sm-10 col-xs-2"></div>
        </div>
        <br>

        <div class="col-sm-12 col-xs-12" id="section">
          <label class="control-label">Gender</label>
          <span style="color:red;font-size: 13px;"> * <?php echo $genderErr ; ?></span>
          <br>
          <input type="radio" name="gender" value="male" style="margin-left: 15px;">Male
          <input type="radio" name="gender" value="female" style="margin-left: 15px;">Female
        </div>
        <br>

        <label class="control-label" style="margin-left: 15px;">National Identity Card Number</label>
        <span style="color:red;font-size: 13px;"> * <?php echo $nicErr ; ?></span>
        <div class="col-sm-12 col-xs-12" id="section">
          <div class="col-sm-3 col-xs-10" style="margin-left: 0;"> 
            <input type="text" class="form-control" name="nic" placeholder="NIC">
          </div>
          <div class="col-sm-9 col-xs-2"></div>
        </div>
        <br>

        <div class="col-sm-12 col-xs-12" id="section">

          <div class="col-sm-6 col-xs-12" id="section">
            <label class="control-label" >Permanent Address</label>
            <span style="color:red ;font-size: 13px;"> *
              <?php echo $peraddressErr; ?> </span>
            <div class="col-sm-12 col-xs-12" style="margin-left: 0;">
              <input type="textarea" class="form-control" name="peraddress" >
            </div>
            <br>
            <label class="control-label" >Telephone No.</label>
            <div class="col-sm-12 col-xs-12" style="margin-left: 0;">
              <input type="text" class="form-control" name="telephone" placeholder="94XXXXXXXXX">
            </div>
            <br>
            <label class="control-label" >Mobile No.</label>
            <span style="color:red ;font-size: 13px;"> *
              <?php echo $mobileErr; ?> </span>
            <div class="col-sm-12 col-xs-12" style="margin-left: 0;">
              <input type="text" class="form-control" name="mobile" placeholder="94XXXXXXXXX">
            </div>
            <br>
            <label class="control-label" style="margin-left: 0px;">Email</label>
            <span style="color:red;font-size: 13px;"> * <?php echo $emailErr ; ?></span>
            <div class="col-sm-12 col-xs-12" style="margin-left: 0;">
              <input type="email" class="form-control" name="email" placeholder="Personal@email.com">
            </div>
          </div>

          <div class="col-sm-6 col-xs-12" id="section">
            <label class="control-label">Work Place Address</label>
            <div class="col-sm-12 col-xs-12" style="margin-left: 0;">
              <input type="textarea" class="form-control" name="wrkaddress" >
            </div>
            <br>
            <label class="control-label" >Telephone No.</label>
            <div class="col-sm-12 col-xs-12" style="margin-left: 0;">
              <input type="text" class="form-control" name="wrkphone" placeholder="94XXXXXXXXX">
            </div>
            <br>
            <label class="control-label">Fax No.</label>
            <div class="col-sm-12 col-xs-12" style="margin-left: 0;">
              <input type="text" class="form-control" name="fax" placeholder="94XXXXXXXXX">
            </div>
            <br>
            <label class="control-label" style="margin-left: 0px;">Email</label>
            <div class="col-sm-12 col-xs-12" style="margin-left: 0;">
              <input type="email" class="form-control" name="workemail" placeholder="Workplace@email.com">
            </div>
          </div>
        </div>
        <br>


        <label class="control-label" style="margin-left: 15px;">Work Place & Designation</label>
        <div class="col-sm-12 col-xs-12" id="section">
          <div class="col-sm-6 col-xs-10" style="margin-left: 0;"> 
            <input type="text" class="form-control" name="wrkplace">
          </div>
          <div class="col-sm-6 col-xs-2"></div>
        </div>
        <br>

        <label class="control-label" style="margin-left: 15px;">Vehical Number</label>
        <div class="col-sm-12 col-xs-12" id="section">
          <div class="col-sm-3 col-xs-10" style="margin-left: 0;"> 
            <input type="text" class="form-control" name="vno" placeholder="XX-XXXX">
          </div>
          <div class="col-sm-9 col-xs-2"></div>
        </div>
        <br>

        <label style="margin-left: 15px;">How did you get to know about UCSC Short Term Training Courses?</label>
        <div class="col-sm-12 col-xs-12" id="section">
          <div class="col-sm-3 col-xs-6">
            <input type="checkbox" name="howknow" value="newspaper ad"> Newspaper Advertisement
          </div>
          <div class="col-sm-3 col-xs-6">
            <input type="checkbox" name="howknow" value="past student"> Past Student
          </div>
          <div class="col-sm-3 col-xs-6">
            <input type="checkbox" name="howknow" value="facebook"> Facebook
          </div>
          <div class="col-sm-3 col-xs-6">
            <input type="checkbox" name="howknow" value="search engine"> Search Engine
          </div>
        </div>
        <div class="col-sm-12 col-xs-12" id="section">
          <div class="col-sm-3 col-xs-6">
            <input type="checkbox" name="howknow" value="email marketing"> E-mail Marketing
          </div>
          <div class="col-sm-3 col-xs-6">
            <input type="checkbox" name="howknow" value="tv"> Telivision
          </div>
          <div class="col-sm-3 col-xs-6">
            <input type="checkbox" name="howknow" value="website"> Website Banners,LinKs,Posting
          </div>
          <div class="col-sm-3 col-xs-6">
            <input type="checkbox" name="howknow" value="other"> Other
            <input type="text" class="form-control" name="howknow_des" placeholder="Please specify">
          </div>
        </div>

        <div class="col-sm-12 col-xs-12">
          <center><h4><strong>Declaration</strong></h4></center>
          <p>I do hereby certify that the above particulars furnished by me are true and correct. In the event of my applicaation for registration being accepted, I shall abide by all the regulations governing external candidates of the University of Colombo School of Computing. I am also aware that 80% attendance is required to be entitled for the participation certificate.</p>
        </div>
        <br>
        <br>

        <div class="col-sm-2 col-xs-12" style="margin-top: 15px;">
          <input type="submit" value="Register" name="submit" class="btn btn-primary">
        </div>

      </div>

      <?php

     /*
      if(isset($_POST['submit'])){

        $reg_data= array(
        'name_title'=$_POST['title']
        'fullname'=$_POST['fullname'],
        'name_w_initials'=$_POST['ininame'],
        'coursename'=$POST['course'];
        'dob'=$_POST['dob'],
        'gender'=$_POST['gender'],
        'nic'=$_POST['nic'],
        'home_address'=$_POST['peraddress'],
        'mobile'=$_POST['mobie'],
        'home_tel'=$_POST['telephone'],
        'Workplace_designation'=$_POST['wrkplace'],
        'work_place_addr'=$_POST['wrkaddress'],
        'work_place_tel'=$_POST['wrkphone'],
        'work_place_email'=$_POST['workemail'],
        'work_place_fax'=$_POST['fax'],
        'vehical_no'=$_POST['vno'],
        'description_howknow'=$_POST['howknow_des'],
        'howknow'=$_POST['howknow'],
        'email'=$_POST['email'],
        

      );*/
    ?>
    </form>
    </div>
  </div>
</div>

</body>

<?php include "../components/stud_footer.php"; ?>
