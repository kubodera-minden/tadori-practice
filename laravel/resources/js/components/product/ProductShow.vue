<template>
<div class="container ops-main">
    <div class="row">
      <div class="col-5 d-flex justify-content-center">
          <img :src="'storage/product_img/' + product.image_path" width="300" />
      </div>
      <div class="col-7">
        <h1 class="">{{ product.name }}</h1>
        <p>{{product.content}}</p>
      </div>
    </div>

    <square-qropper :axiosPath="'upload_product_image'" :userId="product.id" />

</div>
</template>

<script>
import axios from 'axios'
import SquareQropper from '../user/SquareQropper.vue';

export default {
    components: { 
        SquareQropper
    },

    data: function () {
        return {
            product: [],
        }
    },
    computed: {
    },
    methods: {
    },
    async mounted() {
        console.log('ProductShow mounted.')
        await axios
            .get(`/api/products/${this.$route.params.id}`)
            .then(response => (this.product = response.data))
    }
}
</script>

<style lang="scss" scoped>
</style>