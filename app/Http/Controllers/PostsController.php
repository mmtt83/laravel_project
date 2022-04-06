<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;
use Validator;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //一覧表示
    public function index()
    {
        //全ての投稿を取得
        $posts = Post::orderBy('created_at', 'desc')->get();
        
        return view('posts_list',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //登録処理
    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'post_title' => 'required|max:255',
            'post_body' => 'required|max:255',
            ]);
        //バリデーションエラー
        if($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        $file = $request->file('cover_img');
        if(!empty($file)){
            $filename = $file->getClientOriginalName();   //ファイル名を取得
            $move = $file->move('./upload/',$filename); //ファイルを移動
        }else{
            $filename = "";
        }
        
        //以下に登録処理を記述(Eloquentモデル)
        $posts = new Post;
        $posts->category_id = $request->category_id;
        $posts->post_title = $request->post_title;
        $posts->post_body = $request->post_body;
        $posts->select_time = $request->select_time;
        $posts->cover_img = $filename;
        $posts->user_id = Auth::id(); //ここでログインしているユーザーidを登録する
        $posts->save();
        
        return redirect('/posts');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    //詳細画面
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts_detail',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //更新画面
    public function edit(Post $post)
    {
        return view('posts_edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //更新処理
    public function update(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(),[
            'post_title'=>'required|max:255',
            ]);
        if($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $file = $request->file('cover_img');
        if(!empty($file)){
            $filename = $file->getClientOriginalName();   //ファイル名を取得
            $move = $file->move('./upload/',$filename); //ファイルを移動
        }else{
            $filename = "";
        }
        
        //Eloquentモデル
        $posts = Post::find($request->id);
        $posts->category_id = $request->category_id;
        $posts->post_title = $request->post_title;
        $posts->post_body = $request->post_body;
        $posts->select_time = $request->select_time;
        $posts->cover_img = $filename;
        $posts->user_id = Auth::id(); //ここでログインしているユーザーidを登録する
        $posts->save();
        return redirect('/posts_list');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //登録を削除
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
