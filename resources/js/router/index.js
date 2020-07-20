import Post from '../views/Post'

export default {
    mode: 'history',
    linkActiveClass: 'active',
    routes: [
        {
            path: '/posts',
            name: 'posts',
            component: Post
        }
    ]
}