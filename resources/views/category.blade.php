@extends('nav')
@section('title','category')
@section('navbar')
    @yield('navbar')
    <div class="content">
        @error('msg')
        <div class="alert alert-success" style="text-align: center;"><h4>{{ $message }}</h4></div>
       @enderror
    <div dir="rtl" class="col-lg-8 offset-lg-2" style="margin-top:2%;margin-top:2%;padding: 2%;backdrop-filter:blur(5px);border:2px solid rgba(255,255,255,.2); border-radius:20px; ">
        <p class="h3 white" style="text-align: center;">افزودن دسته بندی</p>
        <div class="input-group" style="margin-top: 10px;">
            <form id="myForm" action="{{ route('category') }}" method="post" style="width:100%;">
                @csrf
                <div class="input-group col-12" style="margin-top: 10px; ">
                    <input type="text" placeholder="نام دسته بندی " name="category" id="typeText" class="form-control text-white back large-input">
                </div>
                    @error('category')
                    <div class="large-input" style="color: red;text-align: right" >{{ $message }}</div>
                    @enderror
                <input type="submit" class="btn btn-primary" value="submit"
                    name="submit"style="margin-top: 10px; margin-bottom:10px; width:100%;">
            </form>
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

                    $(".ok").prop("disabled", true);
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
