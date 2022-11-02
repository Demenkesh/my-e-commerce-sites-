;(function ($, window) {
    let ele = null,
        exzoom_img_box = null,
        boxWidth = null,
        boxHeight = null,
        exzoom_img_ul_outer = null,//ç”¨äºŽé™åˆ¶ ul å®½åº¦,åˆä¸å½±å“æ”¾å¤§é•œåŒºåŸŸ
        exzoom_img_ul = null,
        exzoom_img_ul_position = 0,//å¾ªçŽ¯å›¾ç‰‡åŒºåŸŸçš„è¾¹è·,ç”¨äºŽç§»åŠ¨æ—¶è·Ÿéšå…‰æ ‡
        exzoom_img_ul_width = 0,//å¾ªçŽ¯å›¾ç‰‡åŒºåŸŸçš„æœ€å¤§å®½åº¦
        exzoom_img_ul_max_margin = 0,//å¾ªçŽ¯å›¾ç‰‡åŒºåŸŸçš„æœ€å¤§å¤–è¾¹è·,åº”è¯¥æ˜¯å›¾ç‰‡æ•°é‡å‡ä¸€ä¹˜ä»¥boxWidth
        exzoom_nav = null,
        exzoom_nav_inner = null,
        navHightClass = "current",//å½“å‰å›¾ç‰‡çš„ç±»,
        exzoom_navSpan = null,
        navHeightWithBorder = null,
        images = null,
        exzoom_prev_btn = null,//å¯¼èˆªä¸Šä¸€å¼ å›¾ç‰‡
        exzoom_next_btn = null,//å¯¼èˆªä¸‹ä¸€å¼ å›¾ç‰‡
        imgNum = 0,//å›¾ç‰‡çš„æ•°é‡
        imgIndex = 0,//å½“å‰å›¾ç‰‡çš„ç´¢å¼•
        imgArr = [],//å›¾ç‰‡å±žæ€§çš„æ•°å­—
        exzoom_zoom = null,
        exzoom_main_img = null,
        exzoom_zoom_outer = null,
        exzoom_preview = null,//é¢„è§ˆåŒºåŸŸ
        exzoom_preview_img = null,//é¢„è§ˆåŒºåŸŸçš„å›¾ç‰‡
        autoPlayInterval = null,//ç”¨äºŽæŽ§åˆ¶è‡ªåŠ¨æ’­æ”¾çš„é—´éš”æ—¶é—´
        startX = 0,//ç§»åŠ¨å…‰æ ‡çš„èµ·å§‹åæ ‡
        startY = 0,//ç§»åŠ¨å…‰æ ‡çš„èµ·å§‹åæ ‡
        endX = 0,//ç§»åŠ¨å…‰æ ‡çš„ç»ˆæ­¢åæ ‡
        endY = 0,//ç§»åŠ¨å…‰æ ‡çš„ç»ˆæ­¢åæ ‡
        g = {},//å…¨å±€å˜é‡
        defaults = {
            "navWidth": 60,//åˆ—è¡¨æ¯ä¸ªå®½åº¦,è¯¥ç‰ˆæœ¬ä¸­è¯·æŠŠå®½é«˜å¡«å†™æˆä¸€æ ·
            "navHeight": 60,//åˆ—è¡¨æ¯ä¸ªé«˜åº¦,è¯¥ç‰ˆæœ¬ä¸­è¯·æŠŠå®½é«˜å¡«å†™æˆä¸€æ ·
            "navItemNum": 5,//åˆ—è¡¨æ˜¾ç¤ºä¸ªæ•°
            "navItemMargin": 7,//åˆ—è¡¨é—´éš”
            "navBorder": 1,//åˆ—è¡¨è¾¹æ¡†ï¼Œæ²¡æœ‰è¾¹æ¡†å¡«å†™0ï¼Œè¾¹æ¡†åœ¨cssä¸­ä¿®æ”¹
            "autoPlay": true,//æ˜¯å¦è‡ªåŠ¨æ’­æ”¾
            "autoPlayTimeout": 2000,//æ’­æ”¾é—´éš”æ—¶é—´
        };


    let methods = {
        init: function (options) {
            let opts = $.extend({}, defaults, options);

            ele = this;
            exzoom_img_box = ele.find(".exzoom_img_box");
            exzoom_img_ul = ele.find(".exzoom_img_ul");
            exzoom_nav = ele.find(".exzoom_nav");
            exzoom_prev_btn = ele.find(".exzoom_prev_btn");//ç¼©ç•¥å›¾å¯¼èˆªä¸Šä¸€å¼ æŒ‰é’®
            exzoom_next_btn = ele.find(".exzoom_next_btn");//ç¼©ç•¥å›¾å¯¼èˆªä¸‹ä¸€å¼ æŒ‰é’®

            //todo ä»¥åŽå¯ä»¥åˆ†å¼€å®½åº¦å’Œé«˜åº¦çš„é™åˆ¶
            boxHeight = boxWidth = ele.outerWidth();  //åœ¨å°å±å¹•ä¸­,æœ‰ padding çš„æƒ…å†µä¸‹,è®¡ç®—ä¸å‡†,éœ€è¦æ‰‹åŠ¨æŒ‡å®š ele çš„å®½åº¦

            // console.log("boxWidth::" + boxWidth);
            // console.log("ele.parent().width()::" + ele.parent().width());
            // console.log("ele.parent().outerWidth()::" + ele.parent().outerWidth());
            // console.log("ele.parent().innerWidth()::" + ele.parent().innerWidth());

            //todo ç¼©ç•¥å›¾å¯¼èˆªçš„é«˜åº¦å’Œå®½åº¦å¯ä»¥æ”¹ä¸ºæ ¹æ® å¯¼èˆªæ å®½åº¦ å’Œ navItemNum è®¡ç®—å‡ºæ¥,ä½†æ˜¯å¯¹äºŽä¸åŒå°ºå¯¸çš„ä¸å¥½å¤„ç†
            g.navWidth = opts.navWidth;
            g.navHeight = opts.navHeight;
            g.navBorder = opts.navBorder;
            g.navItemMargin = opts.navItemMargin;
            g.navItemNum = opts.navItemNum;
            g.autoPlay = opts.autoPlay;
            g.autoPlayTimeout = opts.autoPlayTimeout;

            images = exzoom_img_box.find("img");
            imgNum = images.length;//å›¾ç‰‡çš„æ•°é‡
            checkLoadedAllImages(images)//æ£€æŸ¥å›¾ç‰‡æ˜¯å¦å¥åœ¨å®Œæˆ,å…¨éƒ¨åŠ è½½å®Œæˆçš„ä¼šæ‰§è¡Œåˆå§‹åŒ–
        },
        prev: function () {             //ä¸Šä¸€å¼ å›¾ç‰‡
            moveLeft()
        },
        next: function () {            //ä¸‹ä¸€å¼ å›¾ç‰‡
            moveRight();
        },
        setImg: function () {            //è®¾ç½®å¤§å›¾
            let url = arguments[0];

            getImageSize(url, function (width, height) {
                exzoom_preview_img.attr("src", url);
                exzoom_main_img.attr("src", url);

                //todo æœªæµ‹è¯•
                //åˆ¤æ–­å·²æœ‰çš„å›¾ç‰‡æ•°é‡æ˜¯å¦åˆæœ€åˆçš„ä¸€è‡´,ä¸æ˜¯çš„è¯å°±å…ˆåˆ é™¤æœ€åŽä¸€ä¸ª
                if (exzoom_img_ul.find("li").length === imgNum + 1) {
                    exzoom_img_ul.find("li:last").remove();
                }
                exzoom_img_ul.append('<li style="width: ' + boxWidth + 'px;">' +
                    '<img src="' + url + '"></li>');

                let image_prop = copute_image_prop(url, width, height);
                previewImg(image_prop);
            });
        },
    };

    $.fn.extend({
        "exzoom": function (method, options) {
            if (arguments.length === 0 || (typeof method === 'object' && !options)) {
                if (this.length === 0) {
                    // alert("è°ƒç”¨ jQuery.exzomm æ—¶çš„é€‰æ‹©å™¨ä¸ºç©º");
                    $.error('Selector is empty when call jQuery.exzomm');
                } else {
                    return methods.init.apply(this, arguments);
                }
            } else if (methods[method]) {
                return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
            } else {
                // alert("è°ƒç”¨äº† jQuery.exzomm ä¸­ä¸å­˜åœ¨çš„æ–¹æ³•");
                $.error('Method ' + method + 'does not exist on jQuery.exzomm');
            }
        }
    });

    /**
     * åˆå§‹åŒ–
     */
    function init() {
        exzoom_img_box.append("<div class='exzoom_img_ul_outer'></div>");
        exzoom_nav.append("<p class='exzoom_nav_inner'></p>");
        exzoom_img_ul_outer = exzoom_img_box.find(".exzoom_img_ul_outer");
        exzoom_nav_inner = exzoom_nav.find(".exzoom_nav_inner");

        //æŠŠ exzoom_img_ul ç§»åŠ¨åˆ° exzoom_img_ul_outer é‡Œ
        exzoom_img_ul_outer.append(exzoom_img_ul);

        //å¾ªçŽ¯æ‰€æœ‰å›¾ç‰‡,è®¡ç®—å°ºå¯¸,æ·»åŠ ç¼©ç•¥å›¾å¯¼èˆª
        for (let i = 0; i < imgNum; i++) {
            imgArr[i] = copute_image_prop(images.eq(i));//è®°å½•å›¾ç‰‡çš„å°ºå¯¸å±žæ€§ç­‰
            console.log(imgArr[i]);
            let li = exzoom_img_ul.find("li").eq(i);
            li.css("width", boxWidth);//è®¾ç½®å›¾ç‰‡ä¸Šçº§çš„ li å…ƒç´ çš„å®½åº¦
            li.find("img").css({
                "margin-top": imgArr[i][5],
                "width": imgArr[i][3]
            });
        }

        //ç¼©ç•¥å›¾å¯¼èˆª
        exzoom_navSpan = exzoom_nav.find("span");
        navHeightWithBorder = g.navBorder * 2 + g.navHeight;
        g.exzoom_navWidth = (navHeightWithBorder + g.navItemMargin) * g.navItemNum;
        g.exzoom_nav_innerWidth = (navHeightWithBorder + g.navItemMargin) * imgNum;

        exzoom_navSpan.eq(imgIndex).addClass(navHightClass);
        exzoom_nav.css({
            "height": navHeightWithBorder + "px",
            "width": boxWidth - exzoom_prev_btn.width() - exzoom_next_btn.width(),
        });
        exzoom_nav_inner.css({
            "width": g.exzoom_nav_innerWidth + "px"
        });
        exzoom_navSpan.css({
            "margin-left": g.navItemMargin + "px",
            "width": g.navWidth + "px",
            "height": g.navHeight + "px",
        });

        //è®¾ç½®æ»šåŠ¨åŒºåŸŸçš„å®½åº¦
        exzoom_img_ul_width = boxWidth * imgNum;
        exzoom_img_ul_max_margin = boxWidth * (imgNum - 1);
        exzoom_img_ul.css("width", exzoom_img_ul_width);
        //æ·»åŠ æ”¾å¤§é•œ
        exzoom_img_box.append(`
<div class='exzoom_zoom_outer'>
    <span class='exzoom_zoom'></span>
</div>
<p class='exzoom_preview'>
    <img class='exzoom_preview_img' src='' />
</p>
            `);
        exzoom_zoom = exzoom_img_box.find(".exzoom_zoom");
        exzoom_main_img = exzoom_img_box.find(".exzoom_main_img");
        exzoom_zoom_outer = exzoom_img_box.find(".exzoom_zoom_outer");
        exzoom_preview = exzoom_img_box.find(".exzoom_preview");
        exzoom_preview_img = exzoom_img_box.find(".exzoom_preview_img");

        //è®¾ç½®å¤§å›¾å’Œé¢„è§ˆå›¾åŒºåŸŸ
        exzoom_img_box.css({
            "width": boxHeight + "px",
            "height": boxHeight + "px",
        });

        exzoom_img_ul_outer.css({
            "width": boxHeight + "px",
            "height": boxHeight + "px",
        });

        exzoom_preview.css({
            "width": boxHeight + "px",
            "height": boxHeight + "px",
            "left": boxHeight + 5 + "px",//æ·»åŠ ä¸ªè¾¹è·
        });

        previewImg(imgArr[imgIndex]);
        autoPlay();//è‡ªåŠ¨æ’­æ”¾
        bindingEvent();//ç»‘å®šäº‹ä»¶
    }

    /**
     * æ£€æµ‹å›¾ç‰‡æ˜¯å¦åŠ è½½å®Œæˆ
     * @param images
     */
    function checkLoadedAllImages(images) {
        let timer = setInterval(function () {
            let loaded_images_counter = 0;
            let all_images_num = images.length;
            images.each(function () {
                if (this.complete) {
                    loaded_images_counter++;
                }
            });
            if (loaded_images_counter === all_images_num) {
                clearInterval(timer);
                init();
            }
        }, 100)
    }

    /**
     * èŽ·å–å…‰æ ‡åæ ‡,å¦‚æžœæ˜¯ touch äº‹ä»¶,åªå¤„ç†ç¬¬ä¸€ä¸ª
     */
    function getCursorCoords(event) {
        let e = event || window.event;
        let coords_data = e, //è®°å½•åæ ‡çš„æ•°æ®,é»˜è®¤ä¸º event æœ¬èº«,ç§»åŠ¨ç«¯çš„ touch ä¼šä¿®æ”¹
            x,//x è½´
            y;//y è½´

        if (e["touches"] !== undefined) {
            if (e["touches"].length > 0) {
                coords_data = e["touches"][0];
            }
        }

        x = coords_data.clientX || coords_data.pageX;
        y = coords_data.clientY || coords_data.pageY;

        return {'x': x, 'y': y}
    }

    /**
     * æ£€æŸ¥ç§»åŠ¨ç«¯è§¦æ‘¸æ»‘åŠ¨çš„ä½ç½®
     */
    function checkNewPositionLimit(new_position) {
        if (-new_position > exzoom_img_ul_max_margin) {
            //é™åˆ¶å‘å³çš„èŒƒå›´
            new_position = -exzoom_img_ul_max_margin;
            imgIndex = 0;//å‘å³è¶…å‡ºèŒƒå›´çš„å›žåˆ°ç¬¬ä¸€ä¸ª
        } else if (new_position > 0) {
            //é™åˆ¶å‘å·¦çš„èŒƒå›´
            new_position = 0;
        }
        return new_position
    }

    /**
     * ç»‘å®šå„ç§äº‹ä»¶
     */
    function bindingEvent() {
        //ç§»åŠ¨ç«¯å¤§å›¾åŒºåŸŸçš„ touchend äº‹ä»¶
        exzoom_img_ul.on("touchstart", function (event) {
            let coords = getCursorCoords(event);
            startX = coords.x;
            startY = coords.y;

            let left = exzoom_img_ul.css("left");
            exzoom_img_ul_position = parseInt(left);

            window.clearInterval(autoPlayInterval);//åœæ­¢è‡ªåŠ¨æ’­æ”¾
        });

        //ç§»åŠ¨ç«¯å¤§å›¾åŒºåŸŸçš„ touchmove äº‹ä»¶
        exzoom_img_ul.on("touchmove", function (event) {
            let coords = getCursorCoords(event);
            let new_position;
            endX = coords.x;
            endY = coords.y;

            //åªè·Ÿéšå…‰æ ‡ç§»åŠ¨
            new_position = exzoom_img_ul_position + endX - startX;
            new_position = checkNewPositionLimit(new_position);
            exzoom_img_ul.css("left", new_position);

        });

        //ç§»åŠ¨ç«¯å¤§å›¾åŒºåŸŸçš„ touchend äº‹ä»¶
        exzoom_img_ul.on("touchend", function (event) {
            //è§¦å±æ»‘åŠ¨,æ ¹æ®ç§»åŠ¨æ–¹å‘æŒ‰å€æ•°å¯¹é½å…ƒç´
            console.log(endX < startX);
            if (endX < startX) {
                //å‘å·¦æ»‘åŠ¨
                moveRight();
            } else if (endX > startX) {
                //å‘å³æ»‘åŠ¨
                moveLeft();
            }

            autoPlay();//æ¢å¤è‡ªåŠ¨æ’­æ”¾
        });

        //å¤§å±å¹•åœ¨æ”¾å¤§åŒºåŸŸç‚¹å‡»,åˆ¤æ–­å‘å·¦è¿˜æ˜¯å‘å³ç§»åŠ¨
        exzoom_zoom_outer.on("mousedown", function (event) {
            let coords = getCursorCoords(event);
            startX = coords.x;
            startY = coords.y;

            let left = exzoom_img_ul.css("left");
            exzoom_img_ul_position = parseInt(left);
        });

        exzoom_zoom_outer.on("mouseup", function (event) {
            let offset = ele.offset();

            if (startX - offset.left < boxWidth / 2) {
                //åœ¨æ”¾å¤§é•œçš„å·¦åŠéƒ¨åˆ†ç‚¹å‡»
                moveLeft();
            } else if (startX - offset.left > boxWidth / 2) {
                //åœ¨æ”¾å¤§é•œçš„å³åŠéƒ¨åˆ†ç‚¹å‡»
                moveRight();
            }
        });

        //è¿›å…¥ exzoom åœæ­¢è‡ªåŠ¨æ’­æ”¾
        ele.on("mouseenter", function () {
            window.clearInterval(autoPlayInterval);//åœæ­¢è‡ªåŠ¨æ’­æ”¾
        });
        //ç¦»å¼€ exzoom å¼€å§‹è‡ªåŠ¨æ’­æ”¾
        ele.on("mouseleave", function () {
            autoPlay();//æ¢å¤è‡ªåŠ¨æ’­æ”¾
        });

        //å¤§å±å¹•è¿›å…¥å¤§å›¾åŒºåŸŸ
        exzoom_zoom_outer.on("mouseenter", function () {
            exzoom_zoom.css("display", "block");
            exzoom_preview.css("display", "block");
        });

        //å¤§å±å¹•åœ¨å¤§å›¾åŒºåŸŸç§»åŠ¨
        exzoom_zoom_outer.on("mousemove", function (e) {
            let width_limit = exzoom_zoom.width() / 2,
                max_X = exzoom_zoom_outer.width() - width_limit,
                max_Y = exzoom_zoom_outer.height() - width_limit,
                current_X = e.pageX - exzoom_zoom_outer.offset().left,
                current_Y = e.pageY - exzoom_zoom_outer.offset().top,
                move_X = current_X - width_limit,
                move_Y = current_Y - width_limit;

            if (current_X <= width_limit) {
                move_X = 0;
            }
            if (current_X >= max_X) {
                move_X = max_X - width_limit;
            }
            if (current_Y <= width_limit) {
                move_Y = 0;
            }
            if (current_Y >= max_Y) {
                move_Y = max_Y - width_limit;
            }
            exzoom_zoom.css({"left": move_X + "px", "top": move_Y + "px"});

            exzoom_preview_img.css({
                "left": -move_X * exzoom_preview.width() / exzoom_zoom.width() + "px",
                "top": -move_Y * exzoom_preview.width() / exzoom_zoom.width() + "px"
            });
        });

        //å¤§å±å¹•ç¦»å¼€å¤§å›¾åŒºåŸŸ
        exzoom_zoom_outer.on("mouseleave", function () {
            exzoom_zoom.css("display", "none");
            exzoom_preview.css("display", "none");
        });

        //å¤§å±å¹•å…‰å®è¿›å…¥æ”¾å¤§é¢„è§ˆåŒºåŸŸ
        exzoom_preview.on("mouseenter", function () {
            exzoom_zoom.css("display", "none");
            exzoom_preview.css("display", "none");
        });

        //ç¼©ç•¥å›¾å¯¼èˆª
        exzoom_next_btn.on("click", function () {
            moveRight();
        });
        exzoom_prev_btn.on("click", function () {
            moveLeft();
        });

        exzoom_navSpan.hover(function () {
            imgIndex = $(this).index();
            move(imgIndex);
        });
    }

    /**
     * èšç„¦åœ¨å¯¼èˆªå›¾ç‰‡ä¸Š,å·¦å³ç§»åŠ¨éƒ½ä¼šè°ƒç”¨
     * @param direction: æ–¹å‘,right | left,å¿…å¡«
     */
    function move(direction) {
        if (typeof direction === "undefined") {
            alert("exzoom ä¸­çš„ move å‡½æ•°çš„ direction å‚æ•°å¿…å¡«");
        }
        //å¦‚æžœè¶…å‡ºå›¾ç‰‡æ•°é‡äº†,è¿”å›žç¬¬ä¸€å¼
        if (imgIndex > imgArr.length - 1) {
            imgIndex = 0;
        }

        //è®¾ç½®é«˜äº®
        exzoom_navSpan.eq(imgIndex).addClass(navHightClass).siblings().removeClass(navHightClass);

        //åˆ¤æ–­ç¼©ç•¥å›¾å¯¼èˆªæ˜¯å¦éœ€è¦é‡æ–°è®¾ç½®åç§»é‡
        let exzoom_nav_width = exzoom_nav.width();
        let nav_item_width = g.navItemMargin + g.navWidth + g.navBorder * 2; // å•ä¸ªå¯¼èˆªå…ƒç´ çš„å®½åº¦
        let new_nav_offset = 0;

        //ç›´æŽ¥å¯¹æ¯”å½“å‰ç´¢å¼•çš„å›¾ç‰‡å æ®çš„å®½åº¦å’Œexzoomçš„å®½åº¦çš„å·®ä½œä¸ºåç§»é‡å³å¯
        let temp = nav_item_width * (imgIndex + 1);
        if (temp > exzoom_nav_width) {
            new_nav_offset =  boxWidth - temp;
        }

        exzoom_nav_inner.css({
            "left": new_nav_offset
        });

        //åˆ‡æ¢å¤§å›¾
        let new_position = -boxWidth * imgIndex;
        //åœ¨ animate æ–¹æ³•å‰å…ˆè°ƒç”¨ stop() ,é¿å…ååº”è¿Ÿé’
        new_position = checkNewPositionLimit(new_position);
        exzoom_img_ul.stop().animate({"left": new_position}, 500);
        //å¤„ç†æ”¾å¤§åŒºåŸŸ
        previewImg(imgArr[imgIndex]);
    }

    /**
     * å¯¼èˆªå‘å³
     */
    function moveRight() {
        imgIndex++;//å…ˆå¢žåŠ  index,åŽé¢åˆ¤æ–­èŒƒå›´
        if (imgIndex > imgNum) {
            imgIndex = imgNum;
        }
        move("right");
    }

    /**
     * å¯¼èˆªå‘å·¦
     */
    function moveLeft() {
        imgIndex--;//å…ˆå‡å°‘ index,åŽé¢åˆ¤æ–­èŒƒå›´
        if (imgIndex < 0) {
            imgIndex = 0;
        }
        move("left");
    }

    /**
     * è‡ªåŠ¨æ’­æ”¾
     */
    function autoPlay() {
        if (g.autoPlay) {
            autoPlayInterval = window.setInterval(function () {
                if (imgIndex >= imgNum) {
                    imgIndex = 0;
                }
                imgIndex++;
                move("right");
            }, g.autoPlayTimeout);
        }
    }

    /**
     * é¢„è§ˆå›¾ç‰‡
     */
    function previewImg(image_prop) {
        if (image_prop === undefined) {
            return
        }
        exzoom_preview_img.attr("src", image_prop[0]);

        exzoom_main_img.attr("src", image_prop[0])
            .css({
                "width": image_prop[3] + "px",
                "height": image_prop[4] + "px"
            });
        exzoom_zoom_outer.css({
            "width": image_prop[3] + "px",
            "height": image_prop[4] + "px",
            "top": image_prop[5] + "px",
            "left": image_prop[6] + "px",
            "position": "relative"
        });
        exzoom_zoom.css({
            "width": image_prop[7] + "px",
            "height": image_prop[7] + "px"
        });
        exzoom_preview_img.css({
            "width": image_prop[8] + "px",
            "height": image_prop[9] + "px"
        });
    }

    /**
     * èŽ·å¾—å›¾ç‰‡çš„çœŸå®žå°ºå¯¸
     * @param url
     * @param callback
     */
    function getImageSize(url, callback) {
        let img = new Image();
        img.src = url;

        // å¦‚æžœå›¾ç‰‡è¢«ç¼“å­˜ï¼Œåˆ™ç›´æŽ¥è¿”å›žç¼“å­˜æ•°æ®
        if (typeof callback !== "undefined") {
            if (img.complete) {
                callback(img.width, img.height);
            } else {
                // å®Œå…¨åŠ è½½å®Œæ¯•çš„äº‹ä»¶
                img.onload = function () {
                    callback(img.width, img.height);
                }
            }
        } else {
            return {
                width: img.width,
                height: img.height
            }
        }
    }

    /**
     * è®¡ç®—å›¾ç‰‡å±žæ€§
     * @param image : jquery å¯¹è±¡æˆ– å›¾ç‰‡urlåœ°å€
     * @param width : image ä¸ºå›¾ç‰‡urlåœ°å€æ—¶æŒ‡å®šå®½åº¦
     * @param height : image ä¸ºå›¾ç‰‡urlåœ°å€æ—¶æŒ‡å®šé«˜åº¦
     * @returns {Array}
     */
    function copute_image_prop(image, width, height) {
        let src;
        let res = [];

        if (typeof image === "string") {
            src = image;
        } else {
            src = image.attr("src");
            let size = getImageSize(src);
            width = size.width;
            height = size.height;
        }

        res[0] = src;
        res[1] = width;
        res[2] = height;
        let img_scale = res[1] / res[2];

        if (img_scale === 1) {
            res[3] = boxHeight;//width
            res[4] = boxHeight;//height
            res[5] = 0;//top
            res[6] = 0;//left
            res[7] = boxHeight / 2;
            res[8] = boxHeight * 2;//width
            res[9] = boxHeight * 2;//height
            exzoom_nav_inner.append(`<span><img src="${src}" width="${g.navWidth }" height="${g.navHeight }"/></span>`);
        } else if (img_scale > 1) {
            res[3] = boxHeight;//width
            res[4] = boxHeight / img_scale;
            res[5] = (boxHeight - res[4]) / 2;
            res[6] = 0;//left
            res[7] = res[4] / 2;
            res[8] = boxHeight * 2 * img_scale;//width
            res[9] = boxHeight * 2;//height
            let top = (g.navHeight - (g.navWidth / img_scale)) / 2;
            exzoom_nav_inner.append(`<span><img src="${src}" width="${g.navWidth }" style='top:${top}px;' /></span>`);
        } else if (img_scale < 1) {
            res[3] = boxHeight * img_scale;//width
            res[4] = boxHeight;//height
            res[5] = 0;//top
            res[6] = (boxHeight - res[3]) / 2;
            res[7] = res[3] / 2;
            res[8] = boxHeight * 2;//width
            res[9] = boxHeight * 2 / img_scale;
            let top = (g.navWidth - (g.navHeight * img_scale)) / 2;
            exzoom_nav_inner.append(`<span><img src="${src}" height="${g.navHeight}" style="left:${top}px;"/></span>`);
        }

        return res;
    }

// é—­åŒ…ç»“æŸ
})(jQuery, window);
