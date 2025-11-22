<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Group;

class GroupUpdateForm extends Component
{
    public $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.group-update-form');
    }
}
