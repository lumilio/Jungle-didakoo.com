const modalkoo = document.getElementById("myModalkoo");
const modalkoo2 = document.getElementById("myModalkoo2");   
const modalkoo4 = document.getElementById("myModalkoo4"); 
const modalkoo6 = document.getElementById("myModalkoo6"); 

const btnxkoo = document.getElementById("modalkoo");
const btnxkoo2 = document.getElementById("btnkoo2");    
const btnxkoo3 = document.getElementById("btnkoo3");    
const btnxkoo4 = document.getElementById("btnkoo4");  
const btnxkoo22 = document.getElementById("btnkoo22");  
const btnxkoo23 = document.getElementById("btnkoo23");    

const spankoo = document.getElementsByClassName("closekoo")[0];
const spankoo2 = document.getElementsByClassName("closekoo2")[0];
const spankoo3 = document.getElementsByClassName("closekoo3")[0];
const spankoo4 = document.getElementsByClassName("closekoo4")[0];
const spankoo_rank = document.getElementsByClassName("closekoo_rank")[0];


const btnxkooM = document.getElementById('ready_player_3.1'); 
const rank_record = document.getElementsByClassName("record")[0];   /* ................................. */


rank_record.onclick = function() {
    page1.style.display = "none";
    page2.style.display = "none";
    page3.style.display = "none";
    page4.style.display = "block";
    page5.style.display = "none";
}

btnxkoo.onclick = function() { 
    page1.style.display = "flex";
    page2.style.display = "none";
    page3.style.display = "none";
    page4.style.display = "none";
    page5.style.display = "none";
}
btnxkoo2.onclick = function(){
    modalkoo2.style.display = "flex";
    page1.style.display = "none";
    page2.style.display = "none";
    page4.style.display = "none";
    page5.style.display = "none";
}

btnxkoo4.onclick = function(){
    page1.style.display = "flex";
    page2.style.display = "none";
    page3.style.display = "none";
    page4.style.display = "none";
    page5.style.display = "none";
}
btnxkoo22.onclick = function(){
    page1.style.display = "none";
    page2.style.display = "none";
    page3.style.display = "none";
    page4.style.display = "block";
    page5.style.display = "none";
}
btnxkoo23.onclick = function(){
    page1.style.display = "flex";
    page2.style.display = "none";
    page3.style.display = "none";
    page4.style.display = "none";
    page5.style.display = "none";
}


/* menu logo redirect */

/* const ready1 = document.getElementById("ready_player_1"); */ 

/* ready1.onclick = function() {
    page1.style.display = "none";
    page2.style.display = "block";
    page3.style.display = "none";
    page4.style.display = "none";
    page5.style.display = "none";
} */



const ready12 = document.getElementById("ready_player_1.2");  

ready12.onclick = function(){
    page1.style.display = "none";
    page2.style.display = "none";
    page3.style.display = "none";
    page4.style.display = "block";
    page5.style.display = "none";
}


spankoo2.onclick = function() {
    modalkoo2.style.display = "none";
}

spankoo4.onclick = function() {
    modalkoo4.style.display = "none";
} 
    


 
window.onclick = function(event) {
    if (event.target == modalkoo2) {
        modalkoo2.style.display = "none";
    }
}
window.onclick = function(event) {
    if (event.target == modalkoo3) {

    }
}
window.onclick = function(event) {
    if (event.target == modalkoo4) {
      modalkoo4.style.display = "none";
    }
}
window.onclick = function(event) {
    if (event.target == modalkoo6) {
      modalkoo6.style.display = "none";
    }
}




const btnkoo_2_1 = document.getElementById("btnkoo_2_1");
const btnkoo_2_2 = document.getElementById("btnkoo_2_2");
const btnkoo_2_3 = document.getElementById("btnkoo_2_3");
const btnkoo_3_1 = document.getElementById("btnkoo_3_1");
const btnkoo_3_2 = document.getElementById("btnkoo_3_2");
const btnkoo_3_3 = document.getElementById("btnkoo_3_3");
const btnkoo_4_1 = document.getElementById("btnkoo_4_1");
const btnkoo_4_2 = document.getElementById("btnkoo_4_2");
const btnkoo_4_3 = document.getElementById("btnkoo_4_3");
const btnkoo_5_1 = document.getElementById("btnkoo_5_1");
const btnkoo_5_2 = document.getElementById("btnkoo_5_2");
const btnkoo_5_3 = document.getElementById("btnkoo_5_3");


const page1 = document.getElementById("page1");
const page2 = document.getElementById("page2");
const page3 = document.getElementById("page3");
const page4 = document.getElementById("page4");
const page5 = document.getElementById("page5");


var btnx = document.getElementById("modalx");
var btny = document.getElementById("modaly");
var btnz = document.getElementById("modalz");





btnkoo_2_3.onclick = function()
{
    page1.style.display = "flex";
    page2.style.display = "none";
    page3.style.display = "none";
    page4.style.display = "none";
    page5.style.display = "none";
}

// When the user clicks on the button, open the modal
btnx.onclick = function() {
    page1.style.display = "none";
    page2.style.display = "none";
    page3.style.display = "block";
    page4.style.display = "none";
    page5.style.display = "none";
}
btnz.onclick = function() {
    page1.style.display = "none";
    page2.style.display = "block";
    page3.style.display = "none";
    page4.style.display = "none";
    page5.style.display = "none";
   
}
btny.onclick = function() {
    page1.style.display = "none";
    page2.style.display = "none";
    page3.style.display = "none";
    page4.style.display = "none";
    page5.style.display = "block";
}


btnkoo_2_1.onclick = function() {
    page1.style.display = "flex";
    page2.style.display = "none";
    page3.style.display = "none";
    page4.style.display = "none";
    page5.style.display = "none";
}




btnkoo_3_1.onclick = function() {
    page1.style.display = "none";
    page2.style.display = "block";
    page3.style.display = "none";
    page4.style.display = "none";
    page5.style.display = "none";
    modalkoo2.style.display = "none";


}







btnkoo_4_1.onclick = function() {
    page1.style.display = "flex";
    page2.style.display = "none";
    page3.style.display = "none";
    page4.style.display = "none";
    page5.style.display = "none";
}
btnkoo_2_2.onclick = function() {
    page1.style.display = "none";
    page2.style.display = "none";
    page3.style.display = "none";
    page4.style.display = "block";
    page5.style.display = "none";
}
btnkoo_3_2.onclick = function() {
    page1.style.display = "none";
    page2.style.display = "block";
    page3.style.display = "none";
    page4.style.display = "none";
    page5.style.display = "none";
}
btnkoo_4_2.onclick = function() {
    page1.style.display = "none";
    page2.style.display = "none";
    page3.style.display = "none";
    page4.style.display = "block";
    page5.style.display = "none";
}
btnkoo_5_2.onclick = function() {
    page1.style.display = "none";
    page2.style.display = "none";
    page3.style.display = "none";
    page4.style.display = "flex";
    page5.style.display = "none";
}





