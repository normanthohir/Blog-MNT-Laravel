<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->paginate(10)
            // $posts = Post::where('user_id', auth()->user()->id)->paginate(5)
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //untuk 
    {
        return View('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        //check ada image baru tidak ?
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        // insert data atau masukan deta ke databases
        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'New posts has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return View('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) //unutuk menampilkan view nya 
    {
        return View('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post) //unutk prosesnya 
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        //check ada image baru tidak ?
        if ($request->file('image')) {
            if ($request->oldImage) { //gmbr lamanya ada maka kita hapus
                Storage::delete($request->oldImage);
            }
            //kalau tidak ada gamabr maka ini yang di lakuka
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        // insert data atau masukan deta ke databases
        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Posts has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) //hapus post di tabel
    {
        if ($post->image) { //klau ada image nya hapus
            Storage::delete($post->image);
        }

        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'posts has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
    
}
