<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): PostCollection
    {
        return new PostCollection(Post::with('category')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            $data['image'] = $request->file('image')->store('images/posts', 'public');

        }

        Post::query()->create($data);

        return response()->json(['message' => 'Post created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post): JsonResponse
    {
        $post->update($request->validated());

        return response()->json(['message' => 'Post updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully.']);
    }
}
