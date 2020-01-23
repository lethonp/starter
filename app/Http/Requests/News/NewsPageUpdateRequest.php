<?php

namespace App\Http\Requests\News;

use App\Http\Requests\Request;
use App\Services\Seo\SeoService;

class NewsPageUpdateRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $localizedRules = localizeRules([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['string', 'max:65535'],
        ]);
        $seoMetaRules = (new SeoService)->getSeoMetaRules();

        return array_merge($localizedRules, $seoMetaRules);
    }
}
