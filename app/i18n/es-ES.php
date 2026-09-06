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
            'title'       => 'Sukarix - Framework PHP moderno sobre Fat-Free',
            'description' => 'Sukarix es un framework PHP 8.4+ moderno construido sobre Fat-Free, con enrutamiento, ACL, inyección de dependencias, i18n, colas, caché, sesiones y valores por defecto listos para producción.',
            'keywords'    => 'Sukarix, framework PHP, Fat-Free Framework, F3, PHP 8.4, inyección de dependencias, ACL, enrutamiento, i18n, colas Redis, framework de código abierto',
            'og_title'       => 'Sukarix - Framework PHP moderno sobre Fat-Free',
            'og_description' => 'Construye aplicaciones PHP listas para empresas con una pequeña capa de framework expresiva sobre Fat-Free.',
            'twitter_title'       => 'Sukarix - Framework PHP moderno sobre Fat-Free',
            'twitter_description' => 'Enrutamiento, ACL, DI, i18n, colas, caché y valores por defecto listos para producción para aplicaciones PHP.',
        ],
        'label' => [
            'core' => [
                'email'                 => 'Correo electrónico',
                'password'              => 'Contraseña',
                'password_hint'         => 'Contraseña (mínimo 8 caracteres)',
                'first_name'            => 'Nombre',
                'last_name'             => 'Apellidos',
                'back'                  => 'Volver',
                'submit'                => 'Enviar',
                'confirm'               => 'Aprobar',
                'cancel'                => 'Cancelar',
                'logo'                  => 'Logotipo',
                'first'                 => 'Primero',
                'last'                  => 'Último',
                'actions'               => 'Acciones',
                'send_email'            => 'Enviar correo',
                'password_confirmation' => 'confirmar contraseña',
                'save_password'         => 'guardar contraseña',
                'add'                   => 'Añadir',
                'edit'                  => 'Editar',
                'save'                  => 'Guardar',
                'view_more'             => 'Ver más...',
                'register'              => 'Registrarse',
                'id'                    => 'ID',
                'search'                => 'Buscar...',
                'sending'               => 'Enviando...',
                'at'                    => 'a las',
            ],
            'menu' => [
                'users' => 'Usuarios',
            ],
            'user' => [
                'users'            => 'Usuarios',
                'user'             => 'Usuario',
                'email'            => 'Correo electrónico',
                'role'             => 'Rol',
                'status'           => 'Estado',
                'first_name'       => 'Nombre',
                'last_name'        => 'Apellidos',
                'edit_user'        => 'Editar usuario',
                'new_user'         => 'Nuevo usuario',
                'add_user'         => 'Añadir usuario',
                'my_profile'       => 'Mi perfil',
                'new_password'     => 'Nueva contraseña',
                'reset_password'   => 'Restablecer contraseña',
                'current_password' => 'Contraseña actual',
                'confirm_password' => 'Confirmar contraseña',
                'change_password'  => 'Cambiar mi contraseña',
            ],
            'nav' => [
                'home'          => 'Inicio',
                'documentation' => 'Documentación',
                'features'      => 'Funciones',
                'languages'     => 'Idioma',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => 'La cantidad justa de dulzura y eficiencia sobre Fat-Free. Un framework PHP moderno para aplicaciones empresariales.',
                'cta_primary'   => 'Empezar',
                'cta_secondary' => 'Explorar funciones',
            ],
            'intro' => [
                'badge'    => 'Esqueleto del framework',
                'title'    => 'Bienvenido a Sukarix',
                'subtitle' => 'El objetivo principal de Sukarix es proporcionar a los desarrolladores un framework potente y eficiente para crear aplicaciones PHP de nivel empresarial.',
            ],
            'features' => [
                'routing' => [
                    'title'       => 'Enrutamiento & ACL',
                    'description' => 'Las capacidades avanzadas de enrutamiento y lista de control de acceso garantizan una gestión de acceso segura y flexible, con una política de denegación por defecto y autorización por ruta.',
                ],
                'queue' => [
                    'title'       => 'Servicio de colas',
                    'description' => 'Una cola FIFO respaldada por Redis con desduplicación y seguimiento de intentos, optimizada con scripts Lua atómicos para un procesamiento de canalizaciones consistente.',
                ],
                'di' => [
                    'title'       => 'Inyección de dependencias',
                    'description' => 'Un contenedor IoC integrado con resolución tipada de servicios y validación estricta que promueve un acoplamiento flexible y facilita las pruebas y el mantenimiento.',
                ],
                'enterprise' => [
                    'title'       => 'Listo para empresas',
                    'description' => 'Diseñado para uso empresarial con registro estructurado, manejo de errores, distribución de eventos, i18n, protección CSRF y programación de tareas cron desde el inicio.',
                ],
                'i18n' => [
                    'title'       => 'Internacionalización',
                    'description' => 'Soporte multilingüe con un formato de diccionario sencillo, detección automática de la configuración regional y cambio en tiempo de ejecución.',
                ],
            ],
            'cta' => [
                'title'    => '¿Listo para construir?',
                'subtitle' => 'Comienza tu próximo proyecto con Sukarix y entrega más rápido.',
                'button'   => 'Leer la documentación',
            ],
            'capabilities' => [
                'badge'    => 'Incluido por defecto',
                'title'    => 'Todo lo que un starter de framework debería mostrar.',
                'subtitle' => 'Un conjunto compacto de elementos esenciales para que los desarrolladores entiendan al instante lo que Sukarix ofrece antes de abrir la documentación.',
                'stat_languages'  => 'Idiomas',
                'stat_foundation' => 'Fundamento',
                'typed_actions'      => ['title' => 'Acciones tipadas', 'description' => 'Controladores WebAction pequeños que renderizan plantillas F3 de forma limpia.'],
                'hive_config'        => ['title' => 'Configuración hive de F3', 'description' => 'Ajustes basados en INI con sobreescrituras de entorno predecibles.'],
                'service_injector'   => ['title' => 'Inyector de servicios', 'description' => 'Resolver servicios reutilizables sin cablear dependencias pesadas.'],
                'acl_security'       => ['title' => 'Seguridad ACL', 'description' => 'Reglas de acceso de denegación por defecto para una protección de rutas más segura.'],
                'csrf_sessions'      => ['title' => 'Sesiones CSRF', 'description' => 'Tokens respaldados por sesión y valores seguros por defecto para flujos web.'],
                'cache_helpers'      => ['title' => 'Ayudantes de caché', 'description' => 'Recordar, olvidar y reutilizar datos costosos con menos código.'],
                'events'             => ['title' => 'Eventos', 'description' => 'Distribuir el comportamiento de la aplicación sin acoplar flujos de trabajo.'],
                'cli_actions'        => ['title' => 'Acciones CLI', 'description' => 'Construir tareas de línea de comandos usando los mismos patrones del framework.'],
                'statera_tests'      => ['title' => 'Pruebas Statera', 'description' => 'Pruebas ligeras basadas en escenarios diseñadas para Sukarix.'],
                'phinx_migrations'   => ['title' => 'Migraciones Phinx', 'description' => 'Versionar cambios de base de datos cuando tu app necesita persistencia.'],
                'structured_logs'    => ['title' => 'Registros estructurados', 'description' => 'Salida potenciada por Monolog para solicitudes web y trabajo CLI.'],
                'translations'       => ['title' => 'Traducciones', 'description' => 'Archivos de locale y cambio en tiempo de ejecución para apps multilingües.'],
            ],
            'hero_labels' => [
                'badge'           => 'Framework PHP 8.4+ sobre Fat-Free',
                'start_title'     => 'Empieza en segundos',
                'start_subtitle'  => 'Instalar, enrutar, renderizar',
                'queues_title'    => 'Colas',
                'queues_desc'     => 'Pipelines listos para Redis',
                'security_title'  => 'Seguridad',
                'security_desc'   => 'ACL + CSRF + sesiones',
            ],
            'features_header' => [
                'badge'    => 'Kit de herramientas Sukarix',
                'title'    => 'Superficie pequeña, potencia seria de framework.',
                'subtitle' => 'La app esqueleto debería sentirse como el framework: enfocado, expresivo y listo para productos reales sin ruido visual.',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => 'Construido sobre el probado núcleo de Fat-Free Framework, con Sukarix añadiendo la capa dulce para servicios, estructura y valores por defecto listos para producto.',
                'link'        => 'Saber más',
            ],
            'footer' => [
                'about_title'   => 'Acerca de',
                'about_text'    => 'Sukarix es un framework PHP de código abierto construido sobre Fat-Free.',
                'contact_title' => 'Contacto',
                'follow_title'  => 'Síguenos',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => 'Iniciar sesión',
                'logout'              => 'Cerrar sesión',
                'delete_confirm'      => '¿Desea continuar?',
                'yes'                 => 'Sí',
                'no'                  => 'No',
                'cancel'              => 'Cancelar',
                'all_rights_reserved' => 'Todos los derechos reservados',
                'copyright'           => 'Derechos de autor',
                'record_updated'      => 'Registro actualizado',
            ],
            'user' => [
                'login_success'           => '¡Bienvenido de nuevo {0}!',
                'add_success'             => 'Usuario añadido correctamente',
                'edit_user'               => 'Editar usuario',
                'delete_user'             => 'Eliminar usuario',
                'edit_success'            => 'Usuario {0} editado correctamente',
                'profile_edit_success'    => 'Perfil editado correctamente',
                'delete_success'          => 'Usuario {0} eliminado correctamente',
                'change_password_success' => 'Contraseña cambiada correctamente',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => 'Error inesperado del servidor',
                'empty'        => 'Este campo es obligatorio',
            ],
            'login' => [
                'email'         => 'Dirección de correo no válida',
                'password'      => 'Contraseña no válida',
                'password_size' => 'La contraseña debe tener al menos 8 caracteres',
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
                'admin'    => 'Administrador',
                'customer' => 'Cliente',
            ],
            'statuses' => [
                'inactive' => 'Inactivo',
                'active'   => 'Activo',
            ],
            'statuses_tags' => [
                'Y' => 'Activo',
                'N' => 'Pasivo',
            ],
            'days' => [
                'monday'    => 'Lunes',
                'tuesday'   => 'Martes',
                'wednesday' => 'Miércoles',
                'thursday'  => 'Jueves',
                'friday'    => 'Viernes',
                'saturday'  => 'Sábado',
                'sunday'    => 'Domingo',
            ],
            'months' => [
                'january'   => 'Enero',
                'february'  => 'Febrero',
                'march'     => 'Marzo',
                'april'     => 'Abril',
                'may'       => 'Mayo',
                'june'      => 'Junio',
                'july'      => 'Julio',
                'august'    => 'Agosto',
                'september' => 'Septiembre',
                'october'   => 'Octubre',
                'november'  => 'Noviembre',
                'december'  => 'Diciembre',
            ],
        ],
    ],
];
