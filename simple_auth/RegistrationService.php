<?php
define('CONFIG',require(__DIR__ . '/' . 'config.php'));

class RegistrationService {
  private $fname;
  private $email;
  private $password;
  private $password_confirmation;
  private $errors = Array();

  public function __construct($fname, $email, $password, $password_confirmation)
  {
    $this->fname = $fname;
    $this->email = strtolower($email);
    $this->password = $password;
    $this->password_confirmation = $password_confirmation;
    $this->errors = $this->registration_validation();
  }

  public function registration_validation()
  {
    $errors = [];
    if($this->duplicate_user())
    { $errors['duplicate_user'] = 'Email already registered. '; }
    if(!$this->passwords_match())
    { $errors['password_nomatch'] = 'Passwords do not match. '; }
    if(!$this->valid_email())
    { $errors['email_format'] = 'Not a valid Email. '; }
    if(!$this->password_length_valid())
    { $errors['pass_length'] = "Password should be between " . CONFIG['min_pass_length'] . " and " . CONFIG['max_pass_length'] . " characters please! "; }

    return $errors;
  }

  public function successful()
  {
    if(empty($this->errors) && $this->passwords_match())
    {
      // $this->register_user();
      return true;
    } else {
      return false;
    }
  }

  public function duplicate_user()
  {
    $user_file = 'users.json';
    if (file_exists($user_file))
    {
      $fp = fopen($user_file, "r") or die("unable to open file");
      $contents = fread($fp, filesize($user_file));
      $users = json_decode($contents, true)['users'];

      foreach($users as $key => $attributes)
      {
        if($attributes['email'] == $this->email)
        {
          return true;
        }
      }

      fclose($fp);
    }
  }

  public function passwords_match()
  {
    return ($this->password === $this->password_confirmation)
    ? true
    : false;
  }

  public function password_length_valid()
  {
    $pass_length = strlen($this->password);
    return (
      $pass_length >= CONFIG['min_pass_length'] &&
      $pass_length <=  CONFIG['max_pass_length']
      )
    ? true
    : false;
  }

  public function valid_email()
  {
    return (filter_var($this->email, FILTER_VALIDATE_EMAIL))
    ? true
    : false;
  }

  public function get_errors()
  {
    return $this->errors;
  }

  public function register_user() {
    if(!$this->duplicate_user()) {
      $user_file = 'users.json';
      $user = [
        'fname' => $this->fname,
        'email' => $this->email,
        'password' => password_hash($this->password, PASSWORD_DEFAULT)
      ];
      // echo file_exists($user_file) ? 'yes' : 'no';

      if (file_exists($user_file))
      {
        $contents = file_get_contents($user_file);
        $data = json_decode($contents, true);
        array_push($data['users'], $user);
        $json = json_encode($data);
        file_put_contents($user_file, $json);
      }
    }
  }
}