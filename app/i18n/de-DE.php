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
            'title'       => 'Sukarix - Modernes PHP-Framework auf Fat-Free',
            'description' => 'Sukarix ist ein modernes PHP 8.4+-Framework, das auf Fat-Free basiert, mit Routing, ACL, Dependency Injection, i18n, Warteschlangen, Caching, Sessions und produktionsbereiten Standards.',
            'keywords'    => 'Sukarix, PHP-Framework, Fat-Free Framework, F3, PHP 8.4, Dependency Injection, ACL, Routing, i18n, Redis-Warteschlangen, Open-Source-Framework',
            'og_title'       => 'Sukarix - Modernes PHP-Framework auf Fat-Free',
            'og_description' => 'Erstellen Sie unternehmensbereite PHP-Anwendungen mit einer kleinen, ausdrucksstarken Framework-Schicht auf Basis von Fat-Free.',
            'twitter_title'       => 'Sukarix - Modernes PHP-Framework auf Fat-Free',
            'twitter_description' => 'Routing, ACL, DI, i18n, Warteschlangen, Caching und produktionsbereite Standards für PHP-Anwendungen.',
        ],
        'label' => [
            'core' => [
                'email'                 => 'E-Mail',
                'password'              => 'Passwort',
                'password_hint'         => 'Passwort (mindestens 8 Zeichen)',
                'first_name'            => 'Vorname',
                'last_name'             => 'Nachname',
                'back'                  => 'Zurück',
                'submit'                => 'Absenden',
                'confirm'               => 'Bestätigen',
                'cancel'                => 'Abbrechen',
                'logo'                  => 'Logo',
                'first'                 => 'Erste',
                'last'                  => 'Letzte',
                'actions'               => 'Aktionen',
                'send_email'            => 'E-Mail senden',
                'password_confirmation' => 'Passwort bestätigen',
                'save_password'         => 'Passwort speichern',
                'add'                   => 'Hinzufügen',
                'edit'                  => 'Bearbeiten',
                'save'                  => 'Speichern',
                'view_more'             => 'Mehr anzeigen...',
                'register'              => 'Registrieren',
                'id'                    => 'ID',
                'search'                => 'Suchen...',
                'sending'               => 'Wird gesendet...',
                'at'                    => 'um',
            ],
            'menu' => [
                'users' => 'Benutzer',
            ],
            'user' => [
                'users'            => 'Benutzer',
                'user'             => 'Benutzer',
                'email'            => 'E-Mail',
                'role'             => 'Rolle',
                'status'           => 'Status',
                'first_name'       => 'Vorname',
                'last_name'        => 'Nachname',
                'edit_user'        => 'Benutzer bearbeiten',
                'new_user'         => 'Neuer Benutzer',
                'add_user'         => 'Benutzer hinzufügen',
                'my_profile'       => 'Mein Profil',
                'new_password'     => 'Neues Passwort',
                'reset_password'   => 'Passwort zurücksetzen',
                'current_password' => 'Aktuelles Passwort',
                'confirm_password' => 'Passwort bestätigen',
                'change_password'  => 'Mein Passwort ändern',
            ],
            'nav' => [
                'home'          => 'Startseite',
                'documentation' => 'Dokumentation',
                'features'      => 'Funktionen',
                'languages'     => 'Sprache',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => 'Die richtige Menge an Süße und Effizienz auf Fat-Free. Ein modernes PHP-Framework für Unternehmensanwendungen.',
                'cta_primary'   => 'Loslegen',
                'cta_secondary' => 'Funktionen ansehen',
            ],
            'intro' => [
                'badge'    => 'Framework-Skelett',
                'title'    => 'Willkommen bei Sukarix',
                'subtitle' => 'Der Hauptzweck von Sukarix ist es, Entwicklern ein leistungsstarkes und effizientes Framework zum Erstellen von PHP-Anwendungen auf Unternehmensniveau zu bieten.',
            ],
            'features' => [
                'routing' => [
                    'title'       => 'Routing & ACL',
                    'description' => 'Erweiterte Routing- und Zugriffssteuerungsfunktionen sorgen für eine sichere und flexible Zugriffsverwaltung mit einer Standard-Verweigerungsrichtlinie und einer Berechtigung pro Route.',
                ],
                'queue' => [
                    'title'       => 'Warteschlangendienst',
                    'description' => 'Eine Redis-gestützte FIFO-Warteschlange mit Deduplizierung und Versuchsverfolgung, optimiert durch atomare Lua-Skripte für eine konsistente Pipeline-Verarbeitung.',
                ],
                'di' => [
                    'title'       => 'Dependency Injection',
                    'description' => 'Ein integrierter IoC-Container mit typisierter Serviceauflösung und strikter Validierung fördert lose Kopplung und erleichtert das Testen und die Wartung.',
                ],
                'enterprise' => [
                    'title'       => 'Bereit für Unternehmen',
                    'description' => 'Entwickelt für den Unternehmenseinsatz mit strukturierter Protokollierung, Fehlerbehandlung, Ereignisverteilung, i18n, CSRF-Schutz und Cron-Planung von Anfang an.',
                ],
                'i18n' => [
                    'title'       => 'Internationalisierung',
                    'description' => 'Mehrsprachige Unterstützung mit einem einfachen Wörterbuchformat, automatischer Locale-Erkennung und Laufzeitumschaltung.',
                ],
            ],
            'cta' => [
                'title'    => 'Bereit zu bauen?',
                'subtitle' => 'Starten Sie Ihr nächstes Projekt mit Sukarix und liefern Sie schneller.',
                'button'   => 'Dokumentation lesen',
            ],
            'capabilities' => [
                'badge'    => 'Standardmäßig enthalten',
                'title'    => 'Alles, was ein Framework-Starter zeigen sollte.',
                'subtitle' => 'Ein kompakter Satz an App-Grundlagen, damit Entwickler sofort verstehen, was Sukarix ihnen bietet, bevor sie die Dokumentation öffnen.',
                'stat_languages'  => 'Sprachen',
                'stat_foundation' => 'Grundlage',
                'typed_actions'      => ['title' => 'Typisierte Aktionen', 'description' => 'Kleine WebAction-Controller, die F3-Templates sauber rendern.'],
                'hive_config'        => ['title' => 'F3-Hive-Konfiguration', 'description' => 'INI-gesteuerte Einstellungen mit vorhersagbaren Umgebungsumsetzungen.'],
                'service_injector'   => ['title' => 'Service-Injektor', 'description' => 'Wiederverwendbare Services auflösen, ohne schwere Abhängigkeiten zu verdrahten.'],
                'acl_security'       => ['title' => 'ACL-Sicherheit', 'description' => 'Verweigern-als-Standard Zugriffsregeln für sichereren Routenschutz.'],
                'csrf_sessions'      => ['title' => 'CSRF-Sitzungen', 'description' => 'Sitzungsgestützte Tokens und sichere Standards für Web-Abläufe.'],
                'cache_helpers'      => ['title' => 'Cache-Helfer', 'description' => 'Teure Daten merken, vergessen und wiederverwenden mit weniger Code.'],
                'events'             => ['title' => 'Ereignisse', 'description' => 'App-Verhalten auslösen, ohne Workflows zu koppeln.'],
                'cli_actions'        => ['title' => 'CLI-Aktionen', 'description' => 'Befehlszeilenaufgaben mit denselben Framework-Mustern erstellen.'],
                'statera_tests'      => ['title' => 'Statera-Tests', 'description' => 'Leichtgewichtige szenariobasierte Tests, entwickelt für Sukarix.'],
                'phinx_migrations'   => ['title' => 'Phinx-Migrationen', 'description' => 'Datenbankänderungen versionieren, wenn Ihre App Persistenz benötigt.'],
                'structured_logs'    => ['title' => 'Strukturierte Protokolle', 'description' => 'Monolog-gestützte Ausgabe für Web-Anfragen und CLI-Arbeit.'],
                'translations'       => ['title' => 'Übersetzungen', 'description' => 'Locale-Dateien und Laufzeitumschaltung für mehrsprachige Apps.'],
            ],
            'hero_labels' => [
                'badge'           => 'PHP 8.4+ Framework auf Fat-Free',
                'start_title'     => 'Start in Sekunden',
                'start_subtitle'  => 'Installieren, routen, rendern',
                'queues_title'    => 'Warteschlangen',
                'queues_desc'     => 'Redis-fertige Pipelines',
                'security_title'  => 'Sicherheit',
                'security_desc'   => 'ACL + CSRF + Sitzungen',
            ],
            'features_header' => [
                'badge'    => 'Sukarix-Toolkit',
                'title'    => 'Kleine Oberfläche, ernsthafte Framework-Leistung.',
                'subtitle' => 'Die Skeleton-App sollte sich anfühlen wie das Framework: fokussiert, ausdrucksstark und bereit für echte Produkte ohne visuellen Lärm.',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => 'Basiert auf dem bewährten Fat-Free Framework-Kern, wobei Sukarix die süße Schicht für Services, Struktur und produktionsbereite Standards hinzufügt.',
                'link'        => 'Mehr erfahren',
            ],
            'footer' => [
                'about_title'   => 'Über',
                'about_text'    => 'Sukarix ist ein Open-Source-PHP-Framework, das auf Fat-Free aufbaut.',
                'contact_title' => 'Kontakt',
                'follow_title'  => 'Folge uns',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => 'Einloggen',
                'logout'              => 'Abmelden',
                'delete_confirm'      => 'Möchten Sie fortfahren?',
                'yes'                 => 'Ja',
                'no'                  => 'Nein',
                'cancel'              => 'Abbrechen',
                'all_rights_reserved' => 'Alle Rechte vorbehalten',
                'copyright'           => 'Urheberrecht',
                'record_updated'      => 'Datensatz aktualisiert',
            ],
            'user' => [
                'login_success'           => 'Willkommen zurück {0}!',
                'add_success'             => 'Benutzer erfolgreich hinzugefügt',
                'edit_user'               => 'Benutzer bearbeiten',
                'delete_user'             => 'Benutzer löschen',
                'edit_success'            => 'Benutzer {0} erfolgreich bearbeitet',
                'profile_edit_success'    => 'Profil erfolgreich bearbeitet',
                'delete_success'          => 'Benutzer {0} erfolgreich gelöscht',
                'change_password_success' => 'Passwort erfolgreich geändert',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => 'Unerwarteter Serverfehler',
                'empty'        => 'Dieses Feld ist erforderlich',
            ],
            'login' => [
                'email'         => 'Ungültige E-Mail-Adresse',
                'password'      => 'Ungültiges Passwort',
                'password_size' => 'Das Passwort muss mindestens 8 Zeichen lang sein',
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
                'admin'    => 'Administrator',
                'customer' => 'Kunde',
            ],
            'statuses' => [
                'inactive' => 'Inaktiv',
                'active'   => 'Aktiv',
            ],
            'statuses_tags' => [
                'Y' => 'Aktiv',
                'N' => 'Passiv',
            ],
            'days' => [
                'monday'    => 'Montag',
                'tuesday'   => 'Dienstag',
                'wednesday' => 'Mittwoch',
                'thursday'  => 'Donnerstag',
                'friday'    => 'Freitag',
                'saturday'  => 'Samstag',
                'sunday'    => 'Sonntag',
            ],
            'months' => [
                'january'   => 'Januar',
                'february'  => 'Februar',
                'march'     => 'März',
                'april'     => 'April',
                'may'       => 'Mai',
                'june'      => 'Juni',
                'july'      => 'Juli',
                'august'    => 'August',
                'september' => 'September',
                'october'   => 'Oktober',
                'november'  => 'November',
                'december'  => 'Dezember',
            ],
        ],
    ],
];
