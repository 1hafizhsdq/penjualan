<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        // agar tidak bisa kembali ke halaman login jika sudah lohin
        if ($this->session->userdata('email')) {
            redirect('user');
        };
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        //email data di check apa sudah sesuai atau belum
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|trim|min_length[3]',
            ['min_length' => 'password to short']
        );
        if ($this->form_validation->run() == false) { //jika falidasi berjalan dan itu salah
            $data['title'] = 'Penjualan';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('Auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {

        $email  = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //db = $email
        if ($user) { // jika sama
            if ($user['is_active'] == 1) { // jika aktif
                if (password_verify($password, $user['password'])) { //verifikasi password
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) { // jika role == 1
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else { // kesalahan pass
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        wrong password !
                      </div>');
                    redirect('Auth');
                }
            } else { // email gak aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email has been not activated. 
              </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email is not registered. Please registered.
              </div>');
            redirect('Auth');
        }
    }


    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        };
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'this email has already register !']);
        $this->form_validation->set_rules(
            'password1',
            'password',
            'required|trim|min_length[3]|matches[password2]',
            ['matches' => 'password dont match!', 'min_length' => 'password to short']
        );
        $this->form_validation->set_rules('password2', 'password', 'required|trim|min_length[3]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Penjualan';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            // jika berhasil maka mengambil data yang telah diinputkan
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            // kirim email

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation, your account has been created !
          </div>');
            redirect('Auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'umairdesain@gmail.com',
            'smtp_pass' => 'annisaannisa19',
            'smtp_port' => '465',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",

        ];
        $this->email->initialize($config);
        $this->load->library('email', $config);
        $this->email->from('umairdesain@gmail.com', 'Umair Desain');
        $this->email->to($this->input->post('email'));
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('click this link to verify your account : 
            <a href="' . base_url() . 'Auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('click this link to reset your password : 
            <a href="' . base_url() . 'Auth/changepassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();

            die;
        };
    }


    public function verify()
    { // untuk memverifikasi yng mengmbil nilai email dan token 
        // dan dipastikan email tersebut sesuai dengn email yng ada
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            ' . $email . 'has been activited. Please  login
          </div>');
                    redirect('Auth');
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Token Expired
              </div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                wrong token
              </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            account activation failed, wrong email
          </div>');
            redirect('Auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You has been logout.
      </div>');
        redirect('Auth');
    }

    public function blocked()
    {
        $this->load->view('Auth/blocked');
    }

    public function forgotpassword()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        };
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'forgotpassword';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgotpassword');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $active = 1;
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => $active])->row_array();

            if ($user) {
                $length = 32;
                $token = bin2hex(openssl_random_pseudo_bytes($length, $crypto_strong));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('mes', '<div class="alert alert-success" role="alert">
            Please check your email to resert your password !
          </div>');
                redirect('Auth/forgotpassword');
                // $this->_sendEmail($token, 'forgot');
            } else {
                $this->session->set_flashdata('mes', '<div class="alert alert-danger" role="alert">
            Email is not registered !
          </div>');
                redirect('Auth/forgotpassword');
            }
        }
    }
    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changepassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    Reset failed! Wrong token.
  </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    Reset fail!
  </div>');
            redirect('Auth');
        }
    }

    public function changepassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('Auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[passwod2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[passwod1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password ';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/changepassword');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success reset password
  </div>');
            redirect('Auth');
        }
    }
}
