<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class aside extends Component
{
    /**
     * Create a new component instance.
     */
    public $routes;
    
    public function __construct()
    {
        $this->routes = [
            [
                'label' => 'Home',
                'is_dropdown' => true,
                'dropdown' => [
                    [
                        'label' => 'Contact Us',
                        'route_name' => 'contact',
                    ],
                    [
                        'label' => 'Get Support',
                        'route_name' => 'support',
                    ]
                ],
            ],
            [
                'label' => 'Jobs',
                'route_name' => 'jobs',
                'is_dropdown' => false,
            ],
            [
                'label' => 'Services',
                'is_dropdown' => true,
                'dropdown' => [
                    [
                        'label' => 'Freelancers',
                        'route_name' => 'freelancer',
                    ],
                    [
                        'label' => 'Companies',
                        'route_name' => 'company',
                    ],
                    [
                        'label' => 'Projects',
                        'route_name' => 'project',
                    ],
                ]

            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.aside');
    }
}
