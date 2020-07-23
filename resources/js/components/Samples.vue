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

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4" v-for="blog in blogs.data" :key="blog.id">
                                <div class="card">
                                    <img class="card-img-top" :src="blog.image" alt="Card image cap"
                                         style="height: 250px;">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: black">{{blog.title}}</h5>
                                        <small>{{blog['date']|myDate}}</small>
                                        <p>
                                            <router-link :to="{path:'/readmore/'+ blog.id}"
                                                         class="btn btn-primary btn-sm">Read More
                                            </router-link>
                                            <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                            <option selected value="">--Select Status--</option>
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
                                            <option selected value="">--Select Status--</option>
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
    import {VueEditor} from "vue2-editor";

    export default {
        name: "Samples",
        components: {
            VueEditor
        },
        data() {
            return {
                categories: '',
                blogs: {},
                path: '',
                images: {},
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
            getBlog() {
                axios.get("/api/blog").then(({data}) => ([this.blogs = data]));
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
            getCategories() {
                axios.get("/api/category").then(({data}) => ([this.categories = data]));
            },
            getSubjects(){
                axios.get("/api/subjects").then(({data}) => ([this.subjects = data]));
            },
            getTypes(){
                axios.get("/api/types").then(({data}) => ([this.types = data]));
            },
            newModal() {
                this.form.reset();
                $('#addnew').modal('show');
            },
        },
        created() {
            this.getCategories();
            this.getSubjects();
            this.getTypes();
            this.getBlog();
            Fire.$on('entry', () => {
                this.getBlog();
            })
        }
    }
</script>

<style scoped>

</style>
