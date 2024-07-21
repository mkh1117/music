@extends('nav')
@section('title','edit')
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
                <p class="h3 white" style="text-align: center;">edit page</p>
                <div class="input-group" style="margin-top: 10px;">
                    <form action="{{ route('update') }}" method="post" style="width:100%;">
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
                        <img src="/pictures/{{ $row->picture }}" class=""  alt="عکس" style="width: 150px; align-self:center;">
                        <form enctype="multipart/form-data" action="{{ route('updates') }}" method="post"
                            style="width:100%;">
                            @csrf
                                <div class="input-group mb-3" style="margin-top: 10px;">
                                    <label class="input-group-text" for="inputGroupFile01">عکس:</label>
                                    <input type="file" name="pitcure" class="form-control form-control-lg col-8"
                                        id="inputGroupFile01" />
                                </div>
                                <div class="input-group" style="margin-top: 10px;">
                                    <span class="input-group-text">اسم خواننده:</span>
                                    <input type="text" name="text" id="typeText" class="form-control"
                                        value="{{ $row->text }}">
                                </div>
                                <div class="input-group" style="margin-top: 10px;">
                                    <span class="input-group-text">اسم آهنگ</span>
                                    <input type="text" name="text1" id="typeText" class="form-control"
                                        value="{{ $row->text1 }}">
                                </div>
                                <span class="input-group-text">متن آهنگ:</span>
                                <textarea class="form-control form-control-sm border border-2 rounded-1" name="lyric"
                                    id="string"style="height: 100px" minlength="0" maxlength="255">{!! $row->lyric !!} </textarea>
                                <input type="submit" class="btn btn-primary" value="submit"
                                    name="sub"style="margin-top: 10px; margin-bottom:10px; width:100%;">
                                    <input type="hidden" name="picturename" value="{{ $row->picture }}">
                                </div>
                                 @endforeach
                                <input type="hidden" name="id" value="{{ $id }}">
                </form>
        </div>
    </div>
    @endif
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
@endsection
