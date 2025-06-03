<?php
$pageTitle = "process.php";
include './db.php';
include 'header.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect form data
  $name     = ($_POST['fullname']);
  $email    = ($_POST['email']);
  $gender   = $_POST['gender'];
  $position = $_POST['position'];

  // Handle file upload for CV
  $cvName = $_FILES['cv']['name'];
  $cvTmp  = $_FILES['cv']['tmp_name'];
  $uploadDir = "uploads/";

  if (!is_dir($uploadDir)) {
    mkdir($uploadDir);
  }

  $newFileName = time() . "_" . basename($cvName);
  $destination = $uploadDir . $newFileName;

  // Handle profile picture upload (New Code Added)
  $profilePicName = $_FILES['profile_picture']['name'];  // New
  $profilePicTmp  = $_FILES['profile_picture']['tmp_name'];  // New
  $profilePicDir  = "uploads/profile_pictures/";  // New

  if (!is_dir($profilePicDir)) {  // New
    mkdir($profilePicDir);  // New
  }

  $newProfilePicName = time() . "_" . basename($profilePicName);  // New
  $profilePicDestination = $profilePicDir . $newProfilePicName;  // New

  // Validate profile picture file type and size (New)
  // if ($_FILES['profile_picture']['size'] > 5000000) {  // New (2MB limit)
  //   echo "Profile picture is too large!";
  //   exit;  // New
  // }

  // Move uploaded profile picture
  if (move_uploaded_file($profilePicTmp, $profilePicDestination) && move_uploaded_file($cvTmp, $destination)) {
    // Insert into database with both CV and profile picture
    $sql = "INSERT INTO applications (fullname, email, gender, position, cv_filename, profile_picture)
                VALUES ('$name', '$email', '$gender', '$position', '$newFileName', '$newProfilePicName')";

    if ($conn->query($sql)) {
      $mail = new PHPMailer(true);
      try{
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = 'memoonaisrar48@gmail.com';
        $mail->Password = 'tuqn aeoz eayc aqlv';
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->setFrom('memoona@gmail.com', '');
        $mail->addAddress($email , $name);
        $mail->isHTML(true);
        $mail->Subject = 'Application Status';
        $mail->Body = 'Dear ' . $name . ',<br><br>
        Thank you for applying for the position of ' . $position . '. Your application has been received and is currently being reviewed.<br><br>
        Best regards,<br>
        Memoona';
        $mail->send();
        echo "Email sent successfully";
      }catch(Exception $e){
        echo "<div>Email not sent</div>";
   

      }
      echo '   <a href="index.php" class="btn btn-primary">Back to Form</a>';
      echo '   <a href="view.php" class="btn btn-primary">View Applications</a>';
    }
  }
}

include 'footer.php';
?>