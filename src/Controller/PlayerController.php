<?php

namespace Mvc\Controller;

use Config\Controller;
use Mvc\Model\PlayerModel;
use Twig\Environment;

class PlayerController extends Controller
{
    private PlayerModel $playerModel;

    public function __construct() {
        parent::__construct();
        $this->playerModel = new PlayerModel();
    }

    public function createPlayer() {

        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);

        $isPlayerCreated = $this->playerModel->createPlayer($userData['pseudo']);

        if ($isPlayerCreated) {
            http_response_code(201);
            $status = 201;
            $message = "Player successfully created";
        }

        $this->sendReponse($status, [], $message);
    }

    public function getPlayers() {

        $this->sendReponse(200, $this->playerModel->findAllPlayers());
    }

    public function getPlayerById(int $id) {

        $userData = $this->playerModel->findOnePlayerById($id);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => '200',
            'data' => $userData,
        ]);
    }

    public function updatePlayerById() {

        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);

        $this->playerModel->updatePlayer($userData['id'], $userData['name']);

        echo json_encode([
            'status' => 200,
            'data' => $userData,
        ]);
    }

    public function updatePlayerFactionById() {

        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);

        $isPlayerFactionUpdated = $this->playerModel->updatePlayerFaction($userData['id'], $userData['faction']);

        if ($isPlayerFactionUpdated) {
            http_response_code(204);
            $status = 204;
            $message = "Player faction successfully updated";
        }

        $this->sendReponse($status, [], $message);
    }

    public function deletePlayer(int $id) {

        $userData = $this->playerModel->deleteOnePlayerById($id);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => '200',
            'data' => $userData,
        ]);
    }

    private function sendReponse(int $status, array $data = [], ?string $message = null)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: http://127.0.0.1:5500');

        http_response_code($status);

        echo json_encode([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }
}