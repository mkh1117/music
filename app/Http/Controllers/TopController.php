<?php

namespace App\Http\Controllers;

use App\Rules\Existence;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use \Morilog\Jalali\Jalalian;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon as SupportCarbon;
use SebastianBergmann\Type\TypeName;
use view;

class TopController extends Controller
{
    public function main(Request $request){
        if(empty($request->cookie('view'))){
            Cookie::queue('view','ok',60);
            $ip=$request->ip();
            $jDate = Jalalian::fromDateTime(Carbon::now());
            $jalali=$jDate->getMonth()-1;
            $carbon=Carbon::now()->toDateTimeString();
            if(Cookie::hasQueued('view')=='ok'){
                db::insert("INSERT INTO view (ip,jalali,UPDATE_AT) VALUES ('$ip',$jalali,'$carbon')");
            }
        }
        $query=DB::select("SELECT id from input");
        $count=count($query);
        $number_content=10;
        $number_page=ceil($count/$number_content);
        $page=$request->integer('page');
        if(!isset($_GET['page'])){
            $page=1;
        }
        if($page<=0 or $page>$number_page){
            return Redirect()->back()->withErrors(['msg' =>'!آهنگ مورد نظر شما یافت نشد']);
        }
        $social=DB::select("SELECT  * FROM callus ORDER BY id DESC LIMIT 1;");
        foreach ($social as $row){
            $instagram=$row->instagram;
            $phoneNumber=$row->phoneNumber;
            $gmail=$row->gmail;
            $telegram=$row->telegram;
        }
        $num=($page-1) * $number_content;
        $mains=DB::select("SELECT *from input  order by id DESC limit  $num, $number_content");
        $querys=DB::select("SELECT picture,key_out,text,text1 from top order by id DESC limit 0,8");
        $newsong=DB::select('SELECT keyout,text,text1 from newsong order by id DESC limit 0,10');
        $artists=DB::select('SELECT name from tags');
        $categorySql=DB::select('SELECT category from category');
        $h1='دانلود آهنگ جدید';
        $link='/';
        return view('main',['mains'=>$mains,'querys'=>$querys,'number_page'=>$number_page,'page'=>$page,'newsongs'=>$newsong,'artists'=>$artists,'h1'=>$h1,'category'=>$categorySql,'link'=>$link,'gmail'=>$gmail,'phoneNumber'=>$phoneNumber,'instagram'=>$instagram,'telegram'=>$telegram]);
    }
    public function searchs($search,Request $request){

        if(empty($request->cookie('view'))){
            Cookie::queue('view','ok',60);
            $ip=$request->ip();
            $jDate = Jalalian::fromDateTime(Carbon::now());
            $jalali=$jDate->getMonth()-1;
            $carbon=Carbon::now()->toDateTimeString();
            if(Cookie::hasQueued('view')=='ok'){
                db::insert("INSERT INTO view (ip,jalali,UPDATE_AT) VALUES ('$ip',$jalali,'$carbon')");
            }
        }
        $counts=DB::select("SELECT count(id) as count from input where text like '%$search%' or text1 like '%$search%'");
        foreach($counts as $c){
            $count=$c->count;
        }
        $number_content=10;
        $number_page=ceil($count/$number_content);
        $page=$request->integer('page');
        if(!isset($_GET['page'])){
            $page=1;
        }
        if($page<=0 or $page>$number_page){
            return Redirect()->back()->withErrors(['msg' =>'!آهنگ مورد نظر شما یافت نشد']);
        }
        $num=($page-1) * $number_content;
        $mains=DB::select("SELECT *from input where text like'%$search%' or text1 like'%$search%' order by id DESC limit  $num, $number_content");
        $querys=DB::select("SELECT picture,key_out,text,text1 from top order by id DESC limit 0,8");
        $newsong=DB::select('SELECT keyout,text,text1 from newsong order by id DESC limit 0,10');
        $artists=DB::select('SELECT name from tags');
        $h1='دانلود آهنگ '.$search;
        return view('search',['mains'=>$mains,'querys'=>$querys,'number_page'=>$number_page,'page'=>$page,'newsongs'=>$newsong,'artists'=>$artists,'h1'=>$h1]);
    }
    public function about_us(Request $request){
        if(empty($request->cookie('view'))){
            Cookie::queue('view','ok',60);
            $ip=$request->ip();
            $jDate = Jalalian::fromDateTime(Carbon::now());
            $jalali=$jDate->getMonth()-1;
            $carbon=Carbon::now()->toDateTimeString();
            if(Cookie::hasQueued('view')=='ok'){
                db::insert("INSERT INTO view (ip,jalali,UPDATE_AT) VALUES ('$ip',$jalali,'$carbon')");
            }
        }
        $social=DB::select("SELECT  * FROM callus ORDER BY id DESC LIMIT 1;");
        foreach ($social as $row){
            $instagram=$row->instagram;
            $phoneNumber=$row->phoneNumber;
            $gmail=$row->gmail;
            $telegram=$row->telegram;
        }
        $querys=DB::select("SELECT picture,key_out,text,text1 from top order by id DESC limit 0,8");
        $newsong=DB::select('SELECT keyout,text,text1 from newsong order by id DESC limit 0,10');
        $artists=DB::select('SELECT name from tags');
        $categorySql=DB::select('SELECT category from category');
        $h1='درباره ما | پرشین تاپ موزیک';
        return view("about_us",['querys'=>$querys,'newsongs'=>$newsong,'artists'=>$artists,'category'=>$categorySql,'h1'=>$h1,'gmail'=>$gmail,'phoneNumber'=>$phoneNumber,'instagram'=>$instagram,'telegram'=>$telegram]);
    }
    public function call_us(Request $request){
        if(empty($request->cookie('view'))){
            Cookie::queue('view','ok',60);
            $ip=$request->ip();
            $jDate = Jalalian::fromDateTime(Carbon::now());
            $jalali=$jDate->getMonth()-1;
            $carbon=Carbon::now()->toDateTimeString();
            if(Cookie::hasQueued('view')=='ok'){
                db::insert("INSERT INTO view (ip,jalali,UPDATE_AT) VALUES ('$ip',$jalali,'$carbon')");
            }
        }
        $social=DB::select("SELECT  * FROM callus ORDER BY id DESC LIMIT 1;");
        foreach ($social as $row){
            $instagram=$row->instagram;
            $phoneNumber=$row->phoneNumber;
            $gmail=$row->gmail;
            $telegram=$row->telegram;
        }
        $querys=DB::select("SELECT picture,key_out,text,text1 from top order by id DESC limit 0,8");
        $newsong=DB::select('SELECT keyout,text,text1 from newsong order by id DESC limit 0,10');
        $artists=DB::select('SELECT name from tags');
        $categorySql=DB::select('SELECT category from category');
        $h1='تماس با ما';
        return view("call_us",['querys'=>$querys,'newsongs'=>$newsong,'artists'=>$artists,'category'=>$categorySql,'h1'=>$h1,'gmail'=>$gmail,'phoneNumber'=>$phoneNumber,'instagram'=>$instagram,'telegram'=>$telegram]);
    }
    public function sendMessage(Request $request){
        $request->validate([
            'name'=>'required|string|max:40',
            'email'=>'required|email|regex:/.com$/|max:40',
            'message'=>'required|max:600'
        ]);
        $name=htmlspecialchars($request->string("name"));
        $email=htmlspecialchars($request->string("email"));
        $message=htmlspecialchars($request->string("message"));
        $message=str_replace('</br>','\r\n',$message);
        DB::insert("INSERT INTO message(name,email, message, read_message) VALUES ('$name','$email','$message',0)");
        return redirect()->back()->withErrors(["msg"=>"پیام با موفقیت ثبت شد."]);
    }
      public function searchauto(Request $request){
        if($request->ajax()){
            $output='';
            if($request->search==''){
                return $output;
            }
            $data=DB::select("SELECT name from tags where name like '%$request->search%' limit 0,5");
            $datas=DB::select("SELECT text1 from input where text1 like '%$request->search%' limit 0,5");
            if(count($data)>0 ){
                $output.='<ul class="list-group list-group-flush" ><header><li class="list-group-item list-group-item-action active">نام خواننده</li></header>';
                foreach($data as $row){
                    $output .='<a style="text-decoration: none;" href="/search?search='.$row->name.'"><li class="list-group-item" style="color: #121212;" >'.$row->name.'</li></a>';
                }
                $output.='</ul>';
            }
            if(count($datas)>0){
                $output.='<ul class="list-group list-group-flush"><header><li class="list-group-item list-group-item-action active">نام آهنگ</li></header>';
                foreach($datas as $row){
                    $output .='<a style="text-decoration: none;" href="/search?search='.$row->text1.'"><li class="list-group-item " style="color: #121212;">'.$row->text1.'</li></a>';
                }
                $output.='</ul>';
            }
            if(count($data)==0 and count($datas)==0){
                $output.='<ul>موردی پیدا نشد</ul>';
            }
            return $output;
        }
    }
    public function AdminSearchAuto(Request $request){
        if($request->ajax()){
            $output='';
            if($request->search==''){
                return $output;
            }
            $data=DB::select("SELECT text,text1,id from input where text like '%$request->search%' or text1 like '%$request->search%' limit 0,10");
            if(count($data)>0 ){
                $output.=' <table id="example" class="table table-bordered">
                <thead style="background-color:#007bff;">
                  <tr>
                    <th scope="col">نام خواننده</th>
                    <th scope="col">نام آهنگ</th>
                  </tr>
                </thead>
                <tbody>';
                foreach($data as $row){
                   $output .='
                <tr>
                <td style="background-color:#ffffff;"><a  style="text-decoration: none;width:100%;height:100%;color:black;" href="?id='.$row->id.'"><div>'.$row->text.'</div></a></td>
                   <td style="background-color:#ffffff;"><a  style="text-decoration: none;width:100%;height:100%;color:black;" href="?id='.$row->id.'"><div>'. $row->text1.'</div></a></td>
                   </tr>
                 ';
                }
                $output.=' </tbody>
                        </table>';
            }
            if(count($data)==0){
                $output.='<ul class="white h5" style="text-align:center;">!!!موردی پیدا نشد</ul>';
            }
            return $output;
        }
    }
    public function messageSearchauto(Request $request){
        if($request->ajax()){
            $output='';
            $message=DB::select("SELECT message, name ,id, read_message,CHAR_LENGTH(message) AS tedad  FROM message where name like '%$request->search%' or message like '%$request->search%' order by id desc ");
            if(count($message)>0 ){
                foreach ($message as $m){
                $output.='
                <tr>
                    <td class="text-right">
                        <a href="/admin/answer?id='.$m->id.'" style="text-decoration: none; color: inherit;">
                            <p class="title" style="font-weight: bold; margin-bottom: 5px;">
                                '.$m->name.'
                            </p>
                            <p class="text-muted" style="font-size: 0.9em;">'.$m->message;
                            if ($m->tedad > 80)
                            {
                                $output.='...';
                            }
                            $output.=' </p>
                        </a>
                    </td>
                    <td class="td-actions text-center">
                        <a href="/admin/answer?id='.$m->id.'" data-bs-toggle="tooltip" data-bs-placement="top" title="دیدن پیام" class="btn btn-outline-light btn-sm" style="border-radius: 50%;">
                            <i class="tim-icons icon-pencil"></i>
                        </a>
                    </td>
                </tr>
                ';
                }
            }
            if(count($message)==0){
                    $output.='
                    <tr>
                        <td class="text-right">
                            موردی یافت نشد
                        </td>
                    </tr>
                    ';
            }
            return $output;
            }

    }
    public function tagSearchAuto(Request $request){
        if($request->ajax()){
            $output='';
            if($request->search==''){
                return $output;
            }
            $data=DB::select("SELECT name,id from tags where name like '%$request->search%' limit 0,10");
            if(count($data)>0 ){
                $output.='<ul class="list-group list-group-flush"><header><li class="list-group-item list-group-item-action active">نام خواننده</li></header>';
                foreach($data as $row){
                    $output .='<a style="text-decoration: none;" href="?id='.$row->id.'"><li class="list-group-item" style="color: #121212;" >'.$row->name.'</li></a>';
                }
                $output.='</ul>';
            }
            if(count($data)==0){
                $output.='<ul class="white h5" style="text-align:center;">موردی پیدا نشد</ul>';
            }
            return $output;
        }
    }
    public function search(Request $request){
        $request->validate([
            'search'=>'required|string',
        ]);
        if(empty($request->cookie('view'))){
            Cookie::queue('view','ok',60);
            $ip=$request->ip();
            $jDate = Jalalian::fromDateTime(Carbon::now());
            $jalali=$jDate->getMonth()-1;
            $carbon=Carbon::now()->toDateTimeString();
            if(Cookie::hasQueued('view')=='ok'){
                db::insert("INSERT INTO view (ip,jalali,UPDATE_AT) VALUES ('$ip',$jalali,'$carbon')");
            }
        }
        $search=htmlspecialchars($request->input('search'));
        $counts=DB::select("SELECT count(id) as count from input where text like '%$search%' or text1 like '%$search%'");
        foreach($counts as $c){
            $count=$c->count;
        }
        $number_content=10;
        $number_page=ceil($count/$number_content);
        $page=$request->integer('page');
        if(!isset($_GET['page'])){
            $page=1;
        }
        if($page<=0 or $page>$number_page){
            return Redirect()->back()->withErrors(['msg' =>'!آهنگ مورد نظر شما یافت نشد']);
        }
        $num=($page-1) * $number_content;
        $mains=DB::select("SELECT *from input where text like'%$search%' or text1 like'%$search%' order by id DESC limit  $num, $number_content");
        $querys=DB::select("SELECT picture,key_out,text,text1 from top order by id DESC limit  0,8");
        $newsong=DB::select('SELECT keyout,text,text1 from newsong order by id DESC limit  0,10');
        $artists=DB::select('SELECT name from tags');
        $categorySql=DB::select('SELECT category from category');
        $social=DB::select("SELECT  * FROM callus ORDER BY id DESC LIMIT 1;");
        foreach ($social as $row){
            $instagram=$row->instagram;
            $phoneNumber=$row->phoneNumber;
            $gmail=$row->gmail;
            $telegram=$row->telegram;
        }
        $h1='دانلود آهنگ '.$search;
        return view('search',['mains'=>$mains,'querys'=>$querys,'number_page'=>$number_page,'page'=>$page,'newsongs'=>$newsong,'artists'=>$artists,'h1'=>$h1,'search'=>$search,'category'=>$categorySql,'gmail'=>$gmail,'phoneNumber'=>$phoneNumber,'instagram'=>$instagram,'telegram'=>$telegram]);
    }
    public function top(int $id,Request $request){
        if(empty($request->cookie('view'))){
            Cookie::queue('view','ok',60);
            $ip=$request->ip();
            $jDate = Jalalian::fromDateTime(Carbon::now());
            $jalali=$jDate->getMonth()-1;
            $carbon=Carbon::now()->toDateTimeString();
            if(Cookie::hasQueued('view')=='ok'){
                db::insert("INSERT INTO view (ip,jalali,UPDATE_AT) VALUES ('$ip',$jalali,'$carbon')");
            }
        }
        $tops=DB::select('select * from input where id =:id',['id' =>$id]);
        if($tops==null){
            return Redirect()->back()->withErrors(['msg' =>'!آهنگ مورد نظر شما یافت نشد']);
        }
        DB::update("UPDATE input set view=view+1 where id=$id ");
        $querys=DB::select("SELECT picture,key_out,text,text1 from top order by id DESC limit  0,8");
        $newsong=DB::select('SELECT keyout,text,text1 from newsong order by id DESC limit  0,10');
        $artists=DB::select('SELECT name from tags');
        $categorySql=DB::select('SELECT category from category');
        $social=DB::select("SELECT  * FROM callus ORDER BY id DESC LIMIT 1;");
        foreach ($social as $row){
            $instagram=$row->instagram;
            $phoneNumber=$row->phoneNumber;
            $gmail=$row->gmail;
            $telegram=$row->telegram;
        }
        return view('viewtop',['tops'=>$tops,'querys'=>$querys,'newsongs'=>$newsong,'artists'=>$artists,'category'=>$categorySql,'gmail'=>$gmail,'phoneNumber'=>$phoneNumber,'instagram'=>$instagram,'telegram'=>$telegram]);
    }
    public function input(){
        $name=DB::select("SELECT name from tags");
        $category=DB::select("SELECT category from category");
        return view('test',['name'=>$name ,'category'=>$category]);
    }
    public function input1(Request $request){
        $request->validate([
            'pitcure'=> 'required|mimes:jpeg,png,jpg,gif,svg',
            'music'=>'required|mimetypes:audio/mp3,application/octet-stream,audio/mpeg,mpga,mp3,wav',
            'string'=>'min:0|max:1197',
            'text'=>'required|min:1|max:60',
            'text1'=>'required|min:1|max:60',
            'category'=>'max:80',
          ]);
        $picture=$request->file('pitcure');
        $music=$request->file('music');
        $text=htmlspecialchars($request->input('text'));
        $text1=htmlspecialchars($request->string('text1'));
        $category= $request->input('category');
        $category=json_encode($category,JSON_UNESCAPED_UNICODE);
        if ($category=='null') {
            $category=null;
        }
        $lyric=htmlentities($request->string('lyric'));
        $lyric=str_replace('</br>','\r\n',$lyric);
        $rand = bin2hex(random_bytes(10));
        $name=$rand.'.'.$picture->getClientOriginalExtension();
        $name1=str_replace(' ','_',$music->getClientOriginalName());
        $music->move(public_path('/music'),$name1);
        $picture->move(public_path('/pictures'),$name);
        $datetime = Carbon::now()->toDateTimeString();
        DB::insert("INSERT into input(picture,music,text,text1,lyric,category,created_at)values('$name','$name1','$text','$text1','$lyric','$category','$datetime')");
        if($request->input('newsong')=='true'){
            $nums=DB::select("SELECT id FROM input ORDER BY id DESC LIMIT 1;");
            foreach($nums as $num){
            $a=$num->id;
        }
        DB::insert("INSERT into newsong(text,text1,lyric,keyout,created_at)values('$text','$text1','$lyric','$a','$datetime')");
        }
        if($request->input('top')=="true"){
            $nums=DB::select("SELECT id FROM input ORDER BY id DESC LIMIT 1;");
            foreach($nums as $num){
                $a=$num->id;
            }
            DB::insert("INSERT into top(picture,text,text1,lyric,key_out,created_at)values('$name','$text','$text1','$lyric','$a','$datetime')");
        }
        return Redirect()->back()->withErrors(['msg' => 'عملیات انجام شد']);
    }
    public function artist(Request $request,$name){
        if(empty($request->cookie('view'))){
            Cookie::queue('view','ok',60);
            $ip=$request->ip();
            $jDate = Jalalian::fromDateTime(Carbon::now());
            $jalali=$jDate->getMonth()-1;
            $carbon=Carbon::now()->toDateTimeString();
            if(Cookie::hasQueued('view')=='ok'){
                db::insert("INSERT INTO view (ip,jalali,UPDATE_AT) VALUES ('$ip',$jalali,'$carbon')");
            }
        }
        $query=DB::select("SELECT id from input where text like '$name' ");
        $count=count($query);
        $number_content=10;
        $number_page=ceil($count/$number_content);
        $page=htmlspecialchars($request->get('page'));
        $page=htmlspecialchars($request->integer('page'));
        if(!isset($_GET['page'])){
            $page=1;
        }
        if($page<=0 or $page>$number_page){
            return Redirect()->back()->withErrors(['msg' =>'!آهنگ مورد نظر شما یافت نشد']);
        }
        $num=($page-1) * $number_content;
        $mains=DB::select("SELECT *from input where text like '%$name%' order by id desc limit  $num, $number_content");
        $querys=DB::select("SELECT picture,key_out,text,text1 from top order by id DESC limit 0,8");
        $newsong=DB::select('SELECT keyout,text,text1 from newsong order by id DESC limit 0,10');
        $artists=DB::select('SELECT name from tags');
        $categorySql=DB::select('SELECT category from category');
        $social=DB::select("SELECT  * FROM callus ORDER BY id DESC LIMIT 1;");
        foreach ($social as $row){
            $instagram=$row->instagram;
            $phoneNumber=$row->phoneNumber;
            $gmail=$row->gmail;
            $telegram=$row->telegram;
        }
        $h1='دانلود آهنگ از'.$name;
        $link="/". $name;
        return view('main',['mains'=>$mains,'querys'=>$querys,'number_page'=>$number_page,'page'=>$page,'newsongs'=>$newsong,'artists'=>$artists,'h1'=>$h1,'category'=>$categorySql,'link'=>$link,'gmail'=>$gmail,'phoneNumber'=>$phoneNumber,'instagram'=>$instagram,'telegram'=>$telegram]);
    }
    public function tagsshow(){
        return view('tag');
    }
    public function tags(Request $request){
        $request->validate([
            'tag' => 'required|unique:tags,name',
        ],
    [
        'tag.required'=>'این فیلد نباید خالی باشد.',
        'tag.unique'=>'خواننده از قبل وجود دارد'
    ]);
        $name=htmlspecialchars($request->string('tag'));
        return view('tag',['name'=>$name]);
    }
    public function SubTag(Request $request){
        if($request->input('no')=='خیر'){
            return redirect('/admin/tag');
        }
        $name=htmlspecialchars($request->string('name'));
        db::insert("INSERT INTO tags (name) VALUES ('$name')");
        return Redirect()->back()->withErrors(['msg' => 'عملیات انجام شد']);
    }
    public function tagUpdate(Request $request){
        $isset=false;
        if($request->input('id')!=null){
            $request->validate([
                'id'=>'required|integer'
            ]);
            $isset=true;
            $id=$request->input('id');
            $name=DB::select("SELECT name from tags where id='$id'");
            if($name==null){
                $request->validate([
                    'id'=> new Existence
                ]);
            }
            return view('tagupdate',['name'=>$name,'id'=>$id,'isset'=>$isset]);
        }
        return view('tagupdate',['isset'=>$isset]);
    }
    public function tagUpdatepost(Request $request){
        if($request->input('cancel')=='انصراف'){
            return redirect('admin/tag/update');
        }
        $request->validate([
            'id'=>'required|integer',
            'name'=>'required|string'
        ]);
        $name=htmlspecialchars($request->string('name'));
        $id=htmlspecialchars($request->input('id'));
        DB::update("UPDATE tags SET name='$name' where id='$id'");
        return Redirect('admin/tag/update')->withErrors(['msg' => 'عملیات انجام شد']);
    }
    public function tagdelete(Request $request){
        $isset=false;
        if($request->input('id')!=null){
            $request->validate([
                'id'=>'required|integer'
            ]);
            $isset=true;
            $id=$request->input('id');
            $name=DB::select("SELECT name from tags where id='$id'");
            if($name==null){
                $request->validate([
                    'id'=> new Existence
                ]);
            }
            return view('tagdelete',['name'=>$name,'id'=>$id,'isset'=>$isset]);
        }
        return view('tagdelete',['isset'=>$isset]);
    }
    public function tagdeletepost(Request $request){
        if($request->input('cancel')=='خیر'){
            return redirect('/admin/tag/delete');
        }
        $request->validate([
            'id'=>'required|integer'
        ]);
        $id=$request->input('id');
        DB::delete("DELETE from tags where id='$id'");
        return Redirect('/admin/tag/delete')->withErrors(['msg' => 'عملیات انجام شد']);
    }
    public function category(){
        return view('category');
    }
    public function categoryPost(Request $request){
        $request->validate([
            'category'=>'required|string|max:30|unique:category,category'
        ],[
            'category.unique'=>'این دسته بندی از قبل موجود است',
            'category.string'=>'دسته بندی وارد شده مورد قبول نیست',
            'category.max'=>'مقدار بیشتر از 20 حرف است',
            'category.required'=>'مقداری وارد نشده است'
        ]);
        $category=htmlspecialchars($request->string('category'));
        DB::insert("INSERT INTO category(category) values ('$category')");
        return Redirect()->back()->withErrors(['msg' => 'عملیات انجام شد']);
    }
    public function categoryUpdate(Request $request){
        $isset=false;
        if($request->input('id')!=null){
            $request->validate([
                'id'=>'required|integer'
            ]);
            $isset=true;
            $id=$request->input('id');
            $category=DB::select("SELECT category from category where id='$id'");
            if($category==null){
                return Redirect()->back()->withErrors(['msg'=>'دسته بندی وارد شده پیدا نشد']);
            }
            return view('categoryupdate',['name'=>$category,'id'=>$id,'isset'=>$isset]);
        }
        return view('categoryupdate',['isset'=>$isset]);
    }
    public function categorysupdate(Request $request){
        if($request->input('cancel')=='انصراف'){
            return redirect('/admin/category/update');
        }
        $request->validate([
            'category'=>'required|string|max:30|unique:category,category'
        ],
        [
            'category.unique'=>'این دسته بندی از قبل موجود است',
            'category.string'=>'دسته بندی وارد شده مورد قبول نیست',
            'category.max'=>'مقدار بیشتر از 20 حرف است',
            'category.required'=>'مقداری وارد نشده است'
        ]);
        $category=htmlspecialchars($request->string('category'));
        $id=htmlspecialchars($request->input('id'));
        DB::update("UPDATE category SET category='$category' where id='$id'");
        return Redirect()->back()->withErrors(['sec'=>'عملیات انجام شد']);
    }
    public function categorydelete(Request $request){
        $isset=false;
        if($request->input('id')!=null){
            $request->validate([
                'id'=>'required|integer'
            ]);
            $isset=true;
            $id=$request->input('id');
            $category=DB::select("SELECT category from category where id='$id'");
            if($category==null){
                return Redirect()->back()->withErrors(['msg'=>'دسته بندی وارد شده پیدا نشد']);
            }
            return view('categorydelete',['name'=>$category,'id'=>$id,'isset'=>$isset]);
        }
        return view('categorydelete',['isset'=>$isset]);
    }
    public function categorysdelete(Request $request){
            $request->validate([
                'id'=>'required|integer'
            ]);
            $id=$request->input('id');
            if($request->input('cancel')=='خیر'){
                return redirect('/admin/category/delete');
            }
            DB::delete("DELETE from category where id='$id'");
            return redirect('/admin/category/delete')->withErrors(['sec'=>'دسته بندی حذف شد']);
        }
    public function categorySearchAuto(Request $request){
        if($request->ajax()){
            $output='';
            if($request->search==''){
                return $output;
            }
            $data=DB::select("SELECT category,id from category where category like '%$request->search%' limit 0,5");
            if(count($data)>0 ){
                $output.='<ul class="list-group list-group-flush"><header><li class="list-group-item list-group-item-action active">دسته بندی</li></header>';
                foreach($data as $row){
                    $output .='<a style="text-decoration: none;" href="?id='.$row->id.'"><li class="list-group-item" style="color: #121212;" >'.$row->category.'</li></a>';
                }
                $output.='</ul>';
            }
            if(count($data)==0){
                $output.='<ul class="white h5" style="text-align:center;">موردی پیدا نشد</ul>';
            }
            return $output;
        }
    }
    public function update(Request $request){
        $isset=false;
        if($request->input('id')!=null){
            $isset=true;
            $id=htmlentities($request->input('id'));
            $row=DB::select("SELECT picture,text,text1,lyric,category from input where id='$id'");
            if ($row==null){
                return redirect('/admin/update')->withErrors(['error'=>'همچین آهنگی وجود ندارد.']);
            }
            $categorys=DB::select("SELECT category from category");
            $top=DB::select("SELECT key_out from top order by id DESC limit 0,8");
            $new=DB::select("SELECT keyout from newsong  order by id DESC limit 0,10");
            $tops=null;
            $newsong=null;
            foreach($top as $t){
                if($t->key_out==$id){
                    $tops='<div class="form-check form-check-inline">
                    <input class="form-check-input custombg" type="checkbox" id="inlineCheckbox1" value="true" name="deletetop">
                    <label class="form-check-label white" for="inlineCheckbox1">موزیک تاپ</label>
                  </div>';
                }
            }
            foreach($new as $n){
                if($n->keyout==$id){
                    $newsong='<div class="form-check form-check-inline">
                    <input class="form-check-input custombg" type="checkbox" id="inlineCheckbox2" value="true" name="deletenewsong">
                    <label class="form-check-label white" for="inlineCheckbox2" >موزیک جدید</label>
                  </div>';
                }
            }
            foreach($row as $r){
            $names=DB::select("SELECT name from tags where name !='$r->text'");
            $name=$r->text;
            $categ=$r->category;
            }
            $category=null;
            if($categ=="null"){
                $categ=null;
            }
            foreach($categorys as $c){
                $check=true;
                if($categ!=null){
                    foreach(json_decode($categ) as $ca){
                        $check=true;
                        if($c->category == $ca){
                            $check=false;
                            break;
                        }
                    }
                    if($check){
                        $category[]=$c->category;
                    }
                }
                else{
                    $category[]=$c->category;
                }
            }
            if($row==null){
                return Redirect()->back()->withErrors(['msg' =>'!آهنگ مورد نظر شما یافت نشد']);
            }
            return view('update',['rows'=>$row,'id'=>$id,'isset'=>$isset,'names'=>$names,'name'=>$name,'category'=>$category,'top'=>$tops,'newsong'=>$newsong]);
        }
        return view('update',['isset'=>$isset]);
    }
    public function updates(Request $request){
        $request->validate([
            'text'=>'required|max:60',
            'text1'=>'required|min:1|max:60',
            'lyric'=> 'min:0|max:1197',
            'id' =>'required',
            'top' =>'string',
            'newsong' =>'string',
            'deletetop' =>'string',
            'deletenewsong' =>'string'
          ]);
        $id=$request->input('id');
        $text=htmlentities($request->input('text'));
        $text1=htmlentities($request->string('text1'));
        $picturetop=htmlspecialchars($request->input('picturetop'));
        $lyric=htmlentities($request->string('lyric'));
        $deletecategory=$request->input('deletecategory');
        $jsoncategory=$request->input('jsoncategory');
        $category=$request->input('category');
        if($jsoncategory!=null and $deletecategory!=null){
            $jsoncategorys=json_decode($jsoncategory);
            foreach($jsoncategorys as $json){
                $key = array_search($json, $deletecategory);
                if($key>-1){
                    unset($jsoncategorys[$key]);
                }
            }
            if($category!=null){
                $jsoncategorys=$jsoncategorys+$category;
            }
            $jsoncategory=json_encode($jsoncategorys,JSON_UNESCAPED_UNICODE);
        }
        else{
            $jsoncategory=json_encode($category,JSON_UNESCAPED_UNICODE);
        }
        if($jsoncategory!='null'){
            $jsoncategory="'" . $jsoncategory ."'";
        }
        $lyric=str_replace('</br>','\r\n',$lyric);
        $datetime = Carbon::now()->toDateTimeString();
        if($request->input('deletenewsong')=='true'){
            DB::delete("DELETE from newsong where keyout='$id'");
        }
        elseif($request->input('newsong')=='true'){
            DB::insert("INSERT into newsong(text,text1,lyric,keyout,created_at)values('$text','$text1','$lyric','$id','$datetime')");
        }
        else{
            DB::update("UPDATE newsong SET text='$text',text1='$text1',lyric='$lyric',updated_at='$datetime'  WHERE keyout=$id");
        }
        if(file_exists($request->file('pitcure'))){
            $request->validate([
                'pitcure'=> 'required|mimes:jpeg,png,jpg,gif,svg',
            ]);
           $picture=$request->file('pitcure');
           $rand = bin2hex(random_bytes(10));
           $name=$rand.'.'.$picture->getClientOriginalExtension();
           $picture->move(public_path('pictures'),$name);
            DB::update("UPDATE input SET picture='$name',text='$text',text1='$text1',lyric='$lyric',updated_at='$datetime',category=$jsoncategory WHERE id=$id");
            if($request->input('deletetop')=="true"){
                DB::delete("DELETE from top where key_out='$id'");
            }
            elseif($request->input('top')=="true"){
                DB::insert("INSERT into top(picture,text,text1,lyric,key_out,created_at)values('$name','$text','$text1','$lyric','$id','$datetime')");
            }
            else{
                DB::update("UPDATE top SET picture='$name',text='$text',text1='$text1',lyric='$lyric',updated_at='$datetime' WHERE key_out=$id");
            }
           if($request->hasFile('pictures/'.$request->string('picturename'))){
           unlink('pictures/'.$request->string('picturename'));
           }
        }
        else{
            DB::update("UPDATE input SET text='$text',text1='$text1',lyric='$lyric',updated_at='$datetime',category = $jsoncategory WHERE id=$id");
            if($request->input('deletetop')=="true"){
                DB::delete("DELETE from top where key_out='$id'");
            }
            elseif($request->input('top')=="true"){
                DB::insert("INSERT into top(picture,text,text1,lyric,key_out,created_at)values('$picturetop','$text','$text1','$lyric','$id','$datetime')");
            }
            else{
                DB::update("UPDATE top SET text='$text',text1='$text1',lyric='$lyric',updated_at='$datetime' WHERE key_out=$id");
            }
        }
        return Redirect()->back()->withErrors(['msg' => 'عملیات انجام شد']);
    }
    public function delete(Request $request){
        $isset=false;
        if($request->input('id')!=null){
            $isset=true;
            $id=htmlspecialchars($request->input('id'));
            $row=DB::select("SELECT picture,music,text,text1,lyric from input where id='$id'");
            if($row==null){
                return Redirect()->back()->withErrors(['error' =>'موردی پیدا نشد']);
            }
            return view('delete',['rows'=>$row ,'id'=>$id,'isset'=>$isset]);
        }
        return view('delete',['isset'=>$isset]);
    }
    public function deleteRow(Request  $request){
        $request->validate([
            'id' =>'required'
        ]);
        $id=htmlspecialchars($request->input('id'));
        $row=DB::select("SELECT picture,music,text,text1,lyric from input where id='$id'");
        return view('delete',['rows'=>$row ,'id'=>$id]);
    }
    public function deletes(Request  $request){
        if($request->input('no')=='خیر'){
            return redirect('/admin/delete');
        }
        $request->validate([
            'id' =>'required',
            'picture'=>'required|string',
            'music'=>'required|string',
        ]);
        $id=htmlspecialchars($request->input('id'));
        $picture=htmlspecialchars($request->input('picture'));
        $music=htmlspecialchars($request->input('music'));
        DB::delete("DELETE from input where id = '$id'");
        DB::delete("DELETE from top where key_out = '$id'");
        DB::delete("DELETE from newsong where keyout = '$id'");
        if($request->hasFile('pictures/'.$picture)){
        unlink('pictures/'.$picture);
        }
        if($request->hasFile('music/'.$music)){
        $count=DB::select("SELECT count(music) as count from input where music='$music'");
        foreach($count as $c){
        if($c->count==0){
            unlink('music/'.$music);
        }
        }
        }
        return Redirect('/admin/delete')->withErrors(['msg' => 'عملیات انجام شد']);
    }
    public function categoryShow(Request $request,$category){
        if(empty($request->cookie('view'))){
            Cookie::queue('view','ok',60);
            $ip=$request->ip();
            $jDate = Jalalian::fromDateTime(Carbon::now());
            $jalali=$jDate->getMonth()-1;
            $carbon=Carbon::now()->toDateTimeString();
            if(Cookie::hasQueued('view')=='ok'){
                db::insert("INSERT INTO view (ip,jalali,UPDATE_AT) VALUES ('$ip',$jalali,'$carbon')");
            }
        }
        $categorys='"'.$category.'"';
        $counts=DB::select("SELECT count(text) AS count FROM input WHERE category LIKE '%$categorys%' ");
        foreach($counts as $c){
            $count=$c->count;
        }
        $number_content=10;
        $number_page=ceil($count/$number_content);
        $page=$request->integer('page');
        if(!isset($_GET['page'])){
            $page=1;
        }
        if($page<=0 or $page>$number_page){
            return Redirect()->back()->withErrors(['msg' =>'دسته بندی مورد نظر پیدا نشد']);
        }
        $social=DB::select("SELECT  * FROM callus ORDER BY id DESC LIMIT 1;");
        foreach ($social as $row){
            $instagram=$row->instagram;
            $phoneNumber=$row->phoneNumber;
            $gmail=$row->gmail;
            $telegram=$row->telegram;
        }
        $num=($page-1) * $number_content;
        $mains=DB::select("SELECT * from input where category LIKE '%$categorys%' order by id DESC limit  $num, $number_content");
        $querys=DB::select("SELECT picture,key_out,text,text1 from top order by id DESC limit  0,8");
        $newsong=DB::select('SELECT keyout,text,text1 from newsong order by id DESC limit 0,10');
        $artists=DB::select('SELECT name from tags');
        $categorySql=DB::select('SELECT category from category');
        $h1='دانلود آهنگ '.$category;
        $link="/category/". $category;
        return view('main',['mains'=>$mains,'querys'=>$querys,'number_page'=>$number_page,'page'=>$page,'newsongs'=>$newsong,'artists'=>$artists,'h1'=>$h1,'category'=>$categorySql,'link'=>$link,'gmail'=>$gmail,'phoneNumber'=>$phoneNumber,'instagram'=>$instagram,'telegram'=>$telegram]);
    }
    public function captcha(Request $request){
        $string="1234567890qQwWeErRtTyYuUiIoOpPaAsSdDfFgGhHjJkKlLzZxXcCvVbBnNmM#%$&=";
        $value='';
        for($i=0;$i<6;$i++){
        $n=rand(0,strlen($string)-1);
        $value.=$string[$n];
        }
        $request->session()->put('captcha',$value);
        $captcha=imagecreatefromjpeg('captcha-bg.jpg');
        $color=imagecolorallocate($captcha,rand(0,150),rand(0,150),rand(0,150));
        $font="TT Norms Pro Serif Trial Bold.ttf";
        imagettftext($captcha,25,rand(-14,14),rand(30,100),50,$color,$font,$value);
        imagepng($captcha);
        imagedestroy($captcha);
    }
}

