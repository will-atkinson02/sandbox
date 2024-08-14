namespace online store\past projects;

<?php

/**
 * Welcome to iO game dev co!
 *
 * Here is a Player class that a colleague started work on. Unfortunately they went on holiday before
 * they could finish it. There are a few issues that are stopping the code from working, and a few extra bits
 * we need you to finish.
 *
 * Tasks
 *
 * __construct()
 * - We need to add a constructor so we can instantiate Player objects !
 * - The only param to the constructor should be maxHealth as an int !
 * - The constructor should update the maxHealth property !
 * - It should also set the currentHealth to be the same as maxHealth !
 * - It doesn't need to do anything with the inventory or inventoryCapacity
 *
 * damage()
 * - The method should return the new currentHealth of the player !
 * - It should not be possible for a players currentHealth to be less than 0 !
 *      - Any damage that would take currentHealth under 0 should be ignored !
 * - If the currentHealth reaches 0, we need to call the dead private method !
 *
 * heal()
 * - The method should return the new currentHealth of the player !
 * - It should not be possible to heal the player past their max health !
 *      -  For example, if a player's currentHealth is 90, and their max health is 100, healing them by 20 points should
 *          not increase their health beyond the max of 100. The extra 10 points should be ignored.
 *  - If a players currentHealth is 0, the heal method should do nothing other than return currentHealth !
 *
 * pickupItem()
 * - This method is currently broken, the $item should be added into the inventory array !
 * - If the inventory is full (number of items in the inventory is at the inventoryCapacity) the item does not get added
 *      and the method simply returns the inventory !
 *
 * dropItem()
 * - We need a new method to allow the player to drop an item in their inventory !
 * - It should take the item as a param !
 * - If the item to be dropped is not in the inventory, just return the inventory and do nothing else
 * - Otherwise, the item should be removed from the inventory and the updated inventory is returned
 *
 * Shield system
 * - Players need to have shields to give them extra protection
 * - Similar to the health system, there should be a maxShield and currentShield.
 *      - The maxShield should be set via the constructor
 *      - The constructor should set the currentShield to be the same as maxShield
 * - The damage() method should be updated so that it reduces the currentShield until it reaches 0, and then starts
 *      reducing the currentHealth
 * - We need a powerUpShield() method
 *      - It should take a shieldAmount as an int
 *      - It should increase the currentShield by the shieldAmount
 *          - Unless the currentShield reaches maxShield, in which case any extra is ignored
 *      - It should return the updated currentShield
 *
 */


//declare(strict_types=1);

class Player
{
    public int $maxHealth;
    public int $currentHealth;
    public int $maxShield;
    public int $currentShield;
    public int $inventoryCapacity = 3;
    public array $inventory = [];

    public function __construct(int $maxHealth, int $maxShield)
    {
        $this->maxHealth = $maxHealth;
        $this->currentHealth = $maxHealth;

        $this->maxShield = $maxShield;
        $this->currentShield = $maxShield;
    }

    public function takeDamage(int $damageAmount): mixed
    {
        if ($this->currentShield > 0) {
            if ($damageAmount <= $this->currentShield) {
                $this->currentShield -= $damageAmount;
                return $this->currentHealth;
            }

            $damageAmount -= $this->currentShield;
            $this->currentShield = 0;
        }

        if ($this->currentHealth - $damageAmount <= 0) {
            $this->currentHealth = 0;
            $this->dead();
            return $this->currentHealth;
        }

        $this->currentHealth -= $damageAmount;

        return $this->currentHealth;
    }

    public function heal(int $healAmount): int
    {
        if ($this->currentHealth === 0) {
            return $this->currentHealth;
        }

        if ($this->currentHealth + $healAmount > $this->maxHealth) {
            $this->currentHealth = $this->maxHealth;
            return $this->currentHealth;
        }

        $this->currentHealth += $healAmount;

        return $this->currentHealth;
    }

    public function pickupItem(string $item): array
    {
        if (count($this->inventory) >= $this->inventoryCapacity) {
            return $this->inventory;
        }

        $this->inventory[] = $item;
        return $this->inventory;

    }

    public function dropItem(string $item): array
    {
        if (!in_array($item, $this->inventory)) {
            return $this->inventory;
        }

        $indexToRemove = array_search($item, $this->inventory);
        unset($this->inventory[$indexToRemove]);
        return $this->inventory;
    }

    private function dead(): void
    {
        echo "Better luck next time!";
    }
}

$dave = new Player(50, 50, 3, []);


echo '<pre>';
var_dump($dave);


//echo $dave->inventory;
echo '<br />';
$dave->pickupItem('Sword');
echo '<br />';
$dave->pickupItem('Rare fish');
echo '<br />';
$dave->dropItem('Sword');
echo '<br />';

echo '<pre>';
var_dump($dave);
