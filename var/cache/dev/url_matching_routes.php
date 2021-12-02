<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/employe' => [[['_route' => 'employe', '_controller' => 'App\\Controller\\EmployeController::index'], null, null, null, false, false, null]],
        '/employeAjout' => [[['_route' => 'app_employeAjout', '_controller' => 'App\\Controller\\EmployeController::AjoutEmploye'], null, null, null, true, false, null]],
        '/employeAjoutHash' => [[['_route' => 'app_employeAjoutHash', '_controller' => 'App\\Controller\\EmployeController::registration'], null, null, null, true, false, null]],
        '/employeAuth' => [[['_route' => 'app_employeAuth', '_controller' => 'App\\Controller\\EmployeController::authEmploye'], null, null, null, true, false, null]],
        '/formationAff' => [[['_route' => 'app_formationAff', '_controller' => 'App\\Controller\\EmployeController::formationAff'], null, null, null, true, false, null]],
        '/formation' => [[['_route' => 'formation', '_controller' => 'App\\Controller\\FormationController::index'], null, null, null, false, false, null]],
        '/formationAjout' => [[['_route' => 'app_formationAjout', '_controller' => 'App\\Controller\\FormationController::AjoutFormation'], null, null, null, true, false, null]],
        '/gererFormation' => [[['_route' => 'app_gererFormation', '_controller' => 'App\\Controller\\FormationController::GererFormation'], null, null, null, false, false, null]],
        '/inscription' => [[['_route' => 'inscription', '_controller' => 'App\\Controller\\InscriptionController::index'], null, null, null, false, false, null]],
        '/inscriptionAjout' => [[['_route' => 'app_inscriptionAjout', '_controller' => 'App\\Controller\\InscriptionController::AjoutInscription'], null, null, null, true, false, null]],
        '/gestionInscription' => [[['_route' => 'app_gestion_inscription', '_controller' => 'App\\Controller\\InscriptionController::GestionInscription'], null, null, null, false, false, null]],
        '/accepteInscription' => [[['_route' => 'app_accepte_Inscription', '_controller' => 'App\\Controller\\InscriptionController::AccepteInscription'], null, null, null, false, false, null]],
        '/refuseInscription' => [[['_route' => 'app_refuse_Inscription', '_controller' => 'App\\Controller\\InscriptionController::RefuseInscription'], null, null, null, false, false, null]],
        '/produit' => [[['_route' => 'produit', '_controller' => 'App\\Controller\\ProduitController::index'], null, null, null, false, false, null]],
        '/produitAjout' => [[['_route' => 'app_produitAjout', '_controller' => 'App\\Controller\\ProduitController::AjoutProduit'], null, null, null, true, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|wdt/([^/]++)(*:24)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:69)'
                            .'|router(*:82)'
                            .'|exception(?'
                                .'|(*:101)'
                                .'|\\.css(*:114)'
                            .')'
                        .')'
                        .'|(*:124)'
                    .')'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:159)'
                .')'
                .'|/inscriptionEmployeFormation/([^/]++)(*:205)'
                .'|/supprimer(?'
                    .'|Formation/([^/]++)(*:244)'
                    .'|Inscription/([^/]++)(*:272)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        24 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        69 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        82 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        101 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        114 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        124 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        159 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        205 => [[['_route' => 'app_inscriptionEmployeFormation', '_controller' => 'App\\Controller\\EmployeController::inscriptionEmployeFormation'], ['id'], null, null, false, true, null]],
        244 => [[['_route' => 'app_supp_formation', '_controller' => 'App\\Controller\\FormationController::SupprimerFormation'], ['id'], null, null, false, true, null]],
        272 => [
            [['_route' => 'app_supp_inscription', '_controller' => 'App\\Controller\\InscriptionController::SupprimerFormation'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
