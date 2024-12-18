<?php

namespace Backweb\SageAcf\Class;

class Img
{
    public string $url;
    public string $title;
    public string $width;
    public string $height;
    public string $alt;
    public int|bool $ID;

    public function __construct(string $url, string $title, string $width, string $height, string $alt = '', int|bool $ID = false)
    {
        $this->url = $url;
        $this->alt = $alt;
        $this->title = $title;
        $this->width = $width;
        $this->height = $height;
        $this->ID = $ID;
    }

    public static function create(object $img): Img
    {
        return new Img(
            $img->url,
            $img->title,
            $img->width,
            $img->height,
            $img->alt,
            $img->ID
        );
    }

    public static function createFromMediaID(int $ID): Img
    {
        $media = get_post($ID);
        $metadata = wp_get_attachment_metadata($ID);
        return new Img(
            url: wp_get_attachment_image_url($ID, 'full'),
            title: $media->post_title,
            width: $metadata['width'],
            height: $metadata['height'],
            alt: $media->post_title,
            ID: $ID
        );
    }
    public function __toString(): string
    {
        return $this->url;
    }
}
