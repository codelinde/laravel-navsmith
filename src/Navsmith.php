<?php

namespace CodeLinde\Navsmith;

class Navsmith
{
    public function getNamePrefix(): string
    {
        return 'navsmith.';
    }

    public function applyRouteNameTransformation(string $name): string
    {
        return str($name)->title()->toString();
    }

    public function getRouteName(string $route): string
    {
        return $this->getNamePrefix().$route;
    }
}
