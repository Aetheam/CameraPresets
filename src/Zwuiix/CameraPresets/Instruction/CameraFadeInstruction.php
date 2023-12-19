<?php

namespace Zwuiix\Camera\Instruction;

use pocketmine\network\mcpe\protocol\CameraInstructionPacket;
use pocketmine\network\mcpe\protocol\types\camera\CameraFadeInstruction as CameraFadeInstructionPM;
use pocketmine\network\mcpe\protocol\types\camera\CameraFadeInstructionColor;
use pocketmine\network\mcpe\protocol\types\camera\CameraFadeInstructionTime;
use pocketmine\player\Player;

final class CameraFadeInstruction extends CameraInstruction
{
    protected CameraFadeInstructionColor $color;
    protected CameraFadeInstructionTime $time;

    /**
     * @param string $red
     * @param string $green
     * @param string $blue
     * @return $this
     */
    public function setColor(string $red, string $green, string $blue): self
    {
        $this->color = new CameraFadeInstructionColor($red, $green, $blue);
        return $this;
    }

    /**
     * @param float $fadeInTime
     * @param float $stayInTime
     * @param float $fadeOutTime
     * @return $this
     */
    public function setTime(float $fadeInTime, float $stayInTime, float $fadeOutTime): self
    {
        $this->time = new CameraFadeInstructionTime($fadeInTime, $stayInTime, $fadeOutTime);
        return $this;
    }

    /**
     * @param Player $player
     * @return void
     */
    public function send(Player $player): void
    {
        if(!$player->isConnected()) {
            return;
        }

        $player->getNetworkSession()->sendDataPacket(CameraInstructionPacket::create(null, null, new CameraFadeInstructionPM($this->time, $this->color)));
    }
}
