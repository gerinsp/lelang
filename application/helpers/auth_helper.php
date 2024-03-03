<?php
function cekuser()
{
    $ci = get_instance();

    if (!$ci->session->userdata('username')) {
        redirect('login');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);


        // $ci->db->select('*');
        // $ci->db->where("url = '$menu' or url_1 = '$menu' or url_2 = '$menu' or url_3 = '$menu' or url_4 = '$menu'");
        // $queryMenu = $ci->db->get('user_menu')->row_array();

        // $menu_id =$queryMenu['id'];

        // $userAccess = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

        //     if ($userAccess->num_rows()<1) {
        //         redirect("blocked");
        //     }




    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
function check_buttontambah($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $ci->db->where('add_btn = 1');
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function check_buttonedit($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $ci->db->where('update_btn = 1');
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
function check_buttonhapus($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $ci->db->where('delete_btn = 1');
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function check_buttondetail($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $ci->db->where('detail_btn = 1');
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function dd($param)
{
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
    die;
}

function user_can($halaman)
{
    $ci = &get_instance();

    $id_user = $ci->session->userdata('id_user');

    $ci->db->select('tp.id as id_permission, tp.*, th.id as id_halaman, th.*');
    $ci->db->from('tbl_permission as tp');
    $ci->db->where('tp.id_user', $id_user);
    $ci->db->join('tbl_halaman as th', 'tp.id_halaman = th.id', 'left');

    $query = $ci->db->get();

    if ($query->num_rows() > 0) {
        $result = $query->result();

        foreach ($result as $row) {
            if ($row->id_halaman != null && $row->nama_halaman == $halaman) {
                return true;
            }
        }
    }

    return false;
}
