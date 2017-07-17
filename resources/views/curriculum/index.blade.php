@extends('master')

@section('content')
<script>
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
</script>
<!-- Main content -->
    <section class="content" style="margin-top: 3%">
    <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
        <div class="box-body">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#tab_1" data-toggle="tab">Curriculum</a></li>
              <li><a href="#tab_2" data-toggle="tab">Subject</a></li>
              <li><a href="#tab_3" data-toggle="tab">Division</a></li>
              <li><a href="#tab_4" data-toggle="tab">Level</a></li>
              <li><a href="#tab_5" data-toggle="tab">Curriculum Details</a></li>
            </ul>
            <div class="tab-content">
          

          <div class="tab-pane fade in active" id="tab_1">
            @include('curriculum.curriculum')
          </div>
          <!-- /.tab-pane -->
              


          <div class="tab-pane fade" id="tab_2">
            @include('curriculum.subject')
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane fade" id="tab_3">
            @include('curriculum.division')
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane fade" id="tab_4">
            @include('curriculum.level')
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane fade" id="tab_5">
            @include('curriculum.curriculumdetails')
          </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
          </div>
          <!-- box body -->
         </div>
         <!-- box box-default -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- row -->  
    </section>
    <!-- /.content -->

    <script>
      function showDetail()
  {
    document.getElementById("btnAdd").disabled=false;
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","changeTblCurrDetail.php?selCurrName="+document.getElementById("selCurrName").value,false);
    xmlhttp.send(null);
    
    document.getElementById("datatable1").innerHTML=xmlhttp.responseText;
    var currId = document.getElementById("selCurrName").value;
    document.getElementById("txtAddDetCurr").value = currId
  }
function changeDiv()
  {
    document.getElementById('selAddDetLvl').disabled = false;
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","changeDivCurriculumDetail.php?selAddDetDiv="+document.getElementById("selAddDetDiv").value,false);
    xmlhttp.send(null);
    
    document.getElementById("selAddDetLvl").innerHTML=xmlhttp.responseText;

  }
  function changeUpdDiv()
  {
    document.getElementById('selUpdDetLvl').disabled = false;
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","changeDivUpdDetail.php?selUpdDetDiv="+document.getElementById("selUpdDetDiv").value,false);
    xmlhttp.send(null);
    
    document.getElementById("selUpdDetLvl").innerHTML=xmlhttp.responseText;

  }
function passSubjName()
  {
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","passSubjName.php?selAddDetSubj="+document.getElementById("selAddDetSubj").value,false);
    xmlhttp.send(null);
    
    document.getElementById("txtAddDetSubj").value=xmlhttp.responseText;

  }
function passSubjNameUpd()
  {
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","passSubjNameUpdDetail.php?selUpdDetSubj="+document.getElementById("selUpdDetSubj").value,false);
    xmlhttp.send(null);
    
    document.getElementById("txtUpdDetSubj").value=xmlhttp.responseText;

  }
    </script>
@endsection