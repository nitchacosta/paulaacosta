<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: Admin_Controller
 * 
 * Automatically generated via CLI.
 */
class Admin_Controller extends Controller {
    public function __construct()
    {
        parent::__construct();
    }



     public function read(){
            $page = 1;
            if(isset($_GET['page']) && ! empty($_GET['page'])) {
                $page = $this->io->get('page');
            }

            $q = '';
            if(isset($_GET['q']) && ! empty($_GET['q'])) {
                $q = trim($this->io->get('q'));
            }

            $records_per_page = 3;

            // Get paginated data from model
            // $data['getAll'] = $this->User_Model->getAll(); 
            $all = $this->UserModel->getAll($q, $records_per_page, $page);

            $data['getAll'] = $all['records'];
            $total_rows = $all['total_rows'];

            // Setup pagination appearance & behavior
            $this->pagination->set_options([
                'first_link'     => '⏮ First',
                'last_link'      => 'Last ⏭',
                'next_link'      => 'Next →',
                'prev_link'      => '← Prev',
                'page_delimiter' => '&page='
            ]);

            $this->pagination->set_theme('bootstrap'); 
            $this->pagination->initialize($total_rows, $records_per_page, $page, 'dashboard?q='.$q );
            // site_url('admin').'?q='.$q ito yung error ko kanina, idk bakit 
            $data['page'] = $this->pagination->paginate();
            $this->call->view('admin/dashboard', $data);
        }


    public function updateUser($id){

        $first_name = $this->io->post('first_name');
        $last_name  = $this->io->post('last_name');
        $username   = $this->io->post('username');
        $email      = $this->io->post('email');
        // $password   = $this->io->post('password');
        // $confirm    = $this->io->post('confirm_password');

        
        $this->UserModel->update($id, [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'username' => $username,
            'email' => $email,
        ]);
         setMessage('success', 'Update succesfully!');
            redirect('/admin/user-management');

    }

         public function deleteUser($id){
        
            $this->UserModel->delete($id);
            setMessage('danger', 'User delete successfully!');
            redirect('/admin/user-management');      

        }


}