# Minecraft API

This API allows you to create or to delete players and factions, modify them and make players join or leave factions.

All the data sent and received is in JSON.

## Routes

- ```/player```: 
    - ```POST```: It will create a new player, key "name" is expected and its value should be a string of size <= 255
    - ```GET```: give the player ID of the player you are looking for, it will give you all the informations we have on him: player id, pseudo, faction id, faction name, faction description.
    - ```DELETE```: give the player ID of the player you want to delete, it will delete it, key "id" expected and its value should be an int.
    - ```PUT```: give the player ID of the player you want to modify and its new name, it will rename him, keys "id", "name" expected, value of "id" should be an int and value of "name" should be a string of length <= 255.
- ```/player/faction```: 
    - ```GET```: give the player ID and its new faction and it will change its faction, keys "id" and "faction" expected, both values should be an int.
    - ```DELETE```: give the player ID and it will make him leave his faction, key "id" expected, value should be an int.
- ```/players```:
    - ```GET```: (_no parameters_) it will give you all the players of the DB, will all their informations.
- ```/faction```:
    - ```GET```: give the faction ID of the faction you are looking for, it will give you all the informations we have on it, key "id" expected, value should be an int.
    - ```POST```: give a name and a description and it will create a new faction, keys "name" and "description" expected, both values should be strings, "name" should be of length <= 255 and "description" should be of length <= 65.535.
    - ```DELETE```: give a faction ID and it will delete the faction.
    - ```PUT```: give an ID, a new name and or a new description and it will update the informations of the faction, keys "id", "name" and "description" expected, value "id" should be an int, value "name" should be a string of length <= 255 and value "description" should be a string of length <= 65.535.
- ```/factions```:
    - ```GET```: (_no parameters_) it will give you all the factions of the DB, will all their informations.