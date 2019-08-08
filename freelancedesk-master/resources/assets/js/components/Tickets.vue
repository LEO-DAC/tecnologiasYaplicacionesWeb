<template>
    <div>
        <div class="container-fluid" id="showTickets">
            <!-- Begin Page Header-->
              <div class="row">
                  <div class="page-header">
                      <div class="d-flex align-items-center">
                          <h2 class="page-header-title">Tickets </h2>
                          <div>
                          <div class="page-header-tools">
                              <div class="col-xl-12 d-flex align-items-center mb-3">
                                  <button v-show="this.tipoUsuario == 'Cliente'" @click="nuevoTicket" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTicket"> <i class="fas fa-plus"></i> Nuevo ticket</button>
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
                                            <th>Nombre de proyecto</th>
                                            <th>Descripción</th>
																						<th>Fecha</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="ticket in tickets" :id="ticket.id_ticket">
                                            <td> {{ticket.nombre_proyecto}} </td>
                                            <td> {{ticket.descripcion}} </td>
																						<td> {{ticket.fecha | myDate}} </td>
                                            <td class="td-actions">
                                                <button @click="selectedTicket(ticket.id_ticket)"  data-toggle="modal" data-target="#modalIssues" class="btn btn-info"> 
                                                    <i class="fas fa-comment-medical"></i>Ver conversación
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
      
              <div class="modal fade" id="modalTicket">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form @submit.prevent="createTicket()"  method="post">
                            <div class="modal-header">
                            <input type="hidden" id="id_proyecto" name="id_proyecto" :value="id_proyecto_selected">

                              <h4 class="modal-title" id="modalNewLabel"> Generar nuevo ticket / petición </h4>

                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                    <span class="sr-only">close</span>
                                </button>
                            </div>
                               <div class="form-group row d-flex align-items-center mb-5">
                                  <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Proyectos</label>
                                  <div class="col-lg-8">
                                      <div class="select">
                                          <select :class="{ 'is-invalid': form.errors.has('id') }" :id="id_proyecto" name="id_proyecto" class="custom-select form-control" required>
                                              <option value="" selected disabled>Choose</option>
                                              <option v-for="(proyecto, index) in proyectos" :key="proyecto.id" :value="proyecto.id" value="issue.id">{{proyecto.nombre}}</option>
                                          </select>
                                          <has-error :form="form" field="id"></has-error>
                                      </div>
                                  </div>
                              </div>
                            <div class="modal-body">
                                <!-- Form -->
                                  <div class="form-group row d-flex align-items-center mb-5">
                                      <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Archivo</label>
                                      <div class="col-lg-8">
                                        <div class="input-group">
                                            <input v-model="form.archivo" 
                                            type="text" :id="archivo" name="archivo" class="form-control" :class="{'is-invalid': form.errors.has('archivo')}">
                                            <has-error :form="form" field="archivo"></has-error>
                                        </div>
                                      </div>
                                  </div>

                                  <div class="form-group row d-flex align-items-center mb-5">
                                      <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Descripción</label>
                                      <div class="col-lg-8">
                                        <div class="input-group">
                                          <textarea v-model="form.descripcion" 
                                            type="text" name="descripcion" class="form-control" :class="{'is-invalid': form.errors.has('descripcion')}"></textarea>
                                            <has-error :form="form" field="descripcion"></has-error>
                                        </div>
                                      </div>
                                  </div>
                              <!-- End Form -->
                          </div>
                          <div class="modal-footer ">
                              <button type="button" class="btn btn-shadow btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i> Cancelar</button>
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
                tickets: {},
                proyectos: {},
                id_proyecto_selected: '',
                form: new Form({
                  id: '',
                  id_cliente: '',
                  id_proyecto: '',
                  descripcion: '',
                  status: '',
                  archivo: '',
                  fecha: ''
                })
            }
        },
        methods: {
            projectIssues(id){
                axios.get("api/projectIssue?id_proyecto="+id).then(({data}) => (this.my_projectIssues = data.data));
                /*if(this.my_projectIssues.length!=0){
                    if(this.id_proyecto_selected != ''){
                      this.form_issue.reset();
                    }
                    this.form_issue.fill(this.my_projectIssues[0]);
                }*/
                this.id_proyecto_selected = id;
            },
            createTicket(){
                var d = new Date();
                this.$Progress.start();
                this.form.id_cliente = this.idUserSesion;
                this.form.status = "Pendiente";
                this.form.fecha = d.getDate()+"/"+d.getMonth()+"/"+d.getFullYear();
                
                this.form.post('api/tickets')
                .then( ()=> {
                    swal.fire(
                        'Actualizado!',
                        'El registro ha sido actualizado.',
                        'success'
                    )
                    this.$Progress.finish();
                    Fire.$emit('loadRegistros');
                })
                .catch( () => {
                    this.$Progress.fail();
                });
                
            },
            loadData(){
                axios.get("api/tickets?id_cliente="+this.idUserSesion).then(({data}) => (this.tickets = data.data));
            }
        },
        created(){
            this.loadData();
            window.Fire.$on('loadRegistros',() => {
                this.loadData();
            });
           // setInterval(() => this.loadUsers(),3000);
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
