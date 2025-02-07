<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main </title>
    <link rel="icon" type="image/x-icon" href="/logo/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-dark " >
    <div name='hide' id="hide" class="hide" hidden>
        <div class="container" >
            <div style="display: flex;justify-content: center;">
            <div class="input-group mb-3" style="margin-top: 10%;display: flex;justify-content: center;">
                <button id="close" style="background:transparent;border-width: 0;order: 1;"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="white" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                  </svg></button>
        <form class="form-inline my-2 my-lg-0 form " action="{{ Route('search') }}" method="get">
            <div class="d-flex justify-content-center" style="width: 100%;height: 100%;">
                <div class="input-group" style="width: 100%;">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn " type="submit" id="button-addon1" data-mdb-ripple-color="dark" style="background-color: #f6f7f7;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="black" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                          </svg>
                    </button>
                    <input type="text" class="form-control"  name="search" id="search" placeholder="جستجو کردن"  onfocus="this.value=''" dir="rtl" aria-label="Example input" aria-describedby="button-addon1"/>
                </div>
            </div>
          </form>
        </div>
        </div>
        <div  style="display: flex;flex-direction: row; justify-content: center; ">
            <div class="scrool" id="search_list" style="width: 100%;text-align: right;margin-top:20px;"></div>
          </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" style="background-color: #050505; " tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" dir="rtl">
    <div  style=" padding: 0 0 0 16 px; display: flex ; justify-content: space-around" >
      <h5 id="offcanvasRightLabel" class="text-white" dir="ltr"><a class="navbar-brand text-white" href="/"><svg height="50"   class="svgs"   xmlns="http://www.w3.org/2000/svg">
        <text x="0%"  y="36" fill="#00a547"  class="sizesvg" style="font-family:myMulti">PERSIAN</text>
        <text x="43%" y="36" fill="grey"    font-size="20" class="sizesvg"    style="font-family:myMulti">TOP</text>
        <text x="65%" y="36" fill="#00a547" font-size="20" class="sizesvg" style="font-family:myMulti">MUSIC</text>
      </svg></a></h5>
      <button type="button" class="btn-close text-reset btn-close-white"  data-bs-dismiss="offcanvas" aria-label="Close" style="display: flex; flex-direction: column; align-self: center"></button>
    </div>
    <hr class="white" style="margin-top: -5px;">
    <div class="offcanvas-body" style="padding: 0px;">
        <ul class="list-group" style="border: none;">
        <li class="list-group-item" style="background: transparent; border: none; ">
            <a class="navbar-brand link-light h2" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="font-size: 18px;">
              دسته بندی
            </a>
        </li>
        <ul class="collapse" id="collapseExample">
            @foreach ($category as $c)
                    <li style="list-style: none;" >
                    <a href="/category/{{ $c->category }}" class="navbar-brand link-light"  >{{ $c->category }}</a>
                    </li>
            @endforeach
        </ul>
        <li class="list-group-item" style="background: transparent; border: none;">
            <a class="navbar-brand link-light h2" href="/about-us" role="button"  style="font-size: 18px;">
                درباره ما
            </a>
        </li>
        <li class="list-group-item" style="background: transparent; border: none;">
            <a class="navbar-brand link-light h2" href="/call-us" role="button"  style="font-size: 18px;">
                ارتباط با ما
            </a>
        </li>
        </ul>
    </div>
</div>
<nav class="navbar navbar-expand-lg sticky-top navbar-light" style="background-color: #050505;">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="/"><svg height="70" class="svgs" xmlns="http://www.w3.org/2000/svg">
        <text x="0%"  y="19" fill="#00a547"  class="sizesvg" style="font-family:myMulti">PERSIAN</text>
        <text x="43%" y="19" fill="grey"    font-size="20" class="sizesvg"    style="font-family:myMulti">TOP</text>
        <text x="65%" y="19" fill="#00a547" font-size="20" class="sizesvg" style="font-family:myMulti">MUSIC</text>
        <text x="16%" y="56" fill="#00a547"   class="persian-text ">موزیک</text>
        <text x="39%" y="56" fill="grey"  class="persian-text " >تاپ</text>
        <text x="54%" y="56" fill="#00a547"  class="persian-text " >پرشین</text>
      </svg></a>
      <div class="d-flex justify-content-flex-end" style="width: 10%" dir="rtl">
        <button id="auto" data-bs-toggle="tooltip" data-bs-placement="bottom" title="جستجو" style="border-width: 0; margin-rigth: 1%;order: 1; background: transparent;"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-search " viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
          </svg></button>
          <button class="btn btn-outline-light" type="button" style="margin-left: 4%;margin-right: 1%; order: 0;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
          </svg></button>
        </div>
    </div>
  </nav>
    <div class=" bg-dark" >

    <div class=" bg-dark" style="margin-top:10px; margin-bottom: 10px;">
      <div  class="col-lg-12 col-12 col-md-12 col-sm-12 col-xl-12 offset-md-0 offset-lg-0 offset-xl-0 offset-sm-0" id="margin" >
        @foreach ($querys as $query)
            <a href="/top/{{ $query->key_out }}"  style="text-decoration: none; " >
                <img src="/pictures/{{ $query->picture }}" class=" align-items-center justify-content-center mu-5   " alt="عکس" id="grade" data-bs-toggle="tooltip" data-bs-placement="bottom"  title="{{ $query->text1 }} از {{ $query->text }}">
            </a>
        @endforeach
      </div>
    </div>
<div class=" bg-dark"  id="column" >
    <div class="card col-2 " style="margin-top:1%; " id="c1">
        <i class="bi bi-music-note-beamed" style="margin-top:1%; text-align:center;">
        <header class="h5" style="color:#f6f7f7">جدید ترین آهنگ ها</header>
        </i>
        @foreach ($newsongs as $new)
        <a href="/top/{{ $new->keyout }}" class="list-group-item  border1"><p style="margin-right:3%; padding-top: 2%;  " dir="rtl"> دانلود اهنگ {{ $new->text1 }} از {{ $new->text }} </p></a></br>
        @endforeach
          </div>
      <div dir="rtl" id="c2" class="card col-2" style="margin-top:1%; background-color: #050505;padding: 20px 10px 10px 10px;">
            <div style="text-align:center;width: 100%;border-style: solid;  border-color: #e2e9e5; border-width: 1px; border-radius: 5px;">
                <i class="bi bi-music-note-beamed" style=" text-align: center; display: flex;justify-content: center; ">
                    <header class="h5" style="margin-top: -15px;padding-right: 5px ;background: #050505;width: fit-content;color:#f6f7f7">لیست خوانندگان</header>
                    </i>
       @foreach ($artists as $artist)
       <i class="bi bi-music-note-beamed text-white">
        <a  style="text-decoration: none ;float:right; color:#ffffff;"  href="/{{ $artist->name }}"><p id="artist"> &nbsp {{ $artist->name }}<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-music-note" viewBox="0 0 16 16">
            <path d="M9 13c0 1.105-1.12 2-2.5 2S4 14.105 4 13s1.12-2 2.5-2 2.5.895 2.5 2"/>
            <path fill-rule="evenodd" d="M9 3v10H8V3z"/>
            <path d="M8 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 13 2.22V4L8 5z"/>
          </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-music-note-beamed" viewBox="0 0 16 16">
            <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13s1.12-2 2.5-2 2.5.896 2.5 2m9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2"/>
            <path fill-rule="evenodd" d="M14 11V2h1v9zM6 3v10H5V3z"/>
            <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4z"/>
          </svg></p></a>
          </i>
        @endforeach
    </div>
      </div>
        <div class="row " id="wrapper" style="margin-top:1%;">
            @error('msg')
            <div class="alert alert-danger">
                <ul>
            <li style="text-align: center;  list-style-type: none;">{{ $message }}</li>
                </ul>
            </div>
            @enderror
            <header class="card" style=" background:#000000;height:auto;">
                <h1 class="h4 " style="text-align:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-headphones" viewBox="0 0 16 16">
                        <path d="M8 3a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V8a6 6 0 1 1 12 0v5a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h1V8a5 5 0 0 0-5-5"/>
                      </svg>
                      <i class="bi bi-headphones">
                <a href="{{ $link }}" style="text-decoration: none ;color:#f6f7f7 " title="{{ $h1 }}">{{ $h1 }}</a>
                      </i>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-music-note-beamed" viewBox="0 0 16 16">
                    <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13s1.12-2 2.5-2 2.5.896 2.5 2m9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2"/>
                    <path fill-rule="evenodd" d="M14 11V2h1v9zM6 3v10H5V3z"/>
                    <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4z"/>
                  </svg>
                </h1>
            </header>
            <div style="margin-top: 1%;"></div>
            @foreach ($mains as $main)
            <div class="card col-lg-12 offset-lg-0 col-md-12 offset-md-0 col-sm-12 offset-sm-0 col-12 black p-5 d-flex flex-column shadow "  >
                <div class="d-flex align-items-center justify-content-between">
                </div>
                <div class="d-flex align-items-center justify-content-center mu-5">
                    <a href="/top/{{ $main->id }}" style="text-decoration: none">
                    <img src="/pictures/{{ $main->picture }}" alt="عکس" class="img-fluid border-green shadow" style="border-radius:50%;width:220px;height:220px;">
                    </a>
                </div>
                <h2>
                <a href="/top/{{ $main->id }}" style="text-decoration: none ; color:white;" >
                <div class="text-white text-center " ><span class="fs-5 width:auto;">{{ $main->text1 }}</span><span class="text-green fw-bold fs-5"> از {{ $main->text }}</span></div>
                </a>
            </h2>
            <div class="justify-content-center offset-3 linkDow">
                <a href="/top/{{ $main->id }}"  class="list-group-item text-center  fs-7 width:auto fw-bold" ><p style="margin-top: 10px">مشاهده اهنگ</p></a>
            </div>
            </br>
            @if(Auth::guard('admin')->check())
            <p class="h5 text-green" style="text-align: center;">view:<span class="white">{{ $main->view }}</span></p>
            @endif
                <audio preload="none" src="/music/{{ $main->music }}" controls type="audio/mpeg" class="mx-auto col-md-12 col-12" style="margin-top: 10px;"></audio>
                </div>
                <div style="margin-top:1%;"></div>
            @endforeach
            <div class=" d-flex align-items-center justify-content-center offset-xl-0" style="margin-top: 10px;">
                @if ($page!=1)
            <a class="btn green page" href="?page=1" role="button" style="pading= 5px;">{{ 1 }}</a>
                @endif
                @for ($i=$page-2;$i<$page;$i++)
                @if ($i>1 and $i<$number_page )
                <a class="btn green page" href="?page={{ $i }} " role="button" style="pading= 5px;">{{ $i }}</a>
                @endif
                @endfor
            <a class="btn page" href="?page={{ $page }} " role="button" style="pading= 5px; background-color:grey;" disabled>{{ $page }}</a>
           <?php $n=$page+2 ?>
            @for ($i=$page+1;$i<=$n;$i++)
                @if ($i>1 and $i<$number_page )
                <a class="btn green page" href="?page={{ $i }} " role="button" style="pading= 5px;">{{ $i }}</a>
                @endif
                @endfor
                @if ($page!=$number_page)
            <a class="btn green page" href="?page={{ $number_page }} " role="button" style="pading= 5px;">{{ $number_page }}</a>
                @endif
                </div>
            </div>
        </div>
        </div>
        <footer class="black" style="padding:5%; margin-top:2%;margin-bottom:-20px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <div class="footer-heading" style="display: flex;justify-content: center;">
                            <a class="navbar-brand text-white" style="margin-left: 2%;" href="/">
                              <p class="h4" style="font-family:myMulti; color: #00a547;">PERSIAN<span style="color: grey;"> TOP </span> MUSIC</p>
                            </a></div>
                    </div>
                    <ul class="list-unstyled d-flex" style="justify-content: center;margin-top: 1%;" >
                        <li class="ms-3 "><a class="link-secondary foot" data-bs-toggle="tooltip" data-bs-placement="top" title="ایمیل" href="mailto:{{ $gmail }}" style="border: 1px solid #f6f8f7; border-radius:50px  ;padding: 5px;display: flex;justify-content: center;flex-direction: row; "><svg class="footsvg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-google" viewBox="0 0 16 16">
                            <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"/>
                          </svg></a></li>
                        <li class="ms-3"><a class="link-secondary foot" data-bs-toggle="tooltip" data-bs-placement="top" title="اینستاگرام" href="https://www.instagram.com/{{ $instagram }}" style="border: 1px solid #f6f8f7; border-radius:50px  ;padding: 5px;display: flex;justify-content: center;flex-direction: row; "><svg class="footsvg"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                          </svg></a></li>
                        <li class="ms-3"><a class="link-secondary foot" data-bs-toggle="tooltip" data-bs-placement="top" title="شماره تماس" href="tel:{{ $phoneNumber }}" style="border: 1px solid #f6f8f7; border-radius:50px  ;padding: 5px;display: flex;justify-content: center;flex-direction: row; "><svg class="footsvg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                          </svg></a></li>
                          <li class="ms-3"><a class="link-secondary foot" data-bs-toggle="tooltip" data-bs-placement="top" title="تلگرام" href="https://t.me/{{ $telegram }}" style="border: 1px solid #f6f8f7; border-radius:50px  ;padding: 5px;display: flex;justify-content: center;flex-direction: row; "><svg class="footsvg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-telegram" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09"/>
                          </svg></a></li>
                      </ul>
                </div>
                <p class="text-white h5 d-flex justify-content-center" dir="rtl"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-circle" viewBox="0 0 16 16">
                    <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512"/>
                  </svg>  تمامی حقوق مادی و معنوی این سایت متعلق به <a class="link-success link-underline-opacity-0"  href="/"> پرشین تاپ موزیک </a> است.</p>
            </div>
        </footer>
​      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> --}}
    <script>
        $(document).ready(function(){
            var isClicked = false;
            var close = false;
          $('#auto').click(function() {
            isClicked = true;
          });
          $('#close').click(function() {
            close = true;
          });
          $('#auto').click(function() {
            if (isClicked) {
                document.getElementById('hide').removeAttribute('hidden');
            }
          $('#close').click(function() {
            if (close) {
                document.getElementById('hide').setAttribute("hidden", true);
            }
          });
          });
            $('#search').on('keyup',function(){
                var query=$(this).val();
                $.ajax({
                    url:"searchauto",
                    type:"GET",
                    data:{'search':query},
                    success:function(data){
                        $('#search_list').html(data);
                    }
                });
            });
        });
     </script>
     <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        </script>
</body>

</html>
<style>
img{
  aspect-ratio: 1;
  border-radius: 20px;
  transition: .5s;
  cursor: pointer;
  -webkit-mask:
    linear-gradient(135deg,#000c 40%,#000,#000c 60%)
    100% 100%/250% 250%
}
img:hover {
  -webkit-mask-position: 0 0;
}
.foot:hover{
    color: black;
    background-color: #f6f8f7;
    transition: .8s;
    .footsvg{
        fill: #000000;
    transition: .8s;
    }
}


.page:hover{
    background-color: #00a547;
    transition: .7s;
    cursor: pointer;
   -webkit-mask:
    linear-gradient(135deg,#000c 40%,#000,#000c 60%)
    100% 100%/250% 250%
}
.border1:hover {
    color: #000000;
    transition: .7s;
    cursor: pointer;
   -webkit-mask:
    linear-gradient(135deg,#000c 40%,#000,#000c 60%)
    100% 100%/250% 250%
}
#artist:hover {
    color: #00a547;
    transition: .8s;
    cursor: pointer;
   -webkit-mask:
    linear-gradient(135deg,#0a4c 40%,#0a4,#0a4c 60%)
    100% 100%/250% 250%
}
@font-face {
  font-family: myMulti;
  src: url(/Monoton-RXOM.ttf);
}
@font-face {
  font-family: pesian;
  src: url(\IRANSansWeb.woff);
}
@font-face {
  font-family: myFirstFont;
  src: url(/A.Naskh.Tahrir.Bold.ttf);
}
@font-face {
  font-family: 'IranNastaliq';
  src: url(/IranNastaliq.ttf);
}
@font-face {
    font-family: 'Lalezar';
    src: url(/Lalezar-Regular.ttf);
  }
  .persian-text {
    font-family: 'IranNastaliq';
    font-weight: bold;
  }
    .black {
        background-color: #050505;
    }
    .white{
        color: #f6f7f7;
    }
    .green {
        background-color: #00a547;
    }

    .border-green {
        border: 7px solid #00a547;
    }

    .text-green {
        color: #00a547;

    }
.border1{
        background-color: #00a547;
        margin-top: 10px;
        border: 2px solid #f6f7f7;
        border-radius:20px;
        backdrop-filter:blur(5px);
        width:90% ;
        align-self: center;
        text-align: right;
}
.linkDow{
        background-color: #00a547;
        margin-top: 10px;
        border: 2px solid #f6f7f7;
        border-radius:20px;
        text-decoration: none;
        width:50% ;
        height:50px ;

}
.hide{
    background:transparent;
    backdrop-filter:blur(5px);
    position:fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index:99;
}
.scrool {
  overflow: scroll;
  -webkit-overflow-scrolling: touch;
}
.scrool::-webkit-scrollbar {
  display: none;
  -ms-overflow-style: none;
  scrollbar-width: none;
}
    #wrapper{;
    overflow:auto;
}

#c1{
   float:left;
   color: #f6f7f7;
   background-color:#000000;
    display: flex;
   flex-direction: column;
}

#c2{

    float:right;
}

@media  (max-width: 390px){
#grade{
    width: 48%;
}
#margin{
    margin-left: 2%;
}
.logo{
    width: 100%;
}
.brand{
    width: 100%;
    text-align: center;
}
.sad{
    width: 40%;
    text-align: center;
}
.happy{
    width: 40%;
    text-align: center;
}
.form{
    width: 97%;
    height: 60%;
    order: 1;
    margin-left:1.5%;
}
}
@media (min-width: 390.1px) and (max-width: 425px) {
#grade{
width: 23%;
}
#margin{
    margin-left: 2%;
}
.logo{
    width: 100%;
}
.brand{
    width: 100%;
    text-align: center;
}
.sad{
    width: 40%;
    text-align: center;
}
.happy{
    width: 40%;
    text-align: center;
}
.form{
    width: 97%;
    height: 60%;
    order: 1;
    margin-left:1.5%;
}
 }
 @media (min-width: 425.1px) and (max-width: 768px) {
    #grade{
width: 24%;
}
#margin{
    margin-left: 1%;
}
.logo{
    width: 50%;
    align-self: center;
}
.brand{
    width: 100%;
    text-align: center;
}
.sad{
    width: 40%;
    text-align: center;
}
.happy{
    width: 40%;
    text-align: center;
}
.form{
    width: 97%;
    height: 60%;
    order: 1;
    margin-left:1.5%;
}
.logosi{
    width: 100%;
    display: flex;
    flex-direction: column;
}
  }
  @media (min-width: 768.1px) and (max-width: 860px) {
    #grade{
width: 24%;
}
#margin{
    margin-left: 1%;
}
/* .logo{
    height: 150px;
     width:200px;

}
.logosi{
    margin-left:7px;
}*/
.form{
    margin-right:7px;
    height: 80%;
}
   }
   @media (min-width: 860.1px)  {
    #grade{
width: 11.9%;
}
#margin{
    margin-left: 1.2%;
}
/* .logo{
    height: 150px;
     width:200px;

}
.logosi{
    margin-left:7px;
}*/
.form{
    margin-right:7px;
    width: 60%;
    height: 80%;
}
   }
@media (max-width: 860px )  {
#column{
    display:flex;
    flex-direction:column-reverse;
}
#wrapper{
    width: 100%;
    align-self: center;
}
#c1{
    width: 100%;
    height: fit-content;
}
#c2{
    width: 100%;
    height: fit-content;
    flex-direction: row-reverse;
}
}
@media (min-width: 860.1px){
#column{
    display:flex;
    justify-content: space-between;

    }
#wrapper{
    width: 50%;
    order: 1;
    height: fit-content;
}
#c1{
    width: 22%;
    order: 0;
    height: fit-content;
    margin-left: 1%;
}
#c2{
    width: 22%;
    order: 2;
    height: fit-content;
    flex-direction: row-reverse;
    margin-right: 1%;
}
}
@media (min-width: 400.1px){
.svgs{
    width:270px;
}
.sizesvg{
    font-size:20px;
}
.persian-text{
    font-size: 25px
}
}
@media (min-width: 350px) and (max-width: 400px)  {
    .svgs{
    width:240px;
}
.sizesvg{
    font-size:18px;
}
}
@media (min-width: 299.1px ) and (max-width: 349.9px) {
.svgs{
    width:190px;
}
.sizesvg{
    font-size:15px;
}
}
@media (max-width: 299px )  {
.svgs{
    width:150px;
}
.sizesvg{
    font-size:12px;
}
}
@media (min-height: 634.1px) {
.scrool{
    height: 450px;
}
}
@media (min-height: 600.1px) and (max-height: 634px)  {
.scrool{
    height: 400px
}
}
@media (min-height: 584.1px) and (max-height: 600px)  {
.scrool{
    height: 370px
}
}
@media (min-height: 535.1px) and (max-height: 584px)  {
.scrool{
    height: 350px
}
}
@media (min-height: 500.1px) and (max-height: 535.1px)  {
.scrool{
    height: 318px
}
}
@media (min-height: 473.1px) and (max-height: 500px)  {
.scrool{
    height: 290px
}
}
@media (max-height: 473px)  {
.scrool{
    height: 250px
}
}
</style>
