<?php

namespace Zwuiix\Camera\Instruction;

use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\CameraInstructionPacket;
use pocketmine\network\mcpe\protocol\types\camera\CameraPreset;
use pocketmine\network\mcpe\protocol\types\camera\CameraSetInstructionEase;
use pocketmine\network\mcpe\protocol\types\camera\CameraSetInstructionRotation;
use pocketmine\network\mcpe\protocol\types\camera\CameraSetInstruction as CameraSetInstructionPM;
use pocketmine\player\Player;

final class CameraSetInstruction extends CameraInstruction
{
    protected ?CameraPreset $cameraPreset = null;
    protected ?CameraSetInstructionEase $cameraSetInstructionEase = null;
    protected ?Vector3 $cameraPosition = null;
    protected ?CameraSetInstructionRotation $cameraSetInstructionRotation = null;
    protected ?Vector3 $facingPosition = null;

    /**
     * @param CameraPreset $cameraPreset
     * @return CameraSetInstruction
     */
    public function setPreset(CameraPreset $cameraPreset): self
    {
        $this->cameraPreset = $cameraPreset;
        return $this;
    }

    /**
     * @param int $type
     * @param float $duration
     * @return $this
     */
    public function setEase(int $type, float $duration): self
    {
        $this->cameraSetInstructionEase = new CameraSetInstructionEase($type, $duration);
        return $this;
    }

    /**
     * @param Vector3 $cameraPosition
     * @return $this
     */
    public function setCameraPosition(Vector3 $cameraPosition): self
    {
        $this->cameraPosition = $cameraPosition;
        return $this;
    }

    /**
     * @param float $pitch
     * @param float $yaw
     * @return $this
     */
    public function setRotation(float $pitch, float $yaw): self
    {
        $this->cameraSetInstructionRotation = new CameraSetInstructionRotation($pitch, $yaw);
        return $this;
    }

    /**
     * @param Vector3 $facingPosition
     * @return CameraSetInstruction
     */
    public function setFacingPosition(Vector3 $facingPosition): self
    {
        $this->facingPosition = $facingPosition;
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

        $player->getNetworkSession()->sendDataPacket(CameraInstructionPacket::create(new CameraSetInstructionPM(0, $this->cameraSetInstructionEase, $this->cameraPosition, $this->cameraSetInstructionRotation, $this->facingPosition, null), null, null));
    }
}
