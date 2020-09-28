<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 " style="padding: 20px"> 
                <div class="row">
                    <div class="col-sm-4" v-for="sample in samples" :key="sample.id">
                        <div class="card justify-content-center">
                         
                            <div class="card-body">
                                <h5 class="card-title" style="color: black"><i class="fas fa-file-word"></i>  &nbsp;<b>Paper Title:</b> &nbsp;{{sample.title}}</h5><br>
                                <h5 class="card-title" style="color: black"><i class="fas fa-newspaper"></i>  &nbsp;<b>Subject:</b> &nbsp;{{sample.subject}}</h5><br>
                                 <h5 class="card-title" style="color: black"><i class="fas fa-bars"></i> &nbsp;<b>Type of paper:</b> &nbsp;{{sample.type}}</h5><br>
                                 <h5 class="card-title" style="color: black"><i class="fas fa-align-center"></i> &nbsp;<b>Format:</b> &nbsp;{{sample.format}}</h5><br><br>
                                 <p>
                                    <a :href="'/samplecontent/'+ sample.id" class="btn btn-primary btn-sm">View</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</template>

<script>
    export default {
        name: "Sample-client",
        components: {
            
        },
        data() {
            return {
                samples: {},
            }
        },
        methods: {
            getSamples() {
                axios.get("/api/sample").then(({data}) => (this.samples = data));
            },
        
        },
        created() {
            this.getSamples();
        }
    }
</script>

<style scoped>

</style>