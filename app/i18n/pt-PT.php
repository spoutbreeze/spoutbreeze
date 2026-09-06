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
            'description' => 'Sukarix é um framework PHP 8.4+ moderno construído sobre Fat-Free, com encaminhamento, ACL, injeção de dependências, i18n, filas, cache, sessões e padrões prontos para produção.',
            'keywords'    => 'Sukarix, framework PHP, Fat-Free Framework, F3, PHP 8.4, injeção de dependências, ACL, encaminhamento, i18n, filas Redis, framework de código aberto',
            'og_title'       => 'Sukarix - Framework PHP moderno sobre Fat-Free',
            'og_description' => 'Construa aplicações PHP prontas para empresas com uma pequena camada de framework expressiva sobre o Fat-Free.',
            'twitter_title'       => 'Sukarix - Framework PHP moderno sobre Fat-Free',
            'twitter_description' => 'Encaminhamento, ACL, DI, i18n, filas, cache e padrões prontos para produção para aplicações PHP.',
        ],
        'label' => [
            'core' => [
                'email'                 => 'E-mail',
                'password'              => 'Palavra-passe',
                'password_hint'         => 'Palavra-passe (mínimo 8 caracteres)',
                'first_name'            => 'Nome',
                'last_name'             => 'Apelido',
                'back'                  => 'Voltar',
                'submit'                => 'Enviar',
                'confirm'               => 'Aprovar',
                'cancel'                => 'Cancelar',
                'logo'                  => 'Logo',
                'first'                 => 'Primeiro',
                'last'                  => 'Último',
                'actions'               => 'Ações',
                'send_email'            => 'Enviar e-mail',
                'password_confirmation' => 'confirmar palavra-passe',
                'save_password'         => 'guardar palavra-passe',
                'add'                   => 'Adicionar',
                'edit'                  => 'Editar',
                'save'                  => 'Guardar',
                'view_more'             => 'Ver mais...',
                'register'              => 'Registar',
                'id'                    => 'ID',
                'search'                => 'Pesquisar...',
                'sending'               => 'A enviar...',
                'at'                    => 'às',
            ],
            'menu' => [
                'users' => 'Utilizadores',
            ],
            'user' => [
                'users'            => 'Utilizadores',
                'user'             => 'Utilizador',
                'email'            => 'E-mail',
                'role'             => 'Papel',
                'status'           => 'Status',
                'first_name'       => 'Nome',
                'last_name'        => 'Apelido',
                'edit_user'        => 'Editar utilizador',
                'new_user'         => 'Novo utilizador',
                'add_user'         => 'Adicionar utilizador',
                'my_profile'       => 'Meu perfil',
                'new_password'     => 'Nova palavra-passe',
                'reset_password'   => 'Redefinir palavra-passe',
                'current_password' => 'Palavra-passe atual',
                'confirm_password' => 'Confirmar palavra-passe',
                'change_password'  => 'Alterar a minha palavra-passe',
            ],
            'nav' => [
                'home'          => 'Início',
                'documentation' => 'Documentação',
                'features'      => 'Funcionalidades',
                'languages'     => 'Idioma',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => 'A quantidade certa de doçura e eficiência sobre o Fat-Free. Um framework PHP moderno para aplicações empresariais.',
                'cta_primary'   => 'Começar',
                'cta_secondary' => 'Explorar funcionalidades',
            ],
            'intro' => [
                'badge'    => 'Esqueleto do framework',
                'title'    => 'Bem-vindo ao Sukarix',
                'subtitle' => 'O objetivo principal do Sukarix é fornecer aos programadores um framework poderoso e eficiente para criar aplicações PHP de nível empresarial.',
            ],
            'features' => [
                'routing' => [
                    'title'       => 'Encaminhamento & ACL',
                    'description' => 'Funcionalidades avançadas de encaminhamento e lista de controle de acesso garantem gestão de acesso segura e flexível, com política de negação por defeito e autorização por rota.',
                ],
                'queue' => [
                    'title'       => 'Serviço de filas',
                    'description' => 'Uma fila FIFO baseada em Redis com desduplicação e rastreamento de tentativas, otimizada por scripts Lua atómicos para processamento consistente de pipelines.',
                ],
                'di' => [
                    'title'       => 'Injeção de dependências',
                    'description' => 'Um contentor IoC integrado com resolução tipada de serviços e validação rigorosa, promovendo baixo acoplamento e facilitando testes e manutenção.',
                ],
                'enterprise' => [
                    'title'       => 'Pronto para empresas',
                    'description' => 'Projetado para uso empresarial com registo estruturado, tratamento de erros, distribuição de eventos, i18n, proteção CSRF e agendamento de tarefas cron desde o início.',
                ],
                'i18n' => [
                    'title'       => 'Internacionalização',
                    'description' => 'Suporte multilíngue com um formato de dicionário simples, deteção automática de localidade e troca em tempo de execução.',
                ],
            ],
            'cta' => [
                'title'    => 'Pronto para construir?',
                'subtitle' => 'Comece o seu próximo projeto com o Sukarix e entregue mais rápido.',
                'button'   => 'Ler a documentação',
            ],
            'capabilities' => [
                'badge'    => 'Incluído por defeito',
                'title'    => 'Tudo o que um starter de framework deveria mostrar.',
                'subtitle' => 'Um conjunto compacto de essenciais da app para que os programadores entendam instantaneamente o que o Sukarix oferece antes de abrir a documentação.',
                'stat_languages'  => 'Idiomas',
                'stat_foundation' => 'Fundação',
                'typed_actions'      => ['title' => 'Ações tipadas', 'description' => 'Pequenos controladores WebAction que renderizam templates F3 de forma limpa.'],
                'hive_config'        => ['title' => 'Configuração hive do F3', 'description' => 'Configurações baseadas em INI com sobreposições de ambiente previsíveis.'],
                'service_injector'   => ['title' => 'Injetor de serviços', 'description' => 'Resolver serviços reutilizáveis sem conectar dependências pesadas.'],
                'acl_security'       => ['title' => 'Segurança ACL', 'description' => 'Regras de acesso de negação por defeito para proteção de rotas mais segura.'],
                'csrf_sessions'      => ['title' => 'Sessões CSRF', 'description' => 'Tokens baseados em sessão e padrões seguros para fluxos web.'],
                'cache_helpers'      => ['title' => 'Auxiliares de cache', 'description' => 'Lembrar, esquecer e reutilizar dados caros com menos código.'],
                'events'             => ['title' => 'Eventos', 'description' => 'Disparar comportamentos da app sem acoplar fluxos de trabalho.'],
                'cli_actions'        => ['title' => 'Ações CLI', 'description' => 'Construir tarefas de linha de comando usando os mesmos padrões do framework.'],
                'statera_tests'      => ['title' => 'Testes Statera', 'description' => 'Testes leves baseados em cenários projetados para Sukarix.'],
                'phinx_migrations'   => ['title' => 'Migrações Phinx', 'description' => 'Versionar mudanças de banco de dados quando a sua app precisa de persistência.'],
                'structured_logs'    => ['title' => 'Registos estruturados', 'description' => 'Saída com Monolog para requisições web e trabalho CLI.'],
                'translations'       => ['title' => 'Traduções', 'description' => 'Ficheiros de locale e troca em tempo de execução para apps multilíngues.'],
            ],
            'hero_labels' => [
                'badge'           => 'Framework PHP 8.4+ sobre Fat-Free',
                'start_title'     => 'Comece em segundos',
                'start_subtitle'  => 'Instalar, encaminhar, renderizar',
                'queues_title'    => 'Filas',
                'queues_desc'     => 'Pipelines prontos para Redis',
                'security_title'  => 'Segurança',
                'security_desc'   => 'ACL + CSRF + sessões',
            ],
            'features_header' => [
                'badge'    => 'Kit de ferramentas Sukarix',
                'title'    => 'Superfície pequena, poder sério de framework.',
                'subtitle' => 'A app esqueleto deve parecer-se com o framework: focada, expressiva e pronta para produtos reais sem ruído visual.',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => 'Construído sobre o comprovado núcleo do Fat-Free Framework, com o Sukarix a adicionar a camada doce para serviços, estrutura e padrões prontos para produto.',
                'link'        => 'Saber mais',
            ],
            'footer' => [
                'about_title'   => 'Sobre',
                'about_text'    => 'Sukarix é um framework PHP de código aberto construído sobre o Fat-Free.',
                'contact_title' => 'Contacto',
                'follow_title'  => 'Siga-nos',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => 'Entrar',
                'logout'              => 'Sair',
                'delete_confirm'      => 'Deseja continuar?',
                'yes'                 => 'Sim',
                'no'                  => 'Não',
                'cancel'              => 'Cancelar',
                'all_rights_reserved' => 'Todos os direitos reservados',
                'copyright'           => 'Direitos de autor',
                'record_updated'      => 'Registo atualizado',
            ],
            'user' => [
                'login_success'           => 'Bem-vindo de novo {0}!',
                'add_success'             => 'Utilizador adicionado com sucesso',
                'edit_user'               => 'Editar utilizador',
                'delete_user'             => 'Eliminar utilizador',
                'edit_success'            => 'Utilizador {0} editado com sucesso',
                'profile_edit_success'    => 'Perfil editado com sucesso',
                'delete_success'          => 'Utilizador {0} eliminado com sucesso',
                'change_password_success' => 'Palavra-passe alterada com sucesso',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => 'Erro inesperado do servidor',
                'empty'        => 'Este campo é obrigatório',
            ],
            'login' => [
                'email'         => 'Endereço de e-mail inválido',
                'password'      => 'Palavra-passe inválida',
                'password_size' => 'A palavra-passe deve ter pelo menos 8 caracteres',
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
                'inactive' => 'Inativo',
                'active'   => 'Ativo',
            ],
            'statuses_tags' => [
                'Y' => 'Ativo',
                'N' => 'Passivo',
            ],
            'days' => [
                'monday'    => 'Segunda-feira',
                'tuesday'   => 'Terça-feira',
                'wednesday' => 'Quarta-feira',
                'thursday'  => 'Quinta-feira',
                'friday'    => 'Sexta-feira',
                'saturday'  => 'Sábado',
                'sunday'    => 'Domingo',
            ],
            'months' => [
                'january'   => 'Janeiro',
                'february'  => 'Fevereiro',
                'march'     => 'Março',
                'april'     => 'Abril',
                'may'       => 'Maio',
                'june'      => 'Junho',
                'july'      => 'Julho',
                'august'    => 'Agosto',
                'september' => 'Setembro',
                'october'   => 'Outubro',
                'november'  => 'Novembro',
                'december'  => 'Dezembro',
            ],
        ],
    ],
];
