<template>
<div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">記事一覧</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <table class="table text-center">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">タイトル</th>
                <th class="text-center">内容</th>
                <th class="text-center">削除</th>
            </tr>
            <tr v-for="(question,$index) in questions" :key="$index">
                <td>
                    <router-link :to="{ name: 'QuestionShow', params: { id: question.id } }">{{question.id}}</router-link>
                </td>
                <td>{{ question.title }}</td>
                <td>{{ question.content }}</td>
                <td>
                <!-- <form action="/question/{{ $question->id }}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form> -->
                <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
                </td>
            </tr>
            </table>
        </div>
    </div>

</div>
</template>

<script>
import axios from 'axios';

export default {
    data: function () {
        return {
            questions: [],
        }
    },

    mounted() {
        console.log('QuestionIndex mounted.')
        axios
            .get('/api/questions')
            .then(response => (this.questions = response.data))
    },
}
</script>

<style lang="scss" scoped>

</style>