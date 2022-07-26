<template>
    <div class="card">
<!--        {{ menus }}-->
        <div class="card-header d-flex justify-content-between">
            <div class="card-title">Role Table</div>
            <div class="card-tools">
                <a href="javascript:void(0)" @click="createMode" class="btn btn-falcon-primary rounded-capsule btn-sm">
                    <i class="fas fa-shield-alt"></i> Add Role
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-dashboard datatable table-bordered no-wrap mb-0 fs--1 w-100">
                <thead>
                <tr>
                    <th class="sort">ID</th>
                    <th class="sort">Role</th>
                    <th class="sort">Permission</th>
                    <th class="sort">Date Posted</th>
                    <th class="sort">Action</th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="role in roles" :key="role.id">
                        <td>{{ role.id }}</td>
                        <td>{{ role.name }}</td>
                        <td>
                            <div v-for="permission in role.permissions">
                                <span>{{ permission.name }}</span>
                            </div>
                        </td>
                        <td>{{ role.created_at | date }}</td>
                        <td>
                            <a href="javascript:void(0)" @click="editRole(role)" class="text-warning"> <i class="fa fa-edit"></i></a> ||
                            <a href="javascript:void(0)" @click="deleteRole(role)" class="text-danger"> <i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Modal-->
            <div class="modal fade" id="roleCreate" tabindex="-1" role="dialog" aria-labelledby="roleCreateModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="roleCreateModalLabel">Profile Edit Title</h5>
                            <button class="close close-btn" type="button" @click="modalHide">
                                <span class="font-weight-light" aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="!editMode ? createRole() : updateRole()">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input v-model="form.name" type="text" name="name" placeholder="Role Name"
                                               class="form-control" :class="{'is-invalid': form.errors.has('name')}">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                    <ul id="myUL">
                                        <li v-for="menu in menus">
                                            <b-form-checkbox
                                                v-model="form.permissions"
                                                :key="menu.name"
                                                :value="menu.name"
                                                name="flavour-3a"
                                            >
                                                {{menu.name}}
                                            </b-form-checkbox>
                                            <ul v-if="menu.children.length>0">
                                                <li v-for="sub_menu in menu.children">
                                                    <b-form-checkbox
                                                        v-model="form.permissions"
                                                        :key="sub_menu.name"
                                                        :value="sub_menu.name"
                                                        name="flavour-3a"
                                                    >
                                                        {{sub_menu.name}}
                                                    </b-form-checkbox>
<!--                                                    <ul v-if="sub_menu.submenus.length>0" :class="{active:sub_menu.permitted}" class="nested" >-->
<!--                                                        <li v-for="submenu in sub_menu.submenus">-->
<!--                                                            <b-form-checkbox-->
<!--                                                                :id="'submenu_'+submenu.submenu_id"-->
<!--                                                                v-model="submenu.permitted"-->
<!--                                                                :name="'submenu'+submenu.submenu_id"-->
<!--                                                                value=true-->
<!--                                                                unchecked-value="">-->
<!--                                                                {{submenu.submenu_name}}-->
<!--                                                            </b-form-checkbox>-->
<!--                                                        </li>-->
<!--                                                    </ul>-->
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

<!--                                    <b-form-group>-->
<!--                                        <template #label>-->
<!--                                            <b>Choose your flavours:</b><br>-->
<!--                                            <b-form-checkbox-->
<!--                                                v-model="allSelected"-->
<!--                                                :indeterminate="indeterminate"-->
<!--                                                aria-describedby="flavours"-->
<!--                                                aria-controls="flavours"-->
<!--                                                @change="toggleAll"-->
<!--                                            >-->
<!--                                                {{ allSelected ? 'Un-select All' : 'Select All' }}-->
<!--                                            </b-form-checkbox>-->
<!--                                        </template>-->

<!--                                        <template v-slot="{ ariaDescribedby }">-->
<!--                                            <b-form-checkbox-group-->
<!--                                                id="flavors"-->
<!--                                                v-model="form.permissions"-->
<!--                                                :options="flavours"-->
<!--                                                :aria-describedby="ariaDescribedby"-->
<!--                                                name="flavors"-->
<!--                                                class="ml-4"-->
<!--                                                aria-label="Individual flavours"-->
<!--                                                stacked-->
<!--                                            ></b-form-checkbox-group>-->
<!--                                        </template>-->
<!--                                    </b-form-group>-->

<!--                                    Old-->
<!--                                    <b-form-group label="Assign Permissions">-->
<!--                                        <b-form-checkbox-->
<!--                                            v-for="option in permissions"-->
<!--                                            v-model="form.permissions"-->
<!--                                            :key="option.name"-->
<!--                                            :value="option.name"-->
<!--                                            name="flavour-3a"-->
<!--                                        >-->
<!--                                            {{ option.name }}-->
<!--                                        </b-form-checkbox>-->
<!--                                    </b-form-group>-->
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <b-button v-if="!load"
                                              class="float-right btn btn-falcon-primary rounded-capsule btn-sm"
                                              variant="primary" disabled>
                                        <b-spinner small type="grow"></b-spinner>
                                        {{ action }}
                                    </b-button>
                                    <button v-if="load" type="submit" class="btn btn-sm btn-primary">
                                        <i class="fas fa-save"></i> Save Role
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "role",
        data(){
            return{
                form: new Form({
                   'id'          : '',
                   'name'        : '',
                   'permissions' : []
                }),
                permissions: [],
                menus: [],
                load: true,
                permitted: true,
                roles: [],
                selected: [],
                editMode: false,
                action: '',
                allSelected: false,
                indeterminate: false
            }
        },
        methods:{
            toggleAll(checked) {
                this.selected = checked ? this.flavours.slice() : []
            },
            getRoles(){
                axios.get("/getAllRoles").then((res)=>{
                    this.roles = res.data.roles
                    // console.log(res.data.roles)
                }).catch(()=>{
                    this.$toastr.e("Cannot Load Roles", "Error");
                })
            },
            getPermissions(){
                axios.get("/getAllPermission")
                    .then((res)=>{
                        this.permissions = res.data.permissions
                        this.menus = res.data.menus
                    }).catch(()=>{
                        swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something Went Wrong!',
                        })
                })
            },
            createMode(){
                this.editMode = false;
                $('#roleCreate').modal('show');
            },
            modalHide(){
                $('#roleCreate').modal('hide');
                this.form.reset();
            },
            editRole(role){
                console.log(role);
                this.editMode = true;
                this.form.reset();
                this.form.fill(role);
                this.form.permissions = role.rolePermission
                $('#roleCreate').modal('show');
            },
            createRole(){
                this.action = 'Creating Role ...'
                this.load = false
                this.form.post("/postRole").then(()=>{
                    Fire.$emit("loadRole");
                    this.load = true;
                    this.$toastr.s("Role Created Successfully", "Created");
                    $("#roleCreate").modal("hide");
                    this.form.reset();
                }).catch(()=>{
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something Went Wrong!',
                    })
                });
                this.dis = true
            },
            updateRole(){
                this.action = 'Update Role ...'
                this.load = false;
                this.form.put("/postUpdateRole/" +this.form.id).then((response) => {
                    console.log(response)
                    this.load = true;
                    this.$toastr.s("Role information updated successfully", "Updated");
                    Fire.$emit("loadRole");
                    $("#roleCreate").modal("hide");
                    this.form.reset();
                }).catch(() => {
                    this.load = true;
                    this.$toastr.e("Cannot update Role information, try again", "Error");
                });
            },
            deleteRole(role){
                swal.fire({
                    title: 'Are you sure?',
                    text: role.name + " Role will be deleted permanently!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/deleteRole/'+role.id).then(() =>{
                            toast.fire({
                                icon: 'success',
                                title: role.name +" Role has been deleted sucessfully"
                            })
                            Fire.$emit("loadRole");
                        }).catch(() =>{
                            toast.fire({
                                icon: 'error',
                                title: role.name +" Role was unable to be remove, tyr again later"
                            })
                        })
                    }
                })
            },
        },
        created() {
            this.getPermissions();
            this.getRoles();
            Fire.$on('loadRole', () => {
                this.getRoles();
            });
            // this.createRole();
        }
    }
</script>

<style scoped>
    /* Remove default bullets */
    ul, #myUL {
        list-style-type: none;
    }

    /* Remove margins and padding from the parent ul */
    #myUL {
        margin: 0;
        padding: 0;
    }

    /* Style the caret/arrow */
    .caret {
        cursor: pointer;
        user-select: none; /* Prevent text selection */
        float:left;
    }

    /* Create the caret/arrow with a unicode, and style it */
    .caret::before {
        content: "\25B6";
        color: black;
        display: inline-block;
        margin-right: 6px;
    }

    /* Rotate the caret/arrow icon when clicked on (using JavaScript) */
    .caret-down::before {
        transform: rotate(90deg);
    }

    /* Hide the nested list */
    .nested {
        display: none;
    }

    /* Show the nested list when the user clicks on the caret/arrow (with JavaScript) */
    .active {
        display: block;
    }
</style>
