<template>
<div class="container ops-main">
    <div class="row">
        <div v-on:click="doEditor(),btnTrigger=!btnTrigger" v-if="btnTrigger" class="col-3 offset-4 btn btn-primary">記事を読む</div>
        <div id="codex-editor" class="col-12" />
    </div>
    <ProductCard v-if="!btnTrigger"></ProductCard>
</div>
</template>

<script>
import EditorJS from '@editorjs/editorjs'
import axios from 'axios'

import ProductCard from '../product/ProductCard.vue';

export default {
    components: {
        ProductCard,
    },
    props: [
        'article',
    ],
    data: function () {
        return {
            editor: {},
            btnTrigger: true,
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
                readOnly: true,
                holder: 'codex-editor',
                tools: {
                    header: Header,
                    image: ImageTool,
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
                data: this.article
            })
        },
    },
}
</script>

<style lang="scss" scoped>
.block {
    padding-bottom: 0 !important;
}
</style>