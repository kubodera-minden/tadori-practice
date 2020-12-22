<template>
<div class="container ops-main">
    <div class="row">
            <div class="col-12">
                <input v-model="question.title" class="" type="text" placeholder="タイトルを入力する">
            </div>
            <div class="col-12">
                <textarea v-model="question.content" class="" type="text" placeholder="質問内容を入力する"></textarea>
            </div>
            <div class="col-12">
                <button v-if="this.question.title && question.content" @click="createQuestion">質問する</button>
            </div>
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
    methods: {
        createQuestion: async function() {
            await axios
                .post(`/api/questions`,{title: this.question.title,content: this.question.content})
                .then(response => (
                    this.$router.push({ name: 'QuestionShow', params: { id: response.data } })
                ))
        }
    },
}
</script>

<style lang="scss" scoped>
input, textarea {
    width: 70%;
}
</style>