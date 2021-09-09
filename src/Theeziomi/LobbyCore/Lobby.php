<?php

namespace Theeziomi\LobbyCore

use pocketmine\{Server, Player};

use pocketmine\command\{Command, CommandSender};

use pocketmine\utils\{TextFormat as TE, Config};

use pocketmine\utils\event\Listener;

class Lobby extends Pluginbase implements Listener{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TE::GREEN.TE::BOLD."Plugin On!")
    }

    public function onCommand(CommandSender $sender, Command $cmd, String $Lavel, Array $args) : bool{
        switch($cmd->getName()){

            case "hub":
                if($sender instanceof Player){
                    $this->openMyForm($sender);
                    //pls no roben el pl o lo reclamen como de ustedes :(
                } else {
                    $sender->sendMessage("Sorry You Can Only Execute This Command in The Game");
                }
            }
        return true;
    }

    public function openMyForm($player){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $player, int $data = null({
            $result = $data;
            if$result === null){
               return true;
            }
            switch($result){
                case 0:
                    //este es el boton 1
                    $this->getInstance()->getServer()->broadcastMessage("§e§l".$sender->getName()."§r§8Is Looking For a Faction);
                break;

                case 1:
                    //este es el boton 2
                    $this->getInstance()->getServer()->broadcastMessage("§e§l".$sender->getName()."§r§8Is Looking For a Players);
                break;
                
                case 2:
                    //este es el boton 3
                    $player->sendMessage("")
                break;
            }
        });
        $form->setTitle("Your Sever Name Here");
        $form->setContent("Your Content Here");
        $form->addButton("§l§eLFF");
        $form->addButton("§l§eLFP");
        $form->addButton("§l§8Cancel";
        $form->sendToPlayer($player);
        return $form;
    }
}