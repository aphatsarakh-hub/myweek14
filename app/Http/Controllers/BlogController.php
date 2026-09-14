<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderByDesc('id')
            ->where(function($query) {
                $query->where('status', true)
                      ->orWhere('status', 1)
                      ->orWhere('status', '1')
                      ->orWhere('status', 'true');
            })
            ->get();
        return view('index', compact('blogs'));
    }

    public function detail($id)
    {
        $blog = Blog::findOrFail($id);
        return view('detail', compact('blog'));
    }
}