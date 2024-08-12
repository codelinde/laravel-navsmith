<?php

namespace CodeLinde\Navsmith\View\Components;

use Closure;
use CodeLinde\Navsmith\Facades\Navsmith;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Route;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route as RouteFacade;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Links extends Component
{
    /**
     * @var Collection<string, string>
     */
    public Collection $links;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links = $this->getLinks();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('navsmith::components.links');
    }

    public function isCurrentLink(string $link): bool
    {
        return $link === url()->current();
    }

    /**
     * @return Collection<string, string>
     */
    public function getLinks(): Collection
    {
        $namePrefix = Navsmith::getNamePrefix();

        return Collection::wrap(RouteFacade::getRoutes()->getRoutesByName())
            ->filter(fn (Route $route, string $name) => Str::startsWith($name, $namePrefix))
            ->keys()
            ->mapWithKeys(function (string $route) use ($namePrefix) {
                $routeName = Str::replaceFirst($namePrefix, '', $route);
                $transformedRouteName = Navsmith::applyRouteNameTransformation($routeName);

                return [$transformedRouteName => route($route)];
            });
    }
}
