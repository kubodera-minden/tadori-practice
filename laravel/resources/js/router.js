import Vue from "vue";
import VueRouter from "vue-router";
 
Vue.use(VueRouter);
 
import ArticleIndex from "./components/article/ArticleIndex.vue";
 
const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "index",
            component: ArticleIndex
        },
    ]
});
 
export default router;