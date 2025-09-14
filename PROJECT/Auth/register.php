<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="sweetalert2.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a  class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/logo.svg" alt="">
                </a>
                <p class="text-center">Your Social Campaigns</p>
                <form action="insert.php" method="post" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputtext1" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                  </div>
                  <div class="mb-4">
                    <label for="file" class="form-label">Profile</label> <br>
                    <img src="https://i.pinimg.com/1200x/cd/4b/d9/cd4bd9b0ea2807611ba3a67c331bff0b.jpg" class="rounded-circle" width="70px" height="70px" id="image" alt="">
                    <input type="file" class="form-control" name="file" id="file">
                  </div>
                  <div class="d-flex justify-content-center mb-2  " style="width: 530px; ">
                    <button class="btn btn-primary w-100" type="submit" name="register">Sign up</button>
                  </div>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="./login.php">Sign In</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html>
<script>
  $(document).ready(function(){
    $('#file').hide();
    $('#image').click(function(){
      $('#file').click();
    })
    $('#file').change(function(){
      let file=this.files[0];
      if(file){
        let img=URL.createObjectURL(file);
        $('#image').attr('src',img)
      }
    })
  })
</script>
