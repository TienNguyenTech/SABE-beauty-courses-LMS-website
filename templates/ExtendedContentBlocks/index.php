<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\ContentBlocks\Model\Entity\ContentBlock> $contentBlocksGrouped
 */

$this->assign('title', 'Content Blocks');

$this->Html->css('ContentBlocks.content-blocks', ['block' => true]);

$slugify = function($text) {
    return preg_replace('/[^A-Za-z0-9-]+/', '-', $text);
}
?>
<style>
    .contentBlocks h3 {
        color: #1a4332;
    }
</style>
<style>
    .dashboard-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .dashboard-card {
        flex: 1 0 30%;
        max-width: 30%;
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px 0 hsla(0, 0%, 0%, 0.2);
        box-sizing: border-box;
    }

    .dashboard-card h2 {
        margin: 0;
        color: black;
        font-size: 1.5em;
    }

    .dashboard-card p {
        color: black;
    }

    .dashboard-card a {
        display: inline-block;
        margin-top: 10px;
        color: black;
        text-decoration: none;
    }

    @media only screen and (max-width: 768px) {
        .dashboard-card {
            flex-direction: column;
        }

        .navbar-nav {
            max-width: 17%;
        }

        .sidebar .nav-item .nav-link {
            width: auto;
            padding: .75rem 0;
        }

        .sidebar .sidebar-heading {
            padding: 0;
        }

        .dashboard-container{
            flex-direction: column;
        }

        .dashboard-card{
            max-width:100%;
        }

        .h1,h1 {
            font-size: 2rem;
        }

        .dashboard-card a {
            font-size: 1.4rem;
            color: black;
        }
        
    }
</style>

<div class="contentBlocks index content">
    <h1 style="color:#1cc88a">Content Management System</h1>
<!--    <div>-->
<!--        Quick links-->
<!--        --><?php //foreach(array_keys($contentBlocksGrouped) as $parent) { ?>
<!--            :: <a href="#--><?php //= $slugify($parent) ?><!--">--><?php //= $parent ?><!--</a>-->
<!--        --><?php //} ?>
<!--    </div>-->
    <div class="dashboard-container">
    <?php foreach($contentBlocksGrouped as $parent => $contentBlocks) { ?>
        <div class="dashboard-card">
            <h2><a href="<?= $this->Url->build(['controller' => '../ExtendedContentBlocks', 'action' => 'view', $slugify($parent)]) ?>" id="<?= $slugify($parent) ?>">
                    <?= $parent ?>
                </a></h2>
        </div>
    <?php } ?>
    </div>
</div>
