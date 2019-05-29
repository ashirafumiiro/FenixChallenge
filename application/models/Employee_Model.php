<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/27/19
 * Time: 11:40 PM
 */

class Employee_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public  function get_user(){
        $query = $query = $this->db->get_where('employees_table', array('id' => $this->input->post('id'),
            'password' => $this->input->post('password')));
        return $query->row_array();

    }

    public function get_user2()
    {
        if (isset($_SESSION['id'])){
            $query = $query = $this->db->get_where('employees_table', array('id' => $_SESSION['id']));
            return $query->row_array();
        }
        return "";
    }

    public function accrue_points()
    {
        $query = $this->db->get('employees_table');
        foreach ($query->result_array() as $row){
            $points_accrued = $row['points_accrued'];
            $id = $row['id'];
            $total_points = 0;

            $query2 = $this->db->get_where('employees_seniority', array('id'=>$id));

            foreach ($query2->result_array() as $row2){
                $seniority_points = $this->get_sen_point($row2['seniority']);
                $start_date = $row2['start_date'];
                $tenure_multiplier = $this->get_tenure_multiplier($start_date);
                $total_points += $seniority_points * $tenure_multiplier;
            }
            echo "Month Points\t";
            echo $id."\tPoints: ".$total_points."\n";

            //update database
            $data = array(
                'points_accrued' => $points_accrued + $total_points
            );


            $this->db->update('employees_table', $data, array('id' => $id));

        }


    }

    public function get_tenure_multiplier($start_date)
    {
        $started = new DateTime($start_date);
        $now = new DateTime();
        $sinceThen = $started->diff($now); //difference between the two years
        $years = $sinceThen->y;  //years that have passed
        $multiplier = 100/100.0; //for 100% for 0-2 years

        if (($years >= 2) && ($years < 4)) //2-4 years
            $multiplier = 125/100.0;
        elseif ($years >= 4)               // 4+ years
            $multiplier = 150/100.0;

        return $multiplier;

    }

    private function get_sen_point($seniority)
    {
        $pt = 0;
        switch ($seniority){
            case 'A':
                $pt= 5;
                break;
            case 'B':
                $pt= 10;
                break;
            case 'C':
                $pt= 15;
                break;
            case 'D':
                $pt= 20;
                break;
            case 'E':
                $pt= 25;
                break;
        }
        return $pt;
    }

}