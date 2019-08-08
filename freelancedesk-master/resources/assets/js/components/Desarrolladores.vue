<template>
    <div>
        <div class="container-fluid">
            <!-- Begin Page Header-->
              <div class="row">
                  <div class="page-header">
                      <div class="d-flex align-items-center">
                          <h2 class="page-header-title">Desarrolladores</h2>
                          <div>
                          <div class="page-header-tools">
                              <div class="col-xl-12 d-flex align-items-center mb-3">
                                  <button @click="newModal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-large"> <i class="la la-user-plus"></i> Nuevo desarrollador</button>
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

              <form @submit.prevent="editmode ? actualizarDesarrollador() : registrarDesarrollador()" method="post">


                  <div class="modal-header">

                    <h4 class="modal-title" v-show="!editmode" id="modalNewLabel"> Registrar nuevo desarrollador </h4>
                    <h4 class="modal-title" v-show="editmode" id="modalNewLabel"> Actualizar datos del desarrollador </h4>

                      <button type="button" class="close" data-dismiss="modal">
                          <span aria-hidden="true">×</span>
                          <span class="sr-only">close</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <!-- Form -->
                                  <div class="form-group row d-flex align-items-center mb-5">
                                      <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Proyecto</label>
                                      <div class="col-lg-8">
                                        <div class="input-group">
                                          <select v-model="form.id_proyecto" :class="{ 'is-invalid': form.errors.has('id_proyecto') }" id="id_proyecto" name="id_proyecto" class="custom-select form-control" >
                                                  
                                            <option v-for="proyecto in proyectos" v-show="idUserSesion==proyecto.id_project_manager" :value="proyecto.id" :key="proyecto.id">
                                              {{ proyecto.nombre }}
                                            </option>

                                          </select>
                                          <has-error :form="form" field="id_proyecto"></has-error>

                                        </div>

                                      </div>
                                  </div>  
                    
                                  <div class="form-group row d-flex align-items-center mb-5">
                                      <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Correo del usuario / contacto</label>
                                      <div class="col-lg-8">
                                        <div class="input-group">
                                          <select  v-model="form.id_usuario" :class="{ 'is-invalid': form.errors.has('id_usuario') }" id="id_usuario" name="id_usuario" class="custom-select form-control" >

                                            <option v-for="usuario in usuarios" v-show="idUserSesion!=usuario.id"  :value="usuario.id" :key="usuario.id">
                                              {{ usuario.email+' / '+usuario.name }}
                                            </option>

                                          </select>
                                          <has-error :form="form" field="id_usuario"></has-error>

                                        </div>

                                      </div>
                                  </div>                  

                                  <div class="form-group row d-flex align-items-center mb-5">
                                      <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Tipo</label>
                                      <div class="col-lg-8">
                                        <div class="input-group">
                                          <select v-model="form.id_tipo" :class="{ 'is-invalid': form.errors.has('id_tipo') }" id="id_tipo" name="id_tipo" class="custom-select form-control" >

                                            <option v-for="tipo in tipos" :value="tipo.id" :key="tipo.id">
                                              {{ tipo.nombre }}
                                            </option>

                                          </select>
                                          <has-error :form="form" field="id_tipo"></has-error>

                                        </div>
                                      </div>
                                  </div>
                                  <div class="form-group row d-flex align-items-center mb-5">
                                      <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Status</label>
                                      <div class="col-lg-8">
                                          <div class="select">
                                              <select v-model="form.status" :class="{ 'is-invalid': form.errors.has('status') }" id="status" name="status" class="custom-select form-control" required>
                                                  <option>Activo</option>
                                                  <option>Inactivo</option>
                                              </select>

                                              <has-error :form="form" field="status"></has-error>
                                          </div>
                                      </div>
                                  </div>
                                 
                                  <div class="form-group row d-flex align-items-center mb-5">
                                      <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Comentarios</label>
                                      <div class="col-lg-8">
                                            <textarea v-model="form.comentarios"   :class="{ 'is-invalid': form.errors.has('comentarios') }"  class="form-control" placeholder="Type your message here ..." required=""></textarea>
                                              
                                              <has-error :form="form" field="comentarios"></has-error>
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
                                            <th>Nombre</th>
                                            <th>Proyecto</th>
																						<th>Tipo</th>
                                            <th>Comentarios</th>
																						<th><span style="width:100px;">Status</span></th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="usuario_proyecto in usuarios_proyectos" :key="usuario_proyecto.id">
                                            <td><span class="text-primary"> {{ usuario_proyecto.nombre }} </span></td>
                                            <td>{{usuario_proyecto.nombre_proyecto}}</td>
                                            <td> {{ usuario_proyecto.tipo }} </td>
																						<td> {{ usuario_proyecto.comentarios }}</td>						
                                            <td v-if="usuario_proyecto.status == 'Activo' "><span style="width:100px;"><span class="badge-text badge-text-small info"> {{ usuario_proyecto.status }} </span></span></td>
                                            <td v-else><span style="width:100px;"><span class="badge-text badge-text-small danger"> {{ usuario_proyecto.status }} </span></span></td>

                                            <td class="td-actions">
                                              <button v-if="tipoUsuario == 'ProjectManager'" @click="editModal(usuario_proyecto)" class="btn btn-warning"> 
                                                  <i class="la la-edit"></i> Editar
                                              </button>

                                              <button v-if="tipoUsuario == 'ProjectManager' && usuario_proyecto.status== 'Activo'" @click="modificarStatusDesarrollador(usuario_proyecto.id,'Inactivo')" class="btn btn-danger">
                                                  <i class="la la-toggle-off"></i> Desactivar 
                                              </button>
                                              <button v-if="tipoUsuario == 'ProjectManager' && usuario_proyecto.status== 'Inactivo'" @click="modificarStatusDesarrollador(usuario_proyecto.id,'Activo')" class="btn btn-success">
                                                  <i class="la la-toggle-on"></i> Activar 
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
     </div>                   
</template>

<script>
  export default {
			props: ['tipoUsuario','idUserSesion'],
      data() {

          return{
              editmode: false,
              usuarios: {},
              proyectos:{},
              tipos:{},
              usuarios_proyectos:{},
              form: new Form({
                  id: '',
                  id_usuario: '',
									id_tipo:'',
                  id_proyecto:'',
                  status: '',
                  comentarios:''
              })
          }
      },
      methods: {

        editModal(usuario_proyecto){
            this.editmode = true;
            this.form.reset();
            this.form.clear();
            $('#modalNew').modal('show');
            this.form.fill(usuario_proyecto);
        },

        newModal(){
            this.editmode = false;
            this.form.reset();
            $('#modalNew').modal('show');
        },

        modificarStatusDesarrollador(id,status){
            swal.fire({
                title: '¿Estás seguro?',
                text: "El estado del desarrollador va cambiar a "+status+"!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, modificarlo!'
            }).then((result) => {
                
                console.log('id: '+status);
                //Send request to the server
                if (result.value) {
                  	axios.delete('api/usuarios_proyectos/destroy', {params: {id:id,status:status}}).then( ()=>{  

                        swal.fire(
                            'Modificado!',
                            'El desarrollador ha cambiado su estado a '+status+'.',
                            'success'
                        )

                        Fire.$emit('cargarUsuarios_proyectos');

                    }).catch( ()=>{
                        swal("Falló!", "Se presentó un problema.", "Advertencia");
                    } );
                }

            })

        },

        actualizarDesarrollador(){
            this.$Progress.start();

            this.form.put('api/usuarios_proyectos/'+ this.form.id )
            .then( ()=> {
                $('#modalNew').modal('hide');
                swal.fire(
                    'Actualizado!',
                    'El desarrollador ha sido actualizado.',
                    'success'
                )

                this.$Progress.finish();
                Fire.$emit('cargarUsuarios_proyectos');
            })
            .catch( () => {
                this.$Progress.fail();
            });
        },

        registrarDesarrollador(){
            this.$Progress.start();
            hola = this.form.post('api/usuarios_proyectos')
            .then( () =>{

                Fire.$emit('cargarUsuarios_proyectos');
                $('#modalNew').modal('hide');
                toast.fire({
                    type: 'success',
                    title: 'usuario guardado correctamente'
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
        cargarUsuarios_proyectos(){
          axios.get("api/usuarios_proyectos?id="+this.idUserSesion).then( ({ data }) => (this.usuarios_proyectos = data.data) );
        },
        cargarProyectos(){
          axios.get("api/proyectos?id="+this.idUserSesion).then( ({ data }) => (this.proyectos = data.data) );
        },

        cargarTipos(){
          axios.get("api/tipos").then( ({ data }) => (this.tipos = data.data) );
          
        },
        
        obtenerUsuarios(){
          axios.get("api/user").then( ({ data }) => (this.usuarios = data.data) );
        }
        
      },
      created() {
				console.log(this.tipoUsuario + ' idUserSesion ' + this.idUserSesion);
        this.cargarProyectos();
        this.obtenerUsuarios();
        this.cargarTipos();
        this.cargarUsuarios_proyectos();
        Fire.$on('cargarUsuarios_proyectos', ()=> {
            this.cargarUsuarios_proyectos();
        });
          //console.log('Component mounted.')
      }
  }
</script>