<!-- フォームの共通部分 -->
<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            @if($target == 'store') <!-- 登録か編集かで分岐させる -->
            <h2>記事作成</h2>
            @elseif($target == 'update')
            <h2>記事修正</h2>
            @endif   
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">

            @include('article/message')

            @if($target == 'store')
            <form action="/article/{{ $article->id }}" method="post" enctype='multipart/form-data'>
            @elseif($target == 'update')
            <form action="/article/{{ $article->id }}" method="post" enctype='multipart/form-data'>
                <input type="hidden" name="_method" value="PUT">
            @endif     
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="title">タイトル</label>
                    <input type="text" class="form-control" name="title" value="{{ $article->title }}">
                </div>
                <div class="form-group">
                    <label for="content">内容</label>
                    <input type="text" class="form-control" name="content" value="{{ $article->content }}">
                </div>
                <div class="form-group">
                    <input type="file" name="image">
                </div>
                <div>
                    <img src="{{ asset('storage/thumbnail/' . $article->thumbnail_path) }}">
                </div>
                <button type="submit" class="btn btn-default">登録</button>
                <a href="/article">戻る</a>
            </form>
        </div>
    </div>
</div>
