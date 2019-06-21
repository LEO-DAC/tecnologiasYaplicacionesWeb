@extends('principal')
@section('contenido')
  <template v-if="menu==0">
  <tabla-chida></tabla-chida>
  </template>

  <template v-if="menu==1">
  <h3>Contenido del menú 1</h3> 
  </template>
  <template v-if="menu==2">
    <h3>Contenido del menú 2</h3> 
  </template>
  <template v-if="menu==3">
    <h3>Contenido del menú 3</h3> 
  </template>
  <template v-if="menu==4">
    <h3>Contenido del menú 4</h3> 
  </template>
  <template v-if="menu==5">
    <h3>Contenido del menú 5</h3> 
  </template>
  <template v-if="menu==6">
    <h3>Contenido del menú </h3> 
  </template>
  <template v-if="menu==7">
    <h3>Contenido del menú 7</h3> 
  </template>
  <template v-if="menu==8">
    <h3>Contenido del menú 8</h3> 
  </template>
  <template v-if="menu==9">
    <h3>Contenido del menú 9</h3> 
  </template>  

  <template v-if="menu==10">
    <h3>Contenido del menú 10</h3> 
  </template>
@endsection
