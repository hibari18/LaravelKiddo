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
        var t=document.getElementById('tblReq');
        t.onclick=function(event){
          event=event || window.event;
          var target=event.target||event.srcElement;
          while (target&&target.nodeName!='TR'){
            target=target.parentElement;
          }
          var cells=target.cells;

          if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
          var f1=document.getElementById('txtUpdReqId');
          var f2=document.getElementById('txtUpdReqName');
          var f3=document.getElementById('txtUpdReqDesc');
          var f4=document.getElementById('txtDelReqId');
          f1.value=cells[0].innerHTML;
          f2.value=cells[1].innerHTML;
          f3.value=cells[2].innerHTML;
          f4.value=cells[0].innerHTML;
        };
  }})();
    </script>
   
    @include('requirement.requirement')
 
@endsection