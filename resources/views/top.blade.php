    @extends('nav')
    @section('title',$title)
    @section('navbar')
        @yield('navbar')
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="border border-5 col-lg-8 offset-lg-2 col-12" style="margin-top:2%;">
                <p class="h3 white" style="text-align: center;">{{ $title }} page</p>
                <form enctype="multipart/form-data" action="{{ Route($send) }}" method="post">
                    @csrf
                    <div class="input-group mb-3" style="margin-top: 10px;">
                        <label class="input-group-text" for="inputGroupFile01">عکس:</label>
                        <input type="file" name="pitcure" class="form-control form-control-lg col-8"
                            id="inputGroupFile01" />
                    </div>
                    <div class="input-group mb-3" style="margin-top: 10px;">
                        <label class="input-group-text" for="inputGroupFile02">موزیک:</label>
                        <input type="file" name="music" class="form-control form-control-lg"
                            id="inputGroupFile02" />
                    </div>
                    <div class="input-group" style="margin-top: 10px;">
                        <span class="input-group-text">اسم خواننده:</span>
                        <input type="text" name="text" id="typeText" class="form-control">
                    </div>
                    <div class="input-group" style="margin-top: 10px;">
                        <span class="input-group-text">اسم آهنگ:</span>
                        <input type="text" name="text1" id="typeText" class="form-control">
                    </div>
                    <div class="input-group" style="margin-top: 10px;">
                        <span class="input-group-text">شماره موزیک قبلی را وارد کنید.</span>
                        <input type="number" name="id" id="typeText" class="form-control">
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="myFunction()">
                    <label class="form-check-label white" for="flexCheckDefault">
                      افزودن متن:
                    </label>
                    </div>
                     <div class="input-group" style="margin-top: 10px;">
                        <span class="input-group-text">متن آهنگ</span>
                        <textarea
                        class="form-control form-control-sm border border-2 rounded-1" name="lyric" id="string"style="height: 100px"minlength="3"maxlength="255" disabled></textarea>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                          <legend class="col-form-label col-sm-2 pt-0 white">دسته بندی</legend>
                          <div class="col-sm-10">
                            <div class="form-check">
                              <input class="form-check-input" style="border: 1px solid #070707;" type="radio" name="gridRadios" id="gridRadios1" value="غمگین" >
                              <label class="form-check-label white" for="gridRadios1">
                                موزیک غمگین
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" style="border: 1px solid #070707;" type="radio" name="gridRadios" id="gridRadios2" value="شاد">
                              <label class="form-check-label white" for="gridRadios2">
                                موزیک شاد
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" style="border: 1px solid #070707;" type="radio" name="gridRadios" id="gridRadios2" value="" checked>
                              <label class="form-check-label white" for="gridRadios2">
                                هیچکدام
                              </label>
                            </div>
                            </div>
                          </div>
                      </fieldset>
                    <input type="submit" class="btn btn-primary" value="ok" name="ok"
                        style="margin-top: 10px; margin-bottom:10px ;">
                        <div class="card-body py-1">
                </form>
            </div>
        </div>
    <table class="table table-bordered " style="margin-top: 2%; margin-left:2%; margin-right: 4%;">
        <thead class="thead-dark" >
            <tr>
                <th scope="col" class="bg-dark "><p class="white">id</p></th>
                <th scope="col" class="bg-dark"><p class="white">artist</p></th>
                <th scope="col" class="bg-dark"><p class="white">name</p></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tops as $top)
                <tr>
                    <th scope="row" class="bg-dark"><p class="white">{{ $top->id }}</p></th>
                    <td class="bg-dark"><p class="white"> {{ $top->text }}</p></td>
                    <td class="bg-dark"><p class="white"> {{ $top->text1 }}</p></td>
                </tr>
            @endforeach
        </tbody>
    </table>




    <script>
    function myFunction() {
      var checkBox = document.getElementById("flexCheckDefault");
    if (checkBox.checked == true){
        document.getElementById('string').removeAttribute('disabled');
      } else {
        //
      }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    @endsection

