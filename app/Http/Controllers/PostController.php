<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Barryvdh\DomPDF\Facade\Pdf;

class PostController extends Controller
{
    /**
     * Search posts by keyword in title, description, category, or user.
     */
    public function search(Request $request) 
    {
        $keyword = $request->input('keyword');

        $posts = Post::where('title', 'like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->orWhereHas('category', function ($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%");
            })
            ->orWhereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%");
            })
            ->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Generate a PDF of posts with optional filtering by keyword.
     */
    public function generatePDF(Request $request) {
        $posts = Post::query();
    
        if ($request->has('keyword') && !empty($request->input('keyword'))) {
            $keyword = $request->input('keyword');
    
            $posts->where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhereHas('category', function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', "%$keyword%");
                })
                ->orWhereHas('user', function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', "%$keyword%");
                });
        }
    
        $posts = $posts->with('category', 'user')->get();
    
        $pdf = Pdf::loadView('pdf.posts', compact('posts'));
    
        return $pdf->download('posts.pdf');
    }
}
