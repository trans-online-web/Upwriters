<template>
    <div class="container-fluid">
        <div class="col-lg-9 ml-auto mr-auto mt-5">
            <div class="col-sm-12 justify-content-center">
                <img :src="details.image" class="rounded img-fluid mx-auto d-block" style="width: 100%; height: 400px;">
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
        name: "BlogContent",
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
            },
        },
        created() {
            this.getDetails();
        }
    }
</script>

<style scoped>

</style>