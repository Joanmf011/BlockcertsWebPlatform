function defaultSelectedData(){
    $(".section-val").text("");
    $(".row-val").text("");
    $(".seat-val").text("");
    $(".section-lab").text("");
    $(".row-lab").text("");
    $(".seat-lab").text("");

    writeGuideTitle();
}


function goBack(){
    var current = general_config.current;
    
    if(current=='seatmap'){
        setBlockmapDefaultDOM();
    }else if(current=='view3d'){
        setSeatmapDefaultDOM();
    }
    writeGuideTitle();
}

function goHome(){
    setBlockmapDefaultDOM();
    return null;
}

function isMinimap(map){
    var type = general_config.interface[map].type;
    var ret = false;
    if(type=='mini'){
        ret = true;
    }
    return ret;
}

function isMobile(){
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        return true;
    }
    // }else if($(window).width()<=992){
    //     return true;
    // }
    else{
        return false;
    }
}


//Funcion clicar en bloque
function onBlockClick(block) {

    var id = block.id;
    var seating = id.split('-');
    var raw_block = seating[0].split('_');

    var block_id = raw_block[1];
    general_config.interface.blockmap.id = id;
    //Comprobar disponibilidad
    if (block.isAvailable() && general_config.interface.blockmap.type!='mini') {
        blockmap.setContainer("blockmap-mini");
        $("#blockmap-mini").addClass("active");
        blockmap.select(block);
        blockmap.setMaxZoom(1);
        blockmap.setMinZoom(1);
        selectedDataWrite(block);
        seatmap.loadMap(block.id, onloadSeatmap);
        seatmap.updateSize();
        
    }

}

function onBlockmapMiniClick(){
    setBlockmapDefaultDOM();
    return null;
}
function onSeatmapMiniClick(){
    setSeatmapDefaultDOM();
    return null;
}
function onload3Dview(error) {
    if(error){
        console.error(error);
        return;
    }
    general_config.current='view3d';
    general_config.interface.seatmap.main = false;
    writeGuideTitle();
    return null;
}

function onloadBlockmap(error){
    var lock = [];

    if(error){
        console.error(error);
        return

    }
    blockmap.setElementUnavailable(lock);

    var ar = setSize("blockmap");//Poner aspecto adecuado
    blockmap.setAspectRatio(ar);
    setSubInterfaceSize('blockmap');
    general_config.interface.blockmap.currentHeight = $("#blockmap").height();
    general_config.interface.seatmap.currentHeight = null;
    writeGuideTitle();
    selectedDataWrite();
}


//Funcion cargar asientos
function onloadSeatmap(err){

    popoverDestroy();
    if (err) {
        console.error(err);
        return;
    }

    // $("#block-map").hide();
    blockmap.updateSize();
    blockmap.setSize('blockmap');
    
    general_config.interface.blockmap.main = false;
    general_config.interface.blockmap.type = 'mini';
    general_config.interface.seatmap.main = true;
    general_config.interface.seatmap.type = 'main';


    general_config.current = 'seatmap';
    //seatmap.setAvailability([]);
    //ajax_getAvailability();
    seatmap.setContainer("seatmap");
    var ar = setSize("seatmap");//Poner aspecto adecuado
    seatmap.setAspectRatio(ar);
    general_config.interface.seatmap.currentHeight = $("#seatmap").height();
    seatmap.setMaxZoom(6);
    seatmap.setMinZoom(1);
    writeGuideTitle();
    setSubInterfaceSize('seatmap');
    setMobileDom();
}

function onSeatClick(seatObj) {

    var id = seatObj.id;
    var seating = id.split('-');
    var raw_block = seating[0].split('_');

    var block_id = raw_block[1];
    var row_id = seating[1];
    var seat_id = seating[2];
    //comprobar dispo

    if(seatObj.isAvailable() && general_config.interface.seatmap.type!='mini'){
        //seleccion
        seatmap.select(seatObj.id);
        selectedDataWrite(seatObj);
        view3d_module.load(seatObj.id,onload3Dview);
        setSeatmapMini();
    }
}


/*Popup*/

/**
 * Destruye todos los popover.
 * @author Isidro Fuentes <isidro@mobilemediacontent.com>
 * @param void
 * @return void
 */
function popoverDestroy(obj){
    $(".popover").each(function(){
        $(this).popover("destroy");
    });
}


 /**
 * Update de la información del bloque en el popup al hacer hover en un asiento.
 * @author Isidro Fuentes <isidro@mobilemediacontent.com>
 * @param obj : silla del seatmap
 * @return void
 */

function popoverGetContentBlock(obj){
    var id = obj.id;
    var section = id.split("_")[1];
    var lang = general_config.language;
    var content = "<ul class='list-unstyled ticket-selected'>"+
                        "<li>"+
                            "<span class='ticket-lab'>"+json_lang[lang].section+"</span> "+
                            "<span class='ticket-val'>"+section+"</span>"+
                        "</li>"+
                    "</ul>";
    return content;
}

 /*
 function popoverGetContentPrice(){
    var lang = general_config.language;
    var pdisc = json_lang[lang].pricedisc;
    var content = "<div>"+pdisc+"</div>";
    return content;
 }*/
function popoverGetContentSeat(obj){
    var id = obj.id;
    var seating = id.split("-");
    var section= seating[0].split("_")[1];

    var row = seating[1];
    var seat = seating[2];

    var lang = general_config.language;

    var content = "<ul class='list-unstyled ticket-selected'>"+
                    "<li>"+
                        "<span class='ticket-lab'>"+json_lang[lang].section+"</span> "+
                        "<span class='ticket-val'>"+section+"</span>"+
                    "</li>"+
                    "<li>"+
                        "<span class='ticket-lab'>"+json_lang[lang].row+"</span> "+
                        "<span class='ticket-val'>"+row+"</span>"+
                    "</li>"+
                    "<li>"+
                        "<span class='ticket-lab'>"+json_lang[lang].seat+"</span> "+
                        "<span class='ticket-val'>"+seat+"</span>"+
                    "</li>"+
                "</ul>";
    return content;
}


/**
 * Abre el popup al hacer hover en un asiento.
 * @author Isidro Fuentes <isidro@mobilemediacontent.com>
 * @param obj id
 * @param type string seat|block
 * @return void
 */
function popoverOpen(obj,type){
    /*Popover OBJ COnf*/
    var contentPopOver = false;

    if(type=='seat'){
        contentPopOver = popoverGetContentSeat(obj);
    }
    else{
        contentPopOver = popoverGetContentBlock(obj);
    }
    var confPopOver = {
        animation: true,
        container: "body",
        trigger: "manual",
        html: true,
        content: contentPopOver,
        placement: "right",
        template: '<div class="popover tk3dpopover" role="tooltip" style="pointer-events: none;">'+
        '<div class="arrow"></div>'+
        '<h3 class="popover-title"></h3>'+
        '<div class="popover-content"></div>'+
        '</div>'
    };
   /* var bb1 = obj.HTMLElement.getBoundingClientRect();
    var bb2 = $("#blockmap")[0].getBoundingClientRect();

    if (bb1.left > bb2.left + bb2.width * 0.5) confPopOver.placement = "right";
    else confPopOver.placement = "left";*/

    $(obj.HTMLElement).popover(confPopOver);
    $(obj.HTMLElement).popover("show");

}

function set3DviewSize(){
    if($("#view3d").hasClass("active")){
        if(general_config.interface.seatmap.currentHeight){
            $("#view3d").height(general_config.interface.seatmap.currentHeight);
        }else if (general_config.interface.blockmap.currentHeight){
            $("#view3d").height(general_config.interface.blockmap.currentHeight);
        }else{
            var h = $("#sub-interface").height();
            $("#view3d").height(h);
        }
        setSubInterfaceSize("view3d");
        view3d_module.fixedAspectRatio(false);
        view3d_module.responsive(true);
        if(isMobile()){
            view3d_module.responsive(false);
        }
    }
}
function setBlockmapDefaultDOM(){

    general_config.current = "blockmap";
    general_config.interface.blockmap.type = 'main';
    general_config.interface.blockmap.gomain = false;
    general_config.interface.seatmap.type = 'main';
    general_config.interface.blockmap.gomain = false;
    blockmap.setContainer("blockmap");
    var ar = setSize("blockmap");
    blockmap.setAspectRatio(ar);
    blockmap.setSize('blockmap');
    $(".interface-mini").removeClass("active");
    blockmap.setMaxZoom(6);
    blockmap.setMinZoom(1);
    //blockmap.setAvailability();
    seatmap.close();
    view3dClose();
    writeGuideTitle();
    setSubInterfaceSize('blockmap');
    var s = blockmap.getElementsByStatus("selected");
    if(s.length>=1){
        selectedDataWrite(s[0]);
    }
    return null;
}

function setElementActive(element){
    $(element).addClass("active");;
    return $(element);
}

function setMobileDom(){
    if(isMobile()){
        var lang = general_config.language;
        if(general_config.current=='seatmap'){
            var txt = 
            $(".mobile-section-tit").text("")
        }
    }
}

function setSeatmapDefaultDOM(){
    general_config.current = 'seatmap';
    general_config.interface.seatmap.type = 'main';
    general_config.interface.seatmap.main = true;
    seatmap.setContainer("seatmap");
    var ar = setSize("seatmap");
    seatmap.setAspectRatio(ar);
    seatmap.setSize('seatmap');
    $("#seatmap-mini").removeClass("active");
    seatmap.setMaxZoom(6);
    seatmap.setMinZoom(1);
    seatmap.updateSize();
    setSubInterfaceSize("seatmap");
    view3dClose();
    writeGuideTitle();

    return null;
}

//Funcion poner aspecto adecuado mapas en la pantalla
function setSize(mapcontainer_id){
    var bg = $("#"+mapcontainer_id).find(".svg-img-background");
    var ar = 0;
    if(bg.length>0){
        ar = bg[0].height.baseVal.value/bg[0].width.baseVal.value;
    }else{
        ar = 9/16;
    }
    return ar;
}

function setSeatmapMini(){
    seatmap.setContainer("seatmap-mini");
    $("#seatmap-mini").addClass("active");
    general_config.interface.blockmap.main = false;
    general_config.interface.blockmap.type = 'mini';
    general_config.interface.seatmap.main = false;
    general_config.interface.seatmap.type = 'mini';

    var ar = setSize("seatmap");//Poner aspecto adecuado
    seatmap.setAspectRatio(ar);

    seatmap.setMaxZoom(1);
    seatmap.setMinZoom(1);
    
    popoverDestroy();
    setSubInterfaceSize("view3d");
    view3dClose();
    set3DviewSize();
    return null;
}

function setSubInterfaceSize(interfaceid){
    $(".interface").removeClass("active");
    $("#"+interfaceid).addClass("active");

    $("#mapdata-interface").addClass("abs");
    $(".interface").each(function(){
        if($(this).hasClass("active")){ 
            var bh = $(this).height();
            $("#sub-interface").height(bh);
        }
    });
}


function selectedDataWrite(mapObj){
    var lang = general_config.language;
    if(mapObj){
        $(".ticket-selected").removeClass("hidden");
        var data = mapObj.id.split("_")[1].split("-");

        $(".section-lab").text("SELECTED "+json_lang[lang].section);
        var section = data[0];

        $(".section-val").text(section);

        $(".row-lab").text(json_lang[lang].row);
        $(".seat-lab").text(json_lang[lang].seat);
        $(".row-val").text("");
        $(".seat-val").text("");
        $(".row-lab").addClass("hidden");
        $(".seat-lab").addClass("hidden");
        if(data.length>1){
            //$(".guide-title").text(json_lang[lang].check_view3d);
            $(".section-lab").text(json_lang[lang].section);
            $(".row-lab").removeClass("hidden");
            $(".seat-lab").removeClass("hidden");
            $(".row-val").text(data[1]);
            $(".seat-val").text(data[2]);
        }
    }
    $(".buytickets-lab").text(json_lang[lang].buytickets);
}
function view3dClose(){
    $("#view3d").removeAttr("style");
    view3d_module.close();
    return null;
}

function writeGuideTitle(){
    var txt = false;
    var lang = general_config.language;
    $("#topbar .mt-e[data-action='back']").addClass("hidden");
    if (general_config.current=='blockmap'){
        txt = json_lang[lang].select_block;
    }else if(general_config.current=='seatmap'){
        txt = json_lang[lang].select_seat;
        $("#topbar .mt-e[data-action='back']").removeClass("hidden");

    }else{
        txt = json_lang[lang].check_view3d;
        $("#topbar .mt-e[data-action='back']").removeClass("hidden");
        $("#topbar .mt-e[data-action='home']").removeClass("hidden");
    }

    $(".guide-title").text(txt);
}
//RESIZE WINDOW
/*$( window ).resize(function() {
  set3DviewSize();
});*/

function windowLoop(){
    var ow = general_config.window.innerWidth;
    var oh = general_config.window.innerHeight;
    var nw = window.innerWidth;
    var nh = window.innerHeight;

    if(ow!=nw || oh!=nh){
        set3DviewSize();
        setSubInterfaceSize(general_config.current);
        general_config.window.innerWidth = nw;
        general_config.window.innerHeight = nh;

    }
    general_config.window.animation = requestAnimationFrame(windowLoop);
}
