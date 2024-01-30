import{T as _,i as l,f,w as n,u as o,e as g,o as a,d as e,m as i,v as d,q as v,F as x,j as y,t as k}from"./app-cdbf4484.js";import{s as h}from"./flowbite-vue-62d8acb5.js";const w=["onSubmit"],V=e("div",{class:"flex items-center px-4 text-lg"}," Add New Treatment Record ",-1),q={class:"p-4"},S={class:"grid grid-cols-3 sm:grid-cols-3"},U={class:"mb-4"},C=e("label",{for:"date",class:"block font-semibold"},"Date",-1),T={class:"mb-4"},j=e("label",{for:"time_in",class:"block font-semibold"},"Time In",-1),D={class:"mb-4"},O=e("label",{for:"time_out",class:"block font-semibold"},"Time Out",-1),R={class:"grid grid-cols-1 left-10 gap-y-4"},M={class:"mb-4"},B=e("label",{for:"service_rendered",class:"block font-semibold"},"Service Rendered",-1),F=e("option",{disabled:""},"Please select one",-1),N=["value"],z={class:"grid grid-cols-2 sm:grid-cols-2"},A={class:"mb-4"},I=e("label",{for:"clinical_findings",class:"block font-semibold"},"Clinical Findings",-1),P={class:"mb-4"},E=e("label",{for:"diagnosis",class:"block font-semibold"},"Diagnosis",-1),L={class:"mb-4"},G=e("label",{for:"prescription",class:"block font-semibold"},"Prescription",-1),H={class:"mb-4"},J=e("label",{for:"remarks",class:"block font-semibold"},"Remarks",-1),K=e("button",{type:"submit",as:"button",class:"text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-3 mb-3"}," Add Record ",-1),Y={__name:"Create",props:{treatment:{type:Object,default:()=>({})},student:{type:Object},services:{type:Object}},setup(c,{emit:p}){const u=c,m=()=>{p("close")},s=_({date:new Date().toISOString().split("T")[0],time_in:u.student.user.time_in,service_rendered:null,clinical_findings:null,diagnosis:null,prescription:null,remarks:null,time_out:null}),b=()=>s.post(route("student.treatment.store",u.student.id_number),{preserveScroll:!1,preserveState:!1});return(Q,r)=>(a(),l("form",{onSubmit:g(b,["prevent"])},[f(o(h),{size:"3xl",onClose:m},{header:n(()=>[V]),body:n(()=>[e("div",q,[e("div",S,[e("div",U,[C,i(e("input",{id:"date","onUpdate:modelValue":r[0]||(r[0]=t=>o(s).date=t),type:"date",class:"w-[10rem] px-3 py-2 border rounded",required:""},null,512),[[d,o(s).date]])]),e("div",T,[j,i(e("input",{id:"time_in","onUpdate:modelValue":r[1]||(r[1]=t=>o(s).time_in=t),type:"time",step:"60",class:"w-[10rem] px-3 py-2 border rounded",required:""},null,512),[[d,o(s).time_in]])]),e("div",D,[O,i(e("input",{id:"time_out","onUpdate:modelValue":r[2]||(r[2]=t=>o(s).time_out=t),type:"time",step:"60",class:"w-[10rem] px-3 py-2 border rounded",required:""},null,512),[[d,o(s).time_out]])])]),e("div",R,[e("div",M,[B,i(e("select",{class:"w-[12.9rem] px-3 py-2 border rounded","onUpdate:modelValue":r[3]||(r[3]=t=>o(s).service_rendered=t),required:""},[F,(a(!0),l(x,null,y(c.services,t=>(a(),l("option",{value:t.services},k(t.services),9,N))),256))],512),[[v,o(s).service_rendered]])])]),e("div",z,[e("div",A,[I,i(e("textarea",{id:"clinical_findings","onUpdate:modelValue":r[4]||(r[4]=t=>o(s).clinical_findings=t),type:"text",class:"w-[17rem] px-3 py-2 border rounded",required:""},null,512),[[d,o(s).clinical_findings]])]),e("div",P,[E,i(e("textarea",{id:"diagnosis","onUpdate:modelValue":r[5]||(r[5]=t=>o(s).diagnosis=t),type:"text",class:"w-[17rem] px-3 py-2 border rounded",required:""},null,512),[[d,o(s).diagnosis]])]),e("div",L,[G,i(e("textarea",{id:"prescription","onUpdate:modelValue":r[6]||(r[6]=t=>o(s).prescription=t),type:"text",class:"w-[17rem] px-3 py-2 border rounded",required:""},null,512),[[d,o(s).prescription]])]),e("div",H,[J,i(e("textarea",{id:"remarks","onUpdate:modelValue":r[7]||(r[7]=t=>o(s).remarks=t),type:"text",class:"w-[17rem] px-3 py-2 border rounded",required:""},null,512),[[d,o(s).remarks]])])])])]),footer:n(()=>[e("div",{class:"flex justify-center"},[e("button",{onClick:m,type:"button",class:"text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-3 mb-3"}," Cancel "),K])]),_:1})],40,w))}};export{Y as default};