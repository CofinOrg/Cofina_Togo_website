<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.6.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.6.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-agence" class="tocify-header">
                <li class="tocify-item level-1" data-unique="agence">
                    <a href="#agence">Agence</a>
                </li>
                                    <ul id="tocify-subheader-agence" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="agence-GETapi-agences">
                                <a href="#agence-GETapi-agences">Affiche les Agence</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agence-POSTapi-agences">
                                <a href="#agence-POSTapi-agences">Créer un nouveau Agence</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agence-PUTapi-agences--id-">
                                <a href="#agence-PUTapi-agences--id-">Met à jour un Agence</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agence-DELETEapi-agences--id-">
                                <a href="#agence-DELETEapi-agences--id-">Supprime un Agence</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-announcement" class="tocify-header">
                <li class="tocify-item level-1" data-unique="announcement">
                    <a href="#announcement">Announcement</a>
                </li>
                                    <ul id="tocify-subheader-announcement" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="announcement-GETapi-announcements">
                                <a href="#announcement-GETapi-announcements">Affiche les Announcement</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="announcement-GETapi-announcements--id-">
                                <a href="#announcement-GETapi-announcements--id-">Affiche un Announcement</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="announcement-POSTapi-announcements">
                                <a href="#announcement-POSTapi-announcements">Créer un nouveau Announcement</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="announcement-PUTapi-announcements--id-">
                                <a href="#announcement-PUTapi-announcements--id-">Met à jour un Announcement</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="announcement-DELETEapi-announcements--id-">
                                <a href="#announcement-DELETEapi-announcements--id-">Supprime un Announcement</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-applicant" class="tocify-header">
                <li class="tocify-item level-1" data-unique="applicant">
                    <a href="#applicant">Applicant</a>
                </li>
                                    <ul id="tocify-subheader-applicant" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="applicant-GETapi-applications">
                                <a href="#applicant-GETapi-applications">Affiche les Application</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="applicant-POSTapi-applications">
                                <a href="#applicant-POSTapi-applications">Créer un nouveau Applicant</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="applicant-GETapi-applications--id-">
                                <a href="#applicant-GETapi-applications--id-">Affiche un Applicant</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="applicant-PUTapi-applications--id-">
                                <a href="#applicant-PUTapi-applications--id-">Met à jour un Applicant</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="applicant-DELETEapi-applications--id-">
                                <a href="#applicant-DELETEapi-applications--id-">Supprime un Applicant</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-authentification" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentification">
                    <a href="#authentification">Authentification</a>
                </li>
                                    <ul id="tocify-subheader-authentification" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentification-POSTapi-auth-login">
                                <a href="#authentification-POSTapi-auth-login">Connecte un utilisateur</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentification-GETapi-auth-data">
                                <a href="#authentification-GETapi-auth-data">Affiche l'utilisateur connecté</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentification-DELETEapi-auth-logout">
                                <a href="#authentification-DELETEapi-auth-logout">Déconnecte l'utilisateur connecté</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-blog" class="tocify-header">
                <li class="tocify-item level-1" data-unique="blog">
                    <a href="#blog">Blog</a>
                </li>
                                    <ul id="tocify-subheader-blog" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="blog-GETapi-blogs">
                                <a href="#blog-GETapi-blogs">Affiche les Blog</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blog-GETapi-blogs--id-">
                                <a href="#blog-GETapi-blogs--id-">Affiche un Blog</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blog-POSTapi-blogs">
                                <a href="#blog-POSTapi-blogs">Créer un nouveau Blog</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blog-PUTapi-blogs--id-">
                                <a href="#blog-PUTapi-blogs--id-">Met à jour un Blog</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blog-DELETEapi-blogs--id-">
                                <a href="#blog-DELETEapi-blogs--id-">Supprime un Blog</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-brvmmarketdata" class="tocify-header">
                <li class="tocify-item level-1" data-unique="brvmmarketdata">
                    <a href="#brvmmarketdata">BrvmMarketData</a>
                </li>
                                    <ul id="tocify-subheader-brvmmarketdata" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="brvmmarketdata-GETapi-brvm-latest">
                                <a href="#brvmmarketdata-GETapi-brvm-latest">GET api/brvm/latest</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="brvmmarketdata-GETapi-brvm-history">
                                <a href="#brvmmarketdata-GETapi-brvm-history">GET api/brvm/history</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-businessclubmember" class="tocify-header">
                <li class="tocify-item level-1" data-unique="businessclubmember">
                    <a href="#businessclubmember">BusinessClubMember</a>
                </li>
                                    <ul id="tocify-subheader-businessclubmember" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="businessclubmember-POSTapi-business_club_members">
                                <a href="#businessclubmember-POSTapi-business_club_members">Créer un nouveau BusinessClubMember</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="businessclubmember-GETapi-business_club_members">
                                <a href="#businessclubmember-GETapi-business_club_members">Affiche les BusinessClubMember</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="businessclubmember-GETapi-business_club_members--id-">
                                <a href="#businessclubmember-GETapi-business_club_members--id-">Affiche un BusinessClubMember</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="businessclubmember-PUTapi-business_club_members--id-">
                                <a href="#businessclubmember-PUTapi-business_club_members--id-">Met à jour un BusinessClubMember</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="businessclubmember-DELETEapi-business_club_members--id-">
                                <a href="#businessclubmember-DELETEapi-business_club_members--id-">Supprime un BusinessClubMember</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-customermessage" class="tocify-header">
                <li class="tocify-item level-1" data-unique="customermessage">
                    <a href="#customermessage">CustomerMessage</a>
                </li>
                                    <ul id="tocify-subheader-customermessage" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="customermessage-POSTapi-customer_messages">
                                <a href="#customermessage-POSTapi-customer_messages">Créer un nouveau CustomerMessage</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="customermessage-GETapi-customer_messages">
                                <a href="#customermessage-GETapi-customer_messages">Affiche les CustomerMessage</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="customermessage-GETapi-customer_messages--id-">
                                <a href="#customermessage-GETapi-customer_messages--id-">Affiche un CustomerMessage</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="customermessage-DELETEapi-customer_messages--id-">
                                <a href="#customermessage-DELETEapi-customer_messages--id-">Supprime un CustomerMessage</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-cv" class="tocify-header">
                <li class="tocify-item level-1" data-unique="cv">
                    <a href="#cv">Cv</a>
                </li>
                                    <ul id="tocify-subheader-cv" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="cv-POSTapi-cvs">
                                <a href="#cv-POSTapi-cvs">Créer un nouveau Cv</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cv-GETapi-cvs">
                                <a href="#cv-GETapi-cvs">Affiche les Cv</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cv-GETapi-cvs--id-">
                                <a href="#cv-GETapi-cvs--id-">Affiche un Cv</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cv-PUTapi-cvs--id-">
                                <a href="#cv-PUTapi-cvs--id-">Met à jour un Cv</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cv-DELETEapi-cvs--id-">
                                <a href="#cv-DELETEapi-cvs--id-">Supprime un Cv</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-chat">
                                <a href="#endpoints-POSTapi-chat">POST api/chat</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-news">
                                <a href="#endpoints-GETapi-news">GET api/news</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-analytics-overview">
                                <a href="#endpoints-GETapi-analytics-overview">GET api/analytics/overview</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-cv_extractors">
                                <a href="#endpoints-GETapi-cv_extractors">Extraire le texte de tous les CVs d'un dossier</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-cv_extractors--cvId-">
                                <a href="#endpoints-GETapi-cv_extractors--cvId-">Extraire le texte d'un CV spécifique par ID</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-cv_extractors-upload">
                                <a href="#endpoints-POSTapi-cv_extractors-upload">Extraire le texte d'un CV uploadé directement</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-joboffer" class="tocify-header">
                <li class="tocify-item level-1" data-unique="joboffer">
                    <a href="#joboffer">JobOffer</a>
                </li>
                                    <ul id="tocify-subheader-joboffer" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="joboffer-GETapi-job_offers">
                                <a href="#joboffer-GETapi-job_offers">Affiche les JobOffer</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="joboffer-GETapi-job_offers--id-">
                                <a href="#joboffer-GETapi-job_offers--id-">Affiche un JobOffer</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="joboffer-POSTapi-job_offers">
                                <a href="#joboffer-POSTapi-job_offers">Créer un nouveau JobOffer</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="joboffer-PUTapi-job_offers--id-">
                                <a href="#joboffer-PUTapi-job_offers--id-">Met à jour un JobOffer</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="joboffer-DELETEapi-job_offers--id-">
                                <a href="#joboffer-DELETEapi-job_offers--id-">Supprime un JobOffer</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-notification" class="tocify-header">
                <li class="tocify-item level-1" data-unique="notification">
                    <a href="#notification">Notification</a>
                </li>
                                    <ul id="tocify-subheader-notification" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="notification-GETapi-notifications">
                                <a href="#notification-GETapi-notifications">Affiche les Notification</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="notification-GETapi-notifications-unread-count">
                                <a href="#notification-GETapi-notifications-unread-count">Récupère le nombre de notifications non lues</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="notification-PUTapi-notifications--id--mark-as-read">
                                <a href="#notification-PUTapi-notifications--id--mark-as-read">Marque une notification comme lue</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="notification-PUTapi-notifications-mark-all-as-read">
                                <a href="#notification-PUTapi-notifications-mark-all-as-read">Marque toutes les notifications comme lues</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="notification-GETapi-notifications--id-">
                                <a href="#notification-GETapi-notifications--id-">Affiche un Notification</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="notification-DELETEapi-notifications--id-">
                                <a href="#notification-DELETEapi-notifications--id-">Supprime un Notification</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-preregistration" class="tocify-header">
                <li class="tocify-item level-1" data-unique="preregistration">
                    <a href="#preregistration">PreRegistration</a>
                </li>
                                    <ul id="tocify-subheader-preregistration" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="preregistration-POSTapi-pre_registrations">
                                <a href="#preregistration-POSTapi-pre_registrations">Créer un nouveau PreRegistration</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="preregistration-GETapi-pre_registrations">
                                <a href="#preregistration-GETapi-pre_registrations">Affiche les PreRegistration</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="preregistration-GETapi-pre_registrations--id-">
                                <a href="#preregistration-GETapi-pre_registrations--id-">Affiche un PreRegistration</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="preregistration-PUTapi-pre_registrations--id-">
                                <a href="#preregistration-PUTapi-pre_registrations--id-">Met à jour un PreRegistration</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="preregistration-DELETEapi-pre_registrations--id-">
                                <a href="#preregistration-DELETEapi-pre_registrations--id-">Supprime un PreRegistration</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-service" class="tocify-header">
                <li class="tocify-item level-1" data-unique="service">
                    <a href="#service">Service</a>
                </li>
                                    <ul id="tocify-subheader-service" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="service-GETapi-services">
                                <a href="#service-GETapi-services">Affiche les Service</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="service-GETapi-services--id-">
                                <a href="#service-GETapi-services--id-">Affiche un Service</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="service-POSTapi-services">
                                <a href="#service-POSTapi-services">Créer un nouveau Service</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="service-PUTapi-services--id-">
                                <a href="#service-PUTapi-services--id-">Met à jour un Service</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="service-DELETEapi-services--id-">
                                <a href="#service-DELETEapi-services--id-">Supprime un Service</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-serviceproduct" class="tocify-header">
                <li class="tocify-item level-1" data-unique="serviceproduct">
                    <a href="#serviceproduct">ServiceProduct</a>
                </li>
                                    <ul id="tocify-subheader-serviceproduct" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="serviceproduct-GETapi-service_products">
                                <a href="#serviceproduct-GETapi-service_products">Affiche les ServiceProduct</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="serviceproduct-GETapi-service_products--id-">
                                <a href="#serviceproduct-GETapi-service_products--id-">Affiche un ServiceProduct</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="serviceproduct-POSTapi-service_products">
                                <a href="#serviceproduct-POSTapi-service_products">Créer un nouveau ServiceProduct</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="serviceproduct-PUTapi-service_products--id-">
                                <a href="#serviceproduct-PUTapi-service_products--id-">Met à jour un ServiceProduct</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="serviceproduct-DELETEapi-service_products--id-">
                                <a href="#serviceproduct-DELETEapi-service_products--id-">Supprime un ServiceProduct</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-slider" class="tocify-header">
                <li class="tocify-item level-1" data-unique="slider">
                    <a href="#slider">Slider</a>
                </li>
                                    <ul id="tocify-subheader-slider" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="slider-GETapi-sliders">
                                <a href="#slider-GETapi-sliders">Affiche les Slider</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="slider-GETapi-sliders--id-">
                                <a href="#slider-GETapi-sliders--id-">Affiche un Slider</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="slider-POSTapi-sliders">
                                <a href="#slider-POSTapi-sliders">Créer un nouveau Slider</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="slider-PUTapi-sliders--id-">
                                <a href="#slider-PUTapi-sliders--id-">Met à jour un Slider</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="slider-DELETEapi-sliders--id-">
                                <a href="#slider-DELETEapi-sliders--id-">Supprime un Slider</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-spontaneousapplication" class="tocify-header">
                <li class="tocify-item level-1" data-unique="spontaneousapplication">
                    <a href="#spontaneousapplication">SpontaneousApplication</a>
                </li>
                                    <ul id="tocify-subheader-spontaneousapplication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="spontaneousapplication-POSTapi-spontaneous_applications">
                                <a href="#spontaneousapplication-POSTapi-spontaneous_applications">Créer un nouveau SpontaneousApplication</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="spontaneousapplication-GETapi-spontaneous_applications">
                                <a href="#spontaneousapplication-GETapi-spontaneous_applications">Affiche les SpontaneousApplication</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="spontaneousapplication-GETapi-spontaneous_applications--id-">
                                <a href="#spontaneousapplication-GETapi-spontaneous_applications--id-">Affiche un SpontaneousApplication</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="spontaneousapplication-DELETEapi-spontaneous_applications--id-">
                                <a href="#spontaneousapplication-DELETEapi-spontaneous_applications--id-">Supprime un SpontaneousApplication</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-utilisateurs" class="tocify-header">
                <li class="tocify-item level-1" data-unique="utilisateurs">
                    <a href="#utilisateurs">Utilisateurs</a>
                </li>
                                    <ul id="tocify-subheader-utilisateurs" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="utilisateurs-PUTapi-users-update-password">
                                <a href="#utilisateurs-PUTapi-users-update-password">Mettre à jour le mot de passe de l'utilisateur connecté</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="utilisateurs-GETapi-users">
                                <a href="#utilisateurs-GETapi-users">Liste les uilisateurs</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="utilisateurs-POSTapi-users">
                                <a href="#utilisateurs-POSTapi-users">Ajouter un uilisateur</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="utilisateurs-GETapi-users--id-">
                                <a href="#utilisateurs-GETapi-users--id-">Affiche un uilisateur</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="utilisateurs-PUTapi-users--id-">
                                <a href="#utilisateurs-PUTapi-users--id-">Mettre à jour un utilisateur</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="utilisateurs-DELETEapi-users--id-">
                                <a href="#utilisateurs-DELETEapi-users--id-">Surppimer l'utilisateur</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: June 18, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="agence">Agence</h1>

    <p>EndPoints pour gérer les Agence</p>

                                <h2 id="agence-GETapi-agences">Affiche les Agence</h2>

<p>
</p>



<span id="example-requests-GETapi-agences">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/agences?name=architecto&amp;latitude=architecto&amp;longitude=architecto&amp;adress=architecto&amp;type=architecto&amp;contact=architecto&amp;with_user=0&amp;paginate=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/agences"
);

const params = {
    "name": "architecto",
    "latitude": "architecto",
    "longitude": "architecto",
    "adress": "architecto",
    "type": "architecto",
    "contact": "architecto",
    "with_user": "0",
    "paginate": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-agences">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-agences" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-agences"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agences"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-agences" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agences">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-agences" data-method="GET"
      data-path="api/agences"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-agences', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-agences"
                    onclick="tryItOut('GETapi-agences');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-agences"
                    onclick="cancelTryOut('GETapi-agences');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-agences"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/agences</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-agences"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-agences"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="GETapi-agences"
               value="architecto"
               data-component="query">
    <br>
<p>Description de l'attribut.                                                  Agoe Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="latitude"                data-endpoint="GETapi-agences"
               value="architecto"
               data-component="query">
    <br>
<p>Description de l'attribut.                                                  18526.102 Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="longitude"                data-endpoint="GETapi-agences"
               value="architecto"
               data-component="query">
    <br>
<p>Description de l'attribut.                                                  125896.12 Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>adress</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="adress"                data-endpoint="GETapi-agences"
               value="architecto"
               data-component="query">
    <br>
<p>Description de l'attribut.                                                  Agoe Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="GETapi-agences"
               value="architecto"
               data-component="query">
    <br>
<p>Description de l'attribut.                                                  Agence Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>contact</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contact"                data-endpoint="GETapi-agences"
               value="architecto"
               data-component="query">
    <br>
<p>Description de l'attribut.                                                  22315680 Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_user</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_user"                data-endpoint="GETapi-agences"
               value="0"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>0</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>paginate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="paginate"                data-endpoint="GETapi-agences"
               value="false"
               data-component="query">
    <br>
<p>Utiliser la pagination. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="agence-POSTapi-agences">Créer un nouveau Agence</h2>

<p>
</p>



<span id="example-requests-POSTapi-agences">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/agences" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 0,
    \"name\": \"Dekon\",
    \"latitude\": \"12580.3\",
    \"longitude\": \"1382.56\",
    \"adress\": \"Dekon\",
    \"contact\": \"90132560\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/agences"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 0,
    "name": "Dekon",
    "latitude": "12580.3",
    "longitude": "1382.56",
    "adress": "Dekon",
    "contact": "90132560"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-agences">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-agences" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-agences"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-agences"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-agences" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-agences">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-agences" data-method="POST"
      data-path="api/agences"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-agences', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-agences"
                    onclick="tryItOut('POSTapi-agences');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-agences"
                    onclick="cancelTryOut('POSTapi-agences');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-agences"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/agences</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-agences"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-agences"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="POSTapi-agences"
               value="0"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>0</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-agences"
               value="Dekon"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>Dekon</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="latitude"                data-endpoint="POSTapi-agences"
               value="12580.3"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>12580.3</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="longitude"                data-endpoint="POSTapi-agences"
               value="1382.56"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>1382.56</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>adress</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="adress"                data-endpoint="POSTapi-agences"
               value="Dekon"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>Dekon</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contact</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contact"                data-endpoint="POSTapi-agences"
               value="90132560"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>90132560</code></p>
        </div>
        </form>

                    <h2 id="agence-PUTapi-agences--id-">Met à jour un Agence</h2>

<p>
</p>



<span id="example-requests-PUTapi-agences--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/agences/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"latitude\": \"architecto\",
    \"longitude\": \"architecto\",
    \"adress\": \"architecto\",
    \"type\": \"architecto\",
    \"contact\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/agences/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "latitude": "architecto",
    "longitude": "architecto",
    "adress": "architecto",
    "type": "architecto",
    "contact": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-agences--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-agences--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-agences--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-agences--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-agences--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-agences--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-agences--id-" data-method="PUT"
      data-path="api/agences/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-agences--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-agences--id-"
                    onclick="tryItOut('PUTapi-agences--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-agences--id-"
                    onclick="cancelTryOut('PUTapi-agences--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-agences--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/agences/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-agences--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-agences--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-agences--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Agence. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-agences--id-"
               value="architecto"
               data-component="body">
    <br>
<p>L'attribut.                                                                 Agoe Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="latitude"                data-endpoint="PUTapi-agences--id-"
               value="architecto"
               data-component="body">
    <br>
<p>L'attribut.                                                                 1258.12 Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="longitude"                data-endpoint="PUTapi-agences--id-"
               value="architecto"
               data-component="body">
    <br>
<p>L'attribut.                                                                 1250.12 Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>adress</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="adress"                data-endpoint="PUTapi-agences--id-"
               value="architecto"
               data-component="body">
    <br>
<p>L'attribut.                                                                 Lome Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="PUTapi-agences--id-"
               value="architecto"
               data-component="body">
    <br>
<p>L'attribut.                                                                 agence Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contact</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contact"                data-endpoint="PUTapi-agences--id-"
               value="architecto"
               data-component="body">
    <br>
<p>L'attribut.                                                                 98123025 Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="agence-DELETEapi-agences--id-">Supprime un Agence</h2>

<p>
</p>



<span id="example-requests-DELETEapi-agences--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/agences/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/agences/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-agences--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-agences--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-agences--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-agences--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-agences--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-agences--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-agences--id-" data-method="DELETE"
      data-path="api/agences/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-agences--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-agences--id-"
                    onclick="tryItOut('DELETEapi-agences--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-agences--id-"
                    onclick="cancelTryOut('DELETEapi-agences--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-agences--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/agences/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-agences--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-agences--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-agences--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Agence. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="announcement">Announcement</h1>

    <p>EndPoints pour gérer les Announcement</p>

                                <h2 id="announcement-GETapi-announcements">Affiche les Announcement</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-announcements">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/announcements?content=architecto&amp;is_published=architecto&amp;with_user=0&amp;paginate=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/announcements"
);

const params = {
    "content": "architecto",
    "is_published": "architecto",
    "with_user": "0",
    "paginate": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-announcements">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-announcements" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-announcements"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-announcements"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-announcements" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-announcements">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-announcements" data-method="GET"
      data-path="api/announcements"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-announcements', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-announcements"
                    onclick="tryItOut('GETapi-announcements');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-announcements"
                    onclick="cancelTryOut('GETapi-announcements');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-announcements"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/announcements</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-announcements"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-announcements"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="GETapi-announcements"
               value="architecto"
               data-component="query">
    <br>
<p>Description de l'attribut.                                                   Je suis Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>is_published</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="is_published"                data-endpoint="GETapi-announcements"
               value="architecto"
               data-component="query">
    <br>
<p>Description de l'attribut.                                                   true Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_user</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_user"                data-endpoint="GETapi-announcements"
               value="0"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>0</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>paginate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="paginate"                data-endpoint="GETapi-announcements"
               value="false"
               data-component="query">
    <br>
<p>Utiliser la pagination. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="announcement-GETapi-announcements--id-">Affiche un Announcement</h2>

<p>
</p>



<span id="example-requests-GETapi-announcements--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/announcements/1?with_user=0" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/announcements/1"
);

const params = {
    "with_user": "0",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-announcements--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-announcements--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-announcements--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-announcements--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-announcements--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-announcements--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-announcements--id-" data-method="GET"
      data-path="api/announcements/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-announcements--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-announcements--id-"
                    onclick="tryItOut('GETapi-announcements--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-announcements--id-"
                    onclick="cancelTryOut('GETapi-announcements--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-announcements--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/announcements/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-announcements--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-announcements--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-announcements--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Announcement. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_user</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_user"                data-endpoint="GETapi-announcements--id-"
               value="0"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>0</code></p>
            </div>
                </form>

                    <h2 id="announcement-POSTapi-announcements">Créer un nouveau Announcement</h2>

<p>
</p>



<span id="example-requests-POSTapi-announcements">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/announcements" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 1,
    \"content\": \"value\",
    \"is_published\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/announcements"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 1,
    "content": "value",
    "is_published": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-announcements">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-announcements" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-announcements"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-announcements"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-announcements" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-announcements">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-announcements" data-method="POST"
      data-path="api/announcements"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-announcements', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-announcements"
                    onclick="tryItOut('POSTapi-announcements');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-announcements"
                    onclick="cancelTryOut('POSTapi-announcements');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-announcements"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/announcements</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-announcements"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-announcements"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="POSTapi-announcements"
               value="1"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="POSTapi-announcements"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_published</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-announcements" style="display: none">
            <input type="radio" name="is_published"
                   value="true"
                   data-endpoint="POSTapi-announcements"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-announcements" style="display: none">
            <input type="radio" name="is_published"
                   value="false"
                   data-endpoint="POSTapi-announcements"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>L'attribut. Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="announcement-PUTapi-announcements--id-">Met à jour un Announcement</h2>

<p>
</p>



<span id="example-requests-PUTapi-announcements--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/announcements/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"content\": \"value\",
    \"is_published\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/announcements/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "content": "value",
    "is_published": true
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-announcements--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-announcements--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-announcements--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-announcements--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-announcements--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-announcements--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-announcements--id-" data-method="PUT"
      data-path="api/announcements/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-announcements--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-announcements--id-"
                    onclick="tryItOut('PUTapi-announcements--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-announcements--id-"
                    onclick="cancelTryOut('PUTapi-announcements--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-announcements--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/announcements/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-announcements--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-announcements--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-announcements--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Announcement. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="PUTapi-announcements--id-"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_published</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-announcements--id-" style="display: none">
            <input type="radio" name="is_published"
                   value="true"
                   data-endpoint="PUTapi-announcements--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-announcements--id-" style="display: none">
            <input type="radio" name="is_published"
                   value="false"
                   data-endpoint="PUTapi-announcements--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>L'attribut. Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="announcement-DELETEapi-announcements--id-">Supprime un Announcement</h2>

<p>
</p>



<span id="example-requests-DELETEapi-announcements--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/announcements/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/announcements/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-announcements--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-announcements--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-announcements--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-announcements--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-announcements--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-announcements--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-announcements--id-" data-method="DELETE"
      data-path="api/announcements/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-announcements--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-announcements--id-"
                    onclick="tryItOut('DELETEapi-announcements--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-announcements--id-"
                    onclick="cancelTryOut('DELETEapi-announcements--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-announcements--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/announcements/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-announcements--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-announcements--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-announcements--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Announcement. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="applicant">Applicant</h1>

    <p>EndPoints pour gérer les Application</p>

                                <h2 id="applicant-GETapi-applications">Affiche les Application</h2>

<p>
</p>



<span id="example-requests-GETapi-applications">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/applications?with_relation=false&amp;paginate=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/applications"
);

const params = {
    "with_relation": "false",
    "paginate": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-applications">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-applications" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-applications"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-applications"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-applications" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-applications">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-applications" data-method="GET"
      data-path="api/applications"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-applications', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-applications"
                    onclick="tryItOut('GETapi-applications');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-applications"
                    onclick="cancelTryOut('GETapi-applications');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-applications"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/applications</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-applications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-applications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="GETapi-applications"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-applications"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>paginate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="paginate"                data-endpoint="GETapi-applications"
               value="false"
               data-component="query">
    <br>
<p>Utiliser la pagination. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="applicant-POSTapi-applications">Créer un nouveau Applicant</h2>

<p>
</p>



<span id="example-requests-POSTapi-applications">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/applications" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"attribute\": \"value\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/applications"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "attribute": "value"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-applications">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-applications" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-applications"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-applications"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-applications" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-applications">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-applications" data-method="POST"
      data-path="api/applications"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-applications', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-applications"
                    onclick="tryItOut('POSTapi-applications');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-applications"
                    onclick="cancelTryOut('POSTapi-applications');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-applications"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/applications</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-applications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-applications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="POSTapi-applications"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
        </form>

                    <h2 id="applicant-GETapi-applications--id-">Affiche un Applicant</h2>

<p>
</p>



<span id="example-requests-GETapi-applications--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/applications/1?with_relation=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/applications/1"
);

const params = {
    "with_relation": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-applications--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-applications--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-applications--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-applications--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-applications--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-applications--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-applications--id-" data-method="GET"
      data-path="api/applications/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-applications--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-applications--id-"
                    onclick="tryItOut('GETapi-applications--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-applications--id-"
                    onclick="cancelTryOut('GETapi-applications--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-applications--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/applications/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-applications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-applications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-applications--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Applicant. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-applications--id-"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="applicant-PUTapi-applications--id-">Met à jour un Applicant</h2>

<p>
</p>



<span id="example-requests-PUTapi-applications--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/applications/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"attribute\": \"value\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/applications/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "attribute": "value"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-applications--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-applications--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-applications--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-applications--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-applications--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-applications--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-applications--id-" data-method="PUT"
      data-path="api/applications/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-applications--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-applications--id-"
                    onclick="tryItOut('PUTapi-applications--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-applications--id-"
                    onclick="cancelTryOut('PUTapi-applications--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-applications--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/applications/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-applications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-applications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-applications--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Applicant. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="PUTapi-applications--id-"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
        </form>

                    <h2 id="applicant-DELETEapi-applications--id-">Supprime un Applicant</h2>

<p>
</p>



<span id="example-requests-DELETEapi-applications--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/applications/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/applications/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-applications--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-applications--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-applications--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-applications--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-applications--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-applications--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-applications--id-" data-method="DELETE"
      data-path="api/applications/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-applications--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-applications--id-"
                    onclick="tryItOut('DELETEapi-applications--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-applications--id-"
                    onclick="cancelTryOut('DELETEapi-applications--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-applications--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/applications/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-applications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-applications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-applications--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Applicant. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="authentification">Authentification</h1>

    <p>EndPoints pour gérer l'authentification</p>

                                <h2 id="authentification-POSTapi-auth-login">Connecte un utilisateur</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"charles.gamligo@gmail.com\",
    \"password\": \"password\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "charles.gamligo@gmail.com",
    "password": "password"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-login"
               value="charles.gamligo@gmail.com"
               data-component="body">
    <br>
<p>L'email de l'utilsateur. Example: <code>charles.gamligo@gmail.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-login"
               value="password"
               data-component="body">
    <br>
<p>Le mot de passe complet de l'utilisateur. Example: <code>password</code></p>
        </div>
        </form>

                    <h2 id="authentification-GETapi-auth-data">Affiche l&#039;utilisateur connecté</h2>

<p>
</p>



<span id="example-requests-GETapi-auth-data">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/auth/data" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/data"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-auth-data">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-data" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-auth-data"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-data"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-auth-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-data">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-auth-data" data-method="GET"
      data-path="api/auth/data"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-data', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-data"
                    onclick="tryItOut('GETapi-auth-data');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-data"
                    onclick="cancelTryOut('GETapi-auth-data');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-data"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/data</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-auth-data"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-auth-data"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="authentification-DELETEapi-auth-logout">Déconnecte l&#039;utilisateur connecté</h2>

<p>
</p>



<span id="example-requests-DELETEapi-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/auth/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-auth-logout">
            <blockquote>
            <p>Example response (204):</p>
        </blockquote>
                <pre>
<code>Empty response</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-auth-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-auth-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-auth-logout" data-method="DELETE"
      data-path="api/auth/logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-auth-logout"
                    onclick="tryItOut('DELETEapi-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-auth-logout"
                    onclick="cancelTryOut('DELETEapi-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-auth-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/auth/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="blog">Blog</h1>

    <p>EndPoints pour gérer les Blog</p>

                                <h2 id="blog-GETapi-blogs">Affiche les Blog</h2>

<p>
</p>



<span id="example-requests-GETapi-blogs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/blogs?attribute=architecto&amp;title=architecto&amp;content=architecto&amp;sommary=architecto&amp;is_published=&amp;published_at=architecto&amp;with_relation=false&amp;paginate=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/blogs"
);

const params = {
    "attribute": "architecto",
    "title": "architecto",
    "content": "architecto",
    "sommary": "architecto",
    "is_published": "0",
    "published_at": "architecto",
    "with_relation": "false",
    "paginate": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blogs">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blogs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blogs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blogs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-blogs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blogs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-blogs" data-method="GET"
      data-path="api/blogs"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blogs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-blogs"
                    onclick="tryItOut('GETapi-blogs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-blogs"
                    onclick="cancelTryOut('GETapi-blogs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-blogs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blogs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-blogs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-blogs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="GETapi-blogs"
               value="architecto"
               data-component="query">
    <br>
<p>Description de l'attribut. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="GETapi-blogs"
               value="architecto"
               data-component="query">
    <br>
<p>Une nouvelle ère Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="GETapi-blogs"
               value="architecto"
               data-component="query">
    <br>
<p>Aventure... Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sommary</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sommary"                data-endpoint="GETapi-blogs"
               value="architecto"
               data-component="query">
    <br>
<p>Cc Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>is_published</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETapi-blogs" style="display: none">
            <input type="radio" name="is_published"
                   value="1"
                   data-endpoint="GETapi-blogs"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-blogs" style="display: none">
            <input type="radio" name="is_published"
                   value="0"
                   data-endpoint="GETapi-blogs"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>1 Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>published_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="published_at"                data-endpoint="GETapi-blogs"
               value="architecto"
               data-component="query">
    <br>
<p>2026-01-20 12:00:00 Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-blogs"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>paginate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="paginate"                data-endpoint="GETapi-blogs"
               value="false"
               data-component="query">
    <br>
<p>Utiliser la pagination. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="blog-GETapi-blogs--id-">Affiche un Blog</h2>

<p>
</p>



<span id="example-requests-GETapi-blogs--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/blogs/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/blogs/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blogs--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blogs--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blogs--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blogs--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-blogs--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blogs--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-blogs--id-" data-method="GET"
      data-path="api/blogs/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blogs--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-blogs--id-"
                    onclick="tryItOut('GETapi-blogs--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-blogs--id-"
                    onclick="cancelTryOut('GETapi-blogs--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-blogs--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blogs/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-blogs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-blogs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-blogs--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Blog. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="blog-POSTapi-blogs">Créer un nouveau Blog</h2>

<p>
</p>



<span id="example-requests-POSTapi-blogs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/blogs" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 1,
    \"title\": \"Mon premier blog\",
    \"content\": \"Contenu de mon premier blog\",
    \"summary\": \"Résumé de mon premier blog\",
    \"is_phublised\": true,
    \"published_at\": \"2026-01-20 12:00:00\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/blogs"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 1,
    "title": "Mon premier blog",
    "content": "Contenu de mon premier blog",
    "summary": "Résumé de mon premier blog",
    "is_phublised": true,
    "published_at": "2026-01-20 12:00:00"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-blogs">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-blogs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-blogs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-blogs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-blogs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-blogs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-blogs" data-method="POST"
      data-path="api/blogs"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-blogs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-blogs"
                    onclick="tryItOut('POSTapi-blogs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-blogs"
                    onclick="cancelTryOut('POSTapi-blogs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-blogs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/blogs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-blogs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-blogs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="POSTapi-blogs"
               value="1"
               data-component="body">
    <br>
<p>Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-blogs"
               value="Mon premier blog"
               data-component="body">
    <br>
<p>Example: <code>Mon premier blog</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="POSTapi-blogs"
               value="Contenu de mon premier blog"
               data-component="body">
    <br>
<p>Example: <code>Contenu de mon premier blog</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>summary</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="summary"                data-endpoint="POSTapi-blogs"
               value="Résumé de mon premier blog"
               data-component="body">
    <br>
<p>Example: <code>Résumé de mon premier blog</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_phublised</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-blogs" style="display: none">
            <input type="radio" name="is_phublised"
                   value="true"
                   data-endpoint="POSTapi-blogs"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-blogs" style="display: none">
            <input type="radio" name="is_phublised"
                   value="false"
                   data-endpoint="POSTapi-blogs"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>published_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="published_at"                data-endpoint="POSTapi-blogs"
               value="2026-01-20 12:00:00"
               data-component="body">
    <br>
<p>Example: <code>2026-01-20 12:00:00</code></p>
        </div>
        </form>

                    <h2 id="blog-PUTapi-blogs--id-">Met à jour un Blog</h2>

<p>
</p>



<span id="example-requests-PUTapi-blogs--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/blogs/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"Mon blog mis à jour\",
    \"content\": \"Contenu mis à jour de\",
    \"summary\": \"Résumé mis à jour\",
    \"is_published\": false,
    \"published_at\": \"2026-02-15 15:30:00\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/blogs/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "Mon blog mis à jour",
    "content": "Contenu mis à jour de",
    "summary": "Résumé mis à jour",
    "is_published": false,
    "published_at": "2026-02-15 15:30:00"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-blogs--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-blogs--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-blogs--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-blogs--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-blogs--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-blogs--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-blogs--id-" data-method="PUT"
      data-path="api/blogs/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-blogs--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-blogs--id-"
                    onclick="tryItOut('PUTapi-blogs--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-blogs--id-"
                    onclick="cancelTryOut('PUTapi-blogs--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-blogs--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/blogs/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-blogs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-blogs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-blogs--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Blog. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-blogs--id-"
               value="Mon blog mis à jour"
               data-component="body">
    <br>
<p>Example: <code>Mon blog mis à jour</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="PUTapi-blogs--id-"
               value="Contenu mis à jour de"
               data-component="body">
    <br>
<p>Example: <code>Contenu mis à jour de</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>summary</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="summary"                data-endpoint="PUTapi-blogs--id-"
               value="Résumé mis à jour"
               data-component="body">
    <br>
<p>Example: <code>Résumé mis à jour</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_published</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-blogs--id-" style="display: none">
            <input type="radio" name="is_published"
                   value="true"
                   data-endpoint="PUTapi-blogs--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-blogs--id-" style="display: none">
            <input type="radio" name="is_published"
                   value="false"
                   data-endpoint="PUTapi-blogs--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>published_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="published_at"                data-endpoint="PUTapi-blogs--id-"
               value="2026-02-15 15:30:00"
               data-component="body">
    <br>
<p>Example: <code>2026-02-15 15:30:00</code></p>
        </div>
        </form>

                    <h2 id="blog-DELETEapi-blogs--id-">Supprime un Blog</h2>

<p>
</p>



<span id="example-requests-DELETEapi-blogs--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/blogs/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/blogs/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-blogs--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-blogs--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-blogs--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-blogs--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-blogs--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-blogs--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-blogs--id-" data-method="DELETE"
      data-path="api/blogs/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-blogs--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-blogs--id-"
                    onclick="tryItOut('DELETEapi-blogs--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-blogs--id-"
                    onclick="cancelTryOut('DELETEapi-blogs--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-blogs--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/blogs/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-blogs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-blogs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-blogs--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Blog. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="brvmmarketdata">BrvmMarketData</h1>

    <p>EndPoints pour gérer les BrvmMarketData</p>

                                <h2 id="brvmmarketdata-GETapi-brvm-latest">GET api/brvm/latest</h2>

<p>
</p>



<span id="example-requests-GETapi-brvm-latest">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/brvm/latest" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/brvm/latest"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-brvm-latest">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;index&quot;: 404.77,
        &quot;change&quot;: 1.41,
        &quot;changePercent&quot;: 0.35,
        &quot;volume&quot;: 164272925,
        &quot;listed_companies&quot;: 45,
        &quot;market_cap&quot;: 15593068953103,
        &quot;is_fallback&quot;: false,
        &quot;updatedAt&quot;: &quot;2026-04-29T10:25:34+00:00&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-brvm-latest" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-brvm-latest"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-brvm-latest"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-brvm-latest" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-brvm-latest">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-brvm-latest" data-method="GET"
      data-path="api/brvm/latest"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-brvm-latest', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-brvm-latest"
                    onclick="tryItOut('GETapi-brvm-latest');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-brvm-latest"
                    onclick="cancelTryOut('GETapi-brvm-latest');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-brvm-latest"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/brvm/latest</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-brvm-latest"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-brvm-latest"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="brvmmarketdata-GETapi-brvm-history">GET api/brvm/history</h2>

<p>
</p>



<span id="example-requests-GETapi-brvm-history">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/brvm/history" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/brvm/history"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-brvm-history">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;index_value&quot;: 404.77,
            &quot;change_percent&quot;: 0.35,
            &quot;volume&quot;: 164272925,
            &quot;scraped_at&quot;: &quot;2026-04-29T10:25:34.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 403.36,
            &quot;change_percent&quot;: 0.24,
            &quot;volume&quot;: 1395641335,
            &quot;scraped_at&quot;: &quot;2026-04-29T08:53:56.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 403.36,
            &quot;change_percent&quot;: 0.24,
            &quot;volume&quot;: 1395641335,
            &quot;scraped_at&quot;: &quot;2026-04-28T18:24:26.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-13T02:00:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-13T01:45:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-11T07:00:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-11T02:15:03.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-11T02:00:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-11T01:45:01.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-11T01:30:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-11T01:15:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-11T01:00:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-11T00:45:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-11T00:30:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 224.67,
            &quot;change_percent&quot;: 0.65,
            &quot;volume&quot;: 156000000,
            &quot;scraped_at&quot;: &quot;2026-04-11T00:15:00.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-11T00:00:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-10T23:45:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-10T23:30:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-10T23:15:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-10T23:00:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-10T17:45:03.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-10T17:30:03.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-10T17:00:03.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-10T16:45:03.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-10T16:30:03.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.38,
            &quot;change_percent&quot;: -0.14,
            &quot;volume&quot;: 2652736617,
            &quot;scraped_at&quot;: &quot;2026-04-10T16:15:06.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 407.2,
            &quot;change_percent&quot;: 0.06,
            &quot;volume&quot;: 2308985921,
            &quot;scraped_at&quot;: &quot;2026-04-10T12:00:05.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 406.42,
            &quot;change_percent&quot;: -0.13,
            &quot;volume&quot;: 2269877810,
            &quot;scraped_at&quot;: &quot;2026-04-10T11:45:02.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 407.04,
            &quot;change_percent&quot;: 0.02,
            &quot;volume&quot;: 2201866693,
            &quot;scraped_at&quot;: &quot;2026-04-10T11:15:03.000000Z&quot;
        },
        {
            &quot;index_value&quot;: 407.28,
            &quot;change_percent&quot;: 0.08,
            &quot;volume&quot;: 1702457002,
            &quot;scraped_at&quot;: &quot;2026-04-10T10:45:04.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-brvm-history" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-brvm-history"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-brvm-history"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-brvm-history" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-brvm-history">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-brvm-history" data-method="GET"
      data-path="api/brvm/history"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-brvm-history', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-brvm-history"
                    onclick="tryItOut('GETapi-brvm-history');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-brvm-history"
                    onclick="cancelTryOut('GETapi-brvm-history');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-brvm-history"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/brvm/history</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-brvm-history"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-brvm-history"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="businessclubmember">BusinessClubMember</h1>

    <p>EndPoints pour gérer les BusinessClubMember</p>

                                <h2 id="businessclubmember-POSTapi-business_club_members">Créer un nouveau BusinessClubMember</h2>

<p>
</p>



<span id="example-requests-POSTapi-business_club_members">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/business_club_members" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"attribute\": \"value\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/business_club_members"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "attribute": "value"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-business_club_members">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-business_club_members" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-business_club_members"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-business_club_members"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-business_club_members" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-business_club_members">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-business_club_members" data-method="POST"
      data-path="api/business_club_members"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-business_club_members', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-business_club_members"
                    onclick="tryItOut('POSTapi-business_club_members');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-business_club_members"
                    onclick="cancelTryOut('POSTapi-business_club_members');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-business_club_members"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/business_club_members</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-business_club_members"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-business_club_members"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="POSTapi-business_club_members"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
        </form>

                    <h2 id="businessclubmember-GETapi-business_club_members">Affiche les BusinessClubMember</h2>

<p>
</p>



<span id="example-requests-GETapi-business_club_members">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/business_club_members?with_relation=false&amp;paginate=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/business_club_members"
);

const params = {
    "with_relation": "false",
    "paginate": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-business_club_members">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-business_club_members" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-business_club_members"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-business_club_members"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-business_club_members" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-business_club_members">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-business_club_members" data-method="GET"
      data-path="api/business_club_members"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-business_club_members', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-business_club_members"
                    onclick="tryItOut('GETapi-business_club_members');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-business_club_members"
                    onclick="cancelTryOut('GETapi-business_club_members');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-business_club_members"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/business_club_members</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-business_club_members"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-business_club_members"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="GETapi-business_club_members"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-business_club_members"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>paginate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="paginate"                data-endpoint="GETapi-business_club_members"
               value="false"
               data-component="query">
    <br>
<p>Utiliser la pagination. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="businessclubmember-GETapi-business_club_members--id-">Affiche un BusinessClubMember</h2>

<p>
</p>



<span id="example-requests-GETapi-business_club_members--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/business_club_members/1?with_relation=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/business_club_members/1"
);

const params = {
    "with_relation": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-business_club_members--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-business_club_members--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-business_club_members--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-business_club_members--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-business_club_members--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-business_club_members--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-business_club_members--id-" data-method="GET"
      data-path="api/business_club_members/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-business_club_members--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-business_club_members--id-"
                    onclick="tryItOut('GETapi-business_club_members--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-business_club_members--id-"
                    onclick="cancelTryOut('GETapi-business_club_members--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-business_club_members--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/business_club_members/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-business_club_members--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-business_club_members--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-business_club_members--id-"
               value="1"
               data-component="url">
    <br>
<p>Le BusinessClubMember. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-business_club_members--id-"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="businessclubmember-PUTapi-business_club_members--id-">Met à jour un BusinessClubMember</h2>

<p>
</p>



<span id="example-requests-PUTapi-business_club_members--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/business_club_members/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"attribute\": \"value\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/business_club_members/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "attribute": "value"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-business_club_members--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-business_club_members--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-business_club_members--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-business_club_members--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-business_club_members--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-business_club_members--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-business_club_members--id-" data-method="PUT"
      data-path="api/business_club_members/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-business_club_members--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-business_club_members--id-"
                    onclick="tryItOut('PUTapi-business_club_members--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-business_club_members--id-"
                    onclick="cancelTryOut('PUTapi-business_club_members--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-business_club_members--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/business_club_members/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-business_club_members--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-business_club_members--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-business_club_members--id-"
               value="1"
               data-component="url">
    <br>
<p>Le BusinessClubMember. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="PUTapi-business_club_members--id-"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
        </form>

                    <h2 id="businessclubmember-DELETEapi-business_club_members--id-">Supprime un BusinessClubMember</h2>

<p>
</p>



<span id="example-requests-DELETEapi-business_club_members--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/business_club_members/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/business_club_members/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-business_club_members--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-business_club_members--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-business_club_members--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-business_club_members--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-business_club_members--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-business_club_members--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-business_club_members--id-" data-method="DELETE"
      data-path="api/business_club_members/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-business_club_members--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-business_club_members--id-"
                    onclick="tryItOut('DELETEapi-business_club_members--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-business_club_members--id-"
                    onclick="cancelTryOut('DELETEapi-business_club_members--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-business_club_members--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/business_club_members/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-business_club_members--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-business_club_members--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-business_club_members--id-"
               value="1"
               data-component="url">
    <br>
<p>Le BusinessClubMember. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="customermessage">CustomerMessage</h1>

    <p>EndPoints pour gérer les CustomerMessage</p>

                                <h2 id="customermessage-POSTapi-customer_messages">Créer un nouveau CustomerMessage</h2>

<p>
</p>



<span id="example-requests-POSTapi-customer_messages">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/customer_messages" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"customer_name\": \"value\",
    \"customer_email\": \"value\",
    \"customer_contact\": \"value\",
    \"message_object\": \"value\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/customer_messages"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "customer_name": "value",
    "customer_email": "value",
    "customer_contact": "value",
    "message_object": "value"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-customer_messages">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-customer_messages" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-customer_messages"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-customer_messages"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-customer_messages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-customer_messages">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-customer_messages" data-method="POST"
      data-path="api/customer_messages"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-customer_messages', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-customer_messages"
                    onclick="tryItOut('POSTapi-customer_messages');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-customer_messages"
                    onclick="cancelTryOut('POSTapi-customer_messages');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-customer_messages"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/customer_messages</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-customer_messages"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-customer_messages"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>customer_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="customer_name"                data-endpoint="POSTapi-customer_messages"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>customer_email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="customer_email"                data-endpoint="POSTapi-customer_messages"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>customer_contact</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="customer_contact"                data-endpoint="POSTapi-customer_messages"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message_object</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="message_object"                data-endpoint="POSTapi-customer_messages"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
        </form>

                    <h2 id="customermessage-GETapi-customer_messages">Affiche les CustomerMessage</h2>

<p>
</p>



<span id="example-requests-GETapi-customer_messages">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/customer_messages?with_relation=false&amp;paginate=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/customer_messages"
);

const params = {
    "with_relation": "false",
    "paginate": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-customer_messages">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-customer_messages" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-customer_messages"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-customer_messages"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-customer_messages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-customer_messages">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-customer_messages" data-method="GET"
      data-path="api/customer_messages"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-customer_messages', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-customer_messages"
                    onclick="tryItOut('GETapi-customer_messages');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-customer_messages"
                    onclick="cancelTryOut('GETapi-customer_messages');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-customer_messages"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/customer_messages</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-customer_messages"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-customer_messages"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>customer_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="customer_name"                data-endpoint="GETapi-customer_messages"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>customer_email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="customer_email"                data-endpoint="GETapi-customer_messages"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>customer_contact</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="customer_contact"                data-endpoint="GETapi-customer_messages"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>message_object</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="message_object"                data-endpoint="GETapi-customer_messages"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="message"                data-endpoint="GETapi-customer_messages"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-customer_messages"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>paginate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="paginate"                data-endpoint="GETapi-customer_messages"
               value="false"
               data-component="query">
    <br>
<p>Utiliser la pagination. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="customermessage-GETapi-customer_messages--id-">Affiche un CustomerMessage</h2>

<p>
</p>



<span id="example-requests-GETapi-customer_messages--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/customer_messages/1?with_relation=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/customer_messages/1"
);

const params = {
    "with_relation": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-customer_messages--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-customer_messages--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-customer_messages--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-customer_messages--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-customer_messages--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-customer_messages--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-customer_messages--id-" data-method="GET"
      data-path="api/customer_messages/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-customer_messages--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-customer_messages--id-"
                    onclick="tryItOut('GETapi-customer_messages--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-customer_messages--id-"
                    onclick="cancelTryOut('GETapi-customer_messages--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-customer_messages--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/customer_messages/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-customer_messages--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-customer_messages--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-customer_messages--id-"
               value="1"
               data-component="url">
    <br>
<p>Le CustomerMessage. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-customer_messages--id-"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="customermessage-DELETEapi-customer_messages--id-">Supprime un CustomerMessage</h2>

<p>
</p>



<span id="example-requests-DELETEapi-customer_messages--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/customer_messages/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/customer_messages/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-customer_messages--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-customer_messages--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-customer_messages--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-customer_messages--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-customer_messages--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-customer_messages--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-customer_messages--id-" data-method="DELETE"
      data-path="api/customer_messages/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-customer_messages--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-customer_messages--id-"
                    onclick="tryItOut('DELETEapi-customer_messages--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-customer_messages--id-"
                    onclick="cancelTryOut('DELETEapi-customer_messages--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-customer_messages--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/customer_messages/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-customer_messages--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-customer_messages--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-customer_messages--id-"
               value="1"
               data-component="url">
    <br>
<p>Le CustomerMessage. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="cv">Cv</h1>

    <p>EndPoints pour gérer les Cv</p>

                                <h2 id="cv-POSTapi-cvs">Créer un nouveau Cv</h2>

<p>
</p>



<span id="example-requests-POSTapi-cvs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/cvs" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"attribute\": \"value\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/cvs"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "attribute": "value"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-cvs">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-cvs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-cvs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cvs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-cvs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cvs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-cvs" data-method="POST"
      data-path="api/cvs"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-cvs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-cvs"
                    onclick="tryItOut('POSTapi-cvs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-cvs"
                    onclick="cancelTryOut('POSTapi-cvs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-cvs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/cvs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-cvs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-cvs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="POSTapi-cvs"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
        </form>

                    <h2 id="cv-GETapi-cvs">Affiche les Cv</h2>

<p>
</p>



<span id="example-requests-GETapi-cvs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/cvs?with_relation=false&amp;paginate=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/cvs"
);

const params = {
    "with_relation": "false",
    "paginate": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-cvs">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cvs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cvs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cvs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cvs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cvs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cvs" data-method="GET"
      data-path="api/cvs"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cvs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cvs"
                    onclick="tryItOut('GETapi-cvs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cvs"
                    onclick="cancelTryOut('GETapi-cvs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cvs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cvs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cvs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cvs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="GETapi-cvs"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-cvs"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>paginate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="paginate"                data-endpoint="GETapi-cvs"
               value="false"
               data-component="query">
    <br>
<p>Utiliser la pagination. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="cv-GETapi-cvs--id-">Affiche un Cv</h2>

<p>
</p>



<span id="example-requests-GETapi-cvs--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/cvs/1?with_relation=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/cvs/1"
);

const params = {
    "with_relation": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-cvs--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cvs--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cvs--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cvs--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cvs--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cvs--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cvs--id-" data-method="GET"
      data-path="api/cvs/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cvs--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cvs--id-"
                    onclick="tryItOut('GETapi-cvs--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cvs--id-"
                    onclick="cancelTryOut('GETapi-cvs--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cvs--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cvs/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cvs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cvs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-cvs--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Cv. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-cvs--id-"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="cv-PUTapi-cvs--id-">Met à jour un Cv</h2>

<p>
</p>



<span id="example-requests-PUTapi-cvs--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/cvs/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"attribute\": \"value\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/cvs/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "attribute": "value"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-cvs--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-cvs--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-cvs--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-cvs--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-cvs--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-cvs--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-cvs--id-" data-method="PUT"
      data-path="api/cvs/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-cvs--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-cvs--id-"
                    onclick="tryItOut('PUTapi-cvs--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-cvs--id-"
                    onclick="cancelTryOut('PUTapi-cvs--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-cvs--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/cvs/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-cvs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-cvs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-cvs--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Cv. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="PUTapi-cvs--id-"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
        </form>

                    <h2 id="cv-DELETEapi-cvs--id-">Supprime un Cv</h2>

<p>
</p>



<span id="example-requests-DELETEapi-cvs--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/cvs/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/cvs/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-cvs--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-cvs--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-cvs--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-cvs--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-cvs--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-cvs--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-cvs--id-" data-method="DELETE"
      data-path="api/cvs/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-cvs--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-cvs--id-"
                    onclick="tryItOut('DELETEapi-cvs--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-cvs--id-"
                    onclick="cancelTryOut('DELETEapi-cvs--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-cvs--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/cvs/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-cvs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-cvs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-cvs--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Cv. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-POSTapi-chat">POST api/chat</h2>

<p>
</p>



<span id="example-requests-POSTapi-chat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/chat" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/chat"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-chat">
</span>
<span id="execution-results-POSTapi-chat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-chat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-chat"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-chat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-chat">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-chat" data-method="POST"
      data-path="api/chat"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-chat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-chat"
                    onclick="tryItOut('POSTapi-chat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-chat"
                    onclick="cancelTryOut('POSTapi-chat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-chat"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/chat</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-chat"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-chat"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-news">GET api/news</h2>

<p>
</p>



<span id="example-requests-GETapi-news">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/news" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/news"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-news">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;title&quot;: &quot;La BRVM recrute pour BRVM Academy !&quot;,
            &quot;url&quot;: &quot;https://www.brvm.org/fr/mediacentre/actualites/la-brvm-recrute-pour-brvm-academy&quot;,
            &quot;description&quot;: &quot;Vous &ecirc;tes passionn&eacute;(e) par la formation, le d&eacute;veloppement des comp&eacute;tences et les march&eacute;s financiers ? C&#039;est peut-&ecirc;tre l&#039;opportunit&eacute; que vous attendiez !\n\tLa Bourse R&eacute;gionale des Valeurs Mobili&egrave;res (BRVM) lance un appel &agrave; candidatures pour deux postes strat&eacute;giques au sein de BRVM Academy :\n&bull; Responsable de la Formation BRVM Academy ;\n\t&bull;&amp;nbsp; &amp;nbsp; Assistant Ex&eacute;cutif (H/F) BRVM Academy\nCes postes s&#039;adressent &agrave; des professionnels motiv&eacute;s, d&eacute;sireux de contribuer au d&eacute;veloppement du capital humain et &agrave; la promotion de la culture boursi&egrave;re dans l&#039;espace UEMOA.\n\n\tDate limite de candidature : 15 juillet 2026 &agrave; 17h00\nLien de t&eacute;l&eacute;chargement de l&#039;offre :&amp;nbsp;https://shorturl.at/42NLO\n\n\tLes dossiers de candidature (CV, lettre de motivation, dipl&ocirc;mes et r&eacute;f&eacute;rences professionnelles) sont &agrave; envoyer &agrave; : recrutement@brvm.org.\n\tN&#039;h&eacute;sitez pas &agrave; partager cette opportunit&eacute; avec votre r&eacute;seau.&quot;,
            &quot;date&quot;: &quot;Tue, 16 Jun 2026 15:14:17 +0000&quot;,
            &quot;timestamp&quot;: 1781622857,
            &quot;source&quot;: &quot;www.brvm.org&quot;,
            &quot;image&quot;: &quot;https://www.brvm.org/sites/default/files/styles/large/public/banner_brvm_academy.jpg?itok=_W_TwLe3&quot;
        },
        {
            &quot;title&quot;: &quot;APPEL &Agrave; CANDIDATURES : PRIX DE LA RECHERCHE DU 30&egrave;me ANNIVERSAIRE DE LA BRVM&quot;,
            &quot;url&quot;: &quot;https://www.brvm.org/fr/mediacentre/actualites/appel-candidatures-prix-de-la-recherche-du-30eme-anniversaire-de-la-brvm&quot;,
            &quot;description&quot;: &quot;Dans le cadre de la c&eacute;l&eacute;bration de ses 30 ans, la Bourse R&eacute;gionale des Valeurs Mobili&egrave;res (BRVM) lance le Prix de la Recherche du 30&egrave;me anniversaire de la BRVM, destin&eacute; &agrave; promouvoir l&#039;excellence acad&eacute;mique et &agrave; encourager la r&eacute;flexion scientifique sur les enjeux du march&eacute; financier r&eacute;gional.\n\n\n\n\t\tCette initiative vise &agrave; stimuler la production de travaux originaux et &agrave; renforcer les liens entre les chercheurs, les professionnels et les institutions du march&eacute; financier de l&#039;UEMOA.\n\n\t\tTh&eacute;matiques de recherche (non exhaustives) :\n\n\t\tLes candidats sont invit&eacute;s &agrave; soumettre des travaux portant notamment sur les axes suivants, sans s&rsquo;y limiter :\n\n\t\t&bull; Anomalies de march&eacute;, conditions &eacute;conomiques et pr&eacute;diction des rendements boursiers ;\n\n\t\t&bull; D&eacute;veloppement du march&eacute; financier et inclusion financi&egrave;re ;\n\n\t\t&bull; Int&eacute;gration des Bourses en Afrique ;\n\n\t\t&bull; Innovation financi&egrave;re et digitalisation des op&eacute;rations de march&eacute; (fintech, blockchain, tokenisation, IA) ;\n\n\t\t&bull; Gouvernance des entreprises cot&eacute;es ;\n\n\t\t&bull; Produits financiers et diversification des instruments cot&eacute;s en bourse ;\n\n\t\t&bull; R&eacute;gulation, transparence, stabilit&eacute; et s&eacute;curit&eacute; des march&eacute;s ;\n\n\t\t&bull; Finance durable et investissements ESG ;\n\n\t\t&bull; Inclusion financi&egrave;re et culture boursi&egrave;re des couches vuln&eacute;rables (femmes, jeunes) ;\n\n\t\t&bull; Financement des PME et des start-up par la Bourse ;\n\n\t\t&bull; Capitaux priv&eacute;s et sortie par la bourse ;\n\n\t\t&bull; Stabilit&eacute; financi&egrave;re et gestion des risques ;\n\n\t\t&bull; Microstructure des march&eacute;s financiers et boursiers ;\n\n\t\t&bull; Gestion d&rsquo;actifs ;\n\n\t\t&bull; Financement &agrave; long terme via les march&eacute;s ;\n\n\t\t&bull; Liquidit&eacute; des march&eacute;s ;\n\n\t\t&bull; Valorisation des instruments financiers.\n\n\t\tQui peut candidater ?\n\n\t\tTous les chercheurs travaillant sur les probl&eacute;matiques li&eacute;es au march&eacute; financier, au march&eacute; boursier et &agrave; l&#039;innovation financi&egrave;re dans l&#039;espace UEMOA.\n\n\t\tDate limite de soumission des candidatures : 15 octobre 2026\n\n\t\tPublication des r&eacute;sultats : 15 novembre 2026\n\n\t\tC&eacute;r&eacute;monie de remise du Prix : 18 d&eacute;cembre 2026\n\n\t\tLes dossiers de candidature sont &agrave; transmettre &agrave; : prixrecherchebrvm30ans@brvm.org avec pour objet : &laquo; Prix de la Recherche, 30 ans de la BRVM &raquo;.\n\n\t\t&Agrave; travers cette initiative, la BRVM confirme son ambition de contribuer au d&eacute;veloppement de la recherche appliqu&eacute;e au service d&#039;un financement durable, innovant et inclusif dans l&#039;espace UEMOA.\n\n\n\n\t\tLien de t&eacute;l&eacute;chargement de l&#039;Appel &agrave; candidatures ici : https://shorturl.at/hJy83\n\n\n\n\t\t#BRVM30Ans #PrixDeLaRecherche #BRVM #UEMOA #RechercheScientifique #Finance #Innovation #March&eacute;Financier #FinanceDurable #Afrique\n\n&amp;nbsp;&quot;,
            &quot;date&quot;: &quot;Mon, 15 Jun 2026 20:12:43 +0000&quot;,
            &quot;timestamp&quot;: 1781554363,
            &quot;source&quot;: &quot;www.brvm.org&quot;,
            &quot;image&quot;: &quot;https://www.brvm.org/sites/default/files/styles/large/public/banner_appel_doffres.jpg?itok=w1qhX9sX&quot;
        },
        {
            &quot;title&quot;: &quot;LANCEMENT DU CHAPTER UEMOA : FEDERER LES TALENTS POUR ACCELERER LE DEVELOPPEMENT DES MARCHES DE CAPITAUX REGIONAUX&quot;,
            &quot;url&quot;: &quot;https://www.brvm.org/fr/mediacentre/actualites/lancement-du-chapter-uemoa-federer-les-talents-pour-accelerer-le&quot;,
            &quot;description&quot;: &quot;Ce jeudi 11 juin 2026 &agrave; Abidjan, la BRVM, en partenariat avec l&rsquo;IFC (International Finance Corporation) et Paris EUROPLACE, a accueilli le lancement officiel du Chapter UEMOA du r&eacute;seau des Alumni du programme IFC&ndash;Paris EUROPLACE, une initiative strat&eacute;gique destin&eacute;e &agrave; renforcer le capital humain et structurer une communaut&eacute; d&rsquo;experts engag&eacute;s dans le d&eacute;veloppement des march&eacute;s de capitaux de l&rsquo;Union.\nDans son allocution de bienvenue, le Directeur G&eacute;n&eacute;ral de la BRVM, Dr Edoh Kossi AMENOUNVE, a soulign&eacute; que le d&eacute;veloppement durable des march&eacute;s financiers repose sur deux piliers essentiels : la professionnalisation accrue des acteurs du march&eacute; et le renforcement de l&rsquo;&eacute;ducation financi&egrave;re. Il a rappel&eacute; que les &eacute;conomies des pays de l&rsquo;Union ont besoin de professionnels de haut niveau, capables de concevoir et de mettre en &oelig;uvre des solutions innovantes r&eacute;pondant aux attentes des &eacute;metteurs, des investisseurs et des pouvoirs publics.\nLa c&eacute;r&eacute;monie a &eacute;galement &eacute;t&eacute; marqu&eacute;e par une keynote de M. Kossi TENOU, Pr&eacute;sident de l&rsquo;Autorit&eacute; des March&eacute;s Financiers de l&rsquo;UMOA (AMF-UMOA), autour du th&egrave;me : &laquo; Professionnalisation des m&eacute;tiers de la finance et &eacute;ducation boursi&egrave;re : les enjeux pour le d&eacute;veloppement des march&eacute;s de capitaux &raquo;. Cette intervention a mis en lumi&egrave;re l&rsquo;importance du renforcement des comp&eacute;tences pour soutenir la transformation financi&egrave;re de la r&eacute;gion.\nLes travaux se sont poursuivis avec un panel de haut niveau consacr&eacute; au th&egrave;me : &laquo; Quel march&eacute; de capitaux pour l&rsquo;UEMOA ? Attentes des &eacute;metteurs et des investisseurs &raquo;. Cette discussion a permis d&rsquo;&eacute;changer sur les d&eacute;fis et les opportunit&eacute;s li&eacute;s au financement de l&rsquo;&eacute;conomie r&eacute;gionale ainsi qu&rsquo;au renforcement de l&rsquo;attractivit&eacute; du march&eacute; financier. M. S&eacute;bastien KADIO-MOROKRO, Pr&eacute;sident-Directeur G&eacute;n&eacute;ral de PETRO IVOIRE, a partag&eacute; son exp&eacute;rience du march&eacute;, notamment &agrave; travers l&rsquo;op&eacute;ration d&rsquo;appel public &agrave; l&rsquo;&eacute;pargne r&eacute;alis&eacute;e sur le march&eacute; obligataire de la BRVM. Mme Patricia ZOUNDI-YAO, Pr&eacute;sidente du Mouvement des PME, a quant &agrave; elle port&eacute; la voix des petites et moyennes entreprises et mis en exergue leurs attentes vis-&agrave;-vis du march&eacute; financier r&eacute;gional.\nL&rsquo;apr&egrave;s-midi a &eacute;t&eacute; consacr&eacute; &agrave; trois sessions d&rsquo;&eacute;changes th&eacute;matiques particuli&egrave;rement riches :\nSession 1 : Accroissement de l&rsquo;offre &ndash; Comment amener plus d&rsquo;&eacute;metteurs sur le march&eacute; ?\nLes participants ont explor&eacute; les m&eacute;canismes permettant d&rsquo;encourager davantage d&rsquo;entreprises et d&rsquo;institutions &agrave; recourir au march&eacute; financier pour financer leur croissance.\nSession 2 : Demande et liquidit&eacute; &ndash; Comment mobiliser les investisseurs ?\nLes r&eacute;flexions ont port&eacute; sur les leviers susceptibles de renforcer la participation des investisseurs institutionnels et individuels afin d&rsquo;am&eacute;liorer la profondeur et la liquidit&eacute; du march&eacute;.\nSession 3 : Quel mod&egrave;le de march&eacute; pour la r&eacute;gion UEMOA ?\nCette derni&egrave;re s&eacute;quence a permis d&rsquo;ouvrir une r&eacute;flexion prospective sur l&rsquo;&eacute;volution de l&rsquo;&eacute;cosyst&egrave;me financier r&eacute;gional, son positionnement international et les innovations n&eacute;cessaires pour r&eacute;pondre aux besoins futurs de financement.\n&Agrave; travers la cr&eacute;ation du Chapter UEMOA, les Alumni du programme IFC&ndash;Paris EUROPLACE entendent constituer une v&eacute;ritable force de proposition aupr&egrave;s des bourses, des r&eacute;gulateurs, des gouvernements et de l&rsquo;ensemble des acteurs du secteur financier. Comme l&rsquo;a soulign&eacute; le Directeur G&eacute;n&eacute;ral de la BRVM, ce r&eacute;seau s&rsquo;inscrit dans une dynamique de construction d&rsquo;une finance africaine moderne, &eacute;thique, performante et souveraine, port&eacute;e par une nouvelle g&eacute;n&eacute;ration de leaders capables d&rsquo;influencer positivement l&rsquo;avenir des march&eacute;s de capitaux du continent.\n&Agrave; l&rsquo;issue de la c&eacute;r&eacute;monie de lancement, Dr Edoh Kossi AMENOUNVE a &eacute;t&eacute; d&eacute;sign&eacute; Parrain du Chapter UEMOA.\n&amp;nbsp;&quot;,
            &quot;date&quot;: &quot;Fri, 12 Jun 2026 11:00:52 +0000&quot;,
            &quot;timestamp&quot;: 1781262052,
            &quot;source&quot;: &quot;www.brvm.org&quot;,
            &quot;image&quot;: &quot;https://www.brvm.org/sites/default/files/styles/large/public/brvm-bannire-site-web-02_18.jpg?itok=9dWrFWMe&quot;
        },
        {
            &quot;title&quot;: &quot;La BRVM et l&rsquo;Etat ivoirien, &agrave; travers le Minist&egrave;re D&eacute;l&eacute;gu&eacute;, charg&eacute; de l&rsquo;Int&eacute;gration Africaine et des Ivoiriens de l&rsquo;Ext&eacute;rieur, unissent leurs efforts pour mobiliser l&rsquo;&eacute;pargne de la diaspora&quot;,
            &quot;url&quot;: &quot;https://www.brvm.org/fr/mediacentre/actualites/la-brvm-et-letat-ivoirien-travers-le-ministere-delegue-charge-de-lintegration&quot;,
            &quot;description&quot;: &quot;Ce mercredi 10 juin 2026 &agrave; Abidjan, la Bourse R&eacute;gionale des Valeurs Mobili&egrave;res (BRVM) et le Minist&egrave;re D&eacute;l&eacute;gu&eacute; aupr&egrave;s du Minist&egrave;re d&#039;&Eacute;tat, Minist&egrave;re des Affaires &Eacute;trang&egrave;res et de la Coop&eacute;ration Internationale, charg&eacute; de l&rsquo;Int&eacute;gration Africaine et des Ivoiriens de l&rsquo;Ext&eacute;rieur, ont pos&eacute; les jalons d&rsquo;une coop&eacute;ration historique par la signature d&rsquo;un Protocole d&rsquo;Entente visant &agrave; renforcer la contribution de la diaspora ivoirienne au d&eacute;veloppement &eacute;conomique national.\nCette initiative s&rsquo;inscrit dans une vision claire : transformer le formidable potentiel financier de la diaspora en un v&eacute;ritable levier d&rsquo;investissement productif au service de la croissance, de la cr&eacute;ation d&rsquo;emplois et du financement des projets structurants en C&ocirc;te d&rsquo;Ivoire.\nEn effet, chaque ann&eacute;e, les Ivoiriens &eacute;tablis &agrave; l&rsquo;&eacute;tranger d&eacute;montrent leur attachement &agrave; leur pays &agrave; travers des transferts financiers. En 2025, ceux-ci ont atteint pr&egrave;s de 938 milliards de FCFA. Au-del&agrave; de leur impact social ind&eacute;niable sur les m&eacute;nages, ces ressources repr&eacute;sentent &eacute;galement une opportunit&eacute; exceptionnelle pour soutenir durablement le d&eacute;veloppement du pays.\nSelon le Ministre Adama DOSSO : &laquo; Nous voulons que chaque Ivoirienne et chaque Ivoirien de l&rsquo;Ext&eacute;rieur soit non seulement un acteur du rayonnement de notre pays, mais &eacute;galement un investisseur, un partenaire strat&eacute;gique et un v&eacute;ritable acteur de son d&eacute;veloppement. &raquo;\nPour la BRVM, ce partenariat ouvre un nouvel axe dans la mobilisation de l&rsquo;&eacute;pargne africaine. Il s&rsquo;agit de permettre aux membres de la diaspora d&rsquo;acc&eacute;der &agrave; des opportunit&eacute;s d&rsquo;investissement transparentes, s&eacute;curis&eacute;es et rentables, tout en participant directement &agrave; la transformation &eacute;conomique de leur pays.\nLe Directeur G&eacute;n&eacute;ral de la BRVM, Dr Edoh Kossi AMENOUNVE, a r&eacute;sum&eacute; cette ambition en une formule forte : &laquo; Avec ce protocole, nous op&eacute;rons un v&eacute;ritable changement de paradigme : nous passons de l&rsquo;envoi d&rsquo;argent &agrave; l&rsquo;investissement citoyen. &raquo;\nConcr&egrave;tement, cette collaboration permettra notamment (i) de renforcer l&rsquo;information et la sensibilisation de la diaspora sur les opportunit&eacute;s offertes par le march&eacute; financier r&eacute;gional ; (ii) d&rsquo;explorer la mise en place d&rsquo;instruments innovants tels que les Diaspora Bonds et d&rsquo;autres v&eacute;hicules d&rsquo;investissement adapt&eacute;s ; (iii) de faciliter l&rsquo;acc&egrave;s aux produits financiers gr&acirc;ce &agrave; des solutions digitales permettant d&rsquo;investir depuis l&rsquo;&eacute;tranger&amp;nbsp; et (iv) d&rsquo;encourager une participation accrue de la diaspora au financement des projets publics et priv&eacute;s &agrave; fort impact &eacute;conomique et social.\nAvec ses 47 soci&eacute;t&eacute;s cot&eacute;es, plus de 200 lignes obligataires et une capitalisation globale avoisinant 29 000 milliards de FCFA, la BRVM offre aujourd&rsquo;hui un cadre solide pour accueillir cette nouvelle dynamique d&rsquo;investissement.\nLa signature de ce Protocole d&rsquo;Entente n&rsquo;est pas une finalit&eacute;. Elle constitue le point de d&eacute;part d&rsquo;une coop&eacute;ration ambitieuse visant &agrave; faire de la diaspora r&eacute;gionale un acteur central du financement du d&eacute;veloppement de l&rsquo;UEMOA.\n&amp;nbsp;&quot;,
            &quot;date&quot;: &quot;Thu, 11 Jun 2026 10:42:34 +0000&quot;,
            &quot;timestamp&quot;: 1781174554,
            &quot;source&quot;: &quot;www.brvm.org&quot;,
            &quot;image&quot;: &quot;https://www.brvm.org/sites/default/files/styles/large/public/brvm-bannire-site-web-02_17.jpg?itok=u3yhFi8B&quot;
        },
        {
            &quot;title&quot;: &quot;RIGA 2026 : Le Directeur G&eacute;n&eacute;ral de la BRVM partage son expertise et l&#039;exp&eacute;rience de l&#039;UEMOA&quot;,
            &quot;url&quot;: &quot;https://www.brvm.org/fr/mediacentre/actualites/riga-2026-le-directeur-general-de-la-brvm-partage-son-expertise-et&quot;,
            &quot;description&quot;: &quot;Le Directeur G&eacute;n&eacute;ral de la BRVM, Dr Edoh Kossi AMENOUNVE, partage &agrave; Riga, en Lettonie, son expertise et l&rsquo;exp&eacute;rience de l&rsquo;UEMOA en mati&egrave;re de march&eacute; financier r&eacute;gional avec les pays baltiques : l&rsquo;Estonie, la Lituanie et la Lettonie.\n\n\t&Agrave; l&rsquo;invitation de la Banque Europ&eacute;enne pour la Reconstruction et le D&eacute;veloppement (BERD), Dr Edoh Kossi AMENOUNVE a eu l&rsquo;honneur de participer, ce 5 juin 2026, &agrave; la 35&egrave;me Assembl&eacute;e annuelle et au Forum des affaires.\n\tCette rencontre a &eacute;t&eacute; l&rsquo;opportunit&eacute; pour le Directeur G&eacute;n&eacute;ral de la BRVM d&rsquo;&eacute;changer avec plusieurs d&eacute;cideurs de haut niveau, notamment M. Kristupas Vaitiekūnas, Ministre des Finances de la Lituanie, autour des enjeux li&eacute;s &agrave; la construction de march&eacute;s de capitaux r&eacute;gionaux int&eacute;gr&eacute;s.\n\tAu cours de ces discussions, anim&eacute;es par Mme Katie Martin, journaliste au Financial Times, Dr Edoh Kossi AMENOUNVE a partag&eacute; l&rsquo;exp&eacute;rience de l&rsquo;Union &Eacute;conomique et Mon&eacute;taire Ouest-Africaine (UEMOA) dans la cr&eacute;ation et le d&eacute;veloppement d&rsquo;un march&eacute; financier r&eacute;gional construit autour des principaux atouts ci-apr&egrave;s : une banque centrale unique (BCEAO), une monnaie commune (FCFA), une int&eacute;gration &eacute;conomique engag&eacute;e depuis 1994 (UEMOA), ainsi qu&rsquo;un cadre juridique harmonis&eacute; (OHADA).\n\tLe Directeur G&eacute;n&eacute;ral de la BRVM a pr&eacute;sent&eacute; les principaux d&eacute;fis qui ont &eacute;t&eacute; relev&eacute;s pour b&acirc;tir ce mod&egrave;le r&eacute;gional :\n\t&bull; la mise en place d&rsquo;une autorit&eacute; r&eacute;gionale de r&eacute;gulation (AMF-UMOA) et la cr&eacute;ation d&rsquo;institutions priv&eacute;es d&eacute;mutualis&eacute;es, notamment la BRVM et le D&eacute;positaire Central/Banque de R&egrave;glement (DC/BR), gr&acirc;ce &agrave; la mobilisation d&rsquo;investisseurs institutionnels et particuliers issus des pays de l&rsquo;Union afin de constituer le capital aux c&ocirc;t&eacute;s des &Eacute;tats membres ;\n\t&bull; les enjeux technologiques li&eacute;s &agrave; l&rsquo;interconnexion des huit pays, avec une &eacute;galit&eacute; d&rsquo;acc&egrave;s au march&eacute; pour tous les courtiers et investisseurs, quel que soit leur pays de r&eacute;sidence ;\n\t&bull; la migration des soci&eacute;t&eacute;s historiquement cot&eacute;es &agrave; la Bourse des Valeurs d&rsquo;Abidjan (BVA) vers la BRVM avant le lancement officiel des transactions, le 16 septembre 1998.\n\tAujourd&rsquo;hui, avec 47 soci&eacute;t&eacute;s totalisant une capitalisation de 16 966 milliards de FCFA, soit 30,03 milliards de dollars, et 205 lignes obligataires repr&eacute;sentant 12 029 milliards de FCFA, soit 21,3 milliards de dollars, la BRVM, cinqui&egrave;me bourse d&rsquo;Afrique, est consid&eacute;r&eacute;e comme un succ&egrave;s politique, technologique et &eacute;conomique.\n\tL&rsquo;audience a manifest&eacute; un vif int&eacute;r&ecirc;t pour la solidit&eacute; et la cr&eacute;dibilit&eacute; des infrastructures de march&eacute; de l&rsquo;UEMOA, notamment leur interconnexion, ainsi que pour l&rsquo;&eacute;volution, au fil des ann&eacute;es, de la base d&rsquo;investisseurs institutionnels et particuliers. Ces sujets constituent &eacute;galement des d&eacute;fis majeurs pour les trois pays baltiques.\n\n\tDr Edoh Kossi AMENOUNVE a &eacute;galement pr&eacute;sent&eacute; les r&eacute;formes et actions en cours visant &agrave; renforcer le dynamisme de la BRVM : la poursuite des privatisations dans les pays de l&rsquo;Union, l&rsquo;encouragement des sorties de fonds de private equity par la bourse, les admissions volontaires des champions nationaux et des PME, l&rsquo;am&eacute;lioration de la liquidit&eacute; du march&eacute; par des r&eacute;formes de microstructure (&eacute;largissement du flottant, fractionnement des titres, mise en place de market makers, allongement des heures de cotation, etc.), ainsi que le renforcement de l&rsquo;&eacute;ducation financi&egrave;re des populations.\n\n\tL&rsquo;exp&eacute;rience des privatisations et des introductions en bourse (IPO) qui s&rsquo;en sont suivies sur le march&eacute; financier r&eacute;gional de l&rsquo;UEMOA, ainsi que les efforts d&eacute;ploy&eacute;s en mati&egrave;re d&rsquo;&eacute;ducation financi&egrave;re, constituent des sources d&rsquo;inspiration pour les pays baltiques.\n\tLe Directeur G&eacute;n&eacute;ral de la BRVM a enfin partag&eacute; avec l&rsquo;auditoire la vision strat&eacute;gique de l&rsquo;institution &agrave; l&rsquo;horizon 2030, fond&eacute;e notamment sur deux axes majeurs :\n\t&bull; l&rsquo;int&eacute;gration des nouvelles technologies, en particulier l&rsquo;intelligence artificielle, dans les processus boursiers ;\n\t&bull; le d&eacute;veloppement de la finance durable afin de positionner davantage la BRVM comme une place financi&egrave;re de r&eacute;f&eacute;rence en Afrique.\n\tLa BRVM se r&eacute;jouit de la convergence des probl&eacute;matiques et des r&eacute;flexions qui ouvrent la voie &agrave; des perspectives de coop&eacute;ration susceptibles de na&icirc;tre entre l&rsquo;UEMOA et les pays baltiques afin d&rsquo;acc&eacute;l&eacute;rer leur d&eacute;veloppement gr&acirc;ce &agrave; une contribution accrue des march&eacute;s de capitaux et &agrave; une coop&eacute;ration renforc&eacute;e avec des institutions internationales, notamment la BERD.\n\n\t&Agrave; ce jour, la BERD dispose d&rsquo;un capital de base de 34 milliards d&rsquo;euros et a investi plus de 210 milliards d&rsquo;euros dans pr&egrave;s de 7 000 projets. Depuis quelques ann&eacute;es, elle poursuit son expansion sur le continent africain, avec un accent particulier sur le d&eacute;veloppement du secteur priv&eacute;, des infrastructures durables et des march&eacute;s de capitaux. Elle a ouvert, en 2025, des bureaux &agrave; Abidjan, Dakar et Cotonou.\n\tLes trois pays baltiques repr&eacute;sentent, quant &agrave; eux, environ 6 millions d&rsquo;habitants pour un PIB cumul&eacute; de pr&egrave;s de 180 milliards de dollars am&eacute;ricains. Ils disposent de bourses nationales mais sont regroup&eacute;s au sein du Nasdaq Baltic, dont la capitalisation boursi&egrave;re cumul&eacute;e est estim&eacute;e &agrave; plus de 11,46 milliards d&rsquo;euros pour 70 soci&eacute;t&eacute;s cot&eacute;es. La Lituanie constitue la plus grande &eacute;conomie de la r&eacute;gion, tandis que l&rsquo;Estonie se distingue par son leadership technologique et num&eacute;rique.\n\t&amp;nbsp;&quot;,
            &quot;date&quot;: &quot;Fri, 05 Jun 2026 14:34:29 +0000&quot;,
            &quot;timestamp&quot;: 1780670069,
            &quot;source&quot;: &quot;www.brvm.org&quot;,
            &quot;image&quot;: &quot;https://www.brvm.org/sites/default/files/styles/large/public/050626_riga_2026.jpg?itok=whr4tVWW&quot;
        },
        {
            &quot;title&quot;: &quot;BRVM AWARDS 2026&quot;,
            &quot;url&quot;: &quot;https://www.brvm.org/fr/mediacentre/actualites/brvm-awards-2026&quot;,
            &quot;description&quot;: &quot;La Bourse R&eacute;gionale des Valeurs Mobili&egrave;res (BRVM) a organis&eacute;, les 26 et 27 mars 2026 &agrave; Dakar, la 7&egrave;me &eacute;dition des BRVM Awards, consacrant l&rsquo;excellence et les meilleures performances du march&eacute; financier r&eacute;gional de l&rsquo;UEMOA.\n&amp;nbsp;\nCet &eacute;v&eacute;nement de r&eacute;f&eacute;rence a r&eacute;uni les principaux acteurs du march&eacute; financier r&eacute;gional, notamment l&#039;Autorit&eacute; de r&eacute;gulation (AMF-UMOA) les soci&eacute;t&eacute;s cot&eacute;es, les Soci&eacute;t&eacute;s de Gestion et d&rsquo;Interm&eacute;diation (SGI), les soci&eacute;t&eacute;s de gestion d&rsquo;actifs, les investisseurs institutionnels ainsi que les partenaires et m&eacute;dias sp&eacute;cialis&eacute;s.\n&amp;nbsp;\nLes laur&eacute;ats de l&#039;&eacute;dition 2026\n&amp;nbsp;\n&Agrave; l&rsquo;issue des travaux du jury ind&eacute;pendant pr&eacute;sid&eacute; par Monsieur Didier Acouetey, les distinctions suivantes ont &eacute;t&eacute; attribu&eacute;es :\n&amp;nbsp;\n1. Soci&eacute;t&eacute; cot&eacute;e de l&rsquo;ann&eacute;e : ECOBANK C&ocirc;te d&rsquo;Ivoire\n2. Soci&eacute;t&eacute; de Gestion et d&rsquo;Interm&eacute;diation (SGI) de l&rsquo;ann&eacute;e : CGF Bourse\n3. Soci&eacute;t&eacute; de Gestion des OPC (SGO) de l&rsquo;ann&eacute;e :&amp;nbsp; NSIA Asset Management\n4. Op&eacute;ration de l&rsquo;ann&eacute;e &ndash; Obligations : Emprunt obligataire TPCI 5,90% 2025-2030 (TPCI.O95) &Eacute;tat de C&ocirc;te d&rsquo;Ivoire\n5. Op&eacute;ration de l&rsquo;ann&eacute;e &ndash; Actions (IPO / FO / Admission) : Banque Internationale pour l&rsquo;Industrie et le Commerce (BIIC B&eacute;nin)\n6. Op&eacute;ration innovante de l&rsquo;ann&eacute;e : Social Bond CRRH-UEMOA 6,00 % (CRRH.O11)\n7. M&eacute;dia financier de l&rsquo;ann&eacute;e : Sika Finance\n8. Organisme de Placement Collectif (OPC) de l&rsquo;ann&eacute;e :&amp;nbsp; SICAV Attijari Oblig (Attijari Asset Management)\n9. Fonds Commun de Titrisation de Cr&eacute;ances (FCTC) de l&rsquo;ann&eacute;e : FCTC SENELEC 2025-2030\n10. Arrangeur de l&rsquo;ann&eacute;e : Invictus Capital &amp;amp; Finance\n&amp;nbsp;\nCes distinctions r&eacute;compensent les acteurs qui se sont illustr&eacute;s par leurs performances, leur gouvernance, leur capacit&eacute; d&rsquo;innovation ainsi que leur contribution significative au d&eacute;veloppement du march&eacute; financier r&eacute;gional au cours de l&rsquo;ann&eacute;e boursi&egrave;re 2025.\n&amp;nbsp;\nUne &eacute;dition marqu&eacute;e par l&rsquo;innovation et la diversification.\n&amp;nbsp;\nCette 7&egrave;me &eacute;dition des BRVM Awards se distingue par l&rsquo;introduction de nouvelles cat&eacute;gories, li&eacute;es notamment aux Organismes de Placement Collectif (OPC), aux Fonds Communs de Titrisation de cr&eacute;ances (FCTC) et &agrave; l&#039;arrangeur de l&#039;ann&eacute;e, traduisant la transformation progressive du march&eacute; financier r&eacute;gional.\n&amp;nbsp;\nElle confirme &eacute;galement la dynamique de croissance de la BRVM, port&eacute;e par :\n- une diversification accrue des instruments financiers,\n- une participation plus accrue des investisseurs particuliers,\n- un renforcement des exigences en mati&egrave;re de gouvernance et de transparence.\n&amp;nbsp;\nLa 7&egrave;me &eacute;dition des BRVM Awards a &eacute;t&eacute; l&rsquo;occasion de d&eacute;cerner un prix sp&eacute;cial &agrave;&amp;nbsp; la Banque Arabe pour le D&eacute;veloppement &Eacute;conomique en Afrique (BADEA) et le Grand Prix d&#039;honneur a &eacute;t&eacute; attribu&eacute; &agrave; Son Excellence Monsieur Bassirou Diomaye FAYE, Pr&eacute;sident de la R&eacute;publique du S&eacute;n&eacute;gal.\n&amp;nbsp;\n&Agrave; propos des BRVM Awards\n&amp;nbsp;\nLes BRVM Awards, institu&eacute;s en 2020, visent &agrave; promouvoir l&rsquo;excellence sur le march&eacute; financier r&eacute;gional de l&rsquo;UEMOA en distinguant chaque ann&eacute;e les acteurs les plus performants et les initiatives les plus structurantes.\n&amp;nbsp;&quot;,
            &quot;date&quot;: &quot;Sat, 28 Mar 2026 18:47:03 +0000&quot;,
            &quot;timestamp&quot;: 1774723623,
            &quot;source&quot;: &quot;www.brvm.org&quot;,
            &quot;image&quot;: &quot;https://www.brvm.org/sites/default/files/styles/large/public/news.jpg?itok=_84Y12rt&quot;
        },
        {
            &quot;title&quot;: &quot;LA BRVM SONNE LA CLOCHE POUR L&rsquo;&Eacute;GALIT&Eacute; DES GENRES ET APPELLE &Agrave; DAVANTAGE D&rsquo;ACTIONS EN FAVEUR DE L&rsquo;INCLUSION DES FEMMES&quot;,
            &quot;url&quot;: &quot;https://www.brvm.org/fr/mediacentre/actualites/la-brvm-sonne-la-cloche-pour-legalite-des-genres-et-appelle-davantage&quot;,
            &quot;description&quot;: &quot;La Bourse R&eacute;gionale des Valeurs Mobili&egrave;res (BRVM) a organis&eacute;, ce lundi 9 mars 2026 &agrave; son si&egrave;ge &agrave; Abidjan, la c&eacute;r&eacute;monie de &laquo; Ring the Bell for Gender Equality &raquo;, une initiative internationale qui mobilise les places boursi&egrave;res &agrave; travers le monde pour promouvoir l&rsquo;&eacute;galit&eacute; entre les femmes et les hommes dans la sph&egrave;re &eacute;conomique et financi&egrave;re.\n\n\t\t&amp;nbsp;\n\n\n\n\t\tSouhaitant la bienvenue aux invit&eacute;s du jour, le Directeur G&eacute;n&eacute;ral de la BRVM, Dr Edoh Kossi AMENOUNVE, a rappel&eacute; que l&rsquo;&eacute;galit&eacute; des genres constitue aujourd&rsquo;hui un enjeu &eacute;conomique majeur et non plus uniquement une question sociale. Il a soulign&eacute; qu&rsquo;une &eacute;conomie qui exclut les femmes se prive de plus de la moiti&eacute; de sa force de travail, de son &eacute;nergie et de son potentiel, ce qui repr&eacute;sente un manque &agrave; gagner estim&eacute; &agrave; 95 milliards de dollars par an pour l&rsquo;Afrique.\n\n\t\t&amp;nbsp;\n\n\n\n\t\tPlac&eacute;e sous le th&egrave;me &laquo; Droits. Justice. Action. Pour toutes les femmes et les filles &raquo;, cette &eacute;dition a &eacute;t&eacute; l&rsquo;occasion de rappeler la n&eacute;cessit&eacute; d&rsquo;aller au-del&agrave; des engagements de principe pour promouvoir des actions concr&egrave;tes en faveur de l&rsquo;&eacute;galit&eacute;. Comme l&rsquo;a indiqu&eacute; le Directeur G&eacute;n&eacute;ral de la BRVM, les entreprises qui valorisent la diversit&eacute; dans leurs &eacute;quipes dirigeantes sont plus innovantes et plus performantes, tandis que les pays qui investissent dans l&rsquo;autonomisation des femmes enregistrent une croissance &eacute;conomique plus rapide.\n\n\t\t&amp;nbsp;\n\n\n\n\t\tLe Directeur G&eacute;n&eacute;ral a &eacute;galement mis en lumi&egrave;re les d&eacute;fis persistants dans les march&eacute;s financiers, o&ugrave; les femmes demeurent encore sous-repr&eacute;sent&eacute;es dans l&rsquo;investissement, la gouvernance des entreprises cot&eacute;es et certaines fonctions de direction. Il a &eacute;galement rappel&eacute; que de nombreuses femmes leaders &agrave; l&rsquo;&eacute;chelle mondiale illustrent la capacit&eacute; des femmes &agrave; transformer les organisations et &agrave; diriger des institutions majeures.\n\n\t\t&amp;nbsp;\n\n\n\n\t\tDans ce contexte, la BRVM r&eacute;affirme son engagement &agrave; contribuer activement &agrave; la promotion de l&rsquo;&eacute;galit&eacute; des genres dans les march&eacute;s financiers, notamment en encourageant davantage de femmes &agrave; investir sur le march&eacute; financier r&eacute;gional, en promouvant leur pr&eacute;sence dans les instances dirigeantes des entreprises cot&eacute;es et en soutenant l&rsquo;entrepreneuriat f&eacute;minin, reconnu comme un moteur essentiel de transformation &eacute;conomique en Afrique.\n\n\t\t&amp;nbsp;\n\n\n\n\t\tLa c&eacute;r&eacute;monie a enregistr&eacute; la participation de plusieurs personnalit&eacute;s de haut niveau, dont Son Excellence Madame Sandra CHOUFANI, Ambassadrice du Canada pr&egrave;s la R&eacute;publique de C&ocirc;te d&rsquo;Ivoire, conf&eacute;renci&egrave;re invit&eacute;e, Madame Marie-H&eacute;l&egrave;ne FADIGA, Inspectrice G&eacute;n&eacute;rale des Finances de C&ocirc;te d&rsquo;Ivoire, ainsi que Madame Adjaratou Fatou N&rsquo;DIAYE, Repr&eacute;sentante r&eacute;sidente de ONU Femmes en C&ocirc;te d&rsquo;Ivoire, partenaire de longue date de la BRVM dans l&rsquo;organisation de cette initiative.\n\n\t\t&amp;nbsp;\n\n\n\n\t\tUn panel de discussion anim&eacute; par Mesdames Manon KARAMOKO, Pr&eacute;sidente du WIC C&ocirc;te d&rsquo;Ivoire, Roselyne ABE, Pr&eacute;sidente de l&rsquo;APSGI, et Patricia ZOUNDI-YAO, Pr&eacute;sidente de MPME, sous la mod&eacute;ration de Mme Nabou FALL, a permis de mener des &eacute;changes sur des m&eacute;tiers autrefois consid&eacute;r&eacute;s comme r&eacute;serv&eacute;s aux hommes, dans lesquels les femmes s&rsquo;illustrent aujourd&rsquo;hui avec succ&egrave;s. Les intervenantes ont partag&eacute; leurs exp&eacute;riences et lanc&eacute; un appel &agrave; l&rsquo;action, rappelant que les comp&eacute;tences n&rsquo;ont pas de genre.\n\n\t\t&amp;nbsp;\n\n\n\n\t\t&Agrave; travers la c&eacute;r&eacute;monie &laquo; Ring the Bell for Gender Equality &raquo;, la BRVM r&eacute;affirme ainsi son engagement &agrave; faire du march&eacute; financier r&eacute;gional de l&rsquo;UEMOA l&rsquo;un des leviers d&rsquo;inclusion et de d&eacute;veloppement durable.\n\n&amp;nbsp;&quot;,
            &quot;date&quot;: &quot;Wed, 11 Mar 2026 12:01:55 +0000&quot;,
            &quot;timestamp&quot;: 1773230515,
            &quot;source&quot;: &quot;www.brvm.org&quot;,
            &quot;image&quot;: &quot;https://www.brvm.org/sites/default/files/styles/large/public/brvm-bannire-site-web-02_16.jpg?itok=bs3QAS1i&quot;
        },
        {
            &quot;title&quot;: &quot;LA BRVM ACCENTUE SON DYNAMISME EN CE D&Eacute;BUT D&rsquo;ANN&Eacute;E&quot;,
            &quot;url&quot;: &quot;https://www.brvm.org/fr/mediacentre/actualites/la-brvm-accentue-son-dynamisme-en-ce-debut-dannee&quot;,
            &quot;description&quot;: &quot;La capitalisation boursi&egrave;re du march&eacute; des actions de la BRVM s&rsquo;&eacute;l&egrave;ve, au 30 janvier 2026, &agrave; 14 069 658 676 033 FCFA, contre 13 330 711 875 596 FCFA au 31 d&eacute;cembre 2025, soit une progression de 5,54 %, correspondant &agrave; une variation positive de 738,95 milliards FCFA.\nCette progression est essentiellement tir&eacute;e par la hausse de certains titres, notamment UNILEVER CI (+35,57 %), SONATEL SN (+3,18 %), ECOBANK CI (+6,28 %), SIB CI (+9,57 %) et ORANGE CI (+1,68 %).\nDe mani&egrave;re g&eacute;n&eacute;rale, plusieurs soci&eacute;t&eacute;s du march&eacute; Actions de la BRVM enregistrent des performances positives depuis le d&eacute;but de l&rsquo;ann&eacute;e 2026, soit 39 soci&eacute;t&eacute;s sur 47.\nAu cours de la p&eacute;riode du 02 au 30 janvier 2026, la valeur totale des transactions s&rsquo;est &eacute;tablie &agrave; 31 179 075 413 FCFA pour 33 508 191 titres &eacute;chang&eacute;s, repr&eacute;sentant une hausse de 160,55 % par rapport au mois de janvier 2025.\n&Agrave; la date du 30 janvier 2026, la moyenne journali&egrave;re des transactions atteint 1 484 717 876,81 FCFA pour 1 595 628 titres &eacute;chang&eacute;s, contre 533,14 millions FCFA pour 500 791 titres &agrave; la m&ecirc;me p&eacute;riode de l&rsquo;ann&eacute;e pr&eacute;c&eacute;dente.\nL&rsquo;&eacute;volution de la capitalisation est port&eacute;e par un niveau d&rsquo;activit&eacute; soutenu, comme en t&eacute;moigne la hausse significative des volumes et des valeurs &eacute;chang&eacute;s.&quot;,
            &quot;date&quot;: &quot;Fri, 30 Jan 2026 20:53:21 +0000&quot;,
            &quot;timestamp&quot;: 1769806401,
            &quot;source&quot;: &quot;www.brvm.org&quot;,
            &quot;image&quot;: &quot;https://www.brvm.org/sites/default/files/styles/large/public/whatsapp_image_2026-01-30_at_18.59.28.jpeg?itok=IEHYBGc4&quot;
        },
        {
            &quot;title&quot;: &quot;BILAN 2025 DE LA BRVM : DES PERFORMANCES CONSOLIDEES ET UNE VISION STRATEGIQUE TOURNEE VERS L&rsquo;HORIZON 2030&quot;,
            &quot;url&quot;: &quot;https://www.brvm.org/fr/mediacentre/actualites/bilan-2025-de-la-brvm-des-performances-consolidees-et-une-vision-strategique&quot;,
            &quot;description&quot;: &quot;La Bourse R&eacute;gionale des Valeurs Mobili&egrave;res (BRVM) a tenu sa conf&eacute;rence de presse annuelle de pr&eacute;sentation du bilan de ses activit&eacute;s 2025, ce mardi 20 janvier 2026 &agrave; son si&egrave;ge &agrave; Abidjan.\nCette conf&eacute;rence plac&eacute;e sous le th&egrave;me : &laquo; De la consolidation des performances &agrave; la conqu&ecirc;te du futur &raquo;, a vu la participation des m&eacute;dias nationaux et internationaux, des acteurs du March&eacute; Financier R&eacute;gional et des partenaires institutionnels.\nCette c&eacute;r&eacute;monie a permis au Directeur G&eacute;n&eacute;ral de la BRVM, Dr Edoh Kossi AMENOUNVE de pr&eacute;senter les principaux r&eacute;sultats enregistr&eacute;s en 2025, ainsi que la vision strat&eacute;gique de la BRVM &agrave; l&rsquo;horizon 2030.\nDans sa pr&eacute;sentation, le Directeur G&eacute;n&eacute;ral a rappel&eacute; que l&rsquo;ann&eacute;e 2025 s&rsquo;est inscrite dans un contexte international marqu&eacute; par la fragmentation &eacute;conomique, la persistance des risques g&eacute;opolitiques, le retour de la guerre &eacute;conomique et une croissance mondiale mod&eacute;r&eacute;e estim&eacute;e &agrave; 3,2 %.\nIl a par ailleurs soulign&eacute; que le March&eacute; Financier R&eacute;gional (MFR) a jou&eacute; pleinement son r&ocirc;le dans la mobilisation de l&rsquo;&eacute;pargne locale et le financement des &eacute;conomies de l&rsquo;UEMOA. En 2025, 4 204,7 milliards FCFA de ressources ont &eacute;t&eacute; mobilis&eacute;s, un niveau historique depuis la cr&eacute;ation du march&eacute;, domin&eacute; par les &eacute;missions obligataires souveraines.\nLe march&eacute; secondaire a &eacute;galement enregistr&eacute; des performances remarquables telles que :\n&bull; Hausse de 25,26 % de l&rsquo;indice BRVM Composite, qui a franchi un nouveau seuil historique &agrave; 345,75 points ;\n&bull; Progression cumul&eacute;e de pr&egrave;s de 100 % sur cinq ans, traduisant la maturit&eacute; et l&rsquo;attractivit&eacute; croissante du march&eacute; ;\n&bull; Capitalisation boursi&egrave;re totale de 24 781,3 milliards FCFA, repr&eacute;sentant 18,37 % du PIB de l&rsquo;UEMOA ;\n&bull; Confirmation de la BRVM comme 5&egrave;me bourse africaine et 2&egrave;me place africaine de cotation des social bonds.\nLe Directeur G&eacute;n&eacute;ral a &eacute;galement fait savoir que l&rsquo;ann&eacute;e 2025 a &eacute;t&eacute; marqu&eacute;e par plusieurs actions structurantes, notamment (i) la cr&eacute;ation de nouveaux indices sectoriels pour renforcer la lisibilit&eacute; du march&eacute;, (ii) le d&eacute;veloppement de produits innovants, dont les obligations th&eacute;matiques et la promotion de la finance durable, (iii) l&rsquo;introduction en bourse d&rsquo;une grande banque r&eacute;gionale, l&rsquo;une des plus importantes IPO de l&rsquo;histoire du march&eacute; et (iv) le renforcement de la s&eacute;curit&eacute;, de la r&eacute;silience technologique et du plan de continuit&eacute; des activit&eacute;s.\nEn perspective, Dr Edoh Kossi AMENOUNVE a pr&eacute;sent&eacute; la vision BRVM Horizon 2030, ax&eacute;e sur : (i) la transformation technologique (intelligence artificielle, big data, blockchain), (ii) le d&eacute;veloppement de nouveaux produits financiers, notamment les ETF et les produits d&eacute;riv&eacute;s, (iii) le renforcement de la finance durable et inclusive, (iv) l&rsquo;approfondissement du march&eacute; pour le rendre plus liquide, plus profond et plus attractif et (v) la promotion de l&rsquo;&eacute;ducation boursi&egrave;re au sein de l&rsquo;UEMOA.\nEn conclusion, le Directeur G&eacute;n&eacute;ral a r&eacute;affirm&eacute; l&rsquo;engagement de la BRVM &agrave; accompagner les &Eacute;tats, les entreprises et les investisseurs dans la transformation &eacute;conomique de la sous-r&eacute;gion, en faisant du March&eacute; Financier R&eacute;gional un levier strat&eacute;gique de financement durable, inclusif et de cr&eacute;ation de valeur au service du d&eacute;veloppement de l&rsquo;UEMOA.&quot;,
            &quot;date&quot;: &quot;Tue, 20 Jan 2026 17:56:39 +0000&quot;,
            &quot;timestamp&quot;: 1768931799,
            &quot;source&quot;: &quot;www.brvm.org&quot;,
            &quot;image&quot;: &quot;https://www.brvm.org/sites/default/files/styles/large/public/brvm-bannire-site-web-02_15.jpg?itok=T3ueYbNe&quot;
        },
        {
            &quot;title&quot;: &quot;LE BULLETIN OFFICIEL DE LA COTE DE LA BRVM : DES EVOLUTIONS MAJEURES POUR UNE MEILLEURE LISIBILITE DU MARCHE&quot;,
            &quot;url&quot;: &quot;https://www.brvm.org/fr/mediacentre/actualites/le-bulletin-officiel-de-la-cote-de-la-brvm-des-evolutions-majeures-pour-une-0&quot;,
            &quot;description&quot;: &quot;Depuis le 2 janvier 2026, la Bourse R&eacute;gionale des Valeurs Mobili&egrave;res (BRVM) a introduit plusieurs &eacute;volutions structurantes dans son Bulletin Officiel de la Cote (BOC). Ces innovations visent un double objectif : renforcer la transparence du march&eacute; et am&eacute;liorer la compr&eacute;hension des informations boursi&egrave;res par l&rsquo;ensemble des investisseurs, qu&rsquo;ils soient institutionnels ou particuliers.\nTrois &eacute;volutions majeures m&eacute;ritent une attention particuli&egrave;re&amp;nbsp;: (i) Une clarification des cat&eacute;gories de titres obligataires, (ii) le remplacement des anciens indices sectoriels par de nouveaux indices et (iii) l&rsquo;institution d&rsquo;un indice Total Return.\n1. Une clarification renforc&eacute;e des cat&eacute;gories de titres obligataires\nLe nouveau format du BOC apporte une classification plus lisible et plus coh&eacute;rente des titres obligataires cot&eacute;s &agrave; la BRVM.\nD&eacute;sormais, les obligations sont regroup&eacute;es selon des cat&eacute;gories clairement identifi&eacute;es, permettant aux investisseurs de mieux appr&eacute;cier la nature des instruments, leur finalit&eacute; et leur profil de risque.\nOn distingue les classifications suivantes&amp;nbsp;:\n\n\n\t\tObligations classiques&amp;nbsp;:\n\n\n\n\t\tObligations souveraines&amp;nbsp;;\n\n\t\tObligations d&rsquo;institutions financi&egrave;res r&eacute;gionales et internationales&amp;nbsp;;\n\n\t\tObligations d&rsquo;entreprises.\n\n\n\n\t\tObligations Vertes, Socialement responsables et durables&amp;nbsp;:\n\n\n\n\t\tObligations souveraines GSS&amp;nbsp;;\n\n\t\tObligations GSS d&rsquo;institutions financi&egrave;res r&eacute;gionales et internationales&amp;nbsp;;\n\n\t\tObligations GSS d&rsquo;entreprises.\n\n\n\n\t\tFonds Communs de Titrisation de Cr&eacute;ances (FCTC)&amp;nbsp;:\n\n\n\n\t\tFCTC d&rsquo;Etat et d&rsquo;Institutions &agrave; participation majoritaire publique&amp;nbsp;;\n\n\t\tFCTC d&rsquo;Institutions Financi&egrave;res R&eacute;gionales et Internationales&amp;nbsp;;\n\n\t\tFCTC d&rsquo;Entreprises.\n\n\n\n\t\tSUKUK et titres assimiles&amp;nbsp;:\n\n\n\n\t\tSUKUK d&rsquo;Etat et d&rsquo;Institutions &agrave; participation majoritaire publique&amp;nbsp;;\n\n\t\tSUKUK d&rsquo;Institutions Financi&egrave;res R&eacute;gionales et Internationales&amp;nbsp;;\n\n\t\tSUKUK d&rsquo;Entreprises.\n\n\n\n\t\tObligations convertibles en Actions\n\nFocus sur les obligations GSS (Green, Social &amp;amp; Sustainability)\nUne innovation notable r&eacute;side dans la mise en &eacute;vidence sp&eacute;cifique des obligations GSS, &agrave; savoir :\n\n\n\t\tObligations vertes (Green Bonds)\n\n\t\tObligations socialement responsables (Social Bonds)\n\n\t\tObligations durables (Sustainability Bonds)\n\nCette distinction permet de :\n\n\n\t\tidentifier rapidement les instruments de financement &agrave; impact environnemental et social ;\n\n\t\tr&eacute;pondre aux attentes croissantes des investisseurs sensibles aux crit&egrave;res ESG (Environnement, Social, Gouvernance) ;\n\n\t\trenforcer l&rsquo;attractivit&eacute; du march&eacute; r&eacute;gional pour les financements durables.\n\nLe BOC devient ainsi un outil cl&eacute; pour accompagner le d&eacute;veloppement de la finance durable dans l&rsquo;espace UEMOA.\n2. Le remplacement des anciens indices sectoriels par de nouveaux indices plus repr&eacute;sentatifs\nAutre &eacute;volution majeure au BOC : le remplacement des anciens indices sectoriels par de nouveaux indices, con&ccedil;us pour mieux refl&eacute;ter la structure actuelle du march&eacute; et la r&eacute;alit&eacute; &eacute;conomique des entreprises cot&eacute;es.\nLes nouveaux indices sont les suivants&amp;nbsp;:\n\n\n\t\tBrvm&ndash;T&eacute;l&eacute;communications&amp;nbsp;;\n\n\t\tBRVM&ndash;consommation discr&eacute;tionnaire&amp;nbsp;;\n\n\t\tBRVM&ndash;Services Financiers&amp;nbsp;;\n\n\t\tBRVM-Consommation de Base&amp;nbsp;;\n\n\t\tBRVM&ndash;Industriels&amp;nbsp;;\n\n\t\tBRVM-Energie&amp;nbsp;;\n\n\t\tBRVM&ndash;Services Publics.\n\nPourquoi ce changement ?\nLes nouveaux indices sectoriels :\n\n\n\t\treposent sur une m&eacute;thodologie actualis&eacute;e ;\n\n\t\toffrent une meilleure repr&eacute;sentativit&eacute; des secteurs d&rsquo;activit&eacute; ;\n\n\t\tpermettent une analyse plus fine de la performance sectorielle.\n\nPour les investisseurs, cela se traduit par :\n\n\n\t\tune lecture plus pertinente des dynamiques sectorielles ;\n\n\t\tun meilleur outil de comparaison des performances ;\n\n\t\tune aide renforc&eacute;e &agrave; la prise de d&eacute;cision en mati&egrave;re d&rsquo;allocation d&rsquo;actifs.\n\n3. L&rsquo;indice Total Return : comprendre sa signification et son int&eacute;r&ecirc;t\nParmi les indicateurs d&eacute;sormais mieux valoris&eacute;s dans le BOC figure l&rsquo;indice Total Return, encore peu connu du grand public.\nQu&rsquo;est-ce qu&rsquo;un indice Total Return ?\nContrairement &agrave; un indice classique qui mesure uniquement l&rsquo;&eacute;volution des prix des titres, l&rsquo;indice Total Return int&egrave;gre :\n\n\n\t\tla variation des cours\n\n\t\tles revenus distribu&eacute;s, notamment les dividendes, en supposant leur r&eacute;investissement.\n\nIl offre ainsi une vision plus compl&egrave;te de la performance r&eacute;elle d&rsquo;un investissement boursier.\nPourquoi est-il important pour les investisseurs ?\nL&rsquo;indice Total Return permet :\n\n\n\t\td&rsquo;&eacute;valuer le rendement global d&rsquo;un portefeuille ;\n\n\t\tde comparer plus justement des strat&eacute;gies d&rsquo;investissement &agrave; long terme ;\n\n\t\tde mieux appr&eacute;cier l&rsquo;impact des dividendes sur la cr&eacute;ation de valeur.\n\nSa mise en avant dans le BOC contribue &agrave; &eacute;lever le niveau de culture financi&egrave;re des investisseurs et &agrave; promouvoir une approche plus globale de la performance boursi&egrave;re.\nUn BOC modernis&eacute; au service de la transparence et de la p&eacute;dagogie financi&egrave;re\nAvec ces &eacute;volutions introduites depuis le 2 janvier 2026, le Bulletin Officiel de la Cote de la BRVM s&rsquo;affirme comme :\n\n\n\t\tun outil d&rsquo;information plus clair et structur&eacute; ;\n\n\t\tun support p&eacute;dagogique pour les investisseurs ;\n\n\t\tun levier de modernisation et d&rsquo;attractivit&eacute; du march&eacute; financier r&eacute;gional.\n\nEn renfor&ccedil;ant la lisibilit&eacute; des donn&eacute;es, la BRVM confirme sa volont&eacute; d&rsquo;accompagner la mont&eacute;e en comp&eacute;tence des acteurs du march&eacute; et de soutenir le d&eacute;veloppement d&rsquo;un &eacute;cosyst&egrave;me financier plus inclusif, durable et performant.\n&amp;nbsp;&quot;,
            &quot;date&quot;: &quot;Fri, 16 Jan 2026 17:34:32 +0000&quot;,
            &quot;timestamp&quot;: 1768584872,
            &quot;source&quot;: &quot;www.brvm.org&quot;,
            &quot;image&quot;: &quot;https://www.brvm.org/sites/default/files/styles/large/public/siege_brvm_0.jpg?itok=ngoOVnKt&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-news" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-news"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-news"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-news" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-news">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-news" data-method="GET"
      data-path="api/news"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-news', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-news"
                    onclick="tryItOut('GETapi-news');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-news"
                    onclick="cancelTryOut('GETapi-news');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-news"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/news</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-news"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-news"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-analytics-overview">GET api/analytics/overview</h2>

<p>
</p>



<span id="example-requests-GETapi-analytics-overview">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/analytics/overview" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"period\": \"7d\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/analytics/overview"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "period": "7d"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-analytics-overview">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-analytics-overview" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-analytics-overview"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-analytics-overview"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-analytics-overview" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-analytics-overview">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-analytics-overview" data-method="GET"
      data-path="api/analytics/overview"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-analytics-overview', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-analytics-overview"
                    onclick="tryItOut('GETapi-analytics-overview');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-analytics-overview"
                    onclick="cancelTryOut('GETapi-analytics-overview');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-analytics-overview"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/analytics/overview</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-analytics-overview"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-analytics-overview"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>period</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="period"                data-endpoint="GETapi-analytics-overview"
               value="7d"
               data-component="body">
    <br>
<p>Example: <code>7d</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>7d</code></li> <li><code>30d</code></li> <li><code>90d</code></li></ul>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-cv_extractors">Extraire le texte de tous les CVs d&#039;un dossier</h2>

<p>
</p>



<span id="example-requests-GETapi-cv_extractors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/cv_extractors" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/cv_extractors"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-cv_extractors">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cv_extractors" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cv_extractors"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cv_extractors"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cv_extractors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cv_extractors">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cv_extractors" data-method="GET"
      data-path="api/cv_extractors"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cv_extractors', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cv_extractors"
                    onclick="tryItOut('GETapi-cv_extractors');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cv_extractors"
                    onclick="cancelTryOut('GETapi-cv_extractors');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cv_extractors"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cv_extractors</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cv_extractors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cv_extractors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-cv_extractors--cvId-">Extraire le texte d&#039;un CV spécifique par ID</h2>

<p>
</p>



<span id="example-requests-GETapi-cv_extractors--cvId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/cv_extractors/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/cv_extractors/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-cv_extractors--cvId-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cv_extractors--cvId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cv_extractors--cvId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cv_extractors--cvId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cv_extractors--cvId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cv_extractors--cvId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cv_extractors--cvId-" data-method="GET"
      data-path="api/cv_extractors/{cvId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cv_extractors--cvId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cv_extractors--cvId-"
                    onclick="tryItOut('GETapi-cv_extractors--cvId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cv_extractors--cvId-"
                    onclick="cancelTryOut('GETapi-cv_extractors--cvId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cv_extractors--cvId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cv_extractors/{cvId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cv_extractors--cvId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cv_extractors--cvId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>cvId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="cvId"                data-endpoint="GETapi-cv_extractors--cvId-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-cv_extractors-upload">Extraire le texte d&#039;un CV uploadé directement</h2>

<p>
</p>



<span id="example-requests-POSTapi-cv_extractors-upload">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/cv_extractors/upload" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "cv=@/tmp/phpVZZXWD" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/cv_extractors/upload"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('cv', document.querySelector('input[name="cv"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-cv_extractors-upload">
</span>
<span id="execution-results-POSTapi-cv_extractors-upload" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-cv_extractors-upload"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cv_extractors-upload"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-cv_extractors-upload" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cv_extractors-upload">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-cv_extractors-upload" data-method="POST"
      data-path="api/cv_extractors/upload"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-cv_extractors-upload', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-cv_extractors-upload"
                    onclick="tryItOut('POSTapi-cv_extractors-upload');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-cv_extractors-upload"
                    onclick="cancelTryOut('POSTapi-cv_extractors-upload');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-cv_extractors-upload"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/cv_extractors/upload</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-cv_extractors-upload"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-cv_extractors-upload"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cv</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="cv"                data-endpoint="POSTapi-cv_extractors-upload"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must not be greater than 5120 kilobytes. Example: <code>/tmp/phpVZZXWD</code></p>
        </div>
        </form>

                <h1 id="joboffer">JobOffer</h1>

    <p>EndPoints pour gérer les JobOffer</p>

                                <h2 id="joboffer-GETapi-job_offers">Affiche les JobOffer</h2>

<p>
</p>



<span id="example-requests-GETapi-job_offers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/job_offers?with_relation=false&amp;paginate=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/job_offers"
);

const params = {
    "with_relation": "false",
    "paginate": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-job_offers">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-job_offers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-job_offers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-job_offers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-job_offers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-job_offers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-job_offers" data-method="GET"
      data-path="api/job_offers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-job_offers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-job_offers"
                    onclick="tryItOut('GETapi-job_offers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-job_offers"
                    onclick="cancelTryOut('GETapi-job_offers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-job_offers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/job_offers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-job_offers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-job_offers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="GETapi-job_offers"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-job_offers"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>paginate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="paginate"                data-endpoint="GETapi-job_offers"
               value="false"
               data-component="query">
    <br>
<p>Utiliser la pagination. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="joboffer-GETapi-job_offers--id-">Affiche un JobOffer</h2>

<p>
</p>



<span id="example-requests-GETapi-job_offers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/job_offers/1?with_relation=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/job_offers/1"
);

const params = {
    "with_relation": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-job_offers--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-job_offers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-job_offers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-job_offers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-job_offers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-job_offers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-job_offers--id-" data-method="GET"
      data-path="api/job_offers/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-job_offers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-job_offers--id-"
                    onclick="tryItOut('GETapi-job_offers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-job_offers--id-"
                    onclick="cancelTryOut('GETapi-job_offers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-job_offers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/job_offers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-job_offers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-job_offers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-job_offers--id-"
               value="1"
               data-component="url">
    <br>
<p>Le JobOffer. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-job_offers--id-"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="joboffer-POSTapi-job_offers">Créer un nouveau JobOffer</h2>

<p>
</p>



<span id="example-requests-POSTapi-job_offers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/job_offers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 1,
    \"title\": \"Chargé D\'affaire\",
    \"content\": \"Cofina recrute.....\",
    \"summary\": \"En résumé....\",
    \"deadline\": \"2026-10-10\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/job_offers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 1,
    "title": "Chargé D'affaire",
    "content": "Cofina recrute.....",
    "summary": "En résumé....",
    "deadline": "2026-10-10"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-job_offers">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-job_offers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-job_offers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-job_offers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-job_offers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-job_offers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-job_offers" data-method="POST"
      data-path="api/job_offers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-job_offers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-job_offers"
                    onclick="tryItOut('POSTapi-job_offers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-job_offers"
                    onclick="cancelTryOut('POSTapi-job_offers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-job_offers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/job_offers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-job_offers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-job_offers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="POSTapi-job_offers"
               value="1"
               data-component="body">
    <br>
<p>L'attribut Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-job_offers"
               value="Chargé D'affaire"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>Chargé D'affaire</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="POSTapi-job_offers"
               value="Cofina recrute....."
               data-component="body">
    <br>
<p>L'attribut. Example: <code>Cofina recrute.....</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>summary</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="summary"                data-endpoint="POSTapi-job_offers"
               value="En résumé...."
               data-component="body">
    <br>
<p>L'attribut. Example: <code>En résumé....</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deadline</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deadline"                data-endpoint="POSTapi-job_offers"
               value="2026-10-10"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>2026-10-10</code></p>
        </div>
        </form>

                    <h2 id="joboffer-PUTapi-job_offers--id-">Met à jour un JobOffer</h2>

<p>
</p>



<span id="example-requests-PUTapi-job_offers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/job_offers/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"value\",
    \"content\": \"value\",
    \"summary\": \"value\",
    \"deadline\": \"value\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/job_offers/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "value",
    "content": "value",
    "summary": "value",
    "deadline": "value"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-job_offers--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-job_offers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-job_offers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-job_offers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-job_offers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-job_offers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-job_offers--id-" data-method="PUT"
      data-path="api/job_offers/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-job_offers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-job_offers--id-"
                    onclick="tryItOut('PUTapi-job_offers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-job_offers--id-"
                    onclick="cancelTryOut('PUTapi-job_offers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-job_offers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/job_offers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-job_offers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-job_offers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-job_offers--id-"
               value="1"
               data-component="url">
    <br>
<p>Le JobOffer. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-job_offers--id-"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="PUTapi-job_offers--id-"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>summary</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="summary"                data-endpoint="PUTapi-job_offers--id-"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deadline</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deadline"                data-endpoint="PUTapi-job_offers--id-"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
        </form>

                    <h2 id="joboffer-DELETEapi-job_offers--id-">Supprime un JobOffer</h2>

<p>
</p>



<span id="example-requests-DELETEapi-job_offers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/job_offers/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/job_offers/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-job_offers--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-job_offers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-job_offers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-job_offers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-job_offers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-job_offers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-job_offers--id-" data-method="DELETE"
      data-path="api/job_offers/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-job_offers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-job_offers--id-"
                    onclick="tryItOut('DELETEapi-job_offers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-job_offers--id-"
                    onclick="cancelTryOut('DELETEapi-job_offers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-job_offers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/job_offers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-job_offers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-job_offers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-job_offers--id-"
               value="1"
               data-component="url">
    <br>
<p>Le JobOffer. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="notification">Notification</h1>

    <p>EndPoints pour gérer les Notification</p>

                                <h2 id="notification-GETapi-notifications">Affiche les Notification</h2>

<p>
</p>



<span id="example-requests-GETapi-notifications">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/notifications?with_relation=false&amp;paginate=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/notifications"
);

const params = {
    "with_relation": "false",
    "paginate": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-notifications">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-notifications" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-notifications"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-notifications"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-notifications" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-notifications">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-notifications" data-method="GET"
      data-path="api/notifications"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-notifications', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-notifications"
                    onclick="tryItOut('GETapi-notifications');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-notifications"
                    onclick="cancelTryOut('GETapi-notifications');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-notifications"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/notifications</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-notifications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-notifications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="GETapi-notifications"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-notifications"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>paginate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="paginate"                data-endpoint="GETapi-notifications"
               value="false"
               data-component="query">
    <br>
<p>Utiliser la pagination. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="notification-GETapi-notifications-unread-count">Récupère le nombre de notifications non lues</h2>

<p>
</p>



<span id="example-requests-GETapi-notifications-unread-count">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/notifications/unread-count" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/notifications/unread-count"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-notifications-unread-count">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-notifications-unread-count" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-notifications-unread-count"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-notifications-unread-count"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-notifications-unread-count" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-notifications-unread-count">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-notifications-unread-count" data-method="GET"
      data-path="api/notifications/unread-count"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-notifications-unread-count', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-notifications-unread-count"
                    onclick="tryItOut('GETapi-notifications-unread-count');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-notifications-unread-count"
                    onclick="cancelTryOut('GETapi-notifications-unread-count');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-notifications-unread-count"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/notifications/unread-count</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-notifications-unread-count"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-notifications-unread-count"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="notification-PUTapi-notifications--id--mark-as-read">Marque une notification comme lue</h2>

<p>
</p>



<span id="example-requests-PUTapi-notifications--id--mark-as-read">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/notifications/1/mark-as-read" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/notifications/1/mark-as-read"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-notifications--id--mark-as-read">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-notifications--id--mark-as-read" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-notifications--id--mark-as-read"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-notifications--id--mark-as-read"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-notifications--id--mark-as-read" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-notifications--id--mark-as-read">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-notifications--id--mark-as-read" data-method="PUT"
      data-path="api/notifications/{id}/mark-as-read"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-notifications--id--mark-as-read', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-notifications--id--mark-as-read"
                    onclick="tryItOut('PUTapi-notifications--id--mark-as-read');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-notifications--id--mark-as-read"
                    onclick="cancelTryOut('PUTapi-notifications--id--mark-as-read');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-notifications--id--mark-as-read"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/notifications/{id}/mark-as-read</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-notifications--id--mark-as-read"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-notifications--id--mark-as-read"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-notifications--id--mark-as-read"
               value="1"
               data-component="url">
    <br>
<p>Le Notification. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="notification-PUTapi-notifications-mark-all-as-read">Marque toutes les notifications comme lues</h2>

<p>
</p>



<span id="example-requests-PUTapi-notifications-mark-all-as-read">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/notifications/mark-all-as-read" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/notifications/mark-all-as-read"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-notifications-mark-all-as-read">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-notifications-mark-all-as-read" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-notifications-mark-all-as-read"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-notifications-mark-all-as-read"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-notifications-mark-all-as-read" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-notifications-mark-all-as-read">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-notifications-mark-all-as-read" data-method="PUT"
      data-path="api/notifications/mark-all-as-read"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-notifications-mark-all-as-read', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-notifications-mark-all-as-read"
                    onclick="tryItOut('PUTapi-notifications-mark-all-as-read');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-notifications-mark-all-as-read"
                    onclick="cancelTryOut('PUTapi-notifications-mark-all-as-read');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-notifications-mark-all-as-read"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/notifications/mark-all-as-read</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-notifications-mark-all-as-read"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-notifications-mark-all-as-read"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="notification-GETapi-notifications--id-">Affiche un Notification</h2>

<p>
</p>



<span id="example-requests-GETapi-notifications--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/notifications/1?with_relation=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/notifications/1"
);

const params = {
    "with_relation": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-notifications--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-notifications--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-notifications--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-notifications--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-notifications--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-notifications--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-notifications--id-" data-method="GET"
      data-path="api/notifications/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-notifications--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-notifications--id-"
                    onclick="tryItOut('GETapi-notifications--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-notifications--id-"
                    onclick="cancelTryOut('GETapi-notifications--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-notifications--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/notifications/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-notifications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-notifications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-notifications--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Notification. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-notifications--id-"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="notification-DELETEapi-notifications--id-">Supprime un Notification</h2>

<p>
</p>



<span id="example-requests-DELETEapi-notifications--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/notifications/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/notifications/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-notifications--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-notifications--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-notifications--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-notifications--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-notifications--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-notifications--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-notifications--id-" data-method="DELETE"
      data-path="api/notifications/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-notifications--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-notifications--id-"
                    onclick="tryItOut('DELETEapi-notifications--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-notifications--id-"
                    onclick="cancelTryOut('DELETEapi-notifications--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-notifications--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/notifications/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-notifications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-notifications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-notifications--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Notification. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="preregistration">PreRegistration</h1>

    <p>EndPoints pour gérer les PreRegistration</p>

                                <h2 id="preregistration-POSTapi-pre_registrations">Créer un nouveau PreRegistration</h2>

<p>
</p>



<span id="example-requests-POSTapi-pre_registrations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pre_registrations" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"attribute\": \"value\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pre_registrations"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "attribute": "value"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pre_registrations">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-pre_registrations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pre_registrations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pre_registrations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pre_registrations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pre_registrations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pre_registrations" data-method="POST"
      data-path="api/pre_registrations"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pre_registrations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pre_registrations"
                    onclick="tryItOut('POSTapi-pre_registrations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pre_registrations"
                    onclick="cancelTryOut('POSTapi-pre_registrations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pre_registrations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pre_registrations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pre_registrations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pre_registrations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="POSTapi-pre_registrations"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
        </form>

                    <h2 id="preregistration-GETapi-pre_registrations">Affiche les PreRegistration</h2>

<p>
</p>



<span id="example-requests-GETapi-pre_registrations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/pre_registrations?with_relation=false&amp;paginate=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pre_registrations"
);

const params = {
    "with_relation": "false",
    "paginate": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-pre_registrations">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-pre_registrations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-pre_registrations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pre_registrations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-pre_registrations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pre_registrations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-pre_registrations" data-method="GET"
      data-path="api/pre_registrations"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-pre_registrations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-pre_registrations"
                    onclick="tryItOut('GETapi-pre_registrations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-pre_registrations"
                    onclick="cancelTryOut('GETapi-pre_registrations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-pre_registrations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/pre_registrations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-pre_registrations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-pre_registrations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="GETapi-pre_registrations"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-pre_registrations"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>paginate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="paginate"                data-endpoint="GETapi-pre_registrations"
               value="false"
               data-component="query">
    <br>
<p>Utiliser la pagination. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="preregistration-GETapi-pre_registrations--id-">Affiche un PreRegistration</h2>

<p>
</p>



<span id="example-requests-GETapi-pre_registrations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/pre_registrations/1?with_relation=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pre_registrations/1"
);

const params = {
    "with_relation": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-pre_registrations--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-pre_registrations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-pre_registrations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pre_registrations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-pre_registrations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pre_registrations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-pre_registrations--id-" data-method="GET"
      data-path="api/pre_registrations/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-pre_registrations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-pre_registrations--id-"
                    onclick="tryItOut('GETapi-pre_registrations--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-pre_registrations--id-"
                    onclick="cancelTryOut('GETapi-pre_registrations--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-pre_registrations--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/pre_registrations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-pre_registrations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-pre_registrations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-pre_registrations--id-"
               value="1"
               data-component="url">
    <br>
<p>Le PreRegistration. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-pre_registrations--id-"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="preregistration-PUTapi-pre_registrations--id-">Met à jour un PreRegistration</h2>

<p>
</p>



<span id="example-requests-PUTapi-pre_registrations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/pre_registrations/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"attribute\": \"value\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pre_registrations/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "attribute": "value"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-pre_registrations--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-pre_registrations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-pre_registrations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-pre_registrations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-pre_registrations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-pre_registrations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-pre_registrations--id-" data-method="PUT"
      data-path="api/pre_registrations/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-pre_registrations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-pre_registrations--id-"
                    onclick="tryItOut('PUTapi-pre_registrations--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-pre_registrations--id-"
                    onclick="cancelTryOut('PUTapi-pre_registrations--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-pre_registrations--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/pre_registrations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-pre_registrations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-pre_registrations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-pre_registrations--id-"
               value="1"
               data-component="url">
    <br>
<p>Le PreRegistration. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attribute</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="attribute"                data-endpoint="PUTapi-pre_registrations--id-"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
        </form>

                    <h2 id="preregistration-DELETEapi-pre_registrations--id-">Supprime un PreRegistration</h2>

<p>
</p>



<span id="example-requests-DELETEapi-pre_registrations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/pre_registrations/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pre_registrations/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-pre_registrations--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-pre_registrations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-pre_registrations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-pre_registrations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-pre_registrations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-pre_registrations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-pre_registrations--id-" data-method="DELETE"
      data-path="api/pre_registrations/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-pre_registrations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-pre_registrations--id-"
                    onclick="tryItOut('DELETEapi-pre_registrations--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-pre_registrations--id-"
                    onclick="cancelTryOut('DELETEapi-pre_registrations--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-pre_registrations--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/pre_registrations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-pre_registrations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-pre_registrations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-pre_registrations--id-"
               value="1"
               data-component="url">
    <br>
<p>Le PreRegistration. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="service">Service</h1>

    <p>EndPoints pour gérer les Service</p>

                                <h2 id="service-GETapi-services">Affiche les Service</h2>

<p>
</p>



<span id="example-requests-GETapi-services">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/services?with_relation=false&amp;paginate=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/services"
);

const params = {
    "with_relation": "false",
    "paginate": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-services">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-services" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-services"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-services"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-services" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-services">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-services" data-method="GET"
      data-path="api/services"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-services', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-services"
                    onclick="tryItOut('GETapi-services');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-services"
                    onclick="cancelTryOut('GETapi-services');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-services"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/services</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="GETapi-services"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="GETapi-services"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="GETapi-services"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-services"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>paginate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="paginate"                data-endpoint="GETapi-services"
               value="false"
               data-component="query">
    <br>
<p>Utiliser la pagination. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="service-GETapi-services--id-">Affiche un Service</h2>

<p>
</p>



<span id="example-requests-GETapi-services--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/services/1?with_user=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/services/1"
);

const params = {
    "with_user": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-services--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-services--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-services--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-services--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-services--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-services--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-services--id-" data-method="GET"
      data-path="api/services/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-services--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-services--id-"
                    onclick="tryItOut('GETapi-services--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-services--id-"
                    onclick="cancelTryOut('GETapi-services--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-services--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/services/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-services--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Service. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_user</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_user"                data-endpoint="GETapi-services--id-"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="service-POSTapi-services">Créer un nouveau Service</h2>

<p>
</p>



<span id="example-requests-POSTapi-services">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/services" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 1,
    \"name\": \"Pack entreprise\",
    \"description\": \"value\",
    \"type\": \"pack\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/services"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 1,
    "name": "Pack entreprise",
    "description": "value",
    "type": "pack"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-services">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-services" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-services"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-services"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-services" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-services">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-services" data-method="POST"
      data-path="api/services"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-services', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-services"
                    onclick="tryItOut('POSTapi-services');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-services"
                    onclick="cancelTryOut('POSTapi-services');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-services"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/services</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="POSTapi-services"
               value="1"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-services"
               value="Pack entreprise"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>Pack entreprise</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-services"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="POSTapi-services"
               value="pack"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>pack</code></p>
        </div>
        </form>

                    <h2 id="service-PUTapi-services--id-">Met à jour un Service</h2>

<p>
</p>



<span id="example-requests-PUTapi-services--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/services/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"packs solo\",
    \"description\": \"value\",
    \"type\": \"financial_solution\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/services/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "packs solo",
    "description": "value",
    "type": "financial_solution"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-services--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-services--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-services--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-services--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-services--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-services--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-services--id-" data-method="PUT"
      data-path="api/services/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-services--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-services--id-"
                    onclick="tryItOut('PUTapi-services--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-services--id-"
                    onclick="cancelTryOut('PUTapi-services--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-services--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/services/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-services--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Service. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-services--id-"
               value="packs solo"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>packs solo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-services--id-"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="PUTapi-services--id-"
               value="financial_solution"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>financial_solution</code></p>
        </div>
        </form>

                    <h2 id="service-DELETEapi-services--id-">Supprime un Service</h2>

<p>
</p>



<span id="example-requests-DELETEapi-services--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/services/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/services/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-services--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-services--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-services--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-services--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-services--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-services--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-services--id-" data-method="DELETE"
      data-path="api/services/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-services--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-services--id-"
                    onclick="tryItOut('DELETEapi-services--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-services--id-"
                    onclick="cancelTryOut('DELETEapi-services--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-services--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/services/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-services--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Service. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="serviceproduct">ServiceProduct</h1>

    <p>EndPoints pour gérer les ServiceProduct</p>

                                <h2 id="serviceproduct-GETapi-service_products">Affiche les ServiceProduct</h2>

<p>
</p>



<span id="example-requests-GETapi-service_products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/service_products?with_relation=false&amp;paginate=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/service_products"
);

const params = {
    "with_relation": "false",
    "paginate": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-service_products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-service_products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-service_products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-service_products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-service_products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-service_products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-service_products" data-method="GET"
      data-path="api/service_products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-service_products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-service_products"
                    onclick="tryItOut('GETapi-service_products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-service_products"
                    onclick="cancelTryOut('GETapi-service_products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-service_products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/service_products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-service_products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-service_products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="GETapi-service_products"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>advantage</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="advantage"                data-endpoint="GETapi-service_products"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>deposit_at_opening</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deposit_at_opening"                data-endpoint="GETapi-service_products"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-service_products"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>paginate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="paginate"                data-endpoint="GETapi-service_products"
               value="false"
               data-component="query">
    <br>
<p>Utiliser la pagination. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="serviceproduct-GETapi-service_products--id-">Affiche un ServiceProduct</h2>

<p>
</p>



<span id="example-requests-GETapi-service_products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/service_products/1?with_relation=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/service_products/1"
);

const params = {
    "with_relation": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-service_products--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-service_products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-service_products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-service_products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-service_products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-service_products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-service_products--id-" data-method="GET"
      data-path="api/service_products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-service_products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-service_products--id-"
                    onclick="tryItOut('GETapi-service_products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-service_products--id-"
                    onclick="cancelTryOut('GETapi-service_products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-service_products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/service_products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-service_products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-service_products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-service_products--id-"
               value="1"
               data-component="url">
    <br>
<p>Le ServiceProduct. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-service_products--id-"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="serviceproduct-POSTapi-service_products">Créer un nouveau ServiceProduct</h2>

<p>
</p>



<span id="example-requests-POSTapi-service_products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/service_products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"woezon\",
    \"advantage\": \"super\",
    \"deposit_at_opening\": \"500000\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/service_products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "woezon",
    "advantage": "super",
    "deposit_at_opening": "500000"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-service_products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-service_products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-service_products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-service_products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-service_products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-service_products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-service_products" data-method="POST"
      data-path="api/service_products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-service_products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-service_products"
                    onclick="tryItOut('POSTapi-service_products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-service_products"
                    onclick="cancelTryOut('POSTapi-service_products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-service_products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/service_products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-service_products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-service_products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-service_products"
               value="woezon"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>woezon</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>advantage</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="advantage"                data-endpoint="POSTapi-service_products"
               value="super"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>super</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deposit_at_opening</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deposit_at_opening"                data-endpoint="POSTapi-service_products"
               value="500000"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>500000</code></p>
        </div>
        </form>

                    <h2 id="serviceproduct-PUTapi-service_products--id-">Met à jour un ServiceProduct</h2>

<p>
</p>



<span id="example-requests-PUTapi-service_products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/service_products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"value\",
    \"advantage\": \"value\",
    \"deposit_at_opening\": \"value\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/service_products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "value",
    "advantage": "value",
    "deposit_at_opening": "value"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-service_products--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-service_products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-service_products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-service_products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-service_products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-service_products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-service_products--id-" data-method="PUT"
      data-path="api/service_products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-service_products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-service_products--id-"
                    onclick="tryItOut('PUTapi-service_products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-service_products--id-"
                    onclick="cancelTryOut('PUTapi-service_products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-service_products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/service_products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-service_products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-service_products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-service_products--id-"
               value="1"
               data-component="url">
    <br>
<p>Le ServiceProduct. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-service_products--id-"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>advantage</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="advantage"                data-endpoint="PUTapi-service_products--id-"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deposit_at_opening</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deposit_at_opening"                data-endpoint="PUTapi-service_products--id-"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
        </form>

                    <h2 id="serviceproduct-DELETEapi-service_products--id-">Supprime un ServiceProduct</h2>

<p>
</p>



<span id="example-requests-DELETEapi-service_products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/service_products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/service_products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-service_products--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-service_products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-service_products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-service_products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-service_products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-service_products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-service_products--id-" data-method="DELETE"
      data-path="api/service_products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-service_products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-service_products--id-"
                    onclick="tryItOut('DELETEapi-service_products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-service_products--id-"
                    onclick="cancelTryOut('DELETEapi-service_products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-service_products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/service_products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-service_products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-service_products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-service_products--id-"
               value="1"
               data-component="url">
    <br>
<p>Le ServiceProduct. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="slider">Slider</h1>

    <p>EndPoints pour gérer les Slider</p>

                                <h2 id="slider-GETapi-sliders">Affiche les Slider</h2>

<p>
</p>



<span id="example-requests-GETapi-sliders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/sliders?slide_path=%2Fstorage&amp;is_published=&amp;with_user=false&amp;paginate=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sliders"
);

const params = {
    "slide_path": "/storage",
    "is_published": "0",
    "with_user": "false",
    "paginate": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-sliders">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-sliders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-sliders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sliders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-sliders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sliders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-sliders" data-method="GET"
      data-path="api/sliders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sliders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-sliders"
                    onclick="tryItOut('GETapi-sliders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-sliders"
                    onclick="cancelTryOut('GETapi-sliders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-sliders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sliders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-sliders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-sliders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slide_path</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slide_path"                data-endpoint="GETapi-sliders"
               value="/storage"
               data-component="query">
    <br>
<p>Description de l'attribut. Example: <code>/storage</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>is_published</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETapi-sliders" style="display: none">
            <input type="radio" name="is_published"
                   value="1"
                   data-endpoint="GETapi-sliders"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-sliders" style="display: none">
            <input type="radio" name="is_published"
                   value="0"
                   data-endpoint="GETapi-sliders"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Description de l'attribut. Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_user</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_user"                data-endpoint="GETapi-sliders"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>paginate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="paginate"                data-endpoint="GETapi-sliders"
               value="false"
               data-component="query">
    <br>
<p>Utiliser la pagination. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="slider-GETapi-sliders--id-">Affiche un Slider</h2>

<p>
</p>



<span id="example-requests-GETapi-sliders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/sliders/1?with_relation=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sliders/1"
);

const params = {
    "with_relation": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-sliders--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-sliders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-sliders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sliders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-sliders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sliders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-sliders--id-" data-method="GET"
      data-path="api/sliders/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sliders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-sliders--id-"
                    onclick="tryItOut('GETapi-sliders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-sliders--id-"
                    onclick="cancelTryOut('GETapi-sliders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-sliders--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sliders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-sliders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-sliders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-sliders--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Slider. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-sliders--id-"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="slider-POSTapi-sliders">Créer un nouveau Slider</h2>

<p>
</p>



<span id="example-requests-POSTapi-sliders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/sliders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 1,
    \"slide_path\": \"\\/local\",
    \"is_published\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sliders"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 1,
    "slide_path": "\/local",
    "is_published": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-sliders">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-sliders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-sliders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-sliders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-sliders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-sliders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-sliders" data-method="POST"
      data-path="api/sliders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-sliders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-sliders"
                    onclick="tryItOut('POSTapi-sliders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-sliders"
                    onclick="cancelTryOut('POSTapi-sliders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-sliders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/sliders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-sliders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-sliders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="POSTapi-sliders"
               value="1"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slide_path</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slide_path"                data-endpoint="POSTapi-sliders"
               value="/local"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>/local</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_published</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-sliders" style="display: none">
            <input type="radio" name="is_published"
                   value="true"
                   data-endpoint="POSTapi-sliders"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-sliders" style="display: none">
            <input type="radio" name="is_published"
                   value="false"
                   data-endpoint="POSTapi-sliders"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>L'attribut. Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="slider-PUTapi-sliders--id-">Met à jour un Slider</h2>

<p>
</p>



<span id="example-requests-PUTapi-sliders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/sliders/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"slide_path\": \"\\/storage\",
    \"is_published\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sliders/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "slide_path": "\/storage",
    "is_published": true
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-sliders--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-sliders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-sliders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-sliders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-sliders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-sliders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-sliders--id-" data-method="PUT"
      data-path="api/sliders/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-sliders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-sliders--id-"
                    onclick="tryItOut('PUTapi-sliders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-sliders--id-"
                    onclick="cancelTryOut('PUTapi-sliders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-sliders--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/sliders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-sliders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-sliders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-sliders--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Slider. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slide_path</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slide_path"                data-endpoint="PUTapi-sliders--id-"
               value="/storage"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>/storage</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_published</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-sliders--id-" style="display: none">
            <input type="radio" name="is_published"
                   value="true"
                   data-endpoint="PUTapi-sliders--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-sliders--id-" style="display: none">
            <input type="radio" name="is_published"
                   value="false"
                   data-endpoint="PUTapi-sliders--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>L'attribut. Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="slider-DELETEapi-sliders--id-">Supprime un Slider</h2>

<p>
</p>



<span id="example-requests-DELETEapi-sliders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/sliders/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sliders/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-sliders--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-sliders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-sliders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-sliders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-sliders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-sliders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-sliders--id-" data-method="DELETE"
      data-path="api/sliders/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-sliders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-sliders--id-"
                    onclick="tryItOut('DELETEapi-sliders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-sliders--id-"
                    onclick="cancelTryOut('DELETEapi-sliders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-sliders--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/sliders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-sliders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-sliders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-sliders--id-"
               value="1"
               data-component="url">
    <br>
<p>Le Slider. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="spontaneousapplication">SpontaneousApplication</h1>

    <p>EndPoints pour gérer les SpontaneousApplication</p>

                                <h2 id="spontaneousapplication-POSTapi-spontaneous_applications">Créer un nouveau SpontaneousApplication</h2>

<p>
</p>



<span id="example-requests-POSTapi-spontaneous_applications">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/spontaneous_applications" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"value\",
    \"email\": \"value\",
    \"desired_position\": \"value\",
    \"motivation_message\": \"value\",
    \"cv_path\": \"value\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/spontaneous_applications"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "value",
    "email": "value",
    "desired_position": "value",
    "motivation_message": "value",
    "cv_path": "value"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-spontaneous_applications">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-spontaneous_applications" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-spontaneous_applications"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-spontaneous_applications"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-spontaneous_applications" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-spontaneous_applications">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-spontaneous_applications" data-method="POST"
      data-path="api/spontaneous_applications"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-spontaneous_applications', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-spontaneous_applications"
                    onclick="tryItOut('POSTapi-spontaneous_applications');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-spontaneous_applications"
                    onclick="cancelTryOut('POSTapi-spontaneous_applications');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-spontaneous_applications"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/spontaneous_applications</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-spontaneous_applications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-spontaneous_applications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-spontaneous_applications"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-spontaneous_applications"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>desired_position</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="desired_position"                data-endpoint="POSTapi-spontaneous_applications"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>motivation_message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="motivation_message"                data-endpoint="POSTapi-spontaneous_applications"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cv_path</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="cv_path"                data-endpoint="POSTapi-spontaneous_applications"
               value="value"
               data-component="body">
    <br>
<p>L'attribut. Example: <code>value</code></p>
        </div>
        </form>

                    <h2 id="spontaneousapplication-GETapi-spontaneous_applications">Affiche les SpontaneousApplication</h2>

<p>
</p>



<span id="example-requests-GETapi-spontaneous_applications">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/spontaneous_applications?with_relation=false&amp;paginate=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/spontaneous_applications"
);

const params = {
    "with_relation": "false",
    "paginate": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-spontaneous_applications">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-spontaneous_applications" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-spontaneous_applications"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-spontaneous_applications"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-spontaneous_applications" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-spontaneous_applications">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-spontaneous_applications" data-method="GET"
      data-path="api/spontaneous_applications"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-spontaneous_applications', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-spontaneous_applications"
                    onclick="tryItOut('GETapi-spontaneous_applications');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-spontaneous_applications"
                    onclick="cancelTryOut('GETapi-spontaneous_applications');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-spontaneous_applications"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/spontaneous_applications</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-spontaneous_applications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-spontaneous_applications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="GETapi-spontaneous_applications"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="GETapi-spontaneous_applications"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>desired_position</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="desired_position"                data-endpoint="GETapi-spontaneous_applications"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>motivation_message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="motivation_message"                data-endpoint="GETapi-spontaneous_applications"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>cv_path</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="cv_path"                data-endpoint="GETapi-spontaneous_applications"
               value=""
               data-component="query">
    <br>
<p>Description de l'attribut.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-spontaneous_applications"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>paginate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="paginate"                data-endpoint="GETapi-spontaneous_applications"
               value="false"
               data-component="query">
    <br>
<p>Utiliser la pagination. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="spontaneousapplication-GETapi-spontaneous_applications--id-">Affiche un SpontaneousApplication</h2>

<p>
</p>



<span id="example-requests-GETapi-spontaneous_applications--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/spontaneous_applications/1?with_relation=false" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/spontaneous_applications/1"
);

const params = {
    "with_relation": "false",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-spontaneous_applications--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-spontaneous_applications--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-spontaneous_applications--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-spontaneous_applications--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-spontaneous_applications--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-spontaneous_applications--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-spontaneous_applications--id-" data-method="GET"
      data-path="api/spontaneous_applications/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-spontaneous_applications--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-spontaneous_applications--id-"
                    onclick="tryItOut('GETapi-spontaneous_applications--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-spontaneous_applications--id-"
                    onclick="cancelTryOut('GETapi-spontaneous_applications--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-spontaneous_applications--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/spontaneous_applications/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-spontaneous_applications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-spontaneous_applications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-spontaneous_applications--id-"
               value="1"
               data-component="url">
    <br>
<p>Le SpontaneousApplication. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_relation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="with_relation"                data-endpoint="GETapi-spontaneous_applications--id-"
               value="false"
               data-component="query">
    <br>
<p>Afficher la relation. Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="spontaneousapplication-DELETEapi-spontaneous_applications--id-">Supprime un SpontaneousApplication</h2>

<p>
</p>



<span id="example-requests-DELETEapi-spontaneous_applications--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/spontaneous_applications/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/spontaneous_applications/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-spontaneous_applications--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-spontaneous_applications--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-spontaneous_applications--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-spontaneous_applications--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-spontaneous_applications--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-spontaneous_applications--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-spontaneous_applications--id-" data-method="DELETE"
      data-path="api/spontaneous_applications/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-spontaneous_applications--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-spontaneous_applications--id-"
                    onclick="tryItOut('DELETEapi-spontaneous_applications--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-spontaneous_applications--id-"
                    onclick="cancelTryOut('DELETEapi-spontaneous_applications--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-spontaneous_applications--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/spontaneous_applications/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-spontaneous_applications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-spontaneous_applications--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-spontaneous_applications--id-"
               value="1"
               data-component="url">
    <br>
<p>Le SpontaneousApplication. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="utilisateurs">Utilisateurs</h1>

    <p>EndPoints pour gérer les utilisateurs</p>

                                <h2 id="utilisateurs-PUTapi-users-update-password">Mettre à jour le mot de passe de l&#039;utilisateur connecté</h2>

<p>
</p>



<span id="example-requests-PUTapi-users-update-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/users/update-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"current_password\": \"oldpassword\",
    \"new_password\": \"newpassword\",
    \"new_password_confirmation\": \"newpassword\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/update-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "current_password": "oldpassword",
    "new_password": "newpassword",
    "new_password_confirmation": "newpassword"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-users-update-password">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-users-update-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-users-update-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-users-update-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-users-update-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-users-update-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-users-update-password" data-method="PUT"
      data-path="api/users/update-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-users-update-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-users-update-password"
                    onclick="tryItOut('PUTapi-users-update-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-users-update-password"
                    onclick="cancelTryOut('PUTapi-users-update-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-users-update-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/users/update-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-users-update-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-users-update-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>current_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="current_password"                data-endpoint="PUTapi-users-update-password"
               value="oldpassword"
               data-component="body">
    <br>
<p>Le mot de passe actuel. Example: <code>oldpassword</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>new_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="new_password"                data-endpoint="PUTapi-users-update-password"
               value="newpassword"
               data-component="body">
    <br>
<p>Le nouveau mot de passe. Example: <code>newpassword</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>new_password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="new_password_confirmation"                data-endpoint="PUTapi-users-update-password"
               value="newpassword"
               data-component="body">
    <br>
<p>La confirmation du nouveau mot de passe. Example: <code>newpassword</code></p>
        </div>
        </form>

                    <h2 id="utilisateurs-GETapi-users">Liste les uilisateurs</h2>

<p>
</p>



<span id="example-requests-GETapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/users?name=architecto&amp;email=gbailey%40example.net&amp;password=%7C%5D%7C%7B%2B-&amp;profile=architecto&amp;activated=" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users"
);

const params = {
    "name": "architecto",
    "email": "gbailey@example.net",
    "password": "|]|{+-",
    "profile": "architecto",
    "activated": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users" data-method="GET"
      data-path="api/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users"
                    onclick="tryItOut('GETapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users"
                    onclick="cancelTryOut('GETapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="GETapi-users"
               value="architecto"
               data-component="query">
    <br>
<p>Le nom de l'utilisateur. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="GETapi-users"
               value="gbailey@example.net"
               data-component="query">
    <br>
<p>L'email de l'utilisateur. Example: <code>gbailey@example.net</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="GETapi-users"
               value="|]|{+-"
               data-component="query">
    <br>
<p>Le mot de passe de l'utilisateur. Example: <code>|]|{+-</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>profile</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="profile"                data-endpoint="GETapi-users"
               value="architecto"
               data-component="query">
    <br>
<p>Le profile de l'utilisateur. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>activated</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="activated"                data-endpoint="GETapi-users"
               value=""
               data-component="query">
    <br>
<p>L'activation de l'utilisateur.</p>
            </div>
                </form>

                    <h2 id="utilisateurs-POSTapi-users">Ajouter un uilisateur</h2>

<p>
</p>



<span id="example-requests-POSTapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"email\": \"gbailey@example.net\",
    \"password\": \"|]|{+-\",
    \"profile\": \"architecto\",
    \"activated\": null
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "email": "gbailey@example.net",
    "password": "|]|{+-",
    "profile": "architecto",
    "activated": null
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-users">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-users" data-method="POST"
      data-path="api/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-users"
                    onclick="tryItOut('POSTapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-users"
                    onclick="cancelTryOut('POSTapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-users"
               value="architecto"
               data-component="body">
    <br>
<p>Le nom de l'utilisateur. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-users"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>L'email de l'utilisateur. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-users"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Le mot de passe de l'utilisateur. Example: <code>|]|{+-</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>profile</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="profile"                data-endpoint="POSTapi-users"
               value="architecto"
               data-component="body">
    <br>
<p>Le profile de l'utilisateur. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>activated</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="activated"                data-endpoint="POSTapi-users"
               value=""
               data-component="body">
    <br>
<p>L'activation de l'utilisateur.</p>
        </div>
        </form>

                    <h2 id="utilisateurs-GETapi-users--id-">Affiche un uilisateur</h2>

<p>
</p>



<span id="example-requests-GETapi-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/users/" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users--id-" data-method="GET"
      data-path="api/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users--id-"
                    onclick="tryItOut('GETapi-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users--id-"
                    onclick="cancelTryOut('GETapi-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-users--id-"
               value=""
               data-component="url">
    <br>
<p>L'id de l'utilisateur.</p>
            </div>
                    </form>

                    <h2 id="utilisateurs-PUTapi-users--id-">Mettre à jour un utilisateur</h2>

<p>
</p>



<span id="example-requests-PUTapi-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/users/" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"email\": \"gbailey@example.net\",
    \"password\": \"|]|{+-\",
    \"profile\": \"architecto\",
    \"activated\": null
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "email": "gbailey@example.net",
    "password": "|]|{+-",
    "profile": "architecto",
    "activated": null
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-users--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-users--id-" data-method="PUT"
      data-path="api/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-users--id-"
                    onclick="tryItOut('PUTapi-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-users--id-"
                    onclick="cancelTryOut('PUTapi-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-users--id-"
               value=""
               data-component="url">
    <br>
<p>L'id de l'utilisateur.</p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-users--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Le nom de l'utilisateur. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-users--id-"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>L'email de l'utilisateur. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PUTapi-users--id-"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Le mot de passe de l'utilisateur. Example: <code>|]|{+-</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>profile</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="profile"                data-endpoint="PUTapi-users--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Le profile de l'utilisateur. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>activated</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="activated"                data-endpoint="PUTapi-users--id-"
               value=""
               data-component="body">
    <br>
<p>L'activation de l'utilisateur.</p>
        </div>
        </form>

                    <h2 id="utilisateurs-DELETEapi-users--id-">Surppimer l&#039;utilisateur</h2>

<p>
</p>



<span id="example-requests-DELETEapi-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/users/" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-users--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-users--id-" data-method="DELETE"
      data-path="api/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-users--id-"
                    onclick="tryItOut('DELETEapi-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-users--id-"
                    onclick="cancelTryOut('DELETEapi-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-users--id-"
               value=""
               data-component="url">
    <br>
<p>L'id de l'utilisateur.</p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
