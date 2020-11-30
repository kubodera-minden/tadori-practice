<template>
<div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">記事一覧</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <table class="table text-center">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">タイトル</th>
                <th class="text-center">内容</th>
                <th class="text-center">削除</th>
            </tr>
            @foreach($articles as $article)
            <tr>
                <td>
                <a href="/article/{{ $article->id }}">{{ $article->id }}</a>
                </td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->content }}</td>
                <td>
                <form action="/article/{{ $article->id }}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </td>
            </tr>
            @endforeach
            </table>
            <div><a href="/article/create" class="btn btn-default">新規作成</a></div>
        </div>
    </div>

</div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
        axios
            .get('/api/v1/users.json')
            .then(response => (this.user = response.data))
    },
}
</script>

<style lang="scss" scoped>

</style>