<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>login admin</title>
</head>
<body style="background-image: url('/black-abstract-textured-grunge-background-wall-with-slanted-stripes-vector.jpg');">
<div class="container-fluid">

@if($errors->has('username') or $errors->has('password'))
<div class="alert alert-danger" style="text-align: center;"><h4>رمز یا نام کاربری اشتباه است</h4></div>
@endif
@error('captcha')
<div class="alert alert-danger" style="text-align: center;"><h4>{{ $message }}</h4></div>
@enderror
    <div class="col-xl-4 offset-xl-4 col-lg-6 offset-lg-3" >
    <form  class="mx-auto" action="{{ route('admin.login') }}" method="post" style=" padding:50px; border:2px solid rgba(255,255,255,.2); border-radius:20px; margin-top:150px; background:transparent; backdrop-filter:blur(5px)">
        @csrf
        <h4 class="text-center text-white" >Login</h4>
        <div class="form-group mt-5">
          <label for="username" class="text-white " >نام کاربری</label>
          <input type="username"  class="form-control text-white white" id="username" name="username" @if (!empty($username)) value="{{ $username }}" @endif aria-describedby="usernameHelp" style="background:transparent;">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1" class="text-white">رمز عبور</label>
          <input type="password" class="form-control text-white white" id="exampleInputPassword1" name="password"  @if (!empty($password)) value="{{ $password }}" @endif  style="background:transparent;">
        </div>
        <img src="{{ route('captcha') }}" class="imgcaptcha" id="container" style="margin-top:2%; ">
        <button id="buttonss" type="button" class="btn btn-primary">تغییر دادن</button>
        <label for="exampleInputcaptcha1" class="text-white" style="width: 100%">کد کپچا</label>
        <input type="text" class="form-control text-white white" id="exampleInputcaptcha1" name="captcha"  style="background:transparent; margin-top: 1%; color:white">
        <input type="checkbox" name="remember" id="remember" value="remember">
        <label for="remember" class="text-white">مرا به خاطر بسپار</label>
        <button type="submit" class="btn btn-primary" style="width: 100% ;margin-top:1%;  ">Submit</button>
    </form>
    </div>
     </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script>
$(document).ready(function() {
    $("#buttonss").click(function() {
        var url = $("#container").attr("src");
        $("#container").attr("src", url + `?v=1`);
    });
});
</script>
</body>
</html>
<style>
    .large-input {
    font-size: 16px;
    text-transform: uppercase;
    }


    .loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    }

    .loading-spinner {
    width: 50px;
    height: 50px;
    border: 5px solid rgba(255, 255, 255, 0.2);
    border-top: 5px solid white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-bottom: 20px;
    }

    @keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
    }


    .loading-text {
    color: white;
    font-size: 20px;
    font-weight: bold;
    text-align: center;
    }
    @media (max-width: 420px) {
    .imgcaptcha{
        width: 100%;
    }
    }
    </style>
