


<?php
require '../core/init.php';
error_reporting(0);

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}



header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=members.csv');

$output = "id,first_name,last_name,email,password,role\n";
$sql = 'SELECT * FROM staff ORDER BY id ASC';
$query = $con->prepare($sql);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
$output .= $rs['id'].",".$rs['first_name'].",".$rs['last_name'].",".$rs['email'].",".$rs['password'].",".$rs['role']."\n";
}
// export the output
echo $output;
exit;

?>