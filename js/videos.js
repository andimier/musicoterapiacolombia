	// Change this to your username to load in your clips
	var vimeoUserName = 'musicoterapiacolombia';
	
	// Tell Vimeo what function to call
	//var userInfoCallback = 'userInfo';
	var videosCallback = 'showThumbs';
		
	// Set up the URLs
	//var userInfoUrl = 'http://vimeo.com/api/v2/album/2847897' + vimeoUserName + '/info.json?callback=' + userInfoCallback;
	var videosUrl = 'http://vimeo.com/api/v2/album/3255321' + vimeoUserName + '/videos.json?callback=' + videosCallback;
	
	
	// This function loads the data from 
	function init() {
		var head = document.getElementsByTagName('head').item(0);
	
		var videosJs = document.createElement('script');
		videosJs.setAttribute('type', 'text/javascript');
		videosJs.setAttribute('src', videosUrl);
		head.appendChild(videosJs);

	}
	
	
	// This function goes through the clips and puts them on the page
	function showThumbs(videos) {
	
		var thumbs = document.getElementById('thumbs');
		console.log(thumbs.offsetWidth)
		thumbs.innerHTML = '';
		
		//var ul = document.createElement('ul');
		//thumbs.appendChild(ul);
		
		for (var i = 0; i < videos.length; i++) {
	
		
			var imgVideo = document.createElement('img');
			
			imgVideo.setAttribute('src', videos[i].thumbnail_large);
			imgVideo.setAttribute('alt', videos[i].title);
			imgVideo.style.width='160%';
			
			
			var titulo = document.createElement('div');
			titulo.className = 'tt_video';
			titulo.innerHTML = videos[i].title;
			
			var urlvideo = videos[i].url;
			var numvideo = urlvideo.split("/");
			var num = numvideo[3];
			
			var enlace = 'video.php?video='+num;
			
			
			
			var a1 = document.createElement('a');
			
			a1.setAttribute('href', enlace);
			a1.appendChild(titulo);
			
			//////
			var cnt_videos = document.createElement('div');
			cnt_videos.className = 'cnt_videos';
		
			
			//////
			
			
			var cnt_imgVideo = document.createElement('div');
			cnt_imgVideo.className = 'cnt_imgVideo';
		
		
			
			// PONER MASCARA
			var msk = document.createElement('div');
			//msk.setAttribute('src', 'imagenes/mascara1.png');
			msk.className = 'mascara';
			
			
			
			//////
			
			var a = document.createElement('a');
			
			//a.setAttribute('href', enlace);
			a.appendChild(titulo);
			
			
			////////
		
			cnt_imgVideo.appendChild(msk);
			cnt_imgVideo.appendChild(imgVideo);
			
			cnt_videos.appendChild(cnt_imgVideo);
			cnt_videos.appendChild(a);
			
			a1.appendChild(cnt_videos)
			
			thumbs.appendChild(a1);
			
		
			
			var hThumb = imgVideo.height;
			var wThumb = imgVideo.width;
			
			var wLi = cnt_imgVideo.offsetWidth;
			var nuevaH = wLi/1.7;
			
	
		}
	
		//thumbs.style.height = nuevaH*2+'px';
		
		var contenedoresVideos = document.getElementsByClassName("cnt_videos");
		
		
		
		var titulos = document.getElementsByClassName("tt_video");
		var w_titulos = titulos.offsetWidth;
		
		var mascara = document.getElementsByClassName("mascara");
		var w_mascara = mascara[0].offsetWidth;
		
		var altos = [];
		
		var wLosli;
		var nH;
		
		
		
		console.log( 'mascar = '+w_mascara)
		
		
		
		wLosli = contenedoresVideos[0].offsetWidth;
		nH = wLosli/1.7;
		
		
		var imagen = document.getElementsByClassName('cnt_imgVideo');
		//var w_imagen = imagen[0].offsetWidth;
		
		console.log($('.cnt_imgVideo').first().width());
		
		var w_imagen = $('.cnt_imgVideo').first().width();
		
		console.log('w o ='+imagen[0].offsetWidth);
		console.log('w 1 ='+imagen[1].offsetWidth);
		
		
		for (var b = 0; b < imagen.length; b++) {
			imagen[b].style.height = w_imagen - 1 + 'px';
			
		}
		
		
		
		console.log('ref ancho ='+$('.cnt_imgVideo').css('width'));
		console.log('ref altura ='+imagen[0].offsetHeight);
		
		//console.log('mascara ancho ='+mascara[0].offsetWidth);
		//console.log('mascara altura ='+mascara[0].offsetHeight);
		
		
		window.addEventListener('resize', function() {
			
			w_imagen = imagen[0].offsetWidth;
			wLosli = contenedoresVideos[0].offsetWidth
			
			nH = wLosli/1.7;
			
			w_mascara = mascara[0].offsetWidth;
			
			for (var c = 0; c < imagen.length; c++) {
				imagen[c].style.height = w_imagen - 1 +'px';
				
				console.log('ref 1 ancho ='+imagen[0].offsetWidth);
				
			}
			
			
			console.log('ref 1 ancho ='+imagen[0].offsetWidth);
			console.log('ref 1 alto  ='+imagen[0].offsetHeight);
			
			console.log('ref 2 ancho ='+mascara[0].offsetWidth);
			console.log('ref 2 alto  ='+mascara[0].offsetHeight);
		});
		
		
		
		// MENU MOVIL
		$('#boton_mv1').click( function(){
			
			$('#enlaces_mv').slideDown();
			$('#boton_mv2').css({ display:'block' });
			$('#boton_mv1').css({ display:'none' });
		})

		$('#boton_mv2').click( function(){
			$('#enlaces_mv').slideUp();
			$('#boton_mv2').css({ display:'none' });
			$('#boton_mv1').css({ display:'block' });
		})
		
		
		
		
	}
	

	window.onload = init;
