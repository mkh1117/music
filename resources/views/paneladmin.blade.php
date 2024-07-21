<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>panel</title>
</head>

<body class="bg-dark">
    <div class="container">
        <nav class="navbar black " style="width: 100%;">
        <div class="container-fluid">
            <a class="navbar-brand white col-md-1  col-5"  href="/admin" >home</a>
            <a class="navbar-brand white col-md-1  col-5"  href="/admin/upload" >upload</a>
            <a class="navbar-brand white col-md-1  col-5"  href="/admin/update" >edit</a>
            <a class="navbar-brand white col-md-1  col-5"  href="/admin/delete" >delete</a>
            <a class="navbar-brand white col-md-1  col-5"  href="/admin/tag" >add artist</a>
            <a class="navbar-brand white col-md-1  col-5"  href="/admin/newsong" >new song</a>
          <ul class="nav navbar-nav navbar-right">
            <a href="/admin/logout" class="navbar-brand white col-md-1  col-5"> Logout <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
              </svg></a>
          </ul>
        </div>
      </nav>
        <div class="text-center row">
            <div class="col-6 col-sm-6 col-lg-3 ">
                <div class="progressbar">
                    <div class="second circle" data-percent="100">
                        <string></string>
                        <span>view</span>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3">
                <div class="progressbar ">
                    <div class="second circle" data-percent="{{ $cpu_load }}">
                        <strong></strong>
                        <span>cpu</span>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3">
                <div class="progressbar">
                    <div class="second circle" data-percent="{{ $memory_usage }}">
                        <strong></strong>
                        <span>memory</span>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3">
                <div class="progressbar ">
                    <div class="second circle" data-percent="{{ $disk_usage }}">
                        <strong></strong>
                        <span>disk</span>
                    </div>
                </div>
            </div>
        </div>
        <p class="h3 white" style="text-align: center; margin-top:2%;"><span class="text-green">تعداد کل کاربران:</span>{{ $user }}</p>
        <table class="table table-bordered " style="margin-top: 2%;">
            <thead class="thead-dark" >
                <tr>
                    <th scope="col" class="bg-dark"><p class="white">artist</p></th>
                    <th scope="col" class="bg-dark"><p class="white">name</p></th>
                    <th scope="col" class="bg-dark "><p class="white">view</p></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($most_view as $top)
                    <tr>
                        <td scope="row" class="bg-dark"><p class="white"> {{ $top->text }}</p></td>
                        <td class="bg-dark"><p class="white"> {{ $top->text1 }}</p></td>
                        <th class="bg-dark"><p class="white">{{ $top->view }}</p></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://rawgit.com/kottenator/jquery-circle-progress/1.2.2/dist/circle-progress.js"></script>
    <script>
        $(document).ready(function($) {
            function animateElements() {
                $('.progressbar').each(function() {
                    var elementPos = $(this).offset().top;
                    var topOfWindow = $(window).scrollTop();
                    var percent = $(this).find('.circle').attr('data-percent');
                    var animate = $(this).data('animate');
                    if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                        $(this).data('animate', true);
                        $(this).find('.circle').circleProgress({
                            // startAngle: -Math.PI / 2,
                            value: percent / 100,
                            size: 140,
                            thickness: 15,
                            fill: {
                                color: '#00a547'
                            }
                        }).on('circle-animation-progress', function(event, progress, stepValue) {
                            $(this).find('strong').text((stepValue * 100).toFixed(0) + "%");
                            $(this).find('string').text(({{ $view }}).toFixed(0));
                        }).stop();
                    }
                });
            }

            animateElements();
            $(window).scroll(animateElements);
        });
    </script>
</body>

</html>
<style>
    .row {
        display: flex;
        flex-direction: row;
    }
    .black {
        background-color: #121212;
    }
    .white{
        color: #ffffff;
    }
    .text-green{
        color:#00a547;
    }
    .green{
        background-color:#00a547;
    }
    .circle {
        width: 140px;
        margin: 20px 0px 20px;
        display: inline-block;
        position: relative;
        text-align: center;
        line-height: 1.2;
    }

    .circle canvas {
        vertical-align: top;
        width: 140px !important;
    }

    .circle strong {
        position: absolute;
        top: 30px;
        left: 0;
        width: 100%;
        text-align: center;
        line-height: 40px;
        font-size: 30px;
        color: #ffffff;
    }

    .circle strong i {
        font-style: normal;
        font-size: 0.6em;
        font-weight: normal;
    }

    .circle string {
        position: absolute;
        top: 30px;
        left: 0;
        width: 100%;
        text-align: center;
        line-height: 40px;
        font-size: 30px;
        color: #ffffff;
    }

    .circle string i {
        font-style: normal;
        font-size: 0.6em;
        font-weight: normal;
    }

    .circle span {
        display: block;
        color: #aaa;
        margin-top: 12px;
    }
</style>
