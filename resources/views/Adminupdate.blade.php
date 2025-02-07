@extends('nav')
@section('title','updateAdmin')
@section('navbar')
    @yield('navbar')
    @error('msg')
    <div class="alert alert-danger" style="text-align: center;"><h4>{{ $message }}</h4></div>
   @enderror
   @error('sec')
   <div class="alert alert-success" style="text-align: center;"><h4>{{ $message }}</h4></div>
  @enderror
  <div class="content">
  <div dir="rtl" class="col-lg-8 offset-lg-2" style="margin-top:2%;margin-top:2%;padding: 2%;backdrop-filter:blur(5px);border:2px solid rgba(255,255,255,.2); border-radius:20px; ">
   <p class="h3 white" style="text-align: center;">ادمین</p>
   <div class="input-group" style="margin-top: 10px;">
    @foreach ($admin as $a)
       <form id="myForm" action="{{ route('AdminUpdate') }}" method="post" style="width:100%;">
           @csrf
           <label for="name" class="text-white col-12 large-input" style="text-align: right">نام</label>
           <input type="text" placeholder="اسم" name="name" value="{{ $a->name }}" id="name" class="form-control text-white back large-input">
           @error('name')
           <div style="color: red;" >{{ $message }}</div>
           @enderror
           <label for="password" class="text-white col-12 large-input" style="text-align: right; margin-top:2% ">رمز خود را وارد کنید</label>
           <input type="password" placeholder="رمز" name="password"  id="password" class="form-control text-white back large-input" >
               @error('password')
               <div style="color: red;" >{{ $message }}</div>
               @enderror
            <p class="text-white col-12 large-input" style="text-align: right; margin-top: 2%"  >نوع دسترسی: @if ($a->owner) مالک @elseif ($a->superadmin) سوپر ادمین @else عادی @endif</p>
            @if(!($a->owner) and Auth::guard('admin')->user()->owner)
            <p  class="text-white col-12 large-input" style="text-align: right; margin-top:2% ">تغییر دسترسی</p>
            <select class="form-select" style="display: flex; justify-content: end;padding: 3px; text-align: center" aria-label="Default select example" name="access">
                @if ($a->superadmin)
                <option value="normal">عادی</option>
                <option value="superadmin" selected>سوپر ادمین</option>
                @else
                <option value="normal" selected>عادی</option>
                <option value="superadmin">سوپر ادمین</option>
                @endif
              </select>
            @endif
            @error('access')
               <div style="color: red;" >{{ $message }}</div>
            @enderror
            <input type="hidden" name="lastusername" value="{{ $a->username }}">
           <input type="submit" class="btn btn-primary" value="submit"
               name="submit"style="margin-top: 10px; margin-bottom:10px; width:100%;">
       </form>
       @endforeach
   </div>
   </div>
   <div id="loadingMessage" style="display: none;">
    <div class="loading-overlay">
        <div class="loading-spinner"></div>
        <p class="loading-text">لطفاً منتظر بمانید...</p>
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
