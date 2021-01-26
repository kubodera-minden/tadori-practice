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

    <div id="editorjs"></div> <!-- https://paiza.hatenablog.com/entry/2019/08/15/%E5%AE%8C%E5%85%A8%E3%82%AB%E3%82%B9%E3%82%BF%E3%83%9E%E3%82%A4%E3%82%BAOK%EF%BC%81%E3%83%96%E3%83%AD%E3%83%83%E3%82%AF%E3%82%B9%E3%82%BF%E3%82%A4%E3%83%AB%E3%81%AE%E3%83%86%E3%82%AD%E3%82%B9%E3%83%88 -->
    <button>記事を保存する</button>
    
    <div class="row">
        <div class="col-md-8 col-md-offset-1">

            @include('article/message')

            @if($target == 'store')
            <form action="/article/{{ $article->id }}" method="post" enctype='multipart/form-data'>
            @elseif($target == 'update')
            <form action="/article/{{ $article->id }}" method="post" enctype='multipart/form-data'>
                <input type="hidden" name="_method" value="PUT">
            @endif     
                <div id="editorjs"></div>
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
                    <img src="{{ asset('storage/thumbnail/' . $article->thumbnail_path) }}" class="img-thumbnail">
                </div>
                <button type="submit" class="btn btn-default">登録</button>
                <a href="/article">戻る</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    const editorJS = new EditorJS({
        holder: "editorjs",
        tools: {
            header: Header,        
            list: List,        
            quote: Quote,
        }
    });

    const btn = document.querySelector("button");

    btn.addEventListener("click", function () {
        editorJS
            .save()
            .then((outputData) => {
                console.log("input Data ", outputData);

                const data = JSON.stringify(outputData)

                axios.post('api/articles', { title:'kanta',content: data })
                .catch((error) => {
                    console.log("failed: ", error);
                });
        });
    });

</script>