<?php
  require('simple_auth/AuthenticationService.php');
  // print_r($_POST);
  // authentication service will check to see if user session exists
 // if login form submitted
 // pull vars
  if(isset($_POST['login-submit']) || isset($_POST['auth-submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

      // Make call to authentication service
    $auth = new AuthenticationService($email, $password);

    if($auth->is_authenticated())
    {
      $auth_fname = $auth->get_user_name();
      echo "<div class='alert alert-primary'>Authentication successful. Welcome, " . ucfirst($auth_fname) . "</div>";
      // render the rest of the page
    } else {

      // if user session does not exist, then render login form
      // since we are locking down a page and not using sessions, just show form.
      echo "<div class='alert alert-danger'>Authentication failed</div>";
      include('simple_auth/layout/sign_in_form.php');
      exit();
    }

  } else { // if login form was not submitted, then render the login form
    echo "<div class='alert alert-primary'>Please Sign in to continue</div>";
    include('simple_auth/layout/sign_in_form.php');
    exit();
  }

