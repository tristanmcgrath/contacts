<?php
   include_once 'header.php';
?>

  <section id="contact-form">
    <p>My Contacts</p>
    <h1 id="form-header" tabindex="-1">Sign in to view your contacts!</h1>
    <div class="form-container">
      <form accept-charset="UTF-8" action="includes/login.inc.php" method="POST">
        <div class="row">
          <div class="six">
            <input id="num1" type="text" name="uid" placeholder="Username/E-mail">
          </div>
          <div class="six">
            <input id="num2" type="password" name="pwd" placeholder="Password">
          </div>
        </div>
        <div class="row">
          <div class="twelve">
            <button class="submit-button" type="submit" name="submit">Login</button>
          </div>
        </div>
      </form>
      <a href="signup.php">New here? Create an account!</a>
    </div>
  </section>

  <?php
      include_once 'footer.php';
  ?>
