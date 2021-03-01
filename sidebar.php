<?php
/**
 * @subpackage Elling_theme
 * @since 2021
 */
?>

<aside
    class="col col-4 border-right pt-4 position-fixed bg-light"
    id="sidebar-wrapper"
>
    <div class="sidebar-heading">
        <div
            class="logo-container d-flex justify-content-center align-items-center"
        >
            <img
                src="<?php echo get_stylesheet_directory_uri().'/images/deviantart-brands.svg'; ?>"
                class="img-logo py-3"
                alt="placeholder logo"
                srcset=""
            />
        </div>
        <h3 class="text-uppercase fs-6 lh-lg">
            Alexander Elling
        </h3>
    </div>

    <div class="collapse menu-collapse" id="navbarToggleMenuContent">  
        <?php
            $menu_items = wp_get_menu_array('Nav Menu');
        ?>

        <ul class="nav flex-column fw-light">
        <?php foreach ($menu_items as $item) : ?>
            <li class="nav-item">
                <?php if(count($item['children']) > 1) { ?>
                    <a class="nav-link"
                        data-bs-toggle="collapse"
                        href="#collapseExample"
                        role="button"
                        aria-expanded="false"
                        aria-controls="collapseExample" 
                        href="<?= $item['url'] ?>" 
                        title="<?= $item['title'] ?>">
                            <?= $item['title'] ?>
                    </a>
                <?php } else { ?>
                    <a class="nav-link"
                    role="button"
                    href="<?= $item['url'] ?>" 
                    title="<?= $item['title'] ?>">
                        <?= $item['title'] ?>
                </a>
                <?php } ?>
                <?php if( !empty($item['children']) ):?>
                <ul class="collapse categories-ul" id="collapseExample">
                    <?php foreach($item['children'] as $child): ?>
                    <li class="card card-body bg-light">
                        <a class="link-category" href="<?= $child['url'] ?>" title="<?= $child['title'] ?>"><?= $child['title'] ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        <ul>
    </div>

</aside>