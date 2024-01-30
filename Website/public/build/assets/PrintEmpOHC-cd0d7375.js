import{T as c,i as u,d as e,e as g,m as a,C as i,u as r,o as b}from"./app-cdbf4484.js";const h={class:"relative"},_=e("div",{class:"relative flex items-center w-85 left-6"},[e("h1",{class:"text-2xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl"},"ORAL HEALTH CONDITION")],-1),f={class:"flex items-center"},m=["onSubmit"],k={class:"relative top-2 left-7"},p={class:"flex"},y=e("h1",null," Presence of Debris: ",-1),x={class:"flex relative left-[108px]"},v={class:"flex items-center gap-2 mr-4"},w=["checked"],U=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"0 (None)",-1),V=["checked"],N=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"1 (Trace)",-1),P=["checked"],S=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"2 (Slight)",-1),T=["checked"],H=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"3 (Moderate)",-1),O=["checked"],M=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"4 (Heavy)",-1),C={class:"flex"},D=e("h1",null," Presence of Calcular Deposits: ",-1),B={class:"flex relative left-[2rem]"},E={class:"flex items-center gap-2 mr-4"},A=["checked"],I=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"0 (None)",-1),L=["checked"],R=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"1 (Trace)",-1),Y=["checked"],j=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"2 (Slight)",-1),F=["checked"],G=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"3 (Moderate)",-1),q=["checked"],z=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"4 (Heavy)",-1),J={class:"flex"},K=e("h1",null," Presence of Gingivitis: ",-1),Q={class:"flex relative left-[89px]"},W={class:"flex items-center gap-2 mr-4"},X=["checked"],Z=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"0 (None)",-1),$=["checked"],ee=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"1 (Trace)",-1),te=["checked"],re=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"2 (Slight)",-1),oe=["checked"],se=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"3 (Moderate)",-1),ae=["checked"],ie=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"4 (Heavy)",-1),de={class:"flex"},le=e("h1",null," Presence of Periodontal Pocket/s: ",-1),ne={class:"flex relative left-[0.5rem]"},ce={class:"flex items-center gap-2 mr-4"},ue=["checked"],ge=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"No",-1),be=["checked"],he=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"Yes",-1),_e={class:"flex"},fe=e("h1",null," Under Orthodontic Treatment: ",-1),me={class:"flex relative left-[1.9rem]"},ke={class:"flex items-center gap-2 mr-4"},pe=["checked"],ye=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"No",-1),xe=["checked"],ve=e("label",{class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},"Yes",-1),we=e("div",{class:"pt-4"},null,-1),Ne={__name:"PrintEmpOHC",props:{exam:{type:Object,default:()=>({})}},setup(l){const d=l,t=c({debris_tooth_stain:d.exam.debris_tooth_stain,calcular_deposits:d.exam.calcular_deposits,gingivitis:d.exam.gingivitis,periodontal_pocket:d.exam.periodontal_pocket,orthodontic_treatment:d.exam.orthodontic_treatment}),n=()=>{t.put(route("ohc.update",d.exam.exam_id),{preserveScroll:!1,preserveState:!1})};return(Ue,o)=>(b(),u("div",h,[_,e("div",f,[e("form",{onSubmit:g(n,["prevent"])},[e("div",k,[e("div",p,[y,e("div",x,[e("div",v,[a(e("input",{"onUpdate:modelValue":o[0]||(o[0]=s=>r(t).debris_tooth_stain=s),type:"radio",value:"none",checked:r(t).debris_tooth_stain=="none",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,w),[[i,r(t).debris_tooth_stain]]),U,a(e("input",{"onUpdate:modelValue":o[1]||(o[1]=s=>r(t).debris_tooth_stain=s),type:"radio",value:"trace",checked:r(t).debris_tooth_stain=="trace",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,V),[[i,r(t).debris_tooth_stain]]),N,a(e("input",{"onUpdate:modelValue":o[2]||(o[2]=s=>r(t).debris_tooth_stain=s),type:"radio",value:"slight",checked:r(t).debris_tooth_stain=="slight",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,P),[[i,r(t).debris_tooth_stain]]),S,a(e("input",{"onUpdate:modelValue":o[3]||(o[3]=s=>r(t).debris_tooth_stain=s),type:"radio",value:"moderate",checked:r(t).debris_tooth_stain=="moderate",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,T),[[i,r(t).debris_tooth_stain]]),H,a(e("input",{"onUpdate:modelValue":o[4]||(o[4]=s=>r(t).debris_tooth_stain=s),type:"radio",value:"heavy",checked:r(t).debris_tooth_stain=="heavy",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,O),[[i,r(t).debris_tooth_stain]]),M])])]),e("div",C,[D,e("div",B,[e("div",E,[a(e("input",{"onUpdate:modelValue":o[5]||(o[5]=s=>r(t).calcular_deposits=s),type:"radio",value:"none",checked:r(t).calcular_deposits=="none",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,A),[[i,r(t).calcular_deposits]]),I,a(e("input",{"onUpdate:modelValue":o[6]||(o[6]=s=>r(t).calcular_deposits=s),type:"radio",value:"trace",checked:r(t).calcular_deposits=="trace",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,L),[[i,r(t).calcular_deposits]]),R,a(e("input",{"onUpdate:modelValue":o[7]||(o[7]=s=>r(t).calcular_deposits=s),type:"radio",value:"slight",checked:r(t).calcular_deposits=="slight",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,Y),[[i,r(t).calcular_deposits]]),j,a(e("input",{"onUpdate:modelValue":o[8]||(o[8]=s=>r(t).calcular_deposits=s),type:"radio",value:"moderate",checked:r(t).calcular_deposits=="moderate",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,F),[[i,r(t).calcular_deposits]]),G,a(e("input",{"onUpdate:modelValue":o[9]||(o[9]=s=>r(t).calcular_deposits=s),type:"radio",value:"heavy",checked:r(t).calcular_deposits=="heavy",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,q),[[i,r(t).calcular_deposits]]),z])])]),e("div",J,[K,e("div",Q,[e("div",W,[a(e("input",{"onUpdate:modelValue":o[10]||(o[10]=s=>r(t).gingivitis=s),type:"radio",value:"none",checked:r(t).gingivitis=="none",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,X),[[i,r(t).gingivitis]]),Z,a(e("input",{"onUpdate:modelValue":o[11]||(o[11]=s=>r(t).gingivitis=s),type:"radio",value:"trace",checked:r(t).gingivitis=="trace",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,$),[[i,r(t).gingivitis]]),ee,a(e("input",{"onUpdate:modelValue":o[12]||(o[12]=s=>r(t).gingivitis=s),type:"radio",value:"slight",checked:r(t).gingivitis=="slight",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,te),[[i,r(t).gingivitis]]),re,a(e("input",{"onUpdate:modelValue":o[13]||(o[13]=s=>r(t).gingivitis=s),type:"radio",value:"moderate",checked:r(t).gingivitis=="moderate",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,oe),[[i,r(t).gingivitis]]),se,a(e("input",{"onUpdate:modelValue":o[14]||(o[14]=s=>r(t).gingivitis=s),type:"radio",value:"heavy",checked:r(t).gingivitis=="heavy",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,ae),[[i,r(t).gingivitis]]),ie])])]),e("div",de,[le,e("div",ne,[e("div",ce,[a(e("input",{"onUpdate:modelValue":o[15]||(o[15]=s=>r(t).periodontal_pocket=s),type:"radio",value:"0",checked:r(t).periodontal_pocket==0,class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,ue),[[i,r(t).periodontal_pocket]]),ge,a(e("input",{"onUpdate:modelValue":o[16]||(o[16]=s=>r(t).periodontal_pocket=s),type:"radio",value:"1",checked:r(t).periodontal_pocket==1,class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,be),[[i,r(t).periodontal_pocket]]),he])])]),e("div",_e,[fe,e("div",me,[e("div",ke,[a(e("input",{"onUpdate:modelValue":o[17]||(o[17]=s=>r(t).orthodontic_treatment=s),type:"radio",value:"0",checked:r(t).orthodontic_treatment==0,class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,pe),[[i,r(t).orthodontic_treatment]]),ye,a(e("input",{"onUpdate:modelValue":o[18]||(o[18]=s=>r(t).orthodontic_treatment=s),type:"radio",value:"1",checked:r(t).orthodontic_treatment==1,class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600"},null,8,xe),[[i,r(t).orthodontic_treatment]]),ve])])]),we])],40,m)])]))}};export{Ne as default};
