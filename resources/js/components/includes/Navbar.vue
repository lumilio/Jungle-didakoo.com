<template>
    <div class="d-flex banner-board-helper align-items-center" style=' background-color:black; height:80px;    color: black; '>
        <div id='btnkoo4' class="d-flex align-items-center position:absolute; top:0;">
            <img style="width: 100px; margin-left: 5px; margin-bottom: 3px" src="images/extra_objects/ddd.jpg" alt="" />
            <router-link to="menu">
                <i style='display:inline; margin-bottom:25px;position:relative; margin-right:0px' class="fa-solid fa-bars"></i>
            </router-link>
            <button style='border:1px solid black; padding: 20px 0px 15px 15px; color:white; background-color:black; border-radius:20px;  '>
                <!-- <p style='display:inline; background:white; border-radius:10px; background-color:black; color:white; border:1px solid white; padding:10px;' >Login </p> -->
                <div id='btnkoo22' class="d-none"></div>
                <img  style='display:inline; width:30px; margin-left:0px; margin-bottom:3px;'   src='images/extra_objects/iconaplay1.png' alt="">
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "Navbar"
}
</script>

<style scoped>

</style>
