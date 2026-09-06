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
            'title'       => 'Sukarix - Framework PHP moderno su Fat-Free',
            'description' => 'Sukarix è un framework PHP 8.4+ moderno basato su Fat-Free, con routing, ACL, dependency injection, i18n, code, caching, sessioni e impostazioni pronte per la produzione.',
            'keywords'    => 'Sukarix, framework PHP, Fat-Free Framework, F3, PHP 8.4, dependency injection, ACL, routing, i18n, code Redis, framework open source',
            'og_title'       => 'Sukarix - Framework PHP moderno su Fat-Free',
            'og_description' => 'Crea applicazioni PHP pronte per l\'enterprise con un livello di framework piccolo ed espressivo sopra Fat-Free.',
            'twitter_title'       => 'Sukarix - Framework PHP moderno su Fat-Free',
            'twitter_description' => 'Routing, ACL, DI, i18n, code, caching e impostazioni pronte per la produzione per applicazioni PHP.',
        ],
        'label' => [
            'core' => [
                'email'                 => 'Email',
                'password'              => 'Password',
                'password_hint'         => 'Password (almeno 8 caratteri)',
                'first_name'            => 'Nome',
                'last_name'             => 'Cognome',
                'back'                  => 'Indietro',
                'submit'                => 'Invia',
                'confirm'               => 'Approva',
                'cancel'                => 'Annulla',
                'logo'                  => 'Logo',
                'first'                 => 'Primo',
                'last'                  => 'Ultimo',
                'actions'               => 'Azioni',
                'send_email'            => 'Invia email',
                'password_confirmation' => 'conferma password',
                'save_password'         => 'salva password',
                'add'                   => 'Aggiungi',
                'edit'                  => 'Modifica',
                'save'                  => 'Salva',
                'view_more'             => 'Visualizza altro...',
                'register'              => 'Registrati',
                'id'                    => 'ID',
                'search'                => 'Cerca...',
                'sending'               => 'Invio in corso...',
                'at'                    => 'alle',
            ],
            'menu' => [
                'users' => 'Utenti',
            ],
            'user' => [
                'users'            => 'Utenti',
                'user'             => 'Utente',
                'email'            => 'Email',
                'role'             => 'Ruolo',
                'status'           => 'Stato',
                'first_name'       => 'Nome',
                'last_name'        => 'Cognome',
                'edit_user'        => 'Modifica utente',
                'new_user'         => 'Nuovo utente',
                'add_user'         => 'Aggiungi utente',
                'my_profile'       => 'Il mio profilo',
                'new_password'     => 'Nuova password',
                'reset_password'   => 'Reimposta password',
                'current_password' => 'Password attuale',
                'confirm_password' => 'Conferma password',
                'change_password'  => 'Cambia la mia password',
            ],
            'nav' => [
                'home'          => 'Home',
                'documentation' => 'Documentazione',
                'features'      => 'Funzionalità',
                'languages'     => 'Lingua',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => 'La giusta dose di dolcezza ed efficienza sopra Fat-Free. Un framework PHP moderno per applicazioni enterprise.',
                'cta_primary'   => 'Inizia subito',
                'cta_secondary' => 'Esplora le funzionalità',
            ],
            'intro' => [
                'badge'    => 'Skeleton di framework',
                'title'    => 'Benvenuto in Sukarix',
                'subtitle' => 'Lo scopo principale di Sukarix è fornire agli sviluppatori un framework potente ed efficiente per la creazione di applicazioni PHP di livello enterprise.',
            ],
            'features' => [
                'routing' => [
                    'title'       => 'Routing e ACL',
                    'description' => 'Funzionalità avanzate di routing e liste di controllo degli accessi garantiscono una gestione degli accessi sicura e flessibile per le tue applicazioni, con politica di negazione predefinita e autorizzazione per singola rotta.',
                ],
                'queue' => [
                    'title'       => 'Servizio code',
                    'description' => 'Una coda FIFO basata su Redis con deduplicazione e tracciamento dei tentativi, alimentata da script Lua atomici per un\'elaborazione coerente delle pipeline tra i worker.',
                ],
                'di' => [
                    'title'       => 'Dependency Injection',
                    'description' => 'Un contenitore IoC integrato con risoluzione dei servizi tipizzata e convalida rigorosa, che favorisce un accoppiamento debole e rende il codice facile da testare e mantenere.',
                ],
                'enterprise' => [
                    'title'       => 'Pronto per l\'enterprise',
                    'description' => 'Progettato per uso enterprise con logging strutturato, gestione degli errori, dispatching di eventi, i18n, protezione CSRF e pianificazione di job cron integrati fin dall\'inizio.',
                ],
                'i18n' => [
                    'title'       => 'Internazionalizzazione',
                    'description' => 'Supporto multilingua con un semplice formato dizionario, rilevamento automatico della lingua e cambio runtime senza ricaricare le dipendenze.',
                ],
            ],
            'cta' => [
                'title'    => 'Pronto per costruire?',
                'subtitle' => 'Inizia il tuo prossimo progetto con Sukarix e spedisci più velocemente.',
                'button'   => 'Leggi i documenti',
            ],
            'capabilities' => [
                'badge'    => 'Incluso per impostazione predefinita',
                'title'    => 'Tutto ciò che uno starter di framework dovrebbe mostrare.',
                'subtitle' => 'Uno stack compatto di elementi essenziali dell\'app così gli sviluppatori capiscono immediatamente cosa offre Sukarix prima di aprire i documenti.',
                'stat_languages'  => 'Lingue',
                'stat_foundation' => 'Fondazione',
                'typed_actions'      => ['title' => 'Azioni tipizzate', 'description' => 'Piccoli controller WebAction che renderizzano in modo pulito i template F3.'],
                'hive_config'        => ['title' => 'Configurazione hive F3', 'description' => 'Impostazioni basate su INI con override di ambiente prevedibili.'],
                'service_injector'   => ['title' => 'Iniettore di servizi', 'description' => 'Risolvi servizi riutilizzabili senza cablare dipendenze pesanti.'],
                'acl_security'       => ['title' => 'Sicurezza ACL', 'description' => 'Regole di accesso con negazione predefinita per una protezione più sicura delle rotte.'],
                'csrf_sessions'      => ['title' => 'Sessioni CSRF', 'description' => 'Token basati su sessione e impostazioni sicure predefinite per i flussi web.'],
                'cache_helpers'      => ['title' => 'Helper di cache', 'description' => 'Memorizza, dimentica e riutilizza dati costosi con meno codice.'],
                'events'             => ['title' => 'Eventi', 'description' => 'Invia il comportamento dell\'app senza accoppiare i flussi di lavoro tra loro.'],
                'cli_actions'        => ['title' => 'Azioni CLI', 'description' => 'Crea attività da riga di comando usando gli stessi pattern del framework.'],
                'statera_tests'      => ['title' => 'Test Statera', 'description' => 'Test leggeri basati su scenari progettati per Sukarix.'],
                'phinx_migrations'   => ['title' => 'Migrazioni Phinx', 'description' => 'Versiona le modifiche al database quando la tua app necessita di persistenza.'],
                'structured_logs'    => ['title' => 'Log strutturati', 'description' => 'Output basato su Monolog per richieste web e lavoro CLI.'],
                'translations'       => ['title' => 'Traduzioni', 'description' => 'File di lingua e cambio runtime per app multilingua.'],
            ],
            'hero_labels' => [
                'badge'           => 'Framework PHP 8.4+ su Fat-Free',
                'start_title'     => 'Inizia in secondi',
                'start_subtitle'  => 'Installa, route, renderizza',
                'queues_title'    => 'Code',
                'queues_desc'     => 'Pipeline pronte per Redis',
                'security_title'  => 'Sicurezza',
                'security_desc'   => 'ACL + CSRF + sessioni',
            ],
            'features_header' => [
                'badge'    => 'Toolkit Sukarix',
                'title'    => 'Piccola superficie, serio potere di framework.',
                'subtitle' => 'L\'app skeleton dovrebbe sembrare come il framework: focalizzata, espressiva e pronta per prodotti reali senza rumore visivo.',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => 'Basato sul collaudato nucleo di Fat-Free Framework, con Sukarix che aggiunge il livello dolce per servizi, struttura e impostazioni pronte per la produzione.',
                'link'        => 'Scopri di più',
            ],
            'footer' => [
                'about_title'   => 'Informazioni',
                'about_text'    => 'Sukarix è un framework PHP open source basato su Fat-Free.',
                'contact_title' => 'Contatti',
                'follow_title'  => 'Seguici',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => 'Accedi',
                'logout'              => 'Esci',
                'delete_confirm'      => 'Vuoi continuare?',
                'yes'                 => 'Sì',
                'no'                  => 'No',
                'cancel'              => 'Annulla',
                'all_rights_reserved' => 'Tutti i diritti riservati',
                'copyright'           => 'Copyright',
                'record_updated'      => 'Record aggiornato',
            ],
            'user' => [
                'login_success'           => 'Bentornato {0}!',
                'add_success'             => 'Utente aggiunto con successo',
                'edit_user'               => 'Modifica utente',
                'delete_user'             => 'Elimina utente',
                'edit_success'            => 'Utente {0} modificato con successo',
                'profile_edit_success'    => 'Profilo modificato con successo',
                'delete_success'          => 'Utente {0} eliminato con successo',
                'change_password_success' => 'Password cambiata con successo',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => 'Errore imprevisto del server',
                'empty'        => 'Questo campo è obbligatorio',
            ],
            'login' => [
                'email'         => 'Indirizzo email non valido',
                'password'      => 'Password non valida',
                'password_size' => 'La password deve essere lunga almeno 8 caratteri',
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
                'admin'    => 'Amministratore',
                'customer' => 'Cliente',
            ],
            'statuses' => [
                'inactive' => 'Inattivo',
                'active'   => 'Attivo',
            ],
            'statuses_tags' => [
                'Y' => 'Attivo',
                'N' => 'Passivo',
            ],
            'days' => [
                'monday'    => 'Lunedì',
                'tuesday'   => 'Martedì',
                'wednesday' => 'Mercoledì',
                'thursday'  => 'Giovedì',
                'friday'    => 'Venerdì',
                'saturday'  => 'Sabato',
                'sunday'    => 'Domenica',
            ],
            'months' => [
                'january'   => 'Gennaio',
                'february'  => 'Febbraio',
                'march'     => 'Marzo',
                'april'     => 'Aprile',
                'may'       => 'Maggio',
                'june'      => 'Giugno',
                'july'      => 'Luglio',
                'august'    => 'Agosto',
                'september' => 'Settembre',
                'october'   => 'Ottobre',
                'november'  => 'Novembre',
                'december'  => 'Dicembre',
            ],
        ],
    ],
];
