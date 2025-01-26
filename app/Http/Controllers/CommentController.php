<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'text' => ['required', 'string', 'min:2', 'max:255'],
            'product_id' => ['required', 'exists:products,id'],
        ]);
        $data['user_id'] = Auth::id();
        Comment::create($data);
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
