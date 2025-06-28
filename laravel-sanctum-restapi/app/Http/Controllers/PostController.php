<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Posts::all();
        return response()->json([
            'success' => true,
            'message' => 'Posts retrieved successfully.',
            'data'    => $posts,
        ], 200);

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body'  => 'required',
        ]);

        $post = Posts::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Post created successfully.',
            'data'    => $post,
        ], 201); // 201 = Created
    }

    public function show($id)
    {
        return Posts::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $post = Posts::findOrFail($id);
        $post->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Post updated successfully',
            'data'    => $post,
        ], 200);
    }

    public function destroy($id)
    {
        $deleted = Posts::destroy($id);

        if ($deleted) {
            return response()->json([
                'message' => 'Post deleted successfully.',
                'status'  => true,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Post not found or already deleted.',
                'status'  => false,
            ], 404);
        }
    }
}
