<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

	public function getDashboard()
	{
		return view('dashboard');
	}

	public function postRegister(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:120',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:4',
			'confirm_password' =>'required'

			]);
		$name = $request['name'];
		$email = $request['email'];
		$password = bcrypt($request['password']);

		$user = new User();
		$user->name = $name;
		$user->email = $email;
		$user->password = $password;
        $message="There was an error";

		if($user->save()){

		}
		Auth::login($user);

		return redirect()->route('dashboard');
	}

	public function postLogin(Request $request)
	{
		$this->validate($request, [

			'email' => 'required|email',
			'password' => 'required|min:4'


			]);
		if(Auth::attempt(['email' => $request['email'], 'password'=> $request['password']])){
			return redirect()->route('dashboard');
		}
		return redirect()->back();
	}

	public function getLogout(){
		Auth::logout();
		return redirect()->route('home');
	}

	public function getUserProfile()
    {
        return view ('userprofile',['user'=> Auth::user()]);
    }

    public function postSaveAccount(Request $request)
    {
        $this-> validate($request,[
           'name'=> 'required|max:120'

        ]);
        $user = Auth::user();
        $user->name = $request['name'];

        $user->update();
        $file = $request->file('image');
        $filename = $request['name']. '-'.$user->id .'.jpg';
        if($file){
            Storage::disk('local')->put($filename,File::get($file));
        }
        return redirect()->route('userprofile');
    }

    public function getProfileImage($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response($file,500);
    }

}
