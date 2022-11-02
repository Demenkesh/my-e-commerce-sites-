/*
 Template Name: Lurid - Material Design Admin & Dashboard Template
 Author: Myra Studio
 File: Dashboard
*/

$(function(){"use strict";$("#morris-line-example").length&&Morris.Line({element:"morris-line-example",gridLineColor:"#eef0f2",lineColors:["#69adf0","#e9ecef"],data:[{y:"2013",a:80,b:100},{y:"2014",a:110,b:130},{y:"2015",a:90,b:110},{y:"2016",a:120,b:140},{y:"2017",a:110,b:125},{y:"2018",a:170,b:190},{y:"2019",a:120,b:140}],xkey:"y",ykeys:["a","b"],hideHover:"auto",resize:!0,labels:["Series A","Series B"]}),$("#morris-bar-example").length&&Morris.Bar({element:"morris-bar-example",barColors:["#3281f2"],data:[{y:"2012",a:90},{y:"2013",a:80},{y:"2014",a:110},{y:"2015",a:90},{y:"2016",a:120},{y:"2017",a:110},{y:"2018",a:170},{y:"2019",a:120}],xkey:"y",ykeys:["a"],hideHover:"auto",gridLineColor:"#eef0f2",resize:!0,barSizeRatio:.2,labels:["iPhone 8"]}),$("#morris-donut-example").length&&Morris.Donut({element:"morris-donut-example",resize:!0,colors:["#e9ecef","#3281f2","#69adf0"],data:[{label:"Samsung Company",value:12},{label:"Apple Company",value:30},{label:"Vivo Mobiles",value:20}]})});
