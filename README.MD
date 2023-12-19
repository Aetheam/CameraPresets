# CameraPresets
#### Idea from [kaxyum](https://github.com/kaxyum/CameraAPI)
Create and use the Minecraft BedrockEdition Camera system.

## Usage
**NOTE:** You MUST register `CameraHandler` during plugin enable before you can begin creating `CameraInstruction` instances.
```php
if(!CameraHandler::isRegistered()){
	CameraHandler::register($this);
}
```


## Creating an CameraInstruction
```php
(new CameraFadeInstruction())
    ->setTime(1, 1, 1)
    ->setColor(0, 0, 0)
    ->send($player);
```

## Authors

- [@Zwuiix-cmd](https://www.github.com/Zwuiix-cmd)

