 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title">
             投稿フォーム
         </div>
         <!-- バリデーションエラーの表示に使用-->
     	@include('common.errors')
         <!-- 本登録フォーム -->
         <form action="{{ url('posts') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
             {{ csrf_field() }}
             <!-- 本のタイトル -->
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
                        <input type="text" name="post_title" class="form-control">
                    </div>
                </div>
                <!--投稿の本文-->
                <div class="form-group">
                    <strong>投稿の本文</strong>
                    <div class="col-sm-6">
                        <textarea type="text" name="post_body" class="form-control"></textarea>
                    </div>
                </div>
                <!--会話時間-->
                <div class="form-group">
                    <strong>会話時間の選択</strong>
                    <div class="col-sm-6">
                        <input type="radio" name="select_time" value="30">30分</input> 
                        <input type="radio" name="select_time" value="60">60分</input>
                    </div>
                </div>
                <!--背景画像-->
                <div class="form-group">
                    <strong>背景画像</strong>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="file" name="cover_img">
                        </div>
                    </div>
                </div>
             <!-- 登録ボタン -->
             <div class="form-group">
                 <div class="col-sm-offset-3 col-sm-6">
                     <button type="submit" class="btn btn-primary">
                         登録
                     </button>
                 </div>
             </div>
         </form>
     </div>
 @endsection