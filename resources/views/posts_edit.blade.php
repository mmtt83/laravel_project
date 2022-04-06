@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        @include('common.errors')
            <form action="{{ url('posts/update')}}" method="POST">
                
                <!--投稿のカテゴリ選択-->
                <div class="form-group">
                    <strong>投稿のカテゴリを選択</strong>
                    <div class="col-sm-6">
                         <select name="category_id">
                            @foreach(\App\Models\Category::get() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!--投稿のタイトル-->
                <div class="form-group">
                    <strong>投稿のタイトル</strong>
                    <div class="col-sm-6">
                        <input type="text" name="post_title" class="form-control" value="{{$post->post_title}}">
                    </div>
                </div>
                <!--投稿の本文-->
                <div class="form-group">
                    <strong>投稿の本文</strong>
                    <div class="col-sm-6">
                        <textarea type="text" class="form-control" name="post_body">{{$post->post_body}}</textarea>
                    </div>
                </div>
                <!--会話時間-->
                <div class="form-group">
                    <strong>会話時間の選択</strong>
                    <div class="col-sm-6">
                        <input type="radio" name="select_time" value="30" @if($post->select_time === 30) checked @endif >30分</input> 
                        <input type="radio" name="select_time" value="60" @if($post->select_time === 60) checked @endif >60分</input> 
                    </div>
                </div>
                <!--背景画像-->
                <div class="form-group">
                    <strong>背景画像</strong>
                    <div class="col-sm-6">
                        <div class="form-group">
                             <img src="/upload/{{ $post->cover_img}}">
                            <input id="fileUploader" type="file" name="cover_img" accept="image/" 
                            enctype="multipart/form-data" multiple="multiple" required autofocus>
                        </div>
                    </div>
                </div>
                    
                <!--保存・戻るボタン-->
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">保存</button>
                    <a class="btn btn-link pull-right" href="{{url('/')}}">戻る</a>
                </div>
                <!--id値を送信-->
                <input type="hidden" name="id" value="{{$post->id}}" />
                {{ csrf_field() }}
                
            </form>
    </div>
</div>
@endsection