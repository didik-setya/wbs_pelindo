<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Datatable_model extends CI_Model {


    //get datatable user
    private function get_user(){
        $search = ['nama'];
        $order = ['id_member' => 'asc'];
        $column_order = [null, 'nama', null, null];

        $this->db->from('member');
        $i = 0;
        foreach($search as $s){
            if($_POST['search']['value']){
                if($i === 0){
                    $this->db->group_start();
                    $this->db->like($s, $_POST['search']['value']);
                } else {
                    $this->db->or_like($s, $_POST['search']['value']);
                }

                if(count($search) -1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if(isset($_POST['order'])){
            $this->db->order_by($order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by(key($order), $order[key($order)]);
        }

    }

    public function get_data_user(){
        $this->get_user();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_user(){
        $this->get_user();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_user(){
        $this->db->from('member');
        return $this->db->count_all_results();
    }






    //get datatable report
    private function get_report(){
        $search = ['create_at', 'hal_terjadi', 'unit_kerja_laporan'];
        $order = ['create_at', 'desc'];
        $column_order = [null, 'create_at', 'hal_terjadi', 'unit_kerja_laporan', null];

        $this->db->from('laporan');
        $i = 0;
        foreach($search as $s){
            if($_POST['search']['value']){
                if($i === 0){
                    $this->db->group_start();
                    $this->db->like($s, $_POST['search']['value']);
                } else {
                    $this->db->or_like($s, $_POST['search']['value']);
                }

                if(count($search) -1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if(isset($_POST['order'])){
            $this->db->order_by($order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by(key($order), $order[key($order)]);
        }

    }

    public function get_data_report(){
        $this->get_report();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_report(){
        $this->get_report();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_report(){
        $this->db->from('laporan');
        return $this->db->count_all_results();
    }

}