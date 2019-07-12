<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
</head>

<body>
<style>
body, html{
	  height: 100%;
}

* {
  box-sizing: border-box;
}

.bg-image {
 
  background-image:url(img/wall.jpg);


  filter: blur(3px);
  -webkit-filter: blur(3px);


  height: 100%; 


  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}


.bg-text {
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0, 0.4); 
  color: #000;
  font-weight: bold;
  border: 0px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width:100%;
  padding: 20px;
  text-align: left;
	font-family: 'Kanit', sans-serif;
	}
</style>
<div class="bg-image"></div>
<div class="bg-text">
 <div class="row">
 &nbsp; &nbsp;
</div>

<div class="container">
  <div class="row">
    <div class="col-6 col-md-4"></div>
    <div class="col-6 col-md-4" style="background-color:#FFF;">
 <div align="center">
 &nbsp;
 <h2>เข้าสู่ระบบ</h2>
<h3>จัดการหนังสือ</h3>
<img src="img/adminlogo.png" />
</div>
</div>
    <div class="col-6 col-md-4"></div>
</div>
  <div class="row">
    <div class="col-6 col-md-4"></div>
    <div class="col-6 col-md-4" style="background-color:#FFF;">
    <div style="opacity:1;"> 
   <form name="form1" method="post" action="check_login.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="txtUsername" class="form-control"   placeholder="User = pond">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="txtPassword" class="form-control" placeholder="Password = 123">
  </div>
  <button type="submit" class="btn btn-primary">LOGIN</button>
  <button type="reset" class="btn btn-primary">RESET</button>
  <p></p>
</form>
</div>
    <div class="col-6 col-md-4"></div>
    </div>
  </div>
</div>
</div>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
