<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12" style="padding: 30px">
                <div class="row">
                    <div class="col-sm-4" v-for="blog in blogs.data" :key="blog.id">
                        <div class="card justify-content-center">
                            <img class="card-img-top" :src="blog.image" alt="Card image cap" style="height: 250px">
                            <div class="card-body">
                                <h5 class="card-title" style="color: black">{{blog.title}}</h5>
                                <small>{{blog.date | myDate}}</small>
                                <p>
                                    <a :href="'/blogcontent/'+ blog.id" class="btn btn-primary btn-sm">Read More</a>
                                </p>
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
                        <h5 class="modal-title" id="addnewLabel">Create Story</h5>
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
                                        <label for="status">Status</label>
                                        <select v-model="form.status" class="form-control" name="status" id="status"
                                                :class="{ 'is-invalid': form.errors.has('level') }">
                                            <option selected value="">--Select Status--</option>
                                            <option value="published">Published</option>
                                            <option value="draft">Draft</option>
                                        </select>
                                        <has-error :form="form" field="status"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <vue-editor v-model="form.bcontent" id="content"></vue-editor>
                                <has-error :form="form" field="bcontent"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="image">Headline Image</label>
                                <input type="file" @change="fieldChange" class="form-control-file" id="image"
                                       accept="image/*"
                                       :class="{ 'is-invalid': form.errors.has('image') }" name="image">
                                <has-error :form="form" field="image"></has-error>
                            </div>
                            <div class="col">
                                <label for="category">Category</label><br>
                                <div class="form-check form-check-inline" v-for="cat in categories.data" :key="cat.id">
                                    <input v-model="form.category" class="form-check-input" type="radio"
                                           name="category" id="category" :value="cat.id"
                                           :class="{ 'is-invalid': form.errors.has('category') }">
                                    <label class="form-check-label">{{cat.name}}</label>
                                    <has-error :form="form" field="category"></has-error>
                                </div>
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
    import {VueEditor} from "vue2-editor";
    import moment from 'moment';

    export default {
        name: "Blog",
        components: {
            VueEditor
        },
        data() {
            return {
                categories: '',
                blogs: {},
                path: '',
                images: {},
                attachments: [],
                formf: new FormData(),
                form: new Form({
                    title: '',
                    status: '',
                    bcontent: '',
                    category: '',
                    image: [],
                })
            }
        },
        methods: {
            getBlog() {
                axios.get("/api/blog").then(({data}) => ([this.blogs = data]));
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
            newModal() {
                this.form.reset();
                $('#addnew').modal('show');
            },
        },
        created() {
            this.getCategories();
            this.getBlog();
            Fire.$on('entry', () => {
                this.getBlog();
            })
        }
    }
</script>

<style scoped>

</style>