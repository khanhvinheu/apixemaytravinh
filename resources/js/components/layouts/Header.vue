<template>
    <div id="header">       
        <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect"
            background-color="#545c64" text-color="#fff" active-text-color="#ffd04b">            
            <el-menu-item index="1" style="padding:18px"> <img style=" -webkit-filter: drop-shadow(2px 2px 2px #fff);
            filter: drop-shadow(2px 2px 2px #fff);" src="https://pbs.twimg.com/profile_images/1319875885709709313/AGgd371h_400x400.png" width="30px" height="30px"></el-menu-item>
            <!-- <el-menu-item index="3" >BDS TV</el-menu-item> -->
           
            <el-submenu index="2">
                <template slot="title"> <router-link to="/" class="navbar-brand">Laravel</router-link></template>
                <el-menu-item index="2-1">item one</el-menu-item>
                <el-menu-item index="2-2">item two</el-menu-item>
                <el-menu-item index="2-3">item three</el-menu-item>
                <el-submenu index="2-4">
                    <template slot="title">item four</template>
                    <el-menu-item index="2-4-1">item one</el-menu-item>
                    <el-menu-item index="2-4-2">item two</el-menu-item>
                    <el-menu-item index="2-4-3">item three</el-menu-item>
                </el-submenu>
            </el-submenu>
           <el-menu-item index="3" disabled>Info</el-menu-item>
            <el-menu-item index="3" ><router-link to="contentone" class="nav-link">Hello</router-link></el-menu-item>
             <!-- <el-menu-item index="4"><router-link to="contentone" class="nav-link">Content One</router-link></el-menu-item>
            <el-menu-item index="5"><router-link to="contenttwo" class="nav-link">Content Two</router-link></el-menu-item> -->
            
        </el-menu>
    </div>
</template>
<script>
    export default {
        name: 'AppHeader',
        data() {
            return {
                activeIndex: '1'
            };
        },
        methods: {
            handleSelect(key, keyPath) {
                console.log(key, keyPath);
            }
        }
    }
</script>
<style scoped>
    #header{
        height: 60px;
    }
    
</style>