<template>
<div class="container ops-main">

    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <h1>質問する</h1>
        </div>
        <div class="col-10 my-5">
            <h2 class="col-12 p-0">タイトル</h2>
            <input v-model="question.title" class="w-100" type="text" placeholder="タイトルを入力する">
        </div>
    </div>
    
    <div class="row d-flex justify-content-center">
        <div class="col-10 my-5">
            <textarea v-model="question.content" class="w-100" type="text" placeholder="質問内容を入力する"></textarea>
        </div>
    </div>

    <div class="row">
        <button class="col-3 offset-8 btn btn-primary" @click="createQuestion" v-if="question.title && question.content">送信</button>
        <button class="col-3 offset-8 btn btn-secondary" v-else>送信</button>
    </div>

</div>

</template>

<script>
export default {
    components: {

    },
    data: function () {
        return {
            question: {
                title: "",
                content: "",
            },
            user: [],
        }
    },
    async mounted() {
        console.log('QuestionCreate mounted.')
    },
    computed: {
        current_user: function() {
            return this.$store.state.auth.currentUser;
        }
    },
    methods: {
        createQuestion: async function() {
            await axios
                .post(`/api/questions`,{title: this.question.title,content: this.question.content,user_id: this.current_user.id})
                .then(response => (
                    this.$router.push({ name: 'QuestionShow', params: { id: response.data } })
                ))
        }
    },
}
</script>

<style lang="scss" scoped>
textarea {
    height: 30em;
}
</style>