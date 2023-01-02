<?php include ("header.php");
include ("db.php");
if(isset($_POST['search'])){

$categorie_search=$_POST['categorie_search'];

echo "<script>window.location.href='index.php?categorie_search=$categorie_search'</script>";
  

  }
 ?>


        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="assets/img/DSC_3835.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="assets/img/DSC_3835.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Settings /</span> Liste des produits</h4>

              <div class="row">
                <div class="col-xxl">
                
<form method="POST">
                 <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                    

  

                      <select class="form-control" name="categorie_search"  id="categorie_search">
                                <option value="0">
                              Votre choix
                             </option> 
                               <?php  
             $sql = "select * from categorie";
$res = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res)){
     ?>
                             <option value="<?php echo $row["id"] ?>">
                               <?php echo $row["nom"] ?>
                             </option> 
                            

                           <?php  
  
}

               ?></select>

                       <button type="submit" class="btn btn-primary" name="search"><i class="bx bx-search"></i></button>
                     
                       <br>
                      </div>
                <br><br>
              </form>

  <?php  

  if (isset($_GET['categorie_search']) and  ($_GET['categorie_search']!=0)) {
    $id_categorie=$_GET['categorie_search'];
   $sql1 = "select * from produit where categorie like '%$id_categorie%'";
 $req_categorie = "select * from categorie where id=".$id_categorie;
$req_categorie0 = mysqli_query($conn,$req_categorie);
$datareq_categorie = mysqli_fetch_array($req_categorie0);
$categorie_selectionne="categorie selectionne est: ".$datareq_categorie['nom'];
  }
  else
    {
    
   $sql1 = "select * from produit";
   $categorie_selectionne="toutes les categories.";
  }
  echo "<h2><i class='bx bx-filter'></i>Filtres: ". $categorie_selectionne."</h2>" ;
 ?>
                 <div class="row mb-5">

      <?php        
$res1 = mysqli_query($conn,$sql1);
while($row = mysqli_fetch_array($res1)){
     ?>

                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="./uploads/<?php echo $row["image"] ?>" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row["nom_produit"]."a ".$row["prix_produit"]." Euro" ?> </h5>
                      <p class="card-text">
                        <?php echo $row["description_produit"] ?></p>
                      <!--a href="plus_data_p.php?id=<?php //echo $row['id_produit'] ?>"  class="btn btn-info">Plus detais</a-->
                        <a href="modifier_data_p.php?id=<?php echo $row['id_produit'] ?>"  class="btn btn-primary">Modifier</a>
                         
                        <a href="delete_data_p.php?id=<?php echo $row['id_produit'] ?>"  class="btn btn-danger">Supprimer</a>
                    
                    </div>
                  </div>
                </div>
<?php  
}
 ?>

              </div>



                </div>
              </div>
            </div>
            <!-- / Content -->

        <?php  include("footer.php");?>