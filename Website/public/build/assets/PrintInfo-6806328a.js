import{i as l,d as e,t as s,o}from"./app-cdbf4484.js";const d={class:"relative"},a={class:"relative ml-6 mr-6"},i={class:"flex flex-col justify-between"},x={class:"flex flex-row gap-36 max-sm:flex-col max-sm:gap-0"},n={class:"text-xl font-bold text-gray-800 max-sm:text-2xl relative w-[300px]"},m={class:"max-sm:flex max-sm:flex-row max-sm:justify-between"},c={class:"flex flex-row items-center"},f=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),_=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"},"ID: ",-1),h={class:"text-lg font-semibold text-gray-800"},r={class:"flex flex-row items-center"},y=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),g=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," DEPARTMENT:  ",-1),u={class:"text-lg font-semibold text-gray-800"},b={class:"flex flex-row justify-between gap-36 max-sm:gap-0 relative left-[-70px]"},p={class:"max-sm:flex max-sm:flex-col justify-between w-[400px]"},v={class:"flex flex-row items-center relative left-1"},w=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),E=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"},"EMP. TYPE: ",-1),T={class:"text-lg font-semibold text-gray-800"},A={class:"flex flex-row items-center"},D=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),S=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," DATE OF BIRTH: ",-1),I={class:"text-lg font-semibold text-gray-800"},j={class:"flex flex-row items-center"},B=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),R=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," AGE: ",-1),M={class:"text-lg font-semibold text-gray-800"},N={class:"flex flex-row items-center"},P=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),C=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," SEX: ",-1),O={class:"text-lg font-semibold text-gray-800 capitalize"},k={class:"max-sm:flex max-sm:flex-col left-[-250px] relative"},z={class:"flex flex-row items-center"},L=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),U=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," CIVIL STATUS:  ",-1),V={class:"text-lg font-semibold text-gray-800 capitalize"},F={class:"flex flex-row items-center"},G=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),H=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," ADDRESS:  ",-1),X={class:"text-lg font-semibold text-gray-800"},Y={class:"w-[600px]"},q={class:"flex flex-row items-center"},J=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),K=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," CONTACT NUMBER: ",-1),Q={class:"text-lg font-semibold text-gray-800"},W={class:"flex flex-row items-center"},Z=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),$=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," E-MAIL ADDRESS: ",-1),ee={class:"text-lg font-semibold text-gray-800"},oe={__name:"PrintInfo",props:{employee:{type:Object,default:()=>({})}},setup(t){return(te,se)=>(o(),l("div",d,[e("div",a,[e("div",i,[e("div",x,[e("div",null,[e("h1",n,s(t.employee.last_name)+", "+s(t.employee.first_name)+" "+s(t.employee.middle_name),1),e("div",m,[e("div",c,[f,_,e("h2",h,s(t.employee.id_number),1)]),e("div",r,[y,g,e("h2",u,s(t.employee.department),1)])])]),e("div",b,[e("div",p,[e("div",v,[w,E,e("h2",T,s(t.employee.employee_type),1)]),e("div",A,[D,S,e("h2",I,s(t.employee.birth_date),1)]),e("div",j,[B,R,e("h2",M,s(t.employee.age),1)]),e("div",N,[P,C,e("h2",O,s(t.employee.sex),1)])]),e("div",k,[e("div",z,[L,U,e("h2",V,s(t.employee.civil_status),1)]),e("div",F,[G,H,e("h2",X,s(t.employee.address),1)]),e("div",Y,[e("div",q,[J,K,e("h2",Q,s(t.employee.contact_number),1)]),e("div",W,[Z,$,e("h2",ee,s(t.employee.user.email),1)])])])])])])])]))}};export{oe as default};