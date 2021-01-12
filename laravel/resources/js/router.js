import Vue from "vue";
import VueRouter from "vue-router";
 
Vue.use(VueRouter);

import UserEdit from "./components/user/UserEdit.vue";
import Home from "./components/user/Home.vue";
import Login from "./components/user/Login.vue";
 
import ArticleIndex from "./components/article/ArticleIndex.vue";
import ArticleCreate from "./components/article/ArticleCreate.vue";
import ArticleShow from "./components/article/ArticleShow.vue";
import ArticleNew from "./components/article/ArticleNew.vue";

import QuestionIndex from "./components/question/QuestionIndex.vue";
import QuestionShow from "./components/question/QuestionShow.vue";
import QuestionCreate from "./components/question/QuestionCreate.vue";

import InterviewerShow from "./components/interviewer/InterviewerShow.vue";

import ProductIndex from "./components/product/ProductIndex.vue";
import ProductShow from "./components/product/ProductShow.vue";

const router = new VueRouter({
    mode: "hash",
    routes: [
        {
            path: '/home',
            name: 'Home',
            component: Home,
            meta: { requiresAuth: true }
        },
        {
            path: '/login',
            name: 'Login',
            component: Login
        },
        {
            path: '/users/:id(\\d+)',
            name: 'UserEdit',
            component: UserEdit
        },
        {
            path: "/",
            name: "index",
            component: ArticleIndex
        },
        {
            path: "/articles/create",
            name: "ArticleCreate",
            component: ArticleCreate
        },
        {
            path: '/articles/:id(\\d+)',
            name: 'ArticleShow',
            component: ArticleShow
        },
        {
            path: '/articles/new',
            name: 'ArticleNew',
            component: ArticleNew
        },
        {
            path: '/questions',
            name: 'QuestionIndex',
            component: QuestionIndex
        },
        {
            path: '/questions/:id(\\d+)',
            name: 'QuestionShow',
            component: QuestionShow
        },
        {
            path: '/questions/create',
            name: 'QuestionCreate',
            component: QuestionCreate
        },
        {
            path: '/interviewers/:id(\\d+)',
            name: 'InterviewerShow',
            component: InterviewerShow
        },
        {
            path: '/products',
            name: 'ProductIndex',
            component: ProductIndex
        },
        {
            path: '/products/:id(\\d+)',
            name: 'ProductShow',
            component: ProductShow
        },
    ]
});

router.beforeEach((to,from,next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (state.isLogin === false) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next();
    }
});
 
export default router;