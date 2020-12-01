import Vue from "vue";
import VueRouter from "vue-router";
 
Vue.use(VueRouter);
 
import ArticleIndex from "./components/article/ArticleIndex.vue";
import ArticleShow from "./components/article/ArticleShow.vue";
 
const router = new VueRouter({
    mode: "history",
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
    ]
});
 
export default router;