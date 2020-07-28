<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row mt-5">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope-open-text"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pending</span>
                                <span class="info-box-number">{{dashboard['total_pending']}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-clock"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">In Progress</span>
                                <span class="info-box-number">{{dashboard['total_approved']}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-clipboard-check"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">completed</span>
                                <span class="info-box-number">{{dashboard['total_completed']}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-redo"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Revision</span>
                                <span class="info-box-number">{{dashboard['total_revision']}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <vue-tabs>
                        <v-tab title="Pending Orders" icon="fas fa-envelope-open-text blue">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <h3 class="card-title">Pending Orders</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="card-body table-responsive p-0">
                                                <vue-good-table
                                                    :line-numbers="true"
                                                    :columns="columns"
                                                    :rows="pending"
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
                        </v-tab>

                        <v-tab title="Orders In Progress" icon="fas fa-clock red">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <h3 class="card-title">Orders InProgress</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="card-body table-responsive p-0">
                                                <vue-good-table
                                                    :line-numbers="true"
                                                    :columns="columns"
                                                    :rows="progress"
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
                        </v-tab>

                        <v-tab title="Completed Orders" icon="fas fa-clipboard-check green">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <h3 class="card-title">Completed Orders</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="card-body table-responsive p-0">
                                                <vue-good-table
                                                    :line-numbers="true"
                                                    :columns="columns"
                                                    :rows="completed"
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
                        </v-tab>
                        <v-tab title="Orders In Revision" icon="fas fa-redo yellow">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <h3 class="card-title">Orders in Revision</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="card-body table-responsive p-0">
                                                <vue-good-table
                                                    :line-numbers="true"
                                                    :columns="columns"
                                                    :rows="revision"
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
                        </v-tab>
                        <v-tab title="Payments" icon="fas fa-wallet teal">
                           <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <h3 class="card-title">Payment History</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="card-body table-responsive p-0">
                                                <vue-good-table
                                                    :line-numbers="true"
                                                    :columns="columns2"
                                                    :rows="payment"
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
                        </v-tab>
                        <v-tab title="Referrals" icon="fas fa-people-arrows orange">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <h3 class="card-title">Referees</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="card-body table-responsive p-0">
                                                <vue-good-table
                                                    :line-numbers="true"
                                                    :columns="columns3"
                                                    :rows="referes"
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
                                    <span v-if="props.column.field == 'created'">
                                        <small class="text-primary">{{props.row.created_at | myDatetime}}</small>
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
                        </v-tab>
                    </vue-tabs>
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
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    //local registration
    import {VueTabs, VTab} from 'vue-nav-tabs'
    //you can also import this in your style tag
    import 'vue-nav-tabs/themes/vue-tabs.css'
    export default {
        components: {
            VueTabs,
            VTab
        },
    data(){
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
             columns2: [
                {
                    label: 'Order Number',
                    field: 'orderNumber',
                },
                {
                    label: 'Order Title',
                    field: 'name',
                },
                {
                    label: 'Amount',
                    field: 'title',
                },
                {
                    label: 'Date Paid',
                    field: 'level',
                }
            ],
             columns3: [
                {
                    label: 'Name',
                    field: 'name',
                },
                {
                    label: 'Email',
                    field: 'email',
                },
                {
                    label: 'Date Regestered',
                    field: 'created',
                }
            ],
    		pending:{},
            progress:{},
            completed:{},
            revision:{},
            payment:{},
            referes:{},
            dashboard:{},
            userId : this.$route.params.userId,
            form: new Form({
                status: '',
                id: ''
            }),
    	}
    },



      beforemount(){
        this.getUid();

      },

      methods:{
          updateStatus() {
              this.form.put('/api/task/' + this.form.id)
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
          },
            getMyPending(){
                axios.get("/api/userPending/" + this.userId).then(({ data }) => (this.pending = data));
            },
          getMyProgress(){
              axios.get("/api/userProgress/" + this.userId).then(({ data }) => (this.progress = data));
          },
          getMyCompleted(){
              axios.get("/api/userCompleted/" + this.userId).then(({ data }) => (this.completed = data));
          },
          getMyRevision(){
              axios.get("/api/userRevision/" + this.userId).then(({ data }) => (this.revision = data));
          },
          getDashboard(){
              axios.get("/api/usersDash/" + this.userId).then(({ data }) =>([this.dashboard = data ['data']]));
          },
        getPayments(){
              axios.get("/api/payment/" + this.userId).then(({ data }) =>(this.payment = data));
          },
        getReferes(){
              axios.get("/api/referes/" + this.userId).then(({ data }) =>(this.referes = data));
          },
        getUid()
        {
            EventBus.$on('uid',data=>{
            console.log(121)
            });
        }
      },
        created(){
           this.getMyPending();
           this.getMyCompleted();
           this.getMyProgress();
           this.getMyRevision();
           this.getDashboard();
           this.getPayments();
           this.getReferes();
        }
    }
</script>

<style scoped>

</style>
