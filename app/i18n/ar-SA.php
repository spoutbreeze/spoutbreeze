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
            'title'       => 'Sukarix - إطار عمل PHP حديث على Fat-Free',
            'description' => 'Sukarix هو إطار عمل PHP 8.4+ حديث مبني على Fat-Free، مع التوجيه وقوائم التحكم بالوصول وحقن التبعيات وتعدد اللغات والطوابير والتخزين المؤقت والجلسات وإعدادات جاهزة للمنتجات.',
            'keywords'    => 'Sukarix, إطار عمل PHP, Fat-Free Framework, F3, PHP 8.4, حقن التبعيات, ACL, التوجيه, تعدد اللغات, طوابير Redis, إطار عمل مفتوح المصدر',
            'og_title'       => 'Sukarix - إطار عمل PHP حديث على Fat-Free',
            'og_description' => 'ابنِ تطبيقات PHP جاهزة للمؤسسات بطبقة إطار عمل صغيرة ومعبرة فوق Fat-Free.',
            'twitter_title'       => 'Sukarix - إطار عمل PHP حديث على Fat-Free',
            'twitter_description' => 'التوجيه وقوائم التحكم وحقن التبعيات وتعدد اللغات والطوابير والتخزين المؤقت وإعدادات جاهزة للمنتجات لتطبيقات PHP.',
        ],
        'label' => [
            'core' => [
                'email'                 => 'البريد الإلكتروني',
                'password'              => 'كلمة المرور',
                'password_hint'         => 'كلمة المرور (8 أحرف على الأقل)',
                'first_name'            => 'الاسم الأول',
                'last_name'             => 'اسم العائلة',
                'back'                  => 'رجوع',
                'submit'                => 'إرسال',
                'confirm'               => 'موافقة',
                'cancel'                => 'إلغاء',
                'logo'                  => 'الشعار',
                'first'                 => 'الأول',
                'last'                  => 'الأخير',
                'actions'               => 'إجراءات',
                'send_email'            => 'إرسال بريد إلكتروني',
                'password_confirmation' => 'تأكيد كلمة المرور',
                'save_password'         => 'حفظ كلمة المرور',
                'add'                   => 'إضافة',
                'edit'                  => 'تعديل',
                'save'                  => 'حفظ',
                'view_more'             => 'عرض المزيد...',
                'register'              => 'تسجيل',
                'id'                    => 'المعرف',
                'search'                => 'بحث...',
                'sending'               => 'جارٍ الإرسال...',
                'at'                    => 'في',
            ],
            'menu' => [
                'users' => 'المستخدمون',
            ],
            'user' => [
                'users'            => 'المستخدمون',
                'user'             => 'مستخدم',
                'email'            => 'البريد الإلكتروني',
                'role'             => 'الدور',
                'status'           => 'الحالة',
                'first_name'       => 'الاسم الأول',
                'last_name'        => 'اسم العائلة',
                'edit_user'        => 'تعديل المستخدم',
                'new_user'         => 'مستخدم جديد',
                'add_user'         => 'إضافة مستخدم',
                'my_profile'       => 'ملفي الشخصي',
                'new_password'     => 'كلمة مرور جديدة',
                'reset_password'   => 'إعادة تعيين كلمة المرور',
                'current_password' => 'كلمة المرور الحالية',
                'confirm_password' => 'تأكيد كلمة المرور',
                'change_password'  => 'تغيير كلمة المرور',
            ],
            'nav' => [
                'home'          => 'الرئيسية',
                'documentation' => 'التوثيق',
                'features'      => 'الميزات',
                'languages'     => 'اللغة',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => 'القدر المناسب من الحلاوة والكفاءة فوق Fat-Free. إطار عمل PHP حديث لتطبيقات المؤسسات.',
                'cta_primary'   => 'ابدأ الآن',
                'cta_secondary' => 'استكشف الميزات',
            ],
            'intro' => [
                'badge'    => 'هيكل إطار العمل',
                'title'    => 'مرحبًا بك في Sukarix',
                'subtitle' => 'الهدف الأساسي من Sukarix هو تزويد المطورين بإطار عمل قوي وفعال لبناء تطبيقات PHP على مستوى المؤسسات.',
            ],
            'features' => [
                'routing' => [
                    'title'       => 'التوجيه وقوائم التحكم',
                    'description' => 'قدرات توجيه متقدمة وقوائم تحكم بالوصول تضمن إدارة وصول آمنة ومرنة لتطبيقاتك، مع سياسة الرفض الافتراضية والتفويض لكل مسار.',
                ],
                'queue' => [
                    'title'       => 'خدمة الطوابير',
                    'description' => 'طابور FIFO مدعوم بـ Redis مع إزالة التكرار وتتبع المحاولات، مدعوم بنصوص Lua الذرية لمعالجة خطوط أنابيب متسقة عبر العمال.',
                ],
                'di' => [
                    'title'       => 'حقن التبعيات',
                    'description' => 'حاوية IoC مدمجة مع حل خدمات نمطي وتحقق صارم، تعزز الاقتران المنخفض وتجعل الكود سهل الاختبار والصيانة.',
                ],
                'enterprise' => [
                    'title'       => 'جاهز للمؤسسات',
                    'description' => 'مصمم للاستخدام المؤسسي مع تسجيل منظم ومعالجة أخطاء وإرسال أحداث ودعم تعدد اللغات وحماية CSRF وجدولة مهام دورية مدمجة.',
                ],
                'i18n' => [
                    'title'       => 'تدويل اللغات',
                    'description' => 'دعم متعدد اللغات بتنسيق قاموس بسيط واكتشاف تلقائي للغة والتبديل أثناء التشغيل دون إعادة تحميل التبعيات.',
                ],
            ],
            'cta' => [
                'title'    => 'جاهز للبناء؟',
                'subtitle' => 'ابدأ مشروعك القادم مع Sukarix وأطلق بشكل أسرع.',
                'button'   => 'اقرأ التوثيق',
            ],
            'capabilities' => [
                'badge'    => 'مضمنة افتراضيًا',
                'title'    => 'كل ما يجب أن يعرضه هيكل إطار العمل.',
                'subtitle' => 'مجموعة مدمجة من الأساسيات التطبيقية ليفهم المطورون على الفور ما يقدمه Sukarix قبل فتح التوثيق.',
                'stat_languages'  => 'اللغات',
                'stat_foundation' => 'الأساس',
                'typed_actions'      => ['title' => 'إجراءات نمطية', 'description' => 'وحدات تحكم WebAction صغيرة تعرض قوالب F3 بشكل نظيف.'],
                'hive_config'        => ['title' => 'إعدادات F3 hive', 'description' => 'إعدادات مدفوعة بـ INI مع تجاوزات بيئة يمكن التنبؤ بها.'],
                'service_injector'   => ['title' => 'حقن الخدمات', 'description' => 'حل الخدمات القابلة لإعادة الاستخدام دون ربط تبعيات ثقيلة.'],
                'acl_security'       => ['title' => 'أمان ACL', 'description' => 'قواعد وصول بالرفض الافتراضي لحماية المسارات بشكل أكثر أمانًا.'],
                'csrf_sessions'      => ['title' => 'جلسات CSRF', 'description' => 'رموز مدعومة بالجلسة وإعدادات آمنة لتدفقات الويب.'],
                'cache_helpers'      => ['title' => 'مساعدات التخزين المؤقت', 'description' => 'تذكر وانسَ وأعد استخدام البيانات المكلفة بكود أقل.'],
                'events'             => ['title' => 'الأحداث', 'description' => 'أرسل سلوك التطبيق دون ربط سير العمل معًا.'],
                'cli_actions'        => ['title' => 'إجراءات CLI', 'description' => 'ابنِ مهام سطر الأوامر باستخدام نفس أنماط إطار العمل.'],
                'statera_tests'      => ['title' => 'اختبارات Statera', 'description' => 'اختبارات خفيفة قائمة على السيناريوهات مصممة لـ Sukarix.'],
                'phinx_migrations'   => ['title' => 'ترحيلات Phinx', 'description' => 'نسّخ تغييرات قاعدة البيانات عندما يحتاج تطبيقك للاستمرارية.'],
                'structured_logs'    => ['title' => 'سجلات منظمة', 'description' => 'مخرجات مدعومة بـ Monolog لطلبات الويب وعمل CLI.'],
                'translations'       => ['title' => 'الترجمات', 'description' => 'ملفات اللغات والتبديل أثناء التشغيل للتطبيقات متعددة اللغات.'],
            ],
            'hero_labels' => [
                'badge'           => 'إطار عمل PHP 8.4+ على Fat-Free',
                'start_title'     => 'ابدأ في ثوانٍ',
                'start_subtitle'  => 'ثبّت، وجّه، اعرض',
                'queues_title'    => 'الطوابير',
                'queues_desc'     => 'خطوط أنابيب جاهزة لـ Redis',
                'security_title'  => 'الأمان',
                'security_desc'   => 'ACL + CSRF + جلسات',
            ],
            'features_header' => [
                'badge'    => 'أدوات Sukarix',
                'title'    => 'مساحة صغيرة، قوة إطار عمل جادة.',
                'subtitle' => 'يجب أن يشعر تطبيق الهيكل بإطار العمل: مركز ومعبر وجاهز للمنتجات الحقيقية دون ضوضاء بصرية.',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => 'مبني على نواة Fat-Free Framework المجربة، مع إضافة Sukarix للطبقة الحلوة للخدمات والبنية والإعدادات الجاهزة للمنتجات.',
                'link'        => 'اعرف المزيد',
            ],
            'footer' => [
                'about_title'   => 'حول',
                'about_text'    => 'Sukarix هو إطار عمل PHP مفتوح المصدر مبني على Fat-Free.',
                'contact_title' => 'اتصل بنا',
                'follow_title'  => 'تابعنا',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => 'تسجيل الدخول',
                'logout'              => 'تسجيل الخروج',
                'delete_confirm'      => 'هل تريد المتابعة؟',
                'yes'                 => 'نعم',
                'no'                  => 'لا',
                'cancel'              => 'إلغاء',
                'all_rights_reserved' => 'جميع الحقوق محفوظة',
                'copyright'           => 'حقوق النشر',
                'record_updated'      => 'تم تحديث السجل',
            ],
            'user' => [
                'login_success'           => 'مرحبًا بعودتك {0}!',
                'add_success'             => 'تمت إضافة المستخدم بنجاح',
                'edit_user'               => 'تعديل المستخدم',
                'delete_user'             => 'حذف المستخدم',
                'edit_success'            => 'تم تعديل المستخدم {0} بنجاح',
                'profile_edit_success'    => 'تم تعديل الملف الشخصي بنجاح',
                'delete_success'          => 'تم حذف المستخدم {0} بنجاح',
                'change_password_success' => 'تم تغيير كلمة المرور بنجاح',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => 'خطأ غير متوقع في الخادم',
                'empty'        => 'هذا الحقل مطلوب',
            ],
            'login' => [
                'email'         => 'عنوان بريد إلكتروني غير صالح',
                'password'      => 'كلمة مرور غير صالحة',
                'password_size' => 'يجب أن تكون كلمة المرور 8 أحرف على الأقل',
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
                'admin'    => 'مدير',
                'customer' => 'عميل',
            ],
            'statuses' => [
                'inactive' => 'غير نشط',
                'active'   => 'نشط',
            ],
            'statuses_tags' => [
                'Y' => 'نشط',
                'N' => 'سلبي',
            ],
            'days' => [
                'monday'    => 'الاثنين',
                'tuesday'   => 'الثلاثاء',
                'wednesday' => 'الأربعاء',
                'thursday'  => 'الخميس',
                'friday'    => 'الجمعة',
                'saturday'  => 'السبت',
                'sunday'    => 'الأحد',
            ],
            'months' => [
                'january'   => 'يناير',
                'february'  => 'فبراير',
                'march'     => 'مارس',
                'april'     => 'أبريل',
                'may'       => 'مايو',
                'june'      => 'يونيو',
                'july'      => 'يوليو',
                'august'    => 'أغسطس',
                'september' => 'سبتمبر',
                'october'   => 'أكتوبر',
                'november'  => 'نوفمبر',
                'december'  => 'ديسمبر',
            ],
        ],
    ],
];
