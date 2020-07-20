<template>
    <div class="container">
        <div class="row justify-content-center teks">
            <div class="col-md-8">
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
    // props:{
    //     seen: true
    // }
}
</script>

<style>

</style>