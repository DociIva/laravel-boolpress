// DIPENDENZE 
import Vue from 'vue';
import VueRouter from 'vue-router';

//COMPONENTI PER LE PAGINE
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import NotFound from './pages/NotFound.vue';
import PostDetail from './pages/PostDetail.vue';

//ATTIVAZIONE DI ROUTE CON VUE
Vue.use(VueRouter);

//DEFINIZIONE ROTTE APP| MONDO JS
const router = new VueRouter({
    // # siglepage app default
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/blog/:slug',
            name: 'post-detail',
            component: PostDetail
        },  
        { 
            path: '*',
            component: NotFound
        },
        

    ]
    
});

export default router;
