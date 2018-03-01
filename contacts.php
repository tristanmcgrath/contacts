<?php
    include_once 'header.php';
    include_once 'includes/dbh.inc.php';
?>



  <section id="contact-form">
    <p>My Contacts</p>


    <div class="form-container" >

    <?php
          if (!isset($_SESSION['u_id'])) {
              echo '<a href="index.php" class="sign-in-prompt"><strong>Please Sign In</strong></a>';
          } else {
              echo '<a href="addContact.php" class="sign-in-prompt"><strong>Add New Contacts</strong></a>
                    <div class="address-container">
                      <h3>My Contacts:</h3>
                      <select name="contact-list" onchange="retrieveContact(this.value)"><option value="">Select a person:</option>';

              $uid = $_SESSION['u_id'];

              //Create a query template
              $sql = "SELECT contact_first, contact_last FROM contacts WHERE contact_uid = ?
                      ORDER BY contact_last, contact_first ASC;";
              //Connect to the database and initialize a prepared statement
              $stmt = mysqli_stmt_init($conn);
              //Prepare the statement and then check to see whether it is properly prepared
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "SQL statement failed";  //echo this if statement is NOT properly prepared
              } else {
                  //Bind parameters to placeholders in PS
                  mysqli_stmt_bind_param($stmt, "s", $uid); //s indicates string data type input
                  //Execute parameter-bound statement
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);

                  $i = 0;
                  while ($row = mysqli_fetch_assoc($result)) { //inserts each row of data as an entry in an array, stored as variable $row
                      echo '<option value="'.$i.'">'.$row['contact_first']." ".$row['contact_last']."</option>";
                      $i++;
                  }
              }
              echo '</select><div id="contact-info"></div></div>';
          }
    ?>

  </div>
  </section>
  <script type="application/javascript">
      function retrieveContact(str) {
          if (str == "") {
              document.getElementById("contact-info").innerHTML = "";
              return;
          } else {
              var xhr = new XMLHttpRequest();
              xhr.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("contact-info").innerHTML = this.responseText;
                  }
              };
              xhr.open("GET", "includes/fetchContacts.inc.php?q="+str,true);
              xhr.send();
          }
      }


  </script>

  <?php
      include_once 'footer.php';
  ?>
