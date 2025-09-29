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
            $this->pagination->initialize($total_rows, $records_per_page, $page, 'admin/user-management?q='.$q );
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

     public function createAdmin() {

        $this->form_validation
            ->name('first_name')
                ->required()
                ->max_length(250)
            ->name('last_name')
                ->required()
                ->max_length(250)
            ->name('username')
                ->required()
                ->max_length(20)
            ->name('password')
                ->required()
                ->min_length(8)
                ->max_length(100)
            ->name('confirm_password')
                ->required()
                ->min_length(8)
                ->max_length(100)
            ->name('email')
                ->required()
                ->valid_email();

        // Run validation
        if($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->get_errors();
            setErrors($errors);
            redirect('/register');
            return;
        }

        // Get form input
        $first_name = $this->io->post('first_name');
        $last_name  = $this->io->post('last_name');
        $username   = $this->io->post('username');
        $email      = $this->io->post('email');
        $password   = $this->io->post('password');
        $confirm    = $this->io->post('confirm_password');

        // Check existing email/username
        if($this->UserModel->findByEmail($email)) {
            setMessage('danger', 'Email already exists!');
            redirect('register');
            return;
        }

        if($this->UserModel->findByUsername($username)) {
            setMessage('danger', 'Username already exists!');
            redirect('register');
            return;
        }

        // Check password confirmation
        if($password !== $confirm) {
            setMessage('danger', 'Passwords do not match!');
            redirect('register');
            return;
        }
        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['profile_picture']; 

            // Load upload library with file
            $this->call->library('upload', $file);

            $this->upload
                ->set_dir('uploads') // siguraduhin na may uploads/ folder sa loob ng public/
                ->allowed_extensions(['jpg','jpeg','png'])
                ->allowed_mimes(['image/jpeg','image/png'])
                ->max_size(2)
                ->is_image()
                ->encrypt_name();

            if ($this->upload->do_upload()) {
                // Save relative path, not just filename
                $filename   = $this->upload->get_filename();
        $profilePic = 'uploads/' . $filename;
            } else {
                $errors = $this->upload->get_errors();
                setMessage('warning', implode(", ", $errors));

                // default image path
                $profilePic = "uploads/default.png";
            }
        } else {
            $profilePic = "uploads/default.png";
        }


        // Insert user
        $this->UserModel->insert([
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'username'   => $username,
            'email'      => $email,
            'password'   => password_hash($password, PASSWORD_DEFAULT),
            'profile_picture' => $profilePic,
            'role' => "admin"

        ]);

        setMessage('success', 'Admin created successfully!');
        redirect('/admin/user-management');
    }



}