<template>
    <div>
        <div class="container-fluid">
            <!-- Begin Page Header-->
              <div class="row">
                  <div class="page-header">
                      <div class="d-flex align-items-center">
                          <h2 class="page-header-title">Tareas</h2>
                          <div>
                          <div class="page-header-tools">
                              <div class="col-xl-12 d-flex align-items-center mb-3">
                                  <button v-show="tipoUsuario=='ProjectManager' "@click="newModal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-large"> <i class="fas fa-plus"></i> Nueva tarea</button>
                              </div>    
                          </div>
                          </div>
                      </div>
                  </div>
              </div>
          
   <!-- inicia modal de tarea-->
			<div class="modal fade" id="newModal">
					<div class="modal-dialog modal-lg">
							<div class="modal-content">
								
								<form @submit.prevent="editmode ? actualizarTarea() : guardarTarea()" method="post">
										<input type="hidden" name="_token" :value="csrf">

								
										<div class="modal-header">
											
											<h4  v-if="tipoUsuario!='Desarrollador'" class="modal-title" id="modalNewLabel"> Registrar una tarea al proyecto </h4>
											
												<button type="button" class="close" data-dismiss="modal">
														<span aria-hidden="true">×</span>
														<span class="sr-only">close</span>
												</button>
										</div>
										<div class="modal-body">  
                      
                          <div   v-if="tipoUsuario!='Desarrollador'" class="form-group row d-flex align-items-center mb-5">
                              <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Desarrollador a cargo</label>
                              <div class="col-lg-8">
                                <div class="input-group">
                                  <select required v-model="form.id_desarrollador" :class="{ 'is-invalid': form.errors.has('id_desarrollador') }" id="id_desarrollador" name="id_desarrollador" class="custom-select form-control">
                                    <option v-for="desarrollador in desarrolladores" v-show="desarrollador.id_proyecto==idProyecto" :value="desarrollador.id" :key="desarrollador.id">
                                      {{ desarrollador.nombre+'/'+desarrollador.tipo }}
                                    </option>

                                  </select>
                                  <has-error :form="form" field="id_desarrollador"></has-error>

                                </div>

                              </div>
                          </div>

                          <div class="form-group row d-flex align-items-center mb-3">
                              <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre</label>
                              <div class="col-lg-8">
                                  <input  v-model="form.nombre" name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre de la tarea" required>
                              </div>
                          </div>

                          <div class="form-group row d-flex align-items-center mb-5">
                              <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Descripción</label>
                              <div class="col-lg-8">
                                <div class="input-group">
                                  <textarea required v-model="form.descripcion" 
                                    type="text"id="descripcion" name="descripcion" class="form-control" :class="{'is-invalid': form.errors.has('descripcion')}"></textarea>
                                    <has-error :form="form" field="descripcion"></has-error>
                                </div>
                              </div>
                          </div>
                          <div class="form-group row d-flex align-items-center mb-3">
                              <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">monto</label>
                              <div class="col-lg-8">
                                  <input   v-model="form.monto" id="monto" name="monto" type="number" class="form-control" placeholder="E.j. 2,000.00" required>
                              </div>
                          </div>
                          <div class="form-group row d-flex align-items-center mb-5">
                              <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Status</label>
                              <div class="col-lg-8">
                                  <div class="select">
                                      <select v-model="form.status" :class="{ 'is-invalid': form.errors.has('status') }" id="status" name="status" class="custom-select form-control" required>
                                          <option>Activa</option>
                                          <option>Inactiva</option>
                                          <option>Terminada</option>
                                      </select>
                                      <has-error :form="form" field="status"></has-error>
                                  </div>
                              </div>
                          </div>

                      <input id="proyecto" name="proyecto" type="hidden" :value="this.form.id" />
                      <input id="idUsuario" name="idUsuario" type="hidden" :value="this.idUsuarioLoggeado" />

												<!-- End Form -->
										</div>
										
										<div class="modal-footer ">
												<button v-show="!editmode" class="btn btn-primary" type="reset"> <i class="fas fa-broom"></i> Limpiar </button>
												<button type="button" class="btn btn-shadow btn-danger" data-dismiss="modal"> <i class="fas fa-ban"></i> Cancelar</button>
												<button class="btn btn-success" type="submit"> <i class="fas fa-save"></i> Guardar</button>
											
											
										</div>
									
									</form>
								
							</div>
					</div>
			</div>
      <!-- termina modal de tarea-->

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
                                            <th v-show="tipoUsuario!='Desarrollador'">Desarrollador</th>
                                            <th>nombre</th>
 																						<th><span style="width:100px;">Status</span></th>
                                            <th>monto</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="tarea in tareas" v-show="tarea.id_usuario==idUsuarioLoggeado || tipoUsuario!='Desarrollador'" :key="tarea.id">
                                            <td v-show="tipoUsuario!='Desarrollador'"><span class="text-primary"> {{ tarea.desarrollador }} </span></td>
                                            <td>{{tarea.nombre}}</td>			
                                            <td v-if="tarea.status == 'Activa' "><span style="width:100px;"><span class="badge-text badge-text-small info"> {{ tarea.status }} </span></span></td>
                                            <td v-else-if="tarea.status=='Terminada'"><span style="width:100px;"><span class="badge-text badge-text-small success"> {{ tarea.status }} </span></span></td>
                                            <td v-else-if="tarea.status=='Inactiva'"><span style="width:100px;"><span class="badge-text badge-text-small danger"> {{ tarea.status }} </span></span></td>
                                            <td>{{'$'+tarea.monto}}</td>
                                            <td class="td-actions">
                                              <button  @click="editModal(tarea)" class="btn btn-warning"> 
                                                  <i class="ion-eye"></i> Ver
                                              </button>

                                              <button v-if="tipoUsuario == 'ProjectManager'" @click="editModal(tarea)" class="btn btn-warning"> 
                                                  <i class="la la-edit"></i> Editar
                                              </button>

                                              <button v-if="tarea.status== 'Activa'" @click="modificarStatusTarea(tarea.id,'Inactiva')" class="btn btn-danger">
                                                  <i class="la la-toggle-off"></i> Desactivar 
                                              </button>
                                              <button v-if="tarea.status== 'Inactiva'" @click="modificarStatusTarea(tarea.id,'Activa')" class="btn btn-success">
                                                  <i class="la la-toggle-on"></i> Activar 
                                              </button>
                                              <button v-if="tarea.status!= 'Terminada'" @click="modificarStatusTarea(tarea.id,'Terminada')" class="btn btn-success">
                                                  <i class="la la-check"></i> Terminada 
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
			props: ['tipoUsuario', 'idProyecto', 'idUsuarioLoggeado'],
      data() {

          return{
              editmode: false,
              desarrolladores: {},
              tareas:{},
              tipos:{},
              usuarios_proyectos:{},
              form: new Form({
                    id: '',
                    id_proyecto: '',
                    id_desarrollador:'',
                    nombre: '',
                    descripcion: '',
                    status: '',
                    monto: ''
              })
          }
      },
      methods: {

        editModal(tarea){
            this.editmode = true;
            this.form.reset();
            this.form.clear();
            $('#newModal').modal('show');
            this.form.fill(tarea);
          this.desabilitarFormulario();  //se deshabilita la posibilidad de editar datos de la tarea a mostrar
        },

        newModal(){
            this.editmode = false;
            this.form.reset();
            $('#newModal').modal('show');
        },

        modificarStatusTarea(id,status){
            swal.fire({
                title: '¿Estás seguro?',
                text: "El estado de la tarea va cambiar a "+status+"!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, modificarla!'
            }).then((result) => {
                
                console.log('id: '+status);
                //Send request to the server
                if (result.value) {
                  	axios.delete('api/tareas/destroy', {params: {id:id,status:status}}).then( ()=>{  

                        swal.fire(
                            'Modificado!',
                            'La tarea ha cambiado su estado a '+status+'.',
                            'success'
                        )

                        Fire.$emit('cargarTareas');

                    }).catch( ()=>{
                        swal("Falló!", "Se presentó un problema.", "Advertencia");
                    } );
                }

            })

        },

        actualizarTarea(){
            this.$Progress.start();

            this.form.put('api/tareas/'+ this.form.id )
            .then( ()=> {
                $('#newModal').modal('hide');
                swal.fire(
                    'Actualizado!',
                    'La tarea ha sido actualizada.',
                    'success'
                )

                this.$Progress.finish();
                Fire.$emit('cargarTareas');
            })
            .catch( () => {
                this.$Progress.fail();
            });
        },
					guardarTarea(){
              this.$Progress.start();
              this.form.id_proyecto = this.idProyecto;
							this.form.post('api/tareas')
							.then( () =>{
                    Fire.$emit('cargarTareas');
										$('#newModal').modal('hide');
										toast.fire({
												type: 'success',
												title: 'Registro guardado correctamente'
										})
										this.$Progress.finish();
                    this.form.reset()
								})
								.catch( () => {
										toast.fire({
												type: 'error',
												title: 'No se pudieron guardar los datos'
										})
								})
          },
        cargarTareas(){
          //if(this.tipoUsuario!='Desarrollador'){
              axios.get("api/tareas?id="+this.idProyecto).then( ({ data }) => (this.tareas = data.data) );
          /*}else{
            axios.get("api/obtenerTareasDesarrollador/"+this.idProyecto+"/"+this.idUsuarioLoggeado).then( ({ data }) => (this.tareas = data.data) );
          } */
        },

        cargarTipos(){
          axios.get("api/tipos").then( ({ data }) => (this.tipos = data.data) );
          
        },
        
        cargarDesarrolladores(){
          axios.get("api/usuarios_proyectos?id="+this.idUsuarioLoggeado).then( ({ data }) => (this.desarrolladores = data.data) );
        },
        
        desabilitarFormulario(){
            if(this.tipoUsuario!='ProjectManager'){
              document.getElementById("nombre").disabled = true;
              document.getElementById("monto").disabled = true;
              document.getElementById("descripcion").disabled = true;
            }  
         } 
      },
      created() {
				console.log('tipo de usuario: '+this.tipoUsuario+'  idProyecto: '+this.idProyecto + '  idUsuarioLoggeado: ' + this.idUsuarioLoggeado);
        this.cargarDesarrolladores();
        this.cargarTipos();
        this.cargarTareas();
        Fire.$on('cargarTareas', ()=> {
            this.cargarTareas();
        });
          //console.log('Component mounted.')
      }
  }
</script>