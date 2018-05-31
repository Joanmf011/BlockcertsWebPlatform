function onloadBlockmap(error){
    var lock = [];

    if(error){
        console.error(error);
        return

    }
    blockmap.setElementUnavailable(lock);

    var ar = setSize("blockmap");//Poner aspecto adecuado
    blockmap.setAspectRatio(ar);
}

//Funcion clicar en bloque
function onBlockClick(block) {

    var id = block.id;
    var seating = id.split('-');
    var raw_block = seating[0].split('_');

    if (block.isAvailable() && !block.isSelected()){
        blockmap.select(block);
    }else{
        blockmap.unselect(block);
    }
    createSelectionCards();

    /*var block_id = raw_block[1];
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
        
    }*/
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

function windowLoop(){
    var ow = general_config.window.innerWidth;
    var oh = general_config.window.innerHeight;
    var nw = window.innerWidth;
    var nh = window.innerHeight;

    if(ow!=nw || oh!=nh){
        //set3DviewSize();
        setSubInterfaceSize();
        general_config.window.innerWidth = nw;
        general_config.window.innerHeight = nh;

    }
    general_config.window.animation = requestAnimationFrame(windowLoop);
}

function toggleSelectAll(){
    if(blockmap.getAllElements().length == blockmap.getSelected().length){
        blockmap.unselectAll();
    }else{
        blockmap.select(blockmap.getAllElements());
    }
    createSelectionCards();
}

function createSelectionCards(){
    var selected_blocks = blockmap.getSelected();

    $(".selectionCard").remove();

    for (var i = selected_blocks.length - 1; i >= 0; i--) {
        var card = '<div class="selectionCard block-blue">'+selected_blocks[i]['id']+'</div>';
        $("#sub-interface").append(card);
    }

    if(blockmap.getAllElements().length == blockmap.getSelected().length){
        $("#toggleSelectButton").html("<span class='ti-close'></span> Unselect all");
    }else{
        $("#toggleSelectButton").html("<span class='ti-check'></span> Select all");
    }

    defineToggleDisabled();

}

function setSubInterfaceSize(){

    var h = $("#main-interface").height();

    $("#sub-interface").height(h);
}