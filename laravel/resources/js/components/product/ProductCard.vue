<template>
<div>
        <div class="container ops-main">
            <div class="row justify-content-center">
                <router-link :to="{ name: 'ProductShow', params: { id: product.id } }" class="col-7 row border none-padding">
                    <div class="col-4 none-padding product-image">
                        <img :src="'storage/product_img/' + product.image_path" class="img-thumbnail">
                    </div>
                    <div class="col-8 d-flex align-items-center">
                        <div class="row">
                            <div class="col-12">
                                <h2>{{product.name}}</h2>
                            </div>
                            <div class="col-12">
                                <p>{{product.content}}</p>
                            </div>
                        </div>
                    </div>
                </router-link>
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
a {
    color: black;
    text-decoration: none;
}

.none-padding {
    padding: 0;
}
</style>