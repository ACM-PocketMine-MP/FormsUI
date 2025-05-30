<?php

declare(strict_types = 1);

namespace Vecnavium\FormsUI;

use pocketmine\form\FormValidationException;

class ModalForm extends Form{

    /** @var string $content */
    private string $content = "";

    /**
     * @param callable|null $callable
     */
    public function __construct(?callable $callable){
        parent::__construct($callable);
        $this->data["type"] = "modal";
        $this->data["title"] = "";
        $this->data["content"] = $this->content;
        $this->data["button1"] = "";
        $this->data["button2"] = "";
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void{
        $this->data["title"] = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string{
        return $this->data["title"];
    }

    /**
     * @return string
     */
    public function getContent(): string{
        return $this->data["content"];
    }

    /**
     * @param string $content
     * @return void
     */
    public function setContent(string $content): void{
        $this->data["content"] = $content;
    }

    /**
     * @param string $text
     * @return void
     */
    public function setButton1(string $text): void{
        $this->data["button1"] = $text;
    }

    /**
     * @return string
     */
    public function getButton1(): string{
        return $this->data["button1"];
    }

    /**
     * @param string $text
     * @return void
     */
    public function setButton2(string $text): void{
        $this->data["button2"] = $text;
    }

    /**
     * @return string
     */
    public function getButton2(): string{
        return $this->data["button2"];
    }

    public function processData(&$data): void{
        if(is_null($data) && !is_bool($data)){
            throw new FormValidationException("Expected a boolean response, got " . gettype($data));
        }
    }
}