import M from"./MainLayout-ff052132.js";import{d}from"./dayjs.min-9450d934.js";import{a0 as T,a6 as O,H as Y,r as $,c as v,o as r,b as j,w as F,d as o,t as u,i,j as x,F as y,A as b,h as S}from"./app-cdbf4484.js";import{h as B}from"./index-89e1533b.js";import"./SideBar-ddd0ab5f.js";import"./SluDentalLogo-a4fb04a6.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DentistLinks-aebae790.js";import"./SideBarLinks-b569a21a.js";import"./DashboardIcon-abe5f48e.js";import"./UsersIcon-3089db95.js";import"./PatientIcon-56da3996.js";import"./PatientLinks-2a5a06a3.js";import"./AssistantLinks-c53c5408.js";import"./AdminLinks-fd8c5b60.js";import"./Header-33526c7b.js";import"./SideBarMobileView-d1951852.js";var g={exports:{}};(function(c,_){(function(l,n){c.exports=n()})(T,function(){return function(l,n,f){n.prototype.isToday=function(){var p="YYYY-MM-DD",m=f();return this.format(p)===m.format(p)}}})})(g);var H=g.exports;const V=O(H),E={class:"relative flex flex-col"},N={class:"relative h-full desktop:w-[100rem] laptop:w-[76rem] top-12 left-5 bg-[#ffffff] rounded-xl drop-shadow-lg sm:w-full sm:top-0 sm:left-0"},P={class:"relative flex items-center mb-10 md:justify-center top-4 left-1 md:left-0"},R={class:"lg:text-3xl sm:text-xl"},W={class:"absolute flex gap-1 right-2 md:right-10 md:gap-5"},z={class:"grid grid-cols-7 gap-1"},G={class:"text-center"},I={class:"sm:text-xs"},L={class:"grid grid-cols-7"},q={key:0,class:"items-center justify-center w-full p-5 text-sm text-green-700 sm:text-xs"},J={class:"w-44"},ct=Y({__name:"Index",props:{modelValue:{default:()=>null},startDate:{default:()=>new Date},display:{default:()=>"month"},appointments:{default:()=>[]}},emits:["update:modelValue"],setup(c,{emit:_}){const l=c;d.extend(V);const n=$(d(l.startDate)),f=v(()=>{const s=n.value.startOf("month"),e=s.startOf("week"),t=s.diff(e,"day");return Array.from(new Array(t).keys())}),p=v(()=>{let s=[],e=n.value.startOf("month").add(-1,"day"),t=n.value.endOf("month").add(-1,"day"),a=e;for(;a.isBefore(t)||a.isSame(t);){a=a.add(1,"day");const h=!!l.appointments.find(C=>d(C.app_date).isSame(a,"day"));s.push({date:a,isAppointment:h,appointmentDetails:h?D(a):null})}return s}),m=function(s){n.value=n.value.add(s,"month")},w=function(){n.value=d()},D=s=>{const e=l.appointments.find(t=>d(t.app_date).isSame(s,"day"));return`Appointment with Dr. ${e.dentist.last_name} at ${k(e.app_time)} for ${e.app_type} `};function k(s){return B(s,"HH:mm").format("hh:mm A")}const A=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];return(s,e)=>(r(),j(M,null,{mainContent:F(()=>[o("div",E,[o("div",N,[o("div",P,[o("span",R,u(n.value.format("MMMM YYYY")),1),o("div",W,[o("button",{class:"px-4 py-2 font-bold text-white bg-blue-500 rounded btn-primary hover:bg-blue-700",onClick:e[0]||(e[0]=t=>w())},"Today"),o("button",{class:"px-4 py-2 font-bold text-white bg-blue-500 rounded btn hover:bg-blue-700",onClick:e[1]||(e[1]=t=>m(-1))},"Previous"),o("button",{class:"px-4 py-2 font-bold text-white bg-blue-500 rounded btn hover:bg-blue-700",onClick:e[2]||(e[2]=t=>m(1))},"Next")])]),o("div",z,[(r(),i(y,null,x(A,t=>o("div",G,[o("div",I,u(t),1)])),64))]),o("div",L,[(r(!0),i(y,null,x(f.value,t=>(r(),i("div"))),256)),(r(!0),i(y,null,x(p.value,t=>(r(),i("div",{class:b(["flex flex-col h-32 border rounded-lg border-slate-200",{"bg-green-200":t.isAppointment}])},[o("div",{class:b([[t.date.isToday()?"bg-blue-300 rounded-lg":""],"text-lg text-center text-bold"])},u(t.date.format("D")),3),t.isAppointment?(r(),i("div",q,[o("p",J,u(t.appointmentDetails),1)])):S("",!0)],2))),256))])])])]),_:1}))}});export{ct as default};
