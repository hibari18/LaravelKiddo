@extends('master')

@section('content')
<script>
      function changeTblFee()
      {
        var lvl = document.getElementById("selFeeLvl").value;
        var xmlhttp =  new XMLHttpRequest();
        xmlhttp.open("GET","changeTblFee.php?selFeeLvl="+document.getElementById("selFeeLvl").value,false);
        xmlhttp.send(null);

        document.getElementById("datatable").innerHTML=xmlhttp.responseText;
      }

      function changeSchedSchemeLvl()
      {
        document.getElementById("selSchedFee").disabled = false;
        var xmlhttp =  new XMLHttpRequest();
        xmlhttp.open("GET","changeSchedSchemeLvl.php?selSchedLvl="+document.getElementById("selSchedLvl").value,false);
        xmlhttp.send(null);
      }

      function changeFee()
      {
      document.getElementById("selSchedScheme").disabled = false;
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open("GET","changeSchedFee.php?selSchedFee="+document.getElementById("selSchedFee").value,false);
      xmlhttp.send(null);

      document.getElementById("selSchedScheme").innerHTML=xmlhttp.responseText;
      }

      function changeTblSchedScheme()
      {
        var xmlhttp =  new XMLHttpRequest();
        xmlhttp.open("GET","changeTblSchedScheme.php?selSchedScheme="+document.getElementById("selSchedScheme").value,false);
        xmlhttp.send(null);

        document.getElementById("datatable2").innerHTML=xmlhttp.responseText;

      }

      function changeTblFeeDetail()
      {
        document.getElementById("btnbtn").disabled=false;
        var feeId2 = document.getElementById("selFee").value;
        document.getElementById("txtUpdDetFeeId").value = feeId2;
        var xmlhttp =  new XMLHttpRequest();
        xmlhttp.open("GET","changeTblFeeDetail.php?selFee="+document.getElementById("selFee").value,false);
        xmlhttp.send(null);

        document.getElementById("datatable4").innerHTML=xmlhttp.responseText;
      }

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
            var f1=document.getElementById('txtUpdFeeId');
            var f2=document.getElementById('txtUpdFee');
            var f3=document.getElementById('txtDelFee');
            f1.value=cells[2].innerHTML;
            f2.value=cells[2].innerHTML;
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
          var t=document.getElementById('datatable1');
          t.onclick=function(event){
            event=event || window.event;
            var target=event.target||event.srcElement;
            while (target&&target.nodeName!='TR'){
              target=target.parentElement;
            }
            var cells=target.cells;

            if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
            var f1=document.getElementById('txtUpdSchemeId');
            var f2=document.getElementById('txtUpdFeeName');
            var f3=document.getElementById('txtUpdScheme');
            var f4=document.getElementById('txtUpdSchemeNo');
            var f5=document.getElementById('txtDelScheme');
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
            var target=event.target||event.srcElement;
            while (target&&target.nodeName!='TR'){
              target=target.parentElement;
            }
            var cells=target.cells;

            if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
            var f1=document.getElementById('txtUpdDetLvl');
            var f2=document.getElementById('txtUpdDetName');
            var f3=document.getElementById('txtUpdDetAmnt');
            var f4=document.getElementById('txtUpdDetLvlId');
            var f5=document.getElementById('txtTempDetName');
            var f6=document.getElementById('txtDelFeeDet');
            var f7=document.getElementById('txtDelAmnt');
            f1.value=cells[1].innerHTML;
            f2.value=cells[2].innerHTML;
            f3.value=cells[3].innerHTML;
            f4.value=cells[0].innerHTML;
            f5.value=cells[2].innerHTML;
            f6.value=cells[2].innerHTML;
            f7.value=cells[3].innerHTML;
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
            var f1=document.getElementById('txtDetId');
            var f2=document.getElementById('txtDetNo');
            var f3=document.getElementById('txtDetDueDate');
            var f4=document.getElementById('txtDetAmount');
            var f5=document.getElementById('txtDetDelId');
            f1.value=cells[0].innerHTML;
            f2.value=cells[1].innerHTML;
            f3.value=cells[2].innerHTML;
            f4.value=cells[3].innerHTML;
            f5.value=cells[0].innerHTML;
          };
      }})();

      function getFeeId()
      {
        var fee = document.getElementById("txtFeeDetName").value;
        document.getElementById("txtFeeDet").value = fee;
        var feeId = document.getElementById("selFee").value;
        document.getElementById("txtFeeDetFee").value = feeId;
      }

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
            <div class="box-header with-border"></div>
            <div class="box-body">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Fees</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Payment Scheme Type</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Payment Schedule</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Fee Details</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    @include('payment.fees')
                  </div><!-- /.tab-pane tab_1 -->

                  <div class="tab-pane" id="tab_2">
                    @include('payment.schemetype')
                  </div> <!-- tab-pane tab_2 -->

                  <div class="tab-pane" id="tab_3">
                    @include('payment.schedule')
                  </div> <!-- /.tab-pane -->

                  <div class="tab-pane" id="tab_4">
                      @include('payment.feedetails')
                    </div> <!-- /.tab-pane tab_4-->
                </div> <!-- /.tab-content before tab_1-->
              </div><!-- nav-tabs-custom -->
            </div> <!-- box body -->
         </div><!-- box box-default -->
        </div> <!-- col-md-12 -->
      </div> <!-- row -->
    </section> <!-- /.content -->

@endsection