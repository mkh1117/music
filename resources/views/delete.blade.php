@extends('nav')
@section('title','delete song')
@section('navbar')
    @yield('navbar')
        <div class="content">
            @error('msg')
            <div class="alert alert-success" style="text-align: center;"><h4>{{ $message }}</h4></div>
           @enderror
            @error('error')
            <div class="alert alert-danger" style="text-align: center;"><h4>{{ $message }}</h4></div>
           @enderror
            <div class="col-lg-8 offset-lg-2" style="margin-top:2%;margin-top:2%;backdrop-filter:blur(5px);border:2px solid rgba(255,255,255,.2); border-radius:20px; ">
                <p class="h3 white" style="text-align: center;">حذف آهنگ</p>
                <div class="input-group" style="margin-top: 10px;" dir="rtl">
                        <div class="input-group" style="margin-top: 10px;">
                            <span class="input-group-text text-white back">نام آهنگ</span>
                            <input type="text" name="id" id="search_music" placeholder="نام آهنگ یا خواننده" class="form-control text-white back large-input">
                        </div>
                </div>
            </div>
            <div style="display: flex; justify-content: center;">
                <div id="search_list"  style="width: 30%;text-align: right; z-index:99;position:fixed;"></div>
            </div>
            @if ($isset)

            <div class="border border-5 col-lg-8 offset-lg-2" style="margin-top:2%;">
                <div class="input-group" style="margin-top: 10px;" >
                @foreach ($rows as $row)
                <div class="col-lg-12 offset-lg-0 col-md-12 offset-md-0 col-sm-12 offset-sm-0 col-12 black p-5 d-flex flex-column shadow "  >
                    <div class="d-flex align-items-center justify-content-center mu-5">
                        <img src="/pictures/{{ $row->picture }}" alt="عکس" class="img-fluid border-green shadow" style="border-radius:50%;width:220px;height:220px;">
                    </div>
                    <div class="text-white text-center " >{{ $row->text1 }}<span class="text-green fw-bold fs-5"> از {{ $row->text }}</span>
                    </div>
                        <audio src="/music/{{ $row->music }}" controls type="audio/mpeg" class="mx-auto" style="width: 80%"></audio>
                        <div style="margin-top:5%;"></div>
            </div>
            </div>
                <p class="h3 text-danger"style="display:flex;justify-content:end;" > ?از پاک کردن این اهنگ مطمئنید</p>
                <form id="myForm" action="{{ route('deletes') }}" method="post" style="display:flex;justify-content:center;">
                    @csrf
                    <input type="submit" class="btn btn-danger col-2" value="بله" name="sub" style="margin: 10px; margin-bottom:10px; ">
                        <input type="submit" class="btn btn-success col-2" value="خیر" name="no"style="margin: 10px; margin-bottom:10px;">
                    <input type="hidden" name="id" value="{{ $id }}">
                    <input type="hidden" name="picture" value="{{ $row->picture }}">
                    <input type="hidden" name="music" value="{{ $row->music }}">
                </form>
                @endforeach
        </div>
        </div>
        @endif

    </div>
    <div id="loadingMessage" style="display: none;">
        <div class="loading-overlay">
            <div class="loading-spinner"></div>
            <p class="loading-text" dir="rtl">لطفاً منتظر بمانید...</p>
        </div>
    </div>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#search_music').on('keyup',function(){
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
    $(document).ready(function () {
        $("#myForm").on("submit", function () {

            $("#loadingMessage").show();

            $(".sub").prop("disabled", true);
        });
    });
</script>
@endsection

@section('style')
.large-input {
font-size: 16px;
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

@endsection

