<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Listobat;
use App\Models\outreports;
use Illuminate\Http\Request;
// use Illuminate\Support\Str;
use PDF;
// use RealRashid\SweetAlert\Facades\Alert;
class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageTitle = 'List Obat';
        $cartItems = Cart::all();
        // ELOQUENT
        $listobats = Listobat::all();
        if($request){
            $data = Listobat::where('name', 'like', '%'.$request->cari.'%')->get(); 
        }else{
            $data = Listobat::all(); 
        }
        
        return view('kasir.index', [
            'pageTitle' => $pageTitle,
            'listobats' => $listobats,
            'cartItems' => $cartItems,
            'data' => $data,
            'request' => $request
        ]);
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
        //
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
    public function destroy(int $id)
    {
        Cart::findOrFail($id)->delete();
    
        return redirect()->back()->with('succes','items sudah dihapus');
    }
    


    public function addToCart(Request $request)
    {
        $item = Listobat::find($request->input('id'));
        
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }
    
        if ($request->has('jumlah_keluar')) {
            $jumlah_keluar = $request->input('jumlah_keluar');
        } else {
            // Set a default jumlah_keluar of 1 if 'jumlah_keluar' is not provided in the request
            $jumlah_keluar = 1;
        }
    
        // Check if the jumlah_keluar is not null and greater than 0
        if ($jumlah_keluar === null || $jumlah_keluar < 1) {
            return response()->json(['message' => 'Invalid jumlah_keluar'], 400);
        }
    
        $availableStock = $item->stock;
    
        if ($jumlah_keluar > $availableStock) {
            return response()->json(['message' => 'Insufficient stock'], 400);
        }
    
        // Cek apakah item sudah ada di cart sebelumnya
        $cartItem = Cart::where('code', $item->code)->first();
    
        if ($cartItem) {
            // Jika sudah ada, tambahkan jumlah stock
            $cartItem->quantity += $jumlah_keluar;
            $cartItem->save();
        } else {
            // Jika belum ada, tambahkan item baru ke cart dengan menggunakan "code" dari tabel listobats
            Cart::create([
                'id' => $item->id,
                'code' => $item->code, // Gunakan "code" dari tabel listobats
                'name' => $item->name,
                'harga' => $item->harga,
                'quantity' => $jumlah_keluar, // Use the $quantity variable here
                'stock' => $item->stock,
                'kategori' => $item->kategori,
                'satuan_id' => $item->satuan_id,
            ]);
        }
        return redirect()->route('homekasir');
    }
    
    public function checkout(Request $request)
    {
        // Ambil data dari cart
        $cartItems = Cart::all();
    
        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Cart is empty'], 400);
        }
    
        // Simpan data dari cart ke dalam tabel pesanan atau tabel lain yang sesuai
        foreach ($cartItems as $cartItem) {
            $jumlah_keluar = $request->input('jumlah_keluar_' . $cartItem->id);
            $kode_produk = $request->input('kode_produk_' . $cartItem->id);
    
            $obat = Listobat::where('code', $kode_produk)->first();
            $obat->stock -= $jumlah_keluar;
            $obat->save();
    
            outreports::create([
                'tanggal' => now(),
                'kode_produk' => $cartItem->code,
                'nama_produk' => $cartItem->name,
                'jumlah_keluar' => $jumlah_keluar,
                'satuan_id' => $cartItem->satuan_id,
                'harga_satuan' => $cartItem->harga,
                'total_harga' => $cartItem->harga * $jumlah_keluar,
            ]);
        }
    
        // Hapus data dari cart setelah proses checkout
        Cart::truncate();
    
        // return response()->json(['message' => 'Checkout successful'], 200);
        return redirect()->route('homekasir');
    }
    

    public function showCart()
    {
        $cartItems = Cart::all();
        return view('kasir.cart', compact('cartItems'));
    }
    public function exportPdf()
    {
        $cartItems = Cart::all();
        $pageTitle = 'List Obat';
        $listobats = Listobat::all();
        // $totalHargaSum = outreports::sum('total_harga');
        confirmDelete();
        $pdf = PDF::loadView('kasir.export_pdf', compact('cartItems','listobats','pageTitle'));

        return $pdf->download('Struk.pdf');
    }
    
}
