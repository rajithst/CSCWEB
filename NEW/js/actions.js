$(document).ready(function(){        
    
    /* PROGGRESS START */
    $.mpb("show",{value: [0,50],speed: 5});        
    /* END PROGGRESS START */
    
    var html_click_avail = true;
    
    $("html").on("click", function(){
        if(html_click_avail)
            $(".x-navigation-horizontal li,.x-navigation-minimized li").removeClass('active');        
    });        
    
    $(".x-navigation-horizontal .panel").on("click",function(e){
        e.stopPropagation();
    });    

    
    /* MESSAGE BOX */
    $(".mb-control").on("click",function(){
        var box = $($(this).data("box"));
        if(box.length > 0){
            box.toggleClass("open");
            
            var sound = box.data("sound");
            
            if(sound === 'alert')
                playAudio('alert');
            
            if(sound === 'fail')
                playAudio('fail');
            
        }        
        return false;
    });
    $(".mb-control-close").on("click",function(){
       $(this).parents(".message-box").removeClass("open");
       return false;
    });    
    /* END MESSAGE BOX */


    
    /* CONTENT FRAME */
    $(".content-frame-left-toggle").on("click",function(){
        $(".content-frame-left").is(":visible") 
        ? $(".content-frame-left").hide() 
        : $(".content-frame-left").show();
        page_content_onresize();
    });
    $(".content-frame-right-toggle").on("click",function(){
        $(".content-frame-right").is(":visible") 
        ? $(".content-frame-right").hide() 
        : $(".content-frame-right").show();
        page_content_onresize();
    });    
    /* END CONTENT FRAME */
    
    /* MAILBOX */
    $(".mail .mail-star").on("click",function(){
        $(this).toggleClass("starred");
    });
    
    $(".mail-checkall .iCheck-helper").on("click",function(){
        
        var prop = $(this).prev("input").prop("checked");
                    
        $(".mail .mail-item").each(function(){            
            var cl = $(this).find(".mail-checkbox > div");            
            cl.toggleClass("checked",prop).find("input").prop("checked",prop);                        
        }); 
        
    });
    /* END MAILBOX */

    
    /* ACCORDION */
    $(".accordion .panel-title a").on("click",function(){
        
        var blockOpen = $(this).attr("href");
        var accordion = $(this).parents(".accordion");        
        var noCollapse = accordion.hasClass("accordion-dc");
        
        
        if($(blockOpen).length > 0){            
            
            if($(blockOpen).hasClass("panel-body-open")){
                $(blockOpen).slideUp(200,function(){
                    $(this).removeClass("panel-body-open");
                });
            }else{
                $(blockOpen).slideDown(200,function(){
                    $(this).addClass("panel-body-open");
                });
            }
            
            if(!noCollapse){
                accordion.find(".panel-body-open").not(blockOpen).slideUp(200,function(){
                    $(this).removeClass("panel-body-open");
                });                                           
            }
            
            return false;
        }
        
    });
    /* EOF ACCORDION */
    
    /* DATATABLES/CONTENT HEIGHT FIX */
    $(".dataTables_length select").on("change",function(){
        onresize();
    });
    /* END DATATABLES/CONTENT HEIGHT FIX */
    
    /* TOGGLE FUNCTION */
    $(".toggle").on("click",function(){
        var elm = $("#"+$(this).data("toggle"));
        if(elm.is(":visible"))
            elm.addClass("hidden").removeClass("show");
        else
            elm.addClass("show").removeClass("hidden");
        
        return false;
    });
    /* END TOGGLE FUNCTION */
    
    /* MESSAGES LOADING */
    $(".messages .item").each(function(index){
        var elm = $(this);
        setInterval(function(){
            elm.addClass("item-visible");
        },index*300);              
    });
    /* END MESSAGES LOADING */
    
    x_navigation();
});

$(function(){
    onload();

    /* PROGGRESS COMPLETE */
    $.mpb("update",{value: 100, speed: 5, complete: function(){            
        $(".mpb").fadeOut(200,function(){
            $(this).remove();
        });
    }});
    /* END PROGGRESS COMPLETE */
});

$(window).resize(function(){
    x_navigation_onresize();
    page_content_onresize();
});

function onload(){
    x_navigation_onresize();    
    page_content_onresize();
}

function page_content_onresize(){
    $(".page-content,.content-frame-body,.content-frame-right,.content-frame-left").css("width","").css("height","");
    
    var content_minus = 0;
    content_minus = ($(".page-container-boxed").length > 0) ? 40 : content_minus;
    content_minus += ($(".page-navigation-top-fixed").length > 0) ? 50 : 0;
    
    var content = $(".page-content");
    var sidebar = $(".page-sidebar");
    
    if(content.height() < $(document).height() - content_minus){        
        content.height($(document).height() - content_minus);
    }        
    
    if(sidebar.height() > content.height()){        
        content.height(sidebar.height());
    }
    
    if($(window).width() > 1024){
        
        if($(".page-sidebar").hasClass("scroll")){
            if($("body").hasClass("page-container-boxed")){
                var doc_height = $(document).height() - 40;
            }else{
                var doc_height = $(window).height();
            }
           $(".page-sidebar").height(doc_height);
           
       }
       
        if($(".content-frame-body").height() < $(document).height()-162){
            $(".content-frame-body,.content-frame-right,.content-frame-left").height($(document).height()-162);            
        }else{
            $(".content-frame-right,.content-frame-left").height($(".content-frame-body").height());
        }
        
        $(".content-frame-left").show();
        $(".content-frame-right").show();
    }else{
        $(".content-frame-body").height($(".content-frame").height()-80);
        
        if($(".page-sidebar").hasClass("scroll"))
           $(".page-sidebar").css("height","");
    }
    
    if($(window).width() < 1200){
        if($("body").hasClass("page-container-boxed")){
            $("body").removeClass("page-container-boxed").data("boxed","1");
        }
    }else{
        if($("body").data("boxed") === "1"){
            $("body").addClass("page-container-boxed").data("boxed","");
        }
    }
}



/* X-NAVIGATION CONTROL FUNCTIONS */
function x_navigation_onresize(){    
    
    var inner_port = window.innerWidth || $(document).width();
    
    if(inner_port < 1025){               
        $(".page-sidebar .x-navigation").removeClass("x-navigation-minimized");
        $(".page-container").removeClass("page-container-wide");
        $(".page-sidebar .x-navigation li.active").removeClass("active");
        
                
        $(".x-navigation-horizontal").each(function(){            
            if(!$(this).hasClass("x-navigation-panel")){                
                $(".x-navigation-horizontal").addClass("x-navigation-h-holder").removeClass("x-navigation-horizontal");
            }
        });
        
        
    }else{        
        if($(".page-navigation-toggled").length > 0){
            x_navigation_minimize("close");
        }       
        
        $(".x-navigation-h-holder").addClass("x-navigation-horizontal").removeClass("x-navigation-h-holder");                
    }
    
}

function x_navigation_minimize(action){
    
    if(action == 'open'){
        $(".page-container").removeClass("page-container-wide");
        $(".page-sidebar .x-navigation").removeClass("x-navigation-minimized");
        $(".x-navigation-minimize").find(".fa").removeClass("fa-indent").addClass("fa-dedent");
        $(".page-sidebar.scroll").mCustomScrollbar("update");
    }
    
    if(action == 'close'){
        $(".page-container").addClass("page-container-wide");
        $(".page-sidebar .x-navigation").addClass("x-navigation-minimized");
        $(".x-navigation-minimize").find(".fa").removeClass("fa-dedent").addClass("fa-indent");
        $(".page-sidebar.scroll").mCustomScrollbar("disable",true);
    }
    
    $(".x-navigation li.active").removeClass("active");
    
}

function x_navigation(){
    
    $(".x-navigation-control").click(function(){
        $(this).parents(".x-navigation").toggleClass("x-navigation-open");
        
        onresize();
        
        return false;
    });

    if($(".page-navigation-toggled").length > 0){
        x_navigation_minimize("close");
    }    
    
    $(".x-navigation-minimize").click(function(){
                
        if($(".page-sidebar .x-navigation").hasClass("x-navigation-minimized")){
            $(".page-container").removeClass("page-navigation-toggled");
            x_navigation_minimize("open");
        }else{            
            $(".page-container").addClass("page-navigation-toggled");
            x_navigation_minimize("close");            
        }
        
        onresize();
        
        return false;        
    });
       
    $(".x-navigation  li > a").click(function(){
        
        var li = $(this).parent('li');        
        var ul = li.parent("ul");
        
        ul.find(" > li").not(li).removeClass("active");    
        
    });
    
    $(".x-navigation li").click(function(event){
        event.stopPropagation();
        
        var li = $(this);
                
            if(li.children("ul").length > 0 || li.children(".panel").length > 0 || $(this).hasClass("xn-profile") > 0){
                if(li.hasClass("active")){
                    li.removeClass("active");
                    li.find("li.active").removeClass("active");
                }else
                    li.addClass("active");
                    
                onresize();
                
                if($(this).hasClass("xn-profile") > 0)
                    return true;
                else
                    return false;
            }                                     
    });
    

    
}



/* NEW OBJECT(GET SIZE OF ARRAY) */
Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};
/* EOF NEW OBJECT(GET SIZE OF ARRAY) */