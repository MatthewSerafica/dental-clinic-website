import R from"./Cancel-c72d1346.js";import{A as W}from"./AddApointment-2aa6d91a.js";import{_ as X}from"./Pagination-af17f53a.js";import{S as Z}from"./Success-01c9158f.js";import{E as ee}from"./Error-fb42616a.js";import te from"./Create-e3e9ac21.js";import se from"./MainLayout-ff052132.js";import{r as b,K as oe,c as $,T as v,a as le,b as u,w as a,o,d as e,f as d,g as _,i,j as ae,t as c,u as n,k as m,h as l,F as ne,O as re}from"./app-cdbf4484.js";import{m as T,G as de,s as O}from"./flowbite-vue-62d8acb5.js";import{h as I}from"./index-89e1533b.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./SideBar-ddd0ab5f.js";import"./SluDentalLogo-a4fb04a6.js";import"./DentistLinks-aebae790.js";import"./SideBarLinks-b569a21a.js";import"./DashboardIcon-abe5f48e.js";import"./UsersIcon-3089db95.js";import"./PatientIcon-56da3996.js";import"./PatientLinks-2a5a06a3.js";import"./AssistantLinks-c53c5408.js";import"./AdminLinks-fd8c5b60.js";import"./Header-33526c7b.js";import"./SideBarMobileView-d1951852.js";const ie=e("div",{class:"flex flex-col ml-2"},[e("h1",{class:"w-20 h-8 text-2xl font-bold text-gray-700"},"Appointments"),e("h6",{class:"h-1 text-xs text-gray-400"},[e("a",{href:"/"},"Home"),_(" > Appointments ")])],-1),ce={class:"flex flex-col flex-grow mt-8 bg-white rounded-xl"},ue={class:"flex flex-row justify-between mt-10 mb-2 ml-10 mr-10 max-md:flex-col"},pe={class:"flex items-center w-full gap-3 left-2"},me={class:"max-md:mt-2"},fe={class:"grid mb-10 ml-10 mr-10"},he={class:"gap-4 lg:grid-cols-2 lg:gap-8"},ge={class:"relative"},_e={class:"w-full my-5 overflow-hidden rounded-lg sm:bg-white sm:shadow-lg"},xe=e("thead",{class:"w-full text-black"},[e("tr",{class:"flex flex-col mb-0 bg-gray-100 rounded-l-lg flex-no wrap sm:table-row sm:rounded-none sm:mb-0"},[e("th",{class:"p-3 text-left max-md:hidden"},"DATE"),e("th",{class:"p-3 text-left md:hidden"},"APPOINTMENTS"),e("th",{class:"p-3 text-left max-md:hidden"}," TIME "),e("th",{class:"p-3 text-left max-md:hidden"},"NAME"),e("th",{class:"p-3 text-left max-md:hidden"}," TYPE "),e("th",{class:"p-3 text-left max-md:hidden"},"NOTES"),e("th",{class:"p-3 text-left max-md:hidden"},"STATUS"),e("th",{class:"p-3 text-left max-md:hidden max-xl:hidden"},"ACTIONS")])],-1),be={class:"flex-1 sm:flex-none"},ve={class:"lg:hidden"},ye={class:"p-3 border-grey-light hover:bg-gray-100"},ke={class:"flex flex-col"},we={class:"mr-2 text-base font-medium leading-none text-gray-700"},Ce={class:"p-3 border-grey-light hover:bg-gray-100 max-md:hidden"},Ae={class:"flex flex-col"},$e={class:"mr-2 text-base font-medium leading-none text-gray-700"},Te={class:"p-3 hover:bg-gray-100 max-md:hidden"},Se={class:"flex flex-col"},Me={class:"mr-2 text-base font-medium leading-none text-gray-700"},Ee={class:"p-3 hover:bg-gray-100"},Ne={class:"flex flex-col"},Ye={class:"mr-2 text-base font-medium leading-none text-gray-700"},De={class:"p-3 hover:bg-gray-100"},Oe={class:"flex flex-col"},Ie=e("p",{class:"mr-2 text-base font-normal leading-none text-gray-700 lg:hidden"},"Appointment Type:",-1),Pe={class:"mr-2 text-base font-medium leading-none text-gray-700"},ze={class:"p-3 hover:bg-gray-100 max-md:hidden"},Be={class:"flex flex-col"},Fe={class:"mr-2 text-base font-medium leading-none text-gray-700"},Ge={class:"p-3 hover:bg-gray-100"},Ve={class:"flex flex-col"},je={key:0,class:"w-24 py-1 text-center text-red-500 bg-red-200 rounded-full"},He={key:1,class:"w-24 py-1 text-center text-blue-500 bg-blue-200 rounded-full"},Ue={key:2,class:"w-24 py-1 text-center text-orange-400 bg-orange-200 rounded-full"},Ke={key:3,class:"w-24 py-1 text-center text-green-500 bg-green-200 rounded-full"},Le={key:4,class:"w-24 py-1 text-center text-yellow-400 bg-yellow-100 rounded-full"},qe={class:"p-2.5 hover:bg-gray-100 xl:absolute"},Je={class:"bg-gray-200 rounded-lg shadow-lg"},Qe={key:0,class:"hover-bg-gray-300"},Re=["onClick"],We={key:1},Xe=["onClick"],Ze={key:2},et=["onClick"],tt={key:3},st=["onClick"],ot=["onClick"],lt={key:0,class:"flex justify-center w-full mt-6"},at={class:"flex flex-col items-center gap-6 px-4 text-lg font-semibold"},nt={class:"text-xl text-center text-green-500 capitalize"},rt={class:"w-56 pb-4 text-sm font-normal text-center text-gray-500"},dt={class:"flex flex-col items-center gap-6 px-4 text-lg font-semibold"},it={class:"w-56 text-lg font-semibold text-center text-red-500 capitalize"},Dt={__name:"Index",props:{appointments:{type:Array},dentists:{type:Array}},setup(x){const y=b(!1),k=oe();function P(){y.value=!1}function z(){y.value=!0}function S(s){return I(s,"HH:mm").format("hh:mm A")}const M=s=>I(s,"YYYY-MM-DD").format("MMMM D, YYYY"),f=b(!1);function E(){f.value=!1}const N=$(()=>k.props.flash.success,f.value=!0),B=$(()=>k.props.flash.message),Y=$(()=>k.props.flash.error,f.value=!0),F=v({status:"pending",reason:"pending",made_appointment:1}),G=v({status:"approved",reason:"approved",made_appointment:1}),V=v({status:"ongoing",reason:"ongoing",made_appointment:1}),j=v({status:"completed",reason:"completed",made_appointment:0});function H(s){F.put(route("assistant.appointment.update",s.app_id))}function U(s){G.put(route("assistant.appointment.update",s.app_id))}function K(s){V.put(route("assistant.appointment.update",s.app_id))}function D(s){j.put(route("assistant.appointment.update",s.app_id))}let w=b(null);const h=b(!1);function L(){h.value&&(w.value=null,h.value=!1)}function q(s){h.value||(w.value=s,h.value=!0)}const r=le({upcoming:!1,past:!1,all:!0});let C=null;const J=()=>{re.get("/assistant/appointment",{filterAppointments:r.all?"all":r.upcoming?"upcoming":r.past?"past":""},{preserveState:!0,replace:!0})},Q=()=>{C&&clearTimeout(C),C=setTimeout(()=>{J()},500)},A=s=>{s==="upcoming"?(r.upcoming=!0,r.past=!1,r.all=!1):s==="past"?(r.past=!0,r.upcoming=!1,r.all=!1):s==="all"&&(r.all=!0,r.upcoming=!1,r.past=!1),Q()};return(s,p)=>(o(),u(se,null,{mainContent:a(()=>[ie,e("div",ce,[e("div",ue,[e("div",pe,[e("button",{onClick:p[0]||(p[0]=t=>A("all")),class:"px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent"}," All "),e("button",{onClick:p[1]||(p[1]=t=>A("upcoming")),class:"px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent"}," Upcoming "),e("button",{onClick:p[2]||(p[2]=t=>A("past")),class:"px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent"}," Past ")]),e("div",me,[e("div",null,[e("button",{onClick:z,type:"button",class:"flex items-center gap-3 px-5 py-2 font-medium text-white bg-green-500 rounded hover:bg-green-700"},[d(W),_(" Book Appointment ")])])])]),e("div",fe,[e("div",he,[e("div",ge,[e("table",_e,[xe,e("tbody",be,[(o(!0),i(ne,null,ae(x.appointments.data,t=>(o(),i("tr",{class:"flex flex-col mb-2 flex-no wrap md:table-row max-md:mb-0 max-md:border hover:bg-gray-100 border-grey-light sm:border-b",key:t.app_id},[e("div",ve,[e("td",ye,[d(n(m),{href:`/assistant/appointment/${t.app_id}`},{default:a(()=>[e("div",ke,[e("p",we,c(M(t.app_date))+" at "+c(S(t.app_time)),1)])]),_:2},1032,["href"])])]),e("td",Ce,[d(n(m),{href:`/assistant/appointment/${t.app_id}`},{default:a(()=>[e("div",Ae,[e("p",$e,c(M(t.app_date)),1)])]),_:2},1032,["href"])]),e("td",Te,[d(n(m),{href:`/assistant/appointment/${t.app_id}`},{default:a(()=>[e("div",Se,[e("p",Me,c(S(t.app_time)),1)])]),_:2},1032,["href"])]),e("td",Ee,[d(n(m),{href:`/assistant/appointment/${t.app_id}`},{default:a(()=>[e("div",Ne,[e("p",Ye,c(t.user.name),1)])]),_:2},1032,["href"])]),e("td",De,[d(n(m),{href:`/assistant/appointment/${t.app_id}`},{default:a(()=>[e("div",Oe,[Ie,e("p",Pe,c(t.app_type),1)])]),_:2},1032,["href"])]),e("td",ze,[d(n(m),{href:`/assistant/appointment/${t.app_id}`},{default:a(()=>[e("div",Be,[e("p",Fe,c(t.pat_notes),1)])]),_:2},1032,["href"])]),e("td",Ge,[e("div",Ve,[t.status==="cancelled"?(o(),i("div",je," Cancelled ")):l("",!0),t.status==="approved"?(o(),i("div",He," Approved ")):l("",!0),t.status==="pending"?(o(),i("div",Ue," Pending ")):l("",!0),t.status==="completed"?(o(),i("div",Ke," Completed ")):l("",!0),t.status==="ongoing"?(o(),i("div",Le," Ongoing ")):l("",!0)])]),e("td",qe,[t.status==="ongoing"?(o(),u(n(T),{key:0,color:"default",type:"button",onClick:g=>D(t)},{default:a(()=>[_(" Completed ")]),_:2},1032,["onClick"])):l("",!0),t.status!=="completed"&&t.status!=="cancelled"&&t.status!=="ongoing"?(o(),u(n(de),{key:1,placement:"bottom",text:"Select"},{default:a(()=>[e("ul",Je,[t.status!=="approved"?(o(),i("li",Qe,[e("label",null,[e("button",{type:"button",onClick:g=>U(t),class:"block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"}," Approve ",8,Re)])])):l("",!0),t.status!=="approved"&&t.status!=="pending"?(o(),i("li",We,[e("label",null,[e("button",{class:"block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white",type:"button",onClick:g=>H(t)}," Pending ",8,Xe)])])):l("",!0),t.status!=="pending"?(o(),i("li",Ze,[e("label",null,[e("button",{class:"block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white",type:"button",onClick:g=>K(t)}," Ongoing ",8,et)])])):l("",!0),t.status!=="pending"?(o(),i("li",tt,[e("label",null,[e("button",{class:"block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white",type:"button",onClick:g=>D(t)}," Completed ",8,st)])])):l("",!0),e("li",null,[e("label",null,[e("button",{class:"block w-full px-4 py-2 bg-red-400 rounded-b hover:bg-red-500",type:"button",onClick:g=>q(t)}," Cancel ",8,ot)])])])]),_:2},1024)):l("",!0)])]))),128))])])])]),x.appointments.data.length?(o(),i("div",lt,[d(X,{links:x.appointments.links},null,8,["links"])])):l("",!0)])]),N.value&&f.value?(o(),u(n(O),{key:0,persistent:"",size:"lg"},{body:a(()=>[e("div",at,[e("h1",nt,c(N.value),1),d(Z,{class:"w-20 h-20"}),e("h2",rt,c(B.value),1),d(n(T),{color:"default",size:"lg",class:"w-full",onClick:E},{default:a(()=>[_("Got It")]),_:1})])]),_:1})):l("",!0),Y.value&&f.value?(o(),u(n(O),{key:1,size:"md",persistent:""},{body:a(()=>[e("div",dt,[d(ee,{class:"w-12 h-12"}),e("h1",it,c(Y.value),1),d(n(T),{color:"default",size:"lg",class:"w-full",onClick:E},{default:a(()=>[_("Got It")]),_:1})])]),_:1})):l("",!0),y.value?(o(),u(te,{key:2,dentists:x.dentists,services:s.services,onClose:P},null,8,["dentists","services"])):l("",!0),h.value?(o(),u(R,{key:3,appointment:n(w),onCloseCancel:L},null,8,["appointment"])):l("",!0)]),_:1}))}};export{Dt as default};