<?php 
class User {

  public function login($email, $password) {
    try {
        $conn =  DB::conn();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email='$email'"); 
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if(empty($user)){
          return false;
        }

        if(password_verify($password ,$user['password']))
        {
          session_start();
          $_SESSION['USER']['ID'] = $user['id'];
          $_SESSION['USER']['NAME'] = $user['fname'] . ' ' . $user['lname'];
          $_SESSION['USER']['EMAIL'] = $user['email'];
          return true;
        }
        return false;
      } catch(PDOException $e) {
        return false;
      }
  }

  public function signup($data) {
    try {
      $conn = DB::conn();

      $stmt = $conn->prepare("INSERT INTO users (fname, lname, email, mobile, password, created_at, updated_at)
      VALUES (:fname, :lname, :email, :mobile, :password, :created_at, :updated_at)");
      $stmt->bindParam(':fname', $fname);
      $stmt->bindParam(':lname', $lname);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':mobile', $mobile);
      $stmt->bindParam(':password', $password);
      $stmt->bindParam(':created_at', $created_at);
      $stmt->bindParam(':updated_at', $updated_at);

      // insert a row
      $fname = $data['fname'];
      $lname = $data['lname'];
      $email = $data['email'];
      $mobile = $data['mobile'];
      $password = password_hash($data['password'], PASSWORD_DEFAULT);
      $created_at = date('Y-m-d h:m:s');
      $updated_at = $created_at;
      $stmt->execute();

      return true;
    } catch(PDOException $e) {
      echo $e; die;
      return false;
    }

  }

  public function email_exists($email) {
    $conn = DB::conn();
    $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM users WHERE email = '$email'");
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user['count']){
      return true;
    }
    return false;
  }

  public function is_event_owner($event_uuid) {
    if(!isset($event_uuid)) return false;
    if(!issset($_SESSION['USER']['ID'])) return false;

    try {
      $event_uuid = trim($event_uuid);
      $user_id = $_SESSION['USER']['ID'];
      $conn =  DB::conn();
      $stmt = $conn->prepare("SELECT * FROM events WHERE uuid='$event_uuid' and organiser_id='$user_id'"); 
      $stmt->execute();
      $event = $stmt->fetch(PDO::FETCH_OBJ);

      if(empty($event)){
        return false;
      }
      return true;
    } catch(PDOException $e) {
      return false;
    }
  }

  public static function is_logedin() {
    if(isset($_SESSION['USER']['ID'])) return true;
    return false;
  }
}
 

 