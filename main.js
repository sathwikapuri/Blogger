console.log("hello");
const navitems=document.querySelector('.nav_items');

const navitems1=document.querySelector('#open-btn');
const navitems2=document.querySelector('#close-btn');

const openNav =()=>{
  navitems.style.display="flex";
  navitems1.style.display="none";
  navitems2.style.display="inline-block";
}
const closeNav=()=>{
  navitems.style.display="none";
  navitems1.style.display="inline-block";
  navitems2.style.display="none";
}
navitems1.addEventListener('click',openNav);
navitems2.addEventListener('click',closeNav);
const sidebar=document.querySelector('aside');
const showSidebar=document.querySelector("#show_sidebar-btn");
console.log(showSidebar);
const hideSidebar=document.querySelector('#hide_sidebar-btn');

const showsidebar=()=>{
  sidebar.style.left="0";
  showSidebar.style.display="none";
  hideSidebar.style.display="inline-block";
}

const hidesidebar=()=>
{
  sidebar.style.left="-100%";
  showSidebar.style.display="inline-block";
  hideSidebar.style.display="none";
}
showSidebar.addEventListener('click',showsidebar);
hideSidebar.addEventListener('click',hidesidebar);
