import{o as u,i as h,d as e,K as j,c as V,r as v,a as I,n as O,b as F,w as i,t as c,h as k,m as p,v as L,u as d,x as Z,f as r,y as x,g as a,k as _,j as z,F as G,O as H}from"./app-cdbf4484.js";import{e as K}from"./EditIcon-d14778c9.js";import{_ as R}from"./Pagination-af17f53a.js";import{_ as q}from"./_plugin-vue_export-helper-c27b6911.js";import J from"./MainLayout-ff052132.js";import{m as P}from"./module.esm-66530135.js";import{G as Y}from"./flowbite-vue-62d8acb5.js";import{h as Q}from"./index-89e1533b.js";import"./SideBar-ddd0ab5f.js";import"./SluDentalLogo-a4fb04a6.js";import"./DentistLinks-aebae790.js";import"./SideBarLinks-b569a21a.js";import"./DashboardIcon-abe5f48e.js";import"./UsersIcon-3089db95.js";import"./PatientIcon-56da3996.js";import"./PatientLinks-2a5a06a3.js";import"./AssistantLinks-c53c5408.js";import"./AdminLinks-fd8c5b60.js";import"./Header-33526c7b.js";import"./SideBarMobileView-d1951852.js";const W={},X={class:"w-3 h-3 ml-1.5","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"currentColor",viewBox:"0 0 24 24"},ee=e("path",{d:"M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"},null,-1),te=[ee];function se(m,D){return u(),h("svg",X,te)}const oe=q(W,[["render",se]]),le=e("div",{class:"flex flex-col ml-2 max-sm:px-5"},[e("h1",{class:"w-20 h-8 text-2xl font-bold text-gray-700 max-sm:ml-4"},"Users"),e("h6",{class:"h-1 text-xs text-gray-400 max-sm:ml-4"},[e("a",{href:"/admin"},"Home"),a(" > users ")])],-1),ae={class:"relative flex flex-col flex-grow mt-8 rounded-xl"},re={class:"w-full bg-white rounded-xl h-[42rem] drop-shadow-lg"},ne={key:0,"x-data":"{shown: false, timeout:null}","x-init":"clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);","x-show.transition.opacity.out.duration.2000ms":"shown",class:"absolute top-2 p-2 mb-4 bg-green-200 border border-green-200 rounded-md shadow-sm left-[42rem] w-56 dark:border-green-800 dark:bg-green-900 text-center"},ie={key:1,"x-data":"{shown: false, timeout:null}","x-init":"clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);","x-show.transition.opacity.out.duration.2000ms":"shown",class:"absolute top-2 p-2 mb-4 bg-red-400 border border-red-200 rounded-md shadow-sm left-[42rem] w-56 dark:border-red-800 dark:bg-red-900 text-center text-white"},de={class:"px-5 py-6"},ce={class:"grid items-center gap-4 laptop:grid-cols-16 desktop:grid-cols-12"},ue=e("label",{for:"simple-search",class:"sr-only"},"Search",-1),me={class:"col-start-1 laptop:col-end-5 desktop:col-end-4"},pe=e("div",{class:"absolute laptop:left-60 desktop:left-72 top-8 p-2 ml-4 text-sm font-medium text-[#808080]"},[e("svg",{class:"w-4 h-4","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 20 20"},[e("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"})]),e("span",{class:"sr-only"},"Search")],-1),he={class:"laptop:col-start-5 desktop:col-start-4"},fe={class:"bg-gray-200 rounded shadow-lg"},ge={class:"hover:bg-gray-300"},xe={class:"hover:bg-gray-300"},_e={class:"hover:bg-gray-300"},be={class:"hover:bg-gray-300"},ve={class:"hover:bg-gray-300"},ye={class:"grid items-center row-start-1 laptop:col-start-14 col-end-17 desktop:col-start-13"},we={class:"rounded shadow-lg"},ke={class:""},De={class:""},Ce={class:"w-full text-sm text-left text-gray-500"},Se={class:"text-xs text-left text-gray-400 bg-gray-50"},Ue={class:"p-6"},$e={class:"flex items-center"},Te={class:"p-6"},Ve=e("th",{class:"p-6"},"User Type",-1),Ye=e("th",{class:"p-6"},"Email",-1),Be=e("th",{class:"p-6"},"Date Created",-1),Me=e("th",{class:"p-6"},null,-1),Ne={class:"px-6 py-4"},Ae={class:"px-6 py-4 capitalize"},Ee={class:"px-6 py-4 capitalize"},je={class:"px-6 py-4"},Ie={class:"px-6 py-4"},Oe={class:"px-6 py-4"},Fe={class:"w-full col-start-1 col-end-3"},Le={key:2,class:"absolute flex justify-center w-full mt-8 mb-8"},it={__name:"Index",props:{users:{type:Object,default:()=>({}),computed:{date(){return new Date(users.created_at)}}},filters:{type:Object,default:()=>({})}},setup(m){const D=m;P.start();const B=o=>Q(o,"MM-DD-YYYY").format("DD-MM-YYYY"),C=j(),S=V(()=>C.props.flash.success),U=V(()=>C.props.flash.error);let n=v(D.filters.search),b=v("id"),f=v("asc"),$=v("");const l=I({all:!0,patient:!1,dentist:!1,employee:!1,assistant:!1});let y=null;const M=()=>{H.get("/admin/users",{search:n.value,sort:b.value,direction:f.value,user_type:$.value},{preserveState:!0,replace:!0})},w=()=>{y&&clearTimeout(y),y=setTimeout(()=>{M()},500)},N=()=>{b.value="id",f.value="asc"},A=o=>{o===b.value?f.value=f.value==="asc"?"desc":"asc":(b.value=o,f.value="asc")};O(n,()=>{n.value||N(),w()});const T=o=>{A(o),w()},g=o=>{E(o),$.value=l[o]?o:"",n.value="",w()},E=o=>{for(const t in l)t!==o&&(l[t]=!1)};return(o,t)=>(u(),F(J,null,{mainContent:i(()=>[le,e("div",ae,[e("div",re,[S.value?(u(),h("div",ne,c(S.value),1)):k("",!0),U.value?(u(),h("div",ie,c(U.value),1)):k("",!0),e("div",de,[e("div",ce,[ue,e("div",me,[p(e("input",{type:"text",id:"simple-search","onUpdate:modelValue":t[0]||(t[0]=s=>Z(n)?n.value=s:n=s),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-3 p-2.5 dark:bg-white-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"Search User Name..."},null,512),[[L,d(n)]]),pe]),e("div",he,[r(d(Y),{placement:"bottom",text:"Filter"},{default:i(()=>[e("ul",fe,[e("li",ge,[e("label",null,[p(e("input",{type:"checkbox","onUpdate:modelValue":t[1]||(t[1]=s=>l.all=s),onChange:t[2]||(t[2]=s=>g("student"))},null,544),[[x,l.all]]),a(" All ")])]),e("li",xe,[e("label",null,[p(e("input",{type:"checkbox","onUpdate:modelValue":t[3]||(t[3]=s=>l.student=s),onChange:t[4]||(t[4]=s=>g("student"))},null,544),[[x,l.student]]),a(" Student ")])]),e("li",_e,[e("label",null,[p(e("input",{type:"checkbox","onUpdate:modelValue":t[5]||(t[5]=s=>l.dentist=s),onChange:t[6]||(t[6]=s=>g("dentist"))},null,544),[[x,l.dentist]]),a(" Dentist ")])]),e("li",be,[e("label",null,[p(e("input",{type:"checkbox","onUpdate:modelValue":t[7]||(t[7]=s=>l.employee=s),onChange:t[8]||(t[8]=s=>g("employee"))},null,544),[[x,l.employee]]),a(" Employee ")])]),e("li",ve,[e("label",null,[p(e("input",{type:"checkbox","onUpdate:modelValue":t[9]||(t[9]=s=>l.assistant=s),onChange:t[10]||(t[10]=s=>g("assistant"))},null,544),[[x,l.assistant]]),a(" Assistant ")])])])]),_:1})]),e("div",ye,[r(d(Y),{placement:"bottom",text:"Add New User"},{default:i(()=>[e("ul",we,[e("li",ke,[r(d(_),{href:"/admin/student",class:"flex items-center gap-3 px-5 py-2 font-medium text-white bg-green-500 rounded hover:bg-green-700"},{default:i(()=>[a(" Student ")]),_:1})]),e("li",null,[r(d(_),{href:"/admin/employee",class:"flex items-center gap-3 px-5 py-2 mt-2 font-medium text-white bg-green-500 rounded hover:bg-green-700"},{default:i(()=>[a(" Employee ")]),_:1})]),e("li",null,[r(d(_),{href:"/admin/dentist/create",class:"flex items-center gap-3 px-5 py-2 mt-2 font-medium text-white bg-green-500 rounded hover:bg-green-700"},{default:i(()=>[a(" Dentist ")]),_:1})]),e("li",null,[r(d(_),{href:"/admin/assistant/create",class:"flex items-center gap-3 px-5 py-2 mt-2 font-medium text-white bg-green-500 rounded hover:bg-green-700"},{default:i(()=>[a(" Assistant ")]),_:1})])])]),_:1})])])]),e("div",De,[e("table",Ce,[e("thead",Se,[e("tr",null,[e("th",Ue,[e("button",{onClick:t[11]||(t[11]=s=>T("id"))},[e("div",$e,[a(" ID "),r(oe)])])]),e("th",Te,[e("button",{onClick:t[12]||(t[12]=s=>T("name"))},"Name")]),Ve,Ye,Be,Me])]),e("tbody",null,[(u(!0),h(G,null,z(m.users.data,s=>(u(),h("tr",{class:"bg-white border-b",key:s.id},[e("th",Ne,c(s.id),1),e("th",Ae,c(s.name),1),e("th",Ee,c(s.user_type),1),e("th",je,c(s.email),1),e("th",Ie,c(B(new Date(s.created_at).toLocaleDateString())),1),e("th",Oe,[e("div",Fe,[r(d(_),{href:o.route("admin.user.edit",s.id),as:"button",class:"grid items-center grid-cols-2 px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700"},{default:i(()=>[r(K),a(" Edit ")]),_:2},1032,["href"])])])]))),128))])])]),m.users.data.length?(u(),h("div",Le,[r(R,{links:m.users.links},null,8,["links"])])):k("",!0)])])]),_:1}))}};export{it as default};
