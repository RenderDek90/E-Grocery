<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function setLocale()
    {
        App::setLocale(Session::get('locale'));
    }

    public function loginPage(){
        $this->setLocale();
        $account = Account::all();
        return view('login', ['account' => $account]);
    }

    public function login(Request $req){
        $credentials = [
            'email' =>$req->email,
            'password' => $req->password
        ];

        if ($req->remember) {
            Cookie::queue('mycookie', $req->email, 5);
        }
        if (Auth::attempt($credentials, true)) {
            Session::put('Session', $credentials);
            return redirect('/home' . '/' . Auth::user()->role_id);
        }

        return redirect('/login')->with('message', 'Email or Password is incorrect');
    }

    public function registerPage(){

        $this->setLocale();
        $gender = Gender::all();
        $roles = Role::all();
        return view('register', ['gender' => $gender, 'roles' => $roles]);
    }

    public function addAccount(Request $req){

        $val =$req->validate([
            'first_name' => 'required|max:25|string',
            'last_name' => 'required|max:25|string',
            'gender' => 'required',
            'roles' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
            'email' => 'required|email|unique:accounts,email',
            'password' => 'required|min:8|regex:/[0-9]/|confirmed'
        ]);

        $extension = $req->image->getClientOriginalExtension();
        $fileName = $req->name . '.' . $extension;
        $req->image->move('storage/images', $fileName);

        if($val['gender'] == 'Male'){
            $value_gender = 1;
        }else{
            $value_gender = 2;
        }


        if($val['roles'] == 'User'){
            $value_role = 1;
        }else{
            $value_role = 2;
        }

        $account = new Account();
        $account->first_name = $val['first_name'];
        $account->last_name = $val['last_name'];
        $account->gender_id= $value_gender;
        $account->role_id = $value_role;
        $account->display_picture_link = $fileName;
        $account->email = $val['email'];
        $account->password = bcrypt($val['password']);
        $account->save();

        return redirect('login')->with('status', 'Registered Successfully');
    }

    public function logout(){

        $this->setLocale();
        Auth::logout();
        return redirect('/');
    }

    public function profilePage($id)
    {
        $this->setLocale();
        $account = Account::find($id);
        $gender = Gender::all();
        return view('profile', ['account' => $account, 'gender'=>$gender]);
    }

    public function editProfile(Request $req, Account $account)
    {
        $user = Account::where('id', Auth::id())->first();

        $val =$req->validate([
            'first_name' => 'required|max:25|string',
            'last_name' => 'required|max:25|string',
            'gender' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
            'email' => 'required|email|unique:accounts,email',
            'password' => 'required|min:8|regex:/[0-9]/|confirmed'
        ]);

        $extension = $req->image->getClientOriginalExtension();
        $fileName = $req->name . '.' . $extension;
        $req->image->move('storage/images', $fileName);

        if($val['gender'] == 'Male'){
            $value_gender = 1;
        }else{
            $value_gender = 2;
        }

        $user->first_name = $val['first_name'];
        $user->last_name = $val['last_name'];
        $user->gender_id= $value_gender;
        $user->display_picture_link = $fileName;
        $user->email = $val['email'];
        $user->password = bcrypt($val['password']);
        $user->updated_at = Carbon::now();
        $user->save();

        return redirect('/profile' . '/' . Auth::id())->with("status", "Successfully change data!");
    }


    public function index(){
        $this->setLocale();
        return view('index');
    }

    public function viewAccount(){
        $this->setLocale();
        $account = Account::all();

        // dump($account);
        return view('account_maintenance', ['account' => $account]);
    }

    public function updateRolePage( $id){

        $this->setLocale();

        $account = Account::find($id);
        $roles = Role::all();
        return view('update_role', [
            'item' => $account,
            'roles' => $roles
        ]);
    }

    public function updateRole(Request $req, $id){
        $roles = $req->roles;
        $found = Role::where('role_name' , $roles)->first();
        // dump($found->id);

        Account::where('id', $id)->update(
            [
                'role_id' => $found->id
            ]
        );

        // dump($account);
        return redirect('account-maintenance')->with('status', 'Changed Role Successfully!');
    }

    public function delAccount($id){
        Account::where('id', $id)->delete();

        return redirect('account-maintenance')->with('status','Delete Role Successfully!');
    }

}
