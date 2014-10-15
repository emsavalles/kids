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
	.carta{width:9%; cursor:pointer; margin:1px}
	
</style>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="container" id="cuerpo">
        <div id="marcoimagenes" style="clear:both">
     
        </div>
    </div>

		<script src="../../assets/js/jquery.js"></script>
		<script src="../../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            var usados=new Array();
        $(document).ready(function(){
                
              var imagenes=new Array(
              'adversarial','arma','balanza','conciliacion','congreso',
              'defensor','delito','esposas','flagrancia','juez',
              'mallete','mediador','MP','perito','PGE',
              'PGJ','policia','prision','proteccionid','SSPE');
            var carpeta="cartas/"
    
            var imagen1,imagen2;
           //  var cuantos=40;
            var cuantos=imagenes.length*2;
            var uno="",dos="";
            var van=0;

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
					
					$('#carta_'+img1).attr('img',imagenes[j]+'_1');
					$('#carta_'+img2).attr('img',imagenes[j]+'_2');
				}
            //////////////////////////////////  
            //
                $('.carta').on('click',function(){
                    alert(1);
                    $(this)
                    .off('click')
                    .attr('src','cartas/'+$(this).attr('img')+'.jpg');
                });                                
        });
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
