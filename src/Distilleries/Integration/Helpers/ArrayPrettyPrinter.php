<?php

namespace Distilleries\Integration\Helpers;

use PhpParser\PrettyPrinter;
use PhpParser\Node\Expr;

class ArrayPrettyPrinter extends PrettyPrinter\Standard
{

    protected function pExpr_Array(Expr\Array_ $node) {
        $syntax = $node->getAttribute('kind',
            $this->options['shortArraySyntax'] ? Expr\Array_::KIND_SHORT : Expr\Array_::KIND_LONG);
        if ($syntax === Expr\Array_::KIND_SHORT) {
            return "[\n\t" . $this->pCommaSeparatedWithBreakLine($node->items) . "\n]";
        } else {
            return "array(\n\t" . $this->pCommaSeparatedWithBreakLine($node->items) . "\n)";
        }
    }

    protected function pCommaSeparatedWithBreakLine(array $nodes) {
        return $this->pImplode($nodes, ",\n\t");
    }

}