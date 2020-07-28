<template>
    <div class="container-fluid" v-if="$gate.isAdmin()">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Sample papers</h3>

                        <div class="card-tools">
                            <button class="btn btn-sm btn-primary" @click="newModal">Upload sample</button>
                        </div>
                    </div>

                    <div class=" table-responsive no-padding">
                            <vue-good-table
                                :line-numbers="true"
                                :columns="columns"
                                :rows="samples"
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
                                <span v-if="props.column.field == 'update'">
                                   <small>{{moment(props.row.created_at).format('MMMM Do YYYY, h:mm:ss a')}}</small>
                                </span>
                                <span v-if="props.column.field == 'read'">
                                   <small>{{props.row.content | truncate(50)}}</small>
                                </span>
                                    <span v-else-if="props.column.field == 'delete'">
                                       <button type="button" class="m-1 btn btn-danger btn-sm btn-circle"
                                               @click="deleteSample(props.row.id)"> Delete
                                    <i class="fas fa-times"></i>
                                </button>
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
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnewLabel">Sample paper</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="submit()" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input v-model="form.title" type="text" class="form-control" name="title"
                                               id="title"
                                               placeholder="Title"
                                               :class="{ 'is-invalid': form.errors.has('title') }">
                                        <has-error :form="form" field="title"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="status">Subject</label>
                                        <select v-model="form.subject"  class="form-control" name="status" id="subject"
                                                :class="{ 'is-invalid': form.errors.has('subject') }">
                                            <option selected value="">--Select Sbujects--</option>
                                            <option   v-for="subject in subjects" :key="subject.id">{{subject.name}}</option>
                                        </select>
                                        <has-error :form="form" field="subject"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="status">Type of paper</label>
                                        <select v-model="form.type" class="form-control" name="type" id="type"
                                                :class="{ 'is-invalid': form.errors.has('type') }">
                                            <option selected value="">--Select Paper type--</option>
                                            <option v-for="type in types" :key="type.id">{{type.name}}</option>
                                        </select>
                                        <has-error :form="form" field="type"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">Paper Format</label>
                                        <input v-model="form.format" type="text" class="form-control" name="format"
                                               id="format"
                                               placeholder="Format"
                                               :class="{ 'is-invalid': form.errors.has('format') }">
                                        <has-error :form="form" field="format"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <vue-editor v-model="form.scontent" id="content" :class="{ 'is-invalid': form.errors.has('scontent') }"></vue-editor>
                                <has-error :form="form" field="scontent"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var moment = require('moment');
    import {VueEditor} from "vue2-editor";

    export default {
        name: "Samples",
        components: {
            VueEditor
        },
        data() {
            return {
                moment,
                columns: [

                    {
                        label: 'Title',
                        field: 'title',
                    },
                    {
                        label: 'Subject',
                        field: 'subject',
                    },
                    {
                        label: 'Type of paper',
                        field: 'type',
                    },
                    {
                        label: 'Content',
                        field: 'read',
                    },
                    {
                        label: 'Format',
                        field: 'format',
                    },
                    {
                        label: 'Date Uploaded',
                        field: 'update',
                    },
                    {
                        label: 'Action',
                        field: 'delete'
                    }
                ],
                samples: [],
                path: '',
                subjects:{},
                types:{},
                attachments: [],
                formf: new FormData(),
                form: new Form({
                    title: '',
                    subject: '',
                    type:'',
                    format:'',
                    scontent: '',
                })
            }
        },
        methods: {
            deleteSample(id) {
                swal.fire({
                    title: 'Delete this Sample?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    // send the request to the controller
                    if (result.value) {
                      axios.delete("/api/sample/" + id).then(() => {
                            swal.fire(
                                'Success!',
                                'Sample deleted successfully',
                                'success'
                            )
                           Fire.$emit('entry');
                        });
                    }
                }).catch(() => {
                    $swal("Failed!", "There was something wrong.", "warning");
                })
            },
            getImage(e) {
                let file = e.target.files[0];
                var reader = new FileReader();
                if (file['size'] < 2111775) {
                    if (file['type'] == 'image/png' || file['type'] == 'image/jpg' || file['type'] == 'image/jpeg') {
                        reader.onloadend = (file) => {
                            // console.log('Result', reader.result)
                            this.form.image = reader.result;
                        }

                        reader.readAsDataURL(file);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Ooops...',
                            text: 'Only images and pdfs are allowed',
                        })
                    }

                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Ooops...',
                        text: 'You are uploading a large file',
                    })
                }
            },
            getSamples() {
                axios.get("/api/sample").then(({data}) => ([this.samples = data]));
            },
             getSubject() {
                axios.get("/api/subjects").then(({data}) => ([this.subjects = data]));
            },
             getTypes() {
                axios.get("/api/types").then(({data}) => ([this.types = data]));
            },
            submit() {
                this.form.post('/api/sample').then(() => {
                    $('#addnew').modal('hide');
                    this.form.reset();
                    Fire.$emit('entry');
                    swal.fire({
                        type: 'success',
                        title: 'Submitted!!',
                        text: 'Successfully',
                    })
                }).catch(error => {
                    swal.fire({
                        type: 'error',
                        title: 'Error!!',
                        text: 'a problem occurred',
                    })
                })
            },
            fieldChange(e) {
                let selectedFiles = e.target.files;
                if (!selectedFiles.length) {
                    return false;
                }
                for (let i = 0; i < selectedFiles.length; i++) {
                    this.attachments.push(selectedFiles[i]);
                }
            },
            newModal() {
                this.form.reset();
                $('#addnew').modal('show');
            },
        },
        created() {
            this.getSamples();
            this.getSubject();
            this.getTypes();
             Fire.$on('entry', () => {
                this.getSamples();
            })
        }
    }
</script>

<style scoped>

</style>
