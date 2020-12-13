import VueRouter from 'vue-router';
import Vue from 'vue';
import HomeContent from '../components/HomeContent';
import Profile from '../components/pages/Profile';
import Video from '../components/pages/Video';
Vue.use(VueRouter)

const router = new VueRouter({
  routes: [
    {path: '/', component: HomeContent},
    {path:"/profiles",component:Profile},
    {path:"/video",component:Video}
  ]
});

export default router;