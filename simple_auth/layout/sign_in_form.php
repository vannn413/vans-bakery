<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class='container'>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="form-group">
        <label>Email</label>
        <input
          class="form-control"
          type="text"
          name="email"
          required
        />
      </div>
      <div class="form-group">
        <label>Password</label>
        <input
          class="form-control"
          type="password"
          name="password"
          required
        />
      </div>
      <!-- hidden input to carry post vars from index -->
      <?php foreach($_POST as $k => $v) {?>
      <?php if($k === "password" || $k === "email") { continue; } ?>
        <input type="hidden" name="<?= $k ?>" value="<?= $v ?>">
      <?php } ?>

      <input type="submit" name='login-submit' value='Sign In'>
    </form>

    <!-- register link as form instead of link to persist post vars -->
    <form action="<?= CONFIG['registration_path'] ?>" method="post">
    <?php foreach($_POST as $k => $v) {?>
      <?php if(
        $k === "password" ||
        $k === "email" ||
        $k === "auth-submit" ||
        $k === "register-submit"
        ) { continue; } ?>
        <input type="hidden" name="<?= $k ?>" value="<?= $v ?>">
      <?php } ?>
      <input type="submit" value="Signup New User">
    </form>

  </div>