<?php 
namespace App\Http\Controllers;
use App\Transaction;
use Illuminate\Http\Request;
use App\Site;
use App\Client;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller{



	
	public function getTransaction()
	{
		$transactions = Transaction::orderBy('created_at', 'desc')->get();
		return view('transaction', ['transactions'=>$transactions]);
	}

	public function postTransaction(Request $request)
	{
		
		$this->validate($request, [
			'site_name'=>'required',
			'client_name'=>'required',
			'event'=>'required',
			'start_date'=>'required',
			'duration'=>'required',
			'comment'=>'required'
			]);

		$user = Auth::user();
		$site = Site::where('site_name', $request['site_name'])->first();
		$client = Client::where('client_name', $request['client_name'])->first();
		$transaction = new Transaction();
		//dd($transaction->id);
		$transaction->site_id = $site->id;
		$transaction->client_id = $client->id;
		$transaction->site_name = $request['site_name'];
		$transaction->client_name = $request['client_name'];
		$transaction->event = $request['event'];
		$transaction->start_date = $request['start_date'];
		$transaction->duration = $request['duration'];
		$transaction->comment = $request['comment'];
		$transaction->user_id = $user->id;
		$message="Successfully entered";
		$transaction->save();

		return redirect()->route('transaction');

	}

}