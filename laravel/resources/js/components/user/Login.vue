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
            this.$store.dispatch('auth/login', {
                email: this.email,
                password: this.password
            }).then(res => {
                if (res === true) {
                    this.$router.push({path: '/home'});
                } else {
                    this.isError = true;
                };
            })
        }
    }
}
</script>