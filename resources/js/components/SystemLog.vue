<template>
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="font-weight-bold text-primary">System Logs</h4>
                                </div>
                            </div>
                        </div>
                        <div class=" table-responsive no-padding">
                            <vue-good-table
                                :line-numbers="true"
                                :columns="columns"
                                :rows="logs"
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
                                    <span v-else-if="props.column.field == 'delete'">
                                       <button type="button" class="m-1 btn btn-danger btn-sm btn-circle"
                                               @click="deleteLogs(props.row.id)"> Delete
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
</template>
<script>
    var moment = require('moment');
    export default {
        name: 'SystemLogs',
        components: {},
        data() {
            return {
                moment,
                columns: [

                    {
                        label: 'Name',
                        field: 'logs.name',
                    },
                    {
                        label: 'Email',
                        field: 'logs.email',
                    },
                    {
                        label: 'Role',
                        field: 'logs.role',
                    },
                    {
                        label: 'IP Address',
                        field: 'ip_address',
                    },
                    {
                        label: 'Date',
                        field: 'update',
                    },
                    {
                        label: 'Action',
                        field: 'delete'
                    }
                ],
                logs: []
            }
        },

        methods: {
            deleteLogs(id) {
                Swal.fire({
                    title: 'Delete this log?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    // send the request to the controller
                    if (result.value) {
                      axios.delete("/api/logs/" + id).then(() => {
                            this.Swal.fire(
                                'Success!',
                                'Log deletedsuccessfully',
                                'success'
                            )
                            this.allLogs();
                        });
                    }
                }).catch(() => {
                    $swal("Failed!", "There was something wrong.", "warning");
                })
            },
            allLogs() {
                try {
                    axios.get("/api/logs").then(({data}) => ([this.logs = data]));
                } catch (e) {
                    throw new Error(e);
                }
            }
        },
        created() {
            this.allLogs();
        }

    };
</script>
<style></style>
