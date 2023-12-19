<?php

namespace Zwuiix\CameraPresets;

use pocketmine\network\mcpe\protocol\types\camera\CameraPreset;
use pocketmine\utils\CloningRegistryTrait;

/**
 * @method static CameraPreset FREE()
 * @method static CameraPreset FIRST_PERSON()
 */
class CameraPresets
{
    use CloningRegistryTrait;

    protected static function setup(): void
    {
        self::_registryRegister("free", new CameraPreset("minecraft:free", "", 0, 0, 0, 0, 0, CameraPreset::AUDIO_LISTENER_TYPE_CAMERA, false));
        self::_registryRegister("first_person", new CameraPreset("minecraft:first_person", "", 0, 0, 0, 0, 0, CameraPreset::AUDIO_LISTENER_TYPE_CAMERA, false));
    }

    /**
     * @return CameraPreset[]
     */
    public static function getAll(): array
    {
        return array_keys(self::$members);
    }
}
