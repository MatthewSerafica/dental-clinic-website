import{e as b}from"./EditIcon-d14778c9.js";import g from"./Index-b691f78a.js";import y from"./Edit-df2215e2.js";import S from"./Index-2bd475bf.js";import k from"./MainLayout-ff052132.js";import{r as f,K as N,c as h,b as o,w as r,o as l,d as t,u as p,g as a,t as x,h as c,f as n}from"./app-cdbf4484.js";import{m as O}from"./module.esm-66530135.js";import{h as _}from"./flowbite-vue-62d8acb5.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./index-89e1533b.js";import"./SideBar-ddd0ab5f.js";import"./SluDentalLogo-a4fb04a6.js";import"./DentistLinks-aebae790.js";import"./SideBarLinks-b569a21a.js";import"./DashboardIcon-abe5f48e.js";import"./UsersIcon-3089db95.js";import"./PatientIcon-56da3996.js";import"./PatientLinks-2a5a06a3.js";import"./AssistantLinks-c53c5408.js";import"./AdminLinks-fd8c5b60.js";import"./Header-33526c7b.js";import"./SideBarMobileView-d1951852.js";const T={class:"absolute flex flex-col w-[98em]"},j={class:"absolute right-80 w-80"},C={class:"h-[30rem] rounded top-16"},M=t("div",{class:"flex flex-col ml-2 max-sm:px-5"},[t("h1",{class:"w-full h-8 text-2xl font-bold text-gray-700 max-sm:ml-4"},"Student Details"),t("h6",{class:"h-1 text-xs text-gray-400 max-sm:ml-4"},[t("a",{href:"/assistant"},"Home"),a(" > "),t("a",{href:"/assistant/student"}," Students"),a(" > Student Details ")])],-1),V={class:"flex flex-col flex-grow h-full mt-8 bg-white rounded-xl laptop:origin-[left_top] inline-block scale-[0.8] desktop:scale-[1]"},$={class:"flex flex-col justify-between gap-4 lg:gap-8"},B={class:"h-full rounded-lg"},D={class:"flex flex-col gap-4"},A={class:"relative flex flex-row justify-between mt-8 ml-6 mr-6"},E={class:"flex flex-row gap-5"},F=t("h1",{class:"text-2xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl"}," PERSONAL INFORMATION",-1),I={class:""},nt={__name:"Show",props:{student:Object,medical:Object,schools:Object},setup(e){O.start();const s=f(!1),u=N(),m=h(()=>u.props.flash.success,s.value=!0),d=h(()=>u.props.flash.error,s.value=!0),i=f(!1);function w(){i.value=!1}function v(){i.value=!0}return(R,z)=>(l(),o(k,null,{mainContent:r(()=>[t("div",T,[t("div",j,[m.value&&s.value?(l(),o(p(_),{key:0,"x-data":"{shown: false, timeout:null}","x-init":"clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);","x-show.transition.opacity.out.duration.5000ms":"shown",class:"",closable:"",type:"success"},{default:r(()=>[a(x(m.value),1)]),_:1})):c("",!0),d.value&&s.value?(l(),o(p(_),{key:1,"x-data":"{shown: false, timeout:null}","x-init":"clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);","x-show.transition.opacity.out.duration.5000ms":"shown",class:"",closable:"",type:"danger"},{default:r(()=>[a(x(d.value),1)]),_:1})):c("",!0)]),t("div",C,[M,t("div",V,[t("div",$,[t("div",B,[t("div",D,[t("div",A,[t("div",E,[F,t("div",I,[t("button",{onClick:v,type:"button",class:"z-50 w-10 h-8 bg-blue-500 rounded-lg hover:bg-blue-700"},[n(b,{class:"mx-auto"})])])])]),n(S,{student:e.student},null,8,["student"]),n(g,{medical:e.medical},null,8,["medical"])])])])]),i.value?(l(),o(y,{key:0,student:e.student,schools:e.schools,onClose:w},null,8,["student","schools"])):c("",!0)])])]),_:1}))}};export{nt as default};
