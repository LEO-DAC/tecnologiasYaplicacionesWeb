@extends ('principal')
@section ('contenido')
<!-- Ahora se personaliza el menu con los @click puesto en el menú de sidebar.blade.php -->
    <template v-if="menu==0">
        <example-component></example-component>
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
        <h3>Contenido del menú 6</h3>
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
    <template v-if="menu==11">
        <h3>Contenido del menú 11</h3>
    </template>
    <template v-if="menu==12">
        <h3>Contenido del menú 12</h3>
    </template>
@endsection
