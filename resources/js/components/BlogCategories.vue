<template>
    <div class="container-fluid" v-if="$gate.isAdmin()">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Blog Categories</h3>

                        <div class="card-tools">
                            <button class="btn btn-sm btn-primary" @click="newModal">Add Category</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="cat in categories.data" :key="cat.id">
                                    <td>{{cat.name}}</td>
                                    <td>
                                        <a href="#" @click="deleteCategory(cat.id)">
                                            <i class="fa fa-trash p-1 text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnewLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="addCategory()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Category</label>
                                <input v-model="form.category" type="text" name="category"
                                       placeholder="Enter Category"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('category') }">
                                <has-error :form="form" field="category"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BlogCategories",
        data(){
            return {
                categories: '',
                form: new Form({
                    category: ''
                })
            }
        },
        methods: {
            deleteCategory(id){
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    //type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if(result.value){
                        this.form.delete("api/category/"+id).then(()=>{
                            swal.fire(
                                'Delete!',
                                'Deleted!!',
                                'success'
                            )
                            Fire.$emit('entry');
                        }).catch(()=>{
                            swal.fire('Failed!','There was something wrong')
                        });
                    }
                })
            },
            getCategories(){
                axios.get("/api/category").then(({ data }) => ([this.categories = data]));
            },
            addCategory(){
                this.form.post('api/category')
                    .then(() => {
                        Fire.$emit('entry');
                        toast.fire({
                            type: 'success',
                            title: 'Category created successfully'
                        });
                        this.form.reset();
                        $('#addnew').modal('hide');
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                        swal.fire({
                            type: 'error',
                            title: 'Error!!',
                            text: error.response.data.msg,

                        })
                    })
            },
            newModal(){
                this.form.reset();
                $('#addnew').modal('show');
            },
        },
        created() {
            this.getCategories();
            Fire.$on('entry', () =>{
                this.getCategories();
            })
        }
    }
</script>

<style scoped>

</style>