<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $all_posts =json_decode(Post::all(), true);
        // $all_posts = Post::get(); //get = all
        return view('posts/index', compact('all_posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
        // $post=new Post();
        // $post->title = $request->title;
        // $post->body = $request->conten;
        // $post->created_at = now();
        // $post->updated_at = now();
        // $post->save();

        // Post::create([
        //     'title'=> $request->title,
        //     'body'=> $request->conten,
        // ]);
        // $validated = $request->validate([
        //     'title'=> 'required',
        //     'body'=> 'required',  
        // ]);
        #وقفنا الفاليديشن هن عشان عملنا نوع نريكوست مخصوص بقينا نمل فيو الفايديشن عيد من الكونترولر مكانو في 
        #app\Http\Requests\StorePostRequest

        Post::create($request->all()); //بس هنا في الحاله دي لازم يكون اسم الانبت نفس اسم العمود او الحقل في الداتا بيس
        $all_posts =json_decode(Post::all(), true);
        $success_add=true;
        return view('posts/index',compact('success_add','all_posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $all_posts=Post::onlyTrashed()->get();
        // return $all_posts;
        return view('posts.softdelete',compact('all_posts'));
        // return view('posts/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        #find using for id only id not using with email and or name or anything except id id only id
        // $post=Post::find($id);
        $post=Post::findOrFail($id); //if not found return user 404 page not found
        // $post=Post::where('id',$post->id)->first();
        if ($post) {
            # code...
        return view('posts/edit', compact('post'));

        }else{
            // return abort(404); //404 page not found
            // return response("هذا الاي دي غير موجود"); //message
        }

        // return view('posts/edit');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, $id)
    {
        //
     Post::find($id)->update($request->all()); 
    $all_posts =json_decode(Post::all(), true);
     $success_updated=true;
     if($success_updated){
        return view('posts/index', compact('success_updated','all_posts')) ;

     }else{
        return response('لم يتم تحديث المقال لسبب ما');
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Post::find($id)->delete();//
        Post::destroy($id);
        $all_posts =json_decode(Post::all(), true);
        $delete=true;
        return view('posts/index', compact('delete','all_posts'));
    }
    public function trncat()
    {
        Post::truncate();
        $all_posts =json_decode(Post::all(), true);
        $destroyAll=true;
        return view('posts/index', compact('destroyAll','all_posts'));
    }
    public function restore($id)
    {

        #الطريقه الاولي لاسترجاع المحزوف
        // Post::onlyTrashed()->findOrFail($id)->restore(); 
        #الطريقه التانيه لاسترجاع المحزوف
       Post::withTrashed()
        ->where('id', $id)
        ->restore();

        // $all_posts =json_decode(Post::all(), true);
        // $destroyAll=true;
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        Post::withTrashed()
        ->where('id', $id)
        ->forceDelete();

        // $all_posts =json_decode(Post::all(), true);
        // $destroyAll=true;
        return redirect()->back();    
    }
    
    #test queryScope
    public function test_query_scope()
    {
       return Post::mohammed()->first();
    }
}
