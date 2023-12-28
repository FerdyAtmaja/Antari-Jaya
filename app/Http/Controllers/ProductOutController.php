<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\ProductOut;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productOut = ProductOut::paginate(10);
        $product = Product::all();
        return view('pages.productOut.index', compact('productOut' , 'product'));
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
            'id_produk' => 'required|exists:produk,id_produk',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ];

        $customMessages = [
            'id_produk.required' => 'Silakan pilih produk.',
            'id_produk.exists' => 'Produk yang dipilih tidak ada.',
            'qty.required' => 'Jumlah keluar tidak boleh kosong!!!',
            'qty.numeric' => 'Jumlah keluar tidak sesuai format (harus berupa angka)!!!',
            'price.required' => 'Harga produk tidak boleh kosong!!!',
            'price.numeric' => 'Harga produk tidak sesuai format (harus berupa angka)!!!',
            'subtotal.required' => 'Subtotal tidak boleh kosong!!!',
            'subtotal.numeric' => 'Subtotal tidak sesuai format (harus berupa angka)!!!',
        ];

        $this->validate($request, $rules, $customMessages);

        // $data = $request->all();
        // $productOut = new productOut();
        // $total_harga = 0;
        // $total_harga = $productOut->harga * $productOut->jumlah_keluar;

        $data = $request->all();
        try {
            $productOut = new ProductOut();
            $productOut->tanggal_keluar = Carbon::now();
            $productOut->id_produk  = $data['id_produk'];
            $productOut->jumlah_keluar = $data['qty'];
            $productOut->harga = $data['price'];
            $productOut->subtotal  = $data['subtotal'];

            $productOut->save();

            Session::flash('success_message_create', 'Data Produk berhasil disimpan');
            return redirect()->route('productOut.index');
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
            $productOut = ProductOut::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('productOut.index')->with('error_message_not_found', 'Data Transaksi tidak ditemukan');
        }
        $data = $request->all();

        $rules = [
            'id_produk' => 'required|exists:produk,id_produk',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ];

        $customMessages = [
            'id_produk.required' => 'Silakan pilih produk.',
            'id_produk.exists' => 'Produk yang dipilih tidak ada.',
            'qty.required' => 'Jumlah keluar tidak boleh kosong!!!',
            'qty.numeric' => 'Jumlah keluar tidak sesuai format (harus berupa angka)!!!',
            'price.required' => 'Harga produk tidak boleh kosong!!!',
            'price.numeric' => 'Harga produk tidak sesuai format (harus berupa angka)!!!',
            'subtotal.required' => 'Subtotal tidak boleh kosong!!!',
            'subtotal.numeric' => 'Subtotal tidak sesuai format (harus berupa angka)!!!',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $productOut->id_produk  = $data['id_produk'];
            $productOut->jumlah_keluar = $data['qty'];
            $productOut->harga = $data['price'];
            $productOut->subtotal  = $data['subtotal'];
            
            $productOut->save();

            Session::flash('success_message_create', 'Data Produk berhasil diperbarui');
            return redirect()->route('productOut.index');
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
            $productOut = ProductOut::findOrFail($id);
            $productOut->delete();

            return redirect()->route('productOut.index')->with('success_message_delete', 'Data produk berhasil dihapus');
        } catch (QueryException $e) {
            // Periksa apakah pengecualian disebabkan oleh  foreign key constraint violation
            if ($e->getCode() === '23000') {
                // Foreign key constraint violation message
                $errorMessage = "Tidak dapat menghapus Data produk karena terdapat data produk terkait di data lain.";
            } else {
                // query exception messages lainnya
                $errorMessage = "Terjadi kesalahan dalam menghapus Data produk.";
            }

            return redirect()->route('productOut.index')->with('error_message_delete', $errorMessage);
        } catch (ModelNotFoundException $e) {
            // jika id tidak ditemukan redirect error message
            return redirect()->route('productOut.index')->with('error_message_not_found', 'Data produk tidak ditemukan');
        }
    }
}
