<?php 
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


          <!-- Modal -->
          <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="process_register.php" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Entrer votre nom">
                  </div>
                  <div class="form-group">
                    <label>Position</label>
                    <input type="text" name="position" class="form-control" placeholder="Entrer votre position">
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Rank</label>
                    <input type="text" name="rank" class="form-control" placeholder="Entrer le rank entre 1 et 3">
                  </div>
                  <div class="form-group">
                    <label>Mot de passe </label>
                    <input type="password" name="password" class="form-control" placeholder="Entrer le mot de passe">
                  </div>
                  <div class="form-group">
                    <label>Confirmer le mot de passe</label>
                    <input type="pasword" name="confirmpassword" class="form-control" placeholder="Confirmer le mot de passe">
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="registerbtn" class="btn btn-primary">Enregistrer</button>
                </div>
                </form>
              </div>
            </div>
          </div>    
          


          <div class="row">
                <div class="container-fluid">
                  <!-- Data Table Exemple -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Users Profile
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile" style="margin-left:50px">
                          Ajouter nouveau utilisateur
                        </button>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Date de debut</th>
                          <th>rank</th>
                          <th>Mot de passe</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>    
                  </div>
                </div>
             </div>




                    

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



 <?php 

      include ('includes/scripts.php');
      include ('includes/footer.php');
?>