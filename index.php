<?php
include("app/controllers/Usuarios/login.php");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="./assets/images/street_logo.png" type="image/x-icon" />

  <link hred="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.dark.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="app/assets/style/index1.css">

  <title>StreetFighter</title>
</head>

<body>
  <form method="post" action="app/controllers/Usuarios/cadastrar.php">
    <div class="form-structor">
      <div class="signup">
        <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
        <div class="form-holder">
          <input type="email" class="input" placeholder="Email" name="email" required />
          <input type="password" class="input" placeholder="Password" name="senha" required />

          <?php
          if (isset($_GET["http"]) && $_GET["http"] == 409) {
            echo '<div class="alert alert-danger" role="alert">O email já está sendo usado</div>';
          }
          ?>
        </div>
        <button class="submit-btn" type="submit">Sign up</button>
      </div>
  </form>
  <form method="post">
    <div class="login slide-up">
      <div class="center">
        <h2 class="form-title" id="login"><span>or</span>Log in</h2>
        <div class="form-holder">
          <input type="email" class="input" name="email" placeholder="Email" required />
          <input type="password" class="input" name="senha" placeholder="Password" required />
          <?php
          if (isset($_GET["http"]) && $_GET["http"] == 404) {
            echo '<div class="alert alert-danger" role="alert">Email ou senha incorretos. Tente novamente.</div>';
          }
          ?>
        </div>
        <button class="submit-btn" type="submit">Log in</button>
      </div>
    </div>
    </div>
  </form>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="index.js"></script>
  <?php
  if (isset($_GET["http"]) && $_GET["http"] == 201) {
    echo "<script>        
        success();  
        setTimeout(limparUrl, 4000);
        </script>
        ";
  }
  ?>
</body>

</html>