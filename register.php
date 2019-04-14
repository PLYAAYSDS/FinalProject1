<?php
  require_once(dirname(__FILE__).'/common/header.php');
?>
<style>body {
  background: #eee !important;
}

.wrapper {
  margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.1);
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 30px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 20px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
</style>
</head>
<body>
<div class="container text-center">
    <div class="wrapper">
      <form class="form-signin" method="POST" action="proses_register.php">
        <h2 class="form-signin-heading"> Daftar</h2>
        <input type="name" class="form-control" name="name" placeholder="Nama" required="" autofocus="" /><br>
        <input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus="" /><br>
        <input type="username" class="form-control" name="username" placeholder="Username" required="" autofocus="" /><br>
        <input type="password" class="form-control" name="password" placeholder="Kata Sandi" required=""/><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button><br>
      </form>
    </div>
</div>
<?php
  require_once(dirname(__FILE__).'/common/footer.php');
?>