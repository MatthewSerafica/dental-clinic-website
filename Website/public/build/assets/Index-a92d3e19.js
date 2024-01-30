import{r as f,K as Q,c as D,a as W,n as Z,b as p,w as o,o as c,d as e,m as u,v as ee,u as n,x as te,f as r,y as _,g as d,e as le,h,i as b,j as se,t as i,k as y,F as ae,l as oe,O as ne}from"./app-cdbf4484.js";import{A as re}from"./AddApointment-2aa6d91a.js";import{E as ie}from"./Error-fb42616a.js";import{_ as de}from"./Pagination-af17f53a.js";import{S as ce}from"./Success-01c9158f.js";import me from"./Create-e9208501.js";import fe from"./MainLayout-ff052132.js";import{G as ue,s as E,m as k}from"./flowbite-vue-62d8acb5.js";import{h as he}from"./index-89e1533b.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./SideBar-ddd0ab5f.js";import"./SluDentalLogo-a4fb04a6.js";import"./DentistLinks-aebae790.js";import"./SideBarLinks-b569a21a.js";import"./DashboardIcon-abe5f48e.js";import"./UsersIcon-3089db95.js";import"./PatientIcon-56da3996.js";import"./PatientLinks-2a5a06a3.js";import"./AssistantLinks-c53c5408.js";import"./AdminLinks-fd8c5b60.js";import"./Header-33526c7b.js";import"./SideBarMobileView-d1951852.js";const ge=e("div",{class:"flex flex-col ml-2"},[e("h1",{class:"w-20 h-8 text-2xl font-bold text-gray-700"},"Employees"),e("h6",{class:"h-1 text-xs text-gray-400"},[e("a",{href:"/admin"},"Home"),d(" > Employees ")])],-1),xe={class:"flex flex-col flex-grow mt-8 bg-white rounded-xl"},pe={class:"grid mt-10 mb-2 ml-10 mr-10"},_e={class:"flex justify-between w-full py-1 mx-auto sm:items-center max-sm:flex-col max-sm:gap-4"},be={class:"flex flex-row items-center gap-4"},ye={class:"relative max-sm:w-full"},ve=e("div",{class:"absolute top-0 left-0 inline-flex items-center justify-center w-10 h-full text-gray-400"},[e("svg",{class:"w-6 h-6",fill:"none","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",viewBox:"0 0 24 24",stroke:"currentColor"},[e("path",{d:"M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"})])],-1),we={class:"bg-gray-200 rounded shadow-lg"},ke={class:"hover:bg-gray-300"},Ce={class:"hover:bg-gray-300"},Se={class:"hover:bg-gray-300"},Te={class:"hover:bg-gray-300"},Me={class:"hover:bg-gray-300"},De={class:"absolute right-[255px]"},Ee=e("div",{class:"flex items-center text-lg font-semibold"}," Upload File Here ",-1),Fe=["onSubmit"],Ve={class:"flex flex-col justify-center"},$e=e("label",{class:"mb-2 ml-2 text-sm font-medium text-gray-900 dark:text-white",for:"file"},"Upload file",-1),je={class:"flex justify-end gap-4 pt-8"},Ae={class:""},Ie={class:"grid mb-10 ml-10 mr-10"},Ne={class:"gap-4 lg:grid-cols-2 lg:gap-8"},Ue={class:"relative"},Ye={class:"w-full my-5 overflow-hidden rounded-lg sm:bg-white sm:shadow-lg"},ze=e("thead",{class:"w-full text-black"},[e("tr",{class:"flex flex-col mb-2 bg-gray-100 rounded-l-lg flex-no wrap sm:table-row sm:rounded-none sm:mb-0"},[e("th",{class:"p-3 text-left"},"PATIENTS"),e("th",{class:"p-3 text-left max-sm:hidden"}," DEPARTMENT "),e("th",{class:"p-3 text-left max-sm:hidden"},"SEX"),e("th",{class:"p-3 text-left max-sm:hidden"}," LAST VISIT ")])],-1),Be={class:"flex-1 sm:flex-none"},Oe={class:"p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden"},Ge={class:"flex flex-col"},Le={class:"mr-2 text-base font-medium leading-none text-gray-700"},He={class:"mr-2 text-base font-normal leading-none text-gray-700"},Pe={class:"p-3 border-grey-light sm:border-b hover:bg-gray-100"},Re={class:"flex flex-col"},qe={class:"mr-2 text-base font-medium leading-none text-gray-700"},Ke={class:"mr-2 text-base font-normal leading-none text-gray-700"},Xe={class:"p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden"},Je={class:"flex flex-col"},Qe={class:"mr-2 text-base font-medium leading-none text-gray-700"},We={class:"p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden"},Ze={class:"flex flex-col"},et={class:"mr-2 text-base font-medium leading-none text-gray-700"},tt={class:"p-3 border-b border-grey-light hover:bg-gray-100 max-sm:hidden"},lt={class:"flex flex-col"},st={key:0,class:"mr-2 text-base font-medium leading-none text-gray-700"},at={key:1,class:"mr-2 text-base font-medium leading-none text-gray-700"},ot={key:0,class:"flex justify-center w-full mt-6"},nt={class:"flex flex-col items-center gap-6 px-4 text-lg font-semibold"},rt={class:"text-xl text-center text-green-500 capitalize"},it={class:"w-56 pb-4 text-sm font-normal text-center text-gray-500"},dt={class:"flex flex-col items-center gap-6 px-4 text-lg font-semibold"},ct={class:"w-56 text-lg font-semibold text-center text-red-500 capitalize"},jt={__name:"Index",props:{employees:{type:Object,default:()=>({})},filters:{type:Object,default:()=>({})},departments:{type:Object,default:()=>({})}},setup(g){const O=g,G=a=>he(a,"MM-DD-YYYY").format("DD-MM-YYYY"),F=f(null),L=()=>{F.value=document.querySelector("#file").files[0]},H=async()=>{let a=new FormData;a.append("file",F.value);try{const s=await oe.post("/admin/employee/bulk",a,{headers:{"Content-Type":"multipart/form-data"}});console.log("File uploaded successfully"),console.log(s.data),v.value=!1,U()}catch(s){console.log("Error uploading file"),console.error(s)}},x=f(!1);function V(){x.value=!1}const C=Q(),$=D(()=>C.props.flash.success,x.value=!0),P=D(()=>C.props.flash.message),j=D(()=>C.props.flash.error,x.value=!0),S=f(!1);function R(){S.value=!1}function q(){S.value=!0}const v=f(!1);function A(){v.value=!1}function K(){v.value=!0}let m=f(O.filters.search),I=f("id_number"),N=f("asc"),T=f("");const l=W({male:!1,female:!1,teaching:!1,non_teaching:!1,employeeType:"",all:!0});let M=null;const U=()=>{ne.get("/admin/employee",{search:m.value,sort:I.value,direction:N.value,sex:l.all?"all":l.male?"male":l.female?"female":"",employee_type:l.all?"all":l.teaching?"teaching":l.non_teaching?"non-teaching":""},{preserveState:!0,replace:!0})},w=()=>{M&&clearTimeout(M),M=setTimeout(()=>{U()},500)},X=()=>{I.value="id_number",N.value="asc"};Z(m,()=>{m.value||X(),w()});const Y=a=>{z(a),a==="male"?(l.male=!0,l.female=!1,T.value="male"):a==="female"&&(l.female=!0,l.male=!1,T.value="female"),m.value="",w()},z=a=>{a!=="all"&&(l.all=!1)},B=a=>{z(a),a==="Teaching"?(l.teaching=!0,l.non_teaching=!1):a==="Non-Teaching"&&(l.non_teaching=!0,l.teaching=!1),w()},J=()=>{l.all=!l.all,l.male=!1,l.female=!1,l.teaching=!1,l.non_teaching=!1,T.value="",m.value="",w()};return(a,s)=>(c(),p(fe,null,{mainContent:o(()=>[ge,e("div",xe,[e("div",pe,[e("div",_e,[e("div",be,[e("div",ye,[ve,u(e("input",{id:"search","onUpdate:modelValue":s[0]||(s[0]=t=>te(m)?m.value=t:m=t),type:"text",name:"search",class:"w-full h-10 pl-10 pr-4 text-sm placeholder-gray-500 border border-gray-300 rounded-lg sm:text-base focus:outline-none focus:border-indigo-400 bg-gray-50",placeholder:"Search..."},null,512),[[ee,n(m)]])]),e("div",null,[r(n(ue),{placement:"bottom",text:"Filter"},{default:o(()=>[e("ul",we,[e("li",ke,[e("label",null,[u(e("input",{type:"checkbox","onUpdate:modelValue":s[1]||(s[1]=t=>l.all=t),onChange:J},null,544),[[_,l.all]]),d(" All ")])]),e("li",Ce,[e("label",null,[u(e("input",{type:"checkbox","onUpdate:modelValue":s[2]||(s[2]=t=>l.male=t),onChange:s[3]||(s[3]=t=>Y("male"))},null,544),[[_,l.male]]),d(" Male ")])]),e("li",Se,[e("label",null,[u(e("input",{type:"checkbox","onUpdate:modelValue":s[4]||(s[4]=t=>l.female=t),onChange:s[5]||(s[5]=t=>Y("female"))},null,544),[[_,l.female]]),d(" Female ")])]),e("li",Te,[e("label",null,[u(e("input",{type:"checkbox","onUpdate:modelValue":s[6]||(s[6]=t=>l.teaching=t),onChange:s[7]||(s[7]=t=>B("Teaching")),class:"hover:bg-gray-300"},null,544),[[_,l.teaching]]),d(" Teaching ")])]),e("li",Me,[e("label",null,[u(e("input",{type:"checkbox","onUpdate:modelValue":s[8]||(s[8]=t=>l.non_teaching=t),onChange:s[9]||(s[9]=t=>B("Non-Teaching")),class:"hover:bg-gray-300"},null,544),[[_,l.non_teaching]]),d(" Non-Teaching ")])])])]),_:1})])]),e("div",De,[e("button",{onClick:K,type:"button",class:"px-5 py-3 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg max-sm:w-full hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"}," Import "),v.value?(c(),p(n(E),{key:0,onClose:A},{header:o(()=>[Ee]),body:o(()=>[e("form",{class:"",onSubmit:le(H,["prevent"]),enctype:"multipart/form-data"},[e("div",Ve,[$e,e("input",{class:"w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400",id:"file",type:"file",onChange:L},null,32)]),e("div",je,[r(n(k),{onClick:A,color:"alternative"},{default:o(()=>[d(" Cancel ")]),_:1}),r(n(k),{type:"submit",color:"green"},{default:o(()=>[d(" Insert ")]),_:1})])],40,Fe)]),_:1})):h("",!0)]),e("div",Ae,[e("button",{onClick:q,type:"button",class:"flex items-center gap-3 px-5 py-3 text-sm font-medium text-center text-white bg-green-500 rounded-lg max-sm:w-full hover:bg-green-600"},[r(re),d(" Add New Employee ")])])])]),e("div",Ie,[e("div",Ne,[e("div",Ue,[e("table",Ye,[ze,e("tbody",Be,[(c(!0),b(ae,null,se(g.employees.data,t=>(c(),b("tr",{class:"flex flex-col mb-2 flex-no wrap sm:table-row sm:mb-0 max-sm:border max-sm:roun hover:bg-gray-100",key:t.id_number},[e("td",Oe,[r(n(y),{href:`/admin/employee/${t.id}`,class:"flex flex-col"},{default:o(()=>[e("div",Ge,[e("p",Le,i(t.id_number),1),e("p",He,i(t.last_name)+", "+i(t.first_name)+" "+i(t.middle_name),1)])]),_:2},1032,["href"])]),r(n(y),{href:`/admin/employee/${t.id}`,class:"flex flex-col sm:hidden"},{default:o(()=>[e("td",Pe,[e("div",Re,[e("p",qe,i(t.id_number),1),e("p",Ke,i(t.last_name)+", "+i(t.first_name)+", "+i(t.middle_name),1)])])]),_:2},1032,["href"]),e("td",Xe,[r(n(y),{href:`/admin/employee/${t.id}`,class:"flex flex-col"},{default:o(()=>[e("div",Je,[e("p",Qe,i(t.department),1)])]),_:2},1032,["href"])]),e("td",We,[r(n(y),{href:`/admin/employee/${t.id}`,class:"flex flex-col"},{default:o(()=>[e("div",Ze,[e("p",et,i(t.sex),1)])]),_:2},1032,["href"])]),e("td",tt,[r(n(y),{href:`/admin/employee/${t.id}`,class:"flex flex-col"},{default:o(()=>[e("div",lt,[!t.treatments||!t.treatments.length?(c(),b("p",st," Did not visit yet ")):t.treatments[0].updated_at?(c(),b("p",at,i(G(new Date(t.treatments[0].date).toLocaleDateString())),1)):h("",!0)])]),_:2},1032,["href"])])]))),128))])])])]),g.employees.data.length?(c(),b("div",ot,[r(de,{links:g.employees.links},null,8,["links"])])):h("",!0)]),S.value?(c(),p(me,{key:0,departments:g.departments,onClose:R},null,8,["departments"])):h("",!0)]),$.value&&x.value?(c(),p(n(E),{key:0,persistent:"",size:"lg"},{body:o(()=>[e("div",nt,[e("h1",rt,i($.value),1),r(ce,{class:"w-20 h-20"}),e("h2",it,i(P.value),1),r(n(k),{color:"default",size:"lg",class:"w-full",onClick:V},{default:o(()=>[d("Got It")]),_:1})])]),_:1})):h("",!0),j.value&&x.value?(c(),p(n(E),{key:1,size:"md",persistent:""},{body:o(()=>[e("div",dt,[r(ie,{class:"w-12 h-12"}),e("h1",ct,i(j.value),1),r(n(k),{color:"default",size:"lg",class:"w-full",onClick:V},{default:o(()=>[d("Got It")]),_:1})])]),_:1})):h("",!0)]),_:1}))}};export{jt as default};
