<?php

declare(strict_types = 1);

namespace Vecnavium\FormsUI;

use pocketmine\form\Form as IForm;
use pocketmine\player\Player;

abstract class Form implements IForm{

    /** @var array $data[] */
    protected array $data = [];
    /** @var callable|null */
    private $callable;

    /**
     * @param callable|null $callable
     */
    public function __construct(?callable $callable){
        $this->callable = $callable;
    }

    /**
     * @deprecated
     * @see Player::sendForm()
     *
     * @param Player $player
     */
    public function sendToPlayer(Player $player): void{
        $player->sendForm($this);
    }

    /**
     * @return callable|null
     */
    public function getCallable(): ?callable{
        return $this->callable;
    }

    /**
     * @param callable|null $callable
     * @return void
     */
    public function setCallable(?callable $callable): void{
        $this->callable = $callable;
    }

    /**
     * @param Player $player
     * @param [type] $data
     * @return void
     */
    public function handleResponse(Player $player, $data): void{
        $this->processData($data);
        $callable = $this->getCallable();
        if($callable !== null){
            $callable($player, $data);
        }
    }

    public function processData(&$data): void{
    }

    /**
     * @return mixed
     */
    public function jsonSerialize(): mixed{
        return $this->data;
    }
}
