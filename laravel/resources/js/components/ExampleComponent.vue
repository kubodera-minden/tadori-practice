<template>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Laravel標準のサンプルコンポーネントです</h1>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss" scoped>
h1 {
    color: red;
}
</style>
