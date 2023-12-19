<?php

namespace Zwuiix\Camera\Instruction;

use Zwuiix\CameraPresets\CameraHandler;
use pocketmine\player\Player;

abstract class CameraInstruction
{
    public function __construct()
    {
        if(!CameraHandler::isRegistered()) {
            throw new \Error("You must register CameraHandler");
        }
    }

    /**
     * @param Player $player
     * @return void
     */
    abstract public function send(Player $player): void;
}
