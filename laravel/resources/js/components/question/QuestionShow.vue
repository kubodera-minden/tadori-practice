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
    <AnswerBox :content="question.interviewer_comment"></AnswerBox>
    <QuestionBox :content="question.questioner_comment"></QuestionBox>

</div>

</template>

<script>

import QuestionBox from './QuestionBox.vue';
import AnswerBox from './AnswerBox.vue';

export default {
    components: {
        QuestionBox,
        AnswerBox
    },
    data: function () {
        return {
        question: [],
        }
    },
    mounted() {
        console.log('QuestionShow mounted.')
        axios
            .get(`/api/questions/${this.$route.params.id}`)
            .then(response => (this.question = response.data))
    }
}
</script>

<style lang="scss" scoped>

</style>