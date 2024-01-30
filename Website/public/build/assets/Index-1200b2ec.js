import{r as x,K as G,c as O,a as R,n as K,b as S,w as r,o as u,d as e,m as i,v as P,u as d,x as X,f as c,y as m,g as n,i as b,j as q,t as o,k as v,h as _,F as J,O as Q}from"./app-cdbf4484.js";import{E as W}from"./Error-fb42616a.js";import{_ as Z}from"./Pagination-af17f53a.js";import{S as ee}from"./Success-01c9158f.js";import se from"./Create-ee75ea8a.js";import le from"./MainLayout-ff052132.js";import{G as te,s as T,m as B}from"./flowbite-vue-62d8acb5.js";import{h as oe}from"./index-89e1533b.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./SideBar-ddd0ab5f.js";import"./SluDentalLogo-a4fb04a6.js";import"./DentistLinks-aebae790.js";import"./SideBarLinks-b569a21a.js";import"./DashboardIcon-abe5f48e.js";import"./UsersIcon-3089db95.js";import"./PatientIcon-56da3996.js";import"./PatientLinks-2a5a06a3.js";import"./AssistantLinks-c53c5408.js";import"./AdminLinks-fd8c5b60.js";import"./Header-33526c7b.js";import"./SideBarMobileView-d1951852.js";const ae=e("div",{class:"flex flex-col ml-2 max-sm:px-5"},[e("h1",{class:"w-20 h-8 text-2xl font-bold text-gray-700 max-sm:ml-4"},"Students"),e("h6",{class:"h-1 text-xs text-gray-400 max-sm:ml-4"},[e("a",{href:"/assistant"},"Home"),n(" > Students ")])],-1),ne={class:"flex flex-col flex-grow mt-8 bg-white max-sm:ml-9 rounded-xl"},re={class:"grid mt-10 mb-2 ml-10 mr-10"},ie={class:"flex justify-between w-full py-1 mx-auto sm:items-center max-sm:flex-col max-sm:gap-4"},de={class:"flex flex-row items-center gap-4"},ce={class:"relative max-sm:w-full"},me=e("div",{class:"absolute top-0 left-0 inline-flex items-center justify-center w-10 h-full text-gray-400"},[e("svg",{class:"w-6 h-6",fill:"none","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",viewBox:"0 0 24 24",stroke:"currentColor"},[e("path",{d:"M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"})])],-1),fe={class:"bg-gray-200 rounded shadow-lg"},ue={class:"hover-bg-gray-300"},he={class:"hover-bg-gray-300"},xe={class:"hover-bg-gray-300"},ge={class:"hover-bg-gray-300"},pe={class:"hover-bg-gray-300"},be={class:"hover-bg-gray-300"},ve={class:"hover-bg-gray-300"},_e={class:"hover-bg-gray-300"},ye={class:"hover-bg-gray-300"},Se={class:"hover-bg-gray-300"},we={class:"grid mb-10 ml-10 mr-10"},ke={class:"gap-4 lg:grid-cols-2 lg:gap-8"},Ae={class:"relative"},Ce={class:"w-full my-5 overflow-hidden rounded-lg sm:bg-white sm:shadow-lg"},Oe=e("thead",{class:"w-full text-black"},[e("tr",{class:"flex flex-col mb-2 bg-gray-100 rounded-l-lg flex-no wrap sm:table-row sm:rounded-none sm:mb-0"},[e("th",{class:"p-3 text-left"},"PATIENTS"),e("th",{class:"p-3 text-left max-sm:hidden"}," COURSE/SCHOOL "),e("th",{class:"p-3 text-left max-sm:hidden"},"SEX"),e("th",{class:"p-3 text-left max-sm:hidden"}," LAST VISIT ")])],-1),Me={class:"flex-1 sm:flex-none"},Ee={class:"p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden"},$e={class:"flex flex-col"},Ve={class:"mr-2 text-base font-medium leading-none text-gray-700"},Le={class:"mr-2 text-base font-normal leading-none text-gray-700"},De={class:"p-3 border-grey-light sm:border-b hover:bg-gray-100"},Te={class:"flex flex-col"},Be={class:"mr-2 text-base font-medium leading-none text-gray-700"},Ie={class:"mr-2 text-base font-normal leading-none text-gray-700"},Ue={class:"p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden"},Ne={class:"flex flex-col"},je={class:"mr-2 text-base font-medium leading-none text-gray-700"},Ye={class:"mr-2 text-base font-normal leading-none text-gray-700"},ze={class:"p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden"},Fe={class:"flex flex-col"},He={class:"mr-2 text-base font-medium leading-none text-gray-700"},Ge={class:"p-3 border-b border-grey-light hover:bg-gray-100 max-sm:hidden"},Re={class:"flex flex-col"},Ke={key:0,class:"mr-2 text-base font-medium leading-none text-gray-700"},Pe={key:1,class:"mr-2 text-base font-medium leading-none text-gray-700"},Xe={key:0,class:"flex justify-center w-full mt-6"},qe={class:"flex flex-col items-center gap-6 px-4 text-lg font-semibold"},Je={class:"text-xl text-center text-green-500 capitalize"},Qe={class:"w-56 pb-4 text-sm font-normal text-center text-gray-500"},We={class:"flex flex-col items-center gap-6 px-4 text-lg font-semibold"},Ze={class:"w-56 text-lg font-semibold text-center text-red-500 capitalize"},ys={__name:"Index",props:{students:{type:Object,default:()=>({})},filters:{type:Object,default:()=>({})},schools:{type:Object,default:()=>({})}},setup(g){const I=g,U=a=>oe(a,"MM-DD-YYYY").format("DD-MM-YYYY"),w=x(!1);function N(){w.value=!1}function j(){w.value=!0}const p=x(!1);function M(){p.value=!1}const k=G(),E=O(()=>k.props.flash.success,p.value=!0),Y=O(()=>k.props.flash.message),$=O(()=>k.props.flash.error,p.value=!0);let f=x(I.filters.search),V=x("id_number"),L=x("asc"),A=x("");const t=R({all:!0,male:!1,female:!1,schools:{SAMCIS:!1,SAS:!1,SEA:!1,SOL:!1,SOM:!1,SONAHBS:!1,STELA:!1}});let C=null;const z=()=>{Q.get("/assistant/student",{search:f.value,sort:V.value,direction:L.value,sex:A.value,school:t.school},{preserveState:!0,replace:!0})},y=()=>{C&&clearTimeout(C),C=setTimeout(()=>{z()},500)},F=()=>{V.value="id_number",L.value="asc"};K(f,()=>{f.value||F(),y()});const H=()=>{A.value="",t.all=!0,t.male=!1,t.female=!1,t.school="",Object.keys(t.schools).forEach(a=>{t.schools[a]=!1}),y()},D=a=>{a==="male"?t.female=!1:a==="female"&&(t.male=!1),t.all=!1,A.value=t[a]?a:"",f.value="",y()},h=a=>{Object.keys(t.schools).forEach(l=>{l!==a&&(t.schools[l]=!1)}),t.all=!1,t.school=t.school===a?"":a,f.value="",y()};return(a,l)=>(u(),S(le,null,{mainContent:r(()=>[ae,e("div",ne,[e("div",re,[e("div",ie,[e("div",de,[e("div",ce,[me,i(e("input",{id:"search","onUpdate:modelValue":l[0]||(l[0]=s=>X(f)?f.value=s:f=s),type:"text",name:"search",class:"w-full h-10 pl-10 pr-4 text-sm placeholder-gray-500 border border-gray-300 rounded-lg sm:text-base focus:outline-none focus:border-indigo-400 bg-gray-50",placeholder:"Search..."},null,512),[[P,d(f)]])]),e("div",null,[c(d(te),{placement:"bottom",text:"Filter"},{default:r(()=>[e("ul",fe,[e("li",ue,[e("label",null,[i(e("input",{type:"checkbox","onUpdate:modelValue":l[1]||(l[1]=s=>t.all=s),onChange:l[2]||(l[2]=s=>H())},null,544),[[m,t.all]]),n(" All ")])]),e("li",he,[e("label",null,[i(e("input",{type:"checkbox","onUpdate:modelValue":l[3]||(l[3]=s=>t.male=s),onChange:l[4]||(l[4]=s=>D("male"))},null,544),[[m,t.male]]),n(" Male ")])]),e("li",xe,[e("label",null,[i(e("input",{type:"checkbox","onUpdate:modelValue":l[5]||(l[5]=s=>t.female=s),onChange:l[6]||(l[6]=s=>D("female"))},null,544),[[m,t.female]]),n(" Female ")])]),e("li",ge,[e("label",null,[i(e("input",{type:"checkbox","onUpdate:modelValue":l[7]||(l[7]=s=>t.schools.SAMCIS=s),onChange:l[8]||(l[8]=s=>h("SAMCIS"))},null,544),[[m,t.schools.SAMCIS]]),n(" SAMCIS ")])]),e("li",pe,[e("label",null,[i(e("input",{type:"checkbox","onUpdate:modelValue":l[9]||(l[9]=s=>t.schools.SAS=s),onChange:l[10]||(l[10]=s=>h("SAS"))},null,544),[[m,t.schools.SAS]]),n(" SAS ")])]),e("li",be,[e("label",null,[i(e("input",{type:"checkbox","onUpdate:modelValue":l[11]||(l[11]=s=>t.schools.SEA=s),onChange:l[12]||(l[12]=s=>h("SEA"))},null,544),[[m,t.schools.SEA]]),n(" SEA ")])]),e("li",ve,[e("label",null,[i(e("input",{type:"checkbox","onUpdate:modelValue":l[13]||(l[13]=s=>t.schools.SOL=s),onChange:l[14]||(l[14]=s=>h("SOL"))},null,544),[[m,t.schools.SOL]]),n(" SOL ")])]),e("li",_e,[e("label",null,[i(e("input",{type:"checkbox","onUpdate:modelValue":l[15]||(l[15]=s=>t.schools.SOM=s),onChange:l[16]||(l[16]=s=>h("SOM"))},null,544),[[m,t.schools.SOM]]),n(" SOM ")])]),e("li",ye,[e("label",null,[i(e("input",{type:"checkbox","onUpdate:modelValue":l[17]||(l[17]=s=>t.schools.SONAHBS=s),onChange:l[18]||(l[18]=s=>h("SONAHBS"))},null,544),[[m,t.schools.SONAHBS]]),n(" SONAHBS ")])]),e("li",Se,[e("label",null,[i(e("input",{type:"checkbox","onUpdate:modelValue":l[19]||(l[19]=s=>t.schools.STELA=s),onChange:l[20]||(l[20]=s=>h("STELA"))},null,544),[[m,t.schools.STELA]]),n(" STELA ")])])])]),_:1})])]),e("div",{class:""},[e("button",{onClick:j,type:"button",class:"px-5 py-3 text-sm font-medium text-center text-white bg-green-500 rounded-lg max-sm:w-full hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"}," Add New Student ")])])]),e("div",we,[e("div",ke,[e("div",Ae,[e("table",Ce,[Oe,e("tbody",Me,[(u(!0),b(J,null,q(g.students.data,s=>(u(),b("tr",{class:"flex flex-col mb-2 flex-no wrap sm:table-row sm:mb-0 max-sm:border max-sm:roun hover:bg-gray-100",key:s.id},[e("td",Ee,[c(d(v),{href:`/assistant/student/${s.id}`,class:"flex flex-col"},{default:r(()=>[e("div",$e,[e("p",Ve,o(s.id_number),1),e("p",Le,o(s.last_name)+", "+o(s.first_name)+" "+o(s.middle_name),1)])]),_:2},1032,["href"])]),c(d(v),{href:`/assistant/student/${s.id}`,class:"flex flex-col sm:hidden"},{default:r(()=>[e("td",De,[e("div",Te,[e("p",Be,o(s.id_number),1),e("p",Ie,o(s.last_name)+", "+o(s.first_name)+", "+o(s.middle_name),1)])])]),_:2},1032,["href"]),e("td",Ue,[c(d(v),{href:`/assistant/student/${s.id}`,class:"flex flex-col"},{default:r(()=>[e("div",Ne,[e("p",je,o(s.course),1),e("p",Ye,o(s.school),1)])]),_:2},1032,["href"])]),e("td",ze,[c(d(v),{href:`/assistant/student/${s.id}`,class:"flex flex-col"},{default:r(()=>[e("div",Fe,[e("p",He,o(s.sex),1)])]),_:2},1032,["href"])]),e("td",Ge,[c(d(v),{href:`/assistant/student/${s.id}`,class:"flex flex-col"},{default:r(()=>[e("div",Re,[!s.treatments||!s.treatments.length?(u(),b("p",Ke," Did not visit yet ")):s.treatments[0].updated_at?(u(),b("p",Pe,o(U(new Date(s.treatments[0].date).toLocaleDateString())),1)):_("",!0)])]),_:2},1032,["href"])])]))),128))])])])]),g.students.data.length?(u(),b("div",Xe,[c(Z,{links:g.students.links},null,8,["links"])])):_("",!0)]),w.value?(u(),S(se,{key:0,onClose:N,schools:g.schools},null,8,["schools"])):_("",!0)]),E.value&&p.value?(u(),S(d(T),{key:0,persistent:"",size:"lg"},{body:r(()=>[e("div",qe,[e("h1",Je,o(E.value),1),c(ee,{class:"w-20 h-20"}),e("h2",Qe,o(Y.value),1),c(d(B),{color:"default",size:"lg",class:"w-full",onClick:M},{default:r(()=>[n("Got It")]),_:1})])]),_:1})):_("",!0),$.value&&p.value?(u(),S(d(T),{key:1,size:"md",persistent:""},{body:r(()=>[e("div",We,[c(W,{class:"w-12 h-12"}),e("h1",Ze,o($.value),1),c(d(B),{color:"default",size:"lg",class:"w-full",onClick:M},{default:r(()=>[n("Got It")]),_:1})])]),_:1})):_("",!0)]),_:1}))}};export{ys as default};
