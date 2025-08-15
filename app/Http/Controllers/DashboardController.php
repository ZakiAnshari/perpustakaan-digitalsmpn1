<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Ebook;
use App\Models\Pustakawan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $pustakawanCount = Pustakawan::count();
        $userCount = User::count();
        $ebookCount = Ebook::count();

        return view('admin.dashboard.index', compact(
            'bookCount',
            'pustakawanCount',
            'userCount',
            'ebookCount'
        ));
    }
}
