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
            'title'       => 'Sukarix - เฟรมเวิร์ก PHP สมัยใหม่บน Fat-Free',
            'description' => 'Sukarix เป็นเฟรมเวิร์ก PHP 8.4+ สมัยใหม่ที่สร้างบน Fat-Free พร้อมการกำหนดเส้นทาง ACL การฉีดขึ้นตัว i18n คิว แคช เซสชัน และค่าเริ่มต้นที่พร้อมสำหรับการผลิต',
            'keywords'    => 'Sukarix, เฟรมเวิร์ก PHP, Fat-Free Framework, F3, PHP 8.4, การฉีดขึ้นตัว, ACL, การกำหนดเส้นทาง, i18n, คิว Redis, เฟรมเวิร์กโอเพนซอร์ส',
            'og_title'       => 'Sukarix - เฟรมเวิร์ก PHP สมัยใหม่บน Fat-Free',
            'og_description' => 'สร้างแอปพลิเคชัน PHP พร้อมสำหรับองค์กรด้วยเลเยอร์เฟรมเวิร์กขนาดเล็กที่มีการแสดงออกบน Fat-Free',
            'twitter_title'       => 'Sukarix - เฟรมเวิร์ก PHP สมัยใหม่บน Fat-Free',
            'twitter_description' => 'การกำหนดเส้นทาง ACL DI i18n คิว แคช และค่าเริ่มต้นที่พร้อมสำหรับการผลิตสำหรับแอปพลิเคชัน PHP',
        ],
        'label' => [
            'core' => [
                'email'                 => 'อีเมล',
                'password'              => 'รหัสผ่าน',
                'password_hint'         => 'รหัสผ่าน (ขั้นต่ำ 8 ตัวอักษร)',
                'first_name'            => 'ชื่อ',
                'last_name'             => 'นามสกุล',
                'back'                  => 'กลับ',
                'submit'                => 'ส่ง',
                'confirm'               => 'ยืนยัน',
                'cancel'                => 'ยกเลิก',
                'logo'                  => 'โลโก้',
                'first'                 => 'แรก',
                'last'                  => 'สุดท้าย',
                'actions'               => 'การดำเนินการ',
                'send_email'            => 'ส่งอีเมล',
                'password_confirmation' => 'ยืนยันรหัสผ่าน',
                'save_password'         => 'บันทึกรหัสผ่าน',
                'add'                   => 'เพิ่ม',
                'edit'                  => 'แก้ไข',
                'save'                  => 'บันทึก',
                'view_more'             => 'ดูเพิ่มเติม...',
                'register'              => 'ลงทะเบียน',
                'id'                    => 'ID',
                'search'                => 'ค้นหา...',
                'sending'               => 'กำลังส่ง...',
                'at'                    => 'ที่',
            ],
            'menu' => [
                'users' => 'ผู้ใช้',
            ],
            'user' => [
                'users'            => 'ผู้ใช้',
                'user'             => 'ผู้ใช้',
                'email'            => 'อีเมล',
                'role'             => 'บทบาท',
                'status'           => 'สถานะ',
                'first_name'       => 'ชื่อ',
                'last_name'        => 'นามสกุล',
                'edit_user'        => 'แก้ไขผู้ใช้',
                'new_user'         => 'ผู้ใช้ใหม่',
                'add_user'         => 'เพิ่มผู้ใช้',
                'my_profile'       => 'โปรไฟล์ของฉัน',
                'new_password'     => 'รหัสผ่านใหม่',
                'reset_password'   => 'รีเซ็ตรหัสผ่าน',
                'current_password' => 'รหัสผ่านปัจจุบัน',
                'confirm_password' => 'ยืนยันรหัสผ่าน',
                'change_password'  => 'เปลี่ยนรหัสผ่าน',
            ],
            'nav' => [
                'home'          => 'หน้าแรก',
                'documentation' => 'เอกสารประกอบ',
                'features'      => 'คุณสมบัติ',
                'languages'     => 'ภาษา',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => 'ความหวานและประสิทธิภาพที่ลงตัวบน Fat-Free เฟรมเวิร์ก PHP สมัยใหม่สำหรับแอปพลิเคชันองค์กร',
                'cta_primary'   => 'เริ่มต้น',
                'cta_secondary' => 'สำรวจคุณสมบัติ',
            ],
            'intro' => [
                'badge'    => 'โครงกรอบแอปพลิเคชัน',
                'title'    => 'ยินดีต้อนรับสู่ Sukarix',
                'subtitle' => 'วัตถุประสงค์หลักของ Sukarix คือมอบเฟรมเวิร์กที่ทรงพลังและมีประสิทธิภาพให้แก่นักพัฒนาเพื่อสร้างแอปพลิเคชัน PHP ระดับองค์กร',
            ],
            'features' => [
                'routing' => [
                    'title'       => 'การกำหนดเส้นทาง & ACL',
                    'description' => 'ความสามารถด้านการกำหนดเส้นทางและรายการควบคุมการเข้าถึงขั้นสูงช่วยให้การจัดการสิทธิ์เข้าถึงมีความปลอดภัยและยืดหยุ่น ด้วยนโยบายปฏิเสธเริ่มต้นและการอนุญาตตามเส้นทาง',
                ],
                'queue' => [
                    'title'       => 'บริการคิว',
                    'description' => 'คิว FIFO ที่รองรับโดย Redis พร้อมการกำจัดซ้ำและการติดตามความพยายาม ปรับให้เหมาะสมด้วยสคริปต์ Lua แบบอะตอมิกสำหรับการประมวลผลpipelineที่สม่ำเสมอ',
                ],
                'di' => [
                    'title'       => 'การฉีดขึ้นตัว',
                    'description' => 'คอนเทนเนอร์ IoC ในตัวพร้อมการแก้ไขบริการแบบมีชนิดและการตรวจสอบที่เข้มงวด ส่งเสริมการ coupling ที่หลวมและช่วยให้ทดสอบและบำรุงรักษาได้ง่าย',
                ],
                'enterprise' => [
                    'title'       => 'พร้อมสำหรับองค์กร',
                    'description' => 'ออกแบบมาสำหรับการใช้งานองค์กรด้วยการบันทึกแบบมีโครงสร้าง การจัดการข้อผิดพลาด การกระจายเหตุการณ์ i18n การป้องกัน CSRF และการตั้งเวลางาน cron ตั้งแต่เริ่มต้น',
                ],
                'i18n' => [
                    'title'       => 'การรองรับหลายภาษา',
                    'description' => 'รองรับหลายภาษาด้วยรูปแบบพจนานุกรมที่เรียบง่าย การตรวจจับ locale อัตโนมัติ และการสลับในขณะรันไทม์',
                ],
            ],
            'cta' => [
                'title'    => 'พร้อมที่จะสร้างแล้วหรือยัง?',
                'subtitle' => 'เริ่มโครงการถัดไปของคุณด้วย Sukarix และส่งมอบได้เร็วขึ้น',
                'button'   => 'อ่านเอกสารประกอบ',
            ],
            'capabilities' => [
                'badge'    => 'รวมอยู่โดยค่าเริ่มต้น',
                'title'    => 'ทุกสิ่งที่สตาร์เตอร์เฟรมเวิร์กควรแสดง',
                'subtitle' => 'ชุดองค์ประกอบหลักของแอปแบบกระชับเพื่อให้นักพัฒนาเข้าใจทันทีว่า Sukarix มอบอะไรก่อนเปิดเอกสารประกอบ',
                'stat_languages'  => 'ภาษา',
                'stat_foundation' => 'รากฐาน',
                'typed_actions'      => ['title' => 'การกระทำแบบมีชนิด', 'description' => 'คอนโทรลเลอร์ WebAction ขนาดเล็กที่เรนเดอร์เทมเพลต F3 อย่างสะอาด'],
                'hive_config'        => ['title' => 'การตั้งค่า hive ของ F3', 'description' => 'การตั้งค่าที่ขับเคลื่อนด้วย INI พร้อมการแทนที่ตามสภาพแวดล้อมที่คาดเดาได้'],
                'service_injector'   => ['title' => 'ตัวฉีดบริการ', 'description' => 'แก้ไขบริการที่ใช้ซ้ำได้โดยไม่ต้องเชื่อมต่อ dependency หนัก'],
                'acl_security'       => ['title' => 'ความปลอดภัย ACL', 'description' => 'กฎการเข้าถึงแบบปฏิเสธเริ่มต้นเพื่อปกป้องเส้นทางให้ปลอดภัยยิ่งขึ้น'],
                'csrf_sessions'      => ['title' => 'เซสชัน CSRF', 'description' => 'โทเค็นที่อิงเซสชันและค่าเริ่มต้นที่ปลอดภัยสำหรับโฟลว์เว็บ'],
                'cache_helpers'      => ['title' => 'ตัวช่วยแคช', 'description' => 'จดจำ ลืม และนำข้อมูลที่ใช้ทรัพยากรมากกลับมาใช้ใหม่ด้วยโค้ดที่น้อยลง'],
                'events'             => ['title' => 'เหตุการณ์', 'description' => 'กระจายพฤติกรรมของแอปโดยไม่ผูกโยงเวิร์กโฟลว์เข้าด้วยกัน'],
                'cli_actions'        => ['title' => 'การกระทำ CLI', 'description' => 'สร้างงานบรรทัดคำสั่งโดยใช้รูปแบบเฟรมเวิร์กเดียวกัน'],
                'statera_tests'      => ['title' => 'การทดสอบ Statera', 'description' => 'การทดสอบเบาๆ ตามสถานการณ์ที่ออกแบบสำหรับ Sukarix'],
                'phinx_migrations'   => ['title' => 'การย้ายข้อมูล Phinx', 'description' => 'กำกับเวอร์ชันการเปลี่ยนแปลงฐานข้อมูลเมื่อแอปของคุณต้องการการจัดเก็บถาวร'],
                'structured_logs'    => ['title' => 'บันทึกแบบมีโครงสร้าง', 'description' => 'เอาต์พุตที่ขับเคลื่อนด้วย Monolog สำหรับคำขอเว็บและงาน CLI'],
                'translations'       => ['title' => 'การแปล', 'description' => 'ไฟล์ locale และการสลับขณะรันไทม์สำหรับแอปหลายภาษา'],
            ],
            'hero_labels' => [
                'badge'           => 'เฟรมเวิร์ก PHP 8.4+ บน Fat-Free',
                'start_title'     => 'เริ่มในไม่กี่วินาที',
                'start_subtitle'  => 'ติดตั้ง กำหนดเส้นทาง เรนเดอร์',
                'queues_title'    => 'คิว',
                'queues_desc'     => 'ไปป์ไลน์พร้อมสำหรับ Redis',
                'security_title'  => 'ความปลอดภัย',
                'security_desc'   => 'ACL + CSRF + เซสชัน',
            ],
            'features_header' => [
                'badge'    => 'ชุดเครื่องมือ Sukarix',
                'title'    => 'พื้นที่เล็ก พลังเฟรมเวิร์กที่จริงจัง',
                'subtitle' => 'แอปโครงสร้างควรให้ความรู้สึกเหมือนเฟรมเวิร์ก: โฟกัส สื่อสารได้ดี และพร้อมสำหรับผลิตภัณฑ์จริงโดยไม่มีสัญญาณรบกวนทางสายตา',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => 'สร้างบนคอร์ที่พิสูจน์แล้วของ Fat-Free Framework โดย Sukarix เพิ่มชั้นหวานสำหรับบริการ โครงสร้าง และค่าเริ่มต้นที่พร้อมสำหรับผลิตภัณฑ์',
                'link'        => 'เรียนรู้เพิ่มเติม',
            ],
            'footer' => [
                'about_title'   => 'เกี่ยวกับ',
                'about_text'    => 'Sukarix เป็นเฟรมเวิร์ก PHP โอเพนซอร์สที่สร้างบน Fat-Free',
                'contact_title' => 'ติดต่อ',
                'follow_title'  => 'ติดตามเรา',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => 'เข้าสู่ระบบ',
                'logout'              => 'ออกจากระบบ',
                'delete_confirm'      => 'ต้องการดำเนินการต่อหรือไม่',
                'yes'                 => 'ใช่',
                'no'                  => 'ไม่',
                'cancel'              => 'ยกเลิก',
                'all_rights_reserved' => 'สงวนลิขสิทธิ์',
                'copyright'           => 'ลิขสิทธิ์',
                'record_updated'      => 'อัปเดตบันทึกแล้ว',
            ],
            'user' => [
                'login_success'           => 'ยินดีต้อนรับกลับ {0}!',
                'add_success'             => 'เพิ่มผู้ใช้สำเร็จแล้ว',
                'edit_user'               => 'แก้ไขผู้ใช้',
                'delete_user'             => 'ลบผู้ใช้',
                'edit_success'            => 'แก้ไขผู้ใช้ {0} สำเร็จแล้ว',
                'profile_edit_success'    => 'แก้ไขโปรไฟล์สำเร็จแล้ว',
                'delete_success'          => 'ลบผู้ใช้ {0} สำเร็จแล้ว',
                'change_password_success' => 'เปลี่ยนรหัสผ่านสำเร็จแล้ว',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => 'ข้อผิดพลาดของเซิร์ฟเวอร์ที่ไม่คาดคิด',
                'empty'        => 'จำเป็นต้องกรอกข้อมูลในช่องนี้',
            ],
            'login' => [
                'email'         => 'ที่อยู่อีเมลไม่ถูกต้อง',
                'password'      => 'รหัสผ่านไม่ถูกต้อง',
                'password_size' => 'รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร',
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
                'admin'    => 'ผู้ดูแลระบบ',
                'customer' => 'ลูกค้า',
            ],
            'statuses' => [
                'inactive' => 'ไม่ใช้งาน',
                'active'   => 'ใช้งาน',
            ],
            'statuses_tags' => [
                'Y' => 'ใช้งาน',
                'N' => 'ไม่ใช้งาน',
            ],
            'days' => [
                'monday'    => 'จันทร์',
                'tuesday'   => 'อังคาร',
                'wednesday' => 'พุธ',
                'thursday'  => 'พฤหัสบดี',
                'friday'    => 'ศุกร์',
                'saturday'  => 'เสาร์',
                'sunday'    => 'อาทิตย์',
            ],
            'months' => [
                'january'   => 'มกราคม',
                'february'  => 'กุมภาพันธ์',
                'march'     => 'มีนาคม',
                'april'     => 'เมษายน',
                'may'       => 'พฤษภาคม',
                'june'      => 'มิถุนายน',
                'july'      => 'กรกฎาคม',
                'august'    => 'สิงหาคม',
                'september' => 'กันยายน',
                'october'   => 'ตุลาคม',
                'november'  => 'พฤศจิกายน',
                'december'  => 'ธันวาคม',
            ],
        ],
    ],
];
