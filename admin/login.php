<?php
    include '../config/koneksi.php';
    session_start();
    
    if(isset($_SESSION['user'])) {
        header("location: index.php");
    }   
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <style>
      .login {
        background: #C10000;
        border-color: grey; 
        border-radius: 8px; 
        font-weight: bold;
      }
    </style>

    <title>LOGIN | SISTEM INFORMASI PENGADUAN HUKUM</title>
  </head>

  <body style="background: #FF5951">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">

          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
               
              <div class="row">
                <div class="col-lg">
                  <div class="p-5">
                    <div class="text-center">
                      <div class="text-light p-1 login" style="border-radius: 5px">
                        <h4>SISFO Pengaduan <br>
                        Hukum Online</h4>
                      </div>
                    </div>
                    <hr>
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">ADMIN</h1>
                    </div>
                    <hr>
                    <form class="user" method="post" action="../config/proses-login.php">
                      <div class="form-group row">
                        <label for="username" class="col-4 col-form-label">Username</label>
                        <div class="col">
                          <input type="text" class="form-control" name="username" required="" id="username" placeholder="admin">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-4 col-form-label">Password</label>
                        <div class="col">
                          <input type="password" class="form-control" name="password" required="" id="password" placeholder="123">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-user btn-block p-2 login">
                        Login
                      </button>
                    </form>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    <footer class="text-light text-center">
      &copy; 2020
    </footer>

    <script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../js/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>