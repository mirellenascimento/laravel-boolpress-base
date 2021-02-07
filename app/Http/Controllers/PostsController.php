<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

use App\Post;
use App\PostInformation;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate();
        return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
      $data = [
        'categories' => Category::all(),//collects all categories to display into select input
        'tags' => Tag::all(),//collects all tags to display into dropbox input
        'post' => $post//collects info fom the selected post
      ];

      return view('posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all(); //collects all input

      $newPost = Post::firstOrCreate([
        'title' => $data['title'],
        'author' => $data['author'],
        'category_id' => $data['category_id']
      ]); //creates new Post and sets category_id
      $newPost->save();
      $newPostInformation = PostInformation::firstOrCreate([//creates post->postInformation
        'post_id' => $newPost->id,
        'slug' => Str::slug($newPost->title),
        'description' => $data['description']
      ]);
      $newPostInformation->save();

      foreach ($data['tags'] as $tagId) {
        $newPost->tags()->attach($tagId);
      }
      return redirect()->route('posts.show', $newPost->id);//redirects to new post page
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = [
          'categories' => Category::all(),//collects all categories to display into select input
          'tags' => Tag::all(),//collects all tags to display into dropbox input
          'post' => $post//collects info fom the selected post
        ];

        return view('posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all(); //collects all input
        $post->update($data); //updates Post and category_id
        $post->postInformation->update($data);//updates post->postInformation
        $post->tags()->detach();//removes all tags
        $newTags = $data['selected_tags'];//collects inputed tags
        for($i=0; $i<count($newTags); $i++){//adds selected tags to post->tags
          $post->tags()->attach($newTags[$i]);
        };
        return redirect()->route('posts.show', $post->id);//redirects to edited post page
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->postInformation->delete();
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
