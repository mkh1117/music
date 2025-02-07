@extends('nav')
@section('title','Edit Song')
@section('navbar')
    @yield('navbar')
           <div class="content">
            @error('msg')
            <div class="alert alert-success" style="text-align: center;"><h4>{{ $message }}</h4></div>
           @enderror
            @error('error')
            <div class="alert alert-danger" dir="rtl" style="text-align: center;"><h4>{{ $message }}</h4></div>
           @enderror

            <div class=" col-lg-8 offset-lg-2" style="margin-top:2%;backdrop-filter:blur(5px);border:2px solid rgba(255,255,255,.2); border-radius:20px;">
                <p class="h3 white" style="text-align: center;">ویرایش آهنگ</p>
                <div class="input-group" style="margin-top: 10px;">
                    <form action="{{ route('update') }}" method="get" style="width:100%;" dir="rtl">
                        @csrf
                        <div class="input-group" style="margin-top: 10px;margin-bottom: 10px;">
                            <span class="input-group-text text-white back">اسم اهنگ</span>
                            <input type="text" name="id" id="search_music" placeholder="نام آهنگ را وارد کنید" class="form-control text-white back large-input"  />
                            @error('id')
                                <div class="large-input" style="color: red; text-align: right;" dir="rtl">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>
            <div style="display: flex; justify-content: center;">
                <div id="search_list"  style="width: 30%;text-align: right; z-index:99;position:fixed;"></div>
            </div>
            @if ($isset)
                <div class="col-lg-8 offset-lg-2" style="margin-top:2%;backdrop-filter:blur(5px);border:2px solid rgba(255,255,255,.2); border-radius:20px; ;">
                    <div class="input-group" style="margin-top: 10px;display: flex; justify-content: center;" >
                        @foreach ($rows as $row)
                        <img src="/pictures/{{ $row->picture }}" class=""  alt="عکس" style="width: 150px;">
                        <form enctype="multipart/form-data" action="{{ route('updates') }}" method="post" id="myForm" style="width:100%; background:transparent;">
                            @csrf
                                <div class="input-group mb-3 text-white back" style="margin-top: 10px;" dir="rtl">
                                    <label class="input-group-text text-white back" for="inputGroupFile01">عکس</label>
                                    <input type="file" name="pitcure" class="form-control-lg col-11 text-white back"  id="inputGroupFile01" />
                                    @error('pitcure')
                                     <div style="color: red;" dir="rtl">فایل وارد شده باید یکی از (jpeg,png,jpg,gif,svg) باشد</div>
                                     @enderror
                                </div>
                                @endforeach
                                <div class="form-group" style="text-align: right" dir="rtl">
                                    <label class="text-white back" style="font-size: 16px" for="exampleFormControlSelect1">اسم خواننده:</label>
                                    <select class="form-select text-white back col-11 large-input" style="padding: 5px" name="text" id="exampleFormControlSelect1">
                                        <option selected value="{{ $name }}" style="color:black">{{ $name }}</option>
                                        @foreach ($names as $row)
                                        <option  value="{{ $row->name }}" style="color:black">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('text')
                                    <div style="color: red;" dir="rtl">این فیلد نباید خالی باشد!</div>
                                    @enderror
                                  </div>
                                  @foreach ($rows as $row)
                                <div class="input-group" style="margin-top: 10px;" dir="rtl">
                                    <span class="input-group-text text-white back ">اسم آهنگ</span>
                                    <input type="text" name="text1" id="typeText" class="form-control text-white back large-input" value="{{ $row->text1 }}">
                                </div>
                                @error('text1')
                                    <div style="color: red;" dir="rtl">این فیلد نباید خالی باشد!</div>
                                    @enderror
                                @if ($top!=null or $newsong!=null)
                                <hr class="white">
                                <div style="text-align: right">
                                <header class="white" style="text-align: right">حذف نوع آهنگ</header>
                                {!! $top !!}
                                {!! $newsong !!}
                                </div>
                                @endif
                            @if ($top==null or $newsong==null)
                            <hr class="white">
                            <header class="white" style="text-align: right">افزودن نوع آهنگ</header>
                            <div style="text-align: right">
                            @endif
                    @if ($top==null)
                    <div class="form-check form-check-inline" >
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="true" name="top" >
                        @error('top')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label class="form-check-label white" for="inlineCheckbox1">موزیک تاپ</label>
                      </div>
                    @endif
                    @if ($newsong==null)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="true" name="newsong">
                        @error('newsong')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label class="form-check-label white" for="inlineCheckbox2" >موزیک جدید</label>
                      </div>
                    @endif
                    @if ($top==null or $newsong==null)
                            </div>
                    @endif
                      <hr class="white">
                                <div style="text-align: right">
                                <span  style="margin-top: 10px;color:white; text-align: right">متن آهنگ:</span>
                                <textarea dir="rtl" class="form-control form-control-sm border border-2 rounded-1 text-white back dash-textarea" name="lyric"
                                    id="string"style="height: 100px;margin-top: 10px;"  minlength="0" maxlength="1100">{!! $row->lyric !!} </textarea>
                                        @error('lyric')
                                            <div dir="rtl" style="color: red;">حداکثر 1100 کاراکتر وارد کنید!</div>
                                        @enderror
                                    </div>
                                        <hr class="white">
                                            @if ($row->category!=null)
                                            <div style="text-align: right">
                                            <p class="col-form-label pt-0 white"  style="text-align: right">حذف دسته بندی ها</p>
                                            <div style="display: inline-flex;">
                                                @foreach (json_decode($row->category) as $c)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input custombg" type="checkbox" name="deletecategory[]" value="{{ $c }}" id="{{ $c }}">
                                                    <label class="form-check-label" for="{{ $c }}" style="color: white;">
                                                      {{ $c }}
                                                    </label>
                                                  </div>
                                                @endforeach
                                            </div>
                                            </div>
                                            <hr class="white">
                                            @endif
                                        @if ($category!=null)
                                        <div style="text-align: right">
                                        <header class="col-form-label  pt-0 white" style="text-align: right">افزودن دسته بندی</header>
                                        @foreach ($category as $c)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="category[]" value="{{ $c }}" id="{{ $c }}">
                                            <label class="form-check-label" for="{{ $c }}" style="color: white;">
                                              {{ $c }}
                                            </label>
                                          </div>
                                        @endforeach
                                    </div>
                                    <hr class="white">
                                        @endif
                                <input type="submit" class="btn btn-primary" value="submit"
                                    name="sub"style="margin-top: 10px; margin-bottom:10px; width:100%;">
                                    <input type="hidden" name="picturename" value="{{ $row->picture }}">
                                 @endforeach
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="hidden" name="picturetop" value="{{ $row->picture }}">
                                <input type="hidden" name="jsoncategory" value="{{ $row->category }}">
                            </form>
        </div>
    </div>
    @endif
    <div id="loadingMessage" style="display: none;">
        <div class="loading-overlay">
            <div class="loading-spinner"></div>
            <p class="loading-text" dir="rtl">لطفاً منتظر بمانید...</p>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
