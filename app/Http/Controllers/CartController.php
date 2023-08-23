<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Order;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function setLocale(){
        App::setLocale(Session::get('locale'));
    }

    public function viewCart(){

        $this->setLocale();
        // $order= Order::where('account_id', Auth::id());
        $account = Auth::id();
        $orders= Order::all()->where('account_id', $account);

        // $orders = Order::with('Items')->get();

        return view('cart', ['orders' => $orders]);
    }

    public function deleteCart($id){
        // $this->setLocale();

        Order::where('id', $id)->delete();

        return redirect('cart' . '/' . Auth::id())->with('status', 'Delete Successfully!');

    }

    public function checkout($id){

        $this->setLocale();
        Order::where('account_id', $id)->delete();
        $account = Account::find($id);

        return view('success', ['account' => $account]);
    }

    public function checkoutPage(){
        $this->setLocale();
        Order::where('account_id', Auth::id())->delete();
        $account = Account::find(Auth::id());

        return view('success', ['account' => $account]);
    }
}
