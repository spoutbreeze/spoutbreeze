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
            'title'       => 'Sukarix - Framework PHP moderne sur Fat-Free',
            'description' => 'Sukarix est un framework PHP 8.4+ moderne construit sur Fat-Free, avec routage, ACL, injection de dépendances, i18n, files d\'attente, cache, sessions et valeurs par défaut prêtes pour la production.',
            'keywords'    => 'Sukarix, framework PHP, Fat-Free Framework, F3, PHP 8.4, injection de dépendances, ACL, routage, i18n, files d\'attente Redis, framework open source',
            'og_title'       => 'Sukarix - Framework PHP moderne sur Fat-Free',
            'og_description' => 'Construisez des applications PHP prêtes pour l\'entreprise avec une petite couche de framework expressive au-dessus de Fat-Free.',
            'twitter_title'       => 'Sukarix - Framework PHP moderne sur Fat-Free',
            'twitter_description' => 'Routage, ACL, DI, i18n, files d\'attente, cache et valeurs par défaut prêtes pour la production pour les applications PHP.',
        ],
        'label' => [
            'core' => [
                'email'                 => 'E-mail',
                'password'              => 'Mot de passe',
                'password_hint'         => 'Mot de passe (8 caractères minimum)',
                'first_name'            => 'Prénom',
                'last_name'             => 'Nom',
                'back'                  => 'Retour',
                'submit'                => 'Envoyer',
                'confirm'               => 'Approuver',
                'cancel'                => 'Annuler',
                'logo'                  => 'Logo',
                'first'                 => 'Premier',
                'last'                  => 'Dernier',
                'actions'               => 'Actions',
                'send_email'            => 'Envoyer un e-mail',
                'password_confirmation' => 'confirmer le mot de passe',
                'save_password'         => 'enregistrer le mot de passe',
                'add'                   => 'Ajouter',
                'edit'                  => 'Modifier',
                'save'                  => 'Enregistrer',
                'view_more'             => 'Voir plus...',
                'register'              => 'S\'inscrire',
                'id'                    => 'ID',
                'search'                => 'Rechercher...',
                'sending'               => 'Envoi en cours...',
                'at'                    => 'à',
            ],
            'menu' => [
                'users' => 'Utilisateurs',
            ],
            'user' => [
                'users'            => 'Utilisateurs',
                'user'             => 'Utilisateur',
                'email'            => 'E-mail',
                'role'             => 'Rôle',
                'status'           => 'Statut',
                'first_name'       => 'Prénom',
                'last_name'        => 'Nom',
                'edit_user'        => 'Modifier l\'utilisateur',
                'new_user'         => 'Nouvel utilisateur',
                'add_user'         => 'Ajouter un utilisateur',
                'my_profile'       => 'Mon profil',
                'new_password'     => 'Nouveau mot de passe',
                'reset_password'   => 'Réinitialiser le mot de passe',
                'current_password' => 'Mot de passe actuel',
                'confirm_password' => 'Confirmer le mot de passe',
                'change_password'  => 'Changer mon mot de passe',
            ],
            'nav' => [
                'home'          => 'Accueil',
                'documentation' => 'Documentation',
                'features'      => 'Fonctionnalités',
                'languages'     => 'Langue',
            ],
            'hero' => [
                'title'         => 'Sukarix',
                'subtitle'      => 'La juste dose de douceur et d\'efficacité sur Fat-Free. Un framework PHP moderne pour les applications d\'entreprise.',
                'cta_primary'   => 'Commencer',
                'cta_secondary' => 'Explorer les fonctionnalités',
            ],
            'intro' => [
                'badge'    => 'Framework skeleton',
                'title'    => 'Bienvenue sur Sukarix',
                'subtitle' => 'L\'objectif principal de Sukarix est de fournir aux développeurs un framework puissant et efficace pour créer des applications PHP de niveau entreprise.',
            ],
            'features' => [
                'routing' => [
                    'title'       => 'Routage & ACL',
                    'description' => 'Des capacités avancées de routage et de liste de contrôle d\'accès garantissent une gestion des accès sécurisée et flexible, avec une politique de refus par défaut et une autorisation par route.',
                ],
                'queue' => [
                    'title'       => 'Service de files d\'attente',
                    'description' => 'Une file FIFO basée sur Redis avec déduplication et suivi des tentatives, optimisée par des scripts Lua atomiques pour un traitement cohérent des pipelines.',
                ],
                'di' => [
                    'title'       => 'Injection de dépendances',
                    'description' => 'Un conteneur IoC intégré avec résolution typée des services et validation stricte, favorisant un couplage faible et un code facile à tester.',
                ],
                'enterprise' => [
                    'title'       => 'Prêt pour l\'entreprise',
                    'description' => 'Conçu pour l\'entreprise avec journalisation structurée, gestion des erreurs, distribution d\'événements, i18n, protection CSRF et planification de tâches cron intégrées.',
                ],
                'i18n' => [
                    'title'       => 'Internationalisation',
                    'description' => 'Prise en charge multilingue avec un format de dictionnaire simple, détection automatique de la locale et basculement à l\'exécution.',
                ],
            ],
            'cta' => [
                'title'    => 'Prêt à construire ?',
                'subtitle' => 'Démarrez votre prochain projet avec Sukarix et livrez plus rapidement.',
                'button'   => 'Lire la documentation',
            ],
            'capabilities' => [
                'badge'    => 'Inclus par défaut',
                'title'    => 'Tout ce qu\'un démarreur de framework devrait montrer.',
                'subtitle' => 'Un ensemble compact d\'essentiels d\'application pour que les développeurs comprennent instantanément ce que Sukarix leur offre avant d\'ouvrir la documentation.',
                'stat_languages'  => 'Languages',
                'stat_foundation' => 'Foundation',
                'typed_actions'      => ['title' => 'Actions typées', 'description' => 'De petits contrôleurs WebAction qui rendent proprement les templates F3.'],
                'hive_config'        => ['title' => 'Configuration hive F3', 'description' => 'Paramètres pilotés par INI avec des surcharges d\'environnement prévisibles.'],
                'service_injector'   => ['title' => 'Injecteur de services', 'description' => 'Résoudre des services réutilisables sans câbler de lourdes dépendances.'],
                'acl_security'       => ['title' => 'Sécurité ACL', 'description' => 'Règles d\'accès par refus par défaut pour une protection des routes plus sûre.'],
                'csrf_sessions'      => ['title' => 'CSRF & sessions', 'description' => 'Jetons basés sur les sessions et valeurs sécurisées par défaut pour les flux web.'],
                'cache_helpers'      => ['title' => 'Aides au cache', 'description' => 'Mémoriser, oublier et réutiliser des données coûteuses avec moins de code.'],
                'events'             => ['title' => 'Événements', 'description' => 'Déclencher des comportements d\'application sans coupler les flux de travail entre eux.'],
                'cli_actions'        => ['title' => 'Actions CLI', 'description' => 'Créer des tâches en ligne de commande en utilisant les mêmes modèles du framework.'],
                'statera_tests'      => ['title' => 'Tests Statera', 'description' => 'Tests légers basés sur des scénarios, conçus pour Sukarix.'],
                'phinx_migrations'   => ['title' => 'Migrations Phinx', 'description' => 'Versionner les changements de base de données lorsque votre application a besoin de persistance.'],
                'structured_logs'    => ['title' => 'Logs structurés', 'description' => 'Sortie alimentée par Monolog pour les requêtes web et le travail en CLI.'],
                'translations'       => ['title' => 'Traductions', 'description' => 'Fichiers de locale et basculement à l\'exécution pour des applications multilingues.'],
            ],
            'hero_labels' => [
                'badge'           => 'Framework PHP 8.4+ sur Fat-Free',
                'start_title'     => 'Démarrez en quelques secondes',
                'start_subtitle'  => 'Installer, router, rendre',
                'queues_title'    => 'Files d\'attente',
                'queues_desc'     => 'Pipelines prêts pour Redis',
                'security_title'  => 'Sécurité',
                'security_desc'   => 'ACL + CSRF + sessions',
            ],
            'features_header' => [
                'badge'    => 'Boîte à outils Sukarix',
                'title'    => 'Petite surface, vraie puissance de framework.',
                'subtitle' => 'L\'application squelette devrait ressembler au framework : focalisée, expressive et prête pour de vrais produits sans bruit visuel.',
            ],
            'features_f3' => [
                'title'       => 'Fat-Free 3.9',
                'description' => 'Construit sur le cœur éprouvé du Fat-Free Framework, avec Sukarix ajoutant la couche agréable pour les services, la structure et les valeurs par défaut prêtes pour la production.',
                'link'        => 'En savoir plus',
            ],
            'footer' => [
                'about_title'   => 'À propos',
                'about_text'    => 'Sukarix est un framework PHP open source construit sur Fat-Free.',
                'contact_title' => 'Contact',
                'follow_title'  => 'Suivez-nous',
            ],
        ],
        'message' => [
            'core' => [
                'login'               => 'Me connecter',
                'logout'              => 'Déconnexion',
                'delete_confirm'      => 'Voulez-vous continuer ?',
                'yes'                 => 'Oui',
                'no'                  => 'Non',
                'cancel'              => 'Annuler',
                'all_rights_reserved' => 'Tous droits réservés',
                'copyright'           => 'Copyright',
                'record_updated'      => 'Enregistrement mis à jour',
            ],
            'user' => [
                'login_success'           => 'Bon retour {0} !',
                'add_success'             => 'Utilisateur ajouté avec succès',
                'edit_user'               => 'Modifier l\'utilisateur',
                'delete_user'             => 'Supprimer l\'utilisateur',
                'edit_success'            => 'Utilisateur {0} modifié avec succès',
                'profile_edit_success'    => 'Profil modifié avec succès',
                'delete_success'          => 'Utilisateur {0} supprimé avec succès',
                'change_password_success' => 'Mot de passe changé avec succès',
            ],
        ],
        'error' => [
            'core' => [
                'server_error' => 'Erreur serveur inattendue',
                'empty'        => 'Ce champ est requis',
            ],
            'login' => [
                'email'         => 'Adresse e-mail invalide',
                'password'      => 'Mot de passe invalide',
                'password_size' => 'Le mot de passe doit comporter au moins 8 caractères',
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
                'admin'    => 'Administrateur',
                'customer' => 'Client',
            ],
            'statuses' => [
                'inactive' => 'Inactif',
                'active'   => 'Actif',
            ],
            'statuses_tags' => [
                'Y' => 'Actif',
                'N' => 'Passif',
            ],
            'days' => [
                'monday'    => 'Lundi',
                'tuesday'   => 'Mardi',
                'wednesday' => 'Mercredi',
                'thursday'  => 'Jeudi',
                'friday'    => 'Vendredi',
                'saturday'  => 'Samedi',
                'sunday'    => 'Dimanche',
            ],
            'months' => [
                'january'   => 'Janvier',
                'february'  => 'Février',
                'march'     => 'Mars',
                'april'     => 'Avril',
                'may'       => 'Mai',
                'june'      => 'Juin',
                'july'      => 'Juillet',
                'august'    => 'Août',
                'september' => 'Septembre',
                'october'   => 'Octobre',
                'november'  => 'Novembre',
                'december'  => 'Décembre',
            ],
        ],
    ],
];
