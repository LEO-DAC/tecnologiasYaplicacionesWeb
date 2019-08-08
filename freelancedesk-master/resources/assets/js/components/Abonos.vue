<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="card card-default">
                    <div class="card-header"> <h2>
                                  Abonos al proyecto. 
                      
                                  

                              </h2>
                              
                              </div>

                    <div class="card-body">
                      
											
											
                      <h2>
                        Lista de Abonos
                      </h2>
											
											<h3>
												<b>Proyecto: </b> {{this.proyecto.nombre}}
											</h3>
											
											<h3>
												<b>Costo del proyecto: </b>   {{this.proyecto.precio}}
											</h3>
											
											
											<h3>
													<b>Restante: </b> {{ this.deudaRestante}}	
											</h3>
                      
                      <a  class="btn btn-primary" @click="agregarAbonoModal()">
                                    
                          <i class="fas fa-money-check-alt fa-lg"></i> Hacer pago
                      </a> 
                       
                      <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>ID </th>
                              <th>Nombre </th>
															<th>Detalle </th>
                              <th>Cantidad </th>
															<th>Fecha</th>


                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="abono in abonos" :key="abono.id">
															
                              <td> {{ abono.id  }} </td>
                              <td> {{ abono.nombre  }} </td>
                              <td> {{ abono.detalle }} </td>
															<td> {{ abono.cantidad }} </td>
															<td> {{ abono.fecha }} </td>

                            </tr>

                          </tbody>
                        </table>
                      
                      
                    </div>
                </div>
            </div>
        </div>
     
        <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="modalNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                  <div class="modal-header">
                      <h5 class="modal-title" id="modalNewLabel">Agregar un pago a desarrollador</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>

                  <form @submit.prevent="agregarAbono()">
                    <div class="modal-body">


                        <div class="form-group">
                            
                          
                           <div class="form-group">
                                <label>Nombre</label>
                                <input v-model="nombre" type="text" name="nombre" id="nombre"
                                    placeholder="Nombre del abono" class="form-control" >

                            </div>
													
													<div class="form-group">
                                <label>Detalle</label>
                                <input v-model="detalle" type="text" name="detalle" 
                                    placeholder="Detalle del abono" class="form-control" >

                            </div>
                          
                          <div class="form-group">
                                <label>Total</label>
                                <input v-model="cantidad" type="number" name="cantidad" id="cantidad"
                                    placeholder="Abono total" class="form-control" min="1" :max="deudaRestante">

                            </div>
													
													
									
													
													
													
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Abonar</button>
                    </div>



                </form>

                </div>
            </div>
        </div>
      
      
      
      
    </div>
</template>

<script>
    export default {
				props: ['idProyecto', 'idUsuarioLoggeado'],
        data() {
            
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                
                proyecto: {},
                abonos: {},
              
                nombre: '',
								detalle: '',
								cantidad: '',
								idUsuario: '',
							
								deudaRestante: ''
									

                
            }
        },

        methods: {
          
          
          agregarAbonoModal(){
       
              $('#agregarModal').modal('show');
            
          },
          
          obtenerAbonos(){
						
            axios.get("api/obtenerAbonos/" + this.idProyecto).then( ({ data }) => {
							
							this.abonos = data;
							this.obtenerRestante();
																																									
				} );
						
					
          },
          
          obtenerDatosProyecto(){
            	
             axios.get("api/obtenerProyecto/" + this.idProyecto).then( ({ data }) => (this.proyecto = data) );
            
          },
          
          agregarAbono(){
            
            
                this.$Progress.start();
                
               axios.post("api/ingresos", {
                 
                  nombre: this.nombre,
								 	detalle: this.detalle,
								 	cantidad: this.cantidad,
								 idProyecto: this.proyecto.id,
								 idUsuario: this.idUsuarioLoggeado
                 
                  
                }).then( () =>{

                    Fire.$emit('traerAbonos');
                    $('#agregarModal').modal('hide');
                  
                  swal.fire({
                    type: 'success',
                    title: 'Abono realizado',
                  })
                  
                    this.$Progress.finish();

                })
                .catch( () => {
                        swal.fire({
                          type: 'error',
                          title: 'No se pudo realizar el abono',
                        })
                  
                  this.$Progress.fail();
                })

          },
					
					
					obtenerRestante(){
							
							this.deudaRestante = this.proyecto.precio;
							for(var i = 0; i < this.abonos.length; i++){
									
									//if( this.abonos[i] === this.idProyecto ){
										
										 this.deudaRestante = this.deudaRestante - this.abonos[i].cantidad;
										//console.log();
									//}
									
							}
					}
          
          
          

        },
      
      created() {
          this.obtenerDatosProyecto();
          this.obtenerAbonos();
        
           Fire.$on('traerAbonos', ()=> {
                this.obtenerAbonos();
                
            });
					
          

        }
      
    }
</script>