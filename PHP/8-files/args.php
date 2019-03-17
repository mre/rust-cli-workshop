<?php

class Arguments
{
    public $positionalArgs = [];
    public $mode = null;

    // Try changing $mode to $flag in the input parameter
    // and then call the program with `-m` or `-c`.
    public function __construct($positionalArgs, $mode)
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
