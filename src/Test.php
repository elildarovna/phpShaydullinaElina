<?php

declare(strict_types = 1);

class Test {

    public function hello(string $name): string
    {
        return "Hello " . $name;
    }
}