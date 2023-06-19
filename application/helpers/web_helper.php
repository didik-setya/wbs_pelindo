<?php
function load_template_email(){
    $t = get_instance();
    $view = $t->load->view('user/template_email');
}

function get_menu(){
    $t = get_instance();
    $role = $t->session->userdata('role');

    $t->db->select('
        menu.*
    ')->from('menu')
    ->join('menu_access', 'menu.id_menu = menu_access.id_menu')
    ->where('menu_access.id_role', $role);
    
    $menu = $t->db->get()->result();
    return $menu;
}

function access_menu(){
    $t = get_instance();

    $id_role = $t->session->userdata('role');
    $url1 = $t->uri->segment('1');
    $url2 = $t->uri->segment('2');

    $full_url = $url1 .'/'. $url2;
    $get_access = $t->db->select('
        menu.*
    ')->from('menu')->join('menu_access', 'menu.id_menu = menu_access.id_menu')->where('menu_access.id_role', $id_role)->where('menu.link', $full_url)->get()->row();

    if($t->db->affected_rows() < 1){
        exit('Error 403. Access denied');
    }
}

function valid_ajax(){
    $t = get_instance();
    if($t->input->is_ajax_request()){
        return true;
    } else {
        exit('No direct script access allowed');
    }
}

function jenis_laporan(){
    $data = [
        'Indikasi Penipuan',
        'Indikasi Benturan Kepentingan',
        'Indikasi Pencurian',
        'Indikasi Tindakan Curang',
        'Indikasi Penyuapan',
        'Indikasi Korupsi',
        'Indikasi Penggelapan',
        'Indikasi Pelanggaran & Peraturan Perusahaan',
        'Indikasi Pemerasan'
    ];
    return $data;
}

function get_member(){
    $t = get_instance();

    $email = $t->session->userdata('email_member');
    $member = $t->db->where('email', $email)->get('member')->row();
    return $member;
}

function get_pelapor(){
    $t = get_instance();

    $email = $t->session->userdata('email_user');
    $user = $t->db->where('email', $email)->get('pelapor')->row();
    return $user;
}

function check_user_login(){
    $t = get_instance();
    $email = $t->session->userdata('email_user');
    if(!$email){
        redirect('login');
    }
}

function check_member_login(){
    $t = get_instance();
    $email = $t->session->userdata('email_member');
    if(!$email){
        redirect('auth');
    }
}