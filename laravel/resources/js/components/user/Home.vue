<template>
    <div>
        <p v-show="isError">情報の取得に失敗しました。</p>
        <h1>マイページ</h1>
        <div class="col-5 d-flex justify-content-center">
            <img :src="'storage/user_img/' + user.image_path" width="300" />
        </div>
        <div v-if="user.interviewer_authority == 1">
            <router-link :to="{ name: 'ArticleCreate' }" class="">記事投稿</router-link>
            <router-link :to="{ name: 'QuestionCreate' }" class="">質問投稿</router-link>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <td>{{ user.id }}</td>
            </tr>
            <tr>
                <th>ユーザー名</th>
                <td>{{ user.name }}</td>
            </tr>
            <tr>
                <th>メール</th>
                <td>{{ user.email }}</td>
            </tr>
            <tr>
                <th>Tadorist権限</th>
                <td v-if="user.interviewer_authority == 0">なし</td>
                <td v-if="user.interviewer_authority == 1">あり</td>
            </tr>
            <tr>
                <th>登録日</th>
                <td>{{ user.created_at }}</td>
            </tr>
        </table>
        <form @submit.prevent="logout">
            <button type="submit" class="btn btn-primary">ログアウト</button>
        </form>
    </div>
</template>
 
<script>
export default {
    data () {
        return {
            isError: false,
        }
    },
    mounted() {
        console.log('Home mounted.');
    },
    created() {
    },
    computed: {
        user: function() {
            return this.$store.state.auth.currentUser;
        }
    },
    methods: {
        logout() {
            this.$store.dispatch('auth/logout').then(res => {
                if (res === true) {
                    this.$router.push({path: '/'});
                } else {
                    this.isError = true;
                }
            });
        }
    }
}
</script>