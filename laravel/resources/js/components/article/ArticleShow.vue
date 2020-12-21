<template>
<div class="container ops-main">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <h1 class="heading">
                {{ article.title }}
            </h1>
        </div>
    </div>

    <div id="codex-editor" />
    <div class="row justify-content-end">
        <v-btn text @click="save">保存</v-btn>
    </div>
</div>
</template>

<script>
import EditorJS from '@editorjs/editorjs'
import axios from 'axios'
export default {
    data: function () {
        return {
            article: [],
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

                axios.put(`api/articles/${this.$route.params.id}`, { title:'kanta',content: data });
            })
            .catch(err => {
                console.log(err)
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
.heading {
    font-size: 4em;
    font-weight: 500;
}
</style>