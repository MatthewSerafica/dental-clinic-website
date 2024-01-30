import{h as a}from"./index-89e1533b.js";import{i as d,d as e,t as s,g as i,o as x}from"./app-cdbf4484.js";const m={class:"relative"},n={class:"relative ml-6 mr-6"},c={class:"flex flex-col justify-between"},f={class:"flex flex-row gap-36 max-sm:flex-col max-sm:gap-0"},_={class:"text-4xl font-bold text-gray-800 max-sm:text-2xl relative w-[300px]"},h={class:"uppercase"},r={class:"max-sm:flex max-sm:flex-row max-sm:justify-between"},y={class:"flex flex-row items-center"},g=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),u=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"},"ID: ",-1),b={class:"text-lg font-semibold text-gray-800"},p={class:"flex flex-row items-center"},v=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),w=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," DEPARTMENT:  ",-1),E={class:"text-lg font-semibold text-gray-800"},D={class:"relative flex flex-row justify-between gap-36 max-sm:gap-0"},T={class:"max-sm:flex max-sm:flex-col justify-between w-[500px]"},A={class:"relative flex flex-row items-center left-1"},S=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),I=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"},"EMP. TYPE: ",-1),M={class:"text-lg font-semibold text-gray-800 capitalize"},j={class:"flex flex-row items-center"},B=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),N=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," DATE OF BIRTH: ",-1),R={class:"text-lg font-semibold text-gray-800"},Y={class:"flex flex-row items-center"},k=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),z=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," AGE: ",-1),C={class:"text-lg font-semibold text-gray-800"},O={class:"flex flex-row items-center"},P=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),V=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," SEX: ",-1),L={class:"text-lg font-semibold text-gray-800 capitalize"},U={class:"max-sm:flex max-sm:flex-col left-[-250px] relative"},F={class:"flex flex-row items-center"},G=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),H=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," CIVIL STATUS:  ",-1),X={class:"text-lg font-semibold text-gray-800 capitalize"},q={class:"flex flex-row items-center"},J=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),K=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," ADDRESS:  ",-1),Q={class:"text-lg font-semibold text-gray-800"},W={class:"w-[600px]"},Z={class:"flex flex-row items-center"},$=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),ee=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," CONTACT NUMBER: ",-1),te={class:"text-lg font-semibold text-gray-800"},se={class:"flex flex-row items-center"},le=e("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},null,-1),oe=e("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," E-MAIL ADDRESS: ",-1),ae={class:"text-lg font-semibold text-gray-800"},me={__name:"Index",props:{employee:{type:Object,default:()=>({})}},setup(t){const o=l=>l?a(l).format("DD-MM-YYYY"):"";return(l,de)=>(x(),d("div",m,[e("div",n,[e("div",c,[e("div",f,[e("div",null,[e("h1",_,[e("label",h,s(t.employee.last_name),1),i(", "+s(t.employee.first_name)+", "+s(t.employee.middle_name),1)]),e("div",r,[e("div",y,[g,u,e("h2",b,s(t.employee.id_number),1)]),e("div",p,[v,w,e("h2",E,s(t.employee.department),1)])])]),e("div",D,[e("div",T,[e("div",A,[S,I,e("h2",M,s(t.employee.employee_type),1)]),e("div",j,[B,N,e("h2",R,s(o(t.employee.birth_date)),1)]),e("div",Y,[k,z,e("h2",C,s(t.employee.age),1)]),e("div",O,[P,V,e("h2",L,s(t.employee.sex),1)])]),e("div",U,[e("div",F,[G,H,e("h2",X,s(t.employee.civil_status),1)]),e("div",q,[J,K,e("h2",Q,s(t.employee.address),1)]),e("div",W,[e("div",Z,[$,ee,e("h2",te,s(t.employee.contact_number),1)]),e("div",se,[le,oe,e("h2",ae,s(t.employee.user.email),1)])])])])])])])]))}};export{me as default};
