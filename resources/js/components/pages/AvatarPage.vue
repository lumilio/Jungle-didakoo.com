<template>
    <div id='page4'>
        <div class='allineatore2'>

            <!------------------  white -----------------------> 

            <div class="allineatore d-flex container-fluid flex-column justify-content-center px-4 align-items-center">



                <!-- Like in the rank page display logos of selected player (selected playaer = AVATAR CARD -->
                <!------------------------ AVATAR CARD ---------------------->
                <div style='margin-bottom:50px; background-color:black; <!-- border:3px solid white; -->' class="container-sm avatar mt-4 d-flex flex-column  align-items-center px-3">
                    <img style='width:50px; position: absolute; top:15px; left:15px;' src='images/extra_objects/ff.png' alt="">
                    <p style='position:absolute; display:block; font-size:25px; left:75px; top:20px; color:white;'> 3/6</p>
                    <p style='position:absolute; display:block;  font-size:20px; left:84px; top:25px; color:white;'> </p>
                    <p style='position:absolute; display:block; margin-top:10px;  font-size:33px; right:15px; top:5px; color:white;'>32°</p>
                    <img id='avataricon' style='margin-top:80px; margin-bottom:20px;' src='images/extra_objects/iconaplayW.png' alt="">
                    <div style="background-color:black; width:100%;" >
                        <p  style='color:white; width:100%; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px; filter: invert(1);'  src='images/extra_objects/Logomark-BlueB.png' >
                            {{ address }}
                        </p>
                    </div>
                    <div class='icons-wrapper' >
                        <div>
                            <img style='  width:50px; ' src='images/board/animals/cat_1.png' alt=""> <!-- nft_9_cat  -->
                        </div>
                        <div>
                            <img style='filter: invert(1);  width:50px; ' src='images/board/animals/monkey_2.png' alt=""> <!-- nft_10_monkey -->

                        </div>
                        <div>
                            <img style='filter: invert(1);  width:50px; ' src='images/board/animals/leopard_3.png' alt=""> <!-- nft_22_leo_3 -->
                        </div>
                        <div>
                            <img style='  width:50px; ' src='images/board/animals/lion_4.png' alt="">   <!-- nft_22_leo_2 -->
                        </div>
                        <div>
                            <img style='  width:50px; ' src='images/board/animals/tiger_6.png' alt=""> <!-- nft_22_leo_1 -->
                        </div>
                        <div>
                            <img style='width:29px; margin:0px 5px; filter: invert(0);' src='images/extra_objects/8.png' alt=""> <!-- nft_13_doodle -->
                        </div>
                        <div>
                            <img style=' filter: invert(0); width:29px; margin:0px 5px; ' src='images/extra_objects/mario.png' alt=""> <!-- nft_14_sandbox -->
                        </div>
                        <div>
                            <img style=' filter: invert(0); width:28px; margin:0px 5px; ' src='images/extra_objects/palm.png' alt=""> <!-- nft_20_land -->
                        </div>
                        <div>
                            <img style=' filter: invert(0); width:20px; margin:0px 5px; ' src='images/extra_objects/ghost.png' alt=""> <!-- nft_15_totem -->
                        </div>
                        <div>
                            <i style=' filter: invert(1); font-size:20px; color:black; margin:0px 5px;'  class="fa-solid fa-hand-fist"></i> <!-- nft_11_punks -->
                        </div>
                        <div>
                            <i style=' filter: invert(1); font-size:20px; color:black; margin:0px 5px;' class="fa-solid fa-egg"></i> <!-- nft_12_monster -->
                        </div>
                        <div>
                            <img style=' filter: invert(0); width:25px; margin-left:5px; height:13px;' src='images/extra_objects/nike.png' alt=""> <!-- nft_16_nike  -->
                        </div>
                        <div>
                            <img style=' filter: invert(1); width:25px; margin:0px 5px; ' src='images/extra_objects/adidas.png' alt=""> <!-- nft_17_adidas  -->
                        </div>
                        <div>
                            <img style=' filter: invert(1); width:30px; margin:0px 5px; ' src='images/extra_objects/coco.png' alt=""> <!-- nft_19_lacoste -->
                        </div>
                        <div>
                            <img style=' filter: invert(0); width:20px; margin:0px 5px; ' src='images/extra_objects/wb.png' alt=""> <!--  -->
                        </div>
                        <div>
                            <img style=' filter: invert(1); width:20px; margin:0px 5px; filter: ' src='images/extra_objects/pepsi.png' alt=""> <!-- nft_18_pepsi -->
                        </div>
                        <div>
                            <img style=' filter: invert(1); width:22px; margin:0px 5px; filter: ' src='images/extra_objects/bot.png' alt=""> <!-- nft_8_bot -->
                        </div>
                        <div>
                            <img style=' filter: invert(1); width:23px; margin:0px 5px; filter: ' src='images/extra_objects/raygun.png' alt=""> <!-- nft_21_raygun -->
                        </div>
                        <div>
                            <i style=' filter: invert(1); font-size:20px; color:black; margin:0px 5px;'  class="fa-solid fa-battery-full"></i> <!-- nft_3_battery -->
                        </div>
                    </div>
                    <p style='font-size:33px; color:white;'>18 <i style='color:#EE5E81' class="fa-solid fa-bolt"></i></p>
                </div>
                <!------------------------------------------------------------>








                <!------------------------ HISTORY EXAMPLE ---------------------->
                <div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'>
                            {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1" ></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:#EE5E81'></i></p>
                </div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1" ></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:#EE5E81'></i></p>
                </div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1" ></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:#EE5E81'></i></p>
                </div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1" ></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:#EE5E81'></i></p>
                </div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:#EE5E81'></i></p>
                </div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:#EE5E81'></i></p>
                </div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:#EE5E81'></i></p>
                </div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:#EE5E81'></i></p>
                </div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:#EE5E81'></i></p>
                </div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:#EE5E81'></i></p>
                </div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:#EE5E81'></i></p>
                </div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:#EE5E81'></i></p>
                </div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:blue'></i></p>
                </div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:blue'></i></p>
                </div>
                <div style='' class="d-flex align-items-center">
                    <div   class="record">
                        <p  style='color:white; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> {{ address }}
                        </p>
                        <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <i style='font-size:20px; color:white;'  class="fa-solid fa-battery-full"></i>
                        </div>
                        <span class='align-items-center' style='color:white; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                    </div>
                    <p style="color:white; margin:0; margin-bottom:5px; padding-left:10px;" >+1 <i class="fa-solid fa-bolt ml-1" style='color:blue'></i></p>
                </div>
                </div>
                <!------------------------------------------------------------->

            </div>
        </div>
    </div>
</template>



<script>
    export default {
        computed: {
            user () {
                return this.$store.state.user
            },
            address() {
                return this.$store.state.address
            }
        },
        mounted() {
            if(!this.user){
                this.$router.push('/rank')
            }
            console.log('Avatar Component mounted.')
        }
    }
</script>
<style lang="scss">
.icons-wrapper{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom:0;
    gap: 5px;
    & > div {
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
}
</style>
