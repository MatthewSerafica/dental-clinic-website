import{r as a,K as V,c as k,T as z,b as n,w as i,o as r,d as e,u as c,g as l,t as b,h as d,f as s,k as C,m as B,z as I}from"./app-cdbf4484.js";import{e as P}from"./EditIcon-d14778c9.js";import{A as F}from"./AdminLinks-fd8c5b60.js";import H from"./Index-b3691a7c.js";import K from"./Index-3a7be463.js";import L from"./Index-0f9836ab.js";import q from"./Index-7e722bbf.js";import G from"./Edit-7243e896.js";import J from"./Index-9f96bfb1.js";import Q from"./Create-1e33ba7c.js";import U from"./Edit-562a7503.js";import W from"./Index-bd0be443.js";import X from"./MainLayout-ff052132.js";import{m as Y}from"./module.esm-66530135.js";import{h as R}from"./flowbite-vue-62d8acb5.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./SideBarLinks-b569a21a.js";import"./DashboardIcon-abe5f48e.js";import"./UsersIcon-3089db95.js";import"./PatientIcon-56da3996.js";import"./index-89e1533b.js";import"./Pagination-af17f53a.js";import"./SideBar-ddd0ab5f.js";import"./SluDentalLogo-a4fb04a6.js";import"./DentistLinks-aebae790.js";import"./PatientLinks-2a5a06a3.js";import"./AssistantLinks-c53c5408.js";import"./Header-33526c7b.js";import"./SideBarMobileView-d1951852.js";const Z={class:"absolute flex flex-col laptop:w-[96.5em] desktop:w-[100em]"},ee={class:"absolute right-80 w-80"},te={class:"flex flex-row ml-2"},se=e("div",{class:"flex flex-col"},[e("h1",{class:"w-20 h-8 text-2xl font-bold text-gray-700"},"Student Details"),e("h6",{class:"h-1 text-xs text-gray-400"},[e("a",{href:"/"},"Home"),l(" > "),e("a",{href:"/student"}," Students "),l(" > Student Details ")])],-1),oe={class:"flex flex-row ml-auto space-x-5 desktop:mr-[0em] laptop:mr-[19.4em]"},le={class:"flex flex-col flex-grow h-full mt-8 bg-white rounded-xl laptop:origin-[left_top] inline-block scale-[0.8] desktop:scale-[1]"},ae={class:"flex flex-col justify-between gap-4 lg:gap-8"},ne={class:"h-full rounded-lg"},re={class:"flex flex-col gap-4"},ie={class:"relative flex flex-row justify-between mt-8 ml-6 mr-6"},ce={class:"flex flex-row gap-5"},de=e("h1",{class:"text-2xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl"}," PERSONAL INFORMATION",-1),ue={class:""},me={class:"relative flex flex-row gap-28 top-8"},fe=e("h1",{class:"text-2xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl"}," TREATMENT RECORD",-1),he={class:"mt-16 mb-6 ml-6"},xe={class:"mt-5 mb-3"},ve={class:"fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75"},be={class:"flex items-center justify-center min-h-screen"},pe={class:"p-8 bg-white rounded-md shadow-md"},we=e("p",{class:"mb-4 text-lg font-semibold"},"Are you sure you want to archive this student record?",-1),ge={class:"flex justify-end"},We={__name:"Show",props:{student:Object,medical:Object,treatment:Object,chart:Array,exam:Object,schools:Object,services:Object},setup(t){Y.start();const u=a(!1),p=V(),w=k(()=>p.props.flash.success,u.value=!0),g=k(()=>p.props.flash.error,u.value=!0),h=a(!1);function T(){h.value=!1}function N(){h.value=!0}const x=a(!1),y=()=>{x.value=!0},O=()=>{x.value=!1};let _=a("");const v=a(!1),A=o=>{_=o,v.value=!0},M=()=>{v.value=!1},$=z({archived_at:Date.now(),is_active:!1});function j(o){$.put(route("student.archive",o.id)),m.value=!1}const m=a(!1),S=o=>{m.value=!0},E=()=>{m.value=!1};return(o,f)=>(r(),n(X,null,{mainContent:i(()=>[e("div",Z,[e("div",ee,[w.value&&u.value?(r(),n(c(R),{key:0,"x-data":"{shown: false, timeout:null}","x-init":"clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);","x-show.transition.opacity.out.duration.5000ms":"shown",closable:"",type:"success"},{default:i(()=>[l(b(w.value),1)]),_:1})):d("",!0),g.value&&u.value?(r(),n(c(R),{key:1,"x-data":"{shown: false, timeout:null}","x-init":"clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);","x-show.transition.opacity.out.duration.5000ms":"shown",closable:"",type:"danger"},{default:i(()=>[l(b(g.value),1)]),_:1})):d("",!0)]),e("div",te,[se,e("div",oe,[s(c(C),{href:o.route("student.record",t.student.id),target:"_blank",class:"inline-block px-4 py-2 font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600"},{default:i(()=>[l(" Print Record")]),_:1},8,["href"]),s(c(C),{href:o.route("student.cert",t.student.id),target:"_blank",class:"inline-block px-4 py-2 font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600"},{default:i(()=>[l(" Print Certificate")]),_:1},8,["href"])])]),e("div",le,[e("div",ae,[e("div",ne,[e("div",re,[e("div",ie,[e("div",ce,[de,e("div",ue,[e("button",{onClick:N,type:"button",class:"z-50 w-10 h-8 bg-blue-500 rounded-lg hover:bg-blue-700"},[s(P,{class:"mx-auto"})])])])]),s(J,{student:t.student,class:""},null,8,["student"]),s(K,{medical:t.medical},null,8,["medical"]),s(H,{chart:t.chart,onOpenNewRecordModal:y},null,8,["chart"]),e("div",me,[s(L,{exam:t.exam},null,8,["exam"]),s(q,{chart:t.chart,exam:t.exam},null,8,["chart","exam"])]),e("div",{class:"flex flex-row gap-5 ml-6"},[fe,e("div",{class:""},[e("button",{onClick:y,type:"button",class:"w-8 h-8 pt-0 text-xl font-medium text-center text-green-700 border-2 border-green-500 rounded-lg hover:bg-green-500 hover:text-green-50"}," + ")])]),s(W,{services:t.services,student:t.student,treatments:t.treatment,onOpenEditTreatment:A,class:"h-full"},null,8,["services","student","treatments"])])]),e("div",he,[e("button",{onClick:f[0]||(f[0]=D=>S(t.student)),class:"flex items-center gap-2 px-4 py-1 font-bold text-white bg-red-500 rounded-lg hover:bg-red-600",type:"button",as:"button"},[s(F,{class:"w-5 h-5"}),l("Archive Record ")]),e("p",xe,"personal information last updated by: "+b(t.student.updated_by),1)])])])]),h.value?(r(),n(G,{key:0,student:t.student,schools:t.schools,onClose:T},null,8,["student","schools"])):d("",!0),x.value?(r(),n(Q,{key:1,services:t.services,treatment:t.treatment,student:t.student,onClose:O},null,8,["services","treatment","student"])):d("",!0),v.value?(r(),n(U,{key:2,services:t.services,treatment:c(_),onClose:M},null,8,["services","treatment"])):d("",!0),B(e("div",ve,[e("div",be,[e("div",pe,[we,e("div",ge,[e("button",{onClick:E,class:"px-4 py-2 mr-4 text-white bg-gray-500 rounded-md"},"Cancel"),e("button",{onClick:f[1]||(f[1]=D=>j(t.student)),class:"px-4 py-2 text-white bg-red-500 rounded-md"},"Archive")])])])],512),[[I,m.value]])]),_:1}))}};export{We as default};