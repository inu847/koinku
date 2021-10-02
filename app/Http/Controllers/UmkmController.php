<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    public function dashboard()
    {
        return view('umkm.index');
    }

    public function todoSetting()
    {
        $user = Auth::guard('user')->user();
        // dd($user);
        return view('umkm.account', ['user' => $user]);
    }

    public function setting(Request $request)
    {
        $user = User::findOrFail(Auth::guard('user')->user()->id);
        $user->name = $request->get('username');
        $user->tanggal_lahir = $request->get('tanggal_lahir');
        // $user->profil = $request->get('profil');
        $user->save();

        $alamat = new Alamat;
        $alamat->provinsi = $request->get('provinsi');
        $alamat->kabupaten = $request->get('kabupaten');
        $alamat->kecamatan = $request->get('kecamatan');
        $alamat->desa = $request->get('desa');
        $alamat->lain = $request->get('lain');
        $alamat->user_id = Auth::guard('user')->user()->id;
        $alamat->save();

        return redirect()->back()->with('status', 'Perubahan akun berhasil!!');
    }

    public function gotoProduct()
    {
        $products = Auth::guard('user')->user()->product;

        return view('umkm.product', ['products' => $products]);
    }

    public function gotoProductStore()
    {
        return view('umkm.createProduct');
    }

    public function productStore(Request $request)
    {
        \Validator::make($request->all(), [
            'nama_product' => 'required', 'string', 'max:255', 'min:2',
            'deskripsi' => 'required', 'string', 'max:255', 'min:8',
            'qty' => 'required', 'max:1000',
            // 'images' => 'file|image|mimes:jpeg,png,jpg',
            'images' => 'required', 'string', 'max:500', 'min:8',
            'vidio' => 'required', 'string', 'max:500', 'min:8',
            'price' => 'required', 'max:20',
        ])->validate();
        
        $new_product = new Product();
        $new_product->nama_product = $request->get('nama_product');
        $new_product->deskripsi = $request->get('deskripsi');
        $new_product->qty = $request->get('qty');
        // if($request->file('images')){
        //     $file = $request->file('images')->store('product_images', 'public');
        //     $new_product->images = $file;
        // }
        $new_product->images = json_encode($request->get('images'));
        $new_product->vidio = json_encode($request->get('vidio'));
        $new_product->price = $request->get('price');
        $new_product->status = "publish";
        $new_product->user_id = Auth::guard('user')->user()->id;
        $new_product->save();
        return redirect()->route('manage-product.index')->with('status', 'Create Product Success!!');
    }

    public function gotoProductShow($id)
    {
        $prod = Product::where('user_id', Auth::guard('user')->user()->product)->where('id', $id);
        if ($prod) {
            $product = Product::findOrFail($id);
            return view('umkm.showProduct', ['product' => $product]);
        }
    }
    
    public function gotoProductEdit($id)
    {
        $prod = Product::where('user_id', Auth::guard('user')->user()->product)->where('id', $id);
        if ($prod) {
            $product = Product::findOrFail($id);
            return view('umkm.editProduct', ['product' => $product]);
        }
    }

    public function gotoProductUpdate(Request $request, $id)
    {
        \Validator::make($request->all(), [
            'nama_product' => 'required', 'string', 'max:255', 'min:2',
            'deskripsi' => 'required', 'string', 'max:255', 'min:8',
            'stok' => 'required', 'max:1000',
            'images' => 'file|image|mimes:jpeg,png,jpg',
            'price' => 'required', 'max:20',
        ])->validate();
        
        $edit_product = Product::findOrFail($id);
        $edit_product->nama_product = $request->get('nama_product');
        $edit_product->deskripsi = $request->get('deskripsi');
        $edit_product->stok = $request->get('stok');
        if($request->file('images')){
            if($edit_product->images && file_exists(storage_path('app/public/' . $edit_product->images))){
                \Storage::delete('public/'.$edit_product->images);
                $file = $request->file('images')->store('product_images', 'public');
                $edit_product->images = $file;
            }else{
                if($request->file('images')){
                    $file = $request->file('images')->store('product_images', 'public');
                    $edit_product->images = $file;
                }
            }
        }
        $edit_product->price = $request->get('price');
        
        if($request->get('status')){
            $edit_product->status = $request->get('status');
        }else{
            $edit_product->status = "publish";
        }

        $edit_product->user_id = Auth::guard('user')->user()->id;
        $edit_product->save();

        return redirect()->route('manage-product.index')->with('status', 'Update Product Success!!');
    }
    
    public function gotoProductDestroy($id)
    {
        $prod = Product::where('user_id', Auth::guard('user')->user()->product)->where('id', $id);
        if ($prod) {
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->back()->with('statusdel', 'Product berhasil dihapus!!');
        }       

    }

}
