const Home = {
    template: '#homepage'
};
const About = {
    template: '#about'
};

const router = new VueRouter({
    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/about',
            component: About
        }
    ]
});

new Vue({
    el: '#app',
    router
});

