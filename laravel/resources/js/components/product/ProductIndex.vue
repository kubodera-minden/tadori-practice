<template>
<div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">記事一覧</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <table class="table text-center">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">タイトル</th>
                <th class="text-center">内容</th>
            </tr>
            <tr v-for="(product,$index) in products" :key="$index">
                <td>
                    <router-link :to="{ name: 'ProductShow', params: { id: product.id } }">{{product.id}}</router-link>
                </td>
                <td>{{ product.name }}</td>
                <td>{{ product.content }}</td>
            </tr>
            </table>
        </div>
    </div>

</div>
</template>

<script>
import axios from 'axios';

export default {
    data: function () {
        return {
            products: [],
        }
    },

    mounted() {
        console.log('ProductIndex mounted.')
        axios
            .get('/api/products')
            .then(response => (this.products = response.data))
    },
}
</script>

<style lang="scss" scoped>

</style>