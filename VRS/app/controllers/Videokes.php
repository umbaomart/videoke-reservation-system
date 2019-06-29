<?php 
    class Videokes extends Controller {
        public function __construct() {
            $this->vidModel = $this->model('Videoke');
        }

        public function index() {
            // echo "This is the videoke Content";

            $vid = $this->vidModel->getVideokes();

            $data = [
                'title' => 'List of Videokes',
                'videokes' => $vid
            ];
            // echo "<pre>",print_r ($data),"</pre>";

            $this->view('videokes/index', $data);
        }

        public function add() {
            $data = [
                'vid_name' => '',
                'dvd_model' => '',
                'color' => '',
                'year' => '',
                'vid_name_err' => '',
                'dvd_model_err' => '',
                'color_err' => '',
                'year_err' => ''
            ];
            if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                // echo "<pre>",print_r(print_r($_POST)),"</pre>";
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'vid_name' => trim($_POST['vid_name']),
                    'dvd_model' => trim($_POST['dvd_model']),
                    'color' => trim($_POST['color']),
                    'year' => trim($_POST['year']),
                    'vid_name_err' => '',
                    'dvd_model_err' => '',
                    'color_err' => '',
                    'year_err' => ''
                ];
                if (empty($data['vid_name'])) {
                    $data['vid_name_err'] = 'Please input videoke name !';
                }
                if (empty($data['dvd_model'])) {
                    $data['dvd_model_err'] = 'Please input dvd model !';
                }
                if (empty($data['color'])) {
                    $data['color_err'] = 'Please input color !';
                }
                if (empty($data['year'])) {
                    $data['year_err'] = 'Please input year !';
                }
                if (empty($data['vid_name_err'] && $data['dvd_model_err'] && $data['color_err'] && $data['year_err'])) {
                    // echo '<pre>',print_r($_POST),'</pre>';

                    // if this true means that the query is success
                    if ($this->vidModel->addVideoke($data)) {
                        // load the view
                        header('Location: '. URLROOT . '/videokes');
                    }
                } else {
                    // echo '<pre>',print_r($data),'</pre>';
                    $this->view('videokes/add', $data);
                }    
            } else {
                // Load the view with the data errors
                $this->view('videokes/add', $data);
            }
        }

        public function edit($id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'vid_id' => $id,
                    'vid_name' => $_POST['vid_name'],
                    'dvd_model' => $_POST['dvd_model'],
                    'color' => $_POST['color'],
                    'year' => $_POST['year'],
                    'vid_name_err' => '',
                    'dvd_model_err' => '',
                    'color_err' => '',
                    'year_err' => ''
                ];
                // die('Submitted');
                // echo '<pre>',print_r($_POST),'</pre>';
                if (empty($_POST['vid_name'])) {
                    $data['vid_name_err'] = 'Please input videoke name! ';
                }
                if (empty($_POST['dvd_model'])) {
                    $data['dvd_model_err'] = 'Please input dvd model! ';
                }
                if (empty($_POST['color'])) {
                    $data['color_err'] = 'Please input color! ';
                }
                if (empty($_POST['year'])) {
                    $data['year_err'] = 'Please input year! ';
                }
                
                if (empty($data['vid_name_err']) && empty($data['dvd_model_err']) && empty($data['color_err']) && empty($data['year_err'])) {
                    // echo '<pre>',print_r($data),'</pre>';
                    if ($this->vidModel->editData($data)) {
                        header('Location: ' . URLROOT . '/videokes');
                        // header('Location: '. URLROOT . '/videokes');
                    }
                } else {    
                    // echo '<pre>',print_r($data),'</pre>';
                    $this->view('videokes/edit', $data);
                }

            } else {
                $data = [
                    'id' => $id
                ];
                $videoke = $this->vidModel->getRowVid($data);
                // echo '<pre>',  print_r($videoke) , '</pre>';
                $newVid = [
                    'videoke' => $videoke
                ];
                // print_r($newVid);
                foreach ($newVid['videoke'] as $vid) {}
                
                $data = [
                    'vid_id' => $vid->id,
                    'vid_name' => $vid->name,
                    'dvd_model' => $vid->dvd_model,
                    'color' => $vid->color,
                    'year' => $vid->year,
                    'vid_name_err' => '',
                    'dvd_model_err' => '',
                    'color_err' => '',
                    'year_err' => ''
                ];
                // echo '<pre>',  print_r($data) , '</pre>';
                $this->view('videokes/edit', $data);                
            }
        }
        
        public function delete($id) {
            // echo print_r($data);
            $data = [
                'id' => $id
            ];
            if ($this->vidModel->deleteItem($data)) {
                // echo "Succesfully deleted!";
                header('Location: '. URLROOT . '/videokes');
            }
        }
    }

?>