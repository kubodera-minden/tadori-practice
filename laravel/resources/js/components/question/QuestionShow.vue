<template>
<div class="container ops-main">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="ops-title">
              {{ question.title }}
            </h1>
        </div>
    </div>

    <QuestionBox :content="question.content" :question="question" :user="user"></QuestionBox>

    <div v-if="question.interviewer_id == 0 && current_user.interviewer_authority == 1" @click="LinkToQuestion" class="btn btn-primary">この質問をたどる</div>

    <AnswerBox v-if="question.interviewer_id" :content="question.opening_comment" :question="question" :interviewer="interviewer"></AnswerBox>
    <ArticleBox v-if="question.opening_comment" :content="articleContent" :product_id="article.product_id"></ArticleBox>
    <AnswerBox v-if="question.opening_comment" :content="question.interviewer_comment" :question="question" :interviewer="interviewer"></AnswerBox>
    <QuestionBox v-if="question.interviewer_comment" :content="question.questioner_comment" :question="question" :user="user"></QuestionBox>

</div>

</template>

<script>

import QuestionBox from './QuestionBox.vue';
import AnswerBox from './AnswerBox.vue';
import ArticleBox from '../article/ArticleBox.vue';

export default {
    components: {
        QuestionBox,
        AnswerBox,
        ArticleBox,
    },
    data: function () {
        return {
            question: [],
            user: [],
            interviewer: [],
            article: [],
            articleContent: "",
            // current_user: current_user,
        }
    },
    async mounted() {
        console.log('QuestionShow mounted.')
        await axios
            .get(`/api/questions/${this.$route.params.id}`)
            .then(response => (this.question = response.data))
        await axios
            .get(`/api/users/${this.question.user_id}`)
            .then(response => (this.user = response.data))
        await axios
            .get(`/api/users/${this.question.interviewer_id}`)
            .then(response => (this.interviewer = response.data))
        await axios
            .get(`/api/articles/${this.question.article_id}`)
            .then(response => (this.article = response.data,this.articleContent = JSON.parse(response.data.content)))
    },
    computed: {
        current_user: function() {
            return this.$store.state.auth.currentUser;
        }
    },
    methods: {
      LinkToQuestion: function () {
        axios
            .post(`/api/update_question/${this.question.id}`,{title: this.question.title,content: this.question.content,user_id: this.question.user_id,interviewer_id: this.current_user.id})
            .then(response => (
                this.question.interviewer_id = this.current_user.id
            ))
      },
    },
}
</script>

<style lang="scss" scoped>

</style>