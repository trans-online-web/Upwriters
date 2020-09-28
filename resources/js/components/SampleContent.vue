<template>
    <div class="container-fluid">
        <div class="col-lg-9 ml-auto mr-auto mt-5">
            <div class="col-sm-12" style="padding: 15px">
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
                sampleId: this.$route.params.sampleId,
                details: {},
                path: ''
            }
        },
        methods: {
            getDetails() {
                axios.get("/api/sample/" + this.sampleId).then(({data}) => ([this.details = data['details']]));
            },
        },
        created() {
            this.getDetails();
        }
    }
</script>

<style scoped>

</style>