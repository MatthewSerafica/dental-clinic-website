import{S as o}from"./SLULogo-6952a995.js";import{i as s,d as e,f as i,g as n,t,u as r,D as c,o as d}from"./app-cdbf4484.js";import"./_plugin-vue_export-helper-c27b6911.js";const m={class:"flex flex-col items-center scale-[0.9]"},u={class:"flex items-center ml-[-50px]"},h=e("div",null,[e("h2",{class:"text-lg font-medium text-gray-500 title-font"},"Saint Louis University"),e("h2",{class:"px-8 text-lg font-medium text-gray-500 title-font"},"Dental Clinic")],-1),b=e("div",{class:"relative top-[10px] flex flex-col gap-10 items-center"},[e("div",{class:"mb-[-7em]"},[e("h2",{class:"text-lg font-medium text-black title-font"},"DENTAL CERTIFICATE")])],-1),p=e("br",null,null,-1),x=e("br",null,null,-1),f={class:"text-left"},v={class:"text-lg font-medium text-black title-font"},_={class:"underline"},y=e("br",null,null,-1),g={class:"font-medium underline"},k=c('<br><div class="grid w-full grid-cols-2 sm:grid-cols-2"><div><input type="checkbox" id="employment" name="employment" value="Employment"><label for="employment"> Employment</label><br><input type="checkbox" id="consultation" name="consultation" value="Consultation"><label for="consultation"> Consultation</label><br><input type="checkbox" id="enrolment" name="enrolment" value="Enrolment"><label for="enrolment"> Enrolment</label><br></div><div><input type="checkbox" id="excuseSlip" name="excuseSlip" value="Excuse Slip"><label for="excuseSlip"> Excuse Slip</label><br><input type="checkbox" id="annualCheckup" name="annualCheckup" value="Annual Check-up"><label for="annualCheckup"> Annual Check-up</label><br><input type="checkbox" id="others" name="others" value="Others"><label for="others"> Others: </label><input type="text" id="othersText" name="othersText" placeholder=""></div></div><div class="text-left ml-5 mt-[2em]"><h2 class="text-lg font-medium text-black title-font">REMARKS AND RECOMMENDATIONS:</h2></div><div class="mt-6 ml-2 text-left"><textarea class="w-[50rem] mt-1 break-all border rounded-md p- focus:outline-none focus:ring-0 h-40 text-balance resize-none border-transparent" placeholder="Enter remarks and recommendations here"></textarea></div><br><div class="float-left ml-5 mt-[2em] relative"><div class="border-b-[black] border-b border-solid w-[11em]"></div><h1 class="text-[large] font-medium">University Dentist</h1></div><br>',7),A={__name:"PrintCertificate",props:{student:Object},setup(l){const a=new Date().toLocaleDateString("en-US",{year:"numeric",month:"long",day:"numeric"});return(S,D)=>(d(),s("div",m,[e("div",u,[i(o,{class:"w-12 h-12 mr-3"}),h]),b,p,x,e("div",f,[e("h2",v,[n("Date: "),e("label",_,t(r(a)),1)]),y,e("p",null,[n("This is to certify that "),e("label",g,t(l.student.first_name)+" "+t(l.student.middle_name)+" "+t(l.student.last_name),1),n(" had undergone dental examination as a requirement for the purpose stated below: ")]),k])]))}};export{A as default};