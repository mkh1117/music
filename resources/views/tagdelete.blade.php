@extends('nav')
@section('title','artistdelete')
@section('navbar')
    @yield('navbar')
    <div class="content">
        @error('msg')
        <div class="alert alert-success" style="text-align: center;"><h4>{{ $message }}</h4></div>
       @enderror
    <div class=" col-lg-8 offset-lg-2" style="margin-top:2%;backdrop-filter:blur(5px);border:2px solid rgba(255,255,255,.2); border-radius:20px;">
        <p class="h3 white" style="text-align: center;">حذف خواننده</p>
        <div class="input-group" style="margin-top: 10px;" dir="rtl">
                <div class="input-group" style="margin-top: 10px;margin: 10px;">
                    <span class="input-group-text text-white back">اسم خواننده</span>
                    <input type="text" name="id" id="search_music" class="form-control text-white back large-input">
                </div>
        </div>
    </div>
    <div style="display: flex; justify-content: center;">
        <div id="search_list"  style="width: 30%;text-align: right; z-index:99;position:fixed;"></div>
    </div>

    @if ($isset)
    <div class="col-lg-8 offset-lg-2" style="margin-top:2%;backdrop-filter:blur(5px);border:2px solid rgba(255,255,255,.2); border-radius:20px; ;">
        <div class="input-group" style="margin-top: 10px;" >
            <div class="col-12">
            @foreach ($name as $row)
            <p class="h3 text-white" style="text-align: center;">{{ $row->name }}</p>
            @endforeach
             </div>
             <br>
             <div class="col-12">
            <p class="h3 text-danger"style="text-align: center;" > ?از حذف این خواننده مطمئنید</p>
        </div>
            <form id="myForm" enctype="multipart/form-data" action="{{ route('tagdelete') }}" method="post" style="width:97%; background:transparent;display:flex;justify-content:center;">
                @csrf
                    <input type="submit" class="btn btn-danger col-2 " value="بله" name="ok" style="margin-top: 10px; margin:10px;">
                    <input type="submit" class="btn btn-success col-2" value="خیر" name="cancel" style="margin-top: 10px; margin:10px;">
                    <input type="hidden" name="id" value="{{ $id }}">
                </div>
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
