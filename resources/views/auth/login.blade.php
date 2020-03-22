<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Silahkan Masuk</title>
  <link rel="stylesheet" href="{{ asset('/css/login.css') }}">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Silahkan Masuk </h2>

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="{{ asset('/welcomes/pict.png') }}" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
    	@csrf
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="Email">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
      <button type="submit" class="fadeIn fourth">Masuk</button>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Lupa Kata Sandi</a>
    </div>

  </div>
</div>
<!-- partial -->

</body>
</html>
