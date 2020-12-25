//Javascript codes
(function($){

	$.fn.wposTicker = function(params){
			var defaults={
					width			:'100%',
					modul			:'wposTicker',					
					border			:true,
					effect			:'fade',
					fontstyle		:'normal',
					autoplay		:false,
					timer			:4000,
				};			
			
			var labels = [];
			var params = $.extend(defaults,params);
			
			return this.each(function(){
				// Variables------------------------------------
				params.modul=$("#"+$(this).attr("id"));
				var timername=params.modul;
				var active=0;
				var previous=0;
				var count=params.modul.find("ul li").length;
				var changestate=true;
				
				params.modul.find("ul li").eq(active).fadeIn();
				
				resizeEvent();
				
				if (params.autoplay)
				{
					clearInterval(function(){autoPlay()},params.timer);
					timername=setInterval(function(){autoPlay()},params.timer);					
					$(params.modul).on("mouseenter",function (){
						clearInterval(timername);
					});
					
					$(params.modul).on("mouseleave",function (){
						timername=setInterval(function(){autoPlay()},params.timer);
					});
				}
				else{
					clearInterval(timername);
				}
				
				if (!params.border){
					params.modul.addClass("wptu-bordernone");
				}

				if (params.fontstyle=="italic"){
					params.modul.addClass("wptu-italic");
				}					
				if (params.fontstyle=="bold"){
					params.modul.addClass("wptu-bold");
				}					
				if (params.fontstyle=="bold-italic"){
					params.modul.addClass("wptu-bold wptu-italic");
				}					
								
				//Events---------------------------------------
				$(window).on("resize",function (){
					resizeEvent();
				});
				
				params.modul.find(".wptu-ticker-navi span").on("click",function(){
					if (changestate)
					{
						changestate=false;
						if ($(this).index()==0)
						{
							active--;
							if (active<0)
								active=count-1;
								
							changeTicker();
						}
						else
						{
							active++;
							if (active==count)
								active=0;
							
							changeTicker();
						}
					}
				});
				
				//functions------------------------------------
				function resizeEvent() {
					if (params.modul.width()<480){
						params.modul.find(".wptu-ticker-title .wptu-ticker-head").css({"display":"none"});
						params.modul.find(".wptu-ticker-title").css({"width":10});
						params.modul.find("ul").css({"left":30});
					} else {
						params.modul.find(".wptu-ticker-title .wptu-ticker-head").css({"display":"table-cell"});
						params.modul.find(".wptu-ticker-title").css({"width":"auto"});
						params.modul.find("ul").css({"left":$(params.modul).find(".wptu-ticker-title").width()+20});
					}
				}
				
				function autoPlay()	{
					active++;
					if (active==count)
						active=0;
					
					changeTicker();
				}
				
				function changeTicker() {
					if (params.effect=="slide-h") {
						params.modul.find("ul li").not(':eq('+previous+')').hide();
						params.modul.find("ul li").eq(previous).animate({width:0},{
							queue: false,
						    complete: function () {
						        $(this).css({"display":"none","width":"100%"});
								params.modul.find("ul li").eq(active).css({"width":0,"display":"block"});
								params.modul.find("ul li").eq(active).animate({width:"100%"},function(){
									changestate=true;
									previous=active;
								});
						    }
						});
					} else if (params.effect=="slide-v") {
						params.modul.find("ul li").not(':eq('+previous+')').hide();
						if (previous<=active) {
							params.modul.find("ul li").eq(previous).animate({top:-60},{queue: false});
							params.modul.find("ul li").eq(active).css({top:60,"display":"block"});
						} else {
							params.modul.find("ul li").eq(previous).animate({top:60},{queue: false});
							params.modul.find("ul li").eq(active).css({top:-60,"display":"block"});
						}
						params.modul.find("ul li").eq(active).animate({top:0},{
								queue: false,
							    complete: function () {
							        previous=active;
									changestate=true;
							    }
							});

					} else {
						params.modul.find("ul li").css({"display":"none"});
						params.modul.find("ul li").eq(active).css('opacity', 0).show().animate({opacity: 1},{
							queue:false,
							duration:'slow',
							complete: function () {
						        changestate=true;
						    }
						});
					}
				}			

			});
		};
		
})(jQuery);