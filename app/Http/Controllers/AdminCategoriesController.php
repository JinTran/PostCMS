<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoriess = Category::pluck('name', 'id')->all();
        $categories = Category::paginate(5);
        return view('admin.categories.index', compact('categories', 'categoriess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

//        $categories = Category::pluck('name', 'id')->all();
//        return view('admin.categories.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());
        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $categories = Category::findOrFail($id);
        $categoriess = Category::pluck('name', 'id')->all();

        return view('admin.categories.edit', compact('categories', 'categoriess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect('/admin/categories')->with('message', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

//        $posts = Post::all();
//        foreach ($posts as $post) {
//            if ($post->category_id == $id ? ) {
//                $post->category_id = null;
//                $post->update();
//            }
//        }

        $category = Category::findOrFail($id);
//        foreach ($category->posts as $post) {
//            $post->category_id = null;
//            $post->update();
//        }

        DB::transaction(function(){
            Post::where('category_id', '=', $category->id)->update(['category_id' => null]);
            $category->delete();
        });

        return redirect('/admin/categories');
    }
}
