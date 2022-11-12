<?php

namespace kasa;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class kasa extends PluginBase implements Listener
{
    public static kasa $kasa;

    public static function getInstance(): ?kasa
    {
        return self::$kasa;
    }

    public function onLoad(): void
    {
        self::$kasa = $this;
    }

    public function onEnable(): void
    {
        $this->saveResource("kasa.yml");
        $this->getServer()->getCommandMap()->register("kasa", new KasaCommand($this));
        $this->getServer()->getPluginManager()->registerEvents(new KasaEvent($this), $this);
    }
}
