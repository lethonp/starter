@extends('laravel-brickables::admin.form.layout')
@section('inputs')
    {{ inputText()->name('title')->locales(supportedLocaleKeys())->prepend(false)->value(function($locale) use($brick) {
        return translatedData($brick, 'data.title', $locale);
    })->containerHtmlAttributes(['required']) }}
@endsection
