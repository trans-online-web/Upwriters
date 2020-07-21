<template>
    <div class="container" v-if="$gate.isAdmin()">
        <div class="row mt-5">

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Users</h3>
                    </div>

                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <vue-good-table
                                :line-numbers="true"
                                :columns="columns"
                                :rows="users"
                                :pagination-options="{
                               enabled: true,
                               mode: 'pages',
                               perPage: 10
                             }"
                                :search-options="{
                                enabled: true,
                                placeholder: 'Search this table',
                              }">
                                <template slot="table-row" slot-scope="props">
                                    <span v-if="props.column.field == 'registered'">
                                        <small class="text-primary">{{props.row.created_at | myDatetime}}</small>
                                    </span>
                                    <span v-else-if="props.column.field == 'modify'">
                                    <a class="btn btn-info btn-sm" href="#" @click="editModal(props.row, props.row.id)">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                </span>
                                    <span v-else-if="props.column.field == 'view'">
                                    <router-link :to="{path:'/userDetails/'+ props.row.id}">
                                    <button type="button" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                        More
                                </button>
                                    </router-link>
                                </span>
                                    <span v-else>
                                        {{props.formattedRow[props.column.field]}}
                                    </span>
                                </template>
                            </vue-good-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                columns: [
                    {
                        label: 'Name',
                        field: 'name',
                    },
                    {
                        label: 'Email',
                        field: 'email',
                    },
                    {
                        label: 'Role',
                        field: 'role',
                    },
                    {
                        label: 'Registered',
                        field: 'registered',
                    },
                    {
                        label: 'View',
                        field: 'view',
                    },
                    {
                        label: 'Modify',
                        field: 'modify',
                    },
                ],
                editMode: false,
                users :{},
                userInfo:{},
                form: new Form({
                    id:'',
                    name:'',
                    email: '',
                })
            }
        },
        methods:{

            sendEmailId(value){

            var that=this;
            axios.get('api/user/'+value.id).then(response=>{
             that.userInfo=response.data.data

             that.userInfo.referredBy = value.referred_by;

             console.log(that.userInfo)

            }).catch().finally();

            },


            getResults(page = 1) {
                axios.get('api/user?page=' + page)
                    .then(response => {
                        this.users = response.data;
                    });
            },
            updateUser(){
                this.$Progress.start();
                this.form.put('api/user/'+this.form.id)
                    .then(()=>{
                        $('#addnew').modal('hide');
                        swal.fire(
                            'Edited!',
                            'User information updated.',
                            'success'
                        )
                        this.$Progress.finish();
                        Fire.$emit('AfterCreate');
                    })
                    .catch(()=>{
                        this.$Progress.fail();
                    })
            },
            editModal(user){
                this.editMode = true;
                this.form.reset();
                this.form.fill(user);
                $('#addnew').modal('show');
            },
            newModal(){
                this.editMode = false;
                this.form.reset();
                $('#addnew').modal('show');
            },
            deleteUser(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    // send the request to the controller
                    if (result.value) {
                        this.form.delete('api/user/'+ id).then(()=>{
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            Fire.$emit('AfterCreate');
                        });
                    }
                }).catch(()=>{
                    swal("Failed!", "There was something wrong.", "warning");
                })
            },
            loadUsers(){
                    axios.get("api/user").then(({ data }) => (this.users = data));
            },
            createUser(){
                this.$Progress.start();
                this.form.post('api/user')
                    .then(() => {
                        Fire.$emit('AfterCreate');
                        $('#addnew').modal('hide')
                        toast.fire({
                            type: 'success',
                            title: 'User Created in successfully'
                        })
                        this.$Progress.finish();
                    })
                    .catch(() => {
                    })
            }
        },
        created() {
            Fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findUser?q=' + query)
                    .then((data)=>{
                        this.users = data.data;
                    })
                    .catch(()=>{
                    })
            })
            this.loadUsers();
            Fire.$on('AfterCreate', () =>{
                this.loadUsers();
            })
            //setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>
