<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class CampaignsController extends AppController
{

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */

    public function create(){}


    public function define(){
        if($this->request->is("post")){
            $resources = $this->request->data;
            if(!empty($resources)){
                $session = $this->request->session();
                $session->write("Campaign",$resources);
            }else{
                $this->redirect(["controller"=>"Campaigns","action"=>"create"]);
            }
        }else{
            $this->redirect(["controller"=>"Campaigns","action"=>"create"]);
        }
    }


    public function createCampaign(){
        $result = false;

        if($this->request->is("post")){
            $session_data = $this->request->session()->read();
            $campaigndata = $this->request->data;
            $campaigndata = array_merge($campaigndata,$session_data["Campaign"]);

            $campaign_config = $this->Campaigns->getAll()['campaign_config'];
            $block_mapping = $this->Campaigns->getAll()['block_mapping'];

            $sections = explode(",", $campaigndata["sections"]);
            $blocks = [];

            foreach ($sections as $s) {
                $blocks = array_merge($blocks, $block_mapping[$s]);
            }

            $campaign_config["blocks"] = $blocks;
            $campaign_config["start"] = $campaigndata["start"];
            $campaign_config["end"] = $campaigndata["end"];

            if(isset($campaigndata["image-select"])){
                $images = $this->Campaigns->getAll()['images'];

                if(isset($campaign_config['autoPlay']) && isset($campaign_config['loop']) && isset($campaign_config['audio'])){
                    unset($campaign_config['autoPlay']);
                    unset($campaign_config['loop']);
                    unset($campaign_config['audio']);
                }

                $campaign_config['type'] = 'image';

                foreach ($images as $images_key => $images_value) {
                    if($campaigndata['image-select'] == $images_key){
                        $campaign_config['url'] = $images_value['url'];
                        $campaign_config['thumbnail'] = $images_value['thumbnail'];
                    }
                }

            }else if(isset($campaigndata["video-select"])){
                $videos = $this->Campaigns->getAll()['videos'];

                $campaign_config['type'] = 'video';
                $campaign_config['autoPlay'] = 'true';
                $campaign_config['loop'] = 'true';
                $campaign_config['audio'] = 'false';

                foreach ($videos as $videos_key => $videos_value) {
                    if($campaigndata['video-select'] == $videos_key){
                        $campaign_config['url'] = $videos_value['url'];
                        $campaign_config['thumbnail'] = $videos_value['thumbnail'];
                    }
                }
                
            }else{
                debug("Your campaign could not be created.");
                debug($campaign_config);
            }

            $result = $this->Campaigns->addCampaign($campaign_config);
        }
        if($result){
            $this->redirect(["controller"=>"Campaigns","action"=>"index"]);
        }else{
            debug("Your campaign could not be created.");
            debug($campaign_config);
        }
    }


    public function delete(){
        $this->autoRender = false;

        $campaign_config = $this->Campaigns->getAll()['campaign_config'];

        if(isset($campaign_config['autoPlay']) && isset($campaign_config['loop']) && isset($campaign_config['audio'])){
            unset($campaign_config['autoPlay']);
            unset($campaign_config['loop']);
            unset($campaign_config['audio']);
        }

        $campaign_config['url'] = "";
        $campaign_config['type'] = "none";

        $result = $this->Campaigns->addCampaign($campaign_config);
        if($result){
            $this->redirect(['action'=>"index"]);
        }else{
            debug("Your current campaign could not be deleted.");
        }
    }


    public function index(){
        $campaign_config = $this->Campaigns->getAll()['campaign_config'];
        $this->set(['campaign_config'=>$campaign_config]);
    }    

}
