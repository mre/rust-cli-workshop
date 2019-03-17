<?php

class Arguments
{
    public $positionalArgs = [];
    public $mode = null;

    public function __construct($positionalArgs, $flag)
    {
        $this->$positionalArgs = $positionalArgs;
        $this->mode = $mode;
        return $this;
    }
}

function parse(array $args): Arguments
{
    $mode = null;
    foreach ($args as $arg) {
        if (substr($arg, 0, 1) === "-") {
            $mode = $arg;
        } else {
            $positionalArgs = [$arg];
        }
    }
    return new Arguments($positionalArgs, $mode);
}
