<template>
    <div>
        <navbar></navbar>
        <router-view
                class="view"
                keep-alive
                transition
                transition-mode="out-in">
        </router-view>
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
