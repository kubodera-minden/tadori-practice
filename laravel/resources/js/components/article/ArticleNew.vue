<template>
<div>
    <input name="content" id="editor" type="hidden" value="(Escaped HTML markup)">
    <div id="editor"></div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('ArticleNew mounted.')
        }
    }
</script>


<style lang="scss" scoped>

</style>