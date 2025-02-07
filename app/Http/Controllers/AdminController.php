<?php

namespace App\Http\Controllers;

use App\Rules\Captcha;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;
use Symfony\Component\Console\Output\Output;
use view;

class AdminController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin';
    protected function authenticated(Request $request,)
{
    $session=$request->session()->get('captcha');
    $post=htmlspecialchars($request->input('captcha'));
    $username=htmlspecialchars($request->input('username'));
    $password=htmlspecialchars($request->input('password'));
    $remember=$request->input('remember');
    if($session!=$post){
        $request->validate([
            'captcha'=>['required','string',new Captcha]
        ],
        [
            'captcha.required'=>'کد کپچا وارد نشده'
        ]);
        return redirect()->route('admin.view_login');
    }
    if($remember=='remember'){
        cookie::queue('username',$username,3600);
        cookie::queue('password',$password,3600);
    }
}
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function showLoginForm(Request $request)
    {
        if(empty($request->cookie('log'))){
            Cookie::queue('log','ok',60);
            $ip=$request->ip();
            db::insert("INSERT INTO log_admin(ip) VALUES('$ip')");
        }
        if(!empty($request->cookie('username') and $request->cookie('password'))){
            $username=$request->cookie('username');
            $password=$request->cookie('password');
            return view('LoginAdmin',['username'=>$username,'password'=>$password]);
        }
        return view('LoginAdmin',);
    }
    public function username()
    {
        return 'username';
    }
    public function dashboard(){
        $view=count(db::select("SELECT ip from view"));
        $cpu_load="";
        $memory_usage="";
        $disk_usage="";
        if(php_uname('s')=="Windows NT"){
        $wmi = new \COM("WinMgmts://");
        $cpus = $wmi->InstancesOf("Win32_Processor");
        $cpu_load_total = 0;
        $cpu_count = 0;

        foreach ($cpus as $cpu) {
            $cpu_load_total += $cpu->LoadPercentage;
            $cpu_count++;
        }
        $cpu_load = $cpu_load_total / $cpu_count;

        // دریافت اطلاعات RAM
        $ram = $wmi->InstancesOf("Win32_OperatingSystem");
        $total_memory = 0;
        $free_memory = 0;

        foreach ($ram as $mem) {
            $total_memory = $mem->TotalVisibleMemorySize;
            $free_memory = $mem->FreePhysicalMemory;
        }
        $used_memory = $total_memory - $free_memory;
        $memory_usage = ($used_memory / $total_memory) * 100;

        // دریافت اطلاعات دیسک
        $disks = $wmi->InstancesOf("Win32_LogicalDisk");
        $disk_total = 0;
        $disk_free = 0;

        foreach ($disks as $disk) {
            if ($disk->DriveType == 3) { // فقط دیسک‌های هارد را در نظر بگیرید
                $disk_total += $disk->Size;
                $disk_free += $disk->FreeSpace;
            }
        }
        $disk_used = $disk_total - $disk_free;
        $disk_usage = ($disk_used / $disk_total) * 100;
    }
    elseif(php_uname('s')=="linux"){
        // cpu ...
        $cpu = sys_getloadavg();
        $cpu_load=$cpu[0]*100;
        // hard disk ...
        $diskTotal = disk_total_space("/");
        $diskFree = disk_free_space("/");
        $diskUsed = $diskTotal - $diskFree;
        $disk_usage = ($diskUsed / $diskTotal) * 100;
        // memory ...
        $memInfo = file_get_contents("/proc/meminfo");
        preg_match("/MemTotal:\s+(\d+)/", $memInfo, $matches);
        $memTotal = $matches[1];
        preg_match("/MemAvailable:\s+(\d+)/", $memInfo, $matches);
        $memAvailable = $matches[1];
        $memUsed = $memTotal - $memAvailable;
        $memory_usage = ($memUsed / $memTotal) * 100;
    }
       $cpu_darsad = floatval($cpu_load);
       $memory_darsad = round(floatval($memory_usage),0);
       $disk_darsad = round(floatval($disk_usage),0);
        $wmi=null;
        $user=DB::select("SELECT DISTINCT ip  from view");
        $user=count($user);
        $month=[0,0,0,0,0,0,0,0,0,0,0,0];
        $data=DB::select("SELECT  jalali ,  COUNT(row) tedad FROM view  WHERE UPDATE_AT BETWEEN  now() -  interval 1 year and now() GROUP BY jalali ORDER BY  jalali;");
        foreach($data as $d){
            $month[$d->jalali]=$d->tedad;
        }
        $week=[0,0,0,0,0,0,0];
        $data=DB::select("SELECT  WEEKDAY(UPDATE_AT) week ,COUNT(row) tedad FROM view WHERE UPDATE_AT BETWEEN  CURDATE() -  interval 6 day and now() GROUP BY  WEEKDAY(UPDATE_AT) ORDER BY  WEEKDAY(UPDATE_AT)");
        foreach($data as $d){
            if($d->week<5){
                $week[$d->week+2]=$d->tedad;
                }
                else{
                $week[$d->week-5]=$d->tedad;
                }
        }
        $message=DB::select("SELECT SUBSTRING(message, 1, 80) as message,id,CHAR_LENGTH(message) AS tedad , name  FROM message WHERE read_message=0 order by id desc");
        $posts=DB::select("SELECT COUNT(id) post FROM input ");
        foreach($posts as $p){
            $post=$p->post;
        }
        $most_view=DB::select("SELECT text,text1,view FROM input ORDER by view DESC limit 0,5");
        return view('dashboard',['view'=>$view,'cpu_load'=>$cpu_darsad,'memory_usage'=>$memory_darsad,'disk_usage'=>$disk_darsad,'user'=>$user,'most_view'=>$most_view,'month'=>$month,'week'=>$week,'post'=>$post,'message'=>$message]);
    }
    public function changePassword(){
        return view('adminchangePassword');
    }
    public function changePasswordpost(Request $request){
        $request->validate([
            'newpassword'=>'required|string|min:8|max:80',
            'lastpassword'=>'required|string|min:8|max:80'
        ],
    [
        'newpassword.min'=>'رمز باید حداقل 8 کاراکتر داشته باشد',
        'newpassword.max'=>'رمز باید حداکثر 80 کاراکتر داشته باشد',
        'newpassword.required'=>'این فیلد خالی است',
    ]);
        $lastpassword=$request->string('lastpassword');
        $newpassword=$request->string('newpassword');
        if($lastpassword==$newpassword){
            return redirect()->back()->withErrors(['msg'=>'رمز جدید برابر رمز قبلی است']);
        }
        $password=Auth::guard('admin')->user()->password;
        if(hash::check($lastpassword,$password)){
            $password=hash::make($newpassword);
            $username=Auth::guard('admin')->user()->username;
            DB::update("UPDATE admins SET password='$password' where username='$username'");
            return redirect()->back()->withErrors(['sec'=>'اطلاعات با موفقیت ثبت شد.']);
        }
        else{
            return redirect()->back()->withErrors(['msg'=>'رمز وارد شده صحیح نیست']);
        }
    }
    public function addAdmin(){
    return view('addAdmin');
    }
    public function addAdminPost(Request $request){
        $request->validate([
            'name'=>'required|string|max:50',
            'username'=>'required|string|min:4|max:80|unique:admins,username',
            'password'=>'required|string|min:8|max:80',
            'passwordcheck'=>'required|string|max:80|'
        ],[
            'username.unique'=>'نام کاربری از قبل وجود دارد',
            'username.min'=>'حداقل باید 4 کاراکتر داشته باشد',
            'username.max'=>'حداکثر باید 80 کاراکتر داشته باشد',
            'name.max'=>'حداکثر باید 50 کاراکتر داشته باشد',
            'password.max'=>'حداکثر باید 80 کاراکتر داشته باشد',
            'password.min'=>'حداقل باید 8 کاراکتر داشته باشد',
            'passwordcheck.max'=>'حداکثر باید 80 کاراکتر داشته باشد',
            'username.required'=>'این فیلد خالی است',
            'name.required'=>'این فیلد خالی است',
            'password.required'=>'این فیلد خالی است',
            'passwordcheck.required'=>'این فیلد خالی است',
        ]);
        $name=htmlspecialchars($request->string('name'));
        $username=htmlspecialchars($request->string('username'));
        $password=htmlspecialchars($request->string('password'));
        $passwordcheck=htmlspecialchars($request->string('passwordcheck'));
        if($password!=$passwordcheck){
            return redirect()->back()->withErrors(['msg'=>'تکرار رمز مطابقت ندارد']);
        }
        $password=hash::make($password);
        DB::insert("INSERT INTO admins(name,username,password,owner,superadmin) values('$name','$username','$password',0,0)");
        return redirect()->back()->withErrors(['sec'=>'اطلاعات با موفقیت ثبت شد.']);
    }
    public function changeusername(){
        $username=Auth::guard('admin')->user()->username;
        return view('adminChangeUsername',['username'=>$username]);
    }
    public function changeusernamepost(Request $request){
        $request->validate([
            'username'=>'required|string|min:4|max:80|unique:admins,username',
            'password'=>'required|string|min:8|max:80'
        ],
        [
            'username.unique'=>'نام کاربری از قبل وجود دارد',
            'username.min'=>'حداقل باید 4 کاراکتر داشته باشد',
            'password.min'=>'حداقل باید 8 کاراکتر داشته باشد',
            'username.required'=>'این فیلد خالی است',
            'password.required'=>'این فیلد خالی است'
        ]);
        $username=htmlspecialchars($request->string('username'));
        $passwordcheck=htmlspecialchars($request->string('password'));
        $password=Auth::guard('admin')->user()->password;
        if(hash::check($passwordcheck,$password)){
            $lastusername=Auth::guard('admin')->user()->username;
            DB::update("UPDATE admins SET username='$username' where username='$lastusername'");
            return redirect()->back()->withErrors(['sec'=>'اطلاعات با موفقیت ثبت شد.']);
        }
        else{
            return redirect()->back()->withErrors(['msg'=>'رمز وارد شده صحیح نیست.']);
        }
    }
    public function updateAdmin(){
        $admin=DB::select('SELECT owner,superadmin,username,name from admins');
        return view('updateAdmin',['admin'=>$admin]);
    }
    public function AdminUpdate(Request $request){
        $request->validate([
            'username'=>'required|string'
        ]);
        $username=htmlspecialchars($request->input('username'));
        $admin=DB::select("SELECT owner,superadmin,username,name from admins where username='$username'");
        foreach($admin as $a){
        if(!(Auth::guard('admin')->user()->username==$a->username) and ($a->superadmin and !(Auth::guard('admin')->user()->owner))){
            return redirect()->back()->withErrors(['msg'=>'شما دسترسی ندارید']);
        }
    }
        return view('Adminupdate',['admin'=>$admin]);
    }
    public function AdminsUpdate (Request $request){
        $request->validate([
            'name'=>'required|min:4|max:80|string',
            'lastusername'=>'required|max:80|string',
            'password'=>'required|min:8|max:80|string',
            'access'=>'max:80'
        ]);
        $access=htmlspecialchars($request->input('access'));
        $lastusername=htmlspecialchars($request->string('lastusername'));
        $name=htmlspecialchars($request->string('name'));
        $password=htmlspecialchars($request->string('password'));
        $passwordnow=Auth::guard('admin')->user()->password;
        if(!hash::check($password,$passwordnow)){
            return redirect()->back()->withErrors(['msg'=>'رمز وارد شده صحیح نیست']);
        }
        $superadmin=0;
        if($access=="superadmin"){
            $superadmin=true;
        }
        DB::update("UPDATE admins SET name='$name', superadmin=$superadmin where username='$lastusername'");
        return redirect('/admin/update/admin')->withErrors(['sec'=>'عملیات با موفقیت انجام شد']);
    }
    public function Admindelete(Request $request){
        $request->validate([
            'username'=>'required|string'
        ]);
        $username=htmlspecialchars($request->input('username'));
        $admin=DB::select("SELECT owner,username,name from admins where username='$username'");
        foreach($admin as $a){
            if(!(Auth::guard('admin')->user()->owner) or $a->owner){
                return redirect()->back()->withErrors(['msg'=>'شما دسترسی ندارید']);
        }
        }
        return view('Admindelete',['admin'=>$admin]);
    }
    public function Adminsdelete(Request $request){
        if($request->input('cancel')=='cancel'){
            return redirect('admin/update/admin');
        }
        $request->validate([
            'username'=>'required|min:4|max:80|string',
            'password'=>'required|min:8|max:80|string',
        ]);
        $username=htmlspecialchars($request->string('username'));
        $password=htmlspecialchars($request->string('password'));
        $passwordnow=Auth::guard('admin')->user()->password;
        if(!hash::check($password,$passwordnow)){
            return redirect()->back()->withErrors(['msg'=>'رمز وارد شده صحیح نیست']);
        }
        DB::delete("DELETE from admins where username='$username'");
        return redirect('/admin/update/admin')->withErrors(['sec'=>'عملیات با موفقیت انجام شد']);
    }
    public function user(Request $request){
        if($request->ajax()){
            $week=[0,0,0,0,0,0,0];
            $data=DB::select("SELECT  WEEKDAY(UPDATE_AT) week ,COUNT(DISTINCT ip) tedad FROM view WHERE UPDATE_AT BETWEEN  CURDATE() -  interval 6 day and now() GROUP BY  WEEKDAY(UPDATE_AT) ORDER BY  WEEKDAY(UPDATE_AT)");
            foreach($data as $d){
                if($d->week<5){
                $week[$d->week+2]=$d->tedad;
                }
                else{
                $week[$d->week-5]=$d->tedad;
                }
            }
            return json_encode($week);
        }
    }
    public function usermonth(Request $request){
        if($request->ajax()){
        $month=[0,0,0,0,0,0,0,0,0,0,0,0];
        $data=DB::select("SELECT  jalali ,  COUNT(DISTINCT ip) tedad FROM view  WHERE UPDATE_AT BETWEEN  now() -  interval 1 year and now() GROUP BY jalali ORDER BY  jalali");
        foreach($data as $d){
            $month[$d->jalali]=$d->tedad;
        }
        return json_encode($month);
    }
    }
    public function topchart(Request $request){
        if($request->ajax()){
            $most_view=DB::select("SELECT text,text1,view FROM input WHERE created_at BETWEEN  CURDATE() -  interval '$request->search' day and now() ORDER by view DESC limit 0,5");
            if($most_view==null){
                $output='<div class="h3" style="color: red; text-align:center;">در این تاریخ آهنگی آپلود نشده!</div>';
                return $output;
            }
            $output='<thead class=" text-primary text-center">
            <tr>
                  <th scope="col" ><p class="white">artist</p></th>
                  <th scope="col" ><p class="white">name</p></th>
                  <th scope="col"><p class="white">view</p></th>
            </tr>
          </thead>
          <tbody>
            <tr>';
              foreach ($most_view as $top){
              $output.='<tr class="text-center">
                  <td scope="row"><p class="white">'.$top->text.'</p></td>
                  <td ><p class="white">'.$top->text1.'</p></td>
                  <th ><p class="white">'.$top->view.'</p></th>
              </tr>';
              }
           $output.='</tr>
          </tbody>';
          return $output;
        }
    }
    public function DashboardSearchauto(Request $request){
        if($request->ajax()){
            $output='';
            if($request->search==''){
                return $output;
            }
            $data=DB::select("SELECT id,name from tags where name like '%$request->search%' limit 0,5");
            $datas=DB::select("SELECT id,text,text1 from input where text1 like '%$request->search%' limit 0,5");
            if(count($data)==0 and count($datas)==0){
                $output='<p class="h3" style="color: red; text-align:center;">موردی پیدا نشد</p>';
                return $output;
            }
            if(count($data)>0 ){
                $output.='<ul class="list-group list-group-flush " style="width: 100%;"><li class="list-group-item list-group-item-action " style="background-color:#0d6efd;color:#ffffff;">نام خواننده</li>';
                foreach($data as $row){
                    $output .='<li class="list-group-item" style="color: #121212;" >'.$row->name.'<a style="text-align:left;" href="/admin/tag/update?id='.$row->id.'"> ویرایش <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" style="text-align:left;" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                  </svg></a><a style="text-align:left;" href="/admin/tag/delete?id='.$row->id.'"> حذف <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                </svg></a></li>';
                }
                $output.='</ul>';
            }
            if(count($datas)>0){
                $output.='<ul class="list-group list-group-flush width"  style="width: 100%;"><li  class="list-group-item list-group-item-action" style="background-color:#0d6efd;color:#ffffff;width: 100%">نام آهنگ</li>';
                foreach($datas as $row){
                    $output .='<li class="list-group-item " style="color: #121212;">'.$row->text1.' از '.$row->text.'<a style="text-align:left;" href="/admin/update?id='.$row->id.'"> ویرایش <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" style="text-align:left;" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                  </svg></a><a style="text-align:left;" href="/admin/delete?id='.$row->id.'"> حذف <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                </svg></a></li>';
                }
                $output.='</ul>';
            }
            return $output;
        }
    }
    public function socialMedia(){
        $social=DB::select("SELECT  * FROM callus ORDER BY id DESC LIMIT 1;");
        foreach ($social as $row){
            $instagram=$row->instagram;
            $phoneNumber=$row->phoneNumber;
            $gmail=$row->gmail;
            $telegram=$row->telegram;
        }
        return view('socialMedia',['gmail'=>$gmail,'phoneNumber'=>$phoneNumber,'instagram'=>$instagram,'telegram'=>$telegram]);
    }
    public function socialMediaPost(Request $request){
        $request->validate([
            'gmail'=>'nullable|email|regex:/.com$/',
            'call'=>'nullable|string|min:11|max:11|regex:/(09)[0-9]{9}/',
            'instagram'=>'nullable|string|max:40',
            'telegram'=>'nullable|string|max:40'
        ],
        [
            'gmail'=>'ایمیل وارد شده نامعتبر است.',
            'call'=>'شماره وارد شده نامعتبر است.',
            'instagram.max'=>'آدرس پیج وارد شده بیشتر از 40 کاراکتر است.',
            'instagram.string'=>'آدرس پیج نامعتبر است.',
            'telegram.max'=>'آدرس پیج وارد شده بیشتر از 40 کاراکتر است.',
            'telegram.string'=>'آدرس پیج نامعتبر است.'
        ]);
        $instagram=$request->string('instagram');
        $telegram=$request->string('telegram');
        $call=$request->string('call');
        $gmail=$request->string('gmail');
        DB::insert("INSERT INTO callus(instagram,phoneNumber,gmail,telegram) VALUES('$instagram','$call','$gmail','$telegram') ");

        return redirect('/admin/socialMedia')->withErrors(['sec'=>'عملیات با موفقیت انجام شد']);
    }
    public function logout(Request $request)
    {
        $this->guard('admin')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('admin/login');
    }
    public function answer(Request $request){
        $request->validate([
            'id'=>'required|numeric'
        ]);
        $id=htmlspecialchars($request->input('id'));
        $message=DB::select("SELECT message, name,email  FROM message WHERE id=$id");
        DB::update("UPDATE message SET read_message=1 where id=$id");
        return view('answer',['message'=>$message]);
    }
    public function answeremail(Request $request){
        $request->validate([
            'answer'=>'required|string'
        ]);
        $answer=htmlspecialchars($request->string('answer'));
        Mail::raw($answer, function ($message) {
            $message->to('meysam.kh.0914@gmail.com')
                    ->subject('پاسخ پرشین تاپ موزیک');
        });
        return redirect()->back()->withErrors(['msg'=>'پاسخ شما ارسال شد']);
    }
    public function message(){
        $message=DB::select("SELECT message, name ,id, read_message,CHAR_LENGTH(message) AS tedad  FROM message order by id desc");
        return view('message',["message"=>$message]);
    }

}

