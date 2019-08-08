<template>
         <!-- Begin Container -->
 
              <!-- modal recuperar contraseña -->
        <div id="modal-large" class="modal fade"  :class="{'mostrar' : modal}" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Title</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Donec non lectus nec est porta eleifend. Morbi ut dictum augue, feugiat condimentum est. Pellentesque tincidunt justo nec aliquet tincidunt. Integer dapibus tellus non neque pulvinar mollis. Maecenas dictum laoreet diam, non convallis lorem sagittis nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc venenatis lacus arcu, nec ultricies dui vehicula vitae.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
     <!-- fin modal recuperar contraseña -->
  
  </div>

</template>

<script>
    export default {
        mounted() {
            console.log('componente del login creado.')
        }
    }
</script>
