  (function(){
  if(window.addEventListener){
    window.addEventListener('load',run,false);
  }else if(window.attachEvent){
    window.attachEvent('onload',run);
  }
function run(){
  var t=document.getElementById('datatable');
  t.onclick=function(event){
    event=event || window.event;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;
    
    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtUpdCurrId');
    var f2=document.getElementById('txtUpdCurr');
    var f3=document.getElementById('selUpdActive');
    var f4=document.getElementById('txtDelCurrId');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
    f3.value=cells[2].innerHTML;
    f4.value=cells[0].innerHTML;
  };
}})();
(function(){
  if(window.addEventListener){
    window.addEventListener('load',run,false);
  }else if(window.attachEvent){
    window.attachEvent('onload',run);
  }
function run(){
  var t=document.getElementById('datatable1');
  t.onclick=function(event){
    event=event || window.event;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;
    
    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtUpdDetCurrId');
    var f2=document.getElementById('txtUpdDetId');
    var f3=document.getElementById('txtUpdDetDivId');
    var f4=document.getElementById('txtUpdDetLvlId');
    var f5=document.getElementById('selUpdDetDiv');
    var f6=document.getElementById('selUpdDetLvl');
    var f7=document.getElementById('selUpdDetSubj');
    var f8=document.getElementById('txtUpdDetSubj');
    var f9=document.getElementById('txtDelDetId');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
    f3.value=cells[2].innerHTML;
    f4.value=cells[3].innerHTML;
    f5.value=cells[4].innerHTML;
    f6.value=cells[5].innerHTML;
    f7.value=cells[6].innerHTML;
    f8.value=cells[7].innerHTML;
    f9.value=cells[1].innerHTML;
  };
}})();

  (function(){
  if(window.addEventListener){
    window.addEventListener('load',run,false);
  }else if(window.attachEvent){
    window.attachEvent('onload',run);
  }
function run(){
  var t=document.getElementById('datatable2');
  t.onclick=function(event){
    event=event || window.event;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;
    
    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtUpdDivId');
    var f2=document.getElementById('txtUpdDiv');
    var f3=document.getElementById('selUpdDivAct');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
    f3.value=cells[2].innerHTML;
  };
}})();
(function(){
  if(window.addEventListener){
    window.addEventListener('load',run,false);
  }else if(window.attachEvent){
    window.attachEvent('onload',run);
  }
function run(){
  var t=document.getElementById('datatable3');
  t.onclick=function(event){
    event=event || window.event;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;
    
    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtUpdLvlId');
    var f2=document.getElementById('txtUpdLvl');
    var f3=document.getElementById('selUpdLvlDiv');
    var f4=document.getElementById('selUpdLvlAct');
    var f5=document.getElementById('txtDelLvlId');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
    f3.value=cells[2].innerHTML;
    f4.value=cells[3].innerHTML;
    f5.value=cells[0].innerHTML;
  };
}})();
  (function(){
  if(window.addEventListener){
    window.addEventListener('load',run,false);
  }else if(window.attachEvent){
    window.attachEvent('onload',run);
  }
function run(){
  var t=document.getElementById('datatable4');
  t.onclick=function(event){
    event=event || window.event;
    document.getElementById("txtUpdSubjId2").disabled=true;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;
    
    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtUpdSubjId');
    var f2=document.getElementById('txtUpdSubjId2');
    var f3=document.getElementById('txtUpdSubj');
    var f4=document.getElementById('selUpdSubjAct');
    var f5=document.getElementById('txtDelSubjId');
    f1.value=cells[0].innerHTML;
    f2.value=cells[0].innerHTML;
    f3.value=cells[1].innerHTML;
    f4.value=cells[2].innerHTML;
    f5.value=cells[0].innerHTML;
  };
}})();

$(document).ready(function(){
  $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
    localStorage.setItem('activeTab', $(e.target).attr('href'));
  });
  var activeTab = localStorage.getItem('activeTab');
  if(activeTab){
    $('#myTab a[href="' + activeTab + '"]').tab('show');
  }
});