# Minecraft API

This API allows you to create or to delete players and factions, modify them and make players join or leave factions


## Routes

- ```/player```: 
    - ```POST```: give a name and it will create a new player.
    - ```GET```: give the player ID of the player you are looking for, it will give you all the informations we have on him.
    - ```DELETE```: give the player ID of the player you want to delete, it will delete it.
    - ```PUT```: give the player ID of the player you want to modify and its new name, it will rename him.
- ```/player/faction```: 
    - ```GET```: give the player ID and its new faction and it will change its faction.
    - ```DELETE```: give the player ID and it will make him leave his faction.
- ```/players```:
    - ```GET```: (_no parameters_) it will give you all the players of the DB, will all their informations.
- ```/faction```:
    - ```GET```: 