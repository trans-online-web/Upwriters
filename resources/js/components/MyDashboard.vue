<template>
    <div class="container" >
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
            </div>
        </div>
    </div>
</template>

<script>
    export default {
            data(){
                return{
                    dashboard: {}
            }
        },
        methods :{
            loadDash(){
                axios.get("api/userdashboard").then(({data})=>([this.dashboard = data ['data']]));
            }
        },
        created() {
            this.loadDash();
        
        }
    }
</script>
