<!-- <?php
class M_grafik extends CI_Model{
 
    function get_data_stok(){
        $query = $this->db->query("SELECT nama_barang,SUM(jumlah_barang) AS stok FROM barang_tersedia GROUP BY nama_barang");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 
} -->