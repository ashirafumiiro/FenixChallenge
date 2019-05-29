<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/28/19
 * Time: 5:19 PM
 */

class CLI_Update extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_Model');
    }


    public function index()
    {
        if (is_cli()){  // only executed in CLI
            $this->Employee_Model->accrue_points();
        }
        else{
            show_404();
        }
    }

}