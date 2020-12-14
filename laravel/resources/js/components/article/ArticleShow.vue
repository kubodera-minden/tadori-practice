<template>
<div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">
            {{ article.title }} / 
            <!-- <a :href="/article/{{ article.id }}/edit">編集</a> -->
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="container mt-4">
                <div class="border p-4">
                    <h1 class="h5 mb-4">
                        {{ article.title }}
                    </h1>

                    <p class="mb-5">
                        {{ article.content }}
                    </p>

                    <div>
                        <img :src="'/storage/thumbnail/' + article.thumbnail_path" class="img-thumbnail">
                    </div>

                </div>
        </div>
    </div>
    <div id="codex-editor" />
</div>
</template>

<script>
import EditorJS from '@editorjs/editorjs'
export default {
    data: function () {
        return {
            article: [],
            editor: {},
            SavedContent:[],
        }
    },
    methods: {
        // Editor.js関連
        doEditor() {
            this.editor = new  EditorJS({
                holder: 'codex-editor',
                data: this.SavedContent
            })
        },
    },
    async mounted() {
        console.log('ArticleShow mounted.')
        await axios
            .get(`/api/articles/${this.$route.params.id}`)
            .then(response => (this.article = response.data,this.SavedContent = JSON.parse(response.data.content)))
        this.doEditor()
    }
}
</script>

<style lang="scss" scoped>

</style>