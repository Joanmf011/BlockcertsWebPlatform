<?php
/**
 * El fichero contiene la clase CampaignsTable
 */

namespace App\Model\Table;

use App\Model\Table\AppTable;

/**
 * Gestión de campañas de Activation3D
 */
class CampaignsTable extends AppTable
{
    // PUBLIC VARS =============================================================
    /**
     * Url base
     *
     * @var string $url
     */
    
    private $data = [];

    // PUBLIC FUNCTIONS ========================================================

    public function initialize(array $config){
        $this->addBehavior('Timestamp');

        $string = file_get_contents(APP."/Model/JSON/campaign_config.json");
        $campaign_config = json_decode($string, true);

        $string = file_get_contents(APP."/Model/JSON/block_mapping.json");
        $block_mapping = json_decode($string, true);

        $string = file_get_contents(APP."/Model/JSON/images.json");
        $images = json_decode($string, true);

        $string = file_get_contents(APP."/Model/JSON/videos.json");
        $videos = json_decode($string, true);

        $this->data['campaign_config'] = $campaign_config;
        $this->data['block_mapping'] = $block_mapping;
        $this->data['images'] = $images;
        $this->data['videos'] = $videos;
    }

    public function addCampaign($campaign_config){
        $fh = fopen(APP."Model/JSON/campaign_config.json", 'w')
              or die("Error opening output file");
        fwrite($fh, json_encode($campaign_config,JSON_UNESCAPED_UNICODE));
        fclose($fh);
        $fh = fopen("data/campaign_config.json", 'w')
              or die("Error opening output file");
        fwrite($fh, json_encode($campaign_config,JSON_UNESCAPED_UNICODE));
        fclose($fh);
        return true;
    }

    public function deleteCampaign($data){
        return true;
    }

    public function editById($id){
        return $this->data[$id];
    }

    public function getAll(){
        return $this->data;
    }

    /**
     * Obtener lista
     */
    public function list()
    {
        // Obtenemos la lista de paises
        $response = $this->curlGet($this->url);

        debug($response);
        exit;
        $result = [];
        if ($response["code"] == 200) {

            // $items = json_decode($response["result"], true);
            foreach ($response["result"] as $item) {
                $result[$item["id"]] = $item["id"];
            }

        }

        return $result;

    }
}
