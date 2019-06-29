
var hVentana;
var cabezote = document.getElementById('cabezote');
var cnt_enlaces = document.getElementById('cnt_enlaces');
var enlaces1 = document.getElementById('enlaces1');
var c_logo = document.getElementById('cnt_logo');
var enlaces = document.getElementsByClassName('enlaces');
var m1 = document.getElementsByClassName('m1');
var menu = document.getElementById('menu');
var cnt_arbol = document.getElementById('cnt_arbol');

// CREO TODAS LAS
// VARIABLES DE INICIO
var h_cabezote;
var h1;
var h2;
var h3;
var h4;
var h_enlaces;
var h_cLogo;


// MENU MOVIL


var btn_abrir = document.getElementById('fc_btnmenu');
var btn_cerrar = document.getElementById('btn_cerrar');
var menu_mv = document.getElementById('pestana_menu');
var cerrado = true;

menu_mv.style.width = window.innerWidth + 'px';
menu_mv.style.height = window.innerHeight + 'px';


Inicio();

//window.addEventListener('load', Inico, false);

window.addEventListener('resize', Ubicar, false);

function Ubicar() {

    Inicio();
}

function Inicio () {

    // ****** ESTA VARIABLE,
    // AL CARGAR EN NAVEGADOR DESPUES DE CERRAR LA VENTANA
    // NO CARGA EL ANCHO CORRECTAMENTE
    //wVentana = window.innerWidth;


    //$('#pestana_menu').css({
    //	width:window.innerWidth + 'px',
    //	height:window.innerHeight + 'px',
    //
    //});

    //$('#output').text(
    //	$('#pestana_menu').css('width') +  ' + ' + ' + ' + window.innerWidth +' x '+ window.innerHeight
    //);

    $('#output').text( $(window).height() );


    menu_mv.style.width = $(window).width() + 'px';
    menu_mv.style.height = window.innerHeight + 'px';

    if(cerrado == true){
        menu_mv.style.left = -window.innerWidth + 'px';
        //$('#output').text(cerrado);
        cerrado = true;
    }else{
        menu_mv.style.left = '0px';
        //$('#output').text(cerrado);
        cerrado = false;
    }

    h_cabezote = cabezote.offsetHeight;

    cnt_enlaces.style.height = window.innerHeight + 'px';

    hVentana = window.innerHeight;

    var hdoc = document.body.offsetHeight;
    console.log('hdoc='+pageYOffset);


    // FRANJA CON TITULO
    // Y BOTON MENU
    // PARA LOS TRES TA�ANOS DE PANTALLA

    if( hVentana < 651 && window.innerWidth > 800){

        $('#franja_cabeza').css({
            left:'250px',
            backgroundColor:'#eee'
        });

        $('#fc_btnmenu').css({
            display:'none'
        });

        $('#fondocabeza').css({
            display:'none'
        });

        $('.contenidos').css({
            padding:'0 20px 0 30px'
        });


        // MOSTRAR - OCULTAR LOGOS
        //
        $('#cnt_logo').css({
            display:'none'
        });

        $('#logo_pq').css({
            display:'block'
        });

        $('#logo_pqmv').css({
            display:'none'
        });

    }else if( hVentana > 650 && window.innerWidth > 800){

        $('#franja_cabeza').css({
            left:'0px',
            backgroundColor:'#fff'
        });

        $('#fc_btnmenu').css({
            display:'none'
        });

        $('#fondocabeza').css({
            display:'block'
        });

        $('.contenidos').css({
            padding:'0 20px 0 100px'
        });

        // MOSTRAR - OCULTAR LOGOS
        //
        $('#cnt_logo').css({
            display:'block'
        });

        $('#logo_pq').css({
            display:'none'
        });

        $('#logo_pqmv').css({
            display:'none'
        });

    }else{

        $('#franja_cabeza').css({
            left:'0px',
            backgroundColor:'#eee'
        });

        $('#fc_btnmenu').css({
            display:'block'
        });

        $('#fondocabeza').css({
            display:'none'
        });

        $('.contenidos').css({
            padding:'0 20px 0 0px'
        });

        // MOSTRAR -
        // OCULTAR LOGOS
        //
        $('#cnt_logo').css({
            display:'none'
        });

        $('#logo_pq').css({
            display:'block'
        });

        $('#logo_pqmv').css({
            display:'block'
        });
    }



    // ELEMENTOS DEL
    // MENU

    if( hVentana < 651){


        $('#menu').css({
            position:'fixed',
            top:'0px',
            height:'600px'
        });

        $('.enlaces ').css({
            padding:'10px 0 10px 0px'
        });

        $('#enlaces1').css({

            top:0,
            marginTop:'0px'
        });

        $('.enlaces a').css({ fontSize:'20px' });




    }else{

        $('#menu').css({
            position:'fixed',
            top:'50px',
            height:'100%'
        });

        $('.enlaces ').css({
            padding:'10px 0 10px 0px'
        });

        $('#enlaces1').css({
            top:'50%',
            marginTop:'-350px'
        });


        $('.enlaces a').css({ fontSize:'22px' });

    }


    // REDUCIR EL TAMA�O
    // DE LAS LETRA DEL MENU
    // PARA TELEFONOS EN LANDSCAPE

    if(window.innerHeight > 245 && window.innerHeight < 570){

        $('.enlaces2 ').css({
            padding:'5px 0 5px 0px'
        });

        $('.enlaces2 a').css({
            fontSize:'21px'
        });

        $('.enlaces2 h3').css({
            display:'none',

        });

    }else if (window.innerHeight < 246){

        $('.enlaces2 a').css({
            fontSize:'16px'
        });

        $('.enlaces2 ').css({
            padding:'5px 0 5px 0px'
        });

    }else{

        $('.enlaces2 a').css({
            fontSize:'30px'
        });

        $('.enlaces2 ').css({
            padding:'10px 0 10px 0px'
        });

        $('.enlaces2 h3').css({
            display:'block',

        });
    }


    // UBICACION FLOAT LEFT
    // DEL MENU EN MODO LANDSCAPE



    //alert('cargo');

    if( window.innerWidth > 360 && window.innerWidth < 599){

        //for(var m = 0; m<m1.length; m1++){
        //	m1[m].style.setProperty = ('float','left');
        //}

        $('.m1').css('float','left');
        $('.m1').css('width','210px');

        //$('.m1').css('background-color','#ff0');
        //var ancho = $('.m1').css('width');
        //$('#output').text(window.innerWidth + 'SI');
        //$('#output').text('SIII' + window.innerWidth +' x '+ window.innerHeight + $('.m1').css('float'));
        //$('#output').text('altura' + $('#menumv').css('height'));

    }else{

        $('.m1').css('width', window.innerWidth / 1.5 + 'px');
        $('.m1').css('float','none');
        //$('#output').text(window.innerWidth);
        //$('#output').text(window.innerWidth +' x '+ window.innerHeight);
        //$('#output').text('SIII' + window.innerWidth +' x '+ window.innerHeight + $('.m1').css('float'));
    }





    //$('#output').text(window.innerWidth +' x '+ window.innerHeight);
    //$('#output').text(window.innerHeight);
    //$('#output').text(window.innerWidth);

}




// ==============================
// CANCION
//
var botonPlay = document.getElementById('botonplay');
var botonPausa = document.getElementById('botonpausa');

var songName = botonPlay.getAttribute('data-src');
var audioPlayer = document.createElement('audio');

    audioPlayer.id = 'player';

audioPlayer.src = songName;


document.body.appendChild(audioPlayer);
audioPlayer.play();


botonPlay.addEventListener('click', function(e){

    var songName = e.target.getAttribute('data-src');
    var Reproduciendo = document.getElementById('player');

    if( Reproduciendo ){

        if( Reproduciendo.paused ){
            Reproduciendo.play();
            e.target.id = 'reproduciendo';
        }else{
            Reproduciendo.pause();
            e.target.id = 'pausado';
        }

    }else{

        var audioPlayer = document.createElement('audio');
        audioPlayer.id = 'player';
        audioPlayer.src = songName;

        document.body.appendChild(audioPlayer);
        audioPlayer.play();

        e.target.id = 'reproduciendo';

        audioPlayer.addEventListener('ended', function() {
            audioPlayer.parentNode.removeChild(audioPlayer);
            e.target.id = 'botonplay';
        }, false);

    }



}, false);



// MENU MOVIL



btn_abrir.addEventListener('click', AbrirMenuMv, false)
btn_cerrar.addEventListener('click', CerrarMenuMv, false)


function AbrirMenuMv(){
    menu_mv.style.left = '0px';
    cerrado = false;

}

function CerrarMenuMv(){
    menu_mv.style.left = window.innerWidth + 'px';
    cerrado = true;

}

