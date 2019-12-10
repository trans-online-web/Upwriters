<template>
    <div class="container" v-if="$gate.isStudent()">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">My Orders</h3>
                        <div class="card-tools">
                            <button class="btn btn-sm btn-danger" @click="studentSort(4)">Cancelled
                            </button>
                            <button class="btn btn-sm btn-primary" @click="studentSort(1)">Working
                            </button>
                            <button class="btn btn-sm btn-danger" @click="studentSort(5)">Revision
                            </button>
                            <button class="btn btn-sm btn-dark" @click="studentSort(3)">Completed
                            </button>
                            <button class="btn btn-sm btn-info" @click="studentSort(2)">Uploaded
                            </button>
                            <button class="btn btn-sm btn-warning" @click="studentSort(0)">Pending
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Order#</th>
                                    <th>Topic</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Deadline</th>
                                    <th>More</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="order in orders.data" :key="order.id">
                                    <td>#{{order.orderNumber}}</td>
                                    <td>{{order.title}}</td>
                                    <td>{{order.subject_name}}</td>
                                    <td>
                                        <span class="badge badge-pill badge-warning" v-if="order.status == 0">Pending..</span>
                                        <span class="badge badge-pill badge-dark" v-if="order.status == 1">Working</span>
                                        <span class="badge badge-pill badge-success" v-if="order.status == 3">Completed</span>
                                        <span class="badge badge-pill badge-danger" v-if="order.status == 5">Revision</span>
                                        <span class="badge badge-pill badge-info" v-if="order.status == 2">Uploaded</span>
                                        <span class="badge badge-pill badge-danger" v-if="order.status == 4">Cancelled</span>
                                    </td>
                                    <td>{{order.deadline_datetime | myDatetime}}</td>
                                    <td>
                                        <a :href="'/myorderdetails/'+ order.orderNumber" type="button" class="btn btn-primary btn-sm">More</a>
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
                        <h5 class="modal-title" id="addnewLabel">Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="updateStatus()">
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Select Role</label>
                                <select name="status" v-model="form.status" class="form-control" :class="{'is-invalid': form.errors.has('status')}">
                                    <option value="">--Select Status--</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Working">Working</option>
                                    <option value="Completed">Completed</option>
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
    </div>
</template>

<script>
    export default {
        data(){
            return{
                orders: {},
                form: new Form({

                })
            }
        },
        methods:{
            studentSort(sort){
                if (this.$gate.isStudent()){
                    axios.get("/api/studentsort/" + sort).then(({data}) => ([this.orders = data]));
                }
            },
            getOrders(){
                axios.get("api/student-task").then(({ data }) => ([this.orders = data]));
            },
        },
        created() {
            this.getOrders();
        }
    }
</script>
