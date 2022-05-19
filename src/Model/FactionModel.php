<?php

namespace Mvc\Model;

use Config\Model;

use PDO;

class FactionModel extends Model
{
    public function createFaction(string $name, $description) 
    {

        $statement = $this->pdo->prepare('INSERT INTO `faction` (`name`, `description`) VALUES (:name, :description)');

        return $statement->execute([
            'name' => $name,
            'description' => $description,
        ]);
    }

    public function updateFaction(int $faction_id) 
    {
        $statement = $this->pdo->prepare('UPDATE `player` SET `faction_id` = :faction_id WHERE id = :player_id');

        return $statement->execute([
            'player_id' => $player_id,
            'faction_id' => $faction_id,
        ]);
    }

    public function findOneFactionById($id) 
    {
        $statement = $this->pdo->prepare('SELECT * FROM `faction` WHERE `id` = :id');

        $statement->execute([
            'id' => $id,
        ]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function findAllFactions()
    {
        $statement = $this->pdo->prepare('SELECT * FROM `faction`');

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteOneFactionById(int $id) 
    {
        $statement = $this->pdo->prepare('DELETE `faction` FROM `faction` WHERE `id` = :id');

        return $statement->execute([
            'id' => $id,
        ]);
    }
}