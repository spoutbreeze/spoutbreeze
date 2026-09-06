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
            'title'       => 'Sukarix - Modern PHP Framework on Fat-Free',
            'description' => 'Sukarix is a modern PHP 8.4+ framework built on Fat-Free, with routing, ACL, dependency injection, i18n, queues, caching, sessions and product-ready defaults.',
            'keywords'    => 'Sukarix, PHP framework, Fat-Free Framework, F3, PHP 8.4, dependency injection, ACL, routing, i18n, Redis queues, open source framework',
            'og_title'       => 'Sukarix - Modern PHP Framework on Fat-Free',
            'og_description' => 'Build enterprise-ready PHP applications with a small, expressive framework layer on top of Fat-Free.',
            'twitter_title'       => 'Sukarix - Modern PHP Framework on Fat-Free',
            'twitter_description' => 'Routing, ACL, DI, i18n, queues, caching and product-ready defaults for PHP applications.',
        ],
        'label' => [
            'core' => [
                'email'                 => 'Email',
                'password'              => 'Password',
                'password_hint'         => 'Password (8 characters at minimum)',
                'first_name'            => 'First Name',
                'last_name'             => 'Last Name',
                'back'                  => 'Back',
                'submit'                => 'Submit',
                'confirm'               => 'Approve',
                'cancel'                => 'Cancel',
                'logo'                  => 'Logo',
                'first'                 => 'First',
                'last'                  => 'Last',
                'actions'               => 'Actions',
                'send_email'            => 'Send email',
                'password_confirmation' => 'confirm password',
                'save_password'         => 'save password',
                'add'                   => 'Add',
                'edit'                  => 'Edit',
                'save'                  => 'Save',
                'view_more'             => 'View More...',
                'register'              => 'Register',
                'id'                    => 'ID',
                'search'                => 'Search...',
                'sending'               => 'Sending...',
                'at'                    => 'at',
            ],
            'menu' => [
                'users' => 'Users',
            ],
            'user' => [
                'users'            => 'Users',
                'user'             => 'User',
                'email'            => 'Email',
                'role'             => 'Role',
                'status'           => 'Status',
                'first_name'       => 'First name',
                'last_name'        => 'Last name',
                'edit_user'        => 'Edit user',
                'new_user'         => 'New user',
                'add_user'         => 'Add user',
                'my_profile'       => 'My profile',
                'new_password'     => 'New Password',
                'reset_password'   => 'Reset password',
                'current_password' => 'Current Password',
                'confirm_password' => 'Confirm Password',
                'change_password'  => 'Change my password',
            ],
            'nav' => [
                'home'          => 'Home',
                'documentation' => 'Documentation',
                'features'      => 'Features',
                'languages'     => 'Language',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => 'The right amount of sweetness and efficiency on top of Fat-Free. A modern PHP framework for enterprise applications.',
                'cta_primary'   => 'Get Started',
                'cta_secondary' => 'Explore Features',
            ],
            'intro' => [
                'badge'    => 'Framework skeleton',
                'title'    => 'Welcome to Sukarix',
                'subtitle' => 'The primary purpose of Sukarix is to provide developers with a powerful and efficient framework for building enterprise-level PHP applications.',
            ],
            'features' => [
                'routing' => [
                    'title'       => 'Routing & ACL',
                    'description' => 'Advanced routing and access control list capabilities ensure secure and flexible access management for your applications, with deny-by-default policy and per-route authorisation.',
                ],
                'queue' => [
                    'title'       => 'Queue Service',
                    'description' => 'A Redis-backed FIFO queue with deduplication and attempt tracking, powered by atomic Lua scripts for consistent pipeline processing across workers.',
                ],
                'di' => [
                    'title'       => 'Dependency Injection',
                    'description' => 'A built-in IoC container with typed service resolution and strict validation, promoting loose coupling and making your code easy to test and maintain.',
                ],
                'enterprise' => [
                    'title'       => 'Enterprise Ready',
                    'description' => 'Designed for enterprise use with structured logging, error handling, event dispatching, i18n, CSRF protection, and cron job scheduling built in from the start.',
                ],
                'i18n' => [
                    'title'       => 'Internationalisation',
                    'description' => 'Multi-language support with a simple dictionary format, automatic locale detection and runtime switching without reloading dependencies.',
                ],
            ],
            'cta' => [
                'title'    => 'Ready to build?',
                'subtitle' => 'Start your next project with Sukarix and ship faster.',
                'button'   => 'Read the Docs',
            ],
            'capabilities' => [
                'badge'    => 'Included by default',
                'title'    => 'Everything a framework starter should show.',
                'subtitle' => 'A compact stack of app essentials so developers instantly understand what Sukarix gives them before they open the docs.',
                'stat_languages'  => 'Languages',
                'stat_foundation' => 'Foundation',
                'typed_actions'      => ['title' => 'Typed actions', 'description' => 'Small WebAction controllers that render F3 templates cleanly.'],
                'hive_config'        => ['title' => 'F3 hive config', 'description' => 'INI-driven settings with predictable environment overrides.'],
                'service_injector'   => ['title' => 'Service injector', 'description' => 'Resolve reusable services without wiring heavy dependencies.'],
                'acl_security'       => ['title' => 'ACL security', 'description' => 'Deny-by-default access rules for safer route protection.'],
                'csrf_sessions'      => ['title' => 'CSRF sessions', 'description' => 'Session-backed tokens and secure defaults for web flows.'],
                'cache_helpers'      => ['title' => 'Cache helpers', 'description' => 'Remember, forget and reuse expensive data with less code.'],
                'events'             => ['title' => 'Events', 'description' => 'Dispatch app behavior without coupling workflows together.'],
                'cli_actions'        => ['title' => 'CLI actions', 'description' => 'Build command-line tasks using the same framework patterns.'],
                'statera_tests'      => ['title' => 'Statera tests', 'description' => 'Lightweight scenario-based testing designed for Sukarix.'],
                'phinx_migrations'   => ['title' => 'Phinx migrations', 'description' => 'Version database changes when your app needs persistence.'],
                'structured_logs'    => ['title' => 'Structured logs', 'description' => 'Monolog-powered output for web requests and CLI work.'],
                'translations'       => ['title' => 'Translations', 'description' => 'Locale files and runtime switching for multilingual apps.'],
            ],
            'hero_labels' => [
                'badge'           => 'PHP 8.4+ framework on Fat-Free',
                'start_title'     => 'Start in seconds',
                'start_subtitle'  => 'Install, route, render',
                'queues_title'    => 'Queues',
                'queues_desc'     => 'Redis-ready pipelines',
                'security_title'  => 'Security',
                'security_desc'   => 'ACL + CSRF + sessions',
            ],
            'features_header' => [
                'badge'    => 'Sukarix toolkit',
                'title'    => 'Small surface, serious framework power.',
                'subtitle' => 'The skeleton app should feel like the framework: focused, expressive and ready for real products without visual noise.',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => 'Built on the proven Fat-Free Framework core, with Sukarix adding the sweet layer for services, structure and product-ready defaults.',
                'link'        => 'Learn more',
            ],
            'footer' => [
                'about_title'   => 'About',
                'about_text'    => 'Sukarix is an open-source PHP framework built on Fat-Free.',
                'contact_title' => 'Contact',
                'follow_title'  => 'Follow us',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => 'Log me in',
                'logout'              => 'Logout',
                'delete_confirm'      => 'Do you want to continue ?',
                'yes'                 => 'Yes',
                'no'                  => 'No',
                'cancel'              => 'Cancel',
                'all_rights_reserved' => 'All rights reserved',
                'copyright'           => 'Copyright',
                'record_updated'      => 'Record updated',
            ],
            'user' => [
                'login_success'           => 'Welcome back {0}!',
                'add_success'             => 'User successfully added',
                'edit_user'               => 'Edit user',
                'delete_user'             => 'Delete user',
                'edit_success'            => 'User {0} successfully edited',
                'profile_edit_success'    => 'Profile successfully edited',
                'delete_success'          => 'User {0} successfully deleted',
                'change_password_success' => 'Password successfully changed',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => 'Unexpected server error',
                'empty'        => 'This field is required',
            ],
            'login' => [
                'email'         => 'Invalid email address',
                'password'      => 'Invalid password',
                'password_size' => 'Password length must be 8 characters at least',
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
                'customer' => 'Customer',
            ],
            'statuses' => [
                'inactive' => 'Inactive',
                'active'   => 'Active',
            ],
            'statuses_tags' => [
                'Y' => 'Active',
                'N' => 'Passive',
            ],
            'days' => [
                'monday'    => 'Monday',
                'tuesday'   => 'Tuesday',
                'wednesday' => 'Wednesday',
                'thursday'  => 'Thursday',
                'friday'    => 'Friday',
                'saturday'  => 'Saturday',
                'sunday'    => 'Sunday',
            ],
            'months' => [
                'january'   => 'January',
                'february'  => 'February',
                'march'     => 'March',
                'april'     => 'April',
                'may'       => 'May',
                'june'      => 'June',
                'july'      => 'July',
                'august'    => 'August',
                'september' => 'September',
                'october'   => 'October',
                'november'  => 'November',
                'december'  => 'December',
            ],
        ],
    ],
];
