
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
</head>
<body>

  <div class="container">
    <form class="form-signin" method="POST" action="<?= base_url('login')?>">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="row">
            <div class="col-md-12">
              <h2 class="form-signin-heading">Silahkan Login Terlebih Dahulu</h2><br>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="remember-me"> Remember me
                  </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" value="login" name="login">Sign in</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
</body>
</html>
