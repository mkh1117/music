<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body >
    <div class="container bg-dark" >

    <nav class="navbar black col-12">
        <a href="/" class="logosi" style="text-decoration: none;">
            <img src="/logo/logo4.png" class="col-1 logo" alt="لوگو" >
        </a>
        <h3 class="brand"><a class="navbar-brand  text-green " style="margin-left:2.5%;" href="/" >persian top music</a></h3>
        <a class="navbar-brand  text-green happy" href="/happy" >آهنگ شاد</a>
        <a class="navbar-brand  text-green sad" href="/sad" >آهنگ غمگین</a>
          <form class="form-inline my-2 my-lg-0 form" action="{{ Route('search') }}" method="post" style="display: flex">
            @csrf
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>

        </div>
      </nav>
    </div>

    <div class="container bg-dark" >
      <div  class=" col-lg-12 col-12 col-md-12 col-sm-12 col-xl-12 offset-md-0 offset-lg-0 offset-xl-0 offset-sm-0" id="margin" >
        @foreach ($querys as $query)
            <a href="/top/{{ $query->key_out }}"  style="text-decoration: none; " class="" title="{{ $query->text1 }} از {{ $query->text }}">
                <img src="/pictures/{{ $query->picture }}" class=" align-items-center justify-content-center mu-5   " alt="عکس" id="grade" >
            </a>

        @endforeach
      </div>
    </div>
<div class="container bg-dark"  id="column">
    <div class=" col-2 " style="margin-top:5%; " id="c1">
        <i class="bi bi-music-note-beamed" style="margin-top:1%; text-align:center;">
            <header class="text-green h5">جدید ترین آهنگ ها</header>
            </i>
    @foreach ($newsongs as $new)
    <a href="/top/{{ $new->keyout }}" class="list-group-item  border1"><p style="margin-right:3%; margin-top:2%; ">دانلود اهنگ {{ $new->text1 }} از {{ $new->text }} </p></a></br>
    @endforeach
      </div>
  <div id="c2" class=" col-2" style="margin-top:5%; background:linear-gradient(90deg,rgb(84, 83, 84)40%,rgb(110, 110, 112)60%,rgb(167, 167, 171)100%); ">
    <i class="bi bi-music-note-beamed" style="margin-top:1%; text-align:center;">
        <header class="h5" style="color: #000000;">لیست خوانندگان</header>
        </i>
    <div style=" text-align:right;">
    @foreach ($artists as $artist)
   <i class="bi bi-music-note-beamed">
    <a class="link-dark" style="text-decoration: none ;float:right;" href="/{{ $artist->name }}"><p ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-music-note" viewBox="0 0 16 16">
        <path d="M9 13c0 1.105-1.12 2-2.5 2S4 14.105 4 13s1.12-2 2.5-2 2.5.895 2.5 2"/>
        <path fill-rule="evenodd" d="M9 3v10H8V3z"/>
        <path d="M8 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 13 2.22V4L8 5z"/>
      </svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-music-note-beamed" viewBox="0 0 16 16">
        <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13s1.12-2 2.5-2 2.5.896 2.5 2m9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2"/>
        <path fill-rule="evenodd" d="M14 11V2h1v9zM6 3v10H5V3z"/>
        <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4z"/>
      </svg> {{ $artist->name }} </p></a>
    </i>
    @endforeach
  </div>
  </div>
        <div class="row " id="wrapper" style="margin-top:5%;">
            <header style=" background:linear-gradient(90deg,rgb(12, 12, 12)10%,rgb(50, 50, 49)50%,rgb(84, 83, 84)100%);height:fit-content;">
                <h1 class="h5" style="text-align:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-headphones" viewBox="0 0 16 16">
                        <path d="M8 3a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V8a6 6 0 1 1 12 0v5a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h1V8a5 5 0 0 0-5-5"/>
                      </svg>
                      <i class="bi bi-headphones">
                    @foreach ($tops as $top)
                <a href="/top/{{ $top->id }}" class="text-green" style="text-decoration: none ; " title="دانلود اهنگ {{ $top->text1 }} ">دانلود اهنگ {{ $top->text }} {{ $top->text1 }} </a>
                      </i>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-music-note-beamed" viewBox="0 0 16 16">
                    <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13s1.12-2 2.5-2 2.5.896 2.5 2m9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2"/>
                    <path fill-rule="evenodd" d="M14 11V2h1v9zM6 3v10H5V3z"/>
                    <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4z"/>
                  </svg>
                </h1>
            </header>
            <div style="margin-top: 1%;"></div>
            <div class="col-lg-12 offset-lg-0 col-md-12 offset-md-0 col-sm-12 offset-sm-0 col-12 black p-5 d-flex flex-column shadow "  >
                <div class="d-flex align-items-center justify-content-between">
                    <i class=" fa-solid fa-arrow-up-from-bracket border  border-4  rounded-pill p-2 fs-5 shadow" style="background-color: #00a547"></i>
                    <i class="fa-solid fa-bars border  border-4 rounded-pill p-2 fs-5 shadow" style="background-color: #00a547"></i>
                </div>
                <div class="d-flex align-items-center justify-content-center mu-5">
                    <a href="/top/{{ $top->id }}">
                    <img src="/pictures/{{ $top->picture }}" alt="عکس" class="img-fluid border-green shadow" style="border-radius:50%;width:220px;height:220px;">
                    </a>
                </div>
                <a href="/top/{{ $top->id }}" style="text-decoration: none ; color:white;" >
                <div class="text-white text-center " ><h2 class="h5">{{ $top->text1 }}<span class="text-green fw-bold fs-5"> از {{ $top->text }}</span></h2>
                </a>
                </div>
                <div class="justify-content-center offset-3 linkDow">
                    <a href={{ asset('/music/'.$top->music) }}  class="list-group-item text-center  fs-7 width:auto fw-bold" ><p style="margin-top: 10px">دانلود اهنگ</p></a>
                </div>
                @if(Auth::guard('admin')->check())
                </br>
                <p class="h5 text-green" style="text-align: center;">view:<span class="white">{{ $top->view }}</span></p>
                @endif
                @if ($top->lyric!=null)
                <h3 class="h5 list-group-item text-center" style="color: #f6f7f7; margin-top:1%;">متن اهنگ {{ $top->text1 }} {{ $top->text }} </h3>
                @endif
                <div class="text-white text-center ">
                    {!! nl2br($top->lyric) !!}
                </div>
                <audio src="/music/{{ $top->music }}" controls type="audio/mpeg" class="mx-auto col-md-12 col-12" style="margin-top: 10px;">
                </div>
                <div style="margin-top:5%;"></div>
            @endforeach
            </div>
        </div>
​
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
<style>
    .black {
        background-color: #121212;
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
    #wrapper{;
    overflow:auto;
}

#c1{
   float:left;
   color: #f6f7f7;
   background:linear-gradient(90deg,rgba(69, 68, 69,1)0%,rgba(14, 154, 112, 0) 35%,rgb(2,0,36)100%);
   display: flex;
   flex-direction: column;
}

#c2{

    float:right;
}

@media  (max-width: 320px){
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
    margin-left:1.5%;
}
}
@media (min-width: 320.1px) and (max-width: 425px) {
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
    margin-left:1.5%;
}
.logosi{
    width: 100%;
    display: flex;
    flex-direction: column;
}
  }
  @media (min-width: 768.1px) and (max-width: 1024px) {
    #grade{
width: 11.9%;
}
#margin{
    margin-left: .57%;
}
.logo{
    height: 150px;
     width:200px;

}
.logosi{
    margin-left:7px;
}
.form{
    margin-right:7px;
}
   }
   @media (min-width: 768.1px)  {
    #grade{
width: 11.9%;
}
#margin{
    margin-left: 1.2%;
}
.logo{
    height: 150px;
     width:200px;

}
.logosi{
    margin-left:7px;
}
.form{
    margin-right:7px;
}
   }
@media (max-width: 1000px )  {
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
@media (min-width: 1000.1px){
#column{
    display:flex;
    justify-content: space-between;
    }
#wrapper{
    width: 55%;
    order: 1;
    height: fit-content;
}
#c1{
    width: 22%;
    order: 0;
    height: fit-content;
}
#c2{
    width: 22%;
    order: 2;
    height: fit-content;
    flex-direction: row-reverse;
}
}
</style>

