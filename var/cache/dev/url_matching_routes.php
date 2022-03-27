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
        '/employeAjoutHash' => [[['_route' => 'app_employeAjoutHash', '_controller' => 'App\\Controller\\EmployeController::registration'], null, null, null, true, false, null]],
        '/' => [[['_route' => 'app_employeAuth', '_controller' => 'App\\Controller\\EmployeController::authEmploye'], null, null, null, false, false, null]],
        '/formationAff' => [[['_route' => 'app_formationAff', '_controller' => 'App\\Controller\\EmployeController::formationAff'], null, null, null, true, false, null]],
        '/employeDeco' => [[['_route' => 'app_employeDeco', '_controller' => 'App\\Controller\\EmployeController::employeDeco'], null, null, null, true, false, null]],
        '/gererEmployes' => [[['_route' => 'app_gererEmployes', '_controller' => 'App\\Controller\\EmployeController::gererEmployes'], null, null, null, false, false, null]],
        '/formationAjout' => [[['_route' => 'app_formationAjout', '_controller' => 'App\\Controller\\FormationController::AjoutFormation'], null, null, null, true, false, null]],
        '/gererFormation' => [[['_route' => 'app_gererFormation', '_controller' => 'App\\Controller\\FormationController::GererFormation'], null, null, null, false, false, null]],
        '/indexAJout' => [[['_route' => 'app_gererAjouts', '_controller' => 'App\\Controller\\GestionAjoutController::indexAJout'], null, null, null, true, false, null]],
        '/inscriptionAjout' => [[['_route' => 'app_inscriptionAjout', '_controller' => 'App\\Controller\\InscriptionController::AjoutInscription'], null, null, null, true, false, null]],
        '/gestionInscription' => [[['_route' => 'app_gestion_inscription', '_controller' => 'App\\Controller\\InscriptionController::GestionInscription'], null, null, null, false, false, null]],
        '/produit' => [[['_route' => 'produit', '_controller' => 'App\\Controller\\ProduitController::index'], null, null, null, false, false, null]],
        '/produitAjout' => [[['_route' => 'app_produitAjout', '_controller' => 'App\\Controller\\ProduitController::AjoutProduit'], null, null, null, true, false, null]],
        '/servicesAjout' => [[['_route' => 'app_servicesAjout', '_controller' => 'App\\Controller\\ServicesController::AjoutServices'], null, null, null, true, false, null]],
        '/statistiques' => [[['_route' => 'app_statistiques', '_controller' => 'App\\Controller\\StatistiquesController::affStatistiques'], null, null, null, false, false, null]],
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
                .'|/desinscriptionEmployeFormation/([^/]++)(*:253)'
                .'|/voirEmployeServices/([^/]++)/([^/]++)(*:299)'
                .'|/s(?'
                    .'|ervice(?'
                        .'|AddEmploye/([^/]++)/([^/]++)(*:349)'
                        .'|RemoveEmploye/([^/]++)/([^/]++)(*:388)'
                    .')'
                    .'|upprimer(?'
                        .'|Formation/([^/]++)(*:426)'
                        .'|Inscription/([^/]++)(?'
                            .'|(*:457)'
                            .'|/([^/]++)(*:474)'
                        .')'
                    .')'
                .')'
                .'|/accepteInscription/([^/]++)(*:513)'
                .'|/refuseInscription/([^/]++)(*:548)'
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
        253 => [[['_route' => 'app_desinscriptionEmployeFormation', '_controller' => 'App\\Controller\\EmployeController::désinscriptionEmployeFormation'], ['id'], null, null, false, true, null]],
        299 => [[['_route' => 'app_voirEmployeServices', '_controller' => 'App\\Controller\\EmployeController::voirEmployeServices'], ['id', 'idServiceRetirer'], null, null, false, true, null]],
        349 => [[['_route' => 'app_serviceAddEmploye', '_controller' => 'App\\Controller\\EmployeServicesController::AjoutServiceForEmploye'], ['idEmploye', 'idService'], null, null, false, true, null]],
        388 => [[['_route' => 'app_serviceRemoveEmploye', '_controller' => 'App\\Controller\\EmployeServicesController::RemoveServiceForEmploye'], ['idEmploye', 'idService'], null, null, false, true, null]],
        426 => [[['_route' => 'app_supp_formation', '_controller' => 'App\\Controller\\FormationController::SupprimerFormation'], ['id'], null, null, false, true, null]],
        457 => [[['_route' => 'app_supp_inscription', '_controller' => 'App\\Controller\\InscriptionController::SupprimerFormation'], ['id'], null, null, false, true, null]],
        474 => [[['_route' => 'app_supp_inscription_by_formation', '_controller' => 'App\\Controller\\InscriptionController::SupprimerInscriptionsByService'], ['idEmploye', 'idService'], null, null, false, true, null]],
        513 => [[['_route' => 'app_accepte_Inscription', '_controller' => 'App\\Controller\\InscriptionController::AccepteInscription'], ['id'], null, null, false, true, null]],
        548 => [
            [['_route' => 'app_refuse_Inscription', '_controller' => 'App\\Controller\\InscriptionController::RefuseInscription'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
