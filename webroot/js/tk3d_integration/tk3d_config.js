var venue_id = 'eu-es-00036-activation';
var tk3d = new TICKETING3D(venue_id);

var general_config = {
    language: "en",
    interface: {
        blockmap:{
            type:"main",
            id: false,
            main: true
        }
    },
    current: 'blockmap',
    window:{
        innerWidth:window.innerWidth,
        innerHeight:window.innerHeight,
        animation : requestAnimationFrame(windowLoop)
    }
};

var blockmap_config ={
    module: "map",
    container: "blockmap",
    plugins:["SelectionPlugin","ZoomButtonsPlugin"],
    config:{
        callbacks:{
            block:{
                click:onBlockClick
            }
        },
        selection:{
            block:{
                flags:{
                    multiple_selection: true,
                    keep_selection: false,
                    user_selection: false,
                    available_by_default: true,
                    max_selection: "infinity"
                }
            }
        }
    }
};


var blockmap = tk3d.loadModule(blockmap_config);

blockmap.loadMap('blockmap', onloadBlockmap);