<template>
<div class="container ops-main">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <h1>新しく記事を書く</h1>
        </div>
        <div class="col-9 my-5">
            <h2 class="col-12 p-0">タイトル</h2>
            <input class="w-100" type="text" v-model="article.title">
        </div>
    </div>
    
    <div class="row d-flex justify-content-center">
        <div class="col-9 my-5">
            <h2 class="col-12 p-0">内容</h2>
        </div>
    </div>

    <div id="codex-editor" />

    <div class="row justify-content-end">
        <button class="col-3 btn btn-primary" @click="save" v-if="article.title">送信</button>
        <button class="col-3 btn btn-secondary" v-else>送信</button>
    </div>

</div>
</template>

<script>
import EditorJS from '@editorjs/editorjs'
import axios from 'axios'
import ThumbnailCropper from './ThumbnailCropper.vue'

export default {
    components: { 
        ThumbnailCropper 
    },

    data: function () {
        return {
            article: {
                title: '',

            },
            editor: {},
            SavedContent:[],
        }
    },
    computed: {
    },
    methods: {
        // Editor.js関連
        doEditor() {
            const Header = require('@editorjs/header'); //https://github.com/editor-js/header
            const ImageTool = require('@editorjs/image');
            const Embed = require('@editorjs/embed');
            const List = require('@editorjs/list');
            
            this.editor = new  EditorJS({
                // readOnly: true,
                holder: 'codex-editor',
                tools: {
                    header: Header,
                    image: {
                        class: ImageTool,
                        config: {
                        uploader: {
                            uploadByFile(file) {
                            let me = this
                            let formData = new FormData()
                            formData.append('image', file)
                            let config = {headers: {'content-type': 'multipart/form-data'}}
                            return axios.post('api/upload_file', formData, config)
                                .then(res => {
                                return res.data
                                })
                            },
                            //only work when url has extensions like .jpg
                            uploadByUrl(url) {
                            return me.$axios.post('api/blog/fetch_file', {url: url}).then(res => {
                                return res.data
                            })
                            }
                        }
                        }
                    },
                    embed: {
                        class: Embed,
                        config: {
                        services: {
                            youtube: true,
                            twitter: true,
                            instagram: true
                        }
                        }
                    },
                    list: {
                        class: List,
                        inlineToolbar: true,
                    },
                },
                data: this.SavedContent
            })
        },
        save() {
            this.editor.save().then((outputData) => {
                const data = JSON.stringify(outputData);

                axios
                .post(`api/articles`, { title:this.article.title,content: data })
                .then(response => (
                    this.$router.push({ name: 'ArticleShow', params: { id: response.data } })
                ))
            })
            .catch(err => {
                console.log(err)
            })
        },
    },
    async mounted() {
        console.log('ArticleCreate mounted.')
        this.doEditor()
    }
}
</script>

<style lang="scss" scoped>
.heading {
    font-size: 4em;
    font-weight: 500;
}
</style>