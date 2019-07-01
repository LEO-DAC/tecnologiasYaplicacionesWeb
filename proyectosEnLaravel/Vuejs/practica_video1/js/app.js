var app = new Vue({
    el: '#app',
    data: {
       mensaje:'Hola Vue',
       suma: 4+6, 
       isVisible:false,
       nombres:["pepe","juan","pedro"], 
       contenido_html :"<h1>Hola html desde vue<h1>",
       button_html:"<input type ='text' name='ejemplo'>",
       numero:10,
       v_model:"Escribe algo"
    },
    computed: {
        // a computed getter
        reversedMessage: function () {
          // `this` points to the vm instance
          return this.mensaje.split('').reverse().join('')
        }
      },
      methods: {
        calcularSuma(val1,val2){
            return val1+val2;    
        },
        incrementar(){
            this.numero++
        },    
        decrementar(){
            this.numero--
        }
      },
      watch:{
          numero: function(val){
                console.log("watch: "+val)
          }  
      }
});