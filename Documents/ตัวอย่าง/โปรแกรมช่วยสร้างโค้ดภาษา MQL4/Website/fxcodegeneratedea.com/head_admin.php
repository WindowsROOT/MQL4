
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>FxCodeGeneratedEA</title>
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="FxPro Quant helps you to create your own EAs for both MT4 and cTrader. Now you can create your own strategies that trade for your own rules">
    <meta name="keywords" content="">
    <meta property="og:title" content="FxPro Quant is a visual strategy builder for algo trading">
    <meta property="og:description" content="FxPro Quant helps you to create your own EAs for both MT4 and cTrader. Now you can create your own strategies that trade for your own rules">
    <meta property="og:url" content="http://quant.fxpro.co.uk">
    <meta property="og:image" content="quant.fxpro.co.uk/images/st-logo.png">
    <meta property="og:robots" content="index, follow">
    <meta property="og:site_name" content="FxPro">
    <meta property="og:locale" content="en">
    <meta name="application-name" content="FxPro Quant">
    <meta name="msapplication-window" content="width=device-width;height=device-height">
    <meta name="msapplication-task" content="name=Login To Direct;action-uri=https://direct.fxpro.com/user/login?utm_source=ie9&amp;utm_medium=web&amp;utm_campaign=pinned-ie9;icon-uri=/images/favicon.ico">
    <meta name="msapplication-task" content="name=Economic calendar;action-uri=http://fxpro.co.uk/news/economic-calendar?utm_source=ie9&amp;utm_medium=web&amp;utm_campaign=pinned-ie9;icon-uri=/images/favicon.ico">
    <meta name="msapplication-task" content="name=Trader&#39;s Dashboard;action-uri=http://fxpro.co.uk/trading/accounts/trader-dashboard?utm_source=ie9&amp;utm_medium=web&amp;utm_campaign=pinned-ie9;icon-uri=/images/favicon.ico">
    <meta name="msapplication-starturl" content="./?utm_source=ie9&amp;utm_medium=web&amp;utm_campaign=pinned-ie9">
    <meta name="msapplication-tooltip" content="FxPro Quant website">
    <meta name="msapplication-navbutton-color" content="#ed1c24">
    <link rel="canonical" href="http://quant.fxpro.co.uk/">
    <script>var culture = 'English';</script>
    <link rel="shortcut icon" href="http://quant.fxpro.co.uk/images/favicon.ico">
     <script src="./index_files/jquery-2.1.1.min.js.ดาวน์โหลด"></script>
    <script src="./index_files/jquery.fancybox.pack.js.ดาวน์โหลด"></script>
    <script src="./index_files/jquery-ui.js.ดาวน์โหลด"></script>
    <script src="./index_files/jquery.cookie.js.ดาวน์โหลด"></script>
    <script src="./index_files/config.js.ดาวน์โหลด"></script>
    <script src="./index_files/jquery.validate.min.js.ดาวน์โหลด"></script>
    <script src="./index_files/jquery.validate.unobtrusive.min.js.ดาวน์โหลด"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="/js/skel.min.js"></script>
    <script src="/js/skel-panels.min.js"></script>
    <script src="./index_files/main.js.ดาวน์โหลด"></script>
    <link rel="stylesheet" href="./index_files/grid_960.css">
    <link rel="stylesheet" href="./index_files/jquery.fancybox.css">
    <link rel="stylesheet" href="./index_files/style.css">
    <link rel="stylesheet" href="./index_files/style-multilang.css">
    <script src="assets/js/jquery.1.11.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <meta itemprop="inLanguage" content="en">
    <meta itemprop="copyrightHolder" content="http://quant.fxpro.co.uk/legal-documentation/">
    <meta itemprop="genre" content="forex">
    <meta itemprop="name" content="FxPro Group Ltd">
    <meta itemprop="url" content="http://quant.fxpro.co.uk">
    <meta itemprop="image" content="quant.fxpro.co.uk/images/st-logo.png">

    <style type="text/css">.fancybox-margin{margin-right:17px;}</style><style type="text/css">.fancybox-margin{margin-right:17px;}</style><style type="text/css">.fancybox-margin{margin-right:17px;}</style>
</head>
<body>
    <?php
    @session_start();
    if (!isset($_SESSION['admin'])) {
        header('Location: ' . 'index.html');
    }
    ?>
    <div class="page">
        <div class="page-holder">
            <!-- Header -->
            <header id="header">
                <div class="container_12">
                    <div class="grid_12">
                        <a href="admin.php" id="logo">FxCodeGeneratedEA</a>
                    </div>
                </div>

                <!-- Nav -->
                <nav id="nav" class="">
                    <div class="container_12">
                        <div class="grid_12">
                            <div class="grid_9 alpha">
                                <ul>
                                    <li <?= ($active_menu == 1 ? 'class="current_page_item"' : '') ?>><a href="admin.php">Profile</a></li>
                                    <li <?= ($active_menu == 2 ? 'class="current_page_item"' : '') ?>><a href="manage_user.php">Manage Users</a></li>
                                    <li <?= ($active_menu == 3 ? 'class="current_page_item"' : '') ?>><a href="ad_logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-wrapper">


