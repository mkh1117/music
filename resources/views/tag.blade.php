@extends('nav')
@section('title','add artist')
@section('navbar')
    @yield('navbar')
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="border border-5 col-lg-8 offset-lg-2" style="margin-top:2%;">
                <p class="h3 white" style="text-align: center;">add artist page</p>
                <div class="input-group" style="margin-top: 10px;">
                    <form action="{{ route('tag') }}" method="post" style="width:100%;">
                        @csrf
                        <div class="input-group" style="margin-top: 10px;">
                            <span class="input-group-text">نام خواننده:</span>
                            <input type="text" name="tag" id="typeText" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-primary" value="submit"
                            name="submit"style="margin-top: 10px; margin-bottom:10px; width:100%;">
                    </form>
                </div>
                @if (isset($_POST['submit']))
                    <p class="h3 white" style="display:flex; justify-content:center;">تعداد اهنگ:{{ $tags }}</p>
                    <form action="{{ route('SubTag') }}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="submit"
                            name="sub"style="margin-top: 10px; margin-bottom:10px; width:100%;">
                        <input type="hidden" name="name" value="{{ $name }}">
                    </form>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
@endsection
<style>
    .white{
        color: #ffffff;
    }
</style>
