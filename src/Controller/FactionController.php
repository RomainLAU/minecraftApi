<?php

namespace Mvc\Controller;

use Config\Controller;
use Mvc\Model\FactionModel;
use Twig\Environment;

class FactionController extends Controller
{
    private FactionModel $factionModel;

    public function __construct() {
        parent::__construct();
        $this->factionModel = new FactionModel();
    }

    public function createFaction() {

        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);

        $isFactionCreated = $this->factionModel->createFaction($userData['name'], $userData['description']);

        $status = 200;
        $message = "Faction not created";

        if ($isFactionCreated) {
            http_response_code(201);
            $status = 201;
            $message = "Faction successfully created";
        }

        $this->sendReponse($status, [], $message);
    }

    public function getFactions() {

        $this->sendReponse(200, $this->factionModel->findAllFactions());
    }

    public function getFactionById(int $id) {

        $this->sendReponse(200, $this->factionModel->findOneFactionById($id));
    }

    public function updateFaction() {

        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);

        $isFactionUpdated = $this->factionModel->updateFaction($userData['id'], $userData['name'], $userData['description']);

        if ($isFactionUpdated) {
            http_response_code(204);
            $status = 204;
            $message = "Faction successfully updated";
        }

        $this->sendReponse($status, [], $message);
    }

    public function deleteFaction(int $id) {

        $isFactionDeleted = $this->factionModel->deleteOneFactionById($id);

        if ($isFactionDeleted) {
            http_response_code(204);
            $status = 204;
            $message = "Faction successfully updated";
        }

        $this->sendReponse($status, [], $message);
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