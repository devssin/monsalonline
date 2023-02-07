<?php
class Appointements extends Controller
{
    private $appointementModel;
    private $clientModel;
    public function __construct()
    {
        if (!isset($_SESSION['ref'])) {
            http_response_code(401);
            echo json_encode(["message" => "Unauthorized"]);
            exit;
        }
        $this->appointementModel = $this->model('appointement');
        $this->clientModel = $this->model('client'); 
    }


    public function read()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $ref = $_SESSION['ref'];
            $data = $this->appointementModel->getAppointements($ref);
            if (empty($data)) {
                echo json_encode([
                    "message" => "You have no appointements yet"
                ]);
            } else {

                echo json_encode(["data" => $data]);
            }
        } else {
            http_response_code(400);
            echo json_encode([
                "error" => "Invalid request Method"
            ]);
        }
    }
    
    public function add(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Content-Type: application/json');
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $client = $this->clientModel->findByRef($_SESSION['ref']);
            $data = json_decode(file_get_contents("php://input"));
            $appointement = [
                'client_id' => $client->id,
                'start_time' => $data->start_time,
                'end_time' => date( "H:i:s", strtotime($data->start_time) + 3600),
                'date' => $data->date

            ];
            if($this->appointementModel->addAppointement($appointement)){
                http_response_code(200);
                echo json_encode([
                    "Success" => "Appoinement added successfully"
                ]);
            }else{
                http_response_code(500);
                echo json_encode([
                    "Error" => "Somthing went wrong"
                ]);
            }


        }else{
            http_response_code(400);
            echo json_encode([
                "error" => "Invalid request Method"
            ]);
        }
    }

    

    
}
