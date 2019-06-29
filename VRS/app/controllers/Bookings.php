<?php 
    class Bookings extends Controller {
        public function __construct() {
            // echo 'Pages Loaded';
            $this->bookingModel = $this->model('Booking');
        }

        public function index() {
           
            $books = $this->bookingModel->getBookings();
            
            $data = [
                'books' => $books
            ];
            
            $this->view('bookings/index', $data);

        }

        public function add() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'name' => trim($_POST['name']),
                    'last_name' => trim($_POST['last_name']),
                    'municipality' => trim($_POST['municipality']),
                    'st_brgy' => trim($_POST['st_brgy']),
                    'date_rented_start' => trim($_POST['date_rented_start']),
                    'date_upto' => trim($_POST['date_upto']),
                    'time_to_deliver' => trim($_POST['time_to_deliver']),
                    'videoke_name' => trim($_POST['videoke_name']),
                    'contact_no' => trim($_POST['contact_no']),
                    'fee' => trim($_POST['fee']),
                    // data error to be shown in the view add if fields has no value
                    'name_err' =>'',
                    'last_name_err' =>'',
                    'municipality_err' =>'',
                    'st_brgy_err' =>'',
                    'date_rented_start_err' =>'',
                    'date_upto_err' =>'',
                    'time_to_deliver_err' =>'',
                    'videoke_name_err' =>'',
                    'contact_no_err' =>'',
                    'fee_err' =>''
                ];

                // Validate the fields
                if (empty($data['name'])) {
                    $data['name_err'] = 'Please enter name!';
                }
                if (empty($data['last_name'])) {
                    $data['last_name_err'] = 'Please enter last name!';
                }
                if (empty($data['municipality'])) {
                    $data['municipality_err'] = 'Please enter municipality!';
                }
                if (empty($data['st_brgy'])) {
                    $data['st_brgy_err'] = 'Please enter st and brgy!';
                }
                if (empty($data['date_rented_start'])) {
                    $data['date_rented_start_err'] = 'Please enter book date start!';
                }
                if (empty($data['date_upto'])) {
                    $data['date_upto_err'] = 'Please enter book end date!';
                }
                if (empty($data['time_to_deliver'])) {
                    $data['time_to_deliver_err'] = 'Please enter time to deliver!';
                }
                if (empty($data['videoke_name'])) {
                    $data['videoke_name_err'] = 'Please enter videoke name!';
                }
                if (empty($data['contact_no'])) {
                    $data['contact_no_err'] = 'Please enter contact no!';
                }
                if (empty($data['fee'])) {
                    $data['fee_err'] = 'Please enter fee!';
                }

                if ((empty($data['name_err'])) && (empty($data['last_name_err'])) && (empty($data['municipality_err'])) && (empty($data['st_brgy_err'])) && (empty($data['date_rented_start_err'])) && (empty($data['date_upto_err'])) && (empty($data['time_to_deliver_err'])) && (empty($data['videoke_name_err'])) && (empty($data['contact_no_err'])) && (empty($data['fee_err']))) {
                    // Validated
                    if ($this->bookingModel->addBook($data)) {
                        header('Location: '. URLROOT.'/bookings');
                    } else {
                        die('Something went wrong! ');
                    }
                } else {
                    // Load view with errors
                    $this->view('bookings/add', $data);
                }


                // echo 'name: ' , $data['name'], '<br>';
                // echo 'lastName: ' , $data['last_name'], '<br>';
                // echo 'municipality: ' , $data['municipality'], '<br>';
                // echo 'st brgy: ' , $data['st_brgy'], '<br>';
                // echo 'date rent start: ' , $data['date_rented_start'], '<br>';
                // echo 'date upto: ' , $data['date_upto'], '<br>';
                // echo 'time to deliver: ' , $data['time_to_deliver'], '<br>';
                // echo 'videoke name: ' , $data['videoke_name'], '<br>';
                // echo 'contact no: ' , $data['contact_no'], '<br>';
                // echo 'fee: ' , $data['fee'], '<br>';
                
            } else {
                $data = [
                    'name' => '',
                    'last_name' => '',
                    'municipality' => '',
                    'st_brgy' => '',
                    'date_rented_start' => '',
                    'date_upto' => '',
                    'time_to_deliver' => '',
                    'videoke_name' => '',
                    'contact_no' => '',
                    'fee' => '',
                    // data error to be shown in the view add if fields has no value
                    'name_err' =>'',
                    'last_name_err' =>'',
                    'municipality_err' =>'',
                    'st_brgy_err' =>'',
                    'date_rented_start_err' =>'',
                    'date_upto_err' =>'',
                    'time_to_deliver_err' =>'',
                    'videoke_name_err' =>'',
                    'contact_no_err' =>'',
                    'fee_err' =>''
                ];
                $this->view('bookings/add', $data);
            }
        }

        public function edit($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // echo '<pre>', print_r($_POST), '<pre>';

                $data = [
                    'book_id' => $id,
                    'name' => trim($_POST['name']),
                    'last_name' => trim($_POST['last_name']),
                    'municipality' => trim($_POST['municipality']),
                    'st_brgy' => trim($_POST['st_brgy']),
                    'date_rented_start' => trim($_POST['date_rented_start']),
                    'date_upto' => trim($_POST['date_upto']),
                    'time_to_deliver' => trim($_POST['time_to_deliver']),
                    'videoke_name' => trim($_POST['videoke_name']),
                    'contact_no' => trim($_POST['contact_no']),
                    'fee' => trim($_POST['fee']),
                    // data error to be shown in the view add if fields has no value
                    'name_err' =>'',
                    'last_name_err' =>'',
                    'municipality_err' =>'',
                    'st_brgy_err' =>'',
                    'date_rented_start_err' =>'',
                    'date_upto_err' =>'',
                    'time_to_deliver_err' =>'',
                    'videoke_name_err' =>'',
                    'contact_no_err' =>'',
                    'fee_err' =>''
                ];

                // Validate the fields
                if (empty($data['name'])) {
                    $data['name_err'] = 'Please enter name!';
                }
                if (empty($data['last_name'])) {
                    $data['last_name_err'] = 'Please enter last name!';
                }
                if (empty($data['municipality'])) {
                    $data['municipality_err'] = 'Please enter municipality!';
                }
                if (empty($data['st_brgy'])) {
                    $data['st_brgy_err'] = 'Please enter st and brgy!';
                }
                if (empty($data['date_rented_start'])) {
                    $data['date_rented_start_err'] = 'Please enter book date start!';
                }
                if (empty($data['date_upto'])) {
                    $data['date_upto_err'] = 'Please enter book end date!';
                }
                if (empty($data['time_to_deliver'])) {
                    $data['time_to_deliver_err'] = 'Please enter time to deliver!';
                }
                if (empty($data['videoke_name'])) {
                    $data['videoke_name_err'] = 'Please enter videoke name!';
                }
                if (empty($data['contact_no'])) {
                    $data['contact_no_err'] = 'Please enter contact no!';
                }
                if (empty($data['fee'])) {
                    $data['fee_err'] = 'Please enter fee!';
                }

                if ((empty($data['name_err'])) && (empty($data['last_name_err'])) && (empty($data['municipality_err'])) && (empty($data['st_brgy_err'])) && (empty($data['date_rented_start_err'])) && (empty($data['date_upto_err'])) && (empty($data['time_to_deliver_err'])) && (empty($data['videoke_name_err'])) && (empty($data['contact_no_err'])) && (empty($data['fee_err']))) {
                    // Validated
                    if ($this->bookingModel->update($data)) {
                        header('Location: '. URLROOT.'/bookings');
                    } else {
                        die('Something went wrong! ');
                    }
                } else {
                    // Load view with errors
                    $this->view('bookings/edit', $data);
                }

            } else {

                $data = [
                    'book_id' => $id,
                    'name_err' =>'',
                    'last_name_err' =>'',
                    'municipality_err' =>'',
                    'st_brgy_err' =>'',
                    'date_rented_start_err' =>'',
                    'date_upto_err' =>'',
                    'time_to_deliver_err' =>'',
                    'videoke_name_err' =>'',
                    'contact_no_err' =>'',
                    'fee_err' =>''
                ];
                
                $books = $this->bookingModel->editBooking($id);
                
                // echo '<pre>', print_r($books) ,'</pre>';   
                foreach ($books as $book) {

                }
                
                if ($book) {
                    $data = [
                        'book_id' => $id,
                        'name' => $book->name,
                        'last_name' => $book->last_name,
                        'municipality' => $book->municipality,
                        'st_brgy' => $book->address,
                        'date_rented_start' => $book->start_date_rent,
                        'date_upto' => $book->upto_date,
                        'time_to_deliver' => $book->time_rent,
                        'videoke_name' => $book->vid_id,
                        'contact_no' => $book->contact_no,
                        'fee' => $book->fee,
                        'name_err' =>'',
                        'last_name_err' =>'',
                        'municipality_err' =>'',
                        'st_brgy_err' =>'',
                        'date_rented_start_err' =>'',
                        'date_upto_err' =>'',
                        'time_to_deliver_err' =>'',
                        'videoke_name_err' =>'',
                        'contact_no_err' =>'',
                        'fee_err' =>''
                    ];
                    
                    $this->view('bookings/edit', $data);
                } else {
                    die('Something went wrong');
                }
            }
        }

    }


?>