<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: Auth_Controller
 * 
 * Automatically generated via CLI.
 */
class Auth_Controller extends Controller {
    public function __construct()
    {
        parent::__construct();
    }


    public function loginForm(){

         if ($this->session->userdata('logged_in')) {
            if($this->session->userdata('role') == 'admin'){
                redirect('/admin/user-management');

            }else{
                redirect('/home');
            }
            }
         else{
                $this->call->view('auth/login');
            }
            }

    public function loginUser(){
        $this->form_validation
            ->name('email')
                ->required()
            ->name('password')
                ->required();

            if ($this->form_validation->run() == FALSE) {
                $errors = $this->form_validation->get_errors();
                setErrors($errors);
                redirect('/login');
            } else {

                $email      = $this->io->post('email');
                $password   = $this->io->post('password');

                $user = $this->UserModel->findByEmail($email);
                 if ($user) {
                    if (password_verify($password, $user['password'])) {
                      $this->session->set_userdata([
                                'first_name' => $user['first_name'],
                                'last_name' => $user['last_name'],
                                'user_id' => $user['id'],
                                'username' => $user['username'],
                                'role' => $user['role'],
                                'logged_in' => TRUE
                            ]);

                            setMessage('success', 'Welcome back, ' . $user['first_name']);
                            redirect(uri:'/home');

                            if($user['role'] == 'admin'){
                                redirect('/admin/user-management');
                            }else{
                                redirect('/home');
                            }
                        } else {
                            setMessage('danger', 'Invalid password.');
                            redirect(uri:'/');
                        }
                    } else {
                        setMessage('danger', 'User not found.');
                        redirect(uri:'/');
                    }

            }


    }

    
    public function logout()
        {
            $this->session->unset_userdata(['user_id', "username", 'email', 'logged_in']);
             redirect('/');
         }

}
