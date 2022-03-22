<template>
    <div class="container">
        <h1>{{ postDet.postTitle }}</h1>
        <div>{{ postDet.postText }}</div>
        <div v-if="postDet.postImage !== null" class="my-img-container">
            <img class="my-post-img" :src="postDet.postImage" alt="" />
        </div>

        <div class="secondary-infos">
            <div class="my-category">
                <i class="fa-solid fa-caret-right"></i>
                <span>Category:</span>
                <div class="cat-class" v-if="postDet.category">
                    {{ postDet.category.catName }}
                </div>
                <div v-else>Nessuna Categoria selezionata</div>
            </div>

            <div class="my-tags">
                <i class="fa-solid fa-caret-right"></i>
                <span>Tags:</span>

                <div class="d-flex">
                    <div
                        class="tags-class"
                        v-for="tag of postDet.tags"
                        :key="tag.id"
                    >
                        {{ tag.type }}
                    </div>
                </div>
                <div v-if="postDet.tags">
                    <div v-if="!postDet.tags.length">Nessun tag presente</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            postDet: {},
        };
    },
    methods: {
        async decodePost() {
            try {
                const resp = await axios.get(
                    "/api/posts/" + this.$route.params.post
                );
                this.postDet = resp.data;
            } catch (er) {
                this.$router.replace({ name: "ErrorPage" });
            }
        },
    },
    mounted() {
        this.decodePost();
    },
};
</script>

<style lang="scss" scoped>
h1 {
    color: rgb(14, 126, 231);
}

.my-img-container {
    margin: 40px auto;
    width: 415px;
    height: 350px;
    border: 5px solid rgb(14, 126, 231);

    img {
        height: 100%;
        width: 100%;
        padding: 1px;
        padding-bottom: 2px;
    }
}

.secondary-infos {
    position: absolute;
    bottom: 20px;
    .my-tags,
    .my-category {
        display: flex;
        align-items: baseline;
        font-size: 0.8rem;
        margin-bottom: 8px;

        span {
            font-weight: 600;
            margin: 0 4px;
        }

        .cat-class,
        .tags-class {
            color: white;

            padding: 0 5px;
            border-radius: 5px;
        }

        .cat-class {
            background-color: green;
        }

        .tags-class {
            margin: 0 3px;
            background-color: rgb(14, 126, 231);
        }
    }
}
</style>
