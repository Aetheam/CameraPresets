<?php

namespace Zwuiix\Camera\Instruction;

use pocketmine\network\mcpe\protocol\CameraInstructionPacket;
use pocketmine\player\Player;

final class CameraClearInstruction extends CameraInstruction
{
    public function send(Player $player): void
    {
        if(!$player->isConnected()) {
            return;
        }

        $player->getNetworkSession()->sendDataPacket(CameraInstructionPacket::create(null, true, null));
    }
}
