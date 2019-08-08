<template>
    <div>
        <h1>Galeria de fotos{{$route.params.id}}</h1>
        <Foto />    
        <button @click="home">home</button>   
    </div>
</template>

<script>
import Foto from "@/components/Foto.vue";
    export default {
       name: 'Fotos',
       components:{
           Foto
       },
       methods:{
           home(){
               this.$router.push('/')
           }
       } 
    }
</script>
