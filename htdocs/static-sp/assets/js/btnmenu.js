	/* btnmenu */
	$(function(){
		var menuOpen=false;
		$("#btnMenu").bind("click", function(){BtnMenu();});
		$("#menu li").bind("click", function(){BtnMenu();});
		$("#menu .close").bind("click", function(){	BtnMenu();});
		function BtnMenu(){
			$("#menu").toggle();
			menuOpen=!menuOpen;
			setTapColor(menuOpen);
		}
	});