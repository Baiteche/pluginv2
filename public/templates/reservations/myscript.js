// pop up for registration
const btn1= document.getElementById('button1');
const btn2=document.getElementById('button2');



function modal1(){
    let x = document.getElementById("foot");
    document.getElementById('modal1').classList.toggle("d-none") ;
    
    document.getElementById('modal2').classList.add("d-none");
    btn1.classList.add("d-none");
    btn2.classList.add("d-none");
    x.style.display="none";


   
   

}

btn1.addEventListener("click",modal1);





function modal2(){
    let x = document.getElementById("foot");
    document.getElementById('modal2').classList.toggle("d-none");
    document.getElementById('modal1').classList.add("d-none");
    btn1.classList.add("d-none");
    btn2.classList.add("d-none");
    x.style.display="none";
    
}

btn2.addEventListener("click",modal2);