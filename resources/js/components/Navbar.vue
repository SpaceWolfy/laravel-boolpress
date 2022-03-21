<template>
    <nav class="navbar navbar-expand-lg navigation-bar">
        <a class="navbar-brand" href="/login">Boolpress</a>

        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li
                    class="nav-item active"
                    v-for="route in routesArray"
                    :key="route.path"
                >
                    <router-link class="nav-link" :to="route.path">{{
                        route.meta.linkText
                    }}</router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            routesArray: [],
        };
    },
    mounted() {
        this.routesArray = this.$router
            .getRoutes()
            .filter((route) => !!route.meta.linkText);
    },
};
</script>

<style>
.navbar-brand {
    font-size: 25px;
}
</style>
