import{r as s,K as S,c as C,T as V,b as l,w as p,o as a,d as e,u as x,g as n,t as v,h as i,f as o,m as z,z as B}from"./app-cdbf4484.js";import{e as I}from"./EditIcon-d14778c9.js";import{A as F}from"./AdminLinks-fd8c5b60.js";import H from"./Index-511392b8.js";import K from"./Edit-712e76fc.js";import L from"./Index-5f28ac1c.js";import P from"./Index-2e341472.js";import q from"./Index-8219b894.js";import G from"./Index-e106bd3b.js";import J from"./Create-e8e9ca47.js";import Q from"./Edit-f8129ea4.js";import U from"./Index-3130a8f4.js";import W from"./MainLayout-ff052132.js";import{m as X}from"./module.esm-66530135.js";import{h as k}from"./flowbite-vue-62d8acb5.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./SideBarLinks-b569a21a.js";import"./DashboardIcon-abe5f48e.js";import"./UsersIcon-3089db95.js";import"./PatientIcon-56da3996.js";import"./index-89e1533b.js";import"./Pagination-af17f53a.js";import"./SideBar-ddd0ab5f.js";import"./SluDentalLogo-a4fb04a6.js";import"./DentistLinks-aebae790.js";import"./PatientLinks-2a5a06a3.js";import"./AssistantLinks-c53c5408.js";import"./Header-33526c7b.js";import"./SideBarMobileView-d1951852.js";const Y={class:"absolute flex flex-col w-[98em]"},Z={class:"absolute right-80 w-80"},ee=e("div",{class:"flex flex-col ml-2"},[e("h1",{class:"w-20 h-8 text-2xl font-bold text-gray-700"},"Employee Details"),e("h6",{class:"h-1 text-xs text-gray-400"},[e("a",{href:"/admin"},"Home"),n(" > "),e("a",{href:"/admin/employee"}," Employees "),n(" > Employee Details ")])],-1),te={class:"flex flex-col flex-grow h-full mt-8 bg-white rounded-xl laptop:origin-[left_top] inline-block scale-[0.8] desktop:scale-[1]"},oe={class:"flex flex-col justify-between gap-4 lg:gap-8"},se={class:"h-full rounded-lg"},le={class:"flex flex-col gap-4"},ae={class:"relative flex flex-row justify-between mt-8 ml-6 mr-6"},re={class:"flex flex-row gap-5"},ie=e("h1",{class:"text-2xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl"}," PERSONAL INFORMATION",-1),ne={class:""},ce={class:"relative flex flex-row gap-28 top-8"},me=e("h1",{class:"text-2xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl"}," TREATMENT RECORD",-1),de={class:"mt-16 mb-6 ml-6"},ue={class:"mt-5 mb-3"},fe={class:"fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75"},he={class:"flex items-center justify-center min-h-screen"},pe={class:"p-8 bg-white rounded-md shadow-md"},xe=e("p",{class:"mb-4 text-lg font-semibold"},"Are you sure you want to archive this employee record?",-1),ve={class:"flex justify-end"},Je={__name:"Show",props:{employee:Object,medical:Object,treatment:Object,chart:Object,exam:Object,departments:Object,services:Object},setup(t){X.start();const c=s(!1),y=S(),b=C(()=>y.props.flash.success,c.value=!0),w=C(()=>y.props.flash.error,c.value=!0),u=s(!1);function O(){u.value=!1}function T(){u.value=!0}const f=s(!1),g=()=>{f.value=!0},E=()=>{f.value=!1};let _=s("");const h=s(!1),N=r=>{_=r,h.value=!0},R=()=>{h.value=!1},j=V({archived_at:Date.now(),is_active:!1});function M(r){j.put(route("admin.employee.archive",r.id)),m.value=!1}const m=s(!1),$=r=>{m.value=!0},A=()=>{m.value=!1};return(r,d)=>(a(),l(W,null,{mainContent:p(()=>[e("div",Y,[e("div",Z,[b.value&&c.value?(a(),l(x(k),{key:0,"x-data":"{shown: false, timeout:null}","x-init":"clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);","x-show.transition.opacity.out.duration.5000ms":"shown",closable:"",type:"success"},{default:p(()=>[n(v(b.value),1)]),_:1})):i("",!0),w.value&&c.value?(a(),l(x(k),{key:1,"x-data":"{shown: false, timeout:null}","x-init":"clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);","x-show.transition.opacity.out.duration.5000ms":"shown",closable:"",type:"danger"},{default:p(()=>[n(v(w.value),1)]),_:1})):i("",!0)]),ee,e("div",te,[e("div",oe,[e("div",se,[e("div",le,[e("div",ae,[e("div",re,[ie,e("div",ne,[e("button",{onClick:T,type:"button",class:"z-50 w-10 h-8 bg-blue-500 rounded-lg hover:bg-blue-700"},[o(I,{class:"mx-auto"})])])])]),o(L,{employee:t.employee},null,8,["employee"]),o(P,{medical:t.medical},null,8,["medical"]),o(H,{chart:t.chart,onOpenNewRecordModal:g},null,8,["chart"]),e("div",ce,[o(q,{exam:t.exam},null,8,["exam"]),o(G,{chart:t.chart,exam:t.exam},null,8,["chart","exam"])]),e("div",{class:"flex flex-row gap-5 ml-6"},[me,e("div",{class:""},[e("button",{onClick:g,type:"button",class:"w-8 h-8 pt-0 text-xl font-medium text-center text-green-700 border-2 border-green-500 rounded-lg hover:bg-green-500 hover:text-green-50"}," + ")])]),o(U,{services:t.services,employee:t.employee,treatments:t.treatment,onOpenEditTreatment:N,class:"h-full"},null,8,["services","employee","treatments"])])]),e("div",de,[e("button",{onClick:d[0]||(d[0]=D=>$(t.employee)),class:"flex items-center gap-2 px-4 py-1 font-bold text-white bg-red-500 rounded-lg hover:bg-red-600",type:"button",as:"button"},[o(F,{class:"w-5 h-5"}),n("Archive Record ")]),e("p",ue,"personal information last updated by: "+v(t.employee.updated_by),1)])])])]),u.value?(a(),l(K,{key:0,employee:t.employee,departments:t.departments,onClose:O},null,8,["employee","departments"])):i("",!0),f.value?(a(),l(J,{key:1,treatment:t.treatment,services:t.services,employee:t.employee,onClose:E},null,8,["treatment","services","employee"])):i("",!0),h.value?(a(),l(Q,{key:2,services:t.services,treatment:x(_),onClose:R},null,8,["services","treatment"])):i("",!0),z(e("div",fe,[e("div",he,[e("div",pe,[xe,e("div",ve,[e("button",{onClick:A,class:"px-4 py-2 mr-4 text-white bg-gray-500 rounded-md"},"Cancel"),e("button",{onClick:d[1]||(d[1]=D=>M(t.employee)),class:"px-4 py-2 text-white bg-red-500 rounded-md"},"Archive")])])])],512),[[B,m.value]])]),_:1}))}};export{Je as default};