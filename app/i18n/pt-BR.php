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
            'description' => 'Sukarix é um framework PHP 8.4+ moderno construído sobre Fat-Free, com roteamento, ACL, injeção de dependências, i18n, filas, cache, sessões e padrões prontos para produção.',
            'keywords'    => 'Sukarix, framework PHP, Fat-Free Framework, F3, PHP 8.4, injeção de dependências, ACL, roteamento, i18n, filas Redis, framework de código aberto',
            'og_title'       => 'Sukarix - Framework PHP moderno sobre Fat-Free',
            'og_description' => 'Construa aplicações PHP prontas para empresas com uma pequena camada de framework expressiva sobre o Fat-Free.',
            'twitter_title'       => 'Sukarix - Framework PHP moderno sobre Fat-Free',
            'twitter_description' => 'Roteamento, ACL, DI, i18n, filas, cache e padrões prontos para produção para aplicações PHP.',
        ],
        'label' => [
            'core' => [
                'email'                 => 'E-mail',
                'password'              => 'Senha',
                'password_hint'         => 'Senha (mínimo 8 caracteres)',
                'first_name'            => 'Nome',
                'last_name'             => 'Sobrenome',
                'back'                  => 'Voltar',
                'submit'                => 'Enviar',
                'confirm'               => 'Aprovar',
                'cancel'                => 'Cancelar',
                'logo'                  => 'Logo',
                'first'                 => 'Primeiro',
                'last'                  => 'Último',
                'actions'               => 'Ações',
                'send_email'            => 'Enviar e-mail',
                'password_confirmation' => 'confirmar senha',
                'save_password'         => 'salvar senha',
                'add'                   => 'Adicionar',
                'edit'                  => 'Editar',
                'save'                  => 'Salvar',
                'view_more'             => 'Ver mais...',
                'register'              => 'Registrar-se',
                'id'                    => 'ID',
                'search'                => 'Pesquisar...',
                'sending'               => 'Enviando...',
                'at'                    => 'às',
            ],
            'menu' => [
                'users' => 'Usuários',
            ],
            'user' => [
                'users'            => 'Usuários',
                'user'             => 'Usuário',
                'email'            => 'E-mail',
                'role'             => 'Papel',
                'status'           => 'Status',
                'first_name'       => 'Nome',
                'last_name'        => 'Sobrenome',
                'edit_user'        => 'Editar usuário',
                'new_user'         => 'Novo usuário',
                'add_user'         => 'Adicionar usuário',
                'my_profile'       => 'Meu perfil',
                'new_password'     => 'Nova senha',
                'reset_password'   => 'Redefinir senha',
                'current_password' => 'Senha atual',
                'confirm_password' => 'Confirmar senha',
                'change_password'  => 'Alterar minha senha',
            ],
            'nav' => [
                'home'          => 'Início',
                'documentation' => 'Documentação',
                'features'      => 'Recursos',
                'languages'     => 'Idioma',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => 'A quantidade certa de doçura e eficiência sobre o Fat-Free. Um framework PHP moderno para aplicações empresariais.',
                'cta_primary'   => 'Começar',
                'cta_secondary' => 'Explorar recursos',
            ],
            'intro' => [
                'badge'    => 'Esqueleto do framework',
                'title'    => 'Bem-vindo ao Sukarix',
                'subtitle' => 'O objetivo principal do Sukarix é fornecer aos desenvolvedores um framework poderoso e eficiente para criar aplicações PHP de nível empresarial.',
            ],
            'features' => [
                'routing' => [
                    'title'       => 'Roteamento & ACL',
                    'description' => 'Recursos avançados de roteamento e lista de controle de acesso garantem gerenciamento de acesso seguro e flexível, com política de negação por padrão e autorização por rota.',
                ],
                'queue' => [
                    'title'       => 'Serviço de filas',
                    'description' => 'Uma fila FIFO baseada em Redis com desduplicação e rastreamento de tentativas, otimizada por scripts Lua atômicos para processamento consistente de pipelines.',
                ],
                'di' => [
                    'title'       => 'Injeção de dependências',
                    'description' => 'Um contêiner IoC integrado com resolução tipada de serviços e validação rigorosa, promovendo baixo acoplamento e facilitando testes e manutenção.',
                ],
                'enterprise' => [
                    'title'       => 'Pronto para empresas',
                    'description' => 'Projetado para uso empresarial com registro estruturado, tratamento de erros, distribuição de eventos, i18n, proteção CSRF e agendamento de tarefas cron desde o início.',
                ],
                'i18n' => [
                    'title'       => 'Internacionalização',
                    'description' => 'Suporte multilíngue com um formato de dicionário simples, detecção automática de localidade e troca em tempo de execução.',
                ],
            ],
            'cta' => [
                'title'    => 'Pronto para construir?',
                'subtitle' => 'Comece seu próximo projeto com o Sukarix e entregue mais rápido.',
                'button'   => 'Ler a documentação',
            ],
            'capabilities' => [
                'badge'    => 'Incluso por padrão',
                'title'    => 'Tudo o que um starter de framework deveria mostrar.',
                'subtitle' => 'Um conjunto compacto de essenciais do app para que desenvolvedores entendam instantaneamente o que o Sukarix oferece antes de abrir a documentação.',
                'stat_languages'  => 'Idiomas',
                'stat_foundation' => 'Fundação',
                'typed_actions'      => ['title' => 'Ações tipadas', 'description' => 'Pequenos controladores WebAction que renderizam templates F3 de forma limpa.'],
                'hive_config'        => ['title' => 'Configuração hive do F3', 'description' => 'Configurações baseadas em INI com sobreposições de ambiente previsíveis.'],
                'service_injector'   => ['title' => 'Injetor de serviços', 'description' => 'Resolver serviços reutilizáveis sem conectar dependências pesadas.'],
                'acl_security'       => ['title' => 'Segurança ACL', 'description' => 'Regras de acesso de negação por padrão para proteção de rotas mais segura.'],
                'csrf_sessions'      => ['title' => 'Sessões CSRF', 'description' => 'Tokens baseados em sessão e padrões seguros para fluxos web.'],
                'cache_helpers'      => ['title' => 'Auxiliares de cache', 'description' => 'Lembrar, esquecer e reutilizar dados caros com menos código.'],
                'events'             => ['title' => 'Eventos', 'description' => 'Disparar comportamentos do app sem acoplar fluxos de trabalho.'],
                'cli_actions'        => ['title' => 'Ações CLI', 'description' => 'Construir tarefas de linha de comando usando os mesmos padrões do framework.'],
                'statera_tests'      => ['title' => 'Testes Statera', 'description' => 'Testes leves baseados em cenários projetados para Sukarix.'],
                'phinx_migrations'   => ['title' => 'Migrações Phinx', 'description' => 'Versionar mudanças de banco de dados quando seu app precisa de persistência.'],
                'structured_logs'    => ['title' => 'Logs estruturados', 'description' => 'Saída com Monolog para requisições web e trabalho CLI.'],
                'translations'       => ['title' => 'Traduções', 'description' => 'Arquivos de locale e troca em tempo de execução para apps multilíngues.'],
            ],
            'hero_labels' => [
                'badge'           => 'Framework PHP 8.4+ sobre Fat-Free',
                'start_title'     => 'Comece em segundos',
                'start_subtitle'  => 'Instalar, rotear, renderizar',
                'queues_title'    => 'Filas',
                'queues_desc'     => 'Pipelines prontos para Redis',
                'security_title'  => 'Segurança',
                'security_desc'   => 'ACL + CSRF + sessões',
            ],
            'features_header' => [
                'badge'    => 'Kit de ferramentas Sukarix',
                'title'    => 'Superfície pequena, poder sério de framework.',
                'subtitle' => 'O app esqueleto deve parecer com o framework: focado, expressivo e pronto para produtos reais sem ruído visual.',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => 'Construído sobre o comprovado núcleo do Fat-Free Framework, com o Sukarix adicionando a camada doce para serviços, estrutura e padrões prontos para produto.',
                'link'        => 'Saiba mais',
            ],
            'footer' => [
                'about_title'   => 'Sobre',
                'about_text'    => 'Sukarix é um framework PHP de código aberto construído sobre o Fat-Free.',
                'contact_title' => 'Contato',
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
                'copyright'           => 'Direitos autorais',
                'record_updated'      => 'Registro atualizado',
            ],
            'user' => [
                'login_success'           => 'Bem-vindo de volta {0}!',
                'add_success'             => 'Usuário adicionado com sucesso',
                'edit_user'               => 'Editar usuário',
                'delete_user'             => 'Excluir usuário',
                'edit_success'            => 'Usuário {0} editado com sucesso',
                'profile_edit_success'    => 'Perfil editado com sucesso',
                'delete_success'          => 'Usuário {0} excluído com sucesso',
                'change_password_success' => 'Senha alterada com sucesso',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => 'Erro inesperado do servidor',
                'empty'        => 'Este campo é obrigatório',
            ],
            'login' => [
                'email'         => 'Endereço de e-mail inválido',
                'password'      => 'Senha inválida',
                'password_size' => 'A senha deve ter pelo menos 8 caracteres',
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
