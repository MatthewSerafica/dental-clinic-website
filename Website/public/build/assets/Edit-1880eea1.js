import{T as u,i as d,f as b,w as a,u as s,e as f,o as n,d as e,m as x,v as h,A as _,t as g,h as v,g as y}from"./app-cdbf4484.js";import{s as w}from"./flowbite-vue-62d8acb5.js";const k=["onSubmit"],E=e("div",{class:"items-center px-4"},[e("h1",{class:"text-xl font-semibold text-gray-700"}," Edit Department ")],-1),S={class:"w-full mb-4 max-sm:m-0"},C=e("label",{for:"department",class:"block font-semibold"},[y("Department Name "),e("label",{class:"text-[red]"},"*")],-1),N={key:0,class:"px-2 text-sm text-red-600"},V=e("div",{class:"relative w-full h-8"},[e("button",{type:"submit",as:"button",class:"text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-3 mb-3 absolute right-0"}," Save Changes ")],-1),z={__name:"Edit",props:{department:{type:Object,default:()=>({})}},setup(l,{emit:m}){const r=l,p=()=>{r.department=null,m("closeEdit")},t=u({department:r.department.departments?r.department.departments:"",id:r.department.id}),i=()=>{t.put(route("admin.departments.update"),{preserveScroll:!1,preserveState:!1})};return(D,o)=>(n(),d("form",{onSubmit:f(i,["prevent"])},[b(s(w),{size:"xl",class:"block space-y-4 md:flex md:space-y-0 md:space-x-4",onClose:p},{header:a(()=>[E]),body:a(()=>[e("div",S,[C,x(e("input",{id:"department","onUpdate:modelValue":o[0]||(o[0]=c=>s(t).department=c),type:"text",class:_(["w-full px-3 py-2 rounded-md drop-shadow-lg",{"border-red-600":s(t).errors.department}]),placeholder:"Enter department name...",required:""},null,2),[[h,s(t).department]]),s(t).errors.department?(n(),d("div",N,g(s(t).errors.department),1)):v("",!0)])]),footer:a(()=>[V]),_:1})],40,k))}};export{z as default};