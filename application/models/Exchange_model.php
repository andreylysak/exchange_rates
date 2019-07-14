<?php
class Exchange_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_exchange($date = FALSE)
    {
        if ($date === FALSE)
        {
            $query = $this->db->order_by('date', 'DESC')->limit(31)->get('exchange_history');
            return $query->result_array();
        }

        $query = $this->db->get_where('exchange_history', array('date' => $date));
        return $query->result_array();
    }

    public function get_last_exchange()
    {
        $query = $this->db->order_by('date', 'DESC')->limit(1)->get('exchange_history');
        return $query->row_array();
    }

    public function set_exchange($excange_usd, $excange_eur, $excange_uah, $date) {
        $data = array(
            'usd' => $excange_usd,
            'eur' => $excange_eur,
            'uah' => $excange_uah,
            'date' => $date
        );
    
        return $this->db->insert('exchange_history', $data);
    }
}
?>