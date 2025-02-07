@extends('nav')
@section('title','updateAdmin')
@section('navbar')
    @yield('navbar')
    <div class="content">
    @error('msg')
    <div class="alert alert-danger" style="text-align: center;"><h4>{{ $message }}</h4></div>
   @enderror
   @error('sec')
   <div class="alert alert-success" style="text-align: center;"><h4>{{ $message }}</h4></div>
  @enderror
    <div class="card bg-dark" style="margin: 2%; padding: 2%">
        <p class="h4 text-white" style="text-align: right;">ادمین ها</p>
    <table class="table table-dark" dir="rtl">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">اسم</th>
            <th scope="col">نام کاربری</th>
            <th scope="col">دسترسی</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php $row=1 ?>
          @foreach ($admin as $a)
          <tr>
            <th scope="row" @if ($a->username==Auth::guard('admin')->user()->username) style="color:red;" @else style="color:white;" @endif>{{ $row }}</th>
            <td>{{ $a->name }}</td>
            <td>{{ $a->username }}</td>
            <td> @if($a->owner) مالک @elseif ($a->superadmin)سوپر ادمین @else عادی @endif </td>

            <td>@if (!$a->superadmin or Auth::guard('admin')->user()->owner or $a->username==Auth::guard('admin')->user()->username)<a href="/admin/update/adminUpdate?username={{ $a->username }}"><button type="button" class="btn btn-success">ویرایش</button></a> <a href="/admin/delete/admindelete?username={{ $a->username }}"><button type="button" class="btn btn-success">حذف</button></a>@endif</td>
          </tr>
          <?php $row++ ?>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

    @endsection
