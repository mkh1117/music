@extends('nav')
@section('title','category')
@section('navbar')
    @yield('navbar')
    <div class="content">
        @error('msg')
            <div class="alert alert-success" style="text-align: center;"><h4>{{ $message }}</h4></div>
           @enderror
           <div dir="rtl" class="col-lg-12 offset-lg-0" style="margin-top: 2%; padding: 2%; backdrop-filter: blur(5px); border: 2px solid rgba(255, 255, 255, .2); border-radius: 20px; background: #27293d;">
            <div  style="display: flex; justify-content: center">
            <input type="text" name="messagesearch" class="messagesearch" id="messagesearch" style="background-color: #27293d;color:white;width:70%;margin-bottom: 20px;" placeholder="جستجو">
            <button class="cancel-btn" id="cancelsearchmessage" hidden>Cancel</button>

            </div>

            <div class="header" style="display: flex; justify-content: center; margin-bottom: 20px;">
                <h1 class="h1" style="color: white; text-align: center; font-weight: bold;">پیام های کاربران</h1>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped" style="color: white;">
                    <thead>
                        <tr>
                            <th style="text-align: right; width: 80%;">پیام</th>
                            <th style="text-align: center; width: 20%;">عملیات</th>
                        </tr>
                    </thead>
                    <tbody id="datamessage">
                        @foreach ($message as $m)
                            <tr>
                                <td class="text-right">
                                    <a href="/admin/answer?id={{ $m->id }}" style="text-decoration: none; color: inherit;">
                                        <p class="title" style="font-weight: bold; margin-bottom: 5px;">
                                            @if (!$m->read_message)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                    <circle cx="8" cy="8" r="8" />
                                                </svg>
                                            @endif
                                            {{ $m->name }}
                                        </p>
                                        <p class="text-muted" style="font-size: 0.9em;">{{ $m->message }} @if ($m->tedad > 80) ... @endif</p>
                                    </a>
                                </td>
                                <td class="td-actions text-center">
                                    <a href="/admin/answer?id={{ $m->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="دیدن پیام" class="btn btn-outline-light btn-sm" style="border-radius: 50%;">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        </div>
    @endsection
@section('messagesearch')
<script>
    $(document).ready(function(){
        $('#messagesearch').click(function() {
            document.getElementById('cancelsearchmessage').removeAttribute('hidden');
        });
        $('body').on('click', '#cancelsearchmessage', function () {
            $('#messagesearch').val('');
                var query=$(this).val();
                $.ajax({
                    url:"/admin/messageSearchauto",
                    type:"GET",
                    data:{'search':query},
                    success:function(data){
                        $('#datamessage').html(data);
                    }
            });
            document.getElementById('cancelsearchmessage').setAttribute("hidden", true);
    });
        $('#messagesearch').on('keyup',function(){
                var query=$(this).val();
                $.ajax({
                    url:"/admin/messageSearchauto",
                    type:"GET",
                    data:{'search':query},
                    success:function(data){
                        $('#datamessage').html(data);
                    }
                });
            });
        });
</script>
@endsection
@section('style')
.messagesearch {
    width: 70%;
    padding: 10px 15px;
    font-size: 16px;
    color: #ffffff;
    background-color: #27293d;
    border: 1px solid #444;
    border-radius: 5px;
    outline: none;
    margin-bottom: 20px;
    transition: all 0.3s ease;
}
.messagesearch::placeholder {
    color: #999;
}
.messagesearch:focus {
    border-color: #5a5aff;
    background-color: #1f2033;
    box-shadow: 0 0 8px rgba(90, 90, 255, 0.5);
    height:50px;
}
.cancel-btn {
    margin-left: 10px;
    padding: 10px 15px;
    font-size: 14px;
    color: #ffffff;
    background-color: #ff5e5e;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    height:45px;
}
.cancel-btn:hover {
    background-color: #ff1f1f;
}
@endsection

