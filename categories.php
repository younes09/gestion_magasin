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

            $sql = $connect->prepare("SELECT * FROM categories WHERE name=?");
            $sql->execute(array($name));
            $row = $sql->rowCount();

            if($row == 0)
            {
                $sql1 = $connect->prepare("INSERT INTO categories(name) VALUES ('$name')");
                $sql1->execute();
            }else
            {
                 $erreur =  'Ce nom existe déja';
            }
        }
 
        $Num= 1;
        $sql = $connect->prepare("SELECT * FROM categories ORDER BY id DESC");
        $sql->execute();
        $row = $sql->rowCount();
        $categories = $sql->fetchAll();
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
              $("#btnNewCategory").click(function(){
                $("#NewCategory").fadeToggle(1500);
              });
            });
            </script>

              <h1 style="text-align:center;margin:60px">Listes des Categories</h1>

              <div class="row">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-2">
                      <button id="btnNewCategory" class="btn btn-primary" style="font-size: 12px">Ajouter Nouvelle Categorie</button>
                  </div>
                  <div class="col-sm-8" style="font-size:12px" >
                      <form method="POST" action="">
                      <div id="NewCategory" style="border:solid #ccc 0.5px;padding: 10px; border-radius : 10px; display:none">
                          <div class="row">

                          <div class="col-sm-4">
                              <div class="form-group">
                                  <label for="name">Nom du Catégorie :</label>
                                  <input type="text" class="form-control" id="name" name="name" style="font-size:12px" 
                                      autofocus autocomplete="off" value="" > 
                              </div>
                          </div>

                          <div class="col-sm-3"></div>

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













            <!-- Begin table of categories -->
            <div style="margin:40px auto; width: 60%">
                <table class="table table-striped" style="font-size: 13px">
                  <thead>
                    <tr>
                        <th>Num</th>
                        <th>Nom du Catégorie</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($categories as $category){ ?>
                          <tr>
                              <td><?php echo $Num++; ?></td>
                              <td><?php echo $category['name']; ?></td>
                              <td>
                                  <!-- <a href="categories_edit.php?action=edit&&id=<?php echo $category['id']; ?>">
                                      <button class="btn btn-primary" style="font-size:12px"><i class="fas fa-edit"></i></button>
                                  </a> -->
                                  <a href="includes/categories_delete.php?action=delete&&id=<?php echo $category['id']; ?>">
                                      <button class="btn btn-danger" style="font-size:12px"><i class="fas fa-trash-alt"></i></button>
                                  </a>
                              </td>
                          </tr>
                      <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- End table of categories -->
          

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
