<template>
<div class="container ops-main">
    <div class="row">
      <div class="col-5 d-flex justify-content-center">
          <img :src="'storage/user_img/' + user.image_path" width="300" />
      </div>
      <div class="col-7">
        <h1 class="">{{ user.name }}</h1>
        <p>あとで自己紹介のカラムを作る！</p>
      </div>
    </div>

    <square-qropper :axiosPath="'upload_user_image'" :userId="user.id" />

</div>
</template>

<script>
import axios from 'axios'
import SquareQropper from './SquareQropper.vue';

export default {
    components: {
        SquareQropper
    },
    data: function () {
        return {
            user: [],
        }
    },
    computed: {

    },
    methods: {
    },
    async mounted() {
        console.log('UserEdit mounted.')
        await axios
            .get(`/api/users/${this.$route.params.id}`)
            .then(response => (this.user = response.data))
    }
}
</script>

<style lang="scss" scoped>
</style>