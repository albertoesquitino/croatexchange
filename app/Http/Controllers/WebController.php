<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buy;
use App\Sell;

class WebController extends Controller
{
    public function index(){
      $buys = Buy::orderBy('id', 'ASC')->paginate(20);
      $sells = Sell::orderBy('id', 'ASC')->paginate(20);
      return view('welcome')->with('buys', $buys)->with('sells', $sells);
    }

    public function buystore(Request $request){
      $order = new Buy($request->all());
      $order->save();

      return redirect('/')->with('status', 'Orden de compra registrada correctamente.');
    }
    public function sellstore(Request $request){
      $order = new Sell($request->all());
      $order->save();

      return redirect('/')->with('status', 'Orden de venta registrada correctamente.');
    }
}
