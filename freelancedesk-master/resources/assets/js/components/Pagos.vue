<template>
  <div>
    <div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">Pagos</h2>
              <div>
                <div class="page-header-tools">
                    <div class="col-xl-12 d-flex align-items-center mb-3">
                        <button v-show="tipoUsuario=='ProjectManager'" @click="newModal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-large"> <i class="ti-money"></i> Nuevo pago</button>
                    </div>    
                </div>
              </div>
          </div>
        </div>
    </div>
      
    <!-- Aqui inicia el modal -->
    <!-- End Page Header -->
    <div class="modal fade" id="modalNew">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <form @submit.prevent="editmode ? actualizarPago() : registrarPago()" method="post">


                  <div class="modal-header">

                    <h4 class="modal-title" v-show="!editmode" id="modalNewLabel"> Registrar nuevo pago </h4>
                    <h4 class="modal-title" v-show="editmode" id="modalNewLabel"> Actualizar datos del pago </h4>

                      <button type="button" class="close" data-dismiss="modal">
                          <span aria-hidden="true">×</span>
                          <span class="sr-only">close</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <!-- Form -->
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Fecha </label>
                            <div class="col-lg-5">
                              <div class="input-group">
                                  <span class="input-group-addon">
                                      <i class="la la-calendar"></i>
                                  </span>
                                  <input type="date" id="date" placeholder="Selecciona una fecha"   v-model="form.fecha"   :class="{ 'is-invalid': form.errors.has('fecha') }"  class="form-control" required="">
                                  <has-error :form="form" field="fecha"></has-error>
                              </div>                                    
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Beneficiaro del pago</label>
                            <div class="col-lg-8">
                              <div class="input-group">
                                <select required v-model="form.id_beneficiario" :class="{ 'is-invalid': form.errors.has('id_beneficiario') }" id="id_beneficiario" name="id_beneficiario" class="custom-select form-control" >
                                                                      <!-- se valdia que no se pueda hacer un abono al mismo project manager o al desarrollador de otro poroyecto--> 
                                  <option v-for="usuario in usuarios" v-show="usuario.user_id!=idUsuarioLoggeado
                                                                              && usuario.id_proyecto== idProyecto" :value="usuario.user_id" :key="usuario.user_id">
                                    {{ usuario.nombre+' / '+usuario.email }}
                                  </option>

                                </select>
                                <has-error :form="form" field="id_beneficiario"></has-error>

                              </div>

                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Monto</label>
                            <div class="col-lg-8">
                              <div class="input-group">
                                <span class="input-group-addon addon-primary">$</span>
                                <input required type="number"  class="form-control" v-model="form.monto" :class="{ 'is-invalid': form.errors.has('monto') }" id="monto" name="monto" >
                                <has-error :form="form" field="monto"></has-error>

                              </div>

                            </div>
                        </div>

                    
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Descripción</label>
                            <div class="col-lg-8">
                                  <textarea v-model="form.descripcion"   :class="{ 'is-invalid': form.errors.has('descripcion') }"  class="form-control" placeholder="Escribe tu comentario aqui..." required></textarea>

                                    <has-error :form="form" field="descripcion"></has-error>
                                </div>
                        </div>
                                  


                      <!-- End Form -->
                  </div>
                  <div class="modal-footer ">
                      <button v-show="!editmode" class="btn btn-primary" type="reset"> <i class="fas fa-broom"></i> Limpiar </button>
                      <button type="button" class="btn btn-shadow btn-danger" data-dismiss="modal"> <i class="fas fa-ban"></i> Cancelar</button>

                      <button v-show="editmode" class="btn btn-warning" type="submit"> <i class="fas fa-save"></i> Actualizar</button>
                      <button v-show="!editmode" class="btn btn-success" type="submit"> <i class="fas fa-save"></i> Guardar</button>


                  </div>

                </form>

            </div>
        </div>
    </div>
    <!-- End Large Modal -->  
                            
            <!-- End Page Header -->
            <div class="row">
                <div class="col-xl-12">
                    <!-- Default -->
                    <div class="widget has-shadow">
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th v-show="tipoUsuario=='ProjectManager'" >beneficiaro</th>
                                            <th>monto</th>
                                            <th>descripción</th>
                                            <th>fecha</th>
                                            <th v-show="tipoUsuario=='ProjectManager'" >Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="pago in pagos" :key="pago.id">

                                            <td v-show="tipoUsuario=='ProjectManager'" ><span class="text-primary"> {{ pago.nombre }} </span></td>
																						<td> {{ '$'+pago.monto }}</td>		
                                            <td> {{ pago.descripcion}}</td>
                                            <td> {{ pago.fecha }}</td>
                                            <td v-show="tipoUsuario=='ProjectManager'" class="td-actions">
                                              <button @click="editModal(pago)" class="btn btn-warning"> 
                                                  <i class="la la-edit"></i> Editar
                                              </button>

                                              <button @click="eliminarPago(pago.id)" class="btn btn-danger">
                                                  <i class="la la-close"></i> Eliminar 
                                              </button>
                                            </td>

                                        </tr>

                                     </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Default -->
                    <!-- Hover -->
              </div>
           </div>
        <!-- End Row -->
        </div>
        <!-- End Container -->
        <!-- End Offcanvas Sidebar -->
    </div>
</template>

<script>
  export default {
			props: ['tipoUsuario', 'idProyecto', 'idUsuarioLoggeado'],
      data() {

          return{
              editmode: false,
              usuarios: {},
              pagos:{},
              form: new Form({
                  id: '',
                  id_beneficiario: '',
                  id_benefactor:this.idUsuarioLoggeado,
                  monto:'',
                  descripcion:'',
                  fecha:''
              })
          }
      },
      methods: {

        editModal(pago){
            this.editmode = true;
            this.form.reset();
            this.form.clear();
            $('#modalNew').modal('show');
            this.form.fill(pago);
        },

        newModal(){
            this.editmode = false;
            this.form.reset();
            $('#modalNew').modal('show');
        },

        eliminarPago(id){
            swal.fire({
                title: '¿Estás seguro?',
                text: "Esto no se puede revertir!",
                type: 'Advertencia',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrarlo!'
            }).then((result) => {

                //Send request to the server
                if (result.value) {
                  	axios.delete('api/pagos/destroy', {params: {id: id}}).then( ()=>{  

                        swal.fire(
                            'Eliminado!',
                            'El pago ha sido eliminado.',
                            'success'
                        )

                        Fire.$emit('cargarPagos');

                    }).catch( ()=>{
                        swal("Falló!", "Se presentó un problema.", "Advertencia");
                    } );
                }

            })

        },

        actualizarPago(){
            this.$Progress.start();

            this.form.put('api/pagos/'+ this.form.id )
            .then( ()=> {
                $('#modalNew').modal('hide');
                swal.fire(
                    'Actualizado!',
                    'El pago ha sido actualizado.',
                    'success'
                )

                this.$Progress.finish();
                Fire.$emit('cargarPagos');
            })
            .catch( () => {
                this.$Progress.fail();
            });
        },

        registrarPago(){
            this.$Progress.start();
            hola = this.form.post('api/pagos')
            .then( () =>{

                Fire.$emit('cargarPagos');
                $('#modalNew').modal('hide');
                toast.fire({
                    type: 'success',
                    title: 'pago guardado correctamente'
                })
                this.$Progress.finish();

            })
            .catch( () => {
                toast.fire({
                    type: 'error',
                    title: 'No se pudieron guardar los datos'
                })
            })

            console.log(hola);

        },
        cargarPagos(){
          axios.get("api/pagos?id="+this.idUsuarioLoggeado).then( ({ data }) => (this.pagos = data.data) );
        },
        
        obtenerUsuarios(){
          axios.get("api/usuarios_proyectos?id="+this.idUsuarioLoggeado).then( ({ data }) => (this.usuarios = data.data) );
        }
        
      },
      created() {
				console.log(this.tipoUsuario + ' idProyecto ' + this.idProyecto + ' idUsuarioLoggeado ' + this.idUsuarioLoggeado);
        this.obtenerUsuarios();
        this.cargarPagos();
        Fire.$on('cargarPagos', ()=> {
            this.cargarPagos();
        });
          //console.log('Component mounted.')
      }
  }
</script>