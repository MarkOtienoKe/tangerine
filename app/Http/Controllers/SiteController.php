<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Site;
class SiteController extends Controller{
	public function getDashboard()
	{
		$sites = Site::orderBy('created_at', 'desc')->
get();
		return view('dashboard', ['sites'=>$sites]);
	}
	
	public function getMap(){

		$sites = Site::all();

echo $sites;

	}
	public function getViewSites()
	{
		$sites = Site::orderBy('created_at', 'desc')->get();
		return view('viewsites', ['sites'=>$sites]);
	}
	public function postAddSite(Request $request)
	{
		
		$this->validate($request, [
			'site_name' => 'required',
			'landmark' => 'required',
			'latitude' => 'required',
			'longitude' => 'required',
			'size' =>'required',
			'price' =>'required',
			'status' =>'required'
			
			]);
		$site = new Site();
		$site->site_name = $request['site_name'];
		$site->landmark = $request['landmark'];
		$site->latitude = $request['latitude'];
		$site->longitude = $request['longitude'];
		$site->size = $request['size'];
		$site->price = $request['price'];
		$site->status = $request['status'];
		
		
		$message="Successfully entered";
		$site->save();
		
		return redirect()->route('dashboard');
	}
	public function getDeleteSite($site_id)
	{
		$site = Site::where('id', $site_id)->first();
		
		$site->delete();
		return Redirect()->route('dashboard')->with(['message'=>'Successfully deleted']);
	}
	
	public function siteEditSite (Request $request){
		
		$site = Site::find($request['siteId']);
		$site->site_name = $request['site_name'];
		$site->landmark = $request['landmark'];
		$site->latitude = $request['latitude'];
		$site->longitude = $request['longitude'];
		$site->size = $request['size'];
		$site->price = $request['price'];
		$site->status = $request['status'];

		$site->update();

		dd($site);
		

		
		return redirect()->route('dashboard');


	}
}