<template>
    <div class="container my-div">
        <h1>Post pubblicati</h1>

        <div class="my-card-cont">
            <post-card
                v-for="post of postToPrint"
                :key="post.id"
                :post="post"
            ></post-card>
        </div>
        <nav>
            <ul class="my-pages">
                <li v-for="page in pagination.last_page" :key="page">
                    <a class="my-page-link" @click="decodePostJson(page)">
                        {{ page }}
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import PostCard from "../components/PostCard.vue";
import axios from "axios";

export default {
    components: { PostCard },
    data() {
        return { postToPrint: [], pagination: {} };
    },

    methods: {
        async decodePostJson(page = 1) {
            if (page < 1) {
                page = 1;
            }
            if (page > this.pagination.last_page) {
                page = this.pagination.last_page;
            }

            /*  axios.get("/api/posts").then((resp) => {
                this.postToPrint = resp.data;
            }); */

            const resp = await axios.get("/api/posts?page=" + page);
            this.pagination = resp.data;
            this.postToPrint = resp.data.data;
        },
    },

    mounted() {
        this.decodePostJson();
    },
};
</script>

<style lang="scss" scoped>
.my-div {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    h1 {
        color: rgb(14, 126, 231);
    }

    .my-card-cont {
        margin-top: 40px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .my-page-link {
        margin-left: 10px;
        font-size: 18px;
        background: white;
        padding: 5px 10px;
        border-radius: 50%;
        box-shadow: 0px 1px 10px 1px rgb(14, 126, 231);
    }
}
</style>
