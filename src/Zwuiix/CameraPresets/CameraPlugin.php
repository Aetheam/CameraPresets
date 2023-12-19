<?php

namespace Zwuiix\CameraPresets;

use pocketmine\plugin\PluginBase;

class CameraPlugin extends PluginBase
{
    /**
     * @return void
     */
    public function onEnable(): void
    {
        if(!CameraHandler::isRegistered()) {
            CameraHandler::register($this);
        }
    }
}