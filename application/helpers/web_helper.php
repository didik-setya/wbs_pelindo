<?php
function load_template_email(){
    $t = get_instance();
    $view = $t->load->view('user/template_email');
}