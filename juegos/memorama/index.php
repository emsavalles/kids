<?php
$carta=(
isset($_GET['cartas'])
&& !empty($_GET['cartas'])
&& is_numeric($_GET['cartas'])

)?$_GET['cartas']:1;

if($carta>20){$carta=20;}

$unac="";
$imagenes= array(
'adversarial','arma','balanza','conciliacion','congreso',
'defensor','delito','esposas','flagrancia','juez',
'mallete','mediador','MP','perito','PGE',
'PGJ','policia','prision','proteccionid','SSPE');

shuffle ($imagenes);

for ($i=0;$i<$carta;$i++){
    $unac.= "'".$imagenes[$i]."',";
}
$lascartas=substr($unac,0,strlen($unac)-1);
//echo $lascartas;
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title> Bienvenido al sitio... </title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link media="all" type="text/css" rel="stylesheet" href="../../assets/css/bootstrap.min.css">
		<link media="all" type="text/css" rel="stylesheet" href="../../assets/css/font-awesome.min.css">

<style>
	.carta{width:9%;cursor:pointer; margin:2px; border:1px solid #aaa; opacity: 0.8; filter: alpha(opacity=80);}
	.carta:hover{ opacity: 1; filter: alpha(opacity=100);}
</style>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


<div class="modal fade bs-example-modal-sm"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <button style="position: absolute;top:0; right:2px;" type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
        </button>
      <img style="margin: 0 auto;" id="cartazoom" src="" style="height: 400px;">
    </div>
  </div>
</div>


<div class="modal fade bs-example-modal-sm" id="ganaste" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Felicidades Ganaste</h4>
      </div>
      <div class="modal-body">
        <p>&iquest;Quieres jugar otra vez?</p>
      </div>
      <div class="modal-footer">
        <div class="col-md-12">
            <div class="input-group">
<div class="input-group">
  <span class="input-group-addon">Cartas</span>
  <input type="number" max="20" style="width: 80px;" min="1" id="ccartas" class="form-control" placeholder="1 Carta" value="<?php echo $carta?>">
                <button type="button" class="btn btn-primary" id="sijuega">S&iacute;</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
</div>
            </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="jumbotron">
      <div class="container">
<div id="uno" class="hidden alert alert-info"></div>
<div id="dos" class="hidden alert alert-info"></div>
<div id="resultado" class="hidden alert"></div>

<div id="encontradas" class="hidden">0</div>
    <div class="container" id="cuerpo">
        <div id="marcoimagenes" class="col-md-12" style="clear:both">
     
        </div>
    </div>
</div>
</div>
		<script src="../../assets/js/jquery.js"></script>
		<script src="../../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            var usados=new Array();

var imagenes=new Array(<?php echo $lascartas;?>);
            var carpeta="cartas/"
    
            var imagen1,imagen2;
            var cuantos=imagenes.length*2;
            var uno="",dos="";
            var van=0;
            var res=0;
            encontradas=0;

        $(document).ready(function(){
            //crea cartas
               for(var i=1;i<=cuantos;i++){
               $('<img>')
				   .addClass('carta')
				   .attr({'id':'carta_'+i,'src':'cartas/REVERSO TARJETAS.jpg','activo':'0'})
                   .appendTo('#marcoimagenes');
               }               
            ////////////////////////////////////
            //Revuelve cartas
				for(var j=0;j<cuantos/2;j++)
				{
					img1=aleatorio(1,cuantos);
					img2=aleatorio(1,cuantos);
					
					$('#carta_'+img1).attr('img',imagenes[j]+'_1').attr('title',imagenes[j]);
					$('#carta_'+img2).attr('img',imagenes[j]+'_2').attr('title',imagenes[j]);
				}
            //////////////////////////////////  
            //
                $('.carta').on('click',carta);                                

        $('#myModal').on('hide.bs.modal', function (e) {
            if (van==0&&res==0){ voltea();
            $('#'+uno+', #'+dos).on('click',carta)}
        });
        $('#sijuega').on('click',function(){
            location.href = "?cartas="+$('#ccartas').val();
        }) ;
        });//Jquery
        function carta(){
            $(this)
            .off('click')
            .attr('src','cartas/'+$(this).attr('img')+'.jpg');
            $('#cartazoom').attr('src','cartas/'+$(this).attr('img')+'.jpg');
            $('#myModal').modal('show');            
            if(van==0){uno=$(this).attr('id');van=1;$('#uno').text(uno);return 0;}
            if(van==1){dos=$(this).attr('id');van=2;$('#dos').text(dos);}
            
            if(van==2){
                compara();
            }
            
        }//carta        
        
        function compara(){
            if($('#'+uno).attr('img').substr(0,$('#'+uno).attr('img').indexOf('_'))!=$('#'+dos).attr('img').substr(0,$('#'+dos).attr('img').indexOf('_'))){
            $('#resultado').removeClass('alert-success').addClass('alert-danger').text('diferentes');
                res=0;
            }//si
            else{
               $('#resultado').removeClass('alert-danger').addClass('alert-success').text('iwales');
               res=1;
               encontradas++;
               $('#encontradas').text(encontradas);
               $('#'+uno+',#'+dos).css({'cursor':'auto','opacity': '1', 'filter': 'alpha(opacity=100)'});
               if(encontradas>=cuantos/2){
                $('#myModal').modal('hide');
                //alert('Ganaste');
                $('#ganaste').modal('show');
               }
            }       
            van=0;
            $('#uno,#dos').text('');
            //console.log(van);
        }//compara
        
        function voltea(){
        	$('#'+uno+', #'+dos).attr('src','cartas/REVERSO TARJETAS.jpg');
        	$('#uno, #dos, #resultado').text('');
        }//voltea
        
        function aleatorio(min, max) {
            do{
            	var num = Math.floor(Math.random()*(max-min+1))+min; 
            }while($.inArray(num,usados)>=0);
            usados.push(num);
            return num; 
        } 
        </script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!--
        
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
        -->
    </body>
</html>
