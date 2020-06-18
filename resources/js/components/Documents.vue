<template>
    <div class="container" v-if="$gate.isAdmin()">
        <div class="row pt-3" >
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Documents</h3>

                        <div class="card-tools">
                            <button class="btn btn-sm btn-primary" @click="newModal">Add Documents</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <vue-good-table
                            :line-numbers="true"
                            :columns="columns"
                            :rows="$store.state.documents"
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
                                <span v-if="props.column.field == 'action'">
                                    <a href="#" @click="editModal(props.row)">
                                        <i class="fa fa-edit p-1 text-primary"></i>
                                    </a>
                                    <a href="#" @click="deleteDocument(props.row.id)">
                                        <i class="fa fa-trash p-1 text-danger"></i>
                                    </a>
                                </span>
                                <span v-else>
                                        {{props.formattedRow[props.column.field]}}
                                    </span>
                            </template>
                        </vue-good-table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- //Modal -->
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-show="!editMode" class="modal-title" id="addnewLabel">Add Document</h5>
                        <h5 v-show="editMode" class="modal-title" id="addnewLabel">Edit Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? updateDocument() : addDocument()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Document Name</label>
                                <input v-model="form.name" type="text" name="name"
                                       placeholder="Enter document"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="!editMode" type="submit" class="btn btn-success">Create</button>
                            <button v-show="editMode" type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
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
                        label: 'Action',
                        field: 'action'
                    }
                ],
                editMode:false,
                document:{},
                form: new Form({
                    id:'',
                    name: '',
                })
            }
        },

        methods: {
            addDocument(){
                this.$Progress.start();
                this.form.post('api/document')
                    .then(()=>{
                        this.$store.dispatch('getDocuments');
                        Fire.$emit('entry');
                        $('#addnew').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'Document created successfully'
                        });
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        this.$Progress.fail();
                    });
            },
            deleteDocument(id){
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
                        this.form.delete("api/document/"+id).then(()=>{
                            this.$store.dispatch('getDocuments');
                            swal(
                                'Delete!',
                                'Your file has been deleted.',
                                'success'
                            )
                            Fire.$emit('entry');
                        }).catch(()=>{
                            swal('Failed!','There was something wrong')
                        });
                    }
                })
            },
            newModal(){
                this.editMode = false;
                this.form.reset();
                $('#addnew').modal('show');
            },
            editModal(document_types){
                this.editMode = true;
                this.form.reset();
                $('#addnew').modal('show');
                this.form.fill(document_types);
            },
            updateDocument(){
                this.$Progress.start();
                this.form.put('api/document/'+this.form.id)
                    .then(()=>{
                        this.$store.dispatch('getDocuments');
                        $('#addnew').modal('hide');
                        swal(
                            'Updated!',
                            'Your Document has been updated.',
                            'success'
                        )
                        this.$Progress.finish();
                        Fire.$emit('entry');
                    })
                    .catch(()=>{
                        this.$Progress.fail();
                    })
            }
        },
        created() {
            this.$store.dispatch('getDocuments');
        }
    }
</script>

