<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua item beserta relasi kategorinya
        $items = Item::with('category')->latest()->get();
        
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Panggil model Category dulu di atas sendiri jika belum ada:
        // use App\Models\Category;
        
        $categories = \App\Models\Category::all();
        return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang dikirim dari form
        $request->validate([
            'code_item'   => 'required|unique:items,code_item', // Kode barang harus unik (tidak boleh sama)
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'stock'       => 'required|integer|min:1',
            'condition'   => 'required|in:Baik,Perbaikan,Rusak',
            'location'    => 'required|string|max:255',
            'notes'       => 'nullable|string',
        ]);

        // 2. Simpan data ke database
        Item::create($request->all());

        // 3. Kembalikan ke halaman daftar barang dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Barang baru berhasil ditambahkan!');
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
    public function edit(Item $item)
    {
        // Ambil semua kategori untuk pilihan di dropdown
        $categories = \App\Models\Category::all();
        
        // Tampilkan halaman edit dan kirim data $item dan $categories
        return view('items.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Item $item)
    {
        $request->validate([
            // Abaikan pengecekan unique untuk ID barang ini sendiri
            'code_item'   => 'required|unique:items,code_item,' . $item->id, 
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'stock'       => 'required|integer|min:1',
            'condition'   => 'required|in:Baik,Perbaikan,Rusak',
            'location'    => 'required|string|max:255',
            'notes'       => 'nullable|string',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Data barang berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        // Hapus data barang dari database
        $item->delete();

        // Kembalikan ke halaman index dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Data barang berhasil dihapus!');
    }
}
