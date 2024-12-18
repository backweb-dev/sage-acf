@props(['width' => $img->width, 'height' => $img->height])

<img src="{{ $img }}" alt="{{ $img->alt && $img->alt !== '' ? $img->alt : $img->title }}" width="{{ $width }}" height="{{ $height }}"
     id="img-{{ $img->ID }}" {{ $attributes }} loading="lazy">
