<?php 
     ob_start();
    session_start();
    $title = "Tableau Admin";
    include ('includes/header.php');
    include ('includes/navbar.php');
 ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include ('includes/topbar.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->




<?php 

      include ('includes/scripts.php');
      include ('includes/footer.php');
  ob_end_flush();
?>

