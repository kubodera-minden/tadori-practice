<!-- フォームの共通部分 -->
<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>記事修正</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            @if($target == 'store') <!-- 登録か編集かで分岐させる -->
            <form action="/article/{{ $article->id }}" method="post">
            @elseif($target == 'update')
            <form action="/article/{{ $article->id }}" method="post">
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
                <button type="submit" class="btn btn-default">登録</button>
                <a href="/article">戻る</a>
            </form>
        </div>
    </div>
</div>
