import{d as m,a as f,r as x}from"./DashboardIcon-8610b4cf.js";import{s as w}from"./SluDentalLogo-fe187267.js";import{_ as v}from"./_plugin-vue_export-helper-c27b6911.js";import{o as r,a as c,b as e,K as g,c as b,j as k,e as t,w as n,u as s,t as h,d as p,h as y,x as i}from"./app-b4ce430c.js";const C={},V={xmlns:"http://www.w3.org/2000/svg",width:"200",height:"200",fill:"currentColor",class:"bi bi-person-square",viewBox:"0 0 16 16",id:"IconChangeColor"},M=e("path",{d:"M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z",id:"mainIconPathAttribute",fill:"#000000"},null,-1),z=e("path",{d:"M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z",id:"mainIconPathAttribute",fill:"#000000"},null,-1),L=[M,z];function B(_,l){return r(),c("svg",V,L)}const P=v(C,[["render",B]]),S={class:"flex flex-col h-screen"},j={class:"fixed z-30 w-screen bg-white shadow"},$={class:"flex items-center justify-between h-16 px-4"},A=e("h1",{class:"text-xl font-semibold text-gray-700"},"SLU Dental Clinic",-1),N=e("div",{class:"desktop:w-[90rem] laptop:w-[68rem]"},null,-1),H={class:"relative pr-2"},I=e("svg",{width:"25",height:"24",viewBox:"0 0 25 24",fill:"none",xmlns:"http://www.w3.org/2000/svg"},[e("g",{"clip-path":"url(#clip0_113_1473)"},[e("path",{d:"M12.5 2.75V4.75",stroke:"#121331","stroke-width":"1.5","stroke-linecap":"round","stroke-linejoin":"round"}),e("path",{d:"M17.96 13.67L19.75 17.25H5.25L7.04 13.67C7.18 13.39 7.25 13.09 7.25 12.78V10C7.25 7.1 9.6 4.75 12.5 4.75C15.4 4.75 17.75 7.1 17.75 10V12.78C17.75 13.09 17.82 13.4 17.96 13.67Z",stroke:"#121331","stroke-width":"1.5","stroke-linecap":"round","stroke-linejoin":"round"}),e("path",{d:"M14.75 17.25V19C14.75 20.24 13.74 21.25 12.5 21.25C11.26 21.25 10.25 20.24 10.25 19V17.25",stroke:"#121331","stroke-width":"1.5","stroke-linecap":"round","stroke-linejoin":"round"})]),e("defs",null,[e("clipPath",{id:"clip0_113_1473"},[e("rect",{width:"24",height:"24",fill:"white",transform:"translate(0.5)"})])])],-1),D={key:0,class:"absolute w-5 h-5 text-xs font-medium text-center text-white bg-red-700 border border-red-700 rounded-full bottom-4 left-3"},E={class:"flex items-center"},U={key:0},W={class:"font-medium"},q={class:"capitalize"},J=e("svg",{xmlns:"http://www.w3.org/2000/svg",class:"w-5 h-5 mx-4 fill-gray-800",viewBox:"0 0 512 512"},[e("path",{d:"M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"})],-1),K={class:"flex flex-1 h-full bg-gray-200"},O={class:"fixed z-0 w-64 h-screen drop-shadow-xl bg-gray-50"},R={class:"py-20"},Z=e("div",{class:"font-medium"},"Home",-1),F=e("div",{class:"font-medium"}," Appointments",-1),G=e("li",null,[e("label",{class:"flex items-center gap-3 px-6 pt-5 mx-2 rounded-lg"},[e("div",{class:"font-medium"},[e("label",null,"Profile")])])],-1),Q=e("div",{class:"font-medium"},[e("label",null,"Record")],-1),T=e("div",{class:"font-medium"},[e("label",null,"User Account")],-1),X=e("li",null,null,-1),oe={__name:"PatientSideLayout",setup(_){const l=g(),d=b(()=>Math.min(l.props.user.notificationCount,9));let a=null;return k(async()=>{try{a=new WebSocket("ws://127.0.0.1:8080"),await new Promise((o,u)=>{a.onopen=o,a.onerror=u}),a.addEventListener("message",o=>{JSON.parse(o.data).type==="notification"&&(d.value+=1)})}catch(o){console.error("WebSocket connection error:",o)}}),(o,u)=>(r(),c("div",S,[e("header",j,[e("div",$,[t(w,{class:"w-10 h-10"}),A,N,e("div",H,[t(s(i),{href:o.route("notifications.index")},{default:n(()=>[I,d.value?(r(),c("div",D,h(d.value),1)):p("",!0)]),_:1},8,["href"])]),e("div",E,[s(l).props.user?(r(),c("div",U,[e("div",W,h(s(l).props.user.name),1),e("div",q,h(s(l).props.user.user_type),1)])):p("",!0)]),e("div",null,[s(l).props.user?(r(),y(s(i),{key:0,href:o.route("logout"),method:"delete",as:"button",class:"flex items-center"},{default:n(()=>[J]),_:1},8,["href"])):p("",!0)])])]),e("div",K,[e("aside",O,[e("nav",R,[e("ul",null,[e("li",null,[t(s(i),{href:"/patientside",class:"flex items-center gap-3 px-4 py-2 mx-2 rounded-lg cursor-pointer hover:bg-blue-100 hover:text-blue-500"},{default:n(()=>[t(m,{class:"w-6 h-6 mx-2"}),Z]),_:1})]),e("li",null,[t(s(i),{href:"/patientside/appointments",class:"flex items-center gap-3 px-4 py-2 mx-2 rounded-lg cursor-pointer hover:bg-blue-100 hover:text-blue-500"},{default:n(()=>[t(f,{class:"w-6 h-6 mx-2"}),F]),_:1})]),G,e("li",null,[t(s(i),{href:"/patientside/profile",class:"flex items-center gap-3 px-4 py-2 mx-2 rounded-lg cursor-pointer hover:bg-blue-100 hover:text-blue-500"},{default:n(()=>[t(x,{class:"w-6 h-6 mx-2"}),Q]),_:1})]),e("li",null,[t(s(i),{href:"/patientside/user",class:"flex items-center gap-3 px-4 py-2 mx-2 rounded-lg cursor-pointer hover:bg-blue-100 hover:text-blue-500"},{default:n(()=>[t(P,{class:"w-6 h-5 mx-2"}),T]),_:1})]),X])])])])]))}};export{oe as default};
