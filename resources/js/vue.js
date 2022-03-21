window.Vue = require("vue");

import App from "./views/Userpage.vue";
import router from "./router";
const app = new Vue({
    el: "#root",
    render: (h) => h(App),
    router: router,
});
