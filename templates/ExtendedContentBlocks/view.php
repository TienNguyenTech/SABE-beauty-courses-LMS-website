<?php
/**
 * @var \App\View\AppView $this
 * @var \ContentBlocks\Model\Entity\ContentBlock[] $contentBlocks
 * @var string $parent
 */

$this->assign('title', $parent . ' Content Blocks');
$this->Html->css('ContentBlocks.content-blocks', ['block' => true]);
?>

<style>
     @media only screen and (max-width: 768px) {
        .topbar .nav-item .nav-link {
            right:10px;
        }

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

        .dashboard-container {
            flex-direction: column;
        }

        .dashboard-card {
            max-width: 100%;
        }

        .h1,
        h1 {
            font-size: 2rem;
        }

        #des{
            display: none;
        }

        .content-blocks--list-group-item {
            max-width:400px;
            margin-left:-50px;
            margin-right:-10px;
        }
    }
</style>
<h3><?= h($parent) ?> Content Blocks</h3>

<ul class="content-blocks--list-group">
    <?php foreach($contentBlocks as $contentBlock) { ?>
        <li class="content-blocks--list-group-item">
            <div class="content-blocks--text">
                <div class="content-blocks--display-name">
                    <?= h($contentBlock['label']) ?>
                </div>
                <div class="content-blocks--description">
                    <?= h($contentBlock['description']) ?>
                </div>
            </div>
            <div class="content-blocks--actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contentBlock->id], ['class' => 'btn btn-secondary']) ?>
                <?php if (!empty($contentBlock->previous_value)) echo " :: " . $this->Form->postLink(__('Restore'), ['action' => 'restore', $contentBlock->id], ['class' => 'btn btn-primary', 'confirm' => __("Are you sure you want to restore the previous version for this item?\n{0}/{1}\nNote: You cannot cancel this action!", $contentBlock->parent, $contentBlock->slug)]) ?>
            </div>
        </li>
    <?php } ?>
</ul>
