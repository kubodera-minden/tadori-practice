<template>
    <div>
        <p v-show="isError">情報の取得に失敗しました。</p>
        <h1>マイページ</h1>
        <form @submit.prevent="logout">
            <button type="submit" class="btn btn-primary">ログアウト</button>
        </form>
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
    </div>
</template>
 
<script>
    export default {
        data () {
            return {
                isError: false,
                user: {}
            }
        },
        mounted() {
            console.log('Home mounted.')
        },
        created() {
            axios.post('/api/auth/me').then(res => {
                this.user = res.data;
                current_user.id = this.user.id;
            }).catch(error => {
                this.isError = true;
            });
        },
        methods: {
            logout() {
                axios.post('/api/auth/logout', {
                }).then(res => {
                    state.isLogin = false;
                    this.$router.push({path: '/'});
                }).catch(error => {
                    this.isError = true;
                });
            }
        }
    }
</script>