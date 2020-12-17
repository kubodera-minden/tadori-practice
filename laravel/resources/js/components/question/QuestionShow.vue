<template>
<div class="container ops-main">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="ops-title">
            {{ question.title }}
            </h1>
        </div>
    </div>

    <QuestionBox :content="question.content"></QuestionBox>
    <AnswerBox :content="question.opening_comment"></AnswerBox>
    <ArticleBox :article="article"></ArticleBox>
    <AnswerBox :content="question.interviewer_comment"></AnswerBox>
    <QuestionBox :content="question.questioner_comment"></QuestionBox>

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
            article: [],
        }
    },
    async mounted() {
        console.log('QuestionShow mounted.')
        await axios
            .get(`/api/questions/${this.$route.params.id}`)
            .then(response => (this.question = response.data))
        await axios
            .get(`/api/articles/${this.question.article_id}`)
            .then(response => (this.article = JSON.parse(response.data.content)))
    }
}
</script>

<style lang="scss" scoped>

</style>