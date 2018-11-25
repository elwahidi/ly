<?php

namespace App\Http\Controllers\Store;

use App\Notifications\ProductNotification;
use App\Product;
use App\Product_img;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $products = auth()->user()->member->company->products;
        //$products = Product::where('id',5000)->get();
        return view('store.product.index',compact('products'));
    }

    public function create()
    {
        return view('store.product.create');
    }

    public function store(Request $request)
    {

        $data = $this->validate(request(),[
            'name'=>'required|max:191',
            'ref'=>'required|string|min:3|max:191',
            'tva'=>['required','integer',Rule::in(['0', '7', '10','14','20'])],
            'size'=>'nullable|min:5|max:25',
            'description'=>'nullable|string|min:10',

        ]);
        if($product = auth()->user()->member->company->products()->create($data)){
            $product->slug = str_slug(request()->name . ' ' .$product->id, '-');
            $product->save();
            if(request()->img){

                foreach (request()->img as $file){
                    $product->imgs()->create([
                        'img'   => $file->store('store/products')
                    ]);
                }

            }
        }
        $status = session()->flash('status',__('pages.product.add_success'));
        return redirect('Product/'.$product->id)->with($status);
    }

    public function show($id)
    {
        $product = Product::findOrfail($id);
        $notifiable = User::all();
        //Notification::send($notifiable,new ProductNotification($product));
        return view('store.product.show',compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('store.product.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {

        $data = $this->validate(request(),[
            'name'=>'required|max:191',
            'ref'=>'required|string|min:3|max:191',
            'tva'=>['required','integer',Rule::in(['0', '7', '10','14','20'])],
            'size'=>'nullable|min:5|max:25',
            'description'=>'nullable|string|min:10',
            //'img'=>'mimes:jpeg,bmp,png,jpg',// apres je vais le gerer ok
        ]);
        $product = Product::findOrFail($id);
        $data["slug"] = str_slug(request()->name . ' ' .$product->id, '-');
        if($product->update($data)){
            if(request()->img){
               //dd(request()->img);
                foreach (request()->img as $file){
                    $product->imgs()->create([
                        'img'   => $file->store('store/products')
                    ]);
                }
            }
        }
        $status = session()->flash('status',__('pages.product.update_success'));
        return redirect('Product/'.$product->id)->with($status);
    }

    public function destroy($id)
    {
        $status = session()->flash('status',__('pages.product.delete_success'));
        $product = Product::findOrFail($id);

        if($product->delete()){
            if(isset($product->imgs)){
                foreach ($product->imgs as $file){
                    if(file_exists('storage/'.$file->img)){
                        @unlink('storage/'.$file->img);
                    }
                    $file->delete();
                }
            }
            $products = auth()->user()->member->company->products;
            return redirect('/Product')->with([$status,$products]);
        }
        else{
            abort(404);
        }
    }

    public function destroyImg($img)
    {
        $product_img = Product_img::findOrFail($img);
        if(file_exists('storage/'.$product_img->img)){
            @unlink('storage/'.$product_img->img);
        }
        $product_img->delete();
        return redirect()->back();
    }
}
