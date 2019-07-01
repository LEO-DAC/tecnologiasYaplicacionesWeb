const router = new VueRouter({
    base:"rutas",
    routes:[
        {
            path:'/list_person',
            component:ListPerson
        },
        {
            path:'/list_programing',
            component:ListPrograming
        }
    ]
})

var app = new Vue({
    router,
    el: '#app',
});
