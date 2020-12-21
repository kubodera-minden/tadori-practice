<template>
    <div class="row">
        <div class="container mt-4 d-flex align-items-center">
            <div class="col-xs-2">
                <img :src="'storage/user_img/' + user.image_path" class="img-thumbnail rounded-circle">
                <div class="name-box p-2 d-flex justify-content-center">
                    <router-link :to="{ name: 'UserEdit', params: { id: user.id } }">{{ user.name }}</router-link>
                </div>
            </div>
            <div class="col-xs-8 border p-4">
                <h1 class="h5 mb-4">
                    {{ content }}
                </h1>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  props: [
    'user',
    'content'
  ]
}
</script>

<style lang="scss" scoped>
.name-box {
    a {
        font-size: 2rem;
    }
}
</style>