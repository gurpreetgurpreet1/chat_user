
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title> 
    <link rel="stylesheet" href="{{('CSS/register.css') }}">
   </head>
<body>
  
<div class="wrapper">
  <h2>Signup Form</h2>

  <?php if(isset($error_msg)) { ?>

    <p style="color:red"><?php echo $error_msg; ?></p>

    <?php } ?>
    <?php if(isset($success_msg)) { ?>

<p style="color:green"><?php echo $success_msg; ?></p>

<?php } ?>
  <form action="/signup" method='POST' enctype="multipart/form-data">

  <?php  if(count($errors) > 0) { ?>

  <?php foreach($errors->all() as $key => $val){ ?>

  <div class="input-box">

  <p style="color:red"><?php echo $val; ?></p>
  </div>

  <?php  } ?>

  <?php } ?>

      <div class="input-box">
        <input type="text" name="first_name" placeholder="Enter your First Name"  >
      </div>
      <div class="input-box">
        <input type="text" name="last_name" placeholder="Enter your last Name"  >
      </div>
      <div class="input-box">
        <input type="text" name="phone" placeholder="Enter your Phone"  >
      </div>
      <div class="input-box">
        <input type="text" name="email" placeholder="Enter your Email" >
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Create Password" >
      </div>
      <div class="input-box">
        <input type="file" name="image" placeholder="Enter your image"  >
      </div>

      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now">
      </div>
      @csrf
      <div class="text">
        <h3>Already have an account? <a href="#">Login now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>
