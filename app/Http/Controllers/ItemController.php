<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Item;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{

    public function setLocale()
    {
        App::setLocale(Session::get('locale'));
    }

    public function viewDetail($id){
        $this->setLocale();
        $item = Item::find($id);

        return view('detail', ['items' => $item]);
    }

    public function buyItem($id){

        //check active order
        // $active = Order::where('account_id', Auth::id());
        // $test = $id->price;
        // dump($id);
        $item_id = json_decode($id, true);
        $item = Item::find($item_id);

        $buy_item = [
            'account_id' => Auth::id(),
            'item_id' => $item->id,
            'price' => $item->price,
            'created_at' => Carbon::now()
        ];

        $new_cart = new Order($buy_item);
        $new_cart->save();

        return redirect('cart/' . Auth::id())->with('status', 'Item to Cart Successfully!');
    }

    public function homePage($id){
        $this->setLocale();
        $account= Account::find($id);
        $item = Item::simplePaginate(10);

        return view('home' , ['account' => $account, 'item'=> $item]);
    }

}
