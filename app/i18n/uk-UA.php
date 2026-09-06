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
            'title'       => 'Sukarix — Сучасний PHP-фреймворк на Fat-Free',
            'description' => 'Sukarix — сучасний PHP-фреймворк версії 8.4+, побудований на Fat-Free, з маршрутизацією, ACL, впровадженням залежностей, i18n, чергами, кешуванням, сесіями та готовими до продакшену налаштуваннями за замовчуванням.',
            'keywords'    => 'Sukarix, PHP-фреймворк, Fat-Free Framework, F3, PHP 8.4, впровадження залежностей, ACL, маршрутизація, i18n, черги Redis, фреймворк з відкритим кодом',
            'og_title'       => 'Sukarix — Сучасний PHP-фреймворк на Fat-Free',
            'og_description' => 'Створюйте готові для підприємств PHP-додатки з невеликим виразним шаром фреймворку поверх Fat-Free.',
            'twitter_title'       => 'Sukarix — Сучасний PHP-фреймворк на Fat-Free',
            'twitter_description' => 'Маршрутизація, ACL, впровадження залежностей, i18n, черги, кешування та готові до продакшену налаштування для PHP-додатків.',
        ],
        'label' => [
            'core' => [
                'email'                 => 'Електронна пошта',
                'password'              => 'Пароль',
                'password_hint'         => 'Пароль (мінімум 8 символів)',
                'first_name'            => "Ім'я",
                'last_name'             => 'Прізвище',
                'back'                  => 'Назад',
                'submit'                => 'Надіслати',
                'confirm'               => 'Затвердити',
                'cancel'                => 'Скасувати',
                'logo'                  => 'Логотип',
                'first'                 => 'Перший',
                'last'                  => 'Останній',
                'actions'               => 'Дії',
                'send_email'            => 'Надіслати лист',
                'password_confirmation' => 'підтвердити пароль',
                'save_password'         => 'зберегти пароль',
                'add'                   => 'Додати',
                'edit'                  => 'Редагувати',
                'save'                  => 'Зберегти',
                'view_more'             => 'Докладніше...',
                'register'              => 'Зареєструватися',
                'id'                    => 'ID',
                'search'                => 'Пошук...',
                'sending'               => 'Надсилання...',
                'at'                    => 'о',
            ],
            'menu' => [
                'users' => 'Користувачі',
            ],
            'user' => [
                'users'            => 'Користувачі',
                'user'             => 'Користувач',
                'email'            => 'Електронна пошта',
                'role'             => 'Роль',
                'status'           => 'Статус',
                'first_name'       => "Ім'я",
                'last_name'        => 'Прізвище',
                'edit_user'        => 'Редагувати користувача',
                'new_user'         => 'Новий користувач',
                'add_user'         => 'Додати користувача',
                'my_profile'       => 'Мій профіль',
                'new_password'     => 'Новий пароль',
                'reset_password'   => 'Скинути пароль',
                'current_password' => 'Поточний пароль',
                'confirm_password' => 'Підтвердити пароль',
                'change_password'  => 'Змінити мій пароль',
            ],
            'nav' => [
                'home'          => 'Головна',
                'documentation' => 'Документація',
                'features'      => 'Можливості',
                'languages'     => 'Мова',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => 'Правильна кількість солодкості та ефективності поверх Fat-Free. Сучасний PHP-фреймворк для корпоративних додатків.',
                'cta_primary'   => 'Почати',
                'cta_secondary' => 'Переглянути можливості',
            ],
            'intro' => [
                'badge'    => 'Каркас фреймворку',
                'title'    => 'Ласкаво просимо до Sukarix',
                'subtitle' => 'Основна мета Sukarix — надати розробникам потужний та ефективний фреймворк для створення корпоративних PHP-додатків.',
            ],
            'features' => [
                'routing' => [
                    'title'       => 'Маршрутизація та ACL',
                    'description' => 'Розширені можливості маршрутизації та списків контролю доступу забезпечують безпечне та гнучке керування доступом до ваших додатків з політикою заборони за замовчуванням та авторизацією для кожного маршруту.',
                ],
                'queue' => [
                    'title'       => 'Сервіс черг',
                    'description' => 'Черга FIFO на базі Redis із дедуплікацією та відстеженням спроб, на основі атомарних Lua-скриптів для послідовної обробки конвеєра між воркерами.',
                ],
                'di' => [
                    'title'       => 'Впровадження залежностей',
                    'description' => 'Вбудований IoC-контейнер із типізованим розвʼязанням сервісів та суворою валідацією, що сприяє слабкому звʼязуванню та полегшує тестування та підтримку коду.',
                ],
                'enterprise' => [
                    'title'       => 'Готовий для підприємств',
                    'description' => 'Створений для корпоративного використання зі структурованим логуванням, обробкою помилок, диспетчеризацією подій, i18n, захистом CSRF та плануванням cron-завдань, вбудованими з самого початку.',
                ],
                'i18n' => [
                    'title'       => 'Інтернаціоналізація',
                    'description' => 'Підтримка кількох мов у простому форматі словника, автоматичне виявлення локалі та перемикання під час виконання без перезавантаження залежностей.',
                ],
            ],
            'cta' => [
                'title'    => 'Готові розпочати?',
                'subtitle' => 'Почніть свій наступний проєкт із Sukarix і випускайте швидше.',
                'button'   => 'Читати документацію',
            ],
            'capabilities' => [
                'badge'    => 'Включено за замовчуванням',
                'title'    => 'Усе, що має демонструвати стартовий каркас фреймворку.',
                'subtitle' => 'Компактний набір основних компонентів додатку, щоб розробники одразу зрозуміли, що дає Sukarix, ще до відкриття документації.',
                'stat_languages'  => 'Мови',
                'stat_foundation' => 'Основа',
                'typed_actions'      => ['title' => 'Типізовані дії', 'description' => 'Невеликі контролери WebAction, які акуратно рендерять шаблони F3.'],
                'hive_config'        => ['title' => 'Конфігурація F3 hive', 'description' => 'Налаштування на основі INI з передбачуваними перевизначеннями середовища.'],
                'service_injector'   => ['title' => 'Інʼєктор сервісів', 'description' => 'Розвʼязання багаторазових сервісів без підключення важких залежностей.'],
                'acl_security'       => ['title' => 'Безпека ACL', 'description' => 'Правила доступу із забороною за замовчуванням для безпечнішого захисту маршрутів.'],
                'csrf_sessions'      => ['title' => 'CSRF-сесії', 'description' => 'Токени на основі сесій та безпечні налаштування за замовчуванням для веб-потоків.'],
                'cache_helpers'      => ['title' => 'Помічники кешування', 'description' => 'Запамʼятовуйте, забувайте та повторно використовуйте дорогі дані з меншим кодом.'],
                'events'             => ['title' => 'Події', 'description' => 'Диспетчеризація поведінки додатку без жорсткого звʼязування робочих процесів.'],
                'cli_actions'        => ['title' => 'CLI-дії', 'description' => 'Створюйте завдання командного рядка з використанням тих самих шаблонів фреймворку.'],
                'statera_tests'      => ['title' => 'Тести Statera', 'description' => 'Легке сценарне тестування, створене для Sukarix.'],
                'phinx_migrations'   => ['title' => 'Міграції Phinx', 'description' => 'Версіонування змін бази даних, коли вашому додатку потрібне збереження.'],
                'structured_logs'    => ['title' => 'Структуровані логи', 'description' => 'Вивід на основі Monolog для веб-запитів та CLI-роботи.'],
                'translations'       => ['title' => 'Переклади', 'description' => 'Файли локалей та перемикання під час виконання для багатомовних додатків.'],
            ],
            'hero_labels' => [
                'badge'           => 'PHP 8.4+ фреймворк на Fat-Free',
                'start_title'     => 'Початок за секунди',
                'start_subtitle'  => 'Встановлення, маршрутизація, рендеринг',
                'queues_title'    => 'Черги',
                'queues_desc'     => 'Конвеєри, готові до Redis',
                'security_title'  => 'Безпека',
                'security_desc'   => 'ACL + CSRF + сесії',
            ],
            'features_header' => [
                'badge'    => 'Інструментарій Sukarix',
                'title'    => 'Маленька поверхня, серйозна потужність фреймворку.',
                'subtitle' => 'Каркасний додаток має відчуватися як фреймворк: зосередженим, виразним і готовим до реальних продуктів без візуального шуму.',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => 'Побудований на перевіреному ядрі Fat-Free Framework, де Sukarix додає солодкий шар для сервісів, структури та готових до продакшену налаштувань.',
                'link'        => 'Дізнатися більше',
            ],
            'footer' => [
                'about_title'   => 'Про проєкт',
                'about_text'    => 'Sukarix — PHP-фреймворк з відкритим кодом, побудований на Fat-Free.',
                'contact_title' => 'Контакти',
                'follow_title'  => 'Слідкуйте за нами',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => 'Увійти',
                'logout'              => 'Вийти',
                'delete_confirm'      => 'Бажаєте продовжити?',
                'yes'                 => 'Так',
                'no'                  => 'Ні',
                'cancel'              => 'Скасувати',
                'all_rights_reserved' => 'Усі права захищені',
                'copyright'           => 'Авторське право',
                'record_updated'      => 'Запис оновлено',
            ],
            'user' => [
                'login_success'           => 'Ласкаво просимо, {0}!',
                'add_success'             => 'Користувача успішно додано',
                'edit_user'               => 'Редагувати користувача',
                'delete_user'             => 'Видалити користувача',
                'edit_success'            => 'Користувача {0} успішно відредаговано',
                'profile_edit_success'    => 'Профіль успішно відредаговано',
                'delete_success'          => 'Користувача {0} успішно видалено',
                'change_password_success' => 'Пароль успішно змінено',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => 'Неочікувана помилка сервера',
                'empty'        => 'Це поле є обовʼязковим',
            ],
            'login' => [
                'email'         => 'Невірна адреса електронної пошти',
                'password'      => 'Невірний пароль',
                'password_size' => 'Довжина пароля має бути не менше 8 символів',
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
                'admin'    => 'Адміністратор',
                'customer' => 'Клієнт',
            ],
            'statuses' => [
                'inactive' => 'Неактивний',
                'active'   => 'Активний',
            ],
            'statuses_tags' => [
                'Y' => 'Активний',
                'N' => 'Пасивний',
            ],
            'days' => [
                'monday'    => 'Понеділок',
                'tuesday'   => 'Вівторок',
                'wednesday' => 'Середа',
                'thursday'  => 'Четвер',
                'friday'    => 'Пʼятниця',
                'saturday'  => 'Субота',
                'sunday'    => 'Неділя',
            ],
            'months' => [
                'january'   => 'Січень',
                'february'  => 'Лютий',
                'march'     => 'Березень',
                'april'     => 'Квітень',
                'may'       => 'Травень',
                'june'      => 'Червень',
                'july'      => 'Липень',
                'august'    => 'Серпень',
                'september' => 'Вересень',
                'october'   => 'Жовтень',
                'november'  => 'Листопад',
                'december'  => 'Грудень',
            ],
        ],
    ],
];
