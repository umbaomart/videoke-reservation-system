<?php 
    class Booking {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getBookings() {

            $this->db->query('SELECT * FROM booking ORDER BY booking_created_at DESC');
            
            $results = $this->db->resultSet();

            return $results;
        }

        public function addBook($data) {
            // $this->db->query('INSERT INTO booking (name, last_name, municipality, address, time_rent, vid_id, contact_no, start_date_rent, upto_date,fee) 
            //                                 VALUES (:name, :last_name, :municipality, :address, :time_rent, :vid_id, :contact_no, :start_date_rent, :upto_date,:fee)');
            
            $this->db->query('INSERT INTO booking (name, last_name, municipality, address, time_rent, contact_no, start_date_rent, upto_date, vid_id, fee) 
                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)');

            $data_exec = (array($data['name'], 
                                $data['last_name'], 
                                $data['municipality'], 
                                $data['st_brgy'], 
                                $data['time_to_deliver'], 
                                $data['contact_no'],
                                $data['date_rented_start'], 
                                $data['date_upto'], 
                                $data['videoke_name'], 
                                $data['fee'] ));

            if ($this->db->execute($data_exec)) {
                return true;
            } else {
                return false;
            }
            
            // $this->db->bind(':name', $data['name']);
            // $this->db->bind(':last_name', $data['last_name']);
            // $this->db->bind(':municipality', $data['municipality']);
            // $this->db->bind(':address', $data['st_brgy']);
            // $this->db->bind(':time_rent', $data['time_to_deliver']);
            // $this->db->bind(':vid_id', $data['videoke_name']);
            // $this->db->bind(':contact_no', $data['contact_no']);
            // $this->db->bind(':start_date_rent', $data['date_rented_start']);
            // $this->db->bind(':upto_date', $data['date_upto']);
            // $this->db->bind(':fee', $data['fee']);

            // if ($this->db->execute()) {
            //     return true;
            // } else {
            //     return false;
            // }
        }

        // Get book by id
        public function getBookById($id) {
            $this->db->query('SELECT * FROM booking WHERE id = ?');
            $data_id = [$id];

            if ($this->db->execute($data_id)) {
                return true;
            } else {
                return false;
            }
        }

        public function editBooking($id) {
            $sql = 'SELECT * FROM booking WHERE id = ?';
            $data_id = [$id];
            $result = $this->db->editData($sql, $data_id);
            if ($result) {
                return $result;
            }
                // $query = "SELECT * FROM booking WHERE id = ?";
                // $query = $this->db->prepare($query);
                // $query->execute($id);
                // if ($query) {
                //     return 'true';
                // } else {
                //     return 'false';
                // }

        }    

        public function update($data) {
            $sql = "UPDATE booking SET name = ?, last_name = ?, municipality = ?, address = ?, time_rent = ?, contact_no = ?, vid_id = ?, start_date_rent = ?, upto_date = ?, fee = ?
            WHERE id = ?";

            $datas = [$data['name'], $data['last_name'], $data['municipality'], $data['st_brgy'], $data['time_to_deliver'], $data['contact_no'], $data['videoke_name'], $data['date_rented_start'], $data['date_upto'], $data['fee'], $data['book_id']];

            $result = $result = $this->db->updateData($sql, $datas);

            if ($result) {
                return $result;
                echo "success";
            } else {
                die('Error');
            }
        }
    }
    
?>