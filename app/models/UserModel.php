<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 * 
 * Automatically generated via CLI.
 */
class UserModel extends Model {
    protected $table = 'users';
    protected $primary_key = 'id';

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'password',
        'email',
        'profile_picture'



    ];

    public function findByEmail($email)
    {
        return $this->db->table('users')
                        ->where('email', $email)
                        ->get();
    }

    // check if username already exists
    public function findByUsername($username)
    {
        return $this->db->table('users')
                        ->where('username', $username)
                        ->get();
    }

   

    public function getAll($q, $records_per_page = null, $page = null){
        if(is_null($page)){
             return $this->db->table($this->table)->get_all();
        } else {
            $query = $this->db->table($this->table);

            $query->like('id', '%'.$q. '%')
                ->or_like('first_name', '%'.$q. '%')
                ->or_like('last_name', '%'.$q. '%')
                ->or_like('username', '%'.$q. '%')
                ->or_like('email', '%'.$q. '%');

                $countQuery = clone $query;

            // Count total rows (for pagination)
            $data['total_rows'] = $countQuery->select_count('*', 'count')
                                            ->get()['count'];

            // Get paginated records
            $data['records'] = $query->pagination($records_per_page, $page)
                                    ->get_all();

            return $data;
                
        }
       

    }
}