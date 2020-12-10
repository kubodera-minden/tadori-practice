<template>
    <div class="row">
        <div class="container mt-4 d-flex align-items-center">
            <div class="col-xs-10 border p-4">
                <h1 class="h5 mb-4">
                    {{ content }}
                </h1>
            </div>
            <div class="col-xs-2">
                <img src='/storage/shinbun_kisya.png' class="img-thumbnail rounded-circle">
            </div>
        </div>
    </div>
</template>

<script>
export default {
  props: [
    'content'
  ]
}
</script>

<style lang="scss" scoped>

</style>