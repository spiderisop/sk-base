
<html>
<head>
  
  

	<title>Merchant Stripe Checker</title>
	<link href="style.css" rel="stylesheet" id="bootstrap-css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
body {
  background-image: url('spiderman.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
</head>
<body text=red>
	<br>
      <center> <div class="row col-md-12">
<div class="card col-sm-12">
  <h1 class="card-body h1"><span class="badge badge-dark rainbow_text_animated "><font size="300px">SPIDER 2.0</font></span>
</h1>
  <div class="card-body">
<div class="md-form">
  <div class="col-md-12">
<center>  <div class="md-form">
    <span>Approved CVV:</span>&nbsp<span id="cLive" class="badge badge-success">0 </span>
    <span>Approve CCN:</span>&nbsp<span id="cWarn" class="badge badge-warning">0 </span>
    <span>Declined:</span>&nbsp<span id="cDie" class="badge badge-danger">0 </span>
    <span>Checked:</span>&nbsp<span id="total" class="badge badge-info">0 </span>
    <span>Total:</span>&nbsp<span id="carregadas" class="badge badge-dark">0 </span>
</div><br><textarea type="text" style="text-align: center; background-color: rgba(255, 255, 255, .1);color:white ; maxlength="700" 
placeholder="Enter Cards Here";" id="lista" class="md-textarea form-control" rows="4" placeholder="Enter Cards"></textarea>
 </center>
&nbsp;<br>

						<h3><span style="color:#ffa100"><b>S</b></span><span style="color:#1aff00">e</span><span style="color:#1aff00">c</span><span style="color:#1aff00">r</span><span style="color:#00ff86">e</span><span style="color:#00ff86">t</span>&nbsp;<span style="color:#1aff00">k</span><span style="color:#1aff00">e</span><span style="color:#ffa100"><b>y</b></span></h3>
						
						<textarea type="text" style="text-align: center; background-color: rgba(255, 255, 255, .1);color:white ; maxlength="700"  
id="sec" class="md-textarea form-control" rows="1" placeholder="sk_live_xxxxxxx"></textarea>

&nbsp;<br>
</div>
<center>
<button class="btn btn-warning" style="width: 200px; outline: none;" id="testar" onclick="start()" ><b>START</b></button>
</center>
</div>
</div>
</center>
&nbsp;&nbsp;<br>&nbsp;&nbsp;<br>
<div class="col-md-12">
<div class="card">
<div style="position: absolute;
        top: 0;
        right: 0;">
	<button id="mostra" class="btn btn-success">Show</button><br>
		</div>
	<div style="position: absolute;
	top: 0;
	left: 0;">
</div>
  <div class="card-body">
    <h6 style="font-weight: bold;color:green" class="card-title">Approved CVV: <span  id="cLive2" class="badge badge-success">0</span></h6>
    <div id="bode"><span id=".aprovadas" class="aprovadas"></span>
</div>
  </div>
</div>
</div>
&nbsp;&nbsp;&nbsp;</br>

<div class="col-md-12">
<div class="card">
<div style="position: absolute;
        top: 0;
        right: 0;">
	<button id="mostra3" class="btn btn-warning">Show</button><br>
		</div>
	<div style="position: absolute;
	top: 0;
	left: 0;">
</div>
  <div class="card-body">
    <h6 style="font-weight: bold;color:yellow;" class="card-title">Approve CCN: <span  id="cWarn2" class="badge badge-warning">0</span></h6>
    <div id="bode3"><span id=".edrovadas" class="edrovadas"></span>
</div>
  </div>
</div>
</div>
&nbsp;&nbsp;&nbsp;</br>

<div class="col-md-12">
<div class="card">
	<div style="position: absolute;
        top: 0;
        right: 0;">
	<button id="mostra2" class="btn btn-danger">Show</button><br>
	</div>
	<div style="position: absolute;
	top: 0;
	left: 0;">
</div>
  <div class="card-body">

    <h6 style="font-weight: bold; color: red;" class="card-title">Declined: <span id="cDie2" class="badge badge-danger">0</span></h6>
    <div id="bode2"><span id=".reprovadas" class="reprovadas"></span>
    </div>
  </div>
</div>
</div>
  </div>
</div>
</div>
<br>
</center>
<script  src="./script.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){

  $("#bode").hide();
  $("#esconde").show();
  
  $('#mostra').click(function(){
  $("#bode").slideToggle();
  });
  
  $('#mostra3').click(function(){
  $("#bode3").slideToggle();
  });
  
   $('#mostra2').click(function(){
  $("#bode2").slideToggle();
  });

});

</script>

<script title="ajax do checker">
    function start() {
        var linha = $("#lista").val();
        var linhastart = linha.split("\n");
        var total = linhastart.length;
        var ap = 0;
        var ed = 0;
        var rp = 0;
        linhastart.forEach(function(value, index) {
            setTimeout(
                 function() {
					var sec = $("#sec").val();
                    $.ajax({
                        url: 'api.php?lista=' + value + '&sec=' + sec,
                        type: 'GET',
                        async: true,
                        success: function(resultado) {
                            if (resultado.match("#Approved CVV")) {
                                removelinha();
                                ap++;
                                aprovadas(resultado + "");
                            }else if(resultado.match("#Approve CCN")){
                            	removelinha();
                            ed++;
                                edrovadas(resultado + "");
                             }else {
                                removelinha();
                                rp++;
                                reprovadas(resultado + "");
                            }
                            $('#carregadas').html(total);
                            var fila = parseInt(ap) + parseInt(ed) + parseInt(rp);
                            $('#cLive').html(ap);
                            $('#cWarn').html(ed);
                            $('#cDie').html(rp);
                            $('#total').html(fila);
                            $('#cLive2').html(ap);
                            $('#cWarn2').html(ed);
                            $('#cDie2').html(rp);
                        }
                    });
                }, 10 * index);
        });
    }
    function aprovadas(str) {
        $(".aprovadas").append(str + "<br>");
    }
    function reprovadas(str) {
        $(".reprovadas").append(str + "<br>");
    }
    function edrovadas(str) {
        $(".edrovadas").append(str + "<br>");
    }
    function removelinha() {
        var lines = $("#lista").val().split('\n');
        lines.splice(0, 1);
        $("#lista").val(lines.join("\n"));
    }
</script>
<style>
.rainbow_text_animated {
    background: linear-gradient(to right, #6666ff, #0099ff , #00ff00, #ff3399, #6666ff);
    -webkit-background-clip: text;
    background-clip: text;
    font-size: 58px;
    font-family: 'kalam';
     
 text-shadow: 0 0 35px  #FF0000,0 0 60px  #FF0000;
    color: transparent;
    animation: rainbow_animation 2s ease-in-out infinite;
    background-size: 400% 100%;
}

@keyframes rainbow_animation {
    0%,100% {
        background-position: 0 0;
    }

    50% {
        background-position: 100% 0;
    }
}
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>
<footer>
    

    <!-- Index Credits: @MrNiceguy25 -->

</footer>
</body>
</html>