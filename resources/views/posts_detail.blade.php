 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title">
             投稿詳細
         </div>
         
     </div>
     <!-- Book: 既に登録されてる投稿詳細 -->
            <div class="card-body">
                <!--投稿者名の表示-->
                <div>{{$post->user->name}}</div>
                <!--投稿のカテゴリを表示-->
                <div>{{$post->category->name}}</div>
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
                <!--申し込み/見送り/戻るボタン-->
                <div class="well well-sm">
                    <!--申し込みボタン-->
                    <form action="{{ url( 'post/'.$post->id )}}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">
                            申し込み
                        </button>
                    </form>
                    <!--見送りボタン-->
                    <form action="{{ url( 'post/'.$post->id )}}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-secondary">
                            見送り
                        </button>
                    </form>
                    <!--戻るボタン-->
                    <div>
                        <a class="btn btn-link pull-right" href="{{url('/posts_list')}}">戻る</a>
                    </div>
                    <!--id値を送信-->
                    <input type="hidden" name="id" value="{{$post->id}}" />
                    {{ csrf_field() }}
                
            </div>

 @endsection