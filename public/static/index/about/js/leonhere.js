function b() {
    t = parseInt(x.css("top"));
    y.css("top", "30px");
    x.animate({
        top: t - 30 + "px"
    },
    "slow");
    if (Math.abs(t) == h - 30) {
        y.animate({
            top: "0px"
        },
        "slow");
        z = x;
        x = y;
        y = z
    }
    setTimeout(b, 3000)
}
$(document).ready(function() {
    $("#backTop").hide();
    $(window).scroll(function() {
        var scrollTop = $(window).scrollTop();
        var topHeight = $("#header").height();
        if (scrollTop > 0) {
            $("#header").addClass("fixed")
        } else {
            $("#header").removeClass("fixed")
        }
        if (scrollTop > 300) {
            $("#backTop").fadeIn()
        } else {
            $("#backTop").fadeOut()
        }
    });
    $("#backTop a").click(function() {
        $("html,body").animate({
            scrollTop: 0
        },
        500)
    });
    $(".menu ul li > ul").prepend("<span></span>");
    $(".menu ul>li").hover(function() {
        $(this).children("a").addClass("on");
        $(this).children("ul").fadeIn()
    },
    function() {
        $(this).find("a").removeClass("on").parent().children("ul").hide()
    });    
    var text = $(".language span #StranLink").text();
    if (text == "简") {
        $(".language span.on").html("繁")
    } else {
        $(".language span.on").html("简")
    }
    $(".language span #StranLink").click(function() {
        var text2 = $(this).text();
        if (text2 == "简") {
            $(this).parent().siblings().html("简")
        } else {
            $(this).parent().siblings().html("繁")
        }
    });
    $(".productsMenu ul li").click(function() {
        $(this).addClass("on").siblings().removeClass("on");
        var index = $(this).index();
        $(".productsAll .productsList").eq(index).fadeIn(500).siblings().hide()
    });
    $("#news .newslist .newsMenu ul li").click(function() {
        $(this).addClass("on").siblings().removeClass("on");
        var index = $(this).index();
        $(".newsBox > div").eq(index).fadeIn(500).siblings().hide()
    });
    $(".productsList ul li:nth-child(4n),#news .partner ul li:nth-child(3n),.itemList ul li:nth-child(3n)").after('<div class="clear"></div>');
    $(".productsList ul li:odd,.itemList ul li:odd").after('<div class="zbuniversalclearfix"></div>');
    $(".productsList ul li .productsThumb").hover(function() {
        var onback = $(this).find(".onBackground");
        if (!onback.is(":animated")) {
            onback.fadeIn(300)
        }
    },
    function() {
        $(this).find(".onBackground").fadeOut("fast")
    });
    $(".productsBoxMenu ul li").click(function() {
        $(this).addClass("on").siblings().removeClass("on");
        var index = $(this).index();
        var listOffset = $(".productsBox .productsList").eq(index).offset().top - 170;
        $("html,body").animate({
            scrollTop: listOffset
        },
        500);
        return false
    });
    $(".itemList ul li").hover(function() {
        var onback = $(this).find(".onBackground");
        if (!onback.is(":animated")) {
            onback.fadeIn(300)
        }
        $(this).find("img").css({
            "transform": "scale(1.4,1.4)"
        })
    },function() {
        $(this).find(".onBackground").fadeOut("fast").end().find("img").css({
            "transform": "scale(1,1)"
        })
    });
	$('.searchBtn a').click(function(){
		$('#simplemodal-container,#searchbar').show();
	});
	$('#simplemodal-container').click(function(){
		$(this).hide();
		$('#searchbar').hide();
	});
    $('.header').append('<div class="btn"><i class="icon-th-list"></i></div>');
    $('#footer').after('<div id="nav"></div>');
    $(".header .menu").clone(false).prependTo("#nav");
    $(".btn i").click(function() {
        var nav = $("#nav").width();
        if (nav > 0) {
            $("#nav").animate({
                width: "0"
            },
            200)
        } else {
            $("#nav").animate({
                width: "50%"
            },
            200)
        }
    });
    $(window).resize(function() {
        var nav = $("#nav").width();
        if (nav > 0) {
            $("#nav").animate({
                width: "0"
            },
            200)
        }
    });
    $(".socialSns a.weixin").click(function() {
        $(this).find("img").fadeToggle("fast").end().toggleClass("code")
    });
    $("#menu li a").click(function() {
        $("#nav").css({
            "width": "0"
        });
        $(this).addClass("onclick").parent().siblings("li").children("a").removeClass("onclick").end();
        var $id = "#" + $(this).attr("rel");
        var $this = $($id).offset().top - 60;
        var $scrollTop = $(window).scrollTop();
        if ($scrollTop > 0) {
            $("html,body").animate({
                scrollTop: $this
            },
            500)
        } else {
            $("html,body").animate({
                scrollTop: $this - 90
            },
            500)
        }
    });
    $("#slider").responsiveSlides({
        auto: true,
        pager: true,
        nav: true,
        speed: 500,
        timeout: 5000,
        namespace: "centered-btns"
    });
	$('#homebx').bxSlider({
		minSlides: 3,
		maxSlides: 5,
		slideWidth: 230,
		slideMargin: 10,
		auto:true,
		controls:true,
		pager:false
	});
	$('#postbx').bxSlider({
		minSlides: 3,
		maxSlides: 5,
		slideWidth: 209,
		slideMargin: 10,
		auto:true,
		controls:true,
		pager:false
	});
    $(".swap").html($(".newsList").html());
    x = $(".newsList");
    y = $(".swap");
    h = $(".newsList li").length * 30;
    setTimeout(b, 3000)
});