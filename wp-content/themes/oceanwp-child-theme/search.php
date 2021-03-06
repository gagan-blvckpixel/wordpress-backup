<?php

/**
 * Template Name: Search Page
 *
 * @package OceanWP WordPress theme
 */

?>

<?php get_header(); ?>

<?php
    $tabs = [
    ["id" => "all", "name" => "all", "text" => "All", "active" => true],
    ["id" => "articles", "name" => "article", "text" => "Articles", "active" => false],
    ["id" => "events", "name" => "event", "text" => "Events", "active" => false],
    ["id" => "news", "name" => "news", "text" => "News", "active" => false],
    ["id" => "softwares", "name" => "software", "text" => "Softwares", "active" => false],
    ["id" => "companies", "name" => "company", "text" => "Companies", "active" => false]
    ];
?>

<div id="content-wrap" class="container-fluid clr px-0 hc-ff-roboto search--page">
    <div class="content-area clr">
        <section class="search--header pt-4 pb-5">
            <div class="container px-0 text-dark hc-fw-400">
                <div>
                    <div class="mb-3">
                        <span class="hc-fs-36">You searched for: </span>
                        <span class="searched-term hc-fs-36 hc-fw-700 hc-color-secondary"><?= isset($_GET['q']) ? $_GET['q'] : ""; ?></span>
                    </div>
                    <div class="align-items-end justify-content-start search-input--wrapper">
                        <span>Displaying <span class="total--result hc-fw-700">0 results</span> / New search: </span>
                        <span class="search-input--container">
                            <input type="text" value="" name="search-input" class="w-100" />
                            <button class="search--btn">⌕</button>
                        </span>
                    </div>
                </div>
                <div class="d-flex align-items-end mt-4 mt-lg-0">
                    <span class="text-uppercase hc-fw-300" style="min-width: 75px;">SORT BY:</span>
                    <select name="sort_by" class="form-control ml-auto hc-fw-400 hc-fs-20">
                        <option value="most_recent">Most Recent</option>
                    </select>
                </div>
            </div>
        </section>
        <section class="search--body pt-4 pb-5">
            <div class="container px-0 text-dark hc-fw-400">
                <div>
                    <ul class="nav d-flex flex-nowrap align-items-center justify-content-start document-type-tabs mb-5 text-uppercase">
                        <?php foreach($tabs as $tab) { ?>
                            <li class="nav-item flex-grow-1 p-0">
                                <a class="nav-link d-block w-100 text-center pb-3 hc-ff-roboto <?= $tab['active'] ? 'active' : ''; ?>" href="#<?= $tab['id']; ?>" data-tab="<?= $tab['name']; ?>"><?= $tab['text']; ?></a>
                            </li>
                        <?php } ?>
                        </ul>
                        <div class="search--results">
                            <div class="document-type-panels">
                            <?php foreach($tabs as $tab) { ?>
                                <div id="<?= $tab['id']; ?>-panel" class="document-type-panel <?= $tab['active'] ? 'active' : ''; ?>">
                                <div class="panel-header"></div>
                                <div class="panel-body"></div>
                                <div class="panel-footer">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between mt-5">
                                    <ul class="pages pages d-flex align-items-center justify-content-start hc-fs-20"></ul>
                                    <span class="total hc-ff-roboto hc-fs-20 hc-fw-500"></span>
                                    </div>
                                </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                </div>
                <div>
                    <div class="search--filters mb-5">
                        <div class="d-flex d-lg-none align-items-center hc-lh-sm text-uppercase hc-bg-primary text-light mb-3 px-3 py-3 filter--header">
                            <i class="fas fa-sliders-h"></i><span class="ml-3 hc-fs-22">Filter Search for better results</span>
                        </div>
                        <div class="filter--wrapper mb-5 px-4 px-lg-0" data-filter="business_sectors">
                            <div class="filter-title text-uppercase hc-fs-23 hc-fw-400">Filter by Sector</div>
                            <div class="filter--body">
                                <ul class="d-flex flex-column py-3">

                                    <?php

                                     echo return_taxonomylist('business_sector');
                                    ?>


                                </ul>
                            </div>
                        </div>

                        <div class="filter--wrapper mb-5 px-4 px-lg-0" data-filter="domains">
                            <div class="filter-title text-uppercase hc-fs-23 hc-fw-400">Filter by Domain</div>
                            <div class="filter--body">
                                <ul class="d-flex flex-column py-3">

                                    <?php
                                        echo return_taxonomylist('domain');
                                    ?>


                                </ul>
                            </div>
                        </div>
                        <div class="filter--wrapper mb-5 px-4 px-lg-0" data-filter="functions">
                            <div class="filter-title text-uppercase hc-fs-23 hc-fw-400">Filter by Functions</div>
                            <div class="filter--body">
                                <ul class="d-flex flex-column py-3">

                                    <?php
                                        echo return_taxonomylist('functions');
                                    ?>


                                </ul>
                            </div>
                        </div>

                        <div class="filter--footer px-4 px-lg-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <span><button class="filter--btn apply--btn text-uppercase hc-fw-100 hc-lh-1 px-4 py-3 hc-fs-18">Apply FIlters</button></span>
                                <span><button class="filter--btn clear--btn text-uppercase hc-fw-100 hc-lh-1 px-4 py-3 hc-fs-18">Clear FIlters</button></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- ==================================== -->

<?php get_footer(); ?>