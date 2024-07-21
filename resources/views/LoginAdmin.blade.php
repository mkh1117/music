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
    <div class="col-lg-4 offset-lg-4 ">
    <form class="mx-auto" action="{{ route('admin.login') }}" method="post" style=" padding:50px; border:2px solid rgba(255,255,255,.2); border-radius:20px; margin-top:150px; background:transparent; backdrop-filter:blur(5px)">
        @csrf
        <h4 class="text-center text-white" >Login</h4>
        <div class="form-group mt-5">
          <label for="username" class="text-white ">Username</label>
          <input type="username" class="form-control text-white" id="username" name="username" aria-describedby="usernameHelp" placeholder="Enter username" style="background:transparent;">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1" class="text-white">Password</label>
          <input type="password" class="form-control text-white" id="exampleInputPassword1" name="password" placeholder="Password" style="background:transparent;">
          <small id="passwordHelp" class="form-text text-muted">Forget password</small>
        </div>
        <button type="submit" class="btn btn-primary" style="width: 100% ; ">Submit</button>
      </form>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</div>
</form>
</body>
</html>
<style>
/* style="background:linear-gradient(90deg,rgba(2,0,36,1)0%,rgba(75,14,154,1) 35%,rgb(0, 153, 255)100%);" */
</style>
