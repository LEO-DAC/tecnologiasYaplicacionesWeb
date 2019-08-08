<template>
    <div>
        <div class="container-fluid">
            <!-- Begin Page Header-->
              <div class="row">
                  <div class="page-header">
                      <div class="d-flex align-items-center">
                          <h2 class="page-header-title">Incidencias por proyecto </h2>
                          <div>
                          <div class="page-header-tools">
                              <div class="col-xl-12 d-flex align-items-center mb-3">
                                  <!-- AQUI IRIA EL BOTON DE AGREGAR NUEVO ITEM -->
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
                                            <th>Total</th>
																						<th>Pendientes</th>
                                            <th>Atendidas</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="proyecto in mis_proyectos" :key="proyecto.id">
                                            <td> {{proyecto.nombre}} </td>
                                            <td> {{proyecto.total}} </td>
																						<td> {{proyecto.pendientes}} </td>						
                                            <td> {{proyecto.atendidos}} </td>
                                            <td class="td-actions">
                                                <button @click="projectIssues(proyecto.id)"  data-toggle="modal" data-target="#modalIssues" class="btn btn-success"> 
                                                    <i class="fas fa-plus-circle"></i> Ver más
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
      
              <div class="modal fade" id="modalIssues">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form @submit.prevent="modifyIssue()"  method="post">
                            <div class="modal-header">
                            <input type="hidden" id="id_proyecto" name="id_proyecto" :value="id_proyecto_selected">

                              <h4 class="modal-title" id="modalNewLabel"> Editar incidencias </h4>

                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                    <span class="sr-only">close</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form -->
                                   <div class="form-group row d-flex align-items-center mb-5">
                                      <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Incidencia</label>
                                      <div class="col-lg-8">
                                          <div class="select">
                                              <select :class="{ 'is-invalid': form_issue.errors.has('id') }" id="id_issue" name="id_issue" class="custom-select form-control" required @change="selectedItem($event)">
                                                  <option value="" selected disabled>Choose</option>
                                                  <option v-for="(issue, index) in my_projectIssues" :key="issue.id" :value="issue.id" value="issue.id">{{index + 1}}</option>
                                              </select>
                                              <has-error :form="form_issue" field="id"></has-error>
                                          </div>
                                      </div>
                                  </div>
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
                              <button class="btn btn-success" type="submit"> <i class="fas fa-save"></i> Actualizar</button>
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
                editmode: false,
                mis_proyectos: {},
                my_projectIssues: {},
                id_proyecto_selected: '',
                incidencia: {},
                form_issue: new Form({
                  id: '',
                  id_proyecto: '',
                  nombre: '',
                  descripcion: '',
                  status: ''
                })
            }
        },
        methods: {
            selectedItem(event){
              for(var i = 0; i < this.my_projectIssues.length; i++)
                if(this.my_projectIssues[i].id==event.target.value){
                  this.form_issue.fill(this.my_projectIssues[i]);
                }
            },
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
            modifyIssue(){
                this.$Progress.start();

                this.form_issue.put('api/incidencias/'+ this.form_issue.id )
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
                axios.get("api/projectIssue?id_proyecto="+this.form_issue.id_proyecto).then(({data}) => (this.my_projectIssues = data.data));
            },
            loadData(){
                axios.get("api/projectIssue?id_project_manager="+this.idUserSesion).then(({data}) => (this.mis_proyectos = data.data));
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
