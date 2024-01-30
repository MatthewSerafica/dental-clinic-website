import{T as u,b as p,w as o,u as n,o as m,d as e,f,m as x,v as _,g as b}from"./app-cdbf4484.js";import{E as h}from"./Error-fb42616a.js";import{s as g}from"./flowbite-vue-62d8acb5.js";import"./_plugin-vue_export-helper-c27b6911.js";const v=e("div",{class:"items-center px-4"},[e("h1",{class:"text-xl font-semibold text-gray-700"}," Cancel Appointment ")],-1),y={"submit.prevent":"cancel"},C={class:"items-center justify-center w-full h-full text-center"},w={class:"flex flex-col gap-4"},k=e("div",null,[e("p",null,"Are you sure you want to cancel this appointment?")],-1),V={class:"flex flex-col"},A=e("label",{class:"text-left",for:"",required:""},[b("Reason"),e("span",{class:"text-red-700"},"*")],-1),B={class:"relative w-full h-8"},N={class:"absolute right-0"},z={__name:"Cancel",props:{appointment:Object},emits:["closeCancel"],setup(i,{emit:a}){const l=()=>{a("closeCancel")},s=u({status:"cancelled",reason:"",made_appointment:0});function d(r){s.put(route("assistant.appointment.update",r.app_id))}return(r,t)=>(m(),p(n(g),{size:"lg",onClose:l},{header:o(()=>[v]),body:o(()=>[e("form",y,[e("div",C,[e("div",w,[f(h,{class:"relative w-20 h-20 left-44"}),k,e("div",V,[A,x(e("input",{"onUpdate:modelValue":t[0]||(t[0]=c=>n(s).reason=c),class:"rounded-lg",type:"text"},null,512),[[_,n(s).reason]])])])])])]),footer:o(()=>[e("div",B,[e("div",N,[e("button",{onClick:l,type:"button",as:"button",class:"bg-gray-300 hover:bg-gray-500 hover:text-white focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 mb-3"}," Cancel "),e("button",{method:"delete",onClick:t[1]||(t[1]=c=>(d(i.appointment),a("closeCancel"))),type:"button",as:"button",class:"text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mr-3 mb-3"}," Yes, cancel ")])])]),_:1}))}};export{z as default};