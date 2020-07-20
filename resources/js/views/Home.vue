<template>
    <div class="container">
        <div class="row justify-content-center teks">
            <div class="col-md-8">
                <!-- <div v-if="!isLoggedIn">Login</div>
                <div v-if="!isLoggedIn">Login</div> -->
                <div class="card">
                    <div id="clickToHide" class="card-header">Dashboard</div>

                    <div class="card-body">
                        <!-- @if (session('status')) -->
                        <!-- <div class="alert alert-success" role="alert"> -->
                        <!-- {{ session('status') }} -->
                        <!-- </div> -->
                        <!-- @endif -->

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    // methods: {
    //     logout() {
    //         this.$store.dispatch("logout");
    //     }
    // },
    // computed: {
    //     isLoggedIn() {
    //         return this.$store.getters.isLoggedIn;
    //     }
    }
};
</script>

<style></style>
