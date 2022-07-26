<template>
    <div class="text-center" v-if="loading">
        <b-spinner variant="info" class="mt-5 mb-5" style="width: 1.5rem; height:1.5rem" lable="text-center"></b-spinner>
    </div>
</template>

<script>
    export default{
        name: "loading",
        props:{
            loading: Boolean
        }
    }
</script>

<style scoped>

</style>
