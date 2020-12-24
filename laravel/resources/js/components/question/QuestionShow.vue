<template>
<div class="container ops-main">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="ops-title">
            {{ question.title }}
            </h1>
        </div>
    </div>

    <QuestionBox :content="question.content" :user="user"></QuestionBox>
    <AnswerBox v-if="question.opening_comment" :content="question.opening_comment" :interviewer="interviewer"></AnswerBox>
    <ArticleBox v-if="question.opening_comment" :article="article"></ArticleBox>
    <AnswerBox v-if="question.interviewer_comment" :content="question.interviewer_comment" :interviewer="interviewer"></AnswerBox>
    <QuestionBox v-if="question.questioner_comment" :content="question.questioner_comment" :user="user"></QuestionBox>

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
            .get(`/api/interviewers/${this.question.interviewer_id}`)
            .then(response => (this.interviewer = response.data))
        await axios
            .get(`/api/articles/${this.question.article_id}`)
            .then(response => (this.article = JSON.parse(response.data.content)))
    }
}
</script>

<style lang="scss" scoped>

</style>