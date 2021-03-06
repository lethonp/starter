@php
    $leftText = (new Parsedown)->text(translatedData($brick, 'data.text_left'));
    $rightImage = $brick->getFirstMedia('images');
    $rightResponsiveImage = $rightImage->img('half', ['class' => 'w-100', 'alt' => $rightImage->name]);
    $invertOrder = data_get($brick, 'data.invert_order');
@endphp
<div class="container">
    <div class="row">
        <div class="col-sm-12 my-3 col-md-6 my-md-0">
            {!! $invertOrder ? $rightResponsiveImage : $leftText !!}
        </div>
        <div class="col-sm-12 my-3 col-md-6 my-md-0">
            {!! $invertOrder ? $leftText : $rightResponsiveImage !!}
        </div>
    </div>
</div>
