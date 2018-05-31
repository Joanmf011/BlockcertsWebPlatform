<?php
/**
 * El fichero contiene la clase ClientsTable
 */

namespace App\Model\Table;

use App\Model\Table\AppTable;

/**
 * Acceso a clients a través de la API
 */
class UsersTable extends AppTable
{
    // PUBLIC VARS =============================================================
    /**
     * Url base
     *
     * @var string $url
     */
    
    private $data = [];

    // PUBLIC FUNCTIONS ========================================================
    /**
     * Obtener lista
     */

    public function initialize(array $config){
        $this->addBehavior('Timestamp');

        $string = file_get_contents(APP."/Model/JSON/users.json");
        $json_a = json_decode($string, true);

        $RolesModel = new RolesTable();
        $roles = $RolesModel->getAll();

        foreach ($json_a as $key => $value) {
            $this->data[$key] = $value;
            $this->data[$key]["role"] = $roles[$value["role_id"]]["name"];
        }
    }

    public function addUser($data){
        return true;
    }

    public function deleteUser($data){
        return true;
    }

    public function editById($id){
        return $this->data[$id];
    }

    public function getAll(){
        return $this->data;
    }

    public function list(){
        // Obtenemos la lista de paises
        $response = $this->curlGet($this->url);
        $result = [];
        if ($response["code"] == 200) {
            // $items = json_decode($response["result"], true);
            foreach ($response["result"] as $item) {
                $result[$item["id"]] = $item["id"];
            }

        }
        return $result;
    }

    public function login($post_data){
        $valid = false;

        foreach($this->data as $d){
            if(($post_data['username'] == $d['username']) && ($post_data['password'] == $d['password'])){         
                $valid = true;
                break;
            }
        }
        return $valid;
    }

}
