<!DOCTYPE html>
<html lang="en">
<head>
<title>Halaman Login</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<script src="js/jquery-1.11.3.js"></script>
<script language="javascript">
        function validasi(form){
            if (form.username.value == "") {
                alert("Anda belum mengisikan Username.");
                form.username.focus();
                return (false);
            }  
            if (form.password.value == "") {
                alert("Anda belum mengisikan Password.");
                form.password.focus();
                return (false);
            }
          return (true);
        }
    </script>
</head>
  <body onLoad="document.login.username.focus();" style="padding-top:100px;padding-bottom:100px;">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  <i>SMP NEGRI 2 PURBOLLINGO HEBAT SERTA BERPRESTASI DAN UNGGUL </i>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <center><h3><span class="glyphicon glyphicon-user"></span> Administrator Perpustakaan</h3></center>
            </div>
            <div class="panel-body">
              <form  name="login" action="login_proses.php" method="POST" onSubmit="return validasi(this)" class="form-3" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="username">Username :</label>
                  <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input type="text" class="form-control" name="username" placeholder="Username" title="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Password :</label>
                  <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                    <input type="password" class="form-control" name="password" placeholder="Password" title="Password">
                  </div>
                </div>
                <div class="panel-footer">
                  <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</button>
                  <div class="pull-right">
                    <button type="reset" name="reset" class="btn btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
        <nav class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="container">
            <p class="navbar-text"><strong>SMP NEGRI 2 PURBOLINGGO | UNIVERSITAS NADHATUL ULAMA LAMPUNG | RIYAN AGUNG LAKSONO | SISTEM INFORMASI | 2023</strong></p>
        </div>
    </nav>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery1.11.3.js"></script>
  </body>
</html>