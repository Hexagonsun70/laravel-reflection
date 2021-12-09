<?php

namespace App\View\Components\table;

use Illuminate\View\Component;

class table extends Component
{

    public array $headers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $headers)
    {
        $this->headers = $this->formatHeaders($headers);
    }

    private function formatHeaders(array $headers):array
    {
        return array_map(function ($header) {
            $name = is_array($header) ? $header['name'] : $header;

            return [
                'name' => $name,
                'classes' => $this->borderClasses($header['border'] ?? 'border-r'),
            ];
        }, $headers);
    }

    private function borderClasses($border):string
    {
        return [
            'left' => 'border-l',
            'right' => 'border-r',
            'bottom' => 'border-b',
        ][$border] ?? 'border-r';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.table');
    }
}
