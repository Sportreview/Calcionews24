<!--
Header style 9
-->
<?php
// read if we have a mobile logo loaded - to hide the main logo on mobile
$td_logo_mobile = '';
if (td_util::get_option('tds_logo_menu_upload') != '') {
    $td_logo_mobile = 'td-logo-mobile-loaded';
}
?>

<div class="td-header-wrap td-header-style-9">

    <div class="td-header-top-menu-full">
        <div class="td-container td-header-row td-header-top-menu">
            <?php td_api_top_bar_template::_helper_show_top_bar() ?>
            <div class="topbar-login">
                <?php $current_user = wp_get_current_user();
                if (is_user_logged_in()) { ?>
                    <div class="topbar-profile">
                        <a href="https://www.calcionews24.com/wp-admin/profile.php">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Ciao, <?php echo $current_user->display_name; ?>
                        </a>
                    </div>
                    <div class="topbar-logout">
                        <a href="https://www.calcionews24.com/wp-login.php?action=logout">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            Esci
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="topbar-login">
                        <a href="https://www.calcionews24.com/wp-login.php?action=login">
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                            Accedi
                        </a>
                    </div>
                    <div class="topbar-signin">
                        <a href="https://www.calcionews24.com/wp-login.php?action=register">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                            Registrati
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="td-banner-wrap-full td-logo-wrap-full <?php echo $td_logo_mobile?>">
        <div class="td-header-sp-logo">
            <?php locate_template('parts/header/logo-text.php', true);?>
        </div>
    </div>

    <div class="td-header-menu-wrap-full">
        <div class="td-header-menu-wrap td-header-gradient">
            <div class="td-container td-header-row td-header-main-menu">
                <?php locate_template('parts/header/header-menu.php', true);?>
            </div>
        </div>
    </div>

    <div class="td-banner-wrap-full td-banner-bg">
        <div class="td-container-header td-header-row td-header-header">
            <div class="td-header-sp-recs">
                <?php locate_template('parts/header/ads.php', true); ?>
            </div>
        </div>
    </div>

</div>