<?php
class Syscheck_model extends CI_Model
{
    protected $c;
    
    public function __construct()
    {
        parent::__construct();
        $this->c =& get_instance();
    }
    
    /**
     * getNow
     *
     * @params none
     * @return array $data
     */
    public function getNow()
    {
        if (($data = $this->c->db->query('SELECT NOW()')->result()) === false) {
          throw new Exception ("getting Data Failed.");
        }
        return $data[0];
    }
}
