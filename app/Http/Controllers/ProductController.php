<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
// use Intervention\Image\Facades\Image;
// use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('pages.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'name' => 'required',
            'id_category' => 'required|exists:categories,id_category',
            // 'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            // 'photo' => 'image|mimes:jpeg,png,jpg,gif',
        ];

        $customMessages = [
            'name.required' => 'Nama Produk tidak boleh kosong!!!',
            // 'id_category.required' => 'Silakan pilih kategori.',
            // 'id_category.exists' => 'Kategori yang dipilih tidak ada.',
            // 'description.required' => 'Deskripsi produk tidak boleh kosong!!!',
            'price.required' => 'Harga produk tidak boleh kosong!!!',
            'price.numeric' => 'Harga produk tidak sesuai format (harus berupa angka)!!!',
            'stock.required' => 'Stok produk tidak boleh kosong!!!',
            'stock.numeric' => 'Stok produk tidak sesuai format (harus berupa angka)!!!',
            // 'photo.image' => 'Photo harus berupa gambar.',
            // 'photo.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan file dengan ekstensi jpeg, png, jpg, dan gif.',
        ];

        $this->validate($request, $rules, $customMessages);

        // // upload staff profile photo
        // if ($request->hasFile('photo')) {
        //     $img_tmp = $request->file('photo');
        //     if ($img_tmp->isValid()) {
        //         // get image extension
        //         $extension = $img_tmp->getClientOriginalExtension();
        //         // generate new image name
        //         $imageName = rand(111, 99999) . '.' . $extension;
        //         $imagePath = 'store/photo/' . $imageName;
        //         // upload image
        //         Image::make($img_tmp)->save(public_path($imagePath));
        //     }
        // }

        $data = $request->all();
        try {
            $product = new Product();
            $product->name  = $data['nama_produk'];
            // $product->id_category = $data['id_category'];
            // $product->description = $data['description'];
            $product->price = $data['harga'];
            $product->stock = $data['stok'];
            // if (isset($imageName)) {
            //     // Save the image name only if an image was uploaded
            //     $product->photo = $imageName;
            // };
            $product->save();

            Session::flash('success_message_create', 'Data Produk berhasil disimpan');
            return redirect()->route('product.index');
        } catch (QueryException $e) {
            // Handle the integrity constraint violation exception (duplicate entry)
            if ($e->getCode() === 23000) {
                // Duplicate entry error
                $errorMessage = 'Upppss Terjadi Kesalahan. Silahkan Ulangi Lagi.';
            } else {
                // Other database-related errors
                $errorMessage = 'Upppss Terjadi Kesalahan. Silahkan Ulangi Lagi.';
            }

            return redirect()->back()->withInput()->withErrors([$errorMessage]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
