<template>
<div class="container ops-main">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <h1 class="">
                {{ user.name }}
            </h1>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios'
export default {
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