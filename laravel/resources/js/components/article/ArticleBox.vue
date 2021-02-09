<template>
<div class="container ops-main">
    <div class="row">
        <div v-on:click="doEditor(),
            btnTrigger=!btnTrigger" 
            v-if="btnTrigger" 
            class="col-8 offset-2 btn btn-primary read-more"
        >
            Tadoってみる
        </div>

        <div id="codex-editor" class="col-12" />
    </div>
    <product-card :product="product" v-if="!btnTrigger" />
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
        'content',
        'product_id',
    ],
    data: function () {
        return {
            editor: {},
            btnTrigger: true,
            product: [],
        }
    },
    async mounted() {
    },
    computed: {
    },
    methods: {
        // Editor.js関連
        doEditor() {

            //Productの情報を取ってくる
            axios
                .get(`/api/products/${this.product_id}`)
                .then(response => (this.product = response.data))

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
                data: this.content
            })
        },
    },
}
</script>

<style lang="scss" scoped>
.block {
    padding-bottom: 0 !important;
}
.read-more {
    font-size: 70px;
    border-radius: 15px;
}
</style>