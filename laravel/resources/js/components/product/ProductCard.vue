<template>
<div>
    <div class="container ops-main">
        <div class="row  justify-content-center">
            <div class="col-8 row border">
                <div class="col-2">
                    <img :src="'storage/product_img/' + product.image_path" class="img-thumbnail">
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <p>{{product.name}}</p>
                        </div>
                        <div class="col-12">
                            <p>{{product.content}}</p>
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
    props: [
        'product',
    ],

    data: function () {
        return {
        }
    },

    mounted() {
        console.log('ProductCard mounted.')
    },
}
</script>

<style lang="scss" scoped>

</style>