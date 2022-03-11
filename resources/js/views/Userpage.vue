<template>
    <div class="container my-margin">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-card">
                    <div class="card-header my-cHeader">
                        Esempio dell'uso di Vue
                    </div>

                    <div class="card-body my-cBody">
                        Sono un esempio, che figo!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Userpage",
};
</script>

<style lang="scss" scoped>
.my-margin {
    margin-top: 30px;

    .my-card {
        background-color: black;
        color: yellowgreen;
        border: 5px solid rgb(126, 209, 2);

        .my-cHeader,
        my-cBody {
            border-color: rgb(126, 209, 2);
        }
    }
}
</style>
