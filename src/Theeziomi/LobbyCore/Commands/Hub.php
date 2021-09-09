<?php

namespace Theeziomi\LobbyCore\Commands;

use pocketmine\Player;
use pocketmine\utils\TextFormat as TE;
use pocketmine\command\PluginCommand;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\network\mcpe\protocol\LevelEventPacket;

use Theeziomi\LobbyCore\Lobby;

class Hub extends PluginCommand
{
	
	private $plugin;
	
	public function __construct(Main $plugin)
	{
		parent::__construct("hub", $plugin);
		$this->plugin = $plugin;
		$this->setDescription("Regresar al Lobby");
	}
	
	public function execute(CommandSender $sender, $label, array $args)
	{
		if($sender instanceof Player){
			$sender->teleport($this->plugin->getServer()->getDefaultLevel()->getSafeSpawn());
			$sender->setScale(1.0);
                        $sender->setMaxHealth(1); 
			$sender->setGamemode(2);
			$sender->setFood(40);
			$sender->getArmorInventory()->clearAll();
			$sender->getInventory()->clearAll();
			$sender->sendMessage(TE::BOLD.TE::GREEN."§5Has vuelto al punto de spawn");
		}
	}
}

