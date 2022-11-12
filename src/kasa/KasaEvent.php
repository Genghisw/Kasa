<?php /** @noinspection ALL */

namespace kasa;

use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\ItemFactory;
use pocketmine\item\ItemIds;
use pocketmine\math\Vector3;
use pocketmine\utils\Config;
use pocketmine\world\particle\FloatingTextParticle;
use pocketmine\world\Position;
use pocketmine\world\sound\BlazeShootSound;

class KasaEvent implements Listener
{
    public function kasaolustur(BlockPlaceEvent $event)
    {
        $player = $event->getPlayer();
        if ($player->getInventory()->getItemInHand()->getCustomName() == "§dKasa") {
            $event->getBlock()->getPosition()->getWorld()->addParticle(new Position($event->getBlock()->getPosition()->x + 0.5, $event->getBlock()->getPosition()->y + 1, $event->getBlock()->getPosition()->z + 0.5, $event->getBlock()->getPosition()->getWorld()), new FloatingTextParticle("§6Kasa\n§l§7TIKLA"));
        }
    }

    public function elle(PlayerInteractEvent $event)
    {
        $player = $event->getPlayer();
            if ($event->getBlock()->getId() == 130) {
                if ($event->getItem()->getId() == ItemIds::BLAZE_POWDER and $event->getItem()->getCustomName() == "§aKasa Anahtarı") {
                    $cfg = new Config(kasa::getInstance()->getDataFolder() . "kasa.yml", 2);
                    $rand = $cfg->get("Items")[array_rand($cfg->get("Items"))];
                    $exp = explode(":", $rand);
                    $item = ItemFactory::getInstance()->get($exp[0], $exp[1], $exp[2]);
                    $name = $exp[3];
                    $player->getWorld()->addSound($player->getPosition(), new BlazeShootSound(10));
                    $player->sendTitle("§3 - §aKasadan §f$exp[2]x $name §açıktı §3-");
                    $player->getInventory()->addItem($item);
                    $player->getInventory()->setItemInHand($event->getItem()->setCount($event->getItem()->getCount() - 1));
            }
        }
    }
}
