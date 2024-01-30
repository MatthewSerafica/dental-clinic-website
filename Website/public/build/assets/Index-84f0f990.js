import{r as g,K as G,c as O,a as R,n as K,b as S,w as i,o as u,d as e,m as d,v as P,u as c,x as X,f as r,y as m,g as a,i as b,j as q,t as o,k as _,h as v,F as J,O as Q}from"./app-cdbf4484.js";import{A as W}from"./AddApointment-2aa6d91a.js";import{E as Z}from"./Error-fb42616a.js";import{_ as ee}from"./Pagination-af17f53a.js";import{S as le}from"./Success-01c9158f.js";import se from"./Create-01b43900.js";import te from"./MainLayout-ff052132.js";import{h as oe}from"./index-89e1533b.js";import{G as ae,s as T,m as B}from"./flowbite-vue-62d8acb5.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./SideBar-ddd0ab5f.js";import"./SluDentalLogo-a4fb04a6.js";import"./DentistLinks-aebae790.js";import"./SideBarLinks-b569a21a.js";import"./DashboardIcon-abe5f48e.js";import"./UsersIcon-3089db95.js";import"./PatientIcon-56da3996.js";import"./PatientLinks-2a5a06a3.js";import"./AssistantLinks-c53c5408.js";import"./AdminLinks-fd8c5b60.js";import"./Header-33526c7b.js";import"./SideBarMobileView-d1951852.js";const ne=e("div",{class:"flex flex-col ml-2"},[e("h1",{class:"w-20 h-8 text-2xl font-bold text-gray-700"},"Students"),e("h6",{class:"h-1 text-xs text-gray-400"},[e("a",{href:"/"},"Home"),a(" > Students ")])],-1),re={class:"flex flex-col flex-grow mt-8 bg-white rounded-xl"},ie={class:"grid mt-10 mb-2 ml-10 mr-10"},de={class:"flex justify-between w-full py-1 mx-auto sm:items-center max-sm:flex-col max-sm:gap-4"},ce={class:"flex flex-row items-center gap-4"},me={class:"relative max-sm:w-full"},fe=e("div",{class:"absolute top-0 left-0 inline-flex items-center justify-center w-10 h-full text-gray-400"},[e("svg",{class:"w-6 h-6",fill:"none","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",viewBox:"0 0 24 24",stroke:"currentColor"},[e("path",{d:"M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"})])],-1),ue={class:"bg-gray-200 rounded shadow-lg"},he={class:"hover-bg-gray-300"},ge={class:"hover-bg-gray-300"},xe={class:"hover-bg-gray-300"},pe={class:"hover-bg-gray-300"},be={class:"hover-bg-gray-300"},_e={class:"hover-bg-gray-300"},ve={class:"hover-bg-gray-300"},ye={class:"hover-bg-gray-300"},Se={class:"hover-bg-gray-300"},we={class:"hover-bg-gray-300"},ke={class:""},Ae={class:"grid mb-10 ml-10 mr-10"},Ce={class:"gap-4 lg:grid-cols-2 lg:gap-8"},Oe={class:"relative"},Me={class:"w-full my-5 overflow-hidden rounded-lg sm:bg-white sm:shadow-lg"},Ee=e("thead",{class:"w-full text-black"},[e("tr",{class:"flex flex-col mb-2 bg-gray-100 rounded-l-lg flex-no wrap sm:table-row sm:rounded-none sm:mb-0"},[e("th",{class:"p-3 text-left"},"PATIENTS"),e("th",{class:"p-3 text-left max-sm:hidden"}," COURSE/SCHOOL "),e("th",{class:"p-3 text-left max-sm:hidden"},"SEX"),e("th",{class:"p-3 text-left max-sm:hidden"}," LAST VISIT ")])],-1),$e={class:"flex-1 sm:flex-none"},Ve={class:"p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden"},Le={class:"flex flex-col"},De={class:"mr-2 text-base font-medium leading-none text-gray-700"},Te={class:"mr-2 text-base font-normal leading-none text-gray-700"},Be={class:"p-3 border-grey-light sm:border-b hover:bg-gray-100"},Ie={class:"flex flex-col"},Ue={class:"mr-2 text-base font-medium leading-none text-gray-700"},Ne={class:"mr-2 text-base font-normal leading-none text-gray-700"},je={class:"p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden"},Ye={class:"flex flex-col"},ze={class:"mr-2 text-base font-medium leading-none text-gray-700"},Fe={class:"mr-2 text-base font-normal leading-none text-gray-700"},He={class:"p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden"},Ge={class:"flex flex-col"},Re={class:"mr-2 text-base font-medium leading-none text-gray-700"},Ke={class:"p-3 border-b border-grey-light hover:bg-gray-100 max-sm:hidden"},Pe={class:"flex flex-col"},Xe={key:0,class:"mr-2 text-base font-medium leading-none text-gray-700"},qe={key:1,class:"mr-2 text-base font-medium leading-none text-gray-700"},Je={key:0,class:"flex justify-center w-full mt-6"},Qe={class:"flex flex-col items-center gap-6 px-4 text-lg font-semibold"},We={class:"text-xl text-center text-green-500 capitalize"},Ze={class:"w-56 pb-4 text-sm font-normal text-center text-gray-500"},el={class:"flex flex-col items-center gap-6 px-4 text-lg font-semibold"},ll={class:"w-56 text-lg font-semibold text-center text-red-500 capitalize"},kl={__name:"Index",props:{students:{type:Object,default:()=>({})},filters:{type:Object,default:()=>({})},schools:{type:Object,default:()=>({})}},setup(x){const I=x,U=n=>oe(n,"MM-DD-YYYY").format("DD-MM-YYYY"),w=g(!1);function N(){w.value=!1}function j(){w.value=!0}const p=g(!1);function M(){p.value=!1}const k=G(),E=O(()=>k.props.flash.success,p.value=!0),Y=O(()=>k.props.flash.message),$=O(()=>k.props.flash.error,p.value=!0);let f=g(I.filters.search),V=g("id_number"),L=g("asc"),A=g("");const t=R({all:!0,male:!1,female:!1,schools:{SAMCIS:!1,SAS:!1,SEA:!1,SOL:!1,SOM:!1,SONAHBS:!1,STELA:!1}});let C=null;const z=()=>{Q.get("/student",{search:f.value,sort:V.value,direction:L.value,sex:A.value,school:t.school},{preserveState:!0,replace:!0})},y=()=>{C&&clearTimeout(C),C=setTimeout(()=>{z()},500)},F=()=>{V.value="id_number",L.value="asc"};K(f,()=>{f.value||F(),y()});const H=()=>{A.value="",t.all=!0,t.male=!1,t.female=!1,t.school="",Object.keys(t.schools).forEach(n=>{t.schools[n]=!1}),y()},D=n=>{n==="male"?t.female=!1:n==="female"&&(t.male=!1),t.all=!1,A.value=t[n]?n:"",f.value="",y()},h=n=>{Object.keys(t.schools).forEach(s=>{s!==n&&(t.schools[s]=!1)}),t.all=!1,t.school=t.school===n?"":n,f.value="",y()};return(n,s)=>(u(),S(te,null,{mainContent:i(()=>[ne,e("div",re,[e("div",ie,[e("div",de,[e("div",ce,[e("div",me,[fe,d(e("input",{id:"search","onUpdate:modelValue":s[0]||(s[0]=l=>X(f)?f.value=l:f=l),type:"text",name:"search",class:"w-full h-10 pl-10 pr-4 text-sm placeholder-gray-500 border border-gray-300 rounded-lg sm:text-base focus:outline-none focus:border-indigo-400 bg-gray-50",placeholder:"Search..."},null,512),[[P,c(f)]])]),e("div",null,[r(c(ae),{placement:"bottom",text:"Filter"},{default:i(()=>[e("ul",ue,[e("li",he,[e("label",null,[d(e("input",{type:"checkbox","onUpdate:modelValue":s[1]||(s[1]=l=>t.all=l),onChange:s[2]||(s[2]=l=>H())},null,544),[[m,t.all]]),a(" All ")])]),e("li",ge,[e("label",null,[d(e("input",{type:"checkbox","onUpdate:modelValue":s[3]||(s[3]=l=>t.male=l),onChange:s[4]||(s[4]=l=>D("male"))},null,544),[[m,t.male]]),a(" Male ")])]),e("li",xe,[e("label",null,[d(e("input",{type:"checkbox","onUpdate:modelValue":s[5]||(s[5]=l=>t.female=l),onChange:s[6]||(s[6]=l=>D("female"))},null,544),[[m,t.female]]),a(" Female ")])]),e("li",pe,[e("label",null,[d(e("input",{type:"checkbox","onUpdate:modelValue":s[7]||(s[7]=l=>t.schools.SAMCIS=l),onChange:s[8]||(s[8]=l=>h("SAMCIS"))},null,544),[[m,t.schools.SAMCIS]]),a(" SAMCIS ")])]),e("li",be,[e("label",null,[d(e("input",{type:"checkbox","onUpdate:modelValue":s[9]||(s[9]=l=>t.schools.SAS=l),onChange:s[10]||(s[10]=l=>h("SAS"))},null,544),[[m,t.schools.SAS]]),a(" SAS ")])]),e("li",_e,[e("label",null,[d(e("input",{type:"checkbox","onUpdate:modelValue":s[11]||(s[11]=l=>t.schools.SEA=l),onChange:s[12]||(s[12]=l=>h("SEA"))},null,544),[[m,t.schools.SEA]]),a(" SEA ")])]),e("li",ve,[e("label",null,[d(e("input",{type:"checkbox","onUpdate:modelValue":s[13]||(s[13]=l=>t.schools.SOL=l),onChange:s[14]||(s[14]=l=>h("SOL"))},null,544),[[m,t.schools.SOL]]),a(" SOL ")])]),e("li",ye,[e("label",null,[d(e("input",{type:"checkbox","onUpdate:modelValue":s[15]||(s[15]=l=>t.schools.SOM=l),onChange:s[16]||(s[16]=l=>h("SOM"))},null,544),[[m,t.schools.SOM]]),a(" SOM ")])]),e("li",Se,[e("label",null,[d(e("input",{type:"checkbox","onUpdate:modelValue":s[17]||(s[17]=l=>t.schools.SONAHBS=l),onChange:s[18]||(s[18]=l=>h("SONAHBS"))},null,544),[[m,t.schools.SONAHBS]]),a(" SONAHBS ")])]),e("li",we,[e("label",null,[d(e("input",{type:"checkbox","onUpdate:modelValue":s[19]||(s[19]=l=>t.schools.STELA=l),onChange:s[20]||(s[20]=l=>h("STELA"))},null,544),[[m,t.schools.STELA]]),a(" STELA ")])])])]),_:1})])]),e("div",ke,[e("button",{onClick:j,type:"button",class:"flex flex-row items-center gap-2 px-5 py-3 text-sm font-medium text-center text-white bg-green-500 rounded-lg max-sm:w-full hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"},[r(W),a(" Add New Student ")])])])]),e("div",Ae,[e("div",Ce,[e("div",Oe,[e("table",Me,[Ee,e("tbody",$e,[(u(!0),b(J,null,q(x.students.data,l=>(u(),b("tr",{class:"flex flex-col mb-2 flex-no wrap sm:table-row sm:mb-0 max-sm:border max-sm:roun hover:bg-gray-100",key:l.id},[e("td",Ve,[r(c(_),{href:`/student/${l.id}`,class:"flex flex-col"},{default:i(()=>[e("div",Le,[e("p",De,o(l.id_number),1),e("p",Te,o(l.last_name)+", "+o(l.first_name)+" "+o(l.middle_name),1)])]),_:2},1032,["href"])]),r(c(_),{href:`/student/${l.id}`,class:"flex flex-col sm:hidden"},{default:i(()=>[e("td",Be,[e("div",Ie,[e("p",Ue,o(l.id_number),1),e("p",Ne,o(l.last_name)+", "+o(l.first_name)+", "+o(l.middle_name),1)])])]),_:2},1032,["href"]),e("td",je,[r(c(_),{href:`/student/${l.id}`,class:"flex flex-col"},{default:i(()=>[e("div",Ye,[e("p",ze,o(l.course),1),e("p",Fe,o(l.school),1)])]),_:2},1032,["href"])]),e("td",He,[r(c(_),{href:`/student/${l.id}`,class:"flex flex-col"},{default:i(()=>[e("div",Ge,[e("p",Re,o(l.sex),1)])]),_:2},1032,["href"])]),e("td",Ke,[r(c(_),{href:`/student/${l.id}`,class:"flex flex-col"},{default:i(()=>[e("div",Pe,[!l.treatments||!l.treatments.length?(u(),b("p",Xe," Did not visit yet ")):l.treatments[0].updated_at?(u(),b("p",qe,o(U(new Date(l.treatments[0].date).toLocaleDateString())),1)):v("",!0)])]),_:2},1032,["href"])])]))),128))])])])]),x.students.data.length?(u(),b("div",Je,[r(ee,{links:x.students.links},null,8,["links"])])):v("",!0)]),w.value?(u(),S(se,{key:0,onClose:N,schools:x.schools},null,8,["schools"])):v("",!0)]),E.value&&p.value?(u(),S(c(T),{key:0,persistent:"",size:"lg"},{body:i(()=>[e("div",Qe,[e("h1",We,o(E.value),1),r(le,{class:"w-20 h-20"}),e("h2",Ze,o(Y.value),1),r(c(B),{color:"default",size:"lg",class:"w-full",onClick:M},{default:i(()=>[a("Got It")]),_:1})])]),_:1})):v("",!0),$.value&&p.value?(u(),S(c(T),{key:1,size:"md",persistent:""},{body:i(()=>[e("div",el,[r(Z,{class:"w-12 h-12"}),e("h1",ll,o($.value),1),r(c(B),{color:"default",size:"lg",class:"w-full",onClick:M},{default:i(()=>[a("Got It")]),_:1})])]),_:1})):v("",!0)]),_:1}))}};export{kl as default};
