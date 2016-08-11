<?php 
namespace App\Http\Controllers;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller{
	
	public function getClient()
	{
		$clients = Client::orderBy('created_at', 'desc')->get();
		return view('addclient', ['clients'=>$clients]);
	}

	public function postAddClient(Request $request)
	{
		
		$this->validate($request, [
			'client_name'=>'required',
			'email'=>'required|email|unique:users',
			'phone_no'=> 'required|min:11|numeric',
		
			]);
		
		$user = Auth::user();
		$client = new Client();
		$client->client_name = $request['client_name'];
		$client->email = $request['email'];
		$client->phone_no = $request['phone_no'];
		$client->user_id = $user->id;
		
		$message="Successfully entered";
		$client->save();

		
		return redirect()->route('addclient');

	}
	public function postEditClient(Request $request){
		
		$client = Client::find($request['clientId']);
		$client->client_name = $request['client_name'];
		$client->email = $request['email'];
		$client->phone_no = $request['phone_no'];
		
		$client->update();

		
		

		
		return redirect()->route('addclient');


	}

}