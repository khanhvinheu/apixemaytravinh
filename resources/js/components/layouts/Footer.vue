<template>
    <div id="footer">
        <span>{{titleFooter}}</span>
    </div>
</template>

<script>
    export default {
        name: 'AppFooter',
        data() {
            return {
               titleFooter:"Design by ..."
            };
        },
        methods: {
            
        }
    }
</script>
<style scoped>
    #footer{
        height: 60px;
        width: 100vw;
        background-color: rgb(168, 168, 168);
        padding: 20px;
        font-size: 12px;
        position: absolute;
        bottom: 0;
    }
</style>