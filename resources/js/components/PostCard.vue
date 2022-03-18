<template>
    <div class="col-12">
        <div class="my-card">
            <div class="in-card">
                <div class="my-card-info">
                    <h5 class="card-title">
                        {{ post.postTitle }} -
                        <span>{{ post.user.name }}</span> -
                        <span>{{ post.created_at }}</span>
                    </h5>
                    <div class="card-text">
                        {{ post.postText }}
                    </div>

                    <div class="secondary-infos">
                        <div class="my-category">
                            <i class="fa-solid fa-caret-right"></i>
                            <span>Category:</span>
                            <div class="cat-class" v-if="post.category">
                                {{ post.category.catName }}
                            </div>
                        </div>

                        <div class="my-tags">
                            <i class="fa-solid fa-caret-right"></i>
                            <span>Tags:</span>

                            <div v-if="post.tags.type !== null" class="d-flex">
                                <div
                                    class="tags-class"
                                    v-for="tag of post.tags"
                                    :key="tag.id"
                                >
                                    {{ tag.type }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-img" v-if="post.postImage !== null">
                    <div class="arrow-down"></div>
                    <img :src="post.postImage" alt="" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        post: Object,
    },
};
</script>

<style lang="scss" scoped>
.my-card {
    background-color: #ffffff;
    margin-bottom: 40px;
    box-shadow: 0px 1px 10px 1px rgb(14, 126, 231);
    border-radius: 10px;
    overflow: hidden;
    position: relative;

    .in-card {
        display: flex;
        justify-content: space-between;

        .my-card-info {
            padding: 40px 40px;
            .card-title {
                font-size: 1.25rem;

                span {
                    font-size: 1rem;
                    color: rgb(14, 126, 231);
                }
                span:last-child {
                    font-size: 0.8rem;
                    color: rgb(14, 126, 231);
                }
            }

            .card-text {
                font-size: 0.95rem;
                margin-bottom: 60px;
                line-height: 25px;
            }

            .secondary-infos {
                position: absolute;
                bottom: 0;
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
        }

        .my-img {
            max-height: 280px;
            min-height: 250px;
            max-width: 250px;
            position: relative;

            img {
                height: 100%;
                width: 100%;
            }

            .arrow-down {
                width: 0;
                height: 0;
                border-right: 50px solid transparent;
                position: absolute;

                border-top: 280px solid rgb(255, 255, 255);
            }
        }
    }
}
</style>
