<template>
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">Default Example</h5>
            <button type="button" class="btn btn-falcon-default rounded-capsule btn-sm"
                    @click="createMode"> <i class="fas fa-plus"></i> Create</button>
            <div class="search-box">
                <form class="position-relative" data-toggle="search" data-display="static">
                    <input class="form-control search-input" type="search" placeholder="Search..." aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-dashboard table-bordered no-wrap mb-0 fs--1 w-100" >
                <thead class="bg-200">
                <tr>
                    <th class="sort">#</th>
                    <th class="sort">Name</th>
                    <th class="sort">Role</th>
                    <th class="sort">Email</th>
                    <th class="sort text-center">Action</th>
                    <th class="sort">Date Posted</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                <tr v-for="user in users" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.role }}</td>
                    <td>{{ user.email }}</td>
                    <td class="text-center">
                        <!--                        <button class="btn btn-sm btn-info"> -->
                        <a href="javascript:void(0)" @click="viewUser(user)" class="text-info"> <i class="fa fa-eye"></i></a> ||
                        <!--                            View-->
                        <!--                        </button>-->
                        <!--                        <button class="btn btn-sm btn-warning"> -->
                        <a href="javascript:void(0)" @click="editUser(user)" class="text-warning"> <i class="fa fa-edit"></i></a> ||
                        <!--                            Edit</button>-->
                        <!--                        <button class="btn btn-sm btn-danger"> -->
                        <a href="javascript:void(0)" @click="deleteUser(user)" class="text-danger"> <i class="fa fa-trash"></i></a>
                        <!--                        Delate</button>-->
                    </td>
                    <td>{{ user.created_at | date }}</td>
                </tr>
                </tbody>
            </table>
            <loading :loading="loading"></loading>
        </div>
        <div class="modal fade" id="viewUser" tabindex="-1" role="dialog" aria-labelledby="viewUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><b>Name:</b> {{ user.name }}</p>
                                <p><b>Email:</b> {{ user.email }}</p>
                                <p><b>Last Updated:</b> {{ user.updated_at | date }}</p>
                                <p><b>Date Posted:</b> {{ user.created_at | date }}</p>
                            </div>

                            <div class="col-md-6">
                                <img :src="img" class="img-circle">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                        <button class="close close-btn" type="button" @click="modalHide">
                            <span class="font-weight-light" aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
<!--                        @submit.prevent="!editMode ? createUser() : updateUser()"-->
                        <form @submit.prevent="!editMode ? createUser() : updateUser()">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Name</label>
                                        <input v-model="form.name" type="text" name="name"
                                               autofocus placeholder="Name" class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> E-Mail</label>
                                        <input v-model="form.email" type="text" name="email"
                                               autofocus placeholder="E-Mail Address" class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('email') }">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Phone Number</label>
                                        <input v-model="form.phone" type="text" name="phone"
                                               autofocus placeholder="Phone" class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('phone') }">
                                        <has-error :form="form" field="phone"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Choose Role</label>
                                        <b-form-select
                                            v-model="form.role"
                                            :options="roles"
                                            text-field="name"
                                            value-field="id"
                                        ></b-form-select>
                                        <has-error :form="form" field="role"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Choose Company</label>
                                        <b-form-select
                                            v-model="form.company_id"
                                            :options="companies"
                                            text-field="company_name"
                                            value-field="id"
                                        ></b-form-select>
                                        <has-error :form="form" field="password"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Password</label>
                                        <input v-model="form.password" type="text" name="password"
                                               autofocus placeholder="Password" class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('password') }">
                                        <has-error :form="form" field="password"></has-error>
                                    </div>
                                </div>
                            </div>
<!--                            <b-form-group label="Assign Permission">-->
<!--                                <b-form-checkbox-group>-->
<!--                                    <b-form-checkbox-->
<!--                                        v-for="option in permissions"-->
<!--                                        v-model="form.permissions"-->
<!--                                        :key="option.name"-->
<!--                                        :value="option.name"-->
<!--                                        name="flavour-3a"-->
<!--                                    >-->
<!--                                        {{ option.name }}-->
<!--                                    </b-form-checkbox>-->
<!--                                </b-form-checkbox-group>-->
<!--                            </b-form-group>-->
                            <span class="divi"></span>
                            <div class="sub-btn">
                                <button class="btn btn-falcon-default
                                rounded-capsule close-btn btn-sm mr-2"
                                type="button" @click="modalHide">Close</button>
                                <b-button v-if="!load"
                                    class="float-right btn btn-falcon-primary rounded-capsule btn-sm"
                                    variant="primary" disabled>
                                    <b-spinner small type="grow"></b-spinner>
                                    {{ action }}
                                </b-button>
                                <button v-if="load"
                                    class="float-right btn btn-falcon-primary rounded-capsule btn-sm" type="submit">
                                    <i class="fas fa-save"></i> Save User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "user",
        data(){
            return{
                form: new Form({
                    'id'          : '',
                    'name'        : '',
                    'phone'       : '',
                    'password'    : '',
                    'email'       : '',
                    'permissions' : [],
                    'role'        : '',
                    'company_id'  : '',
                }),
                users: [],
                roles: [],
                companies: [],
                permissions: [],
                load: true,
                editMode: false,
                action: '',
                user: {},
                img: '',
                loading: false,
            }
        },
        methods: {
            getUsers(){
                this.loading = true;
                axios.get("/getAllUsers").then((res)=>{
                    this.loading = false;
                    this.users = res.data.users
                }).catch(()=>{
                    this.loading = false;
                    this.$toastr.e("Cannot Load Users", "Error");
                })
            },
            viewUser(user){
                $('#viewUser').modal('show');
                let baseUrl = window.location.origin
                this.img = baseUrl+'/assets/img/team/3-thumb.png';
                // this.img = baseUrl+'/assets/img/team/3-thumb.png'+user.photo;
                this.user = user;
            },
            getRoles(){
                axios.get("/getAllRoles").then((res)=>{
                    this.roles = res.data.roles
                }).catch(()=>{
                    this.$toastr.e("Cannot Load Roles", "Error");
                })
            },
            getAllCompanies(){
                axios.get("/company-profile").then((res)=>{
                    this.companies = res.data.company
                }).catch(()=>{
                    this.$toastr.e("Cannot Load Roles", "Error");
                })
            },
            getPermissions(){
                axios.get("/getAllPermission").then((res)=>{
                    this.permissions = res.data.permissions
                }).catch(()=>{
                    this.$toastr.e("Cannot Load Permission", "Error");
                })
            },
            createUser(){
                this.action = 'Creating user ...'
                this.load = false;
                this.form.post("/account/create").then((res)=>{
                    this.load = true;
                    this.$toastr.s("User Create Successfully", "Created");
                    Fire.$emit("loadUser");
                    $("#createUser").modal("hide");
                    this.form.reset();
                }).catch(()=>{
                    this.load = true;
                    this.$toastr.e("Cannot Create User, Try Again", "Error");
                })
            },
            editUser(user){
                console.log(user)
                this.editMode = true;
                this.form.reset();
                this.form.fill(user);
                this.form.role = user.roles[0].id;
                this.form.permissions = user.userPermissions
                $('#createUser').modal('show');
            },
            updateUser(){
                this.action = 'Update user ...'
                this.load = false;
                this.form.put("/account/update/" +this.form.id).then((response) => {
                    this.load = true;
                    this.$toastr.s("user information updated successfully", "Updated");
                    Fire.$emit("loadUser");
                    $("#createUser").modal("hide");
                    this.form.reset();
                }).catch(() => {
                    this.load = true;
                    this.$toastr.e("Cannot update user information, try again", "Error");
                });
            },
            createMode(){
                this.editMode = false;
                $('#createUser').modal('show');
            },
            modalHide(){
                $('#createUser').modal('hide');
                this.form.reset();
            },
            deleteUser(user){
                swal.fire({
                    title: 'Are you sure?',
                    text: user.name + " will be deleted permanently!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/delete/user/'+user.id).then(() =>{
                            toast.fire({
                                icon: 'success',
                                title: user.name +" has been deleted sucessfully"
                            })
                            Fire.$emit("loadUser");
                        }).catch(() =>{
                            toast.fire({
                                icon: 'error',
                                title: user.name +" was unable to be remove, tyr again later"
                            })
                        })
                    }
                })
            },
        },
        created() {
            this.getUsers();
            this.getRoles();
            this.getPermissions();
            this.getAllCompanies();
            Fire.$on('loadUser', () => {
                this.getUsers();
            });
        }
    }
</script>

<style scoped>

</style>
