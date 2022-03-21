import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./pages/Home.vue";
import Contacts from "./pages/Contacts.vue";
import ShowPost from "./pages/postsPartials/ShowPost.vue";

//avendo indicato tramite metodo statico a vue che vogliamo usare VueRouter, allora vue farà sì che venga aggiunta da vue router la chiave router
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "//",
            component: Home,
            name: "home.index",
            meta: { title: "HomePage", linkText: "Home" },
        },
        {
            path: "/contacts",
            component: Contacts,
            name: "contacts.index",
            meta: { title: "Contacts", linkText: "Contacts" },
        },
        {
            path: "/posts/:post",
            component: ShowPost,
            name: "posts.show",
            meta: { title: "Show Post" },
        },
    ],
});

router.beforeEach((to, from, next) => {
    //permette di cambiare il titolo della pagina in base al meta
    document.title = to.meta.title;

    next();
});

//quando importo il file dall'altra parte, il defaulte indica che dando un nome all'input avrò come risultato questa istanza
export default router;

//il valore della chiave router deve essere un'istanza di vue router
