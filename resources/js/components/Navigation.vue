<template>
    <router-link :to="{ name: 'posts' }" class="nav-link" id="hide">Posts</router-link>
</template>

<script>

    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
