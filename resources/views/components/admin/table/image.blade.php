@if($image)
    {{ image()->src($image->getUrl('thumb'))
        ->linkUrl($image->getUrl())
        ->linkTitle($image->name) }}
@endif
