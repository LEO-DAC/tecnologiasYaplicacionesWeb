@extends('principal')
@section('contenido')
  <template v-if="section=='Escritorio'">
 <example-component></example-component>
  </template>

  <template v-if="section=='Almacen'">
    <h1>contenido de Almacen </h1>
  </template>

  <template v-if="section=='Categorias'">
  <categorias-component></categorias-component>  
  </template>
  <template v-if="section=='Articulos'">
   <h1>Articulos</h1>
  </template>
  <template v-if="section=='Compras'">
    <h1>Compras</h1>
  </template>
  <template v-if="section=='Ingresos'">
   <h1>Ingresos</h1>
  </template>
  <template v-if="section=='Proveedores'">
    <h1>Proveedores</h1>
  </template>
  <template v-if="section=='Ventas'">
    <h1>Ventas</h1>
  </template>
  <template v-if="section=='Ventas2'">
    <h1>Ventas2</h1>
  </template>
  <template v-if="section=='Clientes'">
    <h1>Clientes</h1>
  </template>


@endsection
