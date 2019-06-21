//crear objeto con instancia a Vue

var app = new Vue({
     //propiedades
    //Propiedad el: Permite especificar que elementos del DOM será controlado por nuestra 
    //instancia de VUe.
    el : '#app',
    
    //CAPA DATOS QUE INTERACTUA CON EL DOM:
    //Propiedad data: Permite almacenar las propiedades que queremos exponer 
    //en nuestro template
    //y para acceder solo tenemos que usar {{}}
    data : {
        lista : [
        ],
        nombre : '',
        promedio : ''
    },

    methods : {
        agregarNota: function (){
            estadoA=false;
            if (this.promedio>=12.5){
                estadoA=true;
            }
            if (this.nombre!="" && this.promedio!=""){
                this.lista.push({nombre:this.nombre, promedio:this.promedio, estado:estadoA});
                this.nombre="";
                this.promedio="";
            }
            else{
                alert ("Ingrese el nombre y promedio del estudiante");
            }
        }
    }
})