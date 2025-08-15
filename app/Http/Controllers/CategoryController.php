<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input pencarian dan jumlah item per halaman
        $search = $request->input('name');
        $paginate = $request->input('itemsPerPage', 5); // default 5

        // Query awal kategori
        $query = Category::query();

        // Filter pencarian berdasarkan nama kategori
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_category', 'LIKE', '%' . $search . '%')
                    ->orWhere('id', 'LIKE', '%' . $search . '%');
            });
        }

        // Eksekusi query dengan paginasi
        $categoris = $query->paginate($paginate)->withQueryString();

        return view('admin.Kategori.index', compact('categoris'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'nama_category' => 'required|string|max:255|unique:categories,nama_category',
        ]);

        // Simpan data ke database
        Category::create([
            'nama_category' => $validated['nama_category'],
        ]);

        // Redirect atau respon sukses
        Alert::success('Success', 'Kategori berhasil ditambahkan');
        return back();
    }

    public function edit($id)
    {
        // Ambil data kategori berdasarkan ID
        $category = Category::find($id);

        // Validasi apakah data ditemukan
        if (!$category) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // Tampilkan view edit
        return view('admin.Kategori.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Temukan data berdasarkan ID
        $category = Category::findOrFail($id);

        // Validasi data yang masuk
        $validatedData = $request->validate([
            'nama_category' => 'required|string|max:255|unique:categories,nama_category,' . $id,
        ]);

        // Perbarui data di database
        $category->update($validatedData);

        // Redirect kembali dengan pesan sukses
        Alert::success('Success', 'Kategori berhasil diperbarui');
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Alert::success('Success', 'Kategori berhasil dihapus');
        return redirect()->route('category.index');
    }
}
