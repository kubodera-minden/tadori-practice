import Vue from "vue";
import VueRouter from "vue-router";
 
Vue.use(VueRouter);

import UserEdit from "./components/user/UserEdit.vue";
 
import ArticleIndex from "./components/article/ArticleIndex.vue";
import ArticleShow from "./components/article/ArticleShow.vue";
import ArticleNew from "./components/article/ArticleNew.vue";

import QuestionIndex from "./components/question/QuestionIndex.vue";
import QuestionShow from "./components/question/QuestionShow.vue";
import QuestionCreate from "./components/question/QuestionCreate.vue";

import InterviewerShow from "./components/interviewer/InterviewerShow.vue";

const router = new VueRouter({
    mode: "hash",
    routes: [
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
    ]
});
 
export default router;