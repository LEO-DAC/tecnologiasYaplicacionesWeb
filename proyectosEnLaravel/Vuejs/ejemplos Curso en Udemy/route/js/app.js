const Home = {
    template: '#homepage'
};
const About = {
    template: '#about'
};
const PageNotFound = {
    template: '#PageNotFound'
};

const User = {
    template: `<h1>Hello {{ $route.params.name }}</h1>`,
    computed: {
        name() {
            let name = this.$route.params.name;
            return name.charAt(0).toUpperCase() + name.slice(1);
        }
    }
};

const ProductPage = {
    name: 'ProductPage',
    template: `<div v-if="product">{{ this.$route.params.slug }} {{post()}}</div>`,
    computed: {
        product() {
            let product;
            product = this.$route.params.slug;
            return product;
        }
    },
};

const router = new VueRouter({
    base: '/route/',
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/about',
            redirect: '/about-us'
        },
        {
            path: '/about-us',
            component: About
        },
        {
            path: '/user/:name',
            component: User
        },
        {
            path: '/product/:slug',
            component: ProductPage
        },
        {
            path: '*',
            component: PageNotFound
        },
    ],
    linkActiveClass: 'active',
    linkExactActiveClass: 'current'
});

new Vue({
    el: '#app',
    router,
    mounted(){
        console.log(this.$route)
    }
});

