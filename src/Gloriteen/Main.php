<?php

namespace Gloriteen;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;

class Main extends PluginBase implements Listener {
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
  public function onPlayerDeath(PlayerDeathEvent $event) : void{
    $victim = $event->getPlayer();
    if($victim->getLastDamageCause() instanceof EntityDamageByEntityEvent){
      if($victim->getLastDamageCause()->getDamager() instanceof Player){
          $killer = $victim->getLastDamageCause()->getDamager();
		  
          if(in_array($event->getPlayer()->getLevel()->getName(), ["world"])){
			  
	$killer->getInventory()->clearAll();
    $killer->getArmorInventory()->clearAll();
    $killer->getCursorInventory()->clearAll();
	$killer->setHealth(20);
	
	$inv = $killer->getArmorInventory();
    $inv->setHelmet(Item::get(Item::DIAMOND_HELMET));
    $inv->setChestplate(Item::get(Item::DIAMOND_CHESTPLATE));
    $inv->setLeggings(Item::get(Item::DIAMOND_LEGGINGS));
    $inv->setBoots(Item::get(Item::DIAMOND_BOOTS));
	
	$killer->getInventory()->addItem(Item::get(Item::DIAMOND_SWORD));
    $killer->getInventory()->addItem(Item::get(Item::GOLDEN_APPLE, 0, 15));
}
        }
      }
    }
  }