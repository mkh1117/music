@extends('nav')
@section('title','add artist')
@section('navbar')
    @yield('navbar')
        <div class="content">
            @error('msg')
            <div class="alert alert-success" style="text-align: center;"><h4>{{ $message }}</h4></div>
           @enderror
            <div class="col-lg-8 offset-lg-2" style="margin-top:2%;margin-top:2%;backdrop-filter:blur(5px);border:2px solid rgba(255,255,255,.2); border-radius:20px;background-color: #27293d; ">
                <p class="h3 white" style="text-align: center;">افزودن خواننده</p>
                <div class="input-group" style="margin-top: 10px;">
                    <form action="{{ route('tag') }}" method="post" style="width:100%;">
                        @csrf
                        <div class="input-group" style="margin-top: 10px;" dir="rtl">
                            <span class="input-group-text text-white back">نام خواننده:</span>
                            <input type="text" name="tag" id="typeText" class="form-control text-white back large-input">
                        </div>
                        @error('tag')
                        <div style="color: red;font-size: 18px; text-align: right" dir="rtl">{{ $message }}</div>
                        @enderror
                        <input type="submit" class="btn btn-primary" value="submit"
                            name="submit"style="margin-top: 10px; margin-bottom:10px; width:100%;">
                    </form>
                </div>
                @if (isset($_POST['submit']))
                    <p class="h3 white" style="display:flex; justify-content:center;">نام خواننده:{{ $name }}</p>
                    <hr>
                    <p class="h3 text-white"style="display:flex;justify-content:center;" >خواننده اضافه شود؟</p>
                    <form  id="myForm" action="{{ route('SubTag') }}" method="post" style="display:flex;justify-content:center;">
                        @csrf
                        <input type="submit" class="btn btn-success col-2" value="بله" name="sub"style="margin: 10px; margin-bottom:10px; ">
                        <input type="submit" class="btn btn-danger col-2" value="خیر" name="no"style="margin: 10px; margin-bottom:10px;">
                        <input type="hidden" name="name" value="{{ $name }}">
                    </form>
                @endif
            </div>
        </div>
    </div>
    <div id="loadingMessage" style="display: none;">
        <div class="loading-overlay">
            <div class="loading-spinner"></div>
            <p class="loading-text" dir="rtl">لطفاً منتظر بمانید...</p>
        </div>
    </div>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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

