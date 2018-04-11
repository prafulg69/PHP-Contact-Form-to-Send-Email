<?php
require_once('connection.php');
if(isset($_POST) & !empty($_POST)){

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if(!isset($name) || empty($name)){
  $error[] = "Name is required";
}

if(!isset($email) || empty($email)){
  $error[] = "email is required";
}
if(!isset($subject) || empty($subject)){
  $error[] = "Subject is required";
}
if(!isset($message) || empty($message)){
  $error[] = "message is required";
}

if(!isset($error) || empty($error)){
  $to = "praful@gmail.com";
  $headers = "From : " . $email;

  if(mail($to, $subject ,$message, $headers)){
    $sql = "INSERT INTO 'contactfoem' (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    if(mysql_query($connection, $sql)){
      "message send";
    }else{
      echo "Failed to send";
    }
  }else{
      echo "Failed to send mail";
    }
    }
  }

?>
<html>
<head>
	<title>contactfrom</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
</head>
<body>
	<div class="container">
		<div class="row">
			<form class="col-mod-6 col-mod-offset-3" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name" required="">
   </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required="">
   </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Subject</label>
    <input type="text" name="subject" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter subject" required="">
   </div>
    <textarea name="message" class="form-control" row="2" required=""></textarea> 
   <button type="submit" class="btn btn-primary">Submit</button>
</form>
		</div>
	</div>
</body>
</html>
