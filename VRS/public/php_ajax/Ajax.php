<?php 
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '123456');
    define('DB_NAME', 'vid_reservation_db');

    include ('../../app/libraries/Database.php');


    $dbjs = new Database;


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
            'id' => $_POST['data_id']
        ];
        $result = $dbjs->delete($data);
        echo $result;
    }

    // $book_id = $_POST['booking_id'];
    // // echo $id;

    // delete($book_id);

    // function delete($id) {
    //     $query = $this->dbajax->query('DELETE * FROM booking WHERE id = ?');
    //     echo $query;
    //     // $data_exec = ($id);
    //     // if ($this->db->execute($data_exec)) {
    //     //     echo 'true';
    //     // } else {
    //     //     echo 'false';
    //     // }
    // }
?>