<?php
session_start();

?>


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.84.0">
    <title>CSIS Login</title>

    <link href="../assets/img/culogo.png" rel="icon">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/signin.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .btn-primary:hover{
        background-color: darkviolet;
      }

    </style>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
  <main class="form-signin">
          <?php
          if(isset($_SESSION['status']) && $_SESSION['status']!='')
          {
            echo '<h2 class= "bg-danger text white" > '.$_SESSION['status'].'</h2>';
            unset($_SESSION['status']);
          }
          ?>
    <form action="code.php" method="POST" >
      <a href="../index.php"> <img class="mb-4" src="../assets/img/culogo.png" alt="" width="72" height="57"></a>
      <h1 class="h3 mb-3 fw-normal">CSIS Login</h1>

      <div class="form-floating">
        <input name="email" type="email" class="form-control" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input name="password" type="password" class="form-control"  placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" name="login_btn" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
  </main>  
</body>
