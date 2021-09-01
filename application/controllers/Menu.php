<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        login();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] = "WP-Login | ";
        $data['title'] = "Menu Management";

        $data['dataMenu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Add new menu success! </div>');
            redirect('menu');
        }
    }

    public function getIdMenu()
    {
        echo json_encode($this->db->get_where('user_menu', ['id' => $_POST['id']])->row_array());
    }

    public function editMenu()
    {
        $data['dataMenu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->set('menu', $this->input->post('menu'));
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user_menu');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Edit menu success! </div>');
            redirect('menu');
        }
    }

    public function deleteMenu()
    {
        $data['dataMenu'] = $this->db->get('user_menu')->result_array();

        $this->db->where('menu_id', $this->input->post('id'));
        $this->db->delete('user_sub_menu');

        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Delete menu success! </div>');
        redirect('menu');
    }

    public function submenu()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['web'] = "WP-Login | ";
        $data['title'] = "Submenu Management";

        $querySubmenu = "SELECT * FROM user_menu, user_sub_menu 
                        WHERE user_menu.id = user_sub_menu.menu_id 
                        ORDER BY user_sub_menu.menu_id";

        $data['dataSubmenu'] = $this->db->query($querySubmenu)->result_array();

        $data['dataMenu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('is_active', 'Is Active', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Add new submenu success! </div>');
            redirect('menu/submenu');
        }
    }

    public function getIdSubmenu()
    {
        echo json_encode($this->db->get_where('user_sub_menu', ['id' => $_POST['id']])->row_array());
    }

    public function editSubmenu()
    {
        $querySubmenu = "SELECT * FROM user_menu, user_sub_menu 
        WHERE user_menu.id = user_sub_menu.menu_id 
        ORDER BY user_sub_menu.menu_id";

        $data['dataSubmenu'] = $this->db->query($querySubmenu)->result_array();

        $data['dataMenu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('is_active', 'Is Active', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user_sub_menu');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Edit submenu success! </div>');
            redirect('menu/submenu');
        }
    }

    public function deleteSubmenu()
    {
        $querySubmenu = "SELECT * FROM user_menu, user_sub_menu 
        WHERE user_menu.id = user_sub_menu.menu_id 
        ORDER BY user_sub_menu.menu_id";

        $data['dataSubmenu'] = $this->db->query($querySubmenu)->result_array();

        $data['dataMenu'] = $this->db->get('user_menu')->result_array();

        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Delete submenu success! </div>');
        redirect('menu/submenu');
    }
}
