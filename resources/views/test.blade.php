@extends('nav')
@section('title','Upload Song')
@section('navbar')
    @yield('navbar')
           <div class="content">
            @error('msg')
            <div class="alert alert-success" style="text-align: center;"><h4>{{ $message }}</h4></div>
           @enderror
            <div  class=" col-lg-8 offset-lg-2" style="margin-top:2%;margin-top:2%;backdrop-filter:blur(5px);border:2px solid rgba(255,255,255,.2); border-radius:20px; ">
                <p class="h3 white" style="text-align: center;">آپلود آهنگ</p>
                <div style="display: flex;justify-content: center;">
                <hr class="white" style="width: 30%; ">
                </div>
                <form id="myForm" enctype="multipart/form-data" action="{{ Route('input') }}" method="post" >
                    @csrf
                    <div class="input-group mb-3" style="margin-top: 10px;">
                        <input type="file" name="pitcure" class=" form-control-lg col-11 text-white back" dir="rtl" id="inputGroupFile01" />
                        <label class="input-group-text text-white back col-1" for="inputGroupFile01">عکس</label>
                    </div>
                    @error('pitcure')
                    <div  class="large-input" style="color: red; text-align: right;" dir="rtl">فایل وارد شده باید یکی از (jpeg,png,jpg,gif,svg) باشد</div>
                    @enderror
                    <div class="input-group mb-3" style="margin-top: 10px;">
                        <input type="file" name="music" class=" form-control-lg col-11 text-white back" dir="rtl" id="inputGroupFile02" />
                        <label class="input-group-text text-white back col-1" for="inputGroupFile02">موزیک</label>
                    </div>
                    @error('music')
                    <div class="large-input" style="color: red; text-align: right;" dir="rtl">فایل وارد شده باید یکی از (mpeg,mpga,mp3,wav) باشد</div>
                    @enderror
                    <div class="form-group col-12" style="text-align: right" dir="rtl">
                        <label class="text-white back" style="font-size: 16px;" for="exampleFormControlSelect1">اسم خواننده:</label>
                        <select class="form-select text-white back col-11 "  style="font-size: 16px; padding: 5px" name="text" id="exampleFormControlSelect1">
                            @foreach ($name as $row)
                            <option  value="{{ $row->name }}" style="color:black">{{ $row->name }}</option>
                            @endforeach
                        </select>
                      </div>
                      @error('text')
                      <div class="large-input" style="color: red; text-align: right;" dir="rtl">این فیلد نباید خالی باشد!</div>
                      @enderror
                    <div class="input-group" style="margin-top: 10px;">
                        <input type="text" dir="rtl" name="text1" id="typeText" class="form-control text-white back large-input" />
                        <span class="input-group-text text-white back">اسم آهنگ</span>
                    </div>
                    @error('text1')
                    <div class="large-input" style="color: red; text-align: right;" dir="rtl">این فیلد نباید خالی باشد!</div>
                    @enderror
                    <hr class="white">
                    <div  style="text-align: right">
                    <header class="white " style="text-align: right">نوع آهنگ</header>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"  type="checkbox" id="inlineCheckbox1" value="true" name="top">
                        <label class="form-check-label text-white back" for="inlineCheckbox1" >موزیک تاپ</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input " type="checkbox" name="newsong" id="inlineCheckbox2" value="true">
                        <label class="form-check-label text-white back" for="inlineCheckbox2">موزیک جدید</label>
                      </div>
                    </div>
                      <hr class="white">
                    <div class="form-check" style="text-align: right">
                        <input  type="checkbox" id="flexCheckDefault" onclick="myFunction()">
                        <label class="form-check-label text-white back" for="flexCheckDefault" style="padding-left: 0;">
                          افزودن متن
                        </label>
                        </div>
                         <div class="input-group" style="margin-top: 10px;">
                            <textarea
                            class="form-control form-control-sm border border-2 rounded-1 large-input text-white back dash-textarea" dir="rtl" name="lyric" id="string"style="height: 100px ; " maxlength="1100" disabled></textarea>
                            <span class="input-group-text text-white back">متن آهنگ</span>
                        </div>
                        @error('lyric')
                        <div class="large-input" style="color: red; text-align: right;" dir="rtl">حداکثر 1100 کاراکتر وارد کنید!</div>
                        @enderror
                        <hr class="white">
                        <div style="text-align: right">
                              <header class="col-form-label pt-0 white " style="text-align:right" >دسته بندی</header>
                                @foreach ($category as $c)
                                <div class="form-check form-check-inline" >
                                    <input class="form-check-input" type="checkbox" name="category[]" value="{{ $c->category }}" id="{{ $c->category }}">
                                    <label class="form-check-label" for="{{ $c->category }}" style="color: white;">
                                      {{ $c->category }}
                                    </label>
                                  </div>
                                  @endforeach
                        </div>
                          <hr class="white">
                    <input type="submit" class="btn btn-primary" value="ok" name="ok" style="margin-top: 10px; margin-bottom:10px ; width:50%; margin-left:25%;">
                </form>
            </div>
        </div>
        <div id="loadingMessage" style="display: none;">
            <div class="loading-overlay">
                <div class="loading-spinner"></div>
                <p class="loading-text" dir="rtl">لطفاً منتظر بمانید...</p>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
         <script>
        function myFunction() {
          var checkBox = document.getElementById("flexCheckDefault");
        if (checkBox.checked == true){
            document.getElementById('string').removeAttribute('disabled');
          } else if(checkBox.checked == false) {
            document.getElementById('string').setAttribute("disabled",true);
          }
        }
        </script>
        <script>
            $(document).ready(function () {
                $("#myForm").on("submit", function () {

                    $("#loadingMessage").show();

                    $("input[type='submit']").prop("disabled", true);
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
