@extends('nav')
@section('title','delete')
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
                <p class="h3 white" style="text-align: center;">delete page</p>
                <div class="input-group" style="margin-top: 10px;">
                    <form action="{{ route('delete') }}" method="post" style="width:100%;">
                        @csrf
                        <div class="input-group" style="margin-top: 10px;">
                            <span class="input-group-text">ایدی اهنگ</span>
                            <input type="number" name="id" id="typeText" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-primary" value="submit"
                            name="submit"style="margin-top: 10px; margin-bottom:10px; width:100%;">
                    </form>
                </div>
            </div>
            @if (isset($_POST['submit']))

            <div class="border border-5 col-lg-8 offset-lg-2" style="margin-top:2%;">
                <div class="input-group" style="margin-top: 10px;" >
                @foreach ($rows as $row)
                <div class="col-lg-12 offset-lg-0 col-md-12 offset-md-0 col-sm-12 offset-sm-0 col-12 black p-5 d-flex flex-column shadow "  >
                    <div class="d-flex align-items-center justify-content-between">
                        <i class=" fa-solid fa-arrow-up-from-bracket border  border-4  rounded-pill p-2 fs-5 shadow" style="background-color: #00a547"></i>
                        <i class="fa-solid fa-bars border  border-4 rounded-pill p-2 fs-5 shadow" style="background-color: #00a547"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mu-5">
                        <img src="/pictures/{{ $row->picture }}" alt="عکس" class="img-fluid border-green shadow" style="border-radius:50%;width:220px;height:220px;">
                    </div>
                    <div class="text-white text-center " >{{ $row->text1 }}<span class="text-green fw-bold fs-5"> از {{ $row->text }}</span>
                    </div>
                    <audio src="/music/{{ $row->music }}" controls type="audio/mpeg" class="mx-auto col-md-12 col-12" style="margin-top: 10px;">
                    </div>
                    <div style="margin-top:5%;"></div>

            </div>
                <p class="h3 text-danger"style="display:flex;justify-content:end;" > ?از پاک کردن این اهنگ مطمئنید</p>
                <form action="{{ route('deletes') }}" method="post" style="width:100%;">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="submit"
                        name="sub"style="margin-top: 10px; margin-bottom:10px; width:100%;">
                    <input type="hidden" name="id" value="{{ $id }}">
                    <input type="hidden" name="picture" value="{{ $row->picture }}">
                    <input type="hidden" name="music" value="{{ $row->music }}">
                </form>
                @endforeach
        </div>
        </div>
        @endif

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
@endsection

