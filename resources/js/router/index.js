import { createRouter,createWebHashHistory } from "vue-router";
const router=createRouter({
    history:createWebHashHistory(),
    routes:[
        {
            path:'/',
            name:'home',
           // component:()=>import('../pages/home.vue')

        },
        {
            path:'/items',
            name:'items',
            component:()=>import('../pages/items.vue')

        }
    ]
})
export default router