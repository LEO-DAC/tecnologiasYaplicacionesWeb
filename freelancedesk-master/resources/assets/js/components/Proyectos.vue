<template>
    <div class="container-fluid">
		 	<!-- Begin Page Header-->
			<div class="row">
					<div class="page-header">
							<div class="d-flex align-items-center">
									<h2 class="page-header-title"> Proyectos como {{this.tipoUsuario}}  </h2>
									<div>
									<div class="page-header-tools">
											<div class="col-xl-12 d-flex align-items-center mb-3">
													<button v-show="this.tipoUsuario == 'ProjectManager'" @click="newModal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-large"> <i class="fas fa-plus"></i> Nuevo proyecto</button>
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
								
								<form @submit.prevent="editmode ? actualizarProyecto() : crearProyecto()" method="post">
								
								
										<div class="modal-header">
											
											<h4 class="modal-title" v-show="!editmode" id="modalNewLabel"> Registrar nuevo proyecto </h4>
                    	<h4 class="modal-title" v-show="editmode" id="modalNewLabel"> Actualizar datos del proyecto </h4>
											
												<button type="button" class="close" data-dismiss="modal">
														<span aria-hidden="true">×</span>
														<span class="sr-only">close</span>
												</button>
										</div>
										<div class="modal-body">
												<!-- Form -->


																		<div class="form-group row d-flex align-items-center mb-5">
																				<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre del proyecto</label>
																				<div class="col-lg-8">
																						<input v-model="form.nombre" :class="{ 'is-invalid': form.errors.has('nombre') }" name="nombre" id="nombre" type="text" class="form-control" placeholder="E.j. Página web para cliente">
																						<has-error :form="form" field="nombre"></has-error>
																				</div>
																		</div>



																		<div class="form-group row d-flex align-items-center mb-5">
																				<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Correo del cliente / contacto</label>
																				<div class="col-lg-8">
																					<div class="input-group">
																						<select v-model="form.id_cliente" :class="{ 'is-invalid': form.errors.has('id_cliente') }" id="id_cliente" name="id_cliente" class="custom-select form-control" >

																							<option v-for="usuario in usuarios" v-show="usuario.id!=idUserSesion" :value="usuario.id" :key="usuario.id">
                                                {{ usuario.email+' / '+usuario.name }}
																							</option>

																						</select>
																						<has-error :form="form" field="id_cliente"></has-error>
																					
																					</div>
																					
																				</div>
																		</div>

																		
											
																		<div class="form-group row d-flex align-items-center mb-5">
																				<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Fecha de inicio</label>
																				<div class="col-lg-8">
																						<input v-model="form.fecha_inicio" type="date" :class="{ 'is-invalid': form.errors.has('fecha_inicio') }" id="fecha_inicio" name="fecha_inicio" class="form-control" placeholder="MM/DD/YYYY">
																						<has-error :form="form" field="fecha_inicio"></has-error>
																				</div>
																		</div>
															
																		<div class="form-group row d-flex align-items-center mb-5">
																				<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Fecha de fin</label>
																				<div class="col-lg-8">
																						<input v-model="form.fecha_fin" type="date" :class="{ 'is-invalid': form.errors.has('fecha_fin') }" id="fecha_fin" name="fecha_fin" class="form-control" placeholder="MM/DD/YYYY">
																						<has-error :form="form" field="fecha_fin"></has-error>
																				</div>
																		</div>

																		<div class="form-group row d-flex align-items-center mb-5">
																				<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Costo</label>
																				<div class="col-lg-8">
																						<input v-model="form.precio" :class="{ 'is-invalid': form.errors.has('precio') }" id="precio" name="precio" type="number" class="form-control" placeholder="E.j. 2,000.00">
																						<has-error :form="form" field="precio"></has-error>
																				</div>
																		</div>

																		<div class="form-group row d-flex align-items-center mb-5">
																				<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Status</label>
																				<div class="col-lg-8">
																						<div class="select">
																								<select v-model="form.status" :class="{ 'is-invalid': form.errors.has('status') }" id="status" name="status" class="custom-select form-control" required>
																										<option>Activo</option>
																										<option>Inactivo</option>
                                                    <option>Terminado</option>
																								</select>
																								<has-error :form="form" field="status"></has-error>
																						</div>
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
      
      <!-- Inicia modal de abonos --> 
			<div class="modal fade" id="abonoModal">
					<div class="modal-dialog modal-lg">
							<div class="modal-content">
								
								<form @submit.prevent="guardarAbono()" method="post">
										<input type="hidden" name="_token" :value="csrf">

								
										<div class="modal-header">
											
											<h4 class="modal-title" id="modalNewLabel"> Registrar un ingreso al proyecto </h4>
											
												<button type="button" class="close" data-dismiss="modal">
														<span aria-hidden="true">×</span>
														<span class="sr-only">close</span>
												</button>
										</div>
										<div class="modal-body">

																		<div class="form-group row d-flex align-items-center mb-3">
																				<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre del abono</label>
																				<div class="col-lg-8">
																						<input  name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre del abono" required>
																				</div>
																		</div>
											
											
																		<div class="form-group row d-flex align-items-center mb-3">
																				<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Detalle del abono</label>
																				<div class="col-lg-8">
																						<input  name="detalle" id="detalle" type="text" class="form-control" placeholder="Detalle del abono" required>
																				</div>
																		</div>
											
																		
																			<div class="form-group row d-flex align-items-center mb-3">
																				<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Cantidad</label>
																				<div class="col-lg-8">
																						<input  id="precio" name="precio" type="number" class="form-control" placeholder="E.j. 2,000.00" required>
																				</div>
																		</div>

																		
																<input id="proyecto" name="proyecto" type="hidden" :value="this.form.id" />
																<input id="idUsuario" name="idUsuario" type="hidden" :value="this.idUserSesion" />
											
																	
																		

														
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
      <!--  termina modal de abono -->
      
      <!-- inicia modal de tarea-->
			<div class="modal fade" id="modalTarea">
					<div class="modal-dialog modal-lg">
							<div class="modal-content">
								
								<form @submit.prevent="guardarTarea()" method="post">
										<input type="hidden" name="_token" :value="csrf">

								
										<div class="modal-header">
											
											<h4 class="modal-title" id="modalNewLabel"> Registrar una tarea al proyectoo </h4>
											
												<button type="button" class="close" data-dismiss="modal">
														<span aria-hidden="true">×</span>
														<span class="sr-only">close</span>
												</button>
										</div>
										<div class="modal-body">  
                      
                      						  <div class="form-group row d-flex align-items-center mb-5">
																				<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Desarrollador a cargo</label>
																				<div class="col-lg-8">
																					<div class="input-group">
																						<select v-model="form_tarea.id_desarrollador" :class="{ 'is-invalid': form_tarea.errors.has('id_desarrollador') }" id="id_desarrollador" name="id_desarrollador" class="custom-select form-control" >

																							<option v-for="desarrollador in desarrolladores" v-show="desarrollador.id_proyecto==id_proyecto_selected" :value="desarrollador.id" :key="desarrollador.id">
                                                {{ desarrollador.nombre+'/'+desarrollador.tipo }}
																							</option>

																						</select>
																						<has-error :form="form_tarea" field="id_desarrollador"></has-error>
																					
																					</div>
																					
																				</div>
																		</div>
                      
                      						  <div class="form-group row d-flex align-items-center mb-3">
																				<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre</label>
																				<div class="col-lg-8">
																						<input v-model="form_tarea.nombre" name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre de la tarea" required>
																				</div>
																		</div>
											
                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Descripción</label>
                                        <div class="col-lg-8">
                                          <div class="input-group">
                                            <textarea v-model="form_tarea.descripcion" 
                                              type="text" name="descripcion" class="form-control" :class="{'is-invalid': form_tarea.errors.has('descripcion')}"></textarea>
                                              <has-error :form="form_tarea" field="descripcion"></has-error>
                                          </div>
                                        </div>
                                    </div>
																  	<div class="form-group row d-flex align-items-center mb-3">
																				<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">monto</label>
																				<div class="col-lg-8">
																						<input   v-model="form_tarea.monto" id="monto" name="monto" type="number" class="form-control" placeholder="E.j. 2,000.00" required>
																				</div>
																		</div>
																		<div class="form-group row d-flex align-items-center mb-5">
																				<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Status</label>
																				<div class="col-lg-8">
																						<div class="select">
																								<select v-model="form_tarea.status" :class="{ 'is-invalid': form_tarea.errors.has('status') }" id="status" name="status" class="custom-select form-control" required>
																										<option>Activa</option>
																										<option>Inactiva</option>
                                                    <option>Terminada</option>
																								</select>
																								<has-error :form="form_tarea" field="status"></has-error>
																						</div>
																				</div>
																		</div>

																<input id="proyecto" name="proyecto" type="hidden" :value="this.form.id" />
																<input id="idUsuario" name="idUsuario" type="hidden" :value="this.idUserSesion" />

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
      
      
			<!-- Aqui inicia el datatable -->
			<div class="row">
					<div class="col-xl-12">
							                                   <!-- Se validan los proyectos que son visibles para cada tipo de usuario -->
							<div v-for="proyecto in proyectos" v-show="(proyecto.id_project_manager==idUserSesion && tipoUsuario=='ProjectManager')
                                                         || (proyecto.id_cliente==idUserSesion && tipoUsuario=='Cliente') 
                                                         || (tipoUsuario=='Desarrollador')":key="proyecto.id" class="widget has-shadow">
								
								<div class="widget-header bordered d-flex align-items-center">
										<h2> <b>  {{ proyecto.nombre }} </b>   </h2>
										<div v-show="tipoUsuario=='ProjectManager'" class="widget-options">
												<div class="dropdown">
														<button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
																<i class="la la-ellipsis-h"></i>
														</button>
														<div class="dropdown-menu">

															
															<button @click="editModal(proyecto)" class="dropdown-item"> 
																	<i class="la la-edit"></i> Editar
															</button>
															
                              <button type="button" @click="selectedProjectIssue(proyecto.id)" class="dropdown-item" data-toggle="modal" data-target="#addIssue"> <i class="fas fa-plus"></i> Nueva incidencia</button>
                              
                              <button type="button" @click="selectedProjectIssue(proyecto.id)" class="dropdown-item" data-toggle="modal" data-target="#modalTarea"> <i class="la la-thumb-tack"></i> Nueva tarea</button>															
															
															<button v-if="proyecto.status =='Activo'" @click="cambiarStatusProyecto(proyecto.id,'Inactivo')" class="dropdown-item"> 
																	<i class="la la-toggle-off"></i> Desactivar
															</button>
															<button v-if="proyecto.status =='Inactivo'" @click="cambiarStatusProyecto(proyecto.id,'Activo')" class="dropdown-item"> 
																	<i class="la la-toggle-on"></i> Activar
															</button>
															<button v-if="proyecto.status !='Terminado'" @click="cambiarStatusProyecto(proyecto.id,'Terminado')" class="dropdown-item"> 
																	<i class="la la-check"></i> Terminado
															</button>
															
															
														</div>
												</div>
										</div>
								</div>
								
								
								
									<div class="widget-body">
											<div class="table-responsive">
																
												<div class="progress progress-lg mb-3">
													<!--<div class="progress-bar-striped bg-danger" role="progressbar" style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">1%</div>-->
											  <div class="progress-bar-striped bg-danger" role="progressbar" v-bind:style="{width: (100/proyecto.total)*proyecto.terminadas+'%'}" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">{{((100/proyecto.total)*proyecto.terminadas).toFixed(2)}} %</div> 
                       </div>
												
															<p>
																<b>Id: </b> {{ proyecto.id }}	
															</p>
												
															<p>
																<b> Estado: </b>
																<span v-if="proyecto.status == 'Activo' " class="badge-text badge-text-small info"> {{ proyecto.status }} </span>
																 <span v-else-if="proyecto.status == 'Inactivo' " style="width:100px;" class="badge-text badge-text-small danger"> {{ proyecto.status }} </span>
                                 <span v-else style="width:100px;" class="badge-text badge-text-small success"> {{ proyecto.status }} </span>
															</p>
												
															<p>
																<b> Fecha de Inicio: </b>  {{ proyecto.fecha_inicio }}
															</p>
												
															<p>
																<b> Fecha finalización estimada: </b> {{ proyecto.fecha_fin }}
															</p>
												
															<p v-show="tipoUsuario!='Desarrollador'">
																<b> Costo total: </b> $ {{ proyecto.precio }} MX
															</p>
												
															<p v-show="tipoUsuario!='Desarrollador'">
																<b> Actualmente pagado: </b> $ 0.00 MX
															</p>
												
																<center> 
																	<form action="/proyecto" method="POST">
																			<input type="hidden" name="tipo" :value="tipoUsuario">
																			<input type="hidden" name="idProyecto" :value="proyecto.id">
																			<input type="hidden" name="_token" :value="csrf">
																			
																		
																			<button style="width: 50%" type="submit" class="btn btn-success ripple mr-1 mb-2"> 
																					<i class="la la-eye "></i> ver
																			</button>
																			
																	</form>
																	</center>
															
															
											</div>
									</div>
							</div>
							<!-- End Sorting -->
					</div>
			</div>
      <div class="modal fade" id="addIssue">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form @submit.prevent="insertIssue()"  method="post">
                    <div class="modal-header">
                    <input type="hidden" id="id_proyecto" name="id_proyecto" :value="id_proyecto_selected">
                    
                      <h4 class="modal-title" id="modalNewLabel"> Registrar nueva incidencia </h4>

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
                                    <input v-model="form_issue.nombre" 
                                    type="text" id="nombre" name="nombre" class="form-control" :class="{'is-invalid': form_issue.errors.has('nombre')}">
                                    <has-error :form="form_issue" field="nombre"></has-error>
                                </div>
                              </div>
                          </div>

                          <div class="form-group row d-flex align-items-center mb-5">
                              <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Status</label>
                              <div class="col-lg-8">
                                  <div class="select">
                                      <select v-model="form_issue.status" :class="{ 'is-invalid': form_issue.errors.has('status') }" id="status" name="status" class="custom-select form-control" required>
                                          <option value="Pendiente" selected="selected">Pendiente</option>
                                          <option value="Atendido">Atendido</option>
                                      </select>

                                      <has-error :form="form_issue" field="status"></has-error>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row d-flex align-items-center mb-5">
                              <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Descripción</label>
                              <div class="col-lg-8">
                                <div class="input-group">
                                  <textarea v-model="form_issue.descripcion" 
                                    type="text" name="descripcion" class="form-control" :class="{'is-invalid': form_issue.errors.has('descripcion')}"></textarea>
                                    <has-error :form="form_issue" field="descripcion"></has-error>
                                </div>
                              </div>
                          </div>
                      <!-- End Form -->
                  </div>
                  <div class="modal-footer ">
                      <button  class="btn btn-primary" type="reset"> <i class="fas fa-broom"></i> Limpiar </button>
                      <button type="button" class="btn btn-shadow btn-danger" data-dismiss="modal"> <i class="fas fa-ban"></i> Cancelar</button>
                      <button class="btn btn-success" type="submit"> <i class="fas fa-save"></i> Guardar</button>
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
		props: ['tipoUsuario','idUserSesion'],
		data() {
            	
			return{
					csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
					tipo: this.tipo,
					editmode: false,
          id_proyecto_selected: '',
					usuarios: {},
					proyectos: {},
          desarrolladores:{},
                	form: new Form({
                    id: '',
										id_project_manager:this.idUserSesion,
                    id_cliente: '',
                    nombre: '',
                    fecha_inicio: '',
                    fecha_fin: '',
                    status: '',
                    precio: ''
                }),
                 form_issue: new Form({
                    id: '',
                    id_proyecto: '',
                    nombre: '',
                    descripcion: '',
                    status: ''
                  }),
                 form_tarea: new Form({
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
          
					selectedProjectIssue(id){
            this.id_proyecto_selected = id;
          },
					insertIssue(){
            this.$Progress.start();
              this.form_issue.id_proyecto = this.id_proyecto_selected;
							this.form_issue.post('api/incidencias')
							.then( () =>{

										$('#addIssue').modal('hide');
										toast.fire({
												type: 'success',
												title: 'Registro guardado correctamente'
										})
										this.$Progress.finish();
                    this.form_issue.reset()

								})
								.catch( () => {
										toast.fire({
												type: 'error',
												title: 'Ya existe un registro con este nombre'
										})
								})
          },
					guardarTarea(){
              this.$Progress.start();
              this.form_tarea.id_proyecto = this.id_proyecto_selected;
							this.form_tarea.post('api/tareas')
							.then( () =>{

										$('#modalTarea').modal('hide');
										toast.fire({
												type: 'success',
												title: 'Registro guardado correctamente'
										})
                    Fire.$emit('cargarProyectos');
										this.$Progress.finish();
                    this.form_tarea.reset()

								})
								.catch( () => {
										toast.fire({
												type: 'error',
												title: 'No se pudieron guardar los datos'
										})
								})
          },
					editModal(proyecto){
							this.editmode = true;
							this.form.reset();
							this.form.clear();
							$('#modalNew').modal('show');
							this.form.fill(proyecto);
					},
          tareaModal(){
						$('#tareaModal').modal('show');
					}, 		
					abonoModal(){
						$('#abonoModal').modal('show');
					}, 
					newModal(){
							this.editmode = false;
							this.form.reset();
							$('#modalNew').modal('show');
					},

					cambiarStatusProyecto(id,status){
							swal.fire({
									title: '¿Estas seguro de cambiar el estado a '+status+ '?',
									text: "Para cambiar a otro estado usa el boton editar",
									type: 'warning',
									showCancelButton: true,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Si'
							}).then((result) => {

									//Send request to the server
									if (result.value) {
											axios.delete('api/proyectos/destroy', {params: {id: id, status:status }}).then( ()=>{

													swal.fire(
															'¡Estado actualziado con exito!',
															'El proyecto ahora está '+status,
															'success'
													)

													Fire.$emit('cargarProyectos');

											}).catch( ()=>{
													swal("¡Fallo!", "Algo pasó y no se pudo desactivar el proyecto.", "warning");
											} );
									}
							})
					},
					
					actualizarProyecto(){
							this.$Progress.start();

							this.form.put('api/proyectos/'+ this.form.id )
							.then( ()=> {
									$('#modalNew').modal('hide');
									swal.fire(
											'Actualizado!',
											'El proyecto ha sido actualizado.',
											'success'
									)

									this.$Progress.finish();
									Fire.$emit('cargarProyectos');
							})
							.catch( () => {
									this.$Progress.fail();
							});
					},
					
					crearProyecto(){
							this.$Progress.start();
							this.form.post('api/proyectos')
							.then( () =>{

									Fire.$emit('cargarProyectos');
									$('#modalNew').modal('hide');
									toast.fire({
											type: 'success',
											title: 'Proyecto guardado correctamente'
									})
									this.$Progress.finish();

							})
							.catch( () => {
									toast.fire({
											type: 'error',
											title: 'No se pudieron guardar los datos'
									})
							})
						
					},
					
					cargarProyectos(){ //se manda por url el id del usuario actual logueado para obtener los proyectos que ha creado
               if(this.tipoUsuario!='Desarrollador'){ 
                  axios.get("api/proyectos?id="+this.idUserSesion).then( ({ data }) => (this.proyectos = data.data) );
               }
              else{
                  axios.get("api/obtenerProyectosDesarrollador/"+this.idUserSesion).then( ({ data }) => (this.proyectos = data.data) );
										}
          },
					
					obtenerUsuarios(){
						axios.get("api/user").then( ({ data }) => (this.usuarios = data.data) );
					},
					cargarDesarrolladores(){
            axios.get("api/usuarios_proyectos?id="+this.idUserSesion).then( ({ data }) => (this.desarrolladores = data.data) );
          },
					desplegarNombreUsuario(id){
						for( var i = 0; i < this.usuarios.length; i++ ){
					
						}
					},
					
					
					guardarAbono(){
						
							this.$Progress.start();
							axios.post('api/ingresos', {
									
										
													 
							})
							.then( () =>{

										$('#abonoModal').modal('hide');
										toast.fire({
												type: 'success',
												title: 'Abono guardado correctamente'
										})
										this.$Progress.finish();

								})
								.catch( () => {
										toast.fire({
												type: 'error',
												title: 'No se pudieron guardar los datos'
										})
								})
					}
										
				},
        created() {
					this.cargarProyectos();
					this.obtenerUsuarios();
          this.cargarDesarrolladores();
          console.log('tipoUsuario:'+this.tipoUsuario+' idUserSesion:'+this.idUserSesion );
					Fire.$on('cargarProyectos', ()=> {
							this.cargarProyectos();
					});
					
					window.idUsuario = this.idUserSesion;
            //console.log('Component mounted.')
        }
    }
</script>
