
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fab fa-affiliatetheme"></i>
        </div>
        <div class="sidebar-brand-text mx-3">G-Magazin <sup>1.1</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="tableau_de_bord.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-folder"></i>
          <span>Consulter</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Elements de donnees:</h6>
            <a class="collapse-item" href="products.php">Produits</a>
            <a class="collapse-item" href="units.php">Unitees</a>
            <a class="collapse-item" href="providers.php">Fournisseurs</a>
            <a class="collapse-item" href="services.php">Administrations</a>
            <a class="collapse-item" href="categories.php">Categories</a>
            <a class="collapse-item" href="users.php">Utilisateurs</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Mouvement</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Differents etats:</h6>
            <a class="collapse-item" href="bl_fournisseur.php">BL Fournisseurs</a>
            <a class="collapse-item" href="#">BF Consommable</a>
            <a class="collapse-item" href="#l">BF non-Consommable</a>
            <a class="collapse-item" href="#">Liste magazinier</a>
            <a class="collapse-item" href="#">Decharge</a>
            <a class="collapse-item" href="#">Intervention</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-table"></i>
          <span>Historique</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Recherche:</h6>
            <a class="collapse-item" href="#">Historique Produit</a>
            <a class="collapse-item" href="#">Historique BL</a>
            <a class="collapse-item" href="#">Historique BF</a>
            <a class="collapse-item" href="#">Historique Decharge</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-fw fa-cog"></i>
          <span>A Propos</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">a savoir:</h6>
            <a class="collapse-item" href="#">Aide</a>
            <a class="collapse-item" href="#">Version</a>
            <a class="collapse-item" href="#">Nous contacter</a>
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sortir</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selectionner "Logout" si vous voulez sortir de cette session</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Fermer</button>
          <a class="btn btn-primary" href="login.html">Sortir</a>
        </div>
      </div>
    </div>
  </div>
