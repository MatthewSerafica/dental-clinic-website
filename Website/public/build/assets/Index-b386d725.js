import{h as a}from"./index-89e1533b.js";import{i as x,d as t,t as s,o as i}from"./app-cdbf4484.js";const l={class:"relative"},n={class:"relative ml-6 mr-6"},m={class:"flex flex-col justify-between"},c={class:"flex flex-row gap-36 max-sm:flex-col max-sm:gap-0"},f={class:"text-4xl font-bold text-gray-800 max-sm:text-2xl w-[400px] uppercase"},_={class:"text-4xl font-bold text-gray-800 max-sm:text-2xl w-[400px]"},h={class:"max-sm:flex max-sm:flex-row max-sm:justify-between"},r={class:"flex flex-row items-center"},u=t("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},": ",-1),g=t("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," ID: ",-1),b={class:"text-lg font-semibold text-gray-800"},y={class:"flex flex-row items-center"},v=t("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},": ",-1),w=t("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," SCHOOL:  ",-1),p={class:"text-lg font-semibold text-gray-800"},D={class:"flex flex-row items-center"},E=t("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},": ",-1),S=t("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," COURSE and YEAR: ",-1),A={class:"text-lg font-semibold text-gray-800"},j={class:"flex flex-row justify-between gap-36 max-sm:gap-0"},I={class:"justify-between max-sm:flex max-sm:flex-col"},O={class:"flex flex-row items-center"},R=t("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},": ",-1),T=t("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," DATE OF BIRTH: ",-1),B={class:"text-lg font-semibold text-gray-800"},C={class:"flex flex-row items-center"},Y=t("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},": ",-1),M=t("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," AGE: ",-1),k={class:"text-lg font-semibold text-gray-800"},L={class:"flex flex-row items-center"},N=t("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},": ",-1),U=t("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," SEX: ",-1),z={class:"text-lg font-semibold text-gray-800 capitalize"},H={class:"flex flex-row items-center"},V=t("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},": ",-1),F=t("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," CIVIL STATUS:  ",-1),G={class:"text-lg font-semibold text-gray-800 capitalize"},X={class:"max-sm:flex max-sm:flex-col"},q={class:"flex flex-row items-center"},J=t("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},": ",-1),K=t("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," ADDRESS: ",-1),P={class:"text-lg font-semibold text-gray-800"},Q={class:"max-sm:flex max-sm:flex-col max-sm:justify-between"},W={class:"flex flex-row items-center"},Z=t("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},": ",-1),$=t("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," CONTACT NUMBER: ",-1),tt={class:"text-lg font-semibold text-gray-800"},et={class:"flex flex-row items-center"},st=t("p",{class:"text-base font-medium text-left text-gray-600 md:hidden"},": ",-1),dt=t("p",{class:"text-base font-medium text-left text-gray-600 max-sm:hidden"}," E-MAIL ADDRESS: ",-1),ot={class:"text-lg font-semibold text-gray-800"},lt={__name:"Index",props:{student:{type:Object,default:()=>({})}},setup(e){const o=d=>d?a(d).format("DD-MM-YYYY"):"";return(d,at)=>(i(),x("div",l,[t("div",n,[t("div",m,[t("div",c,[t("div",null,[t("h1",f,s(e.student.last_name)+", ",1),t("h1",_,s(e.student.first_name)+", "+s(e.student.middle_name),1),t("div",h,[t("div",r,[u,g,t("h2",b,s(e.student.id_number),1)]),t("div",y,[v,w,t("h2",p,s(e.student.school),1)]),t("div",D,[E,S,t("h2",A,s(e.student.course)+"-"+s(e.student.year),1)])])]),t("div",j,[t("div",I,[t("div",O,[R,T,t("h2",B,s(o(e.student.birth_date)),1)]),t("div",C,[Y,M,t("h2",k,s(e.student.age),1)]),t("div",L,[N,U,t("h2",z,s(e.student.sex),1)]),t("div",H,[V,F,t("h2",G,s(e.student.civil_status),1)])]),t("div",X,[t("div",q,[J,K,t("h2",P,s(e.student.address),1)]),t("div",Q,[t("div",W,[Z,$,t("h2",tt,s(e.student.contact_number),1)]),t("div",et,[st,dt,t("h2",ot,s(e.student.id_number)+"@slu.edu.ph",1)])])])])])])])]))}};export{lt as default};