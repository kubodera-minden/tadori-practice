<template>
    <div class="row justify-content-end">
        <div class="container mt-4 d-flex align-items-center">
            <div class="col-8 border p-4 offset-2">
                <h1 class="h5 mb-4">
                    {{ content }}
                </h1>
            </div>
            <div class="col-2">
                <img :src="'/storage/interviewer_img/' + interviewer.image_path" class="img-thumbnail rounded-circle">
                <div class="name-box p-2 d-flex justify-content-center">
                    <router-link :to="{ name: 'InterviewerShow', params: { id: interviewer.id } }">{{ interviewer.name }}</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  props: [
    'interviewer',
    'content'
  ]
}
</script>

<style lang="scss" scoped>
.name-box {
    a {
        font-size: 2rem;
        color: rgb(27, 228, 27);
    }
}
</style>