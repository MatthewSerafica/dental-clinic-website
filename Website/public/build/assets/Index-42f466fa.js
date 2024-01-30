import{o as s,i as d,D as G,K as P,r as b,c as C,a as H,p as R,b as _,w as a,d as e,f as o,g as v,j as L,h as n,u as r,k as f,t as c,e as U,F as K,O as Y}from"./app-cdbf4484.js";import{_ as q}from"./_plugin-vue_export-helper-c27b6911.js";import{E as J}from"./Error-fb42616a.js";import{_ as Q}from"./Pagination-af17f53a.js";import{S as W}from"./Success-01c9158f.js";import X from"./MainLayout-ff052132.js";import Z from"./Cancel-4ee5865e.js";import ee from"./Create-45efac2e.js";import{s as M,m as N}from"./flowbite-vue-62d8acb5.js";import{h as te}from"./index-89e1533b.js";import"./SideBar-ddd0ab5f.js";import"./SluDentalLogo-a4fb04a6.js";import"./DentistLinks-aebae790.js";import"./SideBarLinks-b569a21a.js";import"./DashboardIcon-abe5f48e.js";import"./UsersIcon-3089db95.js";import"./PatientIcon-56da3996.js";import"./PatientLinks-2a5a06a3.js";import"./AssistantLinks-c53c5408.js";import"./AdminLinks-fd8c5b60.js";import"./Header-33526c7b.js";import"./SideBarMobileView-d1951852.js";const se={},oe={fill:"#f24a4a",height:"17px",width:"22px",version:"1.1",id:"Capa_1",xmlns:"http://www.w3.org/2000/svg","xmlns:xlink":"http://www.w3.org/1999/xlink",viewBox:"0 0 311.539 311.539","xml:space":"preserve",stroke:"#d10000"},le=G('<g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><g><polygon points="190.127,93.127 155.77,127.484 121.412,93.127 93.127,121.412 127.485,155.77 93.127,190.127 121.412,218.412 155.77,184.055 190.127,218.412 218.412,190.127 184.055,155.77 218.412,121.412 "></polygon> <path d="M155.77,0C69.74,0,0,69.74,0,155.77s69.74,155.77,155.77,155.77s155.77-69.74,155.77-155.77S241.799,0,155.77,0z M155.77,271.539C91.784,271.539,40,219.761,40,155.77C40,91.784,91.778,40,155.77,40c63.986,0,115.77,51.778,115.77,115.77 C271.539,219.755,219.761,271.539,155.77,271.539z"></path></g></g>',3),ae=[le];function ne(m,x){return s(),d("svg",oe,ae)}const re=q(se,[["render",ne]]),ie=e("div",{class:"flex flex-col ml-2"},[e("h1",{class:"w-20 h-8 text-2xl font-bold text-gray-700"},"Appointments"),e("h6",{class:"h-1 text-xs text-gray-400"},[e("a",{href:"/patient"},"Home"),v(" > Appointments ")])],-1),de={class:"flex flex-col flex-grow mt-8 bg-white rounded-xl"},ce={class:"flex flex-row justify-between mt-10 mb-2 ml-10 mr-10 max-md:flex-col"},pe={class:"flex items-center w-full gap-3 left-2"},me={class:"max-md:mt-2"},fe={class:"grid mb-10 ml-10 mr-10"},ue={class:"gap-4 lg:grid-cols-2 lg:gap-8"},he={class:"relative"},_e={class:"w-full my-5 overflow-hidden rounded-lg sm:bg-white sm:shadow-lg"},xe=e("thead",{class:"w-full text-black"},[e("tr",{class:"flex flex-col mb-0 bg-gray-100 rounded-l-lg flex-no wrap sm:table-row sm:rounded-none sm:mb-0"},[e("th",{class:"p-3 text-left max-md:hidden"},"STATUS"),e("th",{class:"p-3 text-left max-md:hidden"},"DATE"),e("th",{class:"p-3 text-left max-md:hidden"},"TIME"),e("th",{class:"p-3 text-left max-md:hidden"},"TYPE"),e("th",{class:"p-3 text-left max-md:hidden"},"NOTES"),e("th",{class:"p-3 text-left max-md:hidden"},"ACTION"),e("th",{class:"p-3 text-left md:hidden"},"APPOINTMENTS")])],-1),ge={class:"flex-1 sm:flex-none"},be={class:"p-3 hover:bg-gray-100"},ve={class:"flex flex-col"},ye={key:0,class:"w-24 py-1 text-center text-red-500 bg-red-200 rounded-full"},we={key:1,class:"w-24 py-1 text-center text-blue-500 bg-blue-200 rounded-full"},ke={key:2,class:"w-24 py-1 text-center text-orange-400 bg-orange-200 rounded-full"},Ce={key:3,class:"w-24 py-1 text-center text-green-500 bg-green-200 rounded-full"},Ae={key:4,class:"w-24 py-1 text-center text-yellow-400 bg-yellow-100 rounded-full"},Se={class:"lg:hidden"},$e={class:"p-3 border-grey-light hover:bg-gray-100"},Te={class:"flex flex-col"},De={class:"mr-2 text-base font-medium leading-none text-gray-700"},Ee={class:"p-3 border-grey-light hover:bg-gray-100 max-md:hidden"},Me={class:"flex flex-col"},Ne={class:"mr-2 text-base font-medium leading-none text-gray-700"},ze={class:"p-3 hover:bg-gray-100 max-md:hidden"},Oe={class:"flex flex-col"},Ve={class:"mr-2 text-base font-medium leading-none text-gray-700"},Ie={class:"p-3 hover:bg-gray-100"},je={class:"flex flex-col"},Be=e("p",{class:"mr-2 text-base font-normal leading-none text-gray-700 lg:hidden"},"Appointment Type:",-1),Fe={class:"mr-2 text-base font-medium leading-none text-gray-700"},Ge={class:"p-3 hover:bg-gray-100 max-md:hidden"},Pe={class:"flex flex-col"},He={class:"mr-2 text-base font-medium leading-none text-gray-700"},Re={class:"p-3 border-grey-light sm:border-b hover:bg-gray-100"},Le=["onClick"],Ue=e("span",null,"Cancel",-1),Ke={key:0,class:"flex justify-center w-full mt-6"},Ye={class:"flex flex-col items-center gap-6 px-4 text-lg font-semibold"},qe={class:"text-xl text-center text-green-500 capitalize"},Je={class:"w-56 pb-4 text-sm font-normal text-center text-gray-500"},Qe={class:"flex flex-col items-center gap-6 px-4 text-lg font-semibold"},We={class:"w-56 text-lg font-semibold text-center text-red-500 capitalize"},yt={__name:"Index",props:{dentists:{type:Array},nuser:{type:Object},appointments:{type:Array},services:{type:Object,default:()=>({})}},setup(m){const x=P(),u=b(!1);function A(){u.value=!1}const S=C(()=>x.props.flash.success,u.value=!0),z=C(()=>x.props.flash.message),$=C(()=>x.props.flash.error,u.value=!0),T=i=>{const p={year:"numeric",month:"long",day:"numeric"};return new Date(i).toLocaleDateString(void 0,p)},g=b(!1);function O(){g.value=!1}function V(){g.value=!0,console.log(g.value)}let y=b(null);const h=b(!1);function I(){h.value&&(y.value=null,h.value=!1)}function D(i){return te(i,"HH:mm").format("hh:mm A")}function j(i){h.value||(y.value=i,h.value=!0)}const l=H({upcoming:!1,past:!1,all:!0});let w=null;const B=()=>{Y.get("/patient/appointments",{filterAppointments:l.all?"all":l.upcoming?"upcoming":l.past?"past":""},{preserveState:!0,replace:!0})},F=()=>{w&&clearTimeout(w),w=setTimeout(()=>{B()},500)},k=i=>{i==="upcoming"?(l.upcoming=!0,l.past=!1,l.all=!1):i==="past"?(l.past=!0,l.upcoming=!1,l.all=!1):i==="all"&&(l.all=!0,l.upcoming=!1,l.past=!1),F()};return(i,p)=>{const E=R("AddApointment");return s(),_(X,null,{mainContent:a(()=>[ie,e("div",de,[e("div",ce,[e("div",pe,[e("button",{onClick:p[0]||(p[0]=t=>k("all")),class:"px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent"}," All "),e("button",{onClick:p[1]||(p[1]=t=>k("upcoming")),class:"px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent"}," Upcoming "),e("button",{onClick:p[2]||(p[2]=t=>k("past")),class:"px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent"}," Past ")]),e("div",me,[e("div",null,[e("button",{onClick:V,type:"button",class:"flex items-center gap-3 px-5 py-2 font-medium text-white bg-green-500 rounded hover:bg-green-700"},[o(E),v(" Book Appointment ")])])])]),e("div",fe,[e("div",ue,[e("div",he,[e("table",_e,[xe,e("tbody",ge,[(s(!0),d(K,null,L(m.appointments.data,t=>(s(),d("tr",{class:"flex flex-col mb-2 flex-no wrap md:table-row max-md:mb-0 max-md:border hover:bg-gray-100 border-grey-light sm:border-b",key:t.app_id},[e("td",be,[o(r(f),{href:`/patient/appointments/${t.app_id}`},{default:a(()=>[e("div",ve,[t.status==="cancelled"?(s(),d("div",ye," Cancelled ")):n("",!0),t.status==="approved"?(s(),d("div",we," Approved ")):n("",!0),t.status==="pending"?(s(),d("div",ke," Pending ")):n("",!0),t.status==="completed"?(s(),d("div",Ce," Completed ")):n("",!0),t.status==="ongoing"?(s(),d("div",Ae," Ongoing ")):n("",!0)])]),_:2},1032,["href"])]),e("div",Se,[e("td",$e,[o(r(f),{href:`/patient/appointments/${t.app_id}`},{default:a(()=>[e("div",Te,[e("p",De,c(T(t.app_date))+" at "+c(D(t.app_time)),1)])]),_:2},1032,["href"])])]),e("td",Ee,[o(r(f),{href:`/patient/appointments/${t.app_id}`},{default:a(()=>[e("div",Me,[e("p",Ne,c(T(t.app_date)),1)])]),_:2},1032,["href"])]),e("td",ze,[o(r(f),{href:`/patient/appointments/${t.app_id}`},{default:a(()=>[e("div",Oe,[e("p",Ve,c(D(t.app_time)),1)])]),_:2},1032,["href"])]),e("td",Ie,[o(r(f),{href:`/patient/appointments/${t.app_id}`},{default:a(()=>[e("div",je,[Be,e("p",Fe,c(t.app_type),1)])]),_:2},1032,["href"])]),e("td",Ge,[o(r(f),{href:`/patient/appointments/${t.app_id}`},{default:a(()=>[e("div",Pe,[e("p",He,c(t.pat_notes),1)])]),_:2},1032,["href"])]),e("td",Re,[t.status==="approved"||t.status==="pending"?(s(),d("button",{key:0,type:"button",onClick:U(Xe=>j(t),["prevent"]),class:"flex items-center space-x-1 text-[#f24a4a] text-sm w-24 py-2 bg-red-200 hover:bg-red-300 rounded-xl"},[o(re,{class:"px-1 ml-2"}),Ue],8,Le)):n("",!0)])]))),128))])])])]),m.appointments.data.length?(s(),d("div",Ke,[o(Q,{links:m.appointments.links},null,8,["links"])])):n("",!0)])]),S.value&&u.value?(s(),_(r(M),{key:0,persistent:"",size:"lg"},{body:a(()=>[e("div",Ye,[e("h1",qe,c(S.value),1),o(W,{class:"w-20 h-20"}),e("h2",Je,c(z.value),1),o(r(N),{color:"default",size:"lg",class:"w-full",onClick:A},{default:a(()=>[v("Got It")]),_:1})])]),_:1})):n("",!0),$.value&&u.value?(s(),_(r(M),{key:1,size:"md",persistent:""},{body:a(()=>[e("div",Qe,[o(J,{class:"w-12 h-12"}),e("h1",We,c($.value),1),o(r(N),{color:"default",size:"lg",class:"w-full",onClick:A},{default:a(()=>[v("Got It")]),_:1})])]),_:1})):n("",!0),g.value?(s(),_(ee,{key:2,dentists:m.dentists,user:m.nuser,services:m.services,onClose:O},null,8,["dentists","user","services"])):n("",!0),h.value?(s(),_(Z,{key:3,appointment:r(y),onCloseCancel:I},null,8,["appointment"])):n("",!0)]),_:1})}}};export{yt as default};