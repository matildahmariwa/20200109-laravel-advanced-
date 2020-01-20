<template>
    <div id="app">

       <Blogs></Blogs>

        <router-view></router-view>


    </div>
</template>

<script>
    import Blogs from './BlogComponent'
    export default {
       components:{
           Blogs
       }
    }
</script>
