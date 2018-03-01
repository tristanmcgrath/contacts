<?php
    include_once 'header.php';
?>

<section id="contact-form">
<p>Add Contact</p>
<div class="form-container">
  <?php
    if (!isset($_SESSION['u_id'])) {
        echo '<a href="index.php" class="sign-in-prompt"><strong>Please Sign In</strong></a>';
    } else {
      echo '<form accept-charset="UTF-8" action="includes/addContacts.inc.php" method="POST">
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
            <input id="num2" type="text" name="phone" placeholder="phone">
          </div>
        </div>
        <div class="row">
          <div class="six">
            <input id="num1" type="text" name="street" placeholder="Street Address">
          </div>
          <div class="six">
            <input id="num2" type="text" name="city" placeholder="City">
          </div>
        </div>
        <div class="row">
          <div class="six">
            <select name="state" class="select">
              <option value="" disabled selected>Select State</option>
              <option value="AL">Alabama</option>
              <option value="AK">Alaska</option>
              <option value="AZ">Arizona</option>
              <option value="AR">Arkansas</option>
              <option value="CA">California</option>
              <option value="CO">Colorado</option>
              <option value="CT">Connecticut</option>
              <option value="DE">Delaware</option>
              <option value="DC">District Of Columbia</option>
              <option value="FL">Florida</option>
              <option value="GA">Georgia</option>
              <option value="HI">Hawaii</option>
              <option value="ID">Idaho</option>
              <option value="IL">Illinois</option>
              <option value="IN">Indiana</option>
              <option value="IA">Iowa</option>
              <option value="KS">Kansas</option>
              <option value="KY">Kentucky</option>
              <option value="LA">Louisiana</option>
              <option value="ME">Maine</option>
              <option value="MD">Maryland</option>
              <option value="MA">Massachusetts</option>
              <option value="MI">Michigan</option>
              <option value="MN">Minnesota</option>
              <option value="MS">Mississippi</option>
              <option value="MO">Missouri</option>
              <option value="MT">Montana</option>
              <option value="NE">Nebraska</option>
              <option value="NV">Nevada</option>
              <option value="NH">New Hampshire</option>
              <option value="NJ">New Jersey</option>
              <option value="NM">New Mexico</option>
              <option value="NY">New York</option>
              <option value="NC">North Carolina</option>
              <option value="ND">North Dakota</option>
              <option value="OH">Ohio</option>
              <option value="OK">Oklahoma</option>
              <option value="OR">Oregon</option>
              <option value="PA">Pennsylvania</option>
              <option value="RI">Rhode Island</option>
              <option value="SC">South Carolina</option>
              <option value="SD">South Dakota</option>
              <option value="TN">Tennessee</option>
              <option value="TX">Texas</option>
              <option value="UT">Utah</option>
              <option value="VT">Vermont</option>
              <option value="VA">Virginia</option>
              <option value="WA">Washington</option>
              <option value="WV">West Virginia</option>
              <option value="WI">Wisconsin</option>
              <option value="WY">Wyoming</option>
            </select>
          </div>
          <div class="six">
            <input id="zip" type="text" name="zip" placeholder="Zip Code">
          </div>
        </div>
        <div class="row">
          <div class="twelve">
            <button class="submit-button" type="submit" name="submit">Add Contact</button>
          </div>
        </div>
      </form>
      <a href="contacts.php">Back to My Contacts</a>';
    }
  ?>


</div>
</section>
<?php
    include_once 'footer.php';
?>
