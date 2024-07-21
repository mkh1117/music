<?php

namespace App\Http\Controllers;

use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Http\Response;
use view;

class TopController extends Controller
{
    public function main(Request $request){
        if(empty($request->cookie('view'))){
            Cookie::queue('view','ok',60);
            $ip=$request->ip();
            db::insert("INSERT INTO view (ip) VALUES ('$ip')");
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
            abort(404);
        }
        $num=($page-1) * $number_content;
        $mains=DB::select("SELECT *from input  order by id DESC limit  $num, $number_content");
        $querys=DB::select("select picture,key_out,text,text1 from top");
        $newsong=DB::select('select keyout,text,text1 from newsong');
        $artists=DB::select('SELECT name from tags');
        $h1='دانلود آهنگ جدید';
        return view('main',['mains'=>$mains,'querys'=>$querys,'number_page'=>$number_page,'page'=>$page,'newsongs'=>$newsong,'artists'=>$artists,'h1'=>$h1]);
    }
    public function searchs($search,Request $request){
        if(empty($request->cookie('view'))){
            Cookie::queue('view','ok',60);
            $ip=$request->ip();
            db::insert("INSERT INTO view (ip) VALUES ('$ip')");
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
            abort(404);
        }
        $num=($page-1) * $number_content;
        $mains=DB::select("SELECT *from input where text like'%$search%' or text1 like'%$search%' order by id DESC limit  $num, $number_content");
        $querys=DB::select("select picture,key_out,text,text1 from top");
        $newsong=DB::select('select keyout,text,text1 from newsong');
        $artists=DB::select('SELECT name from tags');
        $h1='دانلود آهنگ '.$search;
        return view('search',['mains'=>$mains,'querys'=>$querys,'number_page'=>$number_page,'page'=>$page,'newsongs'=>$newsong,'artists'=>$artists,'h1'=>$h1]);
    }
    public function search(Request $request){
        $request->validate([
            'search'=>'required|string',
        ]);
        if(empty($request->cookie('view'))){
            Cookie::queue('view','ok',60);
            $ip=$request->ip();
            db::insert("INSERT INTO view (ip) VALUES ('$ip')");
        }
        $search=htmlspecialchars($request->string('search'));
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
            abort(404);
        }
        $num=($page-1) * $number_content;
        $mains=DB::select("SELECT *from input where text like'%$search%' or text1 like'%$search%' order by id DESC limit  $num, $number_content");
        $querys=DB::select("select picture,key_out,text,text1 from top");
        $newsong=DB::select('select keyout,text,text1 from newsong');
        $artists=DB::select('SELECT name from tags');
        $h1='دانلود آهنگ '.$search;
        return view('search',['mains'=>$mains,'querys'=>$querys,'number_page'=>$number_page,'page'=>$page,'newsongs'=>$newsong,'artists'=>$artists,'h1'=>$h1,'search'=>$search]);
    }
    public function top(int $id){
        $tops=DB::select('select * from input where id =:id',['id' =>$id]);
        if($tops==null){
            abort(404);
        }
        DB::update("UPDATE input set view=view+1 where id='$id'");
        $querys=DB::select("select * from top");
        $newsong=DB::select('select keyout,text,text1 from newsong');
        $artists=DB::select('SELECT name from tags');
        return view('viewtop',['tops'=>$tops,'querys'=>$querys,'newsongs'=>$newsong,'artists'=>$artists]);
    }
    public function input(){

        return view('test');
    }
    public function input1(Request $request){
        $request->validate([
            'pitcure'=> 'required|mimes:jpeg,png,jpg,gif,svg',
            'music'=>'required|mimetypes:audio/mp3,application/octet-stream,audio/mpeg,mpga,mp3,wav',
            'text'=>'required|min:3|max:60',
            'text1'=>'required|min:3|max:60',
            'ok'=>'required',
          ]);
        $picture=$request->file('pitcure');
        $music=$request->file('music');
        $text=htmlspecialchars($request->string('text'));
        $text1=htmlspecialchars($request->string('text1'));
        $category=$request->string('gridRadios');
        $lyric=htmlentities($request->string('lyric'));
        $lyric=str_replace('</br>','\r\n',$lyric);
        $rand = bin2hex(random_bytes(10));
        $name=$rand.'.'.$picture->getClientOriginalExtension();
        $name1=str_replace(' ','_',$music->getClientOriginalName());
        $music->move(public_path('music'),$name1);
        $picture->move(public_path('pictures'),$name);
        DB::insert("INSERT into input(picture,music,text,text1,lyric,category)values('$name','$name1','$text','$text1','$lyric','$category')");
        return "done";
    }
    public function topinput(){
        $tops=DB::select("SELECT * from top ");
        return view('top',['tops'=>$tops,'title'=>'top','send'=>'topinput1']);
    }
    public function topinput1(Request $request){
        $request->validate([
            'pitcure'=> 'required|mimes:jpeg,png,jpg,gif,svg',
            'music'=>'required|mimetypes:audio/mp3,application/octet-stream,audio/mpeg,mpga,mp3,wav',
            'text'=>'required|min:3|max:60',
            'text1'=>'required|min:3|max:60',
            'id'=>'required',
            'ok'=>'required',
          ]);
        $picture=$request->file('pitcure');
        $music=$request->file('music');
        $text=htmlentities($request->string('text'));
        $text1=htmlentities($request->string('text1'));
        $category=$request->string('gridRadios');
        $lyric=htmlentities($request->string('lyric'));
        $lyric=str_replace('</br>','\r\n',$lyric);
        $id=htmlentities($request->input('id'));
        $rand = bin2hex(random_bytes(10));
        $name=$rand.'.'.$picture->getClientOriginalExtension();
        $name1=str_replace(' ','_',$music->getClientOriginalName());
        $music->move(public_path('music'),$music->getClientOriginalName());
        $picture->move(public_path('pictures'),$name);
        DB::insert("INSERT into input(picture,music,text,text1,lyric,category)values('$name','$name1','$text','$text1','$lyric','$category')");
        $nums=DB::select("SELECT id FROM input ORDER BY id DESC LIMIT 1;");
        foreach($nums as $num){
            $a=$num->id;
        }
        DB::update("UPDATE top SET picture='$name',music='$name1',text='$text',text1='$text1',lyric='$lyric',key_out='$a' WHERE id=$id");
        $tops=DB::select("SELECT * from top ");
        return view('top',['tops'=>$tops,'title'=>'top','send'=>'topinput1']);
    }
    public function artist(Request $request,$name){
        if(empty($request->cookie('view'))){
            Cookie::queue('view','ok',60);
            $ip=$request->ip();
            db::insert("INSERT INTO view (ip) VALUES ('$ip')");
        }
        $query=DB::select("SELECT id from input where text like '$name' ");
        $count=count($query);
        $number_content=10;
        $number_page=ceil($count/$number_content);
        $page=$request->get('page');
        $page=$request->integer('page');
        if(!isset($_GET['page'])){
            $page=1;
        }
        if($page<=0 or $page>$number_page){
            abort(404);
        }
        $num=($page-1) * $number_content;
        $mains=DB::select("SELECT *from input where text like '%$name%' order by id desc limit  $num, $number_content");
        $querys=DB::select("select * from top");
        $newsong=DB::select('select keyout,text,text1 from newsong');
        $artists=DB::select('SELECT name from tags');
        $h1='دانلود آهنگ از'.$name;
        return view('main',['mains'=>$mains,'querys'=>$querys,'number_page'=>$number_page,'page'=>$page,'newsongs'=>$newsong,'artists'=>$artists,'h1'=>$h1]);
    }
    public function tagsshow(){
        return view('tag');
    }
    public function tags(Request $request){
        $request->validate([
            'tag' => 'required|unique:tags,name',
        ]);
        $name=htmlspecialchars($request->string('tag'));
        $tags=count(DB::select("select text from input where text like'$name'"));
        return view('tag',['tags'=>$tags,'name'=>$name]);
    }
    public function SubTag(Request $request){
        $name=htmlspecialchars($request->string('name'));
        db::insert("INSERT INTO tags (name) VALUES ('$name')");
        return 'done';
    }
    public function newsong(){
        $tops=DB::select("SELECT * from newsong");
        return view('top',['tops'=>$tops,'title'=>'newsong','send'=>'newsong']);
    }
    public function newsongs(Request $request){
        $request->validate([
            'pitcure'=> 'required|mimes:jpeg,png,jpg,gif,svg',
            'music'=>'required|mimetypes:audio/mp3,application/octet-stream,audio/mpeg,mpga,mp3,wav',
            'text'=>'required|min:3|max:60',
            'text1'=>'required|min:3|max:60',
            'ok'=>'required',
          ]);
        $picture=$request->file('pitcure');
        $music=$request->file('music');
        $text=htmlentities($request->string('text'));
        $text1=htmlentities($request->string('text1'));
        $category=$request->string('gridRadios');
        $lyric=htmlentities($request->string('lyric'));
        $lyric=str_replace('</br>','\r\n',$lyric);
        $id=$request->input('id');
        $rand = bin2hex(random_bytes(10));
        $name=$rand.'.'.$picture->getClientOriginalExtension();
        $name1=str_replace(' ','_',$music->getClientOriginalName());
        $music->move(public_path('music'),$music->getClientOriginalName());
        $picture->move(public_path('pictures'),$name);
        DB::insert("INSERT into input(picture,music,text,text1,lyric,category)values('$name','$name1','$text','$text1','$lyric','$category')");
        $nums=DB::select("SELECT id FROM input ORDER BY id DESC LIMIT 1;");
        foreach($nums as $num){
            $a=$num->id;
        }
        DB::update("UPDATE newsong SET picture='$name',music='$name1',text='$text',text1='$text1',lyric='$lyric',keyout='$a' WHERE id=$id");
        $tops=DB::select("SELECT * from newsong ");
        return view('top',['tops'=>$tops,'title'=>'newsong','send'=>'newsong']);
    }
    public function update(){
        return view('update');
    }
    public function updateRow(Request $request){
        $request->validate([
            'id' =>'required'
        ]);
        $id=htmlentities($request->input('id'));
        $row=DB::select("SELECT picture,text,text1,lyric from input where id='$id'");
        return view('update',['rows'=>$row,'id'=>$id]);
    }
    public function updates(Request $request){
        $request->validate([
            'text'=>'required|min:3|max:60',
            'text1'=>'required|min:3|max:60',
            'lyric'=> 'min:0|max:300',
            'id' =>'required'
          ]);
        $id=$request->input('id');
        $text=htmlentities($request->string('text'));
        $text1=htmlentities($request->string('text1'));
        $lyric=htmlentities($request->string('lyric'));
        $lyric=str_replace('</br>','\r\n',$lyric);
        if(file_exists($request->file('pitcure'))){
            $request->validate([
                'pitcure'=> 'required|mimes:jpeg,png,jpg,gif,svg',
            ]);
           $picture=$request->file('pitcure');
           $rand = bin2hex(random_bytes(10));
           $name=$rand.'.'.$picture->getClientOriginalExtension();
           $picture->move(public_path('pictures'),$name);
           DB::update("UPDATE input SET picture='$name',text='$text',text1='$text1',lyric='$lyric' WHERE id=$id");
           unlink('pictures/'.$request->string('picturename'));
        }
        else{
            DB::update("UPDATE input SET text='$text',text1='$text1',lyric='$lyric' WHERE id=$id");
        }
        return 'done';
    }
    public function delete(){
        return view('delete');
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
        $request->validate([
            'id' =>'required',
            'picture'=>'required|string',
            'music'=>'required|string',
        ]);
        $id=htmlspecialchars($request->input('id'));
        $picture=htmlspecialchars($request->input('picture'));
        $music=htmlspecialchars($request->input('music'));
        DB::delete("DELETE from input where id = '$id'");
        $count=DB::select("SELECT count(music) as count from input where music='$music'");
        unlink('pictures/'.$picture);
        foreach($count as $c){
        if($c->count==0){
            unlink('music/'.$music);
        }
        }
        return 'done';
    }
    public function sad(Request $request){
        $counts=DB::select("SELECT count(id) as count from input where category='غمگین'");
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
            abort(404);
        }
        $num=($page-1) * $number_content;
        $mains=DB::select("SELECT *from input where category='غمگین' order by id DESC limit  $num, $number_content");
        $querys=DB::select("select picture,key_out,text,text1 from top");
        $newsong=DB::select('select keyout,text,text1 from newsong');
        $artists=DB::select('SELECT name from tags');
        $h1='دانلود آهنگ غمگین';
        return view('main',['mains'=>$mains,'querys'=>$querys,'number_page'=>$number_page,'page'=>$page,'newsongs'=>$newsong,'artists'=>$artists,'h1'=>$h1]);
    }
    public function happy(Request $request){
        if(empty($request->cookie('view'))){
            Cookie::queue('view','ok',60);
            $ip=$request->ip();
            db::insert("INSERT INTO view (ip) VALUES ('$ip')");
        }
        $counts=DB::select("SELECT count(id) as count from input where category='شاد'");
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
            abort(404);
        }
        $num=($page-1) * $number_content;
        $mains=DB::select("SELECT *from input where category='شاد' order by id DESC limit  $num, $number_content");
        $querys=DB::select("select picture,key_out,text,text1 from top");
        $newsong=DB::select('select keyout,text,text1 from newsong');
        $artists=DB::select('SELECT name from tags');
        $h1='دانلود آهنگ شاد';
        return view('main',['mains'=>$mains,'querys'=>$querys,'number_page'=>$number_page,'page'=>$page,'newsongs'=>$newsong,'artists'=>$artists,'h1'=>$h1]);
    }
}

