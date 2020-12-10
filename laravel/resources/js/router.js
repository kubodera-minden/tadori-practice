import Vue from "vue";
import VueRouter from "vue-router";
 
Vue.use(VueRouter);
 
import ArticleIndex from "./components/article/ArticleIndex.vue";
import ArticleShow from "./components/article/ArticleShow.vue";

import QuestionShow from "./components/question/QuestionShow.vue";
 
 
const router = new VueRouter({
    mode: "hash",
    routes: [
        {
            path: "/",
            name: "index",
            component: ArticleIndex
        },
        {
            path: '/articles/:id(\\d+)',
            name: 'ArticleShow',
            component: ArticleShow
        },
        {
            path: '/questions/:id(\\d+)',
            name: 'QuestionShow',
            component: QuestionShow
        },
    ]
});
 
export default router;