<template>
<div>
    <div class="container">
        <div class="row">
            <Slideshow />
            <router-link 
                :to="{ name: 'ArticleShow',params: { id: article.id } }"
                v-for="(article,$index) in articles" :key="$index"
                class="col-sm-10 col-md-6 col-xl-4"
            >
                <img :src="'storage/thumbnail/' + article.thumbnail_path" v-if="article.thumbnail_path" class="img-thumbnail col-12">
                <img :src="'storage/minden_logo.png' + article.thumbnail_path" v-else class="img-thumbnail col-12">
                <h2> {{article.title}} </h2>
                <h3> {{article.date}} </h3>
            </router-link>
        </div>
    </div>

</div>
</template>

<script>
import axios from 'axios';
import Slideshow from './Slideshow.vue';

export default {
    components: { 
        Slideshow
    },
    data: function () {
        return {
          articles: [],
        }
    },

    mounted() {
        console.log('ArticleIndex mounted.')
        axios
            .get('/api/articles')
            .then(response => (this.articles = response.data))
    },
}
</script>

<style lang="scss" scoped>
.img-thumbnail {
    padding: 0;
}
</style>