<template>
<div>
    <div class="container ops-main">
        <div class="row  justify-content-center">
            <div class="col-8 row border">
                <div class="col-2">
                    <img src='/storage/pien__man.png' class="img-thumbnail">
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <p>商品名</p>
                        </div>
                        <div class="col-12">
                            <p>商品説明</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios';

export default {
    data: function () {
        return {
            product: '',
        }
    },

    mounted() {
        console.log('ProductCard mounted.')
        // axios
        //     .get('/api/articles')
        //     .then(response => (this.articles = response.data))
    },
}
</script>

<style lang="scss" scoped>

</style>