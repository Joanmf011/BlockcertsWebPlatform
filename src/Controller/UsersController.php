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
class UsersController extends AppController
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

    private function validateFields($data=array(),$fields=array()){
        $valid = false;
        $nvalid = 0;
        foreach($fields as $f){
            if(isset($data[$f]) && !empty($data[$f])){
                $nvalid++;
            }
        }

        if($nvalid == count($fields)){
            $valid = true;
        }

        return $valid;
    }

    // -----------------------------------------------------------

    public function add(){

    }

    public function addpost(){
        $this->autoRender = false;
        $data = $this->request->data;
        $this->Users->addUser($data);

    }

    public function delete(){
        $this->autoRender = false;
        $this->redirect(['action'=>"index"]);
    }

    public function edit($id){
        $data = $this->Users->editById($id);
        $this->set(['data'=>$data]);
        if($this->request->is("post")){
            $post = $this->request->data;
            if($post){
                var_dump($post);           
            }
        }
    }

    public function index(){
        $users = $this->Users->getAll();
        $this->set(['users'=>$users]);
    }

    public function login(){
        $this->viewBuilder()->setLayout('login');
        if($this->request->is("post")){
            $post = $this->request->data;
            $fields_tovalidate = array("username", "password");
            $valid_data = $this->validateFields($post, $fields_tovalidate);

            if($valid_data){
                if($this->Users->login($post)){
                    $this->redirect(["controller"=>"Certificates","action"=>"index"]);
                }            
            }
            
        }
    }

    public function view($id){
        
    }
    
}
