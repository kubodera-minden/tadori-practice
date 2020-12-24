<template>
<div>
    <div class="container">
        <div class="row">
            <router-link 
                :to="{ name: 'ArticleShow',params: { id: article.id } }"
                v-for="(article,$index) in articles" :key="$index"
                class="col-sm-10 col-md-6 col-xl-4"
            >
                <img :src="'storage/thumbnail/' + article.thumbnail_path" class="img-thumbnail col-12">
                <h2> {{article.title}} </h2>
                <h3> {{article.date}} </h3>
            </router-link>
        </div>
    </div>

</div>
</template>

<script>
import axios from 'axios';

export default {
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