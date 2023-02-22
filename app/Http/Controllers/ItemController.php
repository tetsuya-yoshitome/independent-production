<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Item;

class ItemController extends Controller
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
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();
        
        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'type' => 'required|numeric|between:1,9',
                'price' => 'required|numeric',
                'detail' => 'required',
                'sell' => 'required',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'price' =>$request->price,
                'detail' => $request->detail,
                'sell'=> $request->sell,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    
    }
        /**
     * 商品編集画面
     *
     * @param Request $request
     * @param [type] $id
     * @return view
     */
    public function edit(Request $request, $item_e)
    {
        $item_edit=Item::where('id',$item_e)->get();
        return view('item.edit',['item_edit'=>$item_edit]);
    }

    public function update(Request $request,$item_e)
    {
        if ($request->has('button1')) {

            $validate_rule=[
                'name' => 'required',
                'type' => 'required|numeric|between:1,9',
                'price' => 'required|numeric',
                'detail' => 'required',
                'sell' => 'required',
            ];
            $this->validate($request, $validate_rule);
            $items=Item::where('id',$item_e)->first();
            $items->name = $request->name;
            $items->type = $request->type;
            $items->price = $request->price;
            $items->detail = $request->detail;
            $items->sell = $request->sell;
            $items->save();
            return redirect('/items');

        } elseif ($request->has('button2')) {
            
            item::where('id',$item_e)->delete();
            return redirect('/items');
        } 
    }
}
