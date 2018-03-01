<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
  </head>
  <body>
    <header>
      <nav>
        <div class="main-wrapper">
          <div class="nav-login">
            <?php
                  if (isset($_SESSION['u_id'])) {
                    echo '<strong>Welcome, '.$_SESSION["u_first"].'!</strong>';
                    echo '<form action="includes/logout.inc.php" method="POST">
                            <button type="submit" name="submit">Logout</button>
                          </form>';
                    echo '';
                  }
            ?>
          </div>
        </div>
      </nav>
    </header>
