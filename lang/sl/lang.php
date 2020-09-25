<?php

return [
    'strings'     => [
        'plugin_desc'                        => 'Dodatek za vtičnik RainLab.Translate, ki omogoča zaznavanje jezika in dodajanje jezikovne predpone za URL poti.',
        'plugin_short_desc'                  => 'Razširitev vtičnika RainLab.Translate',
        'settings_label'                     => 'Nastavitve za razširjeni prevajalnik',
        'settings_desc'                      => 'Upravljanje z nastavitvami za razširjeni prevajalnik (Translate Extended).',
        'browser_language_detection'         => 'Zaznavanje jezika brskalnika',
        'browser_language_detection_comment' => 'Omogoči prevajanje spletnega mesta v privzeti jezik brskalnika.',
        'route_prefixing'                    => 'Predpona URL poti',
        'route_prefixing_comment'            => 'Omogoči dodajanje jezikovne predpone za URL poti.',
        'prefer_user_session'                => 'Prednost uporabniške seje pred samodejno zaznanim jezikom',
        'prefer_user_session_comment'        => 'Če je omogočeno, bo imel jezik, nastavljen v uporabniški seji, prednost pred samodejno zaznanim jezikom brskalnika. Če je onemogočeno, bo jezikovna nastavitev zaznana vsakič, ko uporabnik (ponovno) vstopi na spletno mesto.',
        'homepage_redirect'                  => 'Preusmeritev domače strani',
        'homepage_redirect_comment'          => 'Če je omogočeno, bo URL-ju domače strani dodana jezikovna predpona privzetega jezika.',
        'force_prefix'                       => 'Prisilna jezikovna predpona',
        'force_prefix_comment'               => 'Če je omogočeno, bodo vse GET zahteve dobile jezikovno predpono, in sicer za URL-je, ki le-te nimajo nastavljene.',
        'localepicker_desc'                  => 'Prikaže seznam povezav za spremembo jezika na spletnem mestu.',
    ],
    'permissions' => [
        'tab'      => 'Excodus',
        'settings' => 'Dostop do nastavitev',
    ],
];
