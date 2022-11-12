<?php

namespace kasa;

use pocketmine\block\VanillaBlocks;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\ItemFactory;
use pocketmine\item\ItemIds;
use pocketmine\item\VanillaItems;
use pocketmine\Server;

class KasaCommand extends Command
{
    public function __construct()
    {
        parent::__construct("kasa", "kasa oluşturur");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($args[0] == "olustur") {
            $item = ItemFactory::getInstance()->get(130);
            $item->setCustomName("§dKasa");
            $sender->getInventory()->addItem($item);
        }elseif ($args[0] == "anahtar") {
            $anahtar = ItemFactory::getInstance()->get(377, 0, 64)->setCustomName("§aKasa Anahtarı");
            $sender->getInventory()->addItem($anahtar);
        }
    }
}
