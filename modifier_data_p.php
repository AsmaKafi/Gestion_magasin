<?php include ("header.php");
include ("db.php");
$id=$_GET['id'];
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
$target_dir = "uploads/";
//$filename=basename($_FILES["fileToUpload"]["name"]);
 $image_file = $_FILES["image"];
// Check if image file is a actual image or fake image
move_uploaded_file(
    // Temp image location
    $image_file["tmp_name"],

    // New image location, __DIR__ is the location of the current PHP file
    __DIR__ . "/uploads/" . $image_file["name"]
);
$filename=$image_file["name"];


if(isset($_POST['send'])){


$ancien_image=$_POST['ancien_image'];
//unlink("uploads/" . $ancien_image);
 $categorie=$_POST['categorie'];
$cc="";
foreach ($categorie as $a){
    $cc=$cc.",".$a;
}

$cc = substr($cc, 1);

$nom_produit=$_POST['nom_produit'];
 $categorie=$_POST['categorie'];
$description_produit=$_POST['description_produit'];
$prix_produit=$_POST['prix_produit'];
   $sql = "UPDATE `produit` SET `nom_produit` = '$nom_produit', `description_produit` = '$description_produit' , 
  `prix_produit` = '$prix_produit', 
  `image` = '$filename', `categorie` = '$cc' WHERE id_produit = ".$id;
if (mysqli_query($conn, $sql)) {
  echo "b1 <br>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Settings /</span> Ajout categorie</h4>

              <div class="row">
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                     <center> <h1 class="mb-1">Modification produit</h1></center>
                     
                    </div>
                    <div class="card-body">
                      <?php 
$id=$_GET['id'];
  $sql0 = "select * from produit where id_produit=".$id;
$result = mysqli_query($conn,$sql0);
$data = mysqli_fetch_array($result);

 ?>
                      <form method="POST" onsubmit="return verification();" enctype="multipart/form-data">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Nom produit</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" 
                            value="<?php echo $data['nom_produit'];?>" name="nom_produit" placeholder="Nom produit">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Prix produit</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" 
                            value="<?php echo $data['prix_produit'];?>" name="prix_produit" placeholder="Prix produit">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Ancienne Image</label>
                          <div class="col-sm-10">

                            <img class="img-fluid" src="uploads/<?php echo $data['image'] ?>" alt="Card image cap" style="    width: 58%;
    height: 300px;">
     <input type="hidden" name="ancien_image" value="<?php echo $data['image'] ?>">
                          </div>
                        </div>
                         <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Nouvelle Image</label>
                          <div class="col-sm-10">

                           
     <input  class="form-control" type="file" name="image" accept="image/*" >
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">description</label>
                          <div class="col-sm-10">
                            <textarea id="basic-default-message" class="form-control" placeholder="description de votre categorie" aria-label="description de votre categorie" aria-describedby="basic-icon-default-message2" 
                            name="description_produit" ><?php echo $data['description_produit'];?></textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">Categorie</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="categorie[]" multiple="true" id="categorie">
                                <option value="0">
                              Votre choix
                             </option> 
                               <?php  
   $sql_p = "select categorie from produit where id_produit=".$id;
$res_p = mysqli_query($conn,$sql_p);
$row_p = mysqli_fetch_array($res_p);
$newStr = explode(",", $row_p["categorie"]);

             $sql = "select * from categorie";
$res = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res)){
     ?>
                             <option value="<?php echo $row["id"] ?>" <?php 
                            
                              if(in_array($row["id"] , $newStr) )
                              
                              {echo "selected"; } ?>>
                               <?php echo $row["nom"] ?>
                             </option> 
                            

                           <?php  
  
}

               ?></select>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="send">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
<script >
  

 function verification(){
  
    if(document.getElementById("nom_produit").value==""){
      alert("Nom produit obligatoire");
      document.getElementById("nom_produit").focus();
      return false;
    }
   else if(document.getElementById("prix_produit").value==""){
      alert("Prix produit obligatoire");
      document.getElementById("prix_produit").focus();
      return false;
    }

     else if(document.getElementById("description_categorie").value==""){
      alert("description produit obligatoire");
      document.getElementById("description_categorie").focus();
      return false;
    }
    else
    {
      return true;
      }

  }
</script>
        <?php  include("footer.php");?>