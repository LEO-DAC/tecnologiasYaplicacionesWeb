<template>
    <div class="container">
        <div class="row mt-2">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabla de Usuarios</h3>

                <div class="card-tools">
                  <button class="btn btn-success" data-toggle="modal" data-target="#modalNew"> <i class="fas fa-user-plus fa-fw"></i> Agregar nuevo  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users" :key="user.id">
                      <td>{{ user.id }}</td>
                      <td>{{ user.name }}</td>
                      <td>{{ user.email }} </td>
                      <td>{{ user.type }} </td>
                      
                      <td>
                        <a href="#"> 
                            <i class="fa fa-edit fa-lg blue"> </i> 
                        </a>

                        /

                        <a href="#">
                            <i class="fa fa-trash fa-lg red"> </i>
                        </a>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>

        <div class="modal fade" id="modalNew" tabindex="-1" role="dialog" aria-labelledby="modalNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNewLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form @submit.prevent="createUser">

                    <div class="modal-body">

                        
                        <div class="form-group">
                            <input v-model="form.name" type="text" name="name" id="name"
                                placeholder="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>

                        <div class="form-group">
                            <input v-model="form.email" type="email" name="email" id="email"
                                placeholder="Email Address" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>

                        <div class="form-group">
                            <textarea v-model="form.bio" name="bio" id="bio"
                                placeholder="Short bio for user (Optional)" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }">
                            </textarea>
                            <has-error :form="form" field="bio"></has-error>
                        </div>

                        <div class="form-group">
                            <select v-model="form.type"  name="type" id="type"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                <option value=""> Select User Role </option>
                                <option value="admin"> Admin </option>
                                <option value="user"> Standard User </option>
                                <option value="author"> Author </option>
                            </select>
                            <has-error :form="form" field="type"></has-error>
                        </div>

                        <div class="form-group">
                            <input v-model="form.password" type="password" name="password" id="password"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                   

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
                
                </div>
            
            </div>
        </div>

    </div>



    

</template>

<script>
    export default {
        data() {
            return{
                users: {},
                form: new Form({
                    name: '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photo: ''
                })
            }
        },

        methods: {
            loadUsers(){
                axios.get("api/user").then( ({ data }) => (this.users = data.data) );
            },
            createUser(){
                this.form.post('api/user');
            }
        },

        created() {
            this.loadUsers();
        }
    }
</script>
