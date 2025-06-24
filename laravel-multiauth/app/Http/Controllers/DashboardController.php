<?php


namespace App\Http\Controllers;

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\UrlShortenerService;
use App\Models\Urls;
use Mpdf\Mpdf;


class DashboardController extends Controller
{
	protected $urlService;
	public function __construct(UrlShortenerService $urlService)
    {
        $this->urlService = $urlService;
    }
	
    public function index()
    {	 
		$id = auth()->user()->id;
		$role = auth()->user()->role;
		
		if($role=='superadmin'){
			$urls = DB::table('urls')->orderby('shorturl','DESC')->paginate(10);	
		}else{
			$urls = DB::table('urls')->where(['user_id'=>$id,'role'=>$role])->orderby('shorturl','DESC')->paginate(10);	
		} 
		
		$invited_users = auth()->user()->invited_users;
		$invited_users = explode(',',$invited_users);
		$members = DB::table('users')->whereIn('id',$invited_users)->orderby('name','ASC')->paginate(10);	
		
        return view('dashboard',['urls'=>$urls,'role'=>$role,'members'=>$members]);
    }
	
	function create(Request $request){	
		if(auth()->user()->role !='superadmin'){
			return view('add_url');	
		}else{
			return redirect('/dashboard')->with('error','You can not access this page');
		}
			
	}
	
	function invite(Request $request){	
		if(auth()->user()->role =='admin' || auth()->user()->role =='superadmin'){
			return view('add_invite');	
		}else{
			return redirect('/dashboard')->with('error_invite','You can not access this page');
		}
			
	}
	
	function generate_pdf(){
	$id = auth()->user()->id;
	$role = auth()->user()->role;
	
	if($role=='superadmin'){
			$urls = Urls::get();
	}else{
		$urls = Urls::where(['user_id'=>$id,'role'=>$role])->get();
	} 
	
	$html = view('sample-pdf-view',['urls'=>$urls]); 		
	$mpdf =new \Mpdf\Mpdf(['default_font' => 'A_Nefel_Botan']);		
	$mpdf->WriteHTML($html);   
	$mpdf->Output("url_" . date("ymd") . ".pdf", 'I');
	exit;
	}
	
	function store(Request $req){			
		$id = auth()->user()->id;
		$role = auth()->user()->role;
		$this->validate($req,[
		'longurl' => 'required|url'			
		]);
		
		$shortUrl = $this->urlService->generate($req->longurl);		
		$data=['user_id'=>$id,'role'=>$role,'longurl'=>$req->longurl,'shorturl'=>$shortUrl];
		$Urls=Urls::insert($data);
		return redirect('/dashboard')->with('success','Added successfully');
	}
	
	function store_invite(Request $req){			
		$id = auth()->user()->id;		
		$invited_users = auth()->user()->invited_users;
		$invited_users = explode(',',$invited_users);		
	
		$this->validate($req,[
		'name' => 'required',		
		'email' => 'required|email',
		'role' => 'required',		
		]);	
		
		$exist=DB::table('users')->select('id')->where('email',$req->email)->first();		
		
		if(empty($exist->id)){
			$data=['name'=>$req->name,'email'=>$req->email,'role'=>$req->role,'invited_users'=>'','password' => bcrypt('123456')];
			
			$insertedId = DB::table('users')->insertGetId($data);
			$invited_users[] = $insertedId;	
			$invited_users =implode(',', $invited_users);
			$data=['invited_users'=>$invited_users];
			DB::table('users')->where('id',$id)->update($data);
		
		}else{
			
			if (!in_array($exist->id, $invited_users)) {
				$invited_users[] = $exist->id;
			}
			$invited_users =implode(',', $invited_users);
			$data=['invited_users'=>$invited_users];
			DB::table('users')->where('id',$id)->update($data);
		}
		
		
		return redirect('/dashboard')->with('success_invitation','Invitation sent successfully');
	}
	
	public function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect('/login');
	}
	
}
