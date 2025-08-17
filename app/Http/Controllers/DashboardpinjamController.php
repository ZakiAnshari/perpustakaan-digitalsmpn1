<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Ebook;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardpinjamController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        // Ambil input pencarian
        $search = $request->input('q');

        // Query buku dengan filter jika ada pencarian
        $bukus = Book::with('category')
            ->when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%{$search}%");
            })
            ->get();

        return view('buku.index', compact('categories', 'bukus', 'search'));
    }


    public function show($id)
    {
        $bukus = Book::findOrFail($id);
        return view('buku.show', compact('bukus'));
    }

    // ---------------------------------------------------------------------------------------------

    public function pinjamebook(Request $request)
    {
        $q = $request->input('q'); // ambil query pencarian

        $ebooks = Ebook::when($q, function ($query, $q) {
            return $query->where('judul_ebook', 'LIKE', '%' . $q . '%');
        })->get();

        return view('ebook.index', compact('ebooks', 'q'));
    }

    public function download($id)
    {
        $ebook = Ebook::findOrFail($id);

        if ($ebook->file_pdf && file_exists(public_path('uploads/pdf/' . $ebook->file_pdf))) {
            return response()->download(public_path('uploads/pdf/' . $ebook->file_pdf), $ebook->judul_ebook . '.pdf');
        }

        return redirect()->back()->with('error', 'File PDF tidak ditemukan.');
    }


    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
