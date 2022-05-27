<?php
require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$router = new \Bramus\Router\Router();

$router->get('/player', 'Mvc\Controller\PlayerController@getPlayerById');
$router->delete('/player', 'Mvc\Controller\PlayerController@deletePlayer');
$router->put('/player', 'Mvc\Controller\PlayerController@updatePlayerById');
$router->post('/player', 'Mvc\Controller\PlayerController@createPlayer');

$router->put('/player/faction', 'Mvc\Controller\PlayerController@updatePlayerFactionById');
$router->delete('/player/faction', 'Mvc\Controller\PlayerController@deletePlayerFactionById');

$router->get('/players', 'Mvc\Controller\PlayerController@getPlayers');

$router->get('/faction', 'Mvc\Controller\FactionController@getFactionById');
$router->delete('/faction', 'Mvc\Controller\FactionController@deleteFaction');
$router->put('/faction', 'Mvc\Controller\FactionController@updateFaction');
$router->post('/faction', 'Mvc\Controller\FactionController@createFaction');

$router->get('/factions', 'Mvc\Controller\FactionController@getFactions');

$router->run();

?>