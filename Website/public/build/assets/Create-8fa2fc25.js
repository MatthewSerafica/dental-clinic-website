import{T as f,o as i,a as d,e as y,w as u,u as t,l as v,b as e,m as n,v as c,t as l,d as a,n as x}from"./app-b4ce430c.js";import{s as h}from"./flowbite-vue-bbcb8c87.js";const k=["onSubmit"],w=e("div",{class:"flex items-center px-4 text-lg"}," Add New Treatment Record ",-1),V={class:"p-4"},C={class:"grid grid-cols-3 sm:grid-cols-3"},U={class:"mb-4"},S=e("label",{for:"date",class:"block font-semibold"},"Date",-1),R={key:0,class:"text-red-600"},T={class:"mb-4"},D=e("label",{for:"time_in",class:"block font-semibold"},"Time In",-1),M={key:0,class:"text-red-600"},N={class:"mb-4"},O=e("label",{for:"time_out",class:"block font-semibold"},"Time Out",-1),j={key:0,class:"text-red-600"},A={class:"grid grid-cols-1 left-10 gap-y-4"},B={class:"mb-4"},E=e("label",{for:"service_rendered",class:"block font-semibold"},"Service Rendered",-1),z=e("option",{disabled:""},"Please select one",-1),P=e("option",null,"Consultation",-1),F=e("option",null,"Extraction",-1),I=e("option",null,"Annual",-1),q=e("option",null,"Emergency Cases",-1),G=e("option",null,"Others",-1),H=[z,P,F,I,q,G],J={key:0,class:"text-red-600"},K={class:"grid grid-cols-2 sm:grid-cols-2"},L={class:"mb-4"},Q=e("label",{for:"clinical_findings",class:"block font-semibold"},"Clinical Findings",-1),W={key:0,class:"text-red-600"},X={class:"mb-4"},Y=e("label",{for:"diagnosis",class:"block font-semibold"},"Diagnosis",-1),Z={key:0,class:"text-red-600"},$={class:"mb-4"},ee=e("label",{for:"prescription",class:"block font-semibold"},"Prescription",-1),se={key:0,class:"text-red-600"},te={class:"mb-4"},oe=e("label",{for:"remarks",class:"block font-semibold"},"Remarks",-1),re={key:0,class:"text-red-600"},ie=e("button",{type:"submit",as:"button",class:"text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-3 mb-3"}," Add Record ",-1),ae={__name:"Create",props:{treatment:{type:Object,default:()=>({})},employee:{type:Object}},setup(_,{emit:m}){const p=_,b=()=>{m("close")},s=f({date:null,time_in:null,service_rendered:null,clinical_findings:null,diagnosis:null,prescription:null,remarks:null,time_out:null}),g=()=>s.post(route("employee.treatment.store",p.employee.id_number),{preserveScroll:!1,preserveState:!1});return(de,o)=>(i(),d("form",{onSubmit:v(g,["prevent"])},[y(t(h),{size:"3xl"},{header:u(()=>[w]),body:u(()=>[e("div",V,[e("div",C,[e("div",U,[S,n(e("input",{id:"date","onUpdate:modelValue":o[0]||(o[0]=r=>t(s).date=r),type:"date",class:"w-[10rem] px-3 py-2 border rounded"},null,512),[[c,t(s).date]]),t(s).errors.date?(i(),d("div",R,l(t(s).errors.date),1)):a("",!0)]),e("div",T,[D,n(e("input",{id:"time_in","onUpdate:modelValue":o[1]||(o[1]=r=>t(s).time_in=r),type:"time",step:"60",class:"w-[10rem] px-3 py-2 border rounded"},null,512),[[c,t(s).time_in]]),t(s).errors.time_in?(i(),d("div",M,l(t(s).errors.time_in),1)):a("",!0)]),e("div",N,[O,n(e("input",{id:"time_out","onUpdate:modelValue":o[2]||(o[2]=r=>t(s).time_out=r),type:"time",step:"60",class:"w-[10rem] px-3 py-2 border rounded"},null,512),[[c,t(s).time_out]]),t(s).errors.time_out?(i(),d("div",j,l(t(s).errors.time_out),1)):a("",!0)])]),e("div",A,[e("div",B,[E,n(e("select",{class:"w-[12.9rem] px-3 py-2 border rounded","onUpdate:modelValue":o[3]||(o[3]=r=>t(s).service_rendered=r)},H,512),[[x,t(s).service_rendered]]),t(s).errors.service_rendered?(i(),d("div",J,l(t(s).errors.service_rendered),1)):a("",!0)])]),e("div",K,[e("div",L,[Q,n(e("input",{id:"clinical_findings","onUpdate:modelValue":o[4]||(o[4]=r=>t(s).clinical_findings=r),type:"text",class:"w-[17rem] px-3 py-2 border rounded"},null,512),[[c,t(s).clinical_findings]]),t(s).errors.clinical_findings?(i(),d("div",W,l(t(s).errors.clinical_findings),1)):a("",!0)]),e("div",X,[Y,n(e("input",{id:"diagnosis","onUpdate:modelValue":o[5]||(o[5]=r=>t(s).diagnosis=r),type:"text",class:"w-[17rem] px-3 py-2 border rounded"},null,512),[[c,t(s).diagnosis]]),t(s).errors.diagnosis?(i(),d("div",Z,l(t(s).errors.diagnosis),1)):a("",!0)]),e("div",$,[ee,n(e("input",{id:"prescription","onUpdate:modelValue":o[6]||(o[6]=r=>t(s).prescription=r),type:"text",class:"w-[17rem] px-3 py-2 border rounded"},null,512),[[c,t(s).prescription]]),t(s).errors.prescription?(i(),d("div",se,l(t(s).errors.prescription),1)):a("",!0)]),e("div",te,[oe,n(e("input",{id:"remarks","onUpdate:modelValue":o[7]||(o[7]=r=>t(s).remarks=r),type:"text",class:"w-[17rem] px-3 py-2 border rounded"},null,512),[[c,t(s).remarks]]),t(s).errors.remarks?(i(),d("div",re,l(t(s).errors.remarks),1)):a("",!0)])])])]),footer:u(()=>[e("div",{class:"flex justify-center"},[e("button",{onClick:b,type:"button",class:"text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-3 mb-3"}," Cancel "),ie])]),_:1})],40,k))}};export{ae as default};
