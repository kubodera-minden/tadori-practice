import ArticleIndex from "./components/article/ArticleIndex.vue";

require('./bootstrap');

window.Vue = require('vue');

import Vue from "vue";
import store from './store/index';
import router from "./router";

// WEBストレージにアクセストークンがあったらaxiosのヘッダーに埋め込む。
if (sessionStorage.getItem('TadoriApp')){
    const strageData = JSON.parse(sessionStorage.getItem('TadoriApp'));
    if (strageData.auth.token){
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + strageData.auth.token;
    }
}

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('article-index', ArticleIndex);

const app = new Vue({
    el: '#app',
    router: router,
    store
});
