<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <div class="container">
        <nav class="navbar black" >
            <div class="container-fluid">
                <a class="navbar-brand white  col-md-1  col-5"  href="/admin" >home</a>
                <a class="navbar-brand white  col-md-1  col-5"  href="/admin/upload" >upload</a>
                <a class="navbar-brand white  col-md-1  col-5"  href="/admin/update" >edit</a>
                <a class="navbar-brand white  col-md-1  col-5"  href="/admin/delete" >delete</a>
                <a class="navbar-brand white  col-md-1  col-5"  href="/admin/tag" >add artist</a>
                <a class="navbar-brand white  col-md-1  col-5"  href="/admin/newsong" >new song</a>
                <a class="navbar-brand white  col-md-1  col-5"  href="/admin/top" >top</a>
              <ul class="nav navbar-nav navbar-right">
                <a href="/admin/logout" class="navbar-brand white col-md-1  col-4"> Logout <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                  </svg></a>
              </ul>
            </div>
          </nav>
  @yield('navbar')
  </div>
</body>
</html>
<style>
    .black {
        background-color: #121212;
    }
    .white{
        color: #ffffff;
    }
</style>
