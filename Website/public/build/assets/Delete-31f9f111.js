import{E as n}from"./Error-fb42616a.js";import{s as i}from"./flowbite-vue-62d8acb5.js";import{b as d,w as t,u as r,o as u,d as e,f as l,t as f,g as m,k as h}from"./app-cdbf4484.js";import"./_plugin-vue_export-helper-c27b6911.js";const g=e("div",{class:"items-center px-4"},[e("h1",{class:"text-xl font-semibold text-gray-700"}," Delete Course ")],-1),b={class:"items-center justify-center w-full h-full text-center"},p={class:"flex flex-col gap-4"},x=e("p",null,"Are you sure you want to delete",-1),_={class:"relative w-full h-8"},y={class:"absolute right-0"},B={__name:"Delete",props:{course:Object},emits:["closeModal"],setup(s,{emit:c}){const o=()=>{c("closeDelete")};return(a,v)=>(u(),d(r(i),{size:"lg",onClose:o},{header:t(()=>[g]),body:t(()=>[e("div",b,[e("div",p,[l(n,{class:"relative w-20 h-20 left-44"}),e("div",null,[x,e("p",null,"the "+f(s.course.course)+" course?",1)])])])]),footer:t(()=>[e("div",_,[e("div",y,[e("button",{onClick:o,type:"button",as:"button",class:"bg-gray-300 hover:bg-gray-500 hover:text-white focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 mb-3"}," Cancel "),l(r(h),{method:"delete",href:a.route("admin.courses.delete",{id:s.course.id}),type:"button",as:"button",onClick:o,class:"text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mr-3 mb-3"},{default:t(()=>[m(" Yes, delete ")]),_:1},8,["href"])])])]),_:1}))}};export{B as default};