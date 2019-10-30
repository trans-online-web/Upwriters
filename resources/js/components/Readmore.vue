<template>
    <div class="container-fluid">
        <div class="col-lg-9 ml-auto mr-auto mt-5">
            <div class="col-sm-12">
                <p class="lead3">
                    <a href="/blog-admin">
                        <button type="button" class="btn btn-primary">
                            <i class="fa fa-hand-point-left"></i>
                            Back
                        </button>
                    </a>
                </p>
            </div>
            <div class="col-sm-12">
                <img :src="details.image" class="img-fluid" style="width: 700px;">
            </div>
            <div class="col-sm-12" style="padding: 15px">
                <small>{{details.created_at|myDate}}</small>
                <hr style="color: blue;">
                <h4>{{details.title}}</h4>
                <div v-html="details.content"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ReadMore",
        data() {
            return {
                blogId: this.$route.params.blogId,
                details: {},
                path: ''
            }
        },
        methods: {
            getDetails() {
                axios.get("/api/blog/" + this.blogId).then(({data}) => ([this.details = data['details']]));
                axios.get("/api/blog/" + this.blogId).then(({data}) => ([this.path = data['path']]));
            },
        },
        created() {
            this.getDetails();
        }
    }
</script>

<style scoped>

</style>