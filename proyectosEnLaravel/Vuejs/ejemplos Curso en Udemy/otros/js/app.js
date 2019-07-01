var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue',
        sum: 3 + 6,
        value: 6,
        isVisible: true,
        people:["Andres","Juan","Pepe","Alejandro"],
        content_html: "<h1>Hola Mundo</h1>",
        src: "http://localhost/blogigniter/uploads/post/esto-es-una-prueba-de-un-post.png",
        text:"Descripción de nuestra image",
        numero: 13,
        v_model: "Hola V-modal",
        p_error : false
    },
    computed: {
        // a computed getter
        reversedMessage: function () {
            // `this` points to the vm instance
            return this.message.split('').reverse().join('')
        }
    },
    methods: {
        calculateSum(value1, value2){
            return value1 + value2;
        },
        incrementar(){
            this.numero++  
        },
        decrementar(){
            this.numero--
        }
    },
    watch: {
        numero: function(val){
            console.log("watch: "+val)
        }
    }
});
