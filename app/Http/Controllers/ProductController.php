<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
// use Intervention\Image\Facades\Image;
// use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
            // 'id_category' => 'required|exists:categories,id_category',
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
            $product->nama_produk  = $data['name'];
            // $product->id_category = $data['id_category'];
            // $product->description = $data['description'];
            $product->harga = $data['price'];
            $product->stok = $data['stock'];
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
        try {
            $product = Product::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('product.index')->with('error_message_not_found', 'Data Produk tidak ditemukan');
        }
        $data = $request->all();

        $rules = [
            'name' => 'required',
            // 'id_category' => 'required|exists:categories,id_category',
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

        // update product photo
        // if ($request->hasFile('photo')) {
        //     $img_tmp = $request->file('photo');
        //     if ($img_tmp->isValid()) {
        //         // Get image extension
        //         $extension = $img_tmp->getClientOriginalExtension();
        //         // Generate new image name
        //         $imageName = rand(111, 99999) . '.' . $extension;
        //         $imagePath = 'store/photo/' . $imageName;
        //         // Upload image
        //         Image::make($img_tmp)->save(public_path($imagePath));

        //         // Delete old image if it exists
        //         if ($product->photo && File::exists('store/photo/' . $product->photo)) {
        //             File::delete('store/photo/' . $product->photo);
        //         }

        //         // Save the new image name to the database
        //         $product->photo = $imageName;
        //     }
        // }

        try {
            $product->nama_produk  = $data['name'];
            // $product->id_category = $data['id_category'];
            // $product->description = $data['description'];
            $product->harga = $data['price'];
            $product->stok = $data['stock'];
            // if (isset($imageName)) {
            //     // Save the image name only if an image was uploaded
            //     $product->photo = $imageName;
            // }
            $product->save();

            Session::flash('success_message_create', 'Data Produk berhasil diperbarui');
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return redirect()->route('product.index')->with('success_message_delete', 'Data produk berhasil dihapus');
        } catch (QueryException $e) {
            // Periksa apakah pengecualian disebabkan oleh  foreign key constraint violation
            if ($e->getCode() === '23000') {
                // Foreign key constraint violation message
                $errorMessage = "Tidak dapat menghapus Data produk karena terdapat data produk terkait di data lain.";
            } else {
                // query exception messages lainnya
                $errorMessage = "Terjadi kesalahan dalam menghapus Data produk.";
            }

            return redirect()->route('product.index')->with('error_message_delete', $errorMessage);
        } catch (ModelNotFoundException $e) {
            // jika id Guru tidak ditemukan redirect error message
            return redirect()->route('product.index')->with('error_message_not_found', 'Data produk tidak ditemukan');
        }
    }
}
