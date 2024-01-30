import A from"./YearChart-388d876b.js";import D from"./MainLayout-ff052132.js";import{u}from"./UsersIcon-3089db95.js";import{a as O}from"./DashboardIcon-abe5f48e.js";import{K as P,c as C,p,b as E,w as x,o as a,d as t,t as e,u as _,f as d,g as f,k as N,i as n,j as S,h as i,F as V}from"./app-cdbf4484.js";import{d as y}from"./dayjs.min-9450d934.js";import{h as $}from"./index-89e1533b.js";import"./auto-5842a5d9.js";import"./SideBar-ddd0ab5f.js";import"./SluDentalLogo-a4fb04a6.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DentistLinks-aebae790.js";import"./SideBarLinks-b569a21a.js";import"./PatientIcon-56da3996.js";import"./PatientLinks-2a5a06a3.js";import"./AssistantLinks-c53c5408.js";import"./AdminLinks-fd8c5b60.js";import"./Header-33526c7b.js";import"./SideBarMobileView-d1951852.js";const B={class:"flex flex-col"},T={class:"relative mb-5 ml-2 max-lg:mb-5"},H={class:"w-20 h-8 text-xl font-bold text-gray-700"},F=t("h2",{class:"text-lg text-gray-700"},"Have a nice day!",-1),K={class:"flex flex-col flex-grow gap-4 rounded-xl"},L={class:"grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8"},W={class:"flex flex-col h-full gap-4 rounded-lg lg:col-span-2"},q={class:"grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8"},z={class:"flex flex-row items-center justify-between p-4 bg-purple-500 rounded-lg h-44"},G={class:"items-center"},I={class:"relative items-center w-16 h-16 text-center text-gray-100 bg-purple-400 rounded-full"},J={class:"text-3xl font-bold leading-none text-gray-200 dark:text-white"},M=t("p",{class:"text-lg font-semibold text-gray-200 dark:text-gray-400"},"Total Patient ",-1),Q={class:"flex flex-row gap-8"},R={class:"mt-1 text-xl font-semibold leading-none text-gray-200 dark:text-white"},U=t("p",{class:"text-sm font-semibold text-gray-200 dark:text-gray-400"},"Students ",-1),X={class:"mt-1 text-xl font-semibold leading-none text-gray-200 dark:text-white"},Y=t("p",{class:"text-sm font-semibold text-gray-200 dark:text-gray-400"}," Employees ",-1),Z=t("div",null,[t("div",{class:"flex items-center text-base font-semibold text-center text-green-300 dark:text-green-500"})],-1),tt={class:"flex flex-row items-center justify-between p-4 bg-red-500 rounded-lg h-44"},et={class:"items-center"},st={class:"relative items-center w-16 h-16 text-center text-gray-100 bg-red-400 rounded-full"},lt={class:"text-3xl font-bold leading-none text-gray-200 dark:text-white"},ot=t("p",{class:"text-lg font-semibold text-gray-200 dark:text-gray-400"},"Total Patient ",-1),at={class:"flex flex-row gap-8"},dt={class:"pl-1 mt-1 text-xl font-semibold leading-none text-gray-200 dark:text-white"},nt=t("p",{class:"pl-1 text-sm font-semibold text-gray-200 dark:text-gray-400"}," Students ",-1),it={class:"mt-1 text-xl font-semibold leading-none text-gray-200 dark:text-white"},ct=t("p",{class:"text-sm font-semibold text-gray-200 dark:text-gray-400"},"Employees ",-1),rt=t("div",null,[t("div",{class:"flex items-center px-2.5 text-base font-semibold text-green-300 dark:text-green-500 text-center"})],-1),mt={class:"flex flex-row items-center justify-between p-4 bg-yellow-500 rounded-lg h-44"},xt={class:"items-center"},_t={class:"relative items-center w-16 h-16 text-center text-gray-100 bg-yellow-400 rounded-full"},ht={class:"pl-1 text-3xl font-bold leading-none text-gray-100 dark:text-white"},gt=t("p",{class:"pl-1 text-lg font-semibold text-gray-100 dark:text-gray-400"},"Appointments Today ",-1),ut=t("div",null,[t("div",{class:"flex items-center px-2.5 text-base font-semibold text-green-300 dark:text-green-500 text-center"})],-1),pt={class:"w-full h-[34rem] bg-white rounded-lg p-8 flex flex-col items-center mt-0 md:h-[34rem] drop-shadow-md"},ft={class:"relative left-0"},yt=t("hr",{class:"w-full h-0.5 mt-2 bg-gray-200"},null,-1),bt={class:"w-full h-full md:h-[35rem] mt-10"},vt={class:"flex flex-col gap-4 max-lg:gap-20"},wt={class:"w-full bg-white rounded-lg h-1/2 drop-shadow-md"},kt={class:"w-full"},jt={class:"w-full h-full bg-white rounded-lg drop-shadow-md"},At={class:"flex flex-row justify-between"},Dt=t("div",{class:"mt-4 ml-4"}," Today's Appointments ",-1),Ot={class:"mt-4 mr-4"},Pt={class:"flex flex-col gap-4 mt-2 drop-shadow-md"},Ct={class:"flex flex-col h-16 pt-2 pl-4 ml-4 mr-4 rounded-lg bg-gray-50"},Et={class:"relative flex flex-row"},Nt={class:"flex flex-col"},St={class:"absolute pt-3 right-12"},Vt={class:"absolute pt-3 right-4"},$t={key:0,class:"w-6 h-6 text-center text-red-500 bg-red-400 rounded-full"},Bt={key:1,class:"w-6 h-6 text-center text-blue-500 bg-blue-400 rounded-full"},Tt={key:2,class:"w-6 h-6 text-center text-orange-400 bg-orange-400 rounded-full"},Ht={key:3,class:"w-6 h-6 text-center text-green-500 bg-green-400 rounded-full"},Ft={key:4,class:"w-6 h-6 text-center text-yellow-400 bg-yellow-200 rounded-full"},ae={__name:"Dashboard",props:{calendarAppointments:{type:Array},appointments:{type:Array},yearlyData:Object,totalStudents:Object,totalEmployees:Object,totalPatients:Object,completedStudents:Object,completedEmployees:Object,completedPatients:Object,completedAppointments:Object,today:Object},setup(l){const b=l,v=P().props.user.name,[w,k]=v.split(",").map(s=>s.trim());function h(s){return $(s,"HH:mm").format("hh:mm A")}const g=["red","blue","green","yellow","purple"],j=C(()=>b.calendarAppointments.map((s,r)=>{const c=g[r%g.length],m=y(s.app_date).isBefore(y(),"day");return{key:`appointment-${r}`,dot:m?{}:{style:{backgroundColor:c}},dates:s.app_date,color:c,popover:{label:`
                    ${s.user.name} |
                    ${s.app_type} |
                    ${h(s.app_time)}
                `}}}));return(s,r)=>{const c=p("h"),m=p("VCalendar");return a(),E(D,null,{mainContent:x(()=>[t("div",B,[t("div",T,[t("h1",H,"Welcome, Dr. "+e(_(k))+" "+e(_(w)),1),F])]),t("div",K,[t("div",L,[t("div",W,[t("div",q,[t("div",z,[t("div",G,[t("div",I,[d(u,{class:"absolute scale-150 left-5 top-5"})])]),t("div",null,[t("h5",J,e(l.totalPatients),1),M,t("div",Q,[t("div",null,[t("h5",R,e(l.totalStudents),1),U]),t("div",null,[t("h5",X,e(l.totalEmployees),1),Y])])]),Z]),t("div",tt,[t("div",et,[t("div",st,[d(u,{class:"absolute scale-150 left-5 top-5"})])]),t("div",null,[t("h5",lt,e(l.completedPatients),1),ot,t("div",at,[t("div",null,[t("h5",dt,e(l.completedStudents),1),nt]),t("div",null,[t("h5",it,e(l.completedEmployees),1),ct])])]),rt]),t("div",mt,[t("div",xt,[t("div",_t,[d(O,{class:"absolute scale-150 left-5 top-5"})])]),t("div",null,[t("h5",ht,e(l.completedAppointments),1),gt]),ut])]),t("div",pt,[t("div",ft,[d(c,{class:"text-lg font-medium text-black"},{default:x(()=>[f("Patients Accomodated")]),_:1})]),yt,t("div",bt,[d(A,{yearlyData:l.yearlyData},null,8,["yearlyData"])])])]),t("div",vt,[t("div",wt,[t("div",kt,[d(m,{expanded:"","title-position":"left",attributes:j.value},null,8,["attributes"])])]),t("div",jt,[t("div",At,[Dt,t("div",Ot,[d(_(N),{href:s.route("appointment.index"),class:"text-blue-500 font-base"},{default:x(()=>[f("View All")]),_:1},8,["href"])])]),t("div",Pt,[(a(!0),n(V,null,S(l.appointments.slice(0,5),o=>(a(),n("div",Ct,[t("div",Et,[t("div",Nt,[t("div",null,e(o.user.name),1),t("div",null,e(o.app_type),1),t("div",St,e(h(o.app_time)),1)]),t("div",Vt,[o.status==="cancelled"?(a(),n("div",$t)):i("",!0),o.status==="approved"?(a(),n("div",Bt)):i("",!0),o.status==="pending"?(a(),n("div",Tt)):i("",!0),o.status==="completed"?(a(),n("div",Ht)):i("",!0),o.status==="ongoing"?(a(),n("div",Ft)):i("",!0)])])]))),256))])])])])])]),_:1})}}};export{ae as default};