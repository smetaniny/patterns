<?php

namespace App\Http\Controllers\PHP8\P426Visitor;

class TextDumpArmyVisitor extends ArmyVisitor
{
    private string $text = "";

    public function visit(Unit $node): void
    {
        $txt =
        $pad = 4 * $node->getDepth();
        $txt .= sprintf("%{$pad}s", "");
        $txt .= get_class($node) . ": ";
        $txt .= "Огневая мощь: " . $node->bombardStrength() . "<br />";
        $this->text .= $txt;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
