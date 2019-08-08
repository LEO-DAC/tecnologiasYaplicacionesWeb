<template>
  <div>
    <div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">Clientes</h2>
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
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Total de proyectos</th>
                                            <th class="text-center">Proyectos activos</th>
                                            <th class="text-center">Proyectos inactivos</th>
                                            <th class="text-center">Proyectos terminados</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        <tr v-for="cliente in clientes" :key="cliente.id">

                                            <td class="text-center" ><span class="text-primary"> {{ cliente.name }} </span></td>
                                            <td class="text-center">  {{cliente.total }} </td>
                                            <td class="text-center"> {{ cliente.activos }} </td>
                                             <td class="text-center"> {{ cliente.inactivos }} </td>
                                            <td class="text-center"> {{ cliente.terminados }} </td>
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
			props: ['tipoUsuario','idUserSesion'],
      data() {

          return{
              idUsuario: this.idUserSesion, 
              editmode: false,
              clientes: {},
              form: new Form({
                  id: '',
                  nombre:'',
                  proyecto:'',
                  status: '',
                  precio:'',
                  fecha_inicio:'',
                  fecha_fin:''
              })
          }
      },
      methods: {

        editModal(cliente){
            this.editmode = true;
            this.form.reset();
            this.form.clear();
            $('#modalNew').modal('show');
            this.form.fill(cliente);
        },

        newModal(){
            this.editmode = false;
            this.form.reset();
            $('#modalNew').modal('show');
        },

        actualizarCliente(){
            this.$Progress.start();

            this.form.put('api/clientes/'+ this.form.id )
            .then( ()=> {
                $('#modalNew').modal('hide');
                swal.fire(
                    'Actualizado!',
                    'El pago ha sido actualizado.',
                    'success'
                )

                this.$Progress.finish();
                Fire.$emit('obtenerClientes');
            })
            .catch( () => {
                this.$Progress.fail();
            });
        },
        obtenerClientes(){
          axios.get("api/clientes?id_project_manager="+this.idUserSesion).then( ({ data }) => (this.clientes = data.data) );
        }
        
      },
      created() {
				console.log(this.tipoUsuario + ' idUserSesion ' + this.idUserSesion);
        this.obtenerClientes();
        Fire.$on('obtenerClientes', ()=> {
            this.obtenerClientes();
        });
          //console.log('Component mounted.')
      }
  }
</script>