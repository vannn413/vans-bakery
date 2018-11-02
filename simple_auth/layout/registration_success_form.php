<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<form action="<?= CONFIG['post_registration_path'] ?>" method="post">
  <?php foreach($_POST as $k => $v) {?>
  <?php if(
    $k === "login-submit" ||
    $k === "password-confirmation"
    ) { continue; } ?>

      <input type="hidden" name="<?= $k ?>" value="<?= $v ?>">
  <?php } ?>
  <input type='submit' name='auth-submit' value='Continue to invoice' class='btn btn-primary'>
</form>
