<template>
    <div>
        <p v-show="isError">認証に失敗しました。</p>
        <form @submit.prevent="login">
            <h1>ログイン</h1>
            メールアドレス: <input type="email" v-model="email">
            パスワード: <input type="password" v-model="password">
            <button type="submit" class="btn btn-primary">ログイン</button>
        </form>
    </div>
</template>
 
<script>
import axios from 'axios'

export default {
    data () {
        return {
            isError: false,
            email: '',
            password: '',
        }
    },
    mounted() {
        console.log('Login Component mounted.')
    },
    methods: {
        login() {
            axios.post('/api/auth/login', {
                email: this.email,
                password: this.password
            }).then(res => {
                const token = res.data.access_token;
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                state.isLogin = true;
                this.$router.push({path: '/home'});
            }).catch(error => {
                this.isError = true;
            });
        }
    }
}
</script>