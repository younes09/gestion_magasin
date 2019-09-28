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
            $password = htmlentities($_POST['password']);
            $rank = htmlentities($_POST['rank']);

            $sql = $connect->prepare("SELECT * FROM users WHERE username=?");
            $sql->execute(array($name));
            $row = $sql->rowCount();

            if($row == 0)
            {
                $sql1 = $connect->prepare("INSERT INTO users(username, password, rank) VALUES ('$name', '$password', '$rank')");
                $sql1->execute();
            }else
            {
                 $erreur =  'Ce nom existe déja';
            }
        }




 
    $Num= 1;
    $sql = $connect->prepare("SELECT * FROM users ORDER BY id DESC");
    $sql->execute();
    $row = $sql->rowCount();
    $users = $sql->fetchAll();
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
              $("#btnNewUser").click(function(){
                $("#NewUser").fadeToggle(1500);
              });
            });
            </script>







            <h1 style="text-align: center">Liste des Utilisateurs</h1>






            <div class="row">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-2">
                      <button id="btnNewUser" class="btn btn-primary" style="font-size: 12px">Ajouter Nouveau utilisateur</button>
                  </div>
                  <div class="col-sm-8" style="font-size:12px" >
                      <form method="POST" action="">
                      <div id="NewUser" style="border:solid #ccc 0.5px;padding: 10px; border-radius : 10px; display:none">
                          <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="name">Nom :</label>
                                        <input type="text" class="form-control" id="name" name="name" style="font-size:12px" 
                                            autofocus autocomplete="off" value="" > 
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="password">Mot de passe :</label>
                                        <input type="password" class="form-control" id="password" name="password" style="font-size:12px" 
                                            autocomplete="off" value="" > 
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="rank">Rank :</label>
                                        <select name="rank" class="form-control" id="rank">
                                              <option>...</option>
                                              <option>1</option>
                                              <option>2</option>
                                              <option>3</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Valider" name="submit" style="font-size:12px; width: 150px; margin:30px auto"> 
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
























            


          <div class="row">
            <div class="col-sm-2"></div>

            <div class="col-sm-8" style="margin:40px auto; width: 60%">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Num</th>
                    <th>Nom</th>
                    <th>Rank</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                <?php foreach ($users as $user){ ?>
                  <tr>
                    <td><?php echo $Num++; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['rank']; ?></td>

                    <td>
                      <!-- <a href="users_edit.php?action=edit&&id=<?php echo $user['id']; ?>">
                        <button class="btn btn-primary" style="font-size:12px"><i class="fas fa-edit"></i></button>
                      </a> -->
                      <a href="includes/users_delete.php?action=delete&&id=<?php echo $user['id']; ?>">
                        <button class="btn btn-danger" style="font-size:12px"><i class="fas fa-trash-alt"></i></button>
                      </a>
                    </td>
                  </tr>
                      
                <?php } ?>
                    

                  
                </tbody>
              </table>

            </div>
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

