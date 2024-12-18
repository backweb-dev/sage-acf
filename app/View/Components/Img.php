<?php

namespace Backweb\SageAcf\View\Components;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Backweb\SageAcf\Class\Img as ImgClass;

class Img extends Component
{
    public ImgClass|null $img;

    /**
     * Create a new component instance.
     */
    public function __construct(array|null|bool|int $img = null)
    {
        if (!$img) {
            $img = get_sub_field('img') ? get_sub_field('img') : get_field('img');
        }
        if (is_int($img)) {

            $this->img = ImgClass::createFromMediaID($img);

        } elseif ($img && is_array($img) && isset($img['url'])) {

            $this->img = ImgClass::create((object)$img);

        } elseif ($img && is_array($img) && !isset($img['url']) && isset($img['ID'])) {

            $this->img = ImgClass::createFromMediaID($img['ID']);

        } elseif ($img && is_object($img) && isset($img->ID)) {

            $this->img = ImgClass::createFromMediaID($img->ID);

        } else {

            $this->img = null;

        }
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (!$this->img) {
            return '';
        }
        return view('Acf::components.img');
    }
}
