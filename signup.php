<?php
    include_once 'header.php';
?>

<div class="form">
<h2>Sign Up</h2>
<br>
  <form action="includes/signup.inc.php" method="post">
    <label>Name</label>
    <input type="text" name="name" placeholder="Your name..">
    
    <label>Email</label>
    <input type="text" name="email" placeholder="Your email..">
    
    <label>Password</label>
    <input type="password" name="password" placeholder="Repeat password..">
    
    <label>Password</label>
    <input type="password" name="pwdRepeated" placeholder="Repeat password..">
    
    <input type="submit" name="submit" value="SignUp">
  </form>
  <?php
  if (isset($_GET["error"])) 
  {
    if ($_GET["error"] == "emptyInput") {
      echo '<p style="color: red; text-align: center; font-size: 20px; font-weight: bold;">You sent an empty field</p>';
    }
    if ($_GET["error"] == "invalidEmail") {
      echo '<p style="color: red; text-align: center; font-size: 20px; font-weight: bold;">Choose a proper email</p>';
    }
    if ($_GET["error"] == "passwordsDontMatch") {
      echo '<p style="color: red; text-align: center; font-size: 20px; font-weight: bold;">Write down the same passwords</p>';
    }
    if ($_GET["error"] == "userAlreadyExists") {
      echo '<p style="color: red; text-align: center; font-size: 20px; font-weight: bold;">The user mail already exists in Database</p>';
    }
    if ($_GET["error"] == "StatementFailed") {
      echo '<p style="color: red; text-align: center; font-size: 20px; font-weight: bold;">Something went wrong, try again</p>';
    }
    if ($_GET["error"] == "none") {
      echo '<p style="color: blue; text-align: center; font-size: 20px; font-weight: bold;">You have signed up!!</p>';
    }
  }
?>
</div>



