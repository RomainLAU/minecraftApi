<?php

namespace Mvc\Model;

use Config\Model;

use PDO;

class PlayerModel extends Model
{
    public function createPlayer(string $pseudo) 
    {
        $today = new \DateTime();

        $statement = $this->pdo->prepare('INSERT INTO `player` (`pseudo`) VALUES (:pseudo)');

        return $statement->execute([
            'pseudo' => $pseudo,
        ]);
    }

    public function updatePlayer(int $player_id, string $pseudo) 
    {
        $statement = $this->pdo->prepare('UPDATE `player` SET `pseudo` = :pseudo WHERE id = :player_id');

        return $statement->execute([
            'player_id' => $player_id,
            'pseudo' => $pseudo,
        ]);
    }

    public function updatePlayerFaction(int $id, int $faction_id) 
    {

        $statement = $this->pdo->prepare('UPDATE `player` SET `faction_id` = :faction_id WHERE id = :id');

        return $statement->execute([
            'id' => $id,
            'faction_id' => $faction_id,
        ]);
    }
    
    public function deletePlayerFaction(int $id) 
    {

        $statement = $this->pdo->prepare('UPDATE `player` SET `faction_id` = null WHERE id = :id');

        return $statement->execute([
            'id' => $id,
        ]);
    }

    public function findOnePlayerById($id) 
    {
        $statement = $this->pdo->prepare('SELECT * FROM `player` LEFT JOIN `faction` ON `faction_id` = `faction`.id WHERE `player`.id = :id');

        $statement->execute([
            'id' => $id,
        ]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function findAllPlayers()
    {
        $statement = $this->pdo->prepare('SELECT * FROM `player` LEFT JOIN `faction` ON `faction_id` = `faction`.id');

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteOnePlayerById(int $id) 
    {
        $statement = $this->pdo->prepare('DELETE `player` FROM `player` WHERE `id` = :id');

        $statement->execute([
            'id' => $id,
        ]);
    }

    public function getPlayersFromFaction(int $faction_id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM `player` WHERE `faction_id` = :faction_id');

        $statement->execute([
            'faction_id' => $faction_id,
        ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}