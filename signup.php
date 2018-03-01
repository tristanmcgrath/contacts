<?php
   include_once 'header.php';
?>

  <section id="contact-form">
    <p>Sign Up</p>
    <h1 id="form-header" tabindex="-1">Please fill in the following fields:</h1>
    <div class="form-container">
      <form accept-charset="UTF-8" action="includes/signup.inc.php" method="POST">
        <div class="row">
          <div class="six">
            <input id="num1" type="text" name="first" placeholder="First Name">
          </div>
          <div class="six">
            <input id="num2" type="text" name="last" placeholder="Last Name">
          </div>
        </div>
        <div class="row">
          <div class="six">
            <input id="num1" type="text" name="email" placeholder="E-mail">
          </div>
          <div class="six">
            <input id="num2" type="text" name="uid" placeholder="Desired User Name">
          </div>
        </div>
        <div class="row">
          <div class="six">
            <input id="num1" type="password" name="pwd" placeholder="Password">
          </div>
        </div>
        <div class="row">
          <div class="twelve">
            <button class="submit-button" type="submit" name="submit">Create Account</button>
          </div>
        </div>
      </form>
    </div>
  </section>

  <?php
      include_once 'footer.php';
  ?>
