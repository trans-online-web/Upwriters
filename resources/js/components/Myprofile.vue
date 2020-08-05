
<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                
                <div class="col-md-12">
                    <div class="card">
                    
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- Activity Tab -->

                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">

                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputName"  class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="text" v-model="form.name" class="form-control" id="inputName" placeholder="Name" :class="{ 'is-invalid': form.errors.has('name') }">
                                                <has-error :form="form" field="name"></has-error>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                            <div class="col-sm-10">
                                                <input type="email" v-model="form.email" class="form-control" id="inputEmail" placeholder="Email"  :class="{ 'is-invalid': form.errors.has('email') }">
                                                <has-error :form="form" field="email"></has-error>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                                            <div class="col-sm-10">
                                                <input type="tel" v-model="form.phone_number" class="form-control" id="inputPhone" placeholder="Phone"  :class="{ 'is-invalid': form.errors.has('phone') }">
                                                <has-error :form="form" field="phone"></has-error>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSkills" class="col-sm-6 control-label">Password (leave empty if not changing)</label>

                                            <div class="col-sm-10">
                                                <input type="password" v-model="form.password"class="form-control" id="inputSkills" placeholder="password"  :class="{ 'is-invalid': form.errors.has('password') }">
                                                <has-error :form="form" field="password"></has-error>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" @click.prevent="updateInfo" class="btn btn-danger">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.card-body -->
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
                form: new Form({
                    id:'',
                    name:'',
                    email: '',
                    phone_number: '',
                    password:'',
                
                })
            }
        },
        methods:{
        
            updateInfo(){
                this.$Progress.start();
                this.form.put('api/profile/')
                    .then(()=>{
                        Fire.$emit('AfterCreate');
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        this.$Progress.fail();
                    });
            },
        },
    
        created() {
            axios.get("api/profile")
                .then(({ data }) => (this.form.fill(data)));
        }
    }
</script>
