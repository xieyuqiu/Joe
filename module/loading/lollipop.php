<!-- Loading开始 -->
<style>
#loading-animation{background-color:var(--background);height:100%;width:100%;position:fixed;z-index:1;margin-top:0px;top:0px;}#loading-animation-center{width:100%;height:100%;position:relative;}#loading-animation-center-absolute{position:absolute;left:50%;top:50%;height:200px;width:200px;margin-top:-100px;margin-left:-100px;}.loading_object{-moz-border-radius:50% 50% 50% 50%;-webkit-border-radius:50% 50% 50% 50%;border-radius:50% 50% 50% 50%;position:absolute;border-left:5px solid #87CEFA;border-right:5px solid #FFC0CB;border-top:5px solid transparent;border-bottom:5px solid transparent;-webkit-animation:animate 2.5s infinite;animation:animate 2.5s infinite;}#loading_one{left:75px;top:75px;width:50px;height:50px;}#loading_two{left:65px;top:65px;width:70px;height:70px;-webkit-animation-delay:0.1s;animation-delay:0.1s;}#loading_three{left:55px;top:55px;width:90px;height:90px;-webkit-animation-delay:0.2s;animation-delay:0.2s;}#loading_four{left:45px;top:45px;width:110px;height:110px;-webkit-animation-delay:0.3s;animation-delay:0.3s;}@-webkit-keyframes animate{50%{-ms-transform:rotate(180deg);-webkit-transform:rotate(180deg);transform:rotate(180deg);}100%{-ms-transform:rotate(0deg);-webkit-transform:rotate(0deg);transform:rotate(0deg);}}@keyframes animate{50%{-ms-transform:rotate(180deg);-webkit-transform:rotate(180deg);transform:rotate(180deg);}100%{-ms-transform:rotate(0deg);-webkit-transform:rotate(0deg);transform:rotate(0deg);}}
</style>
<div id="loading-animation" style="z-index:99999999999999999999999999999999999999999999999">
	<div id="loading-animation-center">
		<div id="loading-animation-center-absolute">
			<div class="loading_object" id="loading_four"></div>
			<div class="loading_object" id="loading_three"></div>
			<div class="loading_object" id="loading_two"></div>
			<div class="loading_object" id="loading_one"></div>
		</div>
	</div>
</div>