<?php 
    class Videoke {
        private $d;

        public function __construct() {
            $this->db = new Database;
        }

        public function getVideokes() {
            $sql = "SELECT * FROM videokes";
            return $this->db->getAllVid($sql);
        }

        public function addVideoke($data) {
            $sql = "INSERT INTO videokes (name, dvd_model, color, year) VALUES (?,?,?,?)";
            // echo '<pre>',print_r($data),'</pre>';
            $datas = [
                        $data['vid_name'], 
                        $data['dvd_model'],
                        $data['color'],
                        $data['year']
            ];
            if ($this->db->addData($sql, $datas)) {
                return true;
            } else {
                return false;
            }
        }

        public function deleteItem($data) {
            $datas = [
                $data['id']
            ];
            $sql = "DELETE FROM videokes WHERE id = ?";
            if ($this->db->deleteRowData($sql, $datas)) {
                return true;
            } else {
                return false;
            }
        }

        public function getRowVid($data) {
            $sql = "SELECT * FROM videokes WHERE id = ?";
            $datas = [
                $data['id']
            ];
            return $this->db->getRowVidData($sql, $datas);
        }

        public function editData($data) {
            $sql = 'UPDATE videokes SET name = ?, dvd_model = ?, color = ?, year = ? WHERE id = ?';
            $datas = [
                $data['vid_name'],
                $data['dvd_model'],
                $data['color'],
                $data['year'],
                $data['vid_id']
            ];
            if ($this->db->updateVidData($sql, $datas)) {
                return true;
            } else {
                return false;
            }
        }
    }
?>