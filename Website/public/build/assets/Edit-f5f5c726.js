import{T as b,p as f,i as g,f as c,w as l,u as s,e as x,o as v,d as e,m as n,v as d,q as y}from"./app-cdbf4484.js";import{s as h}from"./flowbite-vue-62d8acb5.js";const k=["onSubmit"],w=e("div",{class:"flex items-center px-4 text-lg"}," Edit Employee's Treatment Record ",-1),V={class:"p-4"},C={class:"grid grid-cols-3 sm:grid-cols-3"},q={class:"mb-4"},U=e("label",{for:"date",class:"block font-semibold"},"Date",-1),S={class:"mb-4"},E=e("label",{for:"time_in",class:"block font-semibold"},"Time In",-1),T={class:"mb-4"},M=e("label",{for:"time_out",class:"block font-semibold"},"Time Out",-1),B={class:"grid grid-cols-1 left-10 gap-y-4"},D={class:"mb-4"},O=e("label",{for:"service_rendered",class:"block font-semibold"},"Service Rendered",-1),R=e("option",{disabled:""},"Please select one",-1),j=e("option",null,"Consultation",-1),z=e("option",null,"Extraction",-1),N=e("option",null,"Annual Check-up",-1),P=e("option",null,"Emergency Cases",-1),A=e("option",null,"Others",-1),F=[R,j,z,N,P,A],I={class:"grid grid-cols-2 sm:grid-cols-2"},G={class:"mb-4"},H=e("label",{for:"clinical_findings",class:"block font-semibold"},"Clinical Findings",-1),J={class:"mb-4"},K=e("label",{for:"diagnosis",class:"block font-semibold"},"Diagnosis",-1),L={class:"mb-4"},Q=e("label",{for:"prescription",class:"block font-semibold"},"Prescription",-1),W={class:"mb-4"},X=e("label",{for:"remarks",class:"block font-semibold"},"Remarks",-1),Y=e("button",{type:"submit",as:"button",class:"text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-3 mb-3"}," Save Changes ",-1),te={__name:"Edit",props:{treatment:{type:Object,default:()=>({})}},setup(m,{emit:u}){const r=m,a=()=>{u("close")},t=b({date:r.treatment.date,time_in:r.treatment.time_in,time_out:r.treatment.time_out,service_rendered:r.treatment.service_rendered,clinical_findings:r.treatment.clinical_findings,diagnosis:r.treatment.diagnosis,prescription:r.treatment.prescription,remarks:r.treatment.remarks}),p=()=>t.put(route("admin.employee.treatment.update",r.treatment.record_id),{preserveScroll:!1,preserveState:!1});return(Z,o)=>{const _=f("textareat");return v(),g("form",{onSubmit:x(p,["prevent"])},[c(s(h),{size:"3xl",onClose:a},{header:l(()=>[w]),body:l(()=>[e("div",V,[e("div",C,[e("div",q,[U,n(e("input",{id:"date","onUpdate:modelValue":o[0]||(o[0]=i=>s(t).date=i),type:"date",class:"w-[10rem] px-3 py-2 border rounded",required:""},null,512),[[d,s(t).date]])]),e("div",S,[E,n(e("input",{id:"time_in","onUpdate:modelValue":o[1]||(o[1]=i=>s(t).time_in=i),type:"time",step:"60",class:"w-[10rem] px-3 py-2 border rounded",required:""},null,512),[[d,s(t).time_in]])]),e("div",T,[M,n(e("input",{id:"time_out","onUpdate:modelValue":o[2]||(o[2]=i=>s(t).time_out=i),type:"time",step:"60",class:"w-[10rem] px-3 py-2 border rounded",required:""},null,512),[[d,s(t).time_out]])])]),e("div",B,[e("div",D,[O,n(e("select",{class:"w-[12.9rem] px-3 py-2 border rounded","onUpdate:modelValue":o[3]||(o[3]=i=>s(t).service_rendered=i),required:""},F,512),[[y,s(t).service_rendered]])])]),e("div",I,[e("div",G,[H,n(e("textarea",{id:"clinical_findings","onUpdate:modelValue":o[4]||(o[4]=i=>s(t).clinical_findings=i),type:"text",class:"w-[17rem] px-3 py-2 border rounded",required:""},null,512),[[d,s(t).clinical_findings]])]),e("div",J,[K,n(e("textarea",{id:"diagnosis","onUpdate:modelValue":o[5]||(o[5]=i=>s(t).diagnosis=i),type:"text",class:"w-[17rem] px-3 py-2 border rounded",required:""},null,512),[[d,s(t).diagnosis]])]),e("div",L,[Q,n(e("textarea",{id:"prescription","onUpdate:modelValue":o[6]||(o[6]=i=>s(t).prescription=i),type:"text",class:"w-[17rem] px-3 py-2 border rounded",required:""},null,512),[[d,s(t).prescription]])]),e("div",W,[X,c(_,{id:"remarks",modelValue:s(t).remarks,"onUpdate:modelValue":o[7]||(o[7]=i=>s(t).remarks=i),type:"text",class:"w-[17rem] px-3 py-2 border rounded",required:""},null,8,["modelValue"])])])])]),footer:l(()=>[e("div",{class:"flex justify-center"},[e("button",{onClick:a,as:"button",class:"text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-3 mb-3"}," Cancel "),Y])]),_:1})],40,k)}}};export{te as default};
