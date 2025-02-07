@extends('nav')
@section('title','category')
@section('navbar')
    @yield('navbar')
    <div class="content">
        @error('msg')
            <div class="alert alert-success" style="text-align: center;"><h4>{{ $message }}</h4></div>
           @enderror
       @foreach ($message as $m)
    <div dir="rtl" class="message-container col-lg-8 offset-lg-4" style="margin-top:2%;margin-top:2%;padding: 2%;backdrop-filter:blur(5px);border:2px solid rgba(255,255,255,.2); border-radius:20px; ">
                        <div class="header">
                            <h1>پیام کاربر</h1>
                            <button onClick="history_back()">بازگشت</button>
                        </div>
                        <div class="message-info" style="text-align: right">
                    <p><strong>نام:</strong> {{ $m->name }}</p>
                    <p><strong>ایمیل:</strong> {{ $m->email }}</p>
                    <p><strong>پیام:</strong></p>
                    <p class="mb-0 h4" style="color: black; text-align: right">
                        {!! nl2br($m->message) !!}
                      </p>
                        </div>
                        <div class="reply-section" >
                            <h2 style="color: black;text-align: right">پاسخ به پیام</h2>
                            <form id="myForm" action="{{ route('email') }}" method="post">
                                @csrf
                            <textarea placeholder="متن پاسخ خود را بنویسید..." name="answer"></textarea>
                            @error('answer')
                             <div style="color: red;text-align: right" >این فیلد خالی است</div>
                             @enderror
                            <input type="submit" class="btn btn-primary" value="ارسال پاسخ"
                    name="submit"style="margin-top: 10px; margin-bottom:10px;">
                        </form>
                        </div>
                        </div>

        @endforeach
        <div id="loadingMessage" style="display: none;">
            <div class="loading-overlay">
                <div class="loading-spinner"></div>
                <p class="loading-text" dir="rtl">لطفاً منتظر بمانید...</p>
            </div>
        </div>
        <script>
            function history_back() {
                if (document.referrer) {
                window.location.href = document.referrer;
                }
                else {
                window.location.href = "/admin";
                }
            }
        </script>
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

