<?php

    function check_logged(){

        $ci = get_instance();

        if(!$ci->session->userdata('email')){
            redirect('auth');
        }else{
            $role_id = $ci->session->userdata('level_id');
            $menu = $ci->uri->segment(1);

            $queryAccess = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
            $menu_id = $queryAccess['id_menu'];

            $userAccess = $ci->db->get_where('user_access_menu', [
                'level_id' => $role_id, 
                'menu_id' => $menu_id
            ]);
            

            // $u = $userAccess->num_rows();
            // echo $u;
            if($userAccess->num_rows() < 1){
                redirect('auth/blocked');
            }
        }
    }

    function check_access($role_id, $menu_id){
    
        $ci = get_instance();

        $userAccess = $ci->db->get_where('user_access_menu', [
            'level_id' => $role_id, 
            'menu_id' => $menu_id
        ]);
        
        // $u = $userAccess;
        // echo $u;
        if($userAccess->num_rows() > 0 ){
            return "checked";
        }

        // $ci->db->where('level_id', $role_id);
        // $ci->db->where('menu_id', $menu_id);
        // $result = $ci->db->get('user_access_menu');

        // var_dump($result);
        // if($result->num_rows() < 0){
        //     return "checked='checked'";
        // }
    
    }