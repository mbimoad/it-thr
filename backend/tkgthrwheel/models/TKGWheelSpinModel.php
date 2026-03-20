<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TKGWheelSpinModel extends CI_Model {
    var $conn;

    function __construct() {
        parent::__construct();

        // Koneksi ke Oracle XE dengan user MESMGR
        $username = "MESMGR";
        $password = "mesmgr";
        $connection_string = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-VDSKR59)(PORT = 1521)) (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = XE)))";

        $this->conn = oci_connect($username, $password, $connection_string);

        if (!$this->conn) {
            $e = oci_error();
            die("Koneksi gagal: " . $e['message']);
        }
    }

    public $procName  = "P_TKG_THR_WHEEL";
    public $cursorNam = "CV_1"; 
    public $parameter = [
        "V_P_WORK_TYPE"     => "",     // 'SPINNING', 'Q', etc.
        "V_P_ID"            => "",     // Maps to ID (e.g., TT24010584)
        "V_P_IS_LOSER"      => "",     // Maps to ISLOSER (0 or 1)
        "V_P_IP_ADDRESS"    => "",     // Maps to IP_ADDR
        "V_P_SPIN"          => "",     // Maps to IP_ADDR
        "V_P_SALDO"         => "",     // Maps to IP_ADDR
        "CV_1"              => NULL,   // Ref Cursor for output
    ];

    public function setParamsData($userdatas) {
        foreach ($this->parameter as $key => $value) {
            if ($key === $this->cursorNam) continue;
            $this->parameter[$key] = $userdatas[$key] ?? $value;
        }
    }

  public function ExecuteProc($userdatas) {

      $this->setParamsData($userdatas);

      $sql = "BEGIN {$this->procName}(
          :V_P_WORK_TYPE, :V_P_ID, :V_P_IS_LOSER, :V_P_IP_ADDRESS, :V_P_SPIN, :V_P_SALDO, 
          :CV_1
      ); END;";

      $stmt = oci_parse($this->conn, $sql);

      // Buat cursor
      $cursor = oci_new_cursor($this->conn);

      // Bind semua parameter
      foreach ($this->parameter as $key => $value) {
          if ($key === $this->cursorNam) {
              oci_bind_by_name($stmt, ":$key", $cursor, -1, OCI_B_CURSOR);
          } else {
              oci_bind_by_name($stmt, ":$key", $this->parameter[$key]);
          }
      }

      // Eksekusi procedure
      if (!oci_execute($stmt)) {
          $e = oci_error($stmt);
          throw new Exception("Procedure execution failed: " . $e['message']);
      }

      // Eksekusi cursor setelah procedure berhasil
      if (!oci_execute($cursor)) {
          $e = oci_error($cursor);
          throw new Exception("Cursor execution failed: " . $e['message']);
      }

      // Ambil hasil dari cursor
      $results = [];
      while (($row = oci_fetch_assoc($cursor)) != false) {
          $results[] = $row;
      }

      oci_free_statement($stmt);
      oci_free_statement($cursor);

      return $results;
  }
}