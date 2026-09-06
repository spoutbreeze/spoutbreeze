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
            'title'             => 'Sukarix - 建構於 Fat-Free 的現代 PHP 框架',
            'description'       => 'Sukarix 是一個建構於 Fat-Free 之上的現代 PHP 8.4+ 框架，提供路由、ACL、依賴注入、多語系、佇列、快取、工作階段與產品就緒的預設值。',
            'keywords'          => 'Sukarix, PHP 框架, Fat-Free Framework, F3, PHP 8.4, 依賴注入, ACL, 路由, 多語系, Redis 佇列, 開源框架',
            'og_title'          => 'Sukarix - 建構於 Fat-Free 的現代 PHP 框架',
            'og_description'    => '以 Fat-Free 之上小巧且富表達力的框架層，建構企業級 PHP 應用程式。',
            'twitter_title'     => 'Sukarix - 建構於 Fat-Free 的現代 PHP 框架',
            'twitter_description' => '路由、ACL、DI、多語系、佇列、快取與產品就緒的預設值，為 PHP 應用程式而生。',
        ],
        'label' => [
            'core' => [
                'email'                 => '電子郵箱',
                'password'              => '密碼',
                'password_hint'         => '密碼（至少 8 個字元）',
                'first_name'            => '名字',
                'last_name'             => '姓氏',
                'back'                  => '返回',
                'submit'                => '提交',
                'confirm'               => '確認',
                'cancel'                => '取消',
                'logo'                  => '徽標',
                'first'                 => '首頁',
                'last'                  => '末頁',
                'actions'               => '操作',
                'send_email'            => '發送郵件',
                'password_confirmation' => '確認密碼',
                'save_password'         => '儲存密碼',
                'add'                   => '新增',
                'edit'                  => '編輯',
                'save'                  => '儲存',
                'view_more'             => '查看更多...',
                'register'              => '註冊',
                'id'                    => 'ID',
                'search'                => '搜尋...',
                'sending'               => '發送中...',
                'at'                    => '於',
            ],
            'menu' => [
                'users' => '使用者',
            ],
            'user' => [
                'users'            => '使用者',
                'user'             => '使用者',
                'email'            => '電子郵箱',
                'role'             => '角色',
                'status'           => '狀態',
                'first_name'       => '名字',
                'last_name'        => '姓氏',
                'edit_user'        => '編輯使用者',
                'new_user'         => '新使用者',
                'add_user'         => '新增使用者',
                'my_profile'       => '我的資料',
                'new_password'     => '新密碼',
                'reset_password'   => '重置密碼',
                'current_password' => '當前密碼',
                'confirm_password' => '確認密碼',
                'change_password'  => '修改密碼',
            ],
            'nav' => [
                'home'          => '首頁',
                'documentation' => '文件',
                'features'      => '功能',
                'languages'     => '語言',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => '恰到好處的甜美與高效，建構於 Fat-Free 之上。面向企業應用的現代 PHP 框架。',
                'cta_primary'   => '開始使用',
                'cta_secondary' => '探索功能',
            ],
            'intro' => [
                'badge'    => '框架骨架',
                'title'    => '歡迎使用 Sukarix',
                'subtitle' => 'Sukarix 的主要目標是為開發者提供一個強大而高效的框架，用於建構企業級 PHP 應用。',
            ],
            'features' => [
                'routing' => [
                    'title'       => '路由與 ACL',
                    'description' => '高級路由與存取控制列表能力，確保應用擁有安全靈活的存取管理，採用預設拒絕策略並按路由授權。',
                ],
                'queue' => [
                    'title'       => '佇列服務',
                    'description' => '基於 Redis 的 FIFO 佇列，支援去重與嘗試次數追蹤，借助原子 Lua 腳本實現一致的管線處理。',
                ],
                'di' => [
                    'title'       => '依賴注入',
                    'description' => '內建 IoC 容器，具備型別化服務解析與嚴格驗證，促進低耦合，讓程式碼更易於測試和維護。',
                ],
                'enterprise' => [
                    'title'       => '企業級就緒',
                    'description' => '專為企業情境設計，內建結構化日誌、錯誤處理、事件分發、國際化、CSRF 防護和定時任務排程。',
                ],
                'i18n' => [
                    'title'       => '國際化',
                    'description' => '透過簡潔的字典格式提供多語言支援，支援自動語言偵測和執行時切換。',
                ],
            ],
            'cta' => [
                'title'    => '準備好開始建構了嗎？',
                'subtitle' => '使用 Sukarix 開啟下一個專案，更快交付。',
                'button'   => '閱讀文件',
            ],
            'capabilities' => [
                'badge'    => '預設包含',
                'title'    => '框架啟動模板應展示的一切。',
                'subtitle' => '一組精簡的應用核心要素，讓開發者在開啟文件之前就能立即了解 Sukarix 提供了什麼。',
                'stat_languages'  => '語言',
                'stat_foundation' => '基礎',
                'typed_actions'      => ['title' => '型別化操作', 'description' => '小巧的 WebAction 控制器，乾淨地渲染 F3 模板。'],
                'hive_config'        => ['title' => 'F3 hive 設定', 'description' => '基於 INI 的設定，具備可預測的環境覆寫。'],
                'service_injector'   => ['title' => '服務注入器', 'description' => '解析可重用服務，無需連接繁重依賴。'],
                'acl_security'       => ['title' => 'ACL 安全', 'description' => '預設拒絕的存取規則，更安全地保護路由。'],
                'csrf_sessions'      => ['title' => 'CSRF 工作階段', 'description' => '基於工作階段的權杖和安全的預設值，適用於 Web 流程。'],
                'cache_helpers'      => ['title' => '快取助手', 'description' => '用更少的程式碼記住、遺忘和重用昂貴資料。'],
                'events'             => ['title' => '事件', 'description' => '分發應用行為，無需耦合工作流程。'],
                'cli_actions'        => ['title' => 'CLI 操作', 'description' => '使用相同的框架模式建構命令列任務。'],
                'statera_tests'      => ['title' => 'Statera 測試', 'description' => '為 Sukarix 設計的輕量級情境化測試。'],
                'phinx_migrations'   => ['title' => 'Phinx 遷移', 'description' => '當應用需要持久化時，對資料庫變更進行版本控制。'],
                'structured_logs'    => ['title' => '結構化日誌', 'description' => '由 Monolog 驅動的輸出，適用於 Web 請求和 CLI 工作。'],
                'translations'       => ['title' => '翻譯', 'description' => '語言檔案和執行時切換，支援多語言應用。'],
            ],
            'hero_labels' => [
                'badge'           => '基於 Fat-Free 的 PHP 8.4+ 框架',
                'start_title'     => '秒級啟動',
                'start_subtitle'  => '安裝、路由、渲染',
                'queues_title'    => '佇列',
                'queues_desc'     => 'Redis 就緒的管線',
                'security_title'  => '安全',
                'security_desc'   => 'ACL + CSRF + 工作階段',
            ],
            'features_header' => [
                'badge'    => 'Sukarix 工具包',
                'title'    => '小巧的介面，強大的框架能力。',
                'subtitle' => '骨架應用應與框架一脈相承：專注、富有表達力，無需視覺雜訊即可用於真實產品。',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => '建構於經過驗證的 Fat-Free Framework 核心之上，Sukarix 新增了用於服務、結構和產品就緒預設值的甜蜜層。',
                'link'        => '了解更多',
            ],
            'footer' => [
                'about_title'   => '關於',
                'about_text'    => 'Sukarix 是一個基於 Fat-Free 建構的開源 PHP 框架。',
                'contact_title' => '聯絡我們',
                'follow_title'  => '關注我們',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => '登入',
                'logout'              => '登出',
                'delete_confirm'      => '是否繼續？',
                'yes'                 => '是',
                'no'                  => '否',
                'cancel'              => '取消',
                'all_rights_reserved' => '保留所有權利',
                'copyright'           => '版權所有',
                'record_updated'      => '記錄已更新',
            ],
            'user' => [
                'login_success'           => '歡迎回來，{0}！',
                'add_success'             => '使用者新增成功',
                'edit_user'               => '編輯使用者',
                'delete_user'             => '刪除使用者',
                'edit_success'            => '使用者 {0} 編輯成功',
                'profile_edit_success'    => '資料編輯成功',
                'delete_success'          => '使用者 {0} 刪除成功',
                'change_password_success' => '密碼修改成功',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => '伺服器發生意外錯誤',
                'empty'        => '此欄位為必填項',
            ],
            'login' => [
                'email'         => '電子郵箱地址無效',
                'password'      => '密碼無效',
                'password_size' => '密碼長度至少為 8 個字元',
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
                'admin'    => '管理員',
                'customer' => '客戶',
            ],
            'statuses' => [
                'inactive' => '未啟用',
                'active'   => '已啟用',
            ],
            'statuses_tags' => [
                'Y' => '已啟用',
                'N' => '未啟用',
            ],
            'days' => [
                'monday'    => '星期一',
                'tuesday'   => '星期二',
                'wednesday' => '星期三',
                'thursday'  => '星期四',
                'friday'    => '星期五',
                'saturday'  => '星期六',
                'sunday'    => '星期日',
            ],
            'months' => [
                'january'   => '一月',
                'february'  => '二月',
                'march'     => '三月',
                'april'     => '四月',
                'may'       => '五月',
                'june'      => '六月',
                'july'      => '七月',
                'august'    => '八月',
                'september' => '九月',
                'october'   => '十月',
                'november'  => '十一月',
                'december'  => '十二月',
            ],
        ],
    ],
];
