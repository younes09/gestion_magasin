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
            $category = htmlentities($_POST['category']);
            $unit = htmlentities($_POST['unit']);
            $amount = htmlentities($_POST['amount']);
            $price_buy = htmlentities($_POST['price_buy']);
            $sn = htmlentities($_POST['sn']);

            $sql = $connect->prepare("SELECT * FROM products WHERE name=?");
            $sql->execute(array($name));
            $row = $sql->rowCount();

            if($row == 0)
            {
                $sql1 = $connect->prepare("INSERT INTO products(name, category, amount, unit, price_buy, serial_number) VALUES('$name','$category', '$amount','$unit', '$price_buy', '$sn')");
                $sql1->execute();
            }else
            {
                 $erreur =  'Ce nom existe déja';
            }
        }
    }





    $Num= 1;
    $sql = $connect->prepare("SELECT * FROM products ORDER BY id DESC");
    $sql->execute();
    $row = $sql->rowCount();
    $products = $sql->fetchAll();

 ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
      $("#btnNewProduct").click(function(){
        $("#NewProduct").fadeToggle(1500);
      });
    });
 </script>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include ('includes/topbar.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        	<h1 style="text-align:center;margin:60px">Listes des Produits</h1>


			<div class="row">
	            <div class="col-sm-1"></div>
	            <div class="col-sm-2">
	                <button id="btnNewProduct" class="btn btn-primary" style="font-size: 12px">Ajouter Nouveau Produit</button>
	            </div>
	            <div class="col-sm-8" style="font-size:12px" >
	                <form method="POST" action="">
	                <div id="NewProduct" style="border:solid #ccc 0.5px; padding: 15px; border-radius : 10px; display:none">
	                    <div class="row">

	                    <div class="col-sm-4">
	                            <label for="name">Nom :</label>
	                            <input type="text" class="form-control" id="name" name="name" style="font-size:12px" 
	                                autofocus autocomplete="off" value="" > 
	                        
	                    </div>
	                    <div class="col-sm-4">
	                            <label for="adress">Categorie :</label>
	                            <?php
	                                $sql = $connect->prepare("SELECT * FROM categories");
	                                $sql->execute();
	                                $categories = $sql->fetchAll();
	                             ?>
	                            <select name="category" class="form-control">
	                                <option></option>
	                                <?php foreach($categories as $category) { ?>
	                                    <option value="<?php echo $category['name']; ?> "><?php echo $category['name']; ?></option>
	                                <?php } ?>
	                            </select>
	                    </div>
	                    <div class="col-sm-4">
	                        <label for="adress">Unite de Mesure :</label>
	                        <?php
	                            $sql = $connect->prepare("SELECT * FROM units");
	                            $sql->execute();
	                            $units = $sql->fetchAll();
	                         ?>
	                        <select name="unit" class="form-control">
	                            <option></option>
	                            <?php foreach($units as $unit) { ?>
	                                <option value="<?php echo $unit['name']; ?> "><?php echo $unit['name']; ?></option>
	                            <?php } ?>
	                        </select>
	                    </div>
	                    <div class="col-sm-4">
	                        <label for="amount">Quantite :</label>
	                        <input type="text" name="amount" class="form-control"  style="font-size:12px" autocomplete="off" >
	                    </div>
	                    <div class="col-sm-4">
	                        <label for="price_buy">Prix d'achat :</label>
	                        <input type="text" name="price_buy" class="form-control" id="price_buy"  style="font-size:12px" autocomplete="off" >
	                    </div>
	                    
	                    <div class="col-sm-4">
	                        <label for="sn">SN :</label>
	                        <input type="text" name="sn" class="form-control" id="sn" style="font-size:12px" autocomplete="off" >
	                    </div>
	                    
	                    <div class="col-sm-4"></div>
	                    <div class="col-sm-4"></div>
	                    
	                    <div class="col-sm-3">
	                            <input type="submit" class="btn btn-primary" value="Valider" name="submit" style="font-size:12px; width: 150px; margin:20px auto"> 
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

			<div style="margin:40px auto; width: 80%">
                <table class="table table-striped" style="font-size: 13px">
	                <thead>
	                	<tr>
	                        <th>Num</th>
	                        <th>Nom </th>
	                        <th>Category</th>
	                        <th>Unite</th>
	                        <th>Prix d'achat</th>
	                        <th>SN</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($products as $product){ ?>
		                    <tr>
		                        <td><?php echo $Num++; ?></td>
		                        <td><?php echo $product['name']; ?></td>
		                        <td><?php echo $product['category']; ?></td>
		                        <td><?php echo $product['unit']; ?></td>
		                        <td style="text-align:center"><?php echo $product['price_buy']; ?></td>
		                        <td><?php echo $product['serial_number']; ?></td>


		                        <td>
									<!-- <a href="products_edit.php?action=edit&&id= echo $product['id']; ?>"> -->
									<!-- <a href="#editEmployeeModal1" data-toggle="modal">
										<button id="id_produit_edit" class="btn btn-primary edi" style="font-size:12px" onclick="return fun(<?php echo $product['id']; ?>)">
											<i class="fas fa-edit"></i>
										</button>
		                            </a> -->
		                            <a href="includes/products_delete.php?action=delete&&id=<?php echo $product['id'];?>">
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

	<!-- Edit Modal Produits HTML -->
	<div id="editEmployeeModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form>
						<div class="modal-header">						
							<h4 class="modal-title">Edit Produits</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">					
							<div class="form-group">
								<label>Nom</label>
								<input id="Nom_p" type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Category</label>
								<?php
	                                $sql = $connect->prepare("SELECT * FROM categories");
	                                $sql->execute();
	                                $categories = $sql->fetchAll();
	                             ?>
	                            <select name="category" class="form-control">
	                                <option></option>
	                                <?php foreach($categories as $category) { ?>
	                                    <option value="<?php echo $category['name']; ?> "><?php echo $category['name']; ?></option>
	                                <?php } ?>
	                            </select>
							</div>
							<div class="form-group">
								<label>Unite</label>
								<?php
	                            $sql = $connect->prepare("SELECT * FROM units");
	                            $sql->execute();
	                            $units = $sql->fetchAll();
	                         ?>
	                        <select name="unit" class="form-control">
	                            <option></option>
	                            <?php foreach($units as $unit) { ?>
	                                <option value="<?php echo $unit['name']; ?> "><?php echo $unit['name']; ?></option>
	                            <?php } ?>
	                        </select>
							</div>
							<div class="form-group">
								<label>Prix d'achat</label>
								<input type="text" class="form-control" required>
							</div>	
							<div class="form-group">
								<label>SN</label>
								<input type="text" class="form-control" required>
							</div>					
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-info" value="Save">
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<script>
			function fun(x,y)
			{
				document.getElementById("Nom_p").value = x;
				//validation code to see State field is mandatory.  
			}   
		</script>

<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table td:last-child").html();  
	// Edit row on edit button click
	$(document).on("click", ".edi", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
			$(this).html('<input type="text" style="height: calc(1.5em + .75rem + 2px);border: 1px solid #d1d3e2;border-radius: .35rem;color: #6e707e;" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
});
</script>






 <?php 

      include ('includes/scripts.php');
      include ('includes/footer.php');
  ob_end_flush();
?>
