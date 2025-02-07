<!DOCTYPE html>
<html lang="en" class="perfect-scrollbar-on">

<head>
    <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <link href="/assets/demo/demo.css" rel="stylesheet" />
    <title>@yield('title')</title>
</head>

<body style="font-family: myFirstFont;">
    <div class="wrapper">
    <div class="sidebar" data="blue" dir="rtl">
        <div class="sidebar-wrapper" data="blue">
          <div class="logo">
            <a href="/admin" class="simple-text logo-mini">
              PTM
            </a>
            <a href="/admin" class="simple-text logo-normal">
              PERSIAN TOP MUSIC
            </a>
          </div>
          <ul class="nav" id="menu">
            <li class="nav-item">
              <a href="/admin">
                <i class="tim-icons icon-chart-pie-36"></i>
                <p class="h4 text-white">داشبورد</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#sidemenu" data-bs-toggle="collapse" class="nan-link text-white" aria-current="page">
                <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-music-note-beamed" viewBox="0 0 16 16">
                  <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13s1.12-2 2.5-2 2.5.896 2.5 2m9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2"/>
                  <path fill-rule="evenodd" d="M14 11V2h1v9zM6 3v10H5V3z"/>
                  <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4z"/>
                </svg></i>
                <span class="ms-2 h4 text-white">موزیک</span>
              </a>
              <ul class="collapse" id="sidemenu" data-bs-parent="#menu" style="list-style: none;">
                <li class="nav-item">
                  <p class="h4">
                  <a href="/admin/upload" class="nav-link text-white" aria-current="page">آپلود <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                      <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                      <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                    </svg></a>
                  </p>
                </li>
              </ul>
              <ul class="collapse" id="sidemenu" data-bs-parent="#menu" style="list-style: none;">
                <li class="nav-item">
                  <p class="h4">
                  <a href="/admin/update" class="nav-link text-white" aria-current="page">ویرایش <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                    </svg>
                  </a>
                  </p>
                </li>
              </ul>
              <ul class="collapse" id="sidemenu" data-bs-parent="#menu" style="list-style: none;">
                <li class="nav-item">
                  <p class="h4">
                  <a href="/admin/delete" class="nav-link text-white" aria-current="page">حذف <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                      </svg>
                  </a>
                  </p>
                </li>
              </ul>
          </li>
              <li class="nav-item ">
                <a href="#artist" data-bs-toggle="collapse" class="nan-link text-white" aria-current="page">
                  <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic-fill" viewBox="0 0 16 16">
                    <path d="M5 3a3 3 0 0 1 6 0v5a3 3 0 0 1-6 0z"/>
                    <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5"/>
                  </svg></i>
                  <span class="ms-2 h4 text-white">خواننده</span>
                </a>
                <ul class="collapse" id="artist" data-bs-parent="#menu" style="list-style: none;">
                  <li class="nav-item">
                    <p class="h4">
                    <a href="/admin/tag" class="nav-link text-white" aria-current="page">آپلود <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                      <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                      <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                    </svg></a>
                    </p>
                  </li>
                </ul>
                <ul class="collapse" id="artist" data-bs-parent="#menu" style="list-style: none;">
                  <li class="nav-item">
                    <p class="h4">
                    <a href="/admin/tag/update" class="nav-link text-white" aria-current="page">ویرایش <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                        </svg>
                      </a>
                    </p>
                  </li>
                </ul>
                <ul class="collapse" id="artist" data-bs-parent="#menu" style="list-style: none;">
                  <li class="nav-item">
                    <p class="h4">
                    <a href="/admin/tag/delete" class="nav-link text-white" aria-current="page">حذف <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                        </svg>
                      </a>
                    </p>
                  </li>
                </ul>
              </li>
              <li class="nav-item ">
                  <a href="#category" data-bs-toggle="collapse" class="nan-link text-white" aria-current="page">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-microsoft" viewBox="0 0 16 16" style="border-radius:3px; ">
                      <path style="" d="M7.462 0H0v7.19h7.462zM16 0H8.538v7.19H16zM7.462 8.211H0V16h7.462zm8.538 0H8.538V16H16 z"/>
                    </svg></i>
                    <span class="ms-2 h4 text-white">دسته بندی</span>
                  </a>
                  <ul class="collapse" id="category" data-bs-parent="#menu" style="list-style: none;">
                    <li class="nav-item">
                      <p class="h4">
                      <a href="/admin/category" class="nav-link text-white" aria-current="page">آپلود <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                          <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                          <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                        </svg></a>
                      </p>
                    </li>
                  </ul>
                  <ul class="collapse" id="category" data-bs-parent="#menu" style="list-style: none;">
                    <li class="nav-item">
                      <p class="h4">
                      <a href="/admin/category/update" class="nav-link text-white" aria-current="page">ویرایش <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                          <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                        </svg></a>
                      </p>
                    </li>
                  </ul>
                  <ul class="collapse" id="category" data-bs-parent="#menu" style="list-style: none;">
                    <li class="nav-item">
                      <p class="h4">
                      <a href="/admin/category/delete" class="nav-link text-white" aria-current="page">حذف <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                        </svg></a>
                      </p>
                    </li>
                  </ul>
              </li>
              @if (Auth::guard('admin')->user()->superadmin)
              <li class="nav-item ">
                  <a href="/admin/socialMedia">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                    </svg></i>
                    <span class="ms-2 h4 text-white "> راه های ارتباطی</span>
                  </a>
              </li>
              @endif
              @if (Auth::guard('admin')->user()->superadmin)
            <li class="nav-item ">
                <a href="/admin/message">
                  <i><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                  </svg></i>
                  <span class="ms-2 h4 text-white">پیام ها</span>
                </a>
            </li>
            @endif
              @if (Auth::guard('admin')->user()->superadmin)
              <li class="nav-item ">
                  <a href="#admin" data-bs-toggle="collapse" class="nan-link text-white" aria-current="page">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg></i>
                    <span class="ms-2 h4 text-white">ادمین</span>
                  </a>
                  <ul class="collapse" id="admin" data-bs-parent="#menu" style="list-style: none;">
                    <li class="nav-item" style="display: flex;flex-direction: row-reverse;">
                      <p class="h4">
                      <a href="/admin/add/admin" class="nav-link text-white" aria-current="page">افزودن <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                          <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                          <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                        </svg></a>
                      </p>
                    </li>
                  </ul>
                  <ul class="collapse" id="admin" data-bs-parent="#menu" style="list-style: none;">
                    <li class="nav-item" style="display: flex;flex-direction: row-reverse;">
                      <p class="h4">
                      <a href="/admin/update/admin" class="nav-link text-white" aria-current="page">اطلاعات ادمین ها <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                          <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                        </svg></a>
                      </p>
                    </li>
                  </ul>
              </li>
              @endif
          </ul>
        </div>
      </div>
      <div class="main-panel" data="blue">
        <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent" dir="ltr" style="z-index: 80;">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler" >
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </button>
              </div>
              <a class="navbar-brand" href="/admin">داشبورد</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse" id="navigation" >
              <ul class="navbar-nav ml-auto">
                <li class="search-bar input-group">
                  <button class="btn btn-link" id="auto" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
                    <span class="d-lg-none d-md-block">Search</span>
                  </button>
                </li>
                <li class="dropdown nav-item">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <div class="photo">
                      <img src="/assets/img/anime3.png" alt="Profile Photo">
                    </div>
                    <p class="d-lg-none">
                      Log out
                    </p>
                  </a>
                  <ul class="dropdown-menu dropdown-navbar bg-dark ">
                    <li class="nav-link"><a href="/admin/changePassword" class="nav-item dropdown-item" style="color:#ffffff;font-size:15px;">تعویض رمز عبور</a></li>
                    <li class="nav-link"><a href="/admin/changeusername" class="nav-item dropdown-item" style="color:#ffffff;font-size:15px;">تغییر نام کاربری</a></li>
                    <li class="nav-link"><a href="/admin/logout" class="nav-item dropdown-item" style="color:#ffffff;font-size:15px;">خروج</a></li>
                  </ul>
                </li>
                <li class="separator d-lg-none"></li>
              </ul>
            </div>
          </div>
        </nav>
        <div name='hide' id="hide" class="hide" hidden>
          <div class="container" >
              <div style="display: flex;justify-content: center;">
              <div class="input-group mb-3" style="margin-top: 10%;display: flex;justify-content: center;">
          <div class="form-inline my-2 my-lg-0 form "  style="width:100%; height: 100%; background-color: #ffffff;border-radius: 5px;" dir="rtl" >
              <div class="d-flex justify-content-center" style="width: 100%;height: 100%;">
                  <div class="input-group" style="width: 100%;height: 100%;" >
                      <button  data-mdb-button-init data-mdb-ripple-init class="btn " id="close" data-mdb-ripple-color="dark" style="background:transparent;order: 1; ">
                          <svg  xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-x" viewBox="0 0 16 16">
                              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                            </svg>
                      </button>
                      <input type="text" style="height: 100%;border-width: 0;color: #121212; order: 0;"  class="form-control"  name="search" id="searchorg" placeholder="جستجو کردن"  onfocus="this.value=''" aria-label="Example input" aria-describedby="button-addon1"/>
                  </div>
              </div>
          </div>
          </div>
          </div>
          <div  class="width1" style="display: flex;flex-direction: row; justify-content: center; ">
            <div class="scrool" id="search" style="width: 100%;text-align: right; height: 500px;" dir="rtl"></div>
          </div>
      </div>
  </div>
  @yield('navbar')
  </div>
  <script src="/assets/js/core/jquery.min.js"></script>
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="/assets/js/plugins/chartjs.min.js"></script>
  <script src="/assets/js/plugins/bootstrap-notify.js"></script>
  <script src="/assets/js/black-dashboard.min.js?v=1.0.0"></script>
  <script src="/assets/demo/demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function(){
        var isClicked = false;
        var close = false;
      $('#auto').click(function() {
        isClicked = true;
      });
      $('#close').click(function() {
        close = true;
      });
      $('#auto').click(function() {
        if (isClicked) {
            document.getElementById('hide').removeAttribute('hidden');
        }
      $('#close').click(function() {
        if (close) {
            document.getElementById('hide').setAttribute("hidden", true);
        }
      });
      });
        $('#searchorg').on('keyup',function(){
            var query=$(this).val();
            $.ajax({
                url:"/admin/DashboardSearchauto",
                type:"GET",
                data:{'search':query},
                success:function(data){
                    $('#search').html(data);
                }
            });
        });
    });
 </script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    </script>
 @yield('search')
 @yield('messagesearch')
</body>
</html>
<style>

.hide{
    background:transparent;
    backdrop-filter:blur(5px);
    position:fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index:99;
}
  .row {
      display: flex;
      flex-direction: row;
  }
    .black {
        background-color: #121212;
    }
    .white{
        color: #ffffff;
    }
    .no {
  display: block
}
.back{
    background:transparent;
}

input[type="file"]::file-selector-button {
            background:transparent;
            color: rgb(249, 247, 247);
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
input[type="file"]::file-selector-button:hover {
  border: 2px solid #fcfcfc;
}
input[type="file"]:focus {
  background:transparent;

}
input[type="file"] {
    border: 2px solid #fafafb;
}
input[type="file"]::file-selector-button:focus {
  background:transparent;
}

input[type=text]:focus {
  background:transparent;
}
input[type=text]::placeholder {
  color:white;
  opacity: 1;
}
input[type=password]:focus {
  background:transparent;
}
input[type=password]::placeholder {
  color:white;
  opacity: 1;
}

input[type=text]::-ms-input-placeholder {
  color: white;
}

.dash-textarea:focus {
     background:transparent;
}
.dash-textarea:disabled{
    background-color: #292727;
}
.custombg:checked {
  background-color: red;
}
 .scrool {
  overflow: scroll;
  -webkit-overflow-scrolling: touch;
}
.scrool::-webkit-scrollbar {
  display: none;
  -ms-overflow-style: none;
  scrollbar-width: none;
}
.message-container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 20px;
            color: #333;
            margin: 0;
        }
        .header button {
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .header button:hover {
            background: #0056b3;
        }
        .message-info p {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }
        .message-info strong {
            color: #333;
        }
        .reply-section {
            margin-top: 20px;
        }
        .reply-section textarea {
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            resize: vertical;
            min-height: 100px;
        }
        .reply-section button {
            margin-top: 10px;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .reply-section button:hover {
            background: #218838;
        }
@yield('style');

</style>


