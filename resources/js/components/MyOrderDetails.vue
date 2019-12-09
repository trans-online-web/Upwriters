<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Order Details</h3>
                        <div class="card-tools">
                            <a href="/myorder">
                                <button type="button" class="btn btn-primary btn-sm">
                                    <i class="fa fa-hand-point-left"></i>
                                    Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-header">
                                        <h4 class="box-title">Order Details</h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding table-responsive p-0">
                                        <table class="table table-striped">
                                            <tbody>
                                            <tr>
                                                <th>Title</th>
                                                <th style="width: 40px">Details</th>
                                            </tr>
                                            <tr>
                                                <td>Document's Title</td>
                                                <td><span>{{details.title}}</span></td>
                                            </tr>
                                            <tr>
                                                <td>Level</td>
                                                <td><span>{{details.level}}</span></td>
                                            </tr>
                                            <tr>
                                                <td>Subject</td>
                                                <td>
                                                    <span v-if="details.other_subject">{{details.subject_name}}({{details.other_subject}})</span>
                                                    <span v-if="!details.other_subject">{{details.subject_name}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Document Type</td>
                                                <td><span>{{details.documentType_name}}</span></td>
                                            </tr>
                                            <tr>
                                                <td>No. of Pages</td>
                                                <td><span>{{details.pages}}</span></td>
                                            </tr>
                                            <tr>
                                                <td>Deadline</td>
                                                <td><span style="color: red;">{{details.deadline_datetime|myDatetime}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Spacing</td>
                                                <td><span>{{details.spacing}}</span></td>
                                            </tr>
                                            <tr>
                                                <td>Format</td>
                                                <td><span>{{details.format}}</span></td>
                                            </tr>
                                            <tr>
                                                <td>Cost</td>
                                                <td><span>${{details.suggested_price}}</span></td>
                                            </tr>
                                            <tr>
                                                <td>Your Budget</td>
                                                <td><span>${{details.budget}}</span></td>
                                            </tr>
                                            <tr>
                                                <td>Agreed Price</td>
                                                <td><span>${{details.agreedAmount}}</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-header">
                                        <h5 class="box-title">Files Attached</h5>
                                        <div class="box-tools">
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" @click="newModal"><i
                                                    class="fas fa-paperclip"></i>Add Files
                                            </button>
                                        </div>
                                    </div>
                                    <div class="box-body" v-if="this.filesCount > 0" style="padding-top: 10px;">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12" v-for="file in files"
                                                 :key="file.id">
                                                <a href="#" @click.prevent="download(file.id, file.path)">
                                                    <div class="info-box">
                                                        <span class="info-box-icon"
                                                              style="background-color: #a60de2;"><i
                                                                class="fas fa-download"
                                                                style="color: white;"></i></span>

                                                        <div class="info-box-content">
                                                            <span class="info-box-text">{{file.path.substring(18)}}</span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                </a>
                                                <!-- /.info-box -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert alert-warning alert-dismissible" v-if="this.filesCount == 0">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                        </button>
                                        <h5><i class="icon fa fa-ban"></i> Alert!</h5>
                                        No files attached!!
                                    </div>
                                </div>
                                <div class="box">
                                    <div class="box-header">
                                        <h5 class="box-title">Completed</h5>
                                    </div>
                                    <div class="box-body" v-if="this.filesCount > 0" style="padding-top: 10px;">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12" v-for="complete in completed"
                                                 :key="complete.id">
                                                <a href="#"
                                                   @click.prevent="downloadCompleted(complete.id, complete.path)">
                                                    <div class="info-box">
                                                        <span class="info-box-icon"
                                                              style="background-color: #31d125;"><i
                                                                class="fas fa-download"
                                                                style="color: white;"></i></span>

                                                        <div class="info-box-content">
                                                            <span class="info-box-text">{{complete.path.substring(18)}}</span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                </a>
                                                <!-- /.info-box -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert alert-warning alert-dismissible" v-if="this.filesCount == 0">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                        </button>
                                        <h5><i class="icon fa fa-ban"></i> Alert!</h5>
                                        No files attached!!
                                    </div>
                                </div>
                                <hr>
                                <div class="box">
                                    <div class="box-header">
                                        <h5 class="box-title">Actions</h5>
                                    </div>
                                    <div class="box-body" style="padding-top: 10px;">
                                        <button type="button" class="btn btn-warning btn-sm" @click="revisionModal">
                                            Revision
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body composer">
                                    <textarea v-model="message"
                                              placeholder="Write your question here..."></textarea><br>
                                    <div class="col-md-10">
                                        <button class="btn btn-success btn-md pull-left" @click="sendMessage"><i
                                                class="fas fa-paper-plane"></i>&nbsp;Send message
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="card-body conversation">
                                <h1>Messages</h1>
                                <div class=" badge badge-pill badge-primary">{{typing}}</div>
                                <div class="card-body feed" ref="feed">
                                    <ul>

                                        <li v-for="message in messages"
                                            :class="`message${message.to == users ? ' sent' : ' received'}`"
                                            :key="message.id">
                                            <div class="text">
                                                <span class="messo">{{ message.text }}</span><br/>
                                                <small class="date">{{message.created_at | myDate}}</small>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnewLabel">Add Files</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="submit()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="files">Upload Files</label>
                                <input type="file" multiple class="form-control-file" @change="fieldChange" id="files">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="revisionModal" tabindex="-1" role="dialog" aria-labelledby="addnewLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Submit Revision</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="isValid()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input v-model="form.title" type="text" class="form-control" id="title"
                                       placeholder="Title"
                                       :class="{ 'is-invalid': form.errors.has('title') }">
                                <has-error :form="form" field="title"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Revision Instructions</label>
                                <vue-editor v-model="form.instruction"></vue-editor>
                                <small style="color: red;">{{e_instruction}}</small>
                            </div>
                            <div class="form-group justify-content-center">
                                <label for="files">Attach file(s) if need be</label>
                                <input type="file" multiple class="form-control-file" @change="fieldChange"
                                       id="revfiles">
                                <has-error :form="form" field="files"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i>
                                Submit
                            </button>
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
        components: {
            VueEditor
        },
        data() {
            return {
                message: '',
                e_instruction: '',
                typing: '',
                user: {},
                users: {},
                messages: [],
                orderId: this.$route.params.orderId,
                details: {},
                filesCount: {},
                files: {},
                completed: {},
                attachments: [],
                unreadIds: {},
                formf: new FormData(),
                formr: new FormData(),
                form: new Form({
                    title: '',
                    instruction: '',
                    orderId: this.$route.params.orderId,
                })
            }
        },

        mounted() {
            Echo.private(`message.${user['id']}`)
                .listen('ChatEvent', (e) => {
                    this.messages.push(e.message);
                })
                .listenForWhisper('typing', (e) => {
                    if (e.name != '') {
                        this.typing = 'typing..'
                    } else {
                        this.typing = ''
                    }
                });
        },
        methods: {
            postRevision(){
                for (let i = 0; i < this.attachments.length; i++) {
                    this.formr.append('files[]', this.attachments[i]);
                }

                this.formr.append('orderId', this.form.orderId);
                this.formr.append('title', this.form.title);
                this.formr.append('instruction', this.form.instruction);

                const config = {headers: {'Content-Type': 'multipart/form-data'}};

                axios.post('/api/revision/', this.formr, config).then(response => {
                    Fire.$emit('entry');
                    $('#revisionModal').modal('hide');
                    this.attachments = [];
                    this.form.reset();
                    swal.fire({
                        type: 'success',
                        title: 'Submited!!',
                        text: 'Files added successfully',

                    })

                })
                    .catch(response => {
                        //error
                    });
            },
            isValid() {
                if (!this.form.title){
                    this.form.errors.set({
                        title: 'This field is required'
                    })
                    return false;
                }else if (!this.form.instruction){
                    this.e_instruction = "This field is required";
                    return false;
                }else {
                    this.postRevision();
                }
            },
            revisionModal() {
                this.form.reset();
                this.form.clear();
                $("#revfiles").val('');
                $('#revisionModal').modal('show');
            },
            handleIncoming(message) {
                this.messages.push(message);

            },
            scrollToBottom() {
                setTimeout(() => {
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                }, 50);
            },
            saveNewMessage(message) {
                this.messages.push(message);
            },
            downloadCompleted(id, path) {
                axios.get("/api/downloadcompleted/" + id, {responseType: 'blob'})
                    .then((response) => {
                        var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                        var fileLink = document.createElement('a');
                        console.log(fileLink);
                        fileLink.href = fileURL;
                        fileLink.setAttribute('download', path.substring(18));
                        document.body.appendChild(fileLink);
                        fileLink.click();
                    });
            },
            getCompleted() {
                axios.get("/api/getcompleted/" + this.orderId).then(({data}) => ([this.completed = data]));
            },
            submit() {
                for (let i = 0; i < this.attachments.length; i++) {
                    this.formf.append('files[]', this.attachments[i]);
                }

                const config = {headers: {'Content-Type': 'multipart/form-data'}};

                axios.post('/api/addFiles/' + this.orderId, this.formf, config).then(response => {
                    Fire.$emit('entry');
                    $('#addnew').modal('hide');
                    this.attachments = [];
                    this.form.reset();
                    swal.fire({
                        type: 'success',
                        title: 'Submited!!',
                        text: 'Files added successfully',

                    })

                })
                    .catch(response => {
                        //error
                    });
            },
            send(e) {

                if (this.message == '') {
                    return;
                }
                this.$emit('send', this.message);
                this.message = '';
            },
            sendMessage(e) {
                e.preventDefault();
                if (this.message == '') {
                    return;
                }
                axios.post('/api/messenger/send', {
                    text: this.message,
                    OrderId: this.orderId,
                    contact_id: this.users,
                }).then((response) => {
                    this.messages.push(response.data);
                    this.message = '';
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
                $("#files").val('');
                this.attachments = [];
                $('#addnew').modal('show');
            },
            download(id, path) {
                axios.get("/api/download/" + id, {responseType: 'blob'})
                    .then((response) => {
                        var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                        var fileLink = document.createElement('a');
                        console.log(fileLink);
                        fileLink.href = fileURL;
                        fileLink.setAttribute('download', path.substring(18));
                        document.body.appendChild(fileLink);
                        fileLink.click();
                    });
            },
            getDetails() {
                axios.get("/api/task/" + this.orderId).then(({data}) => ([this.details = data]));
            },

            getFilesCount() {
                axios.get("/api/ifFiles/" + this.orderId).then(({data}) => ([this.filesCount = data]));
            },

            getFiles() {
                axios.get("/api/getFiles/" + this.orderId).then(({data}) => ([this.files = data]));
            },
            getThisUser() {
                axios.get("/api/getThisUser/" + this.orderId).then(({data}) => ([this.user = data]));
            },
            getMessages() {
                axios.get("/api/getMessage/" + this.orderId).then((response) => (this.messages = response.data));
            },
            getUser() {
                axios.get("/api/getAdmin/").then(({data}) => ([this.users = data]));
            },
            getUnread() {
                axios.get("/api/unread/" + this.orderId).then((response) => (this.unreadIds = response['unread']));
            },
        },
        watch: {
            messages(messages) {
                this.scrollToBottom();
            },
            message() {
                Echo.private(`message.${user['id']}`)
                    .whisper('typing', {
                        name: this.message
                    });
            },
        },
        created() {
            this.getDetails();
            this.getFilesCount();
            this.getFiles();
            this.getUser();
            this.getThisUser();
            this.getMessages();
            this.getCompleted();
            Fire.$on('entry', () => {
                this.getDetails();
                this.getFilesCount();
                this.getFiles();
                this.getUser();
                this.getMessages();
                this.getThisUser();
            })
        }
    }
</script>
<style lang="scss" scoped>
    .composer textarea {
        width: 80%;
        margin: 10px;
        border-radius: 3px;
        border: 1px solid lightgray;
        padding: 6px;
    }

    .conversation {
        overflow-y: scroll;
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        h1 {
            font-size: 20px;
            padding: 10px;
            margin: 0;
            border-bottom: 1px dashed lightgray;
        }
    }

    .messo {
        font-size: 15px;
        font-weight: 700;
    }

    .date {
        color: #9e9e9e;
        font-weight: 700;
    }

    .feed {
        background: #f0f0f0;
        height: 100%;
        max-height: 470px;
        overflow: scroll;

        ul {
            list-style-type: none;
            padding: 5px;

            li {
                &.message {
                    margin: 10px 0;
                    width: 100%;

                    .text {
                        max-width: 400px;
                        border-radius: 5px;
                        padding: 12px;
                        display: inline-block;
                    }

                    &.received {
                        text-align: right;

                        .text {
                            background: #00e676;
                        }
                    }

                    &.sent {
                        text-align: left;

                        .text {
                            background: #81c4f9;
                        }
                    }
                }
            }
        }
    }
</style>
