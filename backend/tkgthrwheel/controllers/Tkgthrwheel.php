<?php
// Izinkan akses dari origin Live Server kamu
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");


defined('BASEPATH') or exit('No direct scripts access allowed');

// class Tkgplaystore extends MY_Controller
class Tkgthrwheel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        // 1. Get the actual origin of the request
        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';

        // 2. Check if the origin is one of your allowed Live Server addresses
        $allowed_origins = [
            'http://localhost:5500',
            'http://127.0.0.1:5500'
        ];

        if (in_array($origin, $allowed_origins)) {
            header("Access-Control-Allow-Origin: " . $origin);
        }

        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

        // 3. Handle Preflight (The browser sends an OPTIONS request first)
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            header("HTTP/1.1 200 OK");
            exit;
        }

        $this->load->library('session');
        $this->load->helper('cookie');
    }

   function get_client_ip() {
    $ip = '';
        
        // 1. Ambil IP dari berbagai kemungkinan header
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // HTTP_X_FORWARDED_FOR bisa berisi deretan IP (comma separated)
            $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = trim($ips[0]);
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // 2. Penanganan khusus Localhost (IPv6 ::1 ke IPv4)
        if ($ip === '::1') {
            return '127.0.0.1';
        }

        // 3. Validasi apakah formatnya sudah IPv4
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return $ip;
        }

        // 4. Opsional: Jika IP adalah IPv6 (bukan ::1), coba ekstrak jika itu IPv4-mapped IPv6
        // Contoh: ::ffff:192.168.1.1
        if (strpos($ip, ':') !== false) {
            $parts = explode(':', $ip);
            $last_part = end($parts);
            if (filter_var($last_part, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                return $last_part;
            }
        }

        return $ip; // Kembalikan apa adanya jika semua usaha gagal
    }

    // CATCH QUERY
    public function p_web_tkgthrwheel() {        
       $this->load->model('TKGWheelSpinModel'); 
       $ipaddress = $this->get_client_ip(); 
   
        $datas = [
            "V_P_WORK_TYPE"    => $this->input->post('V_P_WORK_TYPE') ?? "",
            "V_P_ID"           => $this->input->post('V_P_ID') ?? "",
            "V_P_IS_LOSER"     => $this->input->post('V_P_IS_LOSER') ?? "",
            "V_P_IP_ADDRESS"   => $ipaddress ?? "",
            "V_P_SPIN"         => $this->input->post('V_P_SPIN') ?? "",
            "V_P_SALDO"        => $this->input->post('V_P_SALDO') ?? "",
        ];

        // if($datas["V_P_WORK_TYPE"] == "SPINNING") {
        //     var_dump($datas);
        //     die();
        // }


        
        $result = $this->TKGWheelSpinModel->ExecuteProc($datas);
		echo json_encode($result); 
    }

   
} 
