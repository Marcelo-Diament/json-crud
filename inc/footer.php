	<footer></footer>
	<script async defer>
		window.onload=function(){tituloPagina=document.querySelectorAll('h1')
		subtituloPagina=document.querySelectorAll('h2')
		tituloMetaHead=document.querySelector('meta[name="title"]')
		tituloMetaHead.textContent=tituloPagina[0].textContent+" | "+subtituloPagina[0].textContent
		tituloHead=document.querySelector('title')
		tituloHead.textContent=tituloPagina[0].textContent+" | "+subtituloPagina[0].textContent
		botaoInfo=document.querySelectorAll('.btnInfo')
		for(i=0;i<botaoInfo.length;i++){botaoInfo[i].addEventListener('click',function(){listaAninhada=this.parentElement.firstElementChild
		if(listaAninhada.style.display=='none'){this.textContent='Fechar'
		listaAninhada.style.display='block'}else{this.textContent='Info'
		listaAninhada.style.display='none'}})}
		imagemJason=document.querySelector('#jason')
		function getRandomIntInclusive(min,max){min=Math.ceil(min);max=Math.floor(max);return Math.floor(Math.random()*(max-min+1))+min}
		function trocarJason(){this.setAttribute('src','assets/img/jason'+getRandomIntInclusive(1,9)+'.jpg')}
		imagemJason.addEventListener('mouseover',trocarJason)
		main=document.querySelector('main')
		sustoDiv=document.createElement('div')
		susto=document.createElement('img')
		susto.setAttribute('id','susto')
		susto.setAttribute('src','assets/img/easter-egg-susto.webp')
		sustoDiv.appendChild(susto)
		imagemJason.addEventListener('click',assustar)
		function pararSusto(){sustoDiv.style='display:none'}
		function assustar(){sustoDiv.style='display:block'
		main.appendChild(sustoDiv)
		setTimeout(pararSusto,666)}}
	</script>
	<!-- Nesse caso, como o script é muito curto, é recomendável deixá-lo inline para não termos de fazer um request. -->
	<!-- <script async defer type="text/javascript" src="assets/js/script.js"></script> -->
</body>
</html>