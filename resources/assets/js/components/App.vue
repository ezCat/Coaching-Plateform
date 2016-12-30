<template>
    <div>
        <navbar></navbar>
        <router-view></router-view>
    </div>
</template>
<script>
    import Navbar from "./Layout/Navbar.vue"
    export default{
        components:{
            'navbar': Navbar
        }
    }
</script>
