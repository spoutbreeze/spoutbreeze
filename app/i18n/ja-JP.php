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
            'title'       => 'Sukarix - Fat-Free 上のモダン PHP フレームワーク',
            'description' => 'Sukarix は Fat-Free 上に構築されたモダンな PHP 8.4+ フレームワークで、ルーティング、ACL、依存性注入、i18n、キュー、キャッシュ、セッション、本番対応のデフォルト設定を備えています。',
            'keywords'    => 'Sukarix, PHP フレームワーク, Fat-Free Framework, F3, PHP 8.4, 依存性注入, ACL, ルーティング, i18n, Redis キュー, オープンソースフレームワーク',
            'og_title'       => 'Sukarix - Fat-Free 上のモダン PHP フレームワーク',
            'og_description' => 'Fat-Free の上に小さく表現力豊かなフレームワークレイヤーを構築し、エンタープライズ対応の PHP アプリケーションを開発しましょう。',
            'twitter_title'       => 'Sukarix - Fat-Free 上のモダン PHP フレームワーク',
            'twitter_description' => 'PHP アプリケーション向けのルーティング、ACL、DI、i18n、キュー、キャッシュ、本番対応のデフォルト設定。',
        ],
        'label' => [
            'core' => [
                'email'                 => 'メールアドレス',
                'password'              => 'パスワード',
                'password_hint'         => 'パスワード（最低8文字）',
                'first_name'            => '名',
                'last_name'             => '姓',
                'back'                  => '戻る',
                'submit'                => '送信',
                'confirm'               => '承認',
                'cancel'                => 'キャンセル',
                'logo'                  => 'ロゴ',
                'first'                 => '最初',
                'last'                  => '最後',
                'actions'               => 'アクション',
                'send_email'            => 'メールを送信',
                'password_confirmation' => 'パスワード確認',
                'save_password'         => 'パスワードを保存',
                'add'                   => '追加',
                'edit'                  => '編集',
                'save'                  => '保存',
                'view_more'             => 'さらに表示...',
                'register'              => '登録',
                'id'                    => 'ID',
                'search'                => '検索...',
                'sending'               => '送信中...',
                'at'                    => ' ',
            ],
            'menu' => [
                'users' => 'ユーザー',
            ],
            'user' => [
                'users'            => 'ユーザー',
                'user'             => 'ユーザー',
                'email'            => 'メールアドレス',
                'role'             => 'ロール',
                'status'           => 'ステータス',
                'first_name'       => '名',
                'last_name'        => '姓',
                'edit_user'        => 'ユーザーを編集',
                'new_user'         => '新規ユーザー',
                'add_user'         => 'ユーザーを追加',
                'my_profile'       => 'マイプロフィール',
                'new_password'     => '新しいパスワード',
                'reset_password'   => 'パスワードをリセット',
                'current_password' => '現在のパスワード',
                'confirm_password' => 'パスワード確認',
                'change_password'  => 'パスワードを変更',
            ],
            'nav' => [
                'home'          => 'ホーム',
                'documentation' => 'ドキュメント',
                'features'      => '機能',
                'languages'     => '言語',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => 'Fat-Free の上に適度な甘さと効率性。エンタープライズアプリケーション向けのモダンな PHP フレームワーク。',
                'cta_primary'   => 'はじめる',
                'cta_secondary' => '機能を見る',
            ],
            'intro' => [
                'badge'    => 'フレームワークスケルトン',
                'title'    => 'Sukarix へようこそ',
                'subtitle' => 'Sukarix の主な目的は、エンタープライズレベルの PHP アプリケーションを構築するための強力で効率的なフレームワークを開発者に提供することです。',
            ],
            'features' => [
                'routing' => [
                    'title'       => 'ルーティング & ACL',
                    'description' => '高度なルーティングとアクセス制御リスト機能により、デフォルト拒否ポリシーとルートごとの認証で、アプリケーションに安全で柔軟なアクセス管理を提供します。',
                ],
                'queue' => [
                    'title'       => 'キューサービス',
                    'description' => 'Redis ベースの FIFO キューで、重複排除と試行追跡を備え、アトミックな Lua スクリプトによりワーカー間で一貫したパイプライン処理を実現します。',
                ],
                'di' => [
                    'title'       => '依存性注入',
                    'description' => '型付きサービス解決と厳密な検証を備えた組み込みの IoC コンテナで、疎結合を促進し、コードのテストと保守を容易にします。',
                ],
                'enterprise' => [
                    'title'       => 'エンタープライズ対応',
                    'description' => '構造化ログ、エラー処理、イベントディスパッチ、i18n、CSRF 保護、cron ジョブスケジューリングを最初から組み込んだエンタープライズ向け設計。',
                ],
                'i18n' => [
                    'title'       => '国際化',
                    'description' => 'シンプルな辞書形式による多言語サポート、自動ロケール検出、依存関係の再読み込みなしのランタイム切り替え。',
                ],
            ],
            'cta' => [
                'title'    => '構築の準備はできましたか？',
                'subtitle' => 'Sukarix で次のプロジェクトを始めて、より早く出荷しましょう。',
                'button'   => 'ドキュメントを読む',
            ],
            'capabilities' => [
                'badge'    => 'デフォルトで含まれる機能',
                'title'    => 'フレームワークスターターが示すべきすべての機能。',
                'subtitle' => '開発者がドキュメントを開く前に Sukarix が提供する機能をすぐに理解できるよう、アプリの必需品をコンパクトにまとめたスタック。',
                'stat_languages'  => '言語',
                'stat_foundation' => '基盤',
                'typed_actions'      => ['title' => '型付きアクション', 'description' => 'F3 テンプレートをきれいにレンダリングする小さな WebAction コントローラー。'],
                'hive_config'        => ['title' => 'F3 ハイブ設定', 'description' => '予測可能な環境オーバーライドを備えた INI 駆動の設定。'],
                'service_injector'   => ['title' => 'サービスインジェクター', 'description' => '重い依存関係の配線なしで再利用可能なサービスを解決。'],
                'acl_security'       => ['title' => 'ACL セキュリティ', 'description' => 'より安全なルート保護のためのデフォルト拒否アクセスルール。'],
                'csrf_sessions'      => ['title' => 'CSRF セッション', 'description' => 'セッションベースのトークンとウェブフロー向けのセキュアなデフォルト設定。'],
                'cache_helpers'      => ['title' => 'キャッシュヘルパー', 'description' => '少ないコードで高コストなデータを記憶、破棄、再利用。'],
                'events'             => ['title' => 'イベント', 'description' => 'ワークフローを結合せずにアプリの動作をディスパッチ。'],
                'cli_actions'        => ['title' => 'CLI アクション', 'description' => '同じフレームワークパターンを使用してコマンドラインタスクを構築。'],
                'statera_tests'      => ['title' => 'Statera テスト', 'description' => 'Sukarix 向けに設計された軽量なシナリオベースのテスト。'],
                'phinx_migrations'   => ['title' => 'Phinx マイグレーション', 'description' => 'アプリが永続化を必要とする際にデータベース変更をバージョン管理。'],
                'structured_logs'    => ['title' => '構造化ログ', 'description' => 'ウェブリクエストと CLI 作業向けの Monolog 駆動の出力。'],
                'translations'       => ['title' => '翻訳', 'description' => '多言語アプリ向けのロケールファイルとランタイム切り替え。'],
            ],
            'hero_labels' => [
                'badge'           => 'Fat-Free 上の PHP 8.4+ フレームワーク',
                'start_title'     => '数秒で開始',
                'start_subtitle'  => 'インストール、ルーティング、レンダリング',
                'queues_title'    => 'キュー',
                'queues_desc'     => 'Redis 対応パイプライン',
                'security_title'  => 'セキュリティ',
                'security_desc'   => 'ACL + CSRF + セッション',
            ],
            'features_header' => [
                'badge'    => 'Sukarix ツールキット',
                'title'    => '小さな表面、本格的なフレームワークの力。',
                'subtitle' => 'スケルトンアプリはフレームワークのように感じられるべきです：集中し、表現力豊かで、視覚的なノイズなしに本物の製品に対応できるもの。',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => '実績のある Fat-Free Framework コア上に構築され、Sukarix がサービス、構造、本番対応のデフォルト設定のためのスイートレイヤーを追加しています。',
                'link'        => '詳細を見る',
            ],
            'footer' => [
                'about_title'   => '概要',
                'about_text'    => 'Sukarix は Fat-Free 上に構築されたオープンソースの PHP フレームワークです。',
                'contact_title' => 'お問い合わせ',
                'follow_title'  => 'フォローする',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => 'ログイン',
                'logout'              => 'ログアウト',
                'delete_confirm'      => '続行しますか？',
                'yes'                 => 'はい',
                'no'                  => 'いいえ',
                'cancel'              => 'キャンセル',
                'all_rights_reserved' => '全著作権所有',
                'copyright'           => '著作権',
                'record_updated'      => 'レコードが更新されました',
            ],
            'user' => [
                'login_success'           => 'おかえりなさい {0}！',
                'add_success'             => 'ユーザーが正常に追加されました',
                'edit_user'               => 'ユーザーを編集',
                'delete_user'             => 'ユーザーを削除',
                'edit_success'            => 'ユーザー {0} が正常に編集されました',
                'profile_edit_success'    => 'プロフィールが正常に編集されました',
                'delete_success'          => 'ユーザー {0} が正常に削除されました',
                'change_password_success' => 'パスワードが正常に変更されました',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => '予期しないサーバーエラー',
                'empty'        => 'この項目は必須です',
            ],
            'login' => [
                'email'         => '無効なメールアドレス',
                'password'      => '無効なパスワード',
                'password_size' => 'パスワードは最低8文字必要です',
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
                'admin'    => '管理者',
                'customer' => '顧客',
            ],
            'statuses' => [
                'inactive' => '非アクティブ',
                'active'   => 'アクティブ',
            ],
            'statuses_tags' => [
                'Y' => 'アクティブ',
                'N' => '非アクティブ',
            ],
            'days' => [
                'monday'    => '月曜日',
                'tuesday'   => '火曜日',
                'wednesday' => '水曜日',
                'thursday'  => '木曜日',
                'friday'    => '金曜日',
                'saturday'  => '土曜日',
                'sunday'    => '日曜日',
            ],
            'months' => [
                'january'   => '1月',
                'february'  => '2月',
                'march'     => '3月',
                'april'     => '4月',
                'may'       => '5月',
                'june'      => '6月',
                'july'      => '7月',
                'august'    => '8月',
                'september' => '9月',
                'october'   => '10月',
                'november'  => '11月',
                'december'  => '12月',
            ],
        ],
    ],
];
