<template>
    <div>
        <header><Navbar></Navbar></header>

        <main class="container">
            <h1>Post pubblicati</h1>

            <div class="my-card-cont">
                <post-card
                    v-for="post of postToPrint"
                    :key="post.id"
                    :post="post"
                ></post-card>
            </div>
        </main>
    </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import PostCard from "../components/PostCard.vue";
import axios from "axios";

export default {
    name: "Userpage",
    components: { Navbar, PostCard },
    data() {
        return { postToPrint: [] };
    },

    methods: {
        decodePostJson() {
            axios.get("/api/posts").then((resp) => {
                this.postToPrint = resp.data;
            });
        },
    },

    mounted() {
        this.decodePostJson();
    },
};
</script>

<style lang="scss" scoped>
main {
    margin-top: 100px;

    h1 {
        color: rgb(14, 126, 231);
    }

    .my-card-cont {
        margin-top: 40px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
}
</style>
