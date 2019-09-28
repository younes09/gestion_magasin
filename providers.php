<?php 
     ob_start();
    session_start();
    $title = "Tableau Admin";
    include ('includes/connect.php');
    include ('includes/header.php');
    include ('includes/navbar.php');

    if(isset($_SESSION['username']))
    {

        if(isset($_POST['submit']))
        {
            $name = htmlentities($_POST['name']);
            $adress = htmlentities($_POST['adress']);
            $tel = htmlentities($_POST['tel']);
            $email = htmlentities($_POST['email']);
            $rc = htmlentities($_POST['rc']);
            $nif = htmlentities($_POST['nif']);

            $sql = $connect->prepare("SELECT * FROM providers WHERE name=?");
            $sql->execute(array($name));
            $row = $sql->rowCount();

            if($row == 0)
            {
                $sql1 = $connect->prepare("INSERT INTO providers(name, adress, tel, email, rc, nif) VALUES ('$name','$adress','$tel','$email','$rc','$nif')");
                $sql1->execute();
            }else
            {
                 $erreur =  'Ce nom existe déja';
            }
        }


        $Num= 1;
        $sql = $connect->prepare("SELECT * FROM providers ORDER BY id DESC");
        $sql->execute();
        $row = $sql->rowCount();
        $providers = $sql->fetchAll();
 ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include ('includes/topbar.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">







          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

          <script>
          $(document).ready(function(){
            $("#btnNewProduct").click(function(){
              $("#NewProduct").fadeToggle(1500);
            });
          });
          </script>

              <h1 style="text-align:center;margin:60px">Listes des Fournisseurs</h1>






                    <div class="row">
                      <div class="col-sm-1"></div>
                      <div class="col-sm-2">
                          <button id="btnNewProduct" class="btn btn-primary" style="font-size: 12px">Ajouter Nouveau Fournisseur</button>
                      </div>
                      <div class="col-sm-8" style="font-size:12px" >
                          <form method="POST" action="">
                          <div id="NewProduct" style="border:solid #ccc 0.5px;padding: 10px; border-radius : 10px; display:none">
                              <div class="row">

                              <div class="col-sm-4">
                                  <div class="form-group">
                                      <label for="name">Nom du Fournisseur :</label>
                                      <input type="text" class="form-control" id="name" name="name" style="font-size:12px" 
                                          autofocus autocomplete="off" value="" > 
                                  </div>
                              </div>
                              <div class="col-sm-4">
                                  <div class="form-group">
                                      <label for="adress">Adresse :</label>
                                      <input type="text" class="form-control" id="adress" name="adress" style="font-size:12px"
                                       autocomplete="off" value="" > 
                                  </div>
                              </div>
                              <div class="col-sm-4">

                                  <div class="form-group">
                                      <label for="tel">Telephone :</label>
                                      <input type="text" class="form-control" id="tel" name="tel" style="font-size:12px"
                                       autocomplete="off" value="" > 
                                  </div>
                              </div>
                              <div class="col-sm-4">

                                  <div class="form-group">
                                      <label for="email">Email :</label>
                                      <input type="text" class="form-control" id="email" name="email" style="font-size:12px"
                                       autocomplete="off" value="" > 
                                  </div>
                              </div>

                              <div class="col-sm-4">

                                  <div class="form-group">
                                      <label for="rc">RC N° :</label>
                                      <input type="text" class="form-control" id="rc" name="rc" style="font-size:12px"
                                       autocomplete="off" value="" > 
                                  </div>
                              </div>

                              <div class="col-sm-4">

                                  <div class="form-group">
                                      <label for="nif">NIF N° :</label>
                                      <input type="text" class="form-control" id="nif" name="nif" style="font-size:12px"
                                       autocomplete="off" value="" > 
                                  </div>
                              </div>

                              <div class="col-sm-4"></div>
                              <div class="col-sm-4 "></div>

                              <div class="col-sm-3">
                                  <div class="form-group">
                                      <input type="submit" class="btn btn-primary" value="Valider" name="submit" style="font-size:12px; width: 150px; margin:20px auto"> 
                                  </div>
                              </div>
                              </div>
                          
                          </div>
                          </form>
                      </div>
                  </div>

                  <?php

                  if(!empty($erreur))
                      {
                          echo "<div class='container' style='margin-top: 20px'>";
                          echo "<div class='alert alert-info'>". $erreur ."</div>";
                          echo "</div>";
                      }
                  ?>











            <div style="margin:40px auto; width: 90%">
                
                <table class="table table-striped" style="font-size: 13px">
                  <thead>
                    <tr>
                        <th>Num</th>
                        <th>Nom du Fournisseur</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>RC</th>
                        <th>NIF</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($providers as $provider){ ?>
                          <tr>
                              <td><?php echo $Num++; ?></td>
                              <td><?php echo $provider['name']; ?></td>
                              <td><?php echo $provider['adress']; ?></td>
                              <td><?php echo $provider['tel']; ?></td>
                              <td><?php echo $provider['email']; ?></td>
                              <td><?php echo $provider['rc']; ?></td>
                              <td><?php echo $provider['nif']; ?></td>
                              <td>
                                  <!-- <a href="providers_edit.php?action=edit&&id=<?php echo $provider['id']; ?>">
                                      <button class="btn btn-primary" style="font-size:12px"><i class="fas fa-edit"></i></button>
                                  </a> -->
                                  <a href="includes/providers_delete.php?action=delete&&id=<?php echo $provider['id']; ?>">
                                      <button class="btn btn-danger" style="font-size:12px"><i class="fas fa-trash-alt"></i></button>
                                  </a>
                              </td>
                          </tr>
                        <?php } ?>
                </tbody>
            </table>

        </div>


















          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->




<?php 

      }else
      {
          header('location:../index.php');
      }

      include ('includes/scripts.php');
      include ('includes/footer.php');
  ob_end_flush();
?>

