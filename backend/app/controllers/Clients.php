<?php
class Clients extends Controller
{
    private $clientModel;
    public function __construct()
    {
        $this->clientModel = $this->model('client');
    }

    

    public function register()
    {
        // header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Content-Type: application/json');
        header("Access-Control-Allow-Headers: X-Requested-With");


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $data = json_decode(file_get_contents("php://input"));
            $client = [
                'name' => $data->name,
                'lastName' => $data->lastName,
                'phone' => $data->phone,
                'ref' => randomString(10)
            ];

            if ($this->clientModel->register($client)) {
                http_response_code(200);
                echo (json_encode([
                    "Success" => "Client registred successfully",
                    "Ref" => $client['ref']
                ]));
            } else {
                http_response_code(500);
                echo (json_encode("Somthing went wrong"));
            }
        } else {
            http_response_code(400);
            echo "Invalid request Method";
        }
    }

    public function login()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"));
        $ref = $data->ref;
        $loggedUser = $this->clientModel->login($ref);
        if ($loggedUser) {
            http_response_code(200);
            echo json_encode([
                "message" => "User Logged in successfully",
                'data' => [
                    "ref" => $loggedUser->ref
                ]
            ]);
            $this->createUserSession($loggedUser->ref);
        } else {
            echo (json_encode("Incorrect Ref Please try again"));
        }
    }

    public function logout()
    {
        unset($_COOKIE['client_ref']);
        echo json_encode([
            "Message" => "Logged out successfully"
        ]);
    }

    public function createUserSession($ref)
    {
        $_SESSION['ref'] = $ref;
    }
}
