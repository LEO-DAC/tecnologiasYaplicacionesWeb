<template>
    <div>
        <div class="container-fluid">
            <!-- Begin Page Header-->
              <div class="row">
                  <div class="page-header">
                      <div class="d-flex align-items-center">
                          <h2 class="page-header-title">Empresas </h2>
                          <div>
                          <div class="page-header-tools">
                              <div class="col-xl-12 d-flex align-items-center mb-3">
                                  <button type="button" @click="nuevaEmpresa()" class="btn btn-primary" data-toggle="modal" data-target="#addEmpresa"> <i class="fas fa-plus"></i> Nueva empresa</button>
                              </div>    
                          </div>
                          </div>
                      </div>
                  </div>
              </div>      
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
                                            <th>Nombre</th>
																						<th>Teléfono</th>
                                            <th>Código postal</th>
																						<th>Localización</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="empresa in empresas" :key="empresa.id">
                                            <td> {{empresa.nombre}} </td>
                                            <td> {{empresa.telefono}} </td>
																						<td> {{empresa.CP}} </td>						
                                            <td> {{empresa.pais}}, {{empresa.estado}}, {{empresa.ciudad}} </td>
                                            <td class="td-actions">
                                                <button @click="editModal(empresa)" class="btn btn-warning"> 
                                                    <i class="la la-edit"></i> Editar
                                                </button>
                                                <button @click="deleteEmpresa(empresa.id)" class="btn btn-danger">
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
         </div>
      
      
                    <div class="modal fade" id="addEmpresa">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form @submit.prevent="editmode ? actualizarEmpresa() : createEmpresa()"  method="post">
                                  <div class="modal-header">

                                    <h4 class="modal-title" v-show="!editmode" id="modalNewLabel"> Registrar nueva empresa </h4>
                                    <h4 class="modal-title" v-show="editmode" id="modalNewLabel"> Actualizar empresa </h4>

                                      <button type="button" class="close" data-dismiss="modal">
                                          <span aria-hidden="true">×</span>
                                          <span class="sr-only">close</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <!-- Form -->
                                        <div class="form-group row d-flex align-items-center mb-5">
                                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre</label>
                                            <div class="col-lg-8">
                                              <div class="input-group">
                                                  <input v-model="form.nombre" 
                                                  type="text" name="nombre" class="form-control" :class="{'is-invalid': form.errors.has('nombre')}">
                                                  <has-error :form="form" field="nombre"></has-error>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group row d-flex align-items-center mb-5">
                                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Código postal</label>
                                            <div class="col-lg-8">
                                              <div class="input-group">
                                                  <input v-model="form.CP" 
                                                  type="number" name="CP" class="form-control" :class="{'is-invalid': form.errors.has('CP')}">
                                                  <has-error :form="form" field="CP"></has-error>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group row d-flex align-items-center mb-5">
                                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Pais</label>
                                            <div class="col-lg-8">
                                              <div class="input-group">
                                                  <input v-model="form.pais" 
                                                  type="text" name="pais" class="form-control" :class="{'is-invalid': form.errors.has('pais')}">
                                                  <has-error :form="form" field="pais"></has-error>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group row d-flex align-items-center mb-5">
                                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Estado</label>
                                            <div class="col-lg-8">
                                              <div class="input-group">
                                                  <input v-model="form.estado" type="text" name="estado" class="form-control" :class="{'is-invalid': form.errors.has('estado')}">
                                                  <has-error :form="form" field="estado"></has-error>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group row d-flex align-items-center mb-5">
                                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Ciudad</label>
                                            <div class="col-lg-8">
                                              <div class="input-group">
                                                  <input v-model="form.ciudad" 
                                                  type="text" name="ciudad" class="form-control" :class="{'is-invalid': form.errors.has('ciudad')}">
                                                  <has-error :form="form" field="ciudad"></has-error>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group row d-flex align-items-center mb-5">
                                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Teléfono</label>
                                            <div class="col-lg-8">
                                              <div class="input-group">
                                                  <input v-model="form.telefono" 
                                                  type="text" name="telefono" class="form-control" :class="{'is-invalid': form.errors.has('telefono')}">
                                                  <has-error :form="form" field="telefono"></has-error>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group row d-flex align-items-center mb-5">
                                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Dirección</label>
                                            <div class="col-lg-8">
                                              <div class="input-group">
                                                <textarea v-model="form.direccion" 
                                                  type="text" name="direccion" class="form-control" :class="{'is-invalid': form.errors.has('direccion')}"></textarea>
                                                  <has-error :form="form" field="direccion"></has-error>
                                              </div>
                                            </div>
                                        </div>
                            <!-- End Form -->
                        </div>
                        <div class="modal-footer ">
                            <button  class="btn btn-primary" type="reset"> <i class="fas fa-broom"></i> Limpiar </button>
                            <button type="button" class="btn btn-shadow btn-danger" data-dismiss="modal"> <i class="fas fa-ban"></i> Cancelar</button>
                            <button v-show="!editmode" class="btn btn-success" type="submit"> <i class="fas fa-save"></i> Guardar</button>
												    <button v-show="editmode" class="btn btn-warning" type="submit"> <i class="fas fa-save"></i> Actualizar</button>
                        </div>
                      </form>
                    </div>
                 </div>
              </div>
            <!-- End Large Modal -->

      </div>                   
</template>

<script>
    export default {
        props: ['tipoUsuario', 'idProyecto', 'idUsuarioLoggeado'],
        data() {

            return{
                editmode: false,
                id_empresa: '',
                usuarios: {},
                proyectos: {},
                empresas: {},
                tipos:{},
                usuarios_proyectos:{},
                form: new Form({
                    nombre: '',
                    CP: '',
                    pais: '',
                    estado: '',
                    ciudad: '',
                    telefono: '',
                    direccion: ''
                })
            }
        },
        methods: {
            nuevaEmpresa(){
              this.editmode = false;
            },
            editModal(empresa){
                this.editmode = true;
                this.id_empresa = empresa.id;
                this.form.reset();
                this.form.clear();
                $('#addEmpresa').modal('show');
                this.form.fill(empresa);
            },
            actualizarEmpresa(){
                this.$Progress.start();
                this.form.put('api/empresas/'+ this.id_empresa)
                .then( ()=> {
                    $('#addEmpresa').modal('hide');
                    swal.fire(
                        'Actualizado!',
                        'Empresa ha sido actualizada.',
                        'success'
                    )
                    
                    this.$Progress.finish();
                    Fire.$emit('AfterCreate');
                })
                .catch( () => {
                    this.$Progress.fail();
                });
            },
            deleteEmpresa(id){
                window.dialog_delete.fire({
                    title: 'Verifique su acción',
                    text: "Se eliminará el registro completamente",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, eliminar',
                    cancelButtonText: 'Cancelar.',
                    reverseButtons: true
                    }).then((result) => {  
                        if (result.value) {
                            this.form.delete('api/empresas/'+id).then(()=>{   
                                    window.dialog_delete.fire(
                                        'Eliminado.',
                                        'Registro borrado exitosamente',
                                        'success'
                                    )
                                    window.Fire.$emit('AfterCreate');

                            }).catch(()=>{
                                window.dialog_delete.fire(
                                    'Error.',
                                    'Algo anda mal, no se eliminó el registro.',
                                    'warning'
                                );
                            });
                        }
                    });
            },
            loadEmpresas(){
                axios.get("api/empresas").then(({data}) => (this.empresas = data.data));
            },
            createEmpresa(){
                this.$Progress.start()
                this.form.post('api/empresas');
                window.Fire.$emit('AfterCreate');
                this.loadEmpresas();
                window.toast.fire({
                    type: 'success',
                    title: 'Guardado'
                })
                //this.users = {}
                //this.loadUsers();
                this.$Progress.finish()
                $('#addEmpresa').modal('hide')
            }
        },
        created(){
            this.loadEmpresas();
            window.Fire.$on('AfterCreate',() => {
                this.loadEmpresas();
            });
           // setInterval(() => this.loadUsers(),3000);
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
