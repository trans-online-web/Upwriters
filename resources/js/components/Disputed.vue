<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Disputed Orders</h3>
                    </div>

                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <vue-good-table
                                :line-numbers="true"
                                :columns="columns"
                                :rows="orders"
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
                                    <a :href="'/myorderdetails/'+ props.row.orderNumber">
                                    <button type="button" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                        More
                                </button>
                                    </a>
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
                        label: 'More',
                        field: 'more'
                    }
                ],
                orders: [],
               
            }
        },
       
        methods: {
            getMyDisputed(){
              axios.get("/api/myDisputed").then(({ data }) => (this.orders = data));
          },
        },
        created() {
           this.getMyDisputed();
        }
    }
</script>
