<?php namespace Excodus\TranslateExtended\Components;

use Cms\Classes\ComponentBase;
use RainLab\Translate\Components\LocalePicker;
use RainLab\Translate\Models\Locale as LocaleModel;
use RainLab\Translate\Classes\Translator;

class ExtendedLocalePicker extends LocalePicker
{
    public function componentDetails()
    {
        return [
            'name'        => 'Extended Locale Picker',
            'description' => 'excodus.translateextended::lang.strings.localepicker_desc'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function init()
    {
        $this->translator = Translator::instance();
    }

    public function onRun()
    {
        $this->page['locales'] = $this->locales = LocaleModel::listEnabled();
        $this->page['activeLocale'] = $this->activeLocale = $this->translator->getLocale();
        $this->page['activeLocaleName'] = $this->activeLocaleName = array_get($this->locales, $this->activeLocale);
        $this->page['localeLinks'] = $this->makeLinks($this->locales);
    }

    public function makeLinks($locales)
    {
        $links = [];
        foreach ($locales as $key => $locale) {
            $links[$key] = $this->makeLocaleUrlFromPage($key);
        }

        return $links;
    }
}
