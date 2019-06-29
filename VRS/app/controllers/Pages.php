<?php 
    class Pages extends Controller {
        public function __construct() {
            // echo 'Pages Loaded';
            $this->bookingModel = $this->model('Booking');
        }

        public function index() {
            // $this->view('hello');
            // $posts = $this->postModel->getPosts();
            $book = $this->bookingModel->getBookings();

            $data = [
                'title' => 'Welcome',
                'books' => $book
            ];


            $this->view('pages/index', $data);
        }
        
        public function about() {
            $data = [
                'title' => 'About Us'
            ];
            $this->view('pages/about', $data);
            
        }
        
        // public function booking() {
        //     $data = [
        //         'title' => 'Booking'
        //     ];
            
        //     $this->view('pages/booking', $data);
            
        // }
    }

?>