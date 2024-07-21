<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin';
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
        return view('LoginAdmin');
    }
    public function username() :string
    {

        return 'username';
    }
    public function index(){
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
           $cpu_darsad = round(floatval($cpu_load),0);
           $memory_darsad = round(floatval($memory_usage),0);
           $disk_darsad = round(floatval($disk_usage),0);
            $wmi=null;
            $user=DB::select("SELECT DISTINCT ip  from view");
            $user=count($user);
            $most_view=DB::select("SELECT text,text1,view FROM input ORDER by view DESC limit 0,5");
            return view('paneladmin',['view'=>$view,'cpu_load'=>$cpu_darsad,'memory_usage'=>$memory_darsad,'disk_usage'=>$disk_darsad,'user'=>$user,'most_view'=>$most_view]);
    }
    public function logout(Request $request)
    {
        $this->guard('admin')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('admin/login');
    }

}

