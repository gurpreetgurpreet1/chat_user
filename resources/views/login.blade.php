
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<?php if(isset($error_msg)) { ?>

<p style="color:red"><?php echo $error_msg; ?></p>

<?php } ?>
<?php if(isset($success_msg)) { ?>

<p style="color:green"><?php echo $success_msg; ?></p>

<?php } ?>
<form action="/login" method='POST'>

<?php  if(count($errors) > 0) { ?>

<?php foreach($errors->all() as $key => $val){ ?>

<div class="input-box">

<p style="color:red"><?php echo $val; ?></p>
</div>

<?php  } ?>

<?php } ?>
<div class="box w-100 h-100">
<div class='bold-line'></div>
<div class='container'>
  <div class='window'>
    <div class='overlay'></div>
    <div class='content'>
      <div class='welcome'>Login here!</div>
      <!-- <div class='subtitle'>Create your account</div> -->
      
      <div class='input-fields'>
        <!-- <input type='text' placeholder='Username' class='input-line full-width' name="name"></input> -->
        <input type='email' placeholder='Email' class='input-line full-width' name="email"></input>
        <input type='password' placeholder='Password' class='input-line full-width' name="password"></input>
        <!-- <input type='tel' placeholder='Phone' class='input-line full-width' name="phone"></input>
        <input type='file' placeholder='image' class='input-line full-width' name="image"></input> -->
       <div><button class='ghost-round full-width' style="margin-top: 150px;" type="submit">Login</button></div>
       <div class='spacing'>Dont have an account?<a href="./register.php"> <span class='highlight' style="color:black; text-decoration: underline;">Register</span></a></div>
      </form>
      </div>
      @csrf
    </div>
  </div>
</div>
</div>
</body>
</html>

