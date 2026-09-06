<?php

/*
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 *
 * Copyright (c) 2021-2026 RIADVICE SUARL.
 *
 * This program is free software: you can redistribute it and/or modify it under the
 * terms of the GNU Affero General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License along
 * with SpoutBreeze. If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

return [
    'i18n' => [
        'seo' => [
            'title'       => 'Sukarix - Modern PHP-framework op Fat-Free',
            'description' => 'Sukarix is een modern PHP 8.4+ framework gebouwd op Fat-Free, met routing, ACL, dependency injection, i18n, queues, caching, sessies en product-klare standaardinstellingen.',
            'keywords'    => 'Sukarix, PHP framework, Fat-Free Framework, F3, PHP 8.4, dependency injection, ACL, routing, i18n, Redis queues, open source framework',
            'og_title'       => 'Sukarix - Modern PHP-framework op Fat-Free',
            'og_description' => 'Bouw enterprise-klare PHP-applicaties met een kleine, expressieve framework-laag bovenop Fat-Free.',
            'twitter_title'       => 'Sukarix - Modern PHP-framework op Fat-Free',
            'twitter_description' => 'Routing, ACL, DI, i18n, queues, caching en product-klare standaardinstellingen voor PHP-applicaties.',
        ],
        'label' => [
            'core' => [
                'email'                 => 'E-mail',
                'password'              => 'Wachtwoord',
                'password_hint'         => 'Wachtwoord (minimaal 8 tekens)',
                'first_name'            => 'Voornaam',
                'last_name'             => 'Achternaam',
                'back'                  => 'Terug',
                'submit'                => 'Verzenden',
                'confirm'               => 'Goedkeuren',
                'cancel'                => 'Annuleren',
                'logo'                  => 'Logo',
                'first'                 => 'Eerste',
                'last'                  => 'Laatste',
                'actions'               => 'Acties',
                'send_email'            => 'E-mail verzenden',
                'password_confirmation' => 'wachtwoord bevestigen',
                'save_password'         => 'wachtwoord opslaan',
                'add'                   => 'Toevoegen',
                'edit'                  => 'Bewerken',
                'save'                  => 'Opslaan',
                'view_more'             => 'Meer bekijken...',
                'register'              => 'Registreren',
                'id'                    => 'ID',
                'search'                => 'Zoeken...',
                'sending'               => 'Verzenden...',
                'at'                    => 'om',
            ],
            'menu' => [
                'users' => 'Gebruikers',
            ],
            'user' => [
                'users'            => 'Gebruikers',
                'user'             => 'Gebruiker',
                'email'            => 'E-mail',
                'role'             => 'Rol',
                'status'           => 'Status',
                'first_name'       => 'Voornaam',
                'last_name'        => 'Achternaam',
                'edit_user'        => 'Gebruiker bewerken',
                'new_user'         => 'Nieuwe gebruiker',
                'add_user'         => 'Gebruiker toevoegen',
                'my_profile'       => 'Mijn profiel',
                'new_password'     => 'Nieuw wachtwoord',
                'reset_password'   => 'Wachtwoord resetten',
                'current_password' => 'Huidig wachtwoord',
                'confirm_password' => 'Wachtwoord bevestigen',
                'change_password'  => 'Mijn wachtwoord wijzigen',
            ],
            'nav' => [
                'home'          => 'Home',
                'documentation' => 'Documentatie',
                'features'      => 'Functies',
                'languages'     => 'Taal',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => 'De juiste hoeveelheid zoetheid en efficiëntie bovenop Fat-Free. Een modern PHP-framework voor enterprise-applicaties.',
                'cta_primary'   => 'Aan de slag',
                'cta_secondary' => 'Functies verkennen',
            ],
            'intro' => [
                'badge'    => 'Framework-skeleton',
                'title'    => 'Welkom bij Sukarix',
                'subtitle' => 'Het hoofddoel van Sukarix is om ontwikkelaars een krachtig en efficiënt framework te bieden voor het bouwen van enterprise-level PHP-applicaties.',
            ],
            'features' => [
                'routing' => [
                    'title'       => 'Routing & ACL',
                    'description' => 'Geavanceerde routing- en access control list-mogelijkheden zorgen voor veilig en flexibel toegangsbeheer voor uw applicaties, met een standaard-weigerbeleid en per-route autorisatie.',
                ],
                'queue' => [
                    'title'       => 'Queue-service',
                    'description' => 'Een Redis-backed FIFO-queue met deduplicatie en pogingenregistratie, aangedreven door atomaire Lua-scripts voor consistente pipeline-verwerking across workers.',
                ],
                'di' => [
                    'title'       => 'Dependency Injection',
                    'description' => 'Een ingebouwde IoC-container met typed service-resolutie en strikte validatie, die losse koppeling bevordert en uw code gemakkelijk te testen en te onderhouden maakt.',
                ],
                'enterprise' => [
                    'title'       => 'Enterprise-klaar',
                    'description' => 'Ontworpen voor enterprise-gebruik met gestructureerde logging, foutafhandeling, event-dispatching, i18n, CSRF-bescherming en cron-job planning vanaf het begin ingebouwd.',
                ],
                'i18n' => [
                    'title'       => 'Internationalisatie',
                    'description' => 'Meertalige ondersteuning met een eenvoudig woordenboekformaat, automatische locale-detectie en runtime-switching zonder dependencies te herladen.',
                ],
            ],
            'cta' => [
                'title'    => 'Klaar om te bouwen?',
                'subtitle' => 'Start uw volgende project met Sukarix en lever sneller af.',
                'button'   => 'Lees de documentatie',
            ],
            'capabilities' => [
                'badge'    => 'Standaard inbegrepen',
                'title'    => 'Alles wat een framework-starter zou moeten laten zien.',
                'subtitle' => 'Een compacte set app-essentials zodat ontwikkelaars direct begrijpen wat Sukarix hen biedt voordat ze de documentatie openen.',
                'stat_languages'  => 'Talen',
                'stat_foundation' => 'Fundering',
                'typed_actions'      => ['title' => 'Typed actions', 'description' => 'Kleine WebAction-controllers die F3-templates netjes renderen.'],
                'hive_config'        => ['title' => 'F3 hive-config', 'description' => 'INI-gestuurde instellingen met voorspelbare omgeving-overrides.'],
                'service_injector'   => ['title' => 'Service-injector', 'description' => 'Los herbruikbare services op zonder zware dependencies te koppelen.'],
                'acl_security'       => ['title' => 'ACL-beveiliging', 'description' => 'Standaard-weigeren toegangsregels voor veiligere route-bescherming.'],
                'csrf_sessions'      => ['title' => 'CSRF-sessies', 'description' => 'Sessie-gebaseerde tokens en veilige standaardinstellingen voor web-flows.'],
                'cache_helpers'      => ['title' => 'Cache-helpers', 'description' => 'Onthoud, vergeet en hergebruik dure data met minder code.'],
                'events'             => ['title' => 'Events', 'description' => 'Dispatch app-gedrag zonder workflows aan elkaar te koppelen.'],
                'cli_actions'        => ['title' => 'CLI-acties', 'description' => 'Bouw command-line taken met dezelfde framework-patronen.'],
                'statera_tests'      => ['title' => 'Statera-tests', 'description' => 'Lichtgewicht scenario-gebaseerde tests ontworpen voor Sukarix.'],
                'phinx_migrations'   => ['title' => 'Phinx-migraties', 'description' => 'Versie database-wijzigingen wanneer uw app persistentie nodig heeft.'],
                'structured_logs'    => ['title' => 'Gestructureerde logs', 'description' => 'Monolog-aangedreven output voor web-verzoeken en CLI-werk.'],
                'translations'       => ['title' => 'Vertalingen', 'description' => 'Locale-bestanden en runtime-switching voor meertalige apps.'],
            ],
            'hero_labels' => [
                'badge'           => 'PHP 8.4+ framework op Fat-Free',
                'start_title'     => 'Start in seconden',
                'start_subtitle'  => 'Installeer, route, render',
                'queues_title'    => 'Queues',
                'queues_desc'     => 'Redis-klare pipelines',
                'security_title'  => 'Beveiliging',
                'security_desc'   => 'ACL + CSRF + sessies',
            ],
            'features_header' => [
                'badge'    => 'Sukarix toolkit',
                'title'    => 'Klein oppervlak, serieuze framework-kracht.',
                'subtitle' => 'De skeleton-app moet aanvoelen als het framework: gefocust, expressief en klaar voor echte producten zonder visuele ruis.',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => 'Gebouwd op de bewezen Fat-Free Framework-kern, met Sukarix die de zoete laag toevoegt voor services, structuur en product-klare standaardinstellingen.',
                'link'        => 'Meer weten',
            ],
            'footer' => [
                'about_title'   => 'Over',
                'about_text'    => 'Sukarix is een open-source PHP-framework gebouwd op Fat-Free.',
                'contact_title' => 'Contact',
                'follow_title'  => 'Volg ons',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => 'Log me in',
                'logout'              => 'Uitloggen',
                'delete_confirm'      => 'Wilt u doorgaan?',
                'yes'                 => 'Ja',
                'no'                  => 'Nee',
                'cancel'              => 'Annuleren',
                'all_rights_reserved' => 'Alle rechten voorbehouden',
                'copyright'           => 'Copyright',
                'record_updated'      => 'Record bijgewerkt',
            ],
            'user' => [
                'login_success'           => 'Welkom terug {0}!',
                'add_success'             => 'Gebruiker succesvol toegevoegd',
                'edit_user'               => 'Gebruiker bewerken',
                'delete_user'             => 'Gebruiker verwijderen',
                'edit_success'            => 'Gebruiker {0} succesvol bewerkt',
                'profile_edit_success'    => 'Profiel succesvol bewerkt',
                'delete_success'          => 'Gebruiker {0} succesvol verwijderd',
                'change_password_success' => 'Wachtwoord succesvol gewijzigd',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => 'Onverwachte serverfout',
                'empty'        => 'Dit veld is verplicht',
            ],
            'login' => [
                'email'         => 'Ongeldig e-mailadres',
                'password'      => 'Ongeldig wachtwoord',
                'password_size' => 'Wachtwoordlengte moet minimaal 8 tekens zijn',
            ],
        ],
        'list' => [
            'countries' => [],
            'locales' => [
                'en-GB' => 'English',
                'fr-FR' => 'Français',
                'de-DE' => 'Deutsch',
                'es-ES' => 'Español',
                'pt-BR' => 'Português (Brasil)',
                'pt-PT' => 'Português (Portugal)',
                'th-TH' => 'ไทย',
                'zh-CN' => '中文',
                'zh-TW' => '繁體中文',
                'vi-VN' => 'Tiếng Việt',
                'ar-SA' => 'العربية',
                'nl-NL' => 'Nederlands',
                'it-IT' => 'Italiano',
                'ru-RU' => 'Русский',
                'ja-JP' => '日本語',
                'uk-UA' => 'Українська',
            ],
            'roles' => [
                'admin'    => 'Beheerder',
                'customer' => 'Klant',
            ],
            'statuses' => [
                'inactive' => 'Inactief',
                'active'   => 'Actief',
            ],
            'statuses_tags' => [
                'Y' => 'Actief',
                'N' => 'Passief',
            ],
            'days' => [
                'monday'    => 'Maandag',
                'tuesday'   => 'Dinsdag',
                'wednesday' => 'Woensdag',
                'thursday'  => 'Donderdag',
                'friday'    => 'Vrijdag',
                'saturday'  => 'Zaterdag',
                'sunday'    => 'Zondag',
            ],
            'months' => [
                'january'   => 'Januari',
                'february'  => 'Februari',
                'march'     => 'Maart',
                'april'     => 'April',
                'may'       => 'Mei',
                'june'      => 'Juni',
                'july'      => 'Juli',
                'august'    => 'Augustus',
                'september' => 'September',
                'october'   => 'Oktober',
                'november'  => 'November',
                'december'  => 'December',
            ],
        ],
    ],
];
