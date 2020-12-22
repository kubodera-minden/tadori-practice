<template>
<div class="container ops-main">
    <div class="row">
      <div class="col-5 d-flex justify-content-center">
          <img :src="'storage/interviewer_img/' + interviewer.image_path" width="300" />
      </div>
      <div class="col-7">
        <h1 class="">{{ interviewer.name }}</h1>
        <p>あとで自己紹介のカラムを作る！</p>
      </div>
    </div>

    <square-qropper :axiosPath="'upload_interviewer_image'" :userId="interviewer.id" />

</div>
</template>

<script>
import axios from 'axios'
import SquareQropper from '../user/ SquareQropper.vue';

export default {
    components: {
        SquareQropper
    },
    data: function () {
        return {
            interviewer: [],
        }
    },
    computed: {

    },
    methods: {
    },
    async mounted() {
        console.log('InterviewerShow mounted.')
        await axios
            .get(`/api/interviewers/${this.$route.params.id}`)
            .then(response => (this.interviewer = response.data))
    }
}
</script>

<style lang="scss" scoped>
</style>