<template>
    <div class="container" v-if="$gate.isAdmin()">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Orders</h3>
                        <div class="card-tools">
                            <button class="btn btn-sm btn-info" @click="reset">reset</button>
                            <button class="btn btn-sm btn-primary" @click="sort">
                                <i class="fa fa-sort"></i>
                                sort
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <vue-good-table
                                :line-numbers="true"
                                :columns="columns"
                                :rows="allOrders"
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
                                    <span v-if="props.column.field == 'deadline'">
                                        <small class="text-primary">{{props.row.deadline_datetime | myDatetime}}</small>
                                    </span>
                                    <span v-if="props.column.field == 'statu'">
                                        <span v-if="props.row.status == 0" class="badge badge-warning">pending</span>
                                        <span v-if="props.row.status == 1" class="badge badge-primary">working</span>
                                        <span v-if="props.row.status == 2" class="badge badge-info">uploaded</span>
                                        <span v-if="props.row.status == 3" class="badge badge-success">completed</span>
                                        <span v-if="props.row.status == 4" class="badge badge-danger">cancelled</span>
                                        <span v-if="props.row.status == 5" class="badge badge-danger">revision</span>
                                    </span>
                                    <span v-else-if="props.column.field == 'action'">
                                    <a class="btn btn-info btn-sm" href="#" @click="editModal(props.row, props.row.id)">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                </span>
                                    <span v-else-if="props.column.field == 'more'">
                                    <router-link :to="{path:'/orderdetails/'+ props.row.orderNumber}">
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
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnewLabel">Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="updateStatus()">
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Select Status</label>
                                <select name="status" v-model="form.status" class="form-control"
                                        :class="{'is-invalid': form.errors.has('status')}">
                                    <option value="">--Select Status--</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Working</option>
                                    <option value="3">Completed</option>
                                    <option value="4">Cancelled</option>
                                </select>
                                <has-error :form="form" field="status"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="sort" tabindex="-1" role="dialog" aria-labelledby="addnewLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="updateStatus()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Select Status</label>
                                <select name="status" v-model="form2.status" class="form-control">
                                    <option value="">--Select Status--</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Working</option>
                                    <option value="2">Uploaded</option>
                                    <option value="3">Completed</option>
                                    <option value="4">Cancelled</option>
                                    <option value="5">Revision</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm" data-dismiss="modal">Go</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                columns: [
                    {
                        label: 'Order Number',
                        field: 'orderNumber',
                    },
                    {
                        label: 'Name',
                        field: 'name',
                    },
                    {
                        label: 'Title',
                        field: 'title',
                    },
                    {
                        label: 'Level',
                        field: 'level',
                    },
                    {
                        label: 'Subject',
                        field: 'subject_name',
                    },
                    {
                        label: 'Deadline',
                        field: 'deadline',
                    },
                    {
                        label: 'Status',
                        field: 'statu',
                    },
                    {
                        label: 'Action',
                        field: 'action'
                    },
                    {
                        label: 'More',
                        field: 'more'
                    }
                ],
                orders: {},
                form: new Form({
                    status: '',
                    id: ''
                }),
                form2:{
                    status: ''
                }
            }
        },
        computed: {
            allOrders() {
                if (!this.form2.status) {
                    return this.$store.state.orders;
                }

                if (this.form2.status) {
                    return this.$store.state.orders.filter(m => m.status == this.form2.status);
                }
            }
        },
        methods: {
            reset() {
                this.form2 = {
                    status: ''
                }
            },
            sort() {
                $('#sort').modal('show')
            },
            updateStatus() {
                this.form.put('api/task/' + this.form.id)
                    .then(() => {
                        $('#addnew').modal('hide');
                        this.$store.dispatch('getOrdersAdmin');
                        swal.fire(
                            'Updated!',
                            'Status has been updated.',
                            'success'
                        )
                        Fire.$emit('entry');
                    })
                    .catch(() => {

                    })
            },
            editModal(order, id) {
                $('#addnew').modal('show');
                this.form.fill(order);
                this.form.id = id;
            }
        },
        created() {
            this.$store.dispatch('getOrdersAdmin');
        }
    }
</script>
