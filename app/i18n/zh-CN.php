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
            'title'       => 'Sukarix - 基于 Fat-Free 的现代 PHP 框架',
            'description' => 'Sukarix 是一个基于 Fat-Free 构建的现代 PHP 8.4+ 框架，提供路由、ACL、依赖注入、i18n、队列、缓存、会话和产品就绪的默认配置。',
            'keywords'    => 'Sukarix, PHP 框架, Fat-Free Framework, F3, PHP 8.4, 依赖注入, ACL, 路由, i18n, Redis 队列, 开源框架',
            'og_title'       => 'Sukarix - 基于 Fat-Free 的现代 PHP 框架',
            'og_description' => '在 Fat-Free 之上使用小巧而富有表现力的框架层，构建企业级 PHP 应用。',
            'twitter_title'       => 'Sukarix - 基于 Fat-Free 的现代 PHP 框架',
            'twitter_description' => '为 PHP 应用提供路由、ACL、依赖注入、i18n、队列、缓存和产品就绪的默认配置。',
        ],
        'label' => [
            'core' => [
                'email'                 => '电子邮箱',
                'password'              => '密码',
                'password_hint'         => '密码（至少 8 个字符）',
                'first_name'            => '名字',
                'last_name'             => '姓氏',
                'back'                  => '返回',
                'submit'                => '提交',
                'confirm'               => '确认',
                'cancel'                => '取消',
                'logo'                  => '徽标',
                'first'                 => '首页',
                'last'                  => '末页',
                'actions'               => '操作',
                'send_email'            => '发送邮件',
                'password_confirmation' => '确认密码',
                'save_password'         => '保存密码',
                'add'                   => '添加',
                'edit'                  => '编辑',
                'save'                  => '保存',
                'view_more'             => '查看更多...',
                'register'              => '注册',
                'id'                    => 'ID',
                'search'                => '搜索...',
                'sending'               => '发送中...',
                'at'                    => '于',
            ],
            'menu' => [
                'users' => '用户',
            ],
            'user' => [
                'users'            => '用户',
                'user'             => '用户',
                'email'            => '电子邮箱',
                'role'             => '角色',
                'status'           => '状态',
                'first_name'       => '名字',
                'last_name'        => '姓氏',
                'edit_user'        => '编辑用户',
                'new_user'         => '新用户',
                'add_user'         => '添加用户',
                'my_profile'       => '我的资料',
                'new_password'     => '新密码',
                'reset_password'   => '重置密码',
                'current_password' => '当前密码',
                'confirm_password' => '确认密码',
                'change_password'  => '修改密码',
            ],
            'nav' => [
                'home'          => '首页',
                'documentation' => '文档',
                'features'      => '功能',
                'languages'     => '语言',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => '恰到好处的甜美与高效，构建于 Fat-Free 之上。面向企业应用的现代 PHP 框架。',
                'cta_primary'   => '开始使用',
                'cta_secondary' => '探索功能',
            ],
            'intro' => [
                'badge'    => '框架骨架',
                'title'    => '欢迎使用 Sukarix',
                'subtitle' => 'Sukarix 的主要目标是为开发者提供一个强大而高效的框架，用于构建企业级 PHP 应用。',
            ],
            'features' => [
                'routing' => [
                    'title'       => '路由与 ACL',
                    'description' => '高级路由与访问控制列表能力，确保应用拥有安全灵活的访问管理，采用默认拒绝策略并按路由授权。',
                ],
                'queue' => [
                    'title'       => '队列服务',
                    'description' => '基于 Redis 的 FIFO 队列，支持去重与尝试次数跟踪，借助原子 Lua 脚本实现一致的管道处理。',
                ],
                'di' => [
                    'title'       => '依赖注入',
                    'description' => '内置 IoC 容器，具备类型化服务解析与严格校验，促进低耦合，让代码更易于测试和维护。',
                ],
                'enterprise' => [
                    'title'       => '企业级就绪',
                    'description' => '专为企业场景设计，内置结构化日志、错误处理、事件分发、国际化、CSRF 防护和定时任务调度。',
                ],
                'i18n' => [
                    'title'       => '国际化',
                    'description' => '通过简洁的字典格式提供多语言支持，支持自动语言检测和运行时切换。',
                ],
            ],
            'cta' => [
                'title'    => '准备好开始构建了吗？',
                'subtitle' => '使用 Sukarix 开启下一个项目，更快交付。',
                'button'   => '阅读文档',
            ],
            'capabilities' => [
                'badge'    => '默认包含',
                'title'    => '框架启动模板应展示的一切。',
                'subtitle' => '一组精简的应用核心要素，让开发者在打开文档之前就能立即了解 Sukarix 提供了什么。',
                'stat_languages'  => '语言',
                'stat_foundation' => '基础',
                'typed_actions'      => ['title' => '类型化操作', 'description' => '小巧的 WebAction 控制器，干净地渲染 F3 模板。'],
                'hive_config'        => ['title' => 'F3 hive 配置', 'description' => '基于 INI 的设置，具备可预测的环境覆盖。'],
                'service_injector'   => ['title' => '服务注入器', 'description' => '解析可复用服务，无需连接繁重依赖。'],
                'acl_security'       => ['title' => 'ACL 安全', 'description' => '默认拒绝的访问规则，更安全地保护路由。'],
                'csrf_sessions'      => ['title' => 'CSRF 会话', 'description' => '基于会话的令牌和安全的默认值，适用于 Web 流程。'],
                'cache_helpers'      => ['title' => '缓存助手', 'description' => '用更少的代码记住、遗忘和复用昂贵数据。'],
                'events'             => ['title' => '事件', 'description' => '分发应用行为，无需耦合工作流。'],
                'cli_actions'        => ['title' => 'CLI 操作', 'description' => '使用相同的框架模式构建命令行任务。'],
                'statera_tests'      => ['title' => 'Statera 测试', 'description' => '为 Sukarix 设计的轻量级场景化测试。'],
                'phinx_migrations'   => ['title' => 'Phinx 迁移', 'description' => '当应用需要持久化时，对数据库变更进行版本控制。'],
                'structured_logs'    => ['title' => '结构化日志', 'description' => '由 Monolog 驱动的输出，适用于 Web 请求和 CLI 工作。'],
                'translations'       => ['title' => '翻译', 'description' => '语言文件和运行时切换，支持多语言应用。'],
            ],
            'hero_labels' => [
                'badge'           => '基于 Fat-Free 的 PHP 8.4+ 框架',
                'start_title'     => '秒级启动',
                'start_subtitle'  => '安装、路由、渲染',
                'queues_title'    => '队列',
                'queues_desc'     => 'Redis 就绪的管道',
                'security_title'  => '安全',
                'security_desc'   => 'ACL + CSRF + 会话',
            ],
            'features_header' => [
                'badge'    => 'Sukarix 工具包',
                'title'    => '小巧的接口，强大的框架能力。',
                'subtitle' => '骨架应用应与框架一脉相承：专注、富有表现力，无需视觉噪音即可用于真实产品。',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => '构建于经过验证的 Fat-Free Framework 核心之上，Sukarix 添加了用于服务、结构和产品就绪默认值的甜蜜层。',
                'link'        => '了解更多',
            ],
            'footer' => [
                'about_title'   => '关于',
                'about_text'    => 'Sukarix 是一个基于 Fat-Free 构建的开源 PHP 框架。',
                'contact_title' => '联系我们',
                'follow_title'  => '关注我们',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => '登录',
                'logout'              => '退出',
                'delete_confirm'      => '是否继续？',
                'yes'                 => '是',
                'no'                  => '否',
                'cancel'              => '取消',
                'all_rights_reserved' => '保留所有权利',
                'copyright'           => '版权所有',
                'record_updated'      => '记录已更新',
            ],
            'user' => [
                'login_success'           => '欢迎回来，{0}！',
                'add_success'             => '用户添加成功',
                'edit_user'               => '编辑用户',
                'delete_user'             => '删除用户',
                'edit_success'            => '用户 {0} 编辑成功',
                'profile_edit_success'    => '资料编辑成功',
                'delete_success'          => '用户 {0} 删除成功',
                'change_password_success' => '密码修改成功',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => '服务器发生意外错误',
                'empty'        => '此字段为必填项',
            ],
            'login' => [
                'email'         => '电子邮箱地址无效',
                'password'      => '密码无效',
                'password_size' => '密码长度至少为 8 个字符',
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
                'admin'    => '管理员',
                'customer' => '客户',
            ],
            'statuses' => [
                'inactive' => '未激活',
                'active'   => '已激活',
            ],
            'statuses_tags' => [
                'Y' => '已激活',
                'N' => '未激活',
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
