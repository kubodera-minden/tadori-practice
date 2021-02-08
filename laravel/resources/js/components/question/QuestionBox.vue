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
                <h1 class="h5 mb-4" v-if="content">
                    {{ content }}
                </h1>
                <div class="row d-flex justify-content-center" v-else-if="this.question.user_id == current_user.id">
                    <textarea v-model="comment" class="col-11" type="text" placeholder="お礼を書く"></textarea>
                    <div @click="createComment" class="col-2 offset-9 mt-4 btn btn-primary">送信する</div>
                </div>
                <div class="" v-else>
                    <div>回答をお待ちください</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  props: [
    'question',
    'user',
    'content'
  ],
    data: function () {
        return {
            comment: '',
        }
    },
    async mounted() {
    },
    computed: {
        current_user: function() {
            return this.$store.state.auth.currentUser;
        }
    },
    methods: {
        createComment: async function() {
            await axios
                .post(`/api/update_question/${this.question.id}`,{questioner_comment:this.comment,opening_comment: this.question.opening_comment,interviewer_comment: this.question.interviewer_comment,interviewer_id: this.question.interviewer_id,article_id: this.question.article_id})
                .then(response => (
                    this.$router.go({path: this.$router.currentRoute.path, force: true})
                ))
        },
    },
}
</script>

<style lang="scss" scoped>
.name-box {
    a {
        font-size: 2rem;
    }
}
</style>