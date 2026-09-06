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
            'title'       => 'Sukarix — Современный PHP-фреймворк на Fat-Free',
            'description' => 'Sukarix — это современный PHP-фреймворк 8.4+, построенный на Fat-Free, с маршрутизацией, ACL, внедрением зависимостей, интернационализацией, очередями, кэшированием, сессиями и готовыми к продакшену настройками по умолчанию.',
            'keywords'    => 'Sukarix, PHP-фреймворк, Fat-Free Framework, F3, PHP 8.4, внедрение зависимостей, ACL, маршрутизация, i18n, очереди Redis, фреймворк с открытым исходным кодом',
            'og_title'       => 'Sukarix — Современный PHP-фреймворк на Fat-Free',
            'og_description' => 'Создавайте готовые к продакшену PHP-приложения с небольшим выразительным слоем фреймворка поверх Fat-Free.',
            'twitter_title'       => 'Sukarix — Современный PHP-фреймворк на Fat-Free',
            'twitter_description' => 'Маршрутизация, ACL, внедрение зависимостей, i18n, очереди, кэширование и готовые к продакшену настройки для PHP-приложений.',
        ],
        'label' => [
            'core' => [
                'email'                 => 'Электронная почта',
                'password'              => 'Пароль',
                'password_hint'         => 'Пароль (минимум 8 символов)',
                'first_name'            => 'Имя',
                'last_name'             => 'Фамилия',
                'back'                  => 'Назад',
                'submit'                => 'Отправить',
                'confirm'               => 'Подтвердить',
                'cancel'                => 'Отмена',
                'logo'                  => 'Логотип',
                'first'                 => 'Первый',
                'last'                  => 'Последний',
                'actions'               => 'Действия',
                'send_email'            => 'Отправить письмо',
                'password_confirmation' => 'подтвердите пароль',
                'save_password'         => 'сохранить пароль',
                'add'                   => 'Добавить',
                'edit'                  => 'Изменить',
                'save'                  => 'Сохранить',
                'view_more'             => 'Подробнее...',
                'register'              => 'Регистрация',
                'id'                    => 'ID',
                'search'                => 'Поиск...',
                'sending'               => 'Отправка...',
                'at'                    => 'в',
            ],
            'menu' => [
                'users' => 'Пользователи',
            ],
            'user' => [
                'users'            => 'Пользователи',
                'user'             => 'Пользователь',
                'email'            => 'Электронная почта',
                'role'             => 'Роль',
                'status'           => 'Статус',
                'first_name'       => 'Имя',
                'last_name'        => 'Фамилия',
                'edit_user'        => 'Изменить пользователя',
                'new_user'         => 'Новый пользователь',
                'add_user'         => 'Добавить пользователя',
                'my_profile'       => 'Мой профиль',
                'new_password'     => 'Новый пароль',
                'reset_password'   => 'Сбросить пароль',
                'current_password' => 'Текущий пароль',
                'confirm_password' => 'Подтвердите пароль',
                'change_password'  => 'Изменить мой пароль',
            ],
            'nav' => [
                'home'          => 'Главная',
                'documentation' => 'Документация',
                'features'      => 'Возможности',
                'languages'     => 'Язык',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => 'Правильное количество сладости и эффективности поверх Fat-Free. Современный PHP-фреймворк для корпоративных приложений.',
                'cta_primary'   => 'Начать',
                'cta_secondary' => 'Изучить возможности',
            ],
            'intro' => [
                'badge'    => 'Каркас фреймворка',
                'title'    => 'Добро пожаловать в Sukarix',
                'subtitle' => 'Основная цель Sukarix — предоставить разработчикам мощный и эффективный фреймворк для создания корпоративных PHP-приложений.',
            ],
            'features' => [
                'routing' => [
                    'title'       => 'Маршрутизация и ACL',
                    'description' => 'Расширенные возможности маршрутизации и списков контроля доступа обеспечивают безопасное и гибкое управление доступом для ваших приложений с политикой запрета по умолчанию и авторизацией на уровне маршрута.',
                ],
                'queue' => [
                    'title'       => 'Сервис очередей',
                    'description' => 'Очередь FIFO на базе Redis с дедупликацией и отслеживанием попыток, работающая на атомарных Lua-скриптах для согласованной обработки конвейера между воркерами.',
                ],
                'di' => [
                    'title'       => 'Внедрение зависимостей',
                    'description' => 'Встроенный IoC-контейнер с типизированным разрешением сервисов и строгой валидацией, способствующий слабой связанности и делающий ваш код простым для тестирования и поддержки.',
                ],
                'enterprise' => [
                    'title'       => 'Готовность к продакшену',
                    'description' => 'Разработан для корпоративного использования со структурированным логированием, обработкой ошибок, диспетчеризацией событий, i18n, защитой CSRF и планированием задач cron, встроенными с самого начала.',
                ],
                'i18n' => [
                    'title'       => 'Интернационализация',
                    'description' => 'Поддержка нескольких языков с простым форматом словарей, автоматическим определением локали и переключением во время выполнения без перезагрузки зависимостей.',
                ],
            ],
            'cta' => [
                'title'    => 'Готовы начать разработку?',
                'subtitle' => 'Начните свой следующий проект с Sukarix и выпускайте быстрее.',
                'button'   => 'Читать документацию',
            ],
            'capabilities' => [
                'badge'    => 'Включено по умолчанию',
                'title'    => 'Всё, что должен демонстрировать стартовый фреймворк.',
                'subtitle' => 'Компактный набор основных компонентов приложения, чтобы разработчики сразу понимали, что даёт Sukarix, ещё до открытия документации.',
                'stat_languages'  => 'Языки',
                'stat_foundation' => 'Основа',
                'typed_actions'      => ['title' => 'Типизированные действия', 'description' => 'Небольшие контроллеры WebAction, которые аккуратно отрисовывают шаблоны F3.'],
                'hive_config'        => ['title' => 'Конфигурация F3 hive', 'description' => 'Настройки на основе INI с предсказуемым переопределением окружений.'],
                'service_injector'   => ['title' => 'Инжектор сервисов', 'description' => 'Разрешение переиспользуемых сервисов без сложной настройки зависимостей.'],
                'acl_security'       => ['title' => 'Безопасность ACL', 'description' => 'Правила доступа с запретом по умолчанию для более безопасной защиты маршрутов.'],
                'csrf_sessions'      => ['title' => 'CSRF и сессии', 'description' => 'Токены на основе сессий и безопасные настройки по умолчанию для веб-потоков.'],
                'cache_helpers'      => ['title' => 'Помощники кэширования', 'description' => 'Запоминание, забывание и переиспользование дорогих данных с меньшим объёмом кода.'],
                'events'             => ['title' => 'События', 'description' => 'Диспетчеризация поведения приложения без жёсткой связи между рабочими процессами.'],
                'cli_actions'        => ['title' => 'CLI-действия', 'description' => 'Создание задач командной строки с использованием тех же паттернов фреймворка.'],
                'statera_tests'      => ['title' => 'Тесты Statera', 'description' => 'Лёгкое сценарное тестирование, разработанное для Sukarix.'],
                'phinx_migrations'   => ['title' => 'Миграции Phinx', 'description' => 'Версионирование изменений базы данных, когда приложению требуется персистентность.'],
                'structured_logs'    => ['title' => 'Структурированные логи', 'description' => 'Вывод на базе Monolog для веб-запросов и работы в CLI.'],
                'translations'       => ['title' => 'Переводы', 'description' => 'Файлы локалей и переключение во время выполнения для мультиязычных приложений.'],
            ],
            'hero_labels' => [
                'badge'           => 'PHP 8.4+ фреймворк на Fat-Free',
                'start_title'     => 'Старт за секунды',
                'start_subtitle'  => 'Установка, маршрутизация, отрисовка',
                'queues_title'    => 'Очереди',
                'queues_desc'     => 'Конвейеры на базе Redis',
                'security_title'  => 'Безопасность',
                'security_desc'   => 'ACL + CSRF + сессии',
            ],
            'features_header' => [
                'badge'    => 'Инструментарий Sukarix',
                'title'    => 'Малая поверхность, серьёзная мощь фреймворка.',
                'subtitle' => 'Скелетное приложение должно ощущаться как фреймворк: сфокусированным, выразительным и готовым к реальным продуктам без визуального шума.',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => 'Построен на проверенном ядре Fat-Free Framework, с Sukarix, добавляющим сладкий слой для сервисов, структуры и готовых к продакшену настроек.',
                'link'        => 'Подробнее',
            ],
            'footer' => [
                'about_title'   => 'О проекте',
                'about_text'    => 'Sukarix — это PHP-фреймворк с открытым исходным кодом, построенный на Fat-Free.',
                'contact_title' => 'Контакты',
                'follow_title'  => 'Следите за нами',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => 'Войти',
                'logout'              => 'Выйти',
                'delete_confirm'      => 'Хотите продолжить?',
                'yes'                 => 'Да',
                'no'                  => 'Нет',
                'cancel'              => 'Отмена',
                'all_rights_reserved' => 'Все права защищены',
                'copyright'           => 'Авторские права',
                'record_updated'      => 'Запись обновлена',
            ],
            'user' => [
                'login_success'           => 'С возвращением, {0}!',
                'add_success'             => 'Пользователь успешно добавлен',
                'edit_user'               => 'Изменить пользователя',
                'delete_user'             => 'Удалить пользователя',
                'edit_success'            => 'Пользователь {0} успешно изменён',
                'profile_edit_success'    => 'Профиль успешно изменён',
                'delete_success'          => 'Пользователь {0} успешно удалён',
                'change_password_success' => 'Пароль успешно изменён',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => 'Непредвиденная ошибка сервера',
                'empty'        => 'Это поле обязательно для заполнения',
            ],
            'login' => [
                'email'         => 'Недействительный адрес электронной почты',
                'password'      => 'Недействительный пароль',
                'password_size' => 'Длина пароля должна быть не менее 8 символов',
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
                'admin'    => 'Администратор',
                'customer' => 'Клиент',
            ],
            'statuses' => [
                'inactive' => 'Неактивен',
                'active'   => 'Активен',
            ],
            'statuses_tags' => [
                'Y' => 'Активен',
                'N' => 'Пассивен',
            ],
            'days' => [
                'monday'    => 'Понедельник',
                'tuesday'   => 'Вторник',
                'wednesday' => 'Среда',
                'thursday'  => 'Четверг',
                'friday'    => 'Пятница',
                'saturday'  => 'Суббота',
                'sunday'    => 'Воскресенье',
            ],
            'months' => [
                'january'   => 'Январь',
                'february'  => 'Февраль',
                'march'     => 'Март',
                'april'     => 'Апрель',
                'may'       => 'Май',
                'june'      => 'Июнь',
                'july'      => 'Июль',
                'august'    => 'Август',
                'september' => 'Сентябрь',
                'october'   => 'Октябрь',
                'november'  => 'Ноябрь',
                'december'  => 'Декабрь',
            ],
        ],
    ],
];
