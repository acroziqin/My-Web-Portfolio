<template>
    <div class="container">
        <div class="d-flex justify-content-between">
            <h4>All Posts</h4>
            <hr>
        </div>
        <div class="row">
            <div v-for="post in posts" :key="post.id" class="col-md-4">
                <div class="card mb-3">
                    <a :href="'/posts/' + post.slug">
                        <img style="height: 270px; object-fit: cover; object-position: center" :src="'/storage/' + post.thumbnail" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <a :href="'posts' + post.slug" class="card-title">
                            {{ post.title }}
                        </a>
                        <div v-if="post.body.length<100">Welcome, {{ post.body }}</div>
                        <div v-else>Welcome, {{ post.body.substring(0,100)+".." }}</div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        Published on {{ post.published }}
                    </div>
                </div>
            </div>
        </div>
        <!-- <pagination :data="postss" @pagination-change-page="getResult"></pagination>  -->
        <!-- {{ posts.links }} -->
        <div class="d-flex justify-content-center">
            
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: [],
            // postss: [],
        };
    },

    mounted() {
        this.getPosts()
        // this.getResults(1)
    },

    methods: {
        async getPosts() {
            let { data } = await axios.get("/api/posts")
            this.posts = data.data
            console.log(this.posts)
        },

        // async getResults(page){
            // let uri = 'api/posts?page=' + page;
            // this.axios.get(uri).then(response => {
            //     return response.data;
            // }).then(data => {
            //     this.posts = data;
            // });

            // let { data } = await axios.get(`/api/posts?page=${page}`)
            // this.postss = data.data
        // }
    }
}
</script>
