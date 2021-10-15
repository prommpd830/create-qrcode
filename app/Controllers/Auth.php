<?php namespace App\Controllers;
 
use App\Models\AuthModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
 
class Auth extends ResourceController
{
    public function __construct()
    {
        $this->auth = new AuthModel();
        $this->session = \Config\Services::session();
        $this->validation =  \Config\Services::validation();
    }

    use ResponseTrait;
    public function register()
    {
        if ($this->request->getMethod() == 'get') {
            $data = [
                'title' => 'Register',
                'validation' => $this->validation
            ];
            return view('auth/register', $data);
        }

        // Set Rules
        $rules = [
            'name' => [
                'rules' => 'required'
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $name  = $this->request->getPost('name');
        $email      = $this->request->getPost('email');
        $password   = $this->request->getPost('password');
 
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
 
        // $data = json_decode(file_get_contents("php://input"));
 
        $dataRegister = [
            'name' => $name,
            'email' => $email,
            'password' => $password_hash
        ];
 
        $register = $this->auth->register($dataRegister);

        if ($register = true) {
            return redirect()->to(base_url('login'))->with('success', 'Register Successfully. Please Login!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Register Failed. Try Again!');
        }

    }
 
    public function login()
    {
        if ($this->request->getMethod() == 'get') {
            $data = [
                'title' => 'Login',
                'validation' => $this->validation
            ];

            return view('auth/login', $data);
        }

        // Set Rules
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $email      = $this->request->getPost('email');
        $password   = $this->request->getPost('password');

        $cek_login = $this->auth->cek_login($email);
 
        if (!$cek_login) {
           return redirect()->back()->withInput()->with('error', 'Your account is not define!');
        } else {
            if(password_verify($password, $cek_login['password'])){
                $key = getenv('TOKEN_SECRET');
                $payload = array(
                    "iat" => 1356999524,
                    "nbf" => 1357000000,
                    "id" => $cek_login['id'],
                    "name" => $cek_login['name'],
                    "email" => $cek_login['email'],
                    "img" => $cek_login['img'],
                );
         
                $token = JWT::encode($payload, $key);
                $this->session->set('token', $token);
         
                // return $this->respond($token);
                return redirect()->to(base_url());
            } else {
                return redirect()->back()->withInput()->with('error', 'Your password is wrong!');
            }
        }
    }

    public function logout()
    {
        $this->session->remove(['token']);
        return redirect('login')->with('success', 'You are logout!');
    }
 
}