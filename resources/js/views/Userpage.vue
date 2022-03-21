<template>
    <div>
        <header><Navbar></Navbar></header>

        <main>
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";

export default {
    name: "Userpage",
    components: { Navbar },
};
</script>

<style lang="scss" scoped>
main {
    margin-top: 100px;
}
</style>
