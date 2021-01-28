<template>
    <div class="row justify-content-end">
        <div class="container mt-4 d-flex align-items-center">
            <div class="col-8 border p-4 offset-2">
                <h1 class="h5 mb-4" v-if="content">
                    {{ content }}
                </h1>
                <div class="" v-else-if="question.opening_comment == '' && question.interviewer_id == current_user.id">
                    <textarea v-model="answer.content" class="" type="text" placeholder="返信を入力する"></textarea>
                    <div @click="createOpeningComment" class="btn btn-primary">送信する</div>
                </div>
                <div class="" v-else-if="question.interviewer_comment == '' && question.interviewer_id == current_user.id">
                    <textarea v-model="answer.content" class="" type="text" placeholder="記事のコメントを入力する"></textarea>
                    <div @click="createInterviewerComment" class="btn btn-primary">送信する</div>
                </div>
            </div>
            <div class="col-2">
                <img :src="'/storage/user_img/' + interviewer.image_path" class="img-thumbnail rounded-circle">
                <div class="name-box p-2 d-flex justify-content-center">
                    <router-link :to="{ name: 'UserEdit', params: { id: interviewer.id } }">{{ interviewer.name }}</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  props: [
    'question',
    'interviewer',
    'content',
  ],
    data: function () {
        return {
            current_user: current_user,
            answer: {
                content: "",
            },
        }
    },
    async mounted() {
    },
    methods: {
        createOpeningComment: async function() {
            await axios
                .post(`/api/update_question/${this.question.id}`,{opening_comment: this.answer.content,interviewer_comment: this.question.interviewer_comment,interviewer_id:this.question.interviewer_id})
                .then(response => (
                    this.$router.go({path: this.$router.currentRoute.path, force: true})
                ))
        },
        createInterviewerComment: async function() {
            await axios
                .post(`/api/update_question/${this.question.id}`,{interviewer_comment: this.answer.content,opening_comment: this.question.opening_comment,interviewer_id:this.question.interviewer_id})
                .then(response => (
                    this.$router.go({path: this.$router.currentRoute.path, force: true})
                ))
        }
    },

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