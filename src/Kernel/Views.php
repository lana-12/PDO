<?php

namespace Vivi\PDO\Kernel;

use Vivi\PDO\Configuration\Config;
use Vivi\PDO\Kernel\Model;

class Views
{
    private string $html;
    private string $head;
    private string $header;
    private string $footer;
    private string $flashMsg;


    public function setHtml(string $html): self
    {
        $this->html = Config::VIEWS . $html;
        return $this;
    }


    public function setHead(string $head): self
    {
        $this->head = Config::TEMPLATES . $head;
        
        return $this;
    }

    public function setHeader(string $header): self
    {
        $this->header = Config::TEMPLATES . $header;
        
        return $this;
    }


    public function setFooter(string $footer): self
    {
        $this->footer = Config::TEMPLATES . $footer;
        return $this;
    }


    public function render(array $vars, ?string $head = null,  ?string $header = null, ?string $html = null, ?string $footer = null)
    {

        if ($html !== null) {
            $this->html = $html;
        }

        if ($footer !== null) {
            $this->footer = $footer;
        }

        if ($head !== null) {
            $this->head = $head;
        }

        if ($header !== null) {
            $this->header = $header;
        }

        extract($vars);

        include(dirname(__FILE__) . "/../" . $this->head);
        include(dirname(__FILE__) . "/../" . $this->header);
        include(dirname(__FILE__) . "/../" . $this->html);
        include(dirname(__FILE__) . "/../" . $this->footer);
    }
}
