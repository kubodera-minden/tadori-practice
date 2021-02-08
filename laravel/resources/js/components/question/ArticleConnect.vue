<template>
<div>
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <table class="table text-center">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">タイトル</th>
                    <th class="text-center">投稿日</th>
                </tr>
                <tr v-for="(article,$index) in articles" :key="$index" @click="ConnectArticle(article.id)" class="article-row">
                    <td>
                        {{ article.id }}
                    </td>
                    <td>
                        {{ article.title }}
                    </td>
                    <td>
                        {{ article.date }}
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>
</template>

<script>

export default {
    props: [
    'question',
    ],
    components: {
    },
    data: function () {
        return {
            articles: [],
        }
    },
    async mounted() {
        console.log('ArticleConnect mounted.');
        axios
            .get('/api/articles')
            .then(response => (this.articles = response.data))
    },
    computed: {
        current_user: function() {
            return this.$store.state.auth.currentUser;
        }
    },
    methods: {
      ConnectArticle: function (article_id) {
        axios
            .post(`/api/update_question/${this.question.id}`,
                {title: this.question.title,content: this.question.content,opening_comment: this.question.opening_comment,user_id: this.question.user_id,interviewer_id: this.current_user.id,article_id: article_id}
                )
            .then(response => (
                this.$router.go({path: this.$router.currentRoute.path, force: true})
            ))
      },
    },
}
</script>

<style lang="scss" scoped>
.article-row {
    cursor: pointer;
}
.article-row:hover {
    background-color: rgb(172, 228, 88);
}
</style>