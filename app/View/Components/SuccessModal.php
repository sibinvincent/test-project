<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SuccessModal extends Component
{
    public $title;
    public $actionText;
    public $open;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param string $actionText
     * @param $open
     */
    public function __construct($title,$open=false,$actionText='ok')
    {
        $this->title = $title;
        $this->actionText = $actionText;
        $this->open = $open;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.success');
    }
}
