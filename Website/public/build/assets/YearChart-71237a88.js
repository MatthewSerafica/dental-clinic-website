import{C as d}from"./auto-5842a5d9.js";import{j as l,o as n,a as i}from"./app-b4ce430c.js";const p={id:"yearly-report-chart"},u={__name:"YearChart",props:{yearlyData:Object},setup(s){const r=s;return l(()=>{let a;const t=document.getElementById("yearly-report-chart");new d(t,{data:{labels:Object.keys(r.yearlyData),datasets:[{type:"bar",label:"Patients Accomodated",data:Object.values(r.yearlyData),backgroundColor:"#1B59F8",borderColor:"#1B59F8",borderWidth:1,borderRadius:50,spanGaps:!0,borderSkipped:"middle",barThickness:20,hoverBackgroundColor:"#377DFF",hoverBorderColor:"#377DFF"}]},options:{animation:{onComplete:()=>{a=!0},delay:e=>{let o=0;return e.type==="data"&&e.mode==="default"&&!a&&(o=e.dataIndex*300+e.datasetIndex*100),o}},plugins:{legend:!1,decimation:!0},responsive:!0,maintainAspectRatio:!1,scales:{y:{beginAtZero:!0,precision:0,grid:{display:!1}},x:{grid:{display:!1}}}}})}),(a,t)=>(n(),i("canvas",p))}};export{u as default};
