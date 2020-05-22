<template>

</template>

<script>
    export default {
    data(){
    	return {
    		users:{}
    	}
    },

     created() {


     		axios.get("api/user").then(({ data }) => (this.users = data));
     		console.log(this.users)
      },

      beforemount(){
        this.getUid();

      },

      methods:{
        getUid()
        {
            EventBus.$on('uid',data=>{

console.log(121)
            });
        }
      }
    }
</script>

<style scoped>

</style>
