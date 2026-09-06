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
            'title'       => 'Sukarix - Framework PHP hiện đại trên Fat-Free',
            'description' => 'Sukarix là một framework PHP 8.4+ hiện đại được xây dựng trên Fat-Free, với định tuyến, ACL, tiêm phụ thuộc, i18n, hàng đợi, cache, phiên và mặc định sẵn sàng sản xuất.',
            'keywords'    => 'Sukarix, framework PHP, Fat-Free Framework, F3, PHP 8.4, tiêm phụ thuộc, ACL, định tuyến, i18n, hàng đợi Redis, framework mã nguồn mở',
            'og_title'       => 'Sukarix - Framework PHP hiện đại trên Fat-Free',
            'og_description' => 'Xây dựng ứng dụng PHP sẵn sàng doanh nghiệp với một lớp framework nhỏ gọn và giàu biểu đạt trên nền Fat-Free.',
            'twitter_title'       => 'Sukarix - Framework PHP hiện đại trên Fat-Free',
            'twitter_description' => 'Định tuyến, ACL, DI, i18n, hàng đợi, cache và mặc định sẵn sàng sản xuất cho ứng dụng PHP.',
        ],
        'label' => [
            'core' => [
                'email'                 => 'Email',
                'password'              => 'Mật khẩu',
                'password_hint'         => 'Mật khẩu (tối thiểu 8 ký tự)',
                'first_name'            => 'Tên',
                'last_name'             => 'Họ',
                'back'                  => 'Quay lại',
                'submit'                => 'Gửi',
                'confirm'               => 'Xác nhận',
                'cancel'                => 'Hủy',
                'logo'                  => 'Logo',
                'first'                 => 'Đầu',
                'last'                  => 'Cuối',
                'actions'               => 'Thao tác',
                'send_email'            => 'Gửi email',
                'password_confirmation' => 'xác nhận mật khẩu',
                'save_password'         => 'lưu mật khẩu',
                'add'                   => 'Thêm',
                'edit'                  => 'Sửa',
                'save'                  => 'Lưu',
                'view_more'             => 'Xem thêm...',
                'register'              => 'Đăng ký',
                'id'                    => 'ID',
                'search'                => 'Tìm kiếm...',
                'sending'               => 'Đang gửi...',
                'at'                    => 'lúc',
            ],
            'menu' => [
                'users' => 'Người dùng',
            ],
            'user' => [
                'users'            => 'Người dùng',
                'user'             => 'Người dùng',
                'email'            => 'Email',
                'role'             => 'Vai trò',
                'status'           => 'Trạng thái',
                'first_name'       => 'Tên',
                'last_name'        => 'Họ',
                'edit_user'        => 'Sửa người dùng',
                'new_user'         => 'Người dùng mới',
                'add_user'         => 'Thêm người dùng',
                'my_profile'       => 'Hồ sơ của tôi',
                'new_password'     => 'Mật khẩu mới',
                'reset_password'   => 'Đặt lại mật khẩu',
                'current_password' => 'Mật khẩu hiện tại',
                'confirm_password' => 'Xác nhận mật khẩu',
                'change_password'  => 'Đổi mật khẩu',
            ],
            'nav' => [
                'home'          => 'Trang chủ',
                'documentation' => 'Tài liệu',
                'features'      => 'Tính năng',
                'languages'     => 'Ngôn ngữ',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => 'Lượng ngọt và hiệu quả vừa phải trên nền Fat-Free. Framework PHP hiện đại cho ứng dụng doanh nghiệp.',
                'cta_primary'   => 'Bắt đầu',
                'cta_secondary' => 'Khám phá tính năng',
            ],
            'intro' => [
                'badge'    => 'Bộ khung framework',
                'title'    => 'Chào mừng đến với Sukarix',
                'subtitle' => 'Mục đích chính của Sukarix là cung cấp cho lập trình viên một framework mạnh mẽ và hiệu quả để xây dựng các ứng dụng PHP cấp doanh nghiệp.',
            ],
            'features' => [
                'routing' => [
                    'title'       => 'Định tuyến & ACL',
                    'description' => 'Khả năng định tuyến và kiểm soát truy cập nâng cao đảm bảo quản lý truy cập an toàn và linh hoạt cho ứng dụng của bạn, với chính sách từ chối theo mặc định và phân quyền theo từng tuyến.',
                ],
                'queue' => [
                    'title'       => 'Dịch vụ hàng đợi',
                    'description' => 'Hàng đợi FIFO dựa trên Redis với khử trùng lặp và theo dõi số lần thử, được tối ưu bằng các tập lệnh Lua nguyên tử để xử lý pipeline nhất quán trên các worker.',
                ],
                'di' => [
                    'title'       => 'Tiêm phụ thuộc',
                    'description' => 'Container IoC tích hợp với giải quyết dịch vụ có kiểu và xác thực nghiêm ngặt, thúc đẩy liên kết lỏng lẻo giúp mã nguồn dễ kiểm thử và bảo trì.',
                ],
                'enterprise' => [
                    'title'       => 'Sẵn sàng cho doanh nghiệp',
                    'description' => 'Được thiết kế cho doanh nghiệp với ghi log có cấu trúc, xử lý lỗi, phân phối sự kiện, i18n, bảo vệ CSRF và lập lịch cron ngay từ đầu.',
                ],
                'i18n' => [
                    'title'       => 'Đa ngôn ngữ',
                    'description' => 'Hỗ trợ đa ngôn ngữ với định dạng từ điển đơn giản, tự động phát hiện locale và chuyển đổi khi chạy.',
                ],
            ],
            'cta' => [
                'title'    => 'Sẵn sàng xây dựng?',
                'subtitle' => 'Bắt đầu dự án tiếp theo của bạn với Sukarix và phát hành nhanh hơn.',
                'button'   => 'Đọc tài liệu',
            ],
            'capabilities' => [
                'badge'    => 'Đã bao gồm mặc định',
                'title'    => 'Tất cả những gì một starter framework nên trình bày.',
                'subtitle' => 'Một bộ các thành phần cốt lõi ứng dụng gọn nhẹ để lập trình viên hiểu ngay Sukarix cung cấp gì trước khi mở tài liệu.',
                'stat_languages'  => 'Ngôn ngữ',
                'stat_foundation' => 'Nền tảng',
                'typed_actions'      => ['title' => 'Hành động có kiểu', 'description' => 'Các controller WebAction nhỏ gọn render template F3 một cách sạch sẽ.'],
                'hive_config'        => ['title' => 'Cấu hình hive F3', 'description' => 'Cài đặt dựa trên INI với ghi đè môi trường có thể dự đoán.'],
                'service_injector'   => ['title' => 'Bộ tiêm dịch vụ', 'description' => 'Giải quyết dịch vụ tái sử dụng mà không cần nối dependency nặng.'],
                'acl_security'       => ['title' => 'Bảo mật ACL', 'description' => 'Quy tắc truy cập từ chối mặc định để bảo vệ route an toàn hơn.'],
                'csrf_sessions'      => ['title' => 'Phiên CSRF', 'description' => 'Token dựa trên phiên và mặc định an toàn cho luồng web.'],
                'cache_helpers'      => ['title' => 'Trợ lý cache', 'description' => 'Ghi nhớ, quên và tái sử dụng dữ liệu tốn kém với ít mã hơn.'],
                'events'             => ['title' => 'Sự kiện', 'description' => 'Phân phối hành vi ứng dụng mà không ghép nối workflow.'],
                'cli_actions'        => ['title' => 'Hành động CLI', 'description' => 'Xây dựng tác vụ dòng lệnh dùng cùng pattern framework.'],
                'statera_tests'      => ['title' => 'Kiểm thử Statera', 'description' => 'Kiểm thử nhẹ theo kịch bản được thiết kế cho Sukarix.'],
                'phinx_migrations'   => ['title' => 'Di chuyển Phinx', 'description' => 'Quản lý phiên bản thay đổi cơ sở dữ liệu khi ứng dụng cần lưu trữ.'],
                'structured_logs'    => ['title' => 'Log có cấu trúc', 'description' => 'Đầu ra bằng Monolog cho yêu cầu web và tác vụ CLI.'],
                'translations'       => ['title' => 'Bản dịch', 'description' => 'Tệp locale và chuyển đổi khi chạy cho ứng dụng đa ngôn ngữ.'],
            ],
            'hero_labels' => [
                'badge'           => 'Framework PHP 8.4+ trên Fat-Free',
                'start_title'     => 'Bắt đầu trong vài giây',
                'start_subtitle'  => 'Cài đặt, định tuyến, render',
                'queues_title'    => 'Hàng đợi',
                'queues_desc'     => 'Pipeline sẵn sàng Redis',
                'security_title'  => 'Bảo mật',
                'security_desc'   => 'ACL + CSRF + phiên',
            ],
            'features_header' => [
                'badge'    => 'Bộ công cụ Sukarix',
                'title'    => 'Bề mặt nhỏ, sức mạnh framework nghiêm túc.',
                'subtitle' => 'Ứng dụng khung nên mang cảm giác của framework: tập trung, giàu biểu đạt và sẵn sàng cho sản phẩm thực mà không có tạp âm thị giác.',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => 'Xây dựng trên lõi Fat-Free Framework đã được chứng minh, Sukarix thêm lớp ngọt ngào cho dịch vụ, cấu trúc và mặc định sẵn sàng sản phẩm.',
                'link'        => 'Tìm hiểu thêm',
            ],
            'footer' => [
                'about_title'   => 'Giới thiệu',
                'about_text'    => 'Sukarix là framework PHP mã nguồn mở được xây dựng trên Fat-Free.',
                'contact_title' => 'Liên hệ',
                'follow_title'  => 'Theo dõi chúng tôi',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => 'Đăng nhập',
                'logout'              => 'Đăng xuất',
                'delete_confirm'      => 'Bạn có muốn tiếp tục không?',
                'yes'                 => 'Có',
                'no'                  => 'Không',
                'cancel'              => 'Hủy',
                'all_rights_reserved' => 'Đã đăng ký bản quyền',
                'copyright'           => 'Bản quyền',
                'record_updated'      => 'Đã cập nhật bản ghi',
            ],
            'user' => [
                'login_success'           => 'Chào mừng trở lại {0}!',
                'add_success'             => 'Đã thêm người dùng thành công',
                'edit_user'               => 'Sửa người dùng',
                'delete_user'             => 'Xóa người dùng',
                'edit_success'            => 'Đã sửa người dùng {0} thành công',
                'profile_edit_success'    => 'Đã sửa hồ sơ thành công',
                'delete_success'          => 'Đã xóa người dùng {0} thành công',
                'change_password_success' => 'Đã đổi mật khẩu thành công',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => 'Lỗi máy chủ không mong muốn',
                'empty'        => 'Trường này là bắt buộc',
            ],
            'login' => [
                'email'         => 'Địa chỉ email không hợp lệ',
                'password'      => 'Mật khẩu không hợp lệ',
                'password_size' => 'Mật khẩu phải có ít nhất 8 ký tự',
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
                'admin'    => 'Quản trị viên',
                'customer' => 'Khách hàng',
            ],
            'statuses' => [
                'inactive' => 'Không hoạt động',
                'active'   => 'Đang hoạt động',
            ],
            'statuses_tags' => [
                'Y' => 'Đang hoạt động',
                'N' => 'Bị động',
            ],
            'days' => [
                'monday'    => 'Thứ Hai',
                'tuesday'   => 'Thứ Ba',
                'wednesday' => 'Thứ Tư',
                'thursday'  => 'Thứ Năm',
                'friday'    => 'Thứ Sáu',
                'saturday'  => 'Thứ Bảy',
                'sunday'    => 'Chủ Nhật',
            ],
            'months' => [
                'january'   => 'Tháng Một',
                'february'  => 'Tháng Hai',
                'march'     => 'Tháng Ba',
                'april'     => 'Tháng Tư',
                'may'       => 'Tháng Năm',
                'june'      => 'Tháng Sáu',
                'july'      => 'Tháng Bảy',
                'august'    => 'Tháng Tám',
                'september' => 'Tháng Chín',
                'october'   => 'Tháng Mười',
                'november'  => 'Tháng Mười Một',
                'december'  => 'Tháng Mười Hai',
            ],
        ],
    ],
];
