<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\shops;
use App\products;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    // shop /////////////////

    //ショップ一覧
    public function shop_all()
    {
        $allshop = shops::get();

        return view('shop_all',compact('allshop'));
    }

    public function shop_reg()
    {
        $user = \Auth::user();
        return view('shop_reg',compact('user'));

    }


    //  ショップ登録
    public function shops(Request $request)
    {
        $data = $request->all();


        $shop_id = shops::insertGetId([

             'user_id' => $data['user_id'],
             'name' => $data['name'],
             'description' => $data['description'],
        ]);

        return redirect()->route('shop_all');
    }



    //ショップ編集画面
    public function shop_alt($id)
    {
        $user = \Auth::user();
        $shop = shops::where('id', $id)->first();


        return view('shop_alt',compact('shop','user','id'));
    }


    //ショップ編集
    public function shop_update(Request $request)
    {
        $data = $request->all();
        $shop = shops::where('id', $data['id'])->first();
        $shop->fill([
        'name' => $data['new_name'],
        'description' => $data['new_description'],
        ]);
        $shop->save();
        return redirect()->route('shop_all');
    }

    //ショップ削除
    public function shop_delete(Request $request)
    {
        $data = $request->all();
        $shop = shops::where('id', $data['id'])->first();

        $shop->delete();

        return redirect()->route('shop_all');
    }

    //オーナーショップ一覧
    public function shop_owner()
    {

        $user = \Auth::user();
        $allshop = null;
        $allshop = shops::where('user_id', $user['id'])->get();
        return view('shop_owner',compact('allshop','user'));
    }



    ///////////////////// products /////////////////////////

    //商品一覧
    public function product_all($id){
        //オーナー判定
        $user = \Auth::user();
        $owner = null;
        $shop_owner = shops::where('id', $id)->first();
        if($user['id']=$shop_owner['user_id']){
            $owner = 1;
        }
        $products = products::where('shop_id', $id)->get();
        return view('product_all',compact('products','owner','id'));

    }

    //商品詳細
    public function product_detail($id)
    {

        $data = products::where('id', $id)->get();
        $product = $data[0];
        //オーナー判定
        $user = \Auth::user();
        $shop_owner = shops::where('id', $product['shop_id'])->first();
        if($user['id']=$shop_owner['user_id']){
            $owner = 1;
        }

        return view('product_detail',compact('product','owner','id'));

    }

    //商品登録画面
    public function product_reg($id)
    {
        $user = \Auth::user();
        $shop = shops::where('id', $id)->first();


        return view('product_reg',compact('user','shop'));

    }

    //商品編集画面
    public function product_alt($id)
    {
        $user = \Auth::user();
        $product = products::where('id', $id)->first();
        return view('product_alt',compact('product','user','id'));
    }


    //商品登録
    public function products(Request $request)
    {
        $data = $request->all();


        $product_id = products::insertGetId([

             'shop_id' => $data['shop_id'],
             'name' => $data['name'],
             'description' => $data['description'],
             'price' => $data['price'],
             'stock' => $data['stock'],
        ]);

        return redirect()->route('shop_all');

    }


    //商品編集
    public function product_update(Request $request)
    {
        $data = $request->all();
        $product = products::where('id', $data['id'])->first();
        $product->fill([
        'name' => $data['new_name'],
        'description' => $data['new_description'],
        'price' => $data['new_price'],
        'stock' => $data['new_stock'],
        ]);
        $product->save();
        return redirect()->route('shop_all');
    }

    //商品購入
    public function product_buy(Request $request)
    {
        $data = $request->all();
        $product = products::where('id', $data['id'])->first();
        $id = $product['id'];
        $new_stock = $product['stock']-'1';
        $product->stock = $new_stock;
        $product->save();
        return redirect()->route('product_detail',compact('id'));
    }

    //商品削除
    public function product_delete(Request $request)
    {

        $data = $request->all();
        $product = products::where('id', $data['id'])->first();
        $product->delete();

        return redirect()->route('shop_all');
    }

    //商品csv
    public function product_csv($id)
    {
        $product = products::where('id', $id)->first();
        $stream = fopen('php://temp', 'w');
        $arr = array('id', 'shop_id','商品名','説明','値段','在庫');
        fputcsv($stream, $arr);
         $arrInfo = array(
            'id' => $product->id,
            'shop_id' => $product->shop_id,
            '商品名' => $product->name,
            '説明' => $product->description,
            '値段' => $product->price,
            '在庫' => $product->stock
         );

        fputcsv($stream, $arrInfo);
        rewind($stream);
        $csv = stream_get_contents($stream, -1, 0);
        $csv = mb_convert_encoding($csv, 'sjis-win', 'UTF-8');
        fclose($stream);
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=test.csv'
        );
        return Response::make($csv, 200, $headers);
    }
}
