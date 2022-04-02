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
                        <select name="category">
                            <option value="0">学び</option>
                            <option value="1">仕事</option>
                            <option value="2">就職</option>
                            <option value="3">転職</option>
                            <option value="4">婚活</option>
                            <option value="5">結婚</option>
                            <option value="6">妊娠</option>
                            <option value="7">出産</option>
                            <option value="8">離婚</option>
                            <option value="9">住宅購入</option>
                            <option value="10">リフォーム</option>
                            <option value="11">副業</option>
                            <option value="12">投資</option>
                            <option value="13">趣味</option>
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
     <!-- Book: 既に登録されてる本のリスト -->
     <!-- 現在の本 -->
     @if (count($posts) > 0)
          @foreach($posts as $post)
            <div class="card-body">
                <!--投稿者名の表示-->
                <div>{{$post->user->name}}</div>
                <!--投稿のカテゴリを表示-->
                <div>{{ \App\Enums\CategoryType::getDescription(intval($post->category)) }}</div>
                <!--投稿のタイトルを表示-->
                <div>{{ $post->post_title }}</div>
                <!--投稿の本文を表示-->
                <div>{{ $post->post_body }}</div>
                <!--会話時間を表示-->
                <div>{{ $post->select_time }}分</div>
                <!--画像を表示-->
                <div>
                    <img src="/upload/{{ $post->cover_img}}" width="100">
                </div>
                <!--登録編集ボタン-->
                <a class="btn btn-primary" href="{{ url('postsedit/'.$post->id) }}">更新</a>
                <!--登録削除ボタン-->
                <form action="{{ url( 'post/'.$post->id )}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger">
                        削除
                    </button>
                </form>
            </div>
        @endforeach	
    @endif
 @endsection