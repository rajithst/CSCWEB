<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';
require '../core/function/cscco.php';

include '../components/cscordinator_head.php'; ?>


</head>
<body>


<?php include "comp/navbar.php"; ?>


<br>

<center>
    <h2>Old Posts</h2>
</center>

<div class="container-fluid">
    <div class="row">

        <section class="content">
            <div class="col-md-8 col-md-offset-2">

                            <table class="table table-condensed" id="posts">

                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Subject</th>
                                    <th>Published by</th>



                                </tr>

                                </thead>
                                <tbody>

                                <?php
                                $posts = getpostss($con);


                                while ($row = mysqli_fetch_assoc($posts)) {

                                $id = $row['adminid'];

                                $admindata = getadmins($con,$id);
                                while ($data = mysqli_fetch_assoc($admindata)) {

                                    $subj = $row['subject'];
                                ?>


                                    <tr >

                                        <td><?php echo $row['date']; ?></td>
                                        <td><a href="readpost.php?id=<?php echo $subj; ?>"><?php echo $row['subject']; ?></a></td>
                                        <td><img src="<?php echo $data['profile']; ?>" alt="" style="width: 5%; height: 10%;">    <?php echo $data['name']; ?></td>
                                    </tr>


                                <?php }
                                }



                                ?>


                                </tbody><?php echo $row['subject']; ?>
                            </table>


                <center>
                    <a href="index.php"><button class="btn btn-info">Go back</button></a>
                </center>

            </div>
        </section>

    </div>
</div>

<?php include "../components/cscordinator_footer.php"; ?>

<script>


    $(document).ready(function(){
        $('#posts').DataTable();
    });
</script>
