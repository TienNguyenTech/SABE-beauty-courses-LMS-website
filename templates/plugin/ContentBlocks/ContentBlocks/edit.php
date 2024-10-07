<?php
/**
 * @var \App\View\AppView $this
 * @var \ContentBlocks\Model\Entity\ContentBlock $contentBlock
 */

$this->assign('title', 'Edit Content Block - Content Blocks');

$this->Html->script('ContentBlocks.ckeditor/ckeditor', ['block' => true]);

$this->Html->css('ContentBlocks.content-blocks', ['block' => true]);
?>

<style>
    .ck-editor__editable_inline {
        min-height: 25rem; /* Increase CKEditor field minimal height */
    }
</style>

<div class="container"  >
    <div class="row justify-content-left">

        <div class="col-md-10" >
            <div class="card"  >
                <div class="card-header"><?= __('Edit Content Block') ?></div>

                <div class="card-body">
                    <?= $this->Form->create($contentBlock, ['type' => 'file', 'class' => 'form-horizontal']) ?>
                    <div class="content-blocks--description">
                        <?= $contentBlock['description'] ?>
                    </div>
                    <?php
                    if ($contentBlock->type === 'text') {
                        echo $this->Form->control('value', [
                            'type' => 'textarea',
                            'value' => html_entity_decode($contentBlock->value),
                            'label' => false,
                            'style' => 'height: 100px ;', // Adjust the height and width as needed
                            'class' => 'form-control'
                        ]);}
                    else if ($contentBlock->type === 'html') {

                        echo $this->Form->control('value', [
                            'type' => 'textarea',
                            'label' => false,
                            'id' => 'content-value-input',
                            'style' => ' width: 100%; color: black;',
                            'class' => 'form-control'
                        ]);
                        // Load CKEditor.

                        // The script is omitted for brevity.
                        ?>


                        <script>
                            /*
                            Create our CKEditor instance in a DOMContentLoaded event callback, to ensure
                            the library is available when we call `create()`.
                            Fixes https://github.com/ugie-cake/cakephp-content-blocks/issues/4.
                            */
                            document.addEventListener("DOMContentLoaded", (event) => {
                                CKSource.Editor.create(
                                    document.getElementById('content-value-input'),
                                    {
                                        toolbar: [
                                            "heading", "|",
                                            "bold", "italic", "underline", "|",
                                            "bulletedList", "numberedList", "|",
                                            "alignment", "blockQuote", "|",
                                            "indent", "outdent", "|",
                                            "link", "|",
                                            "insertTable", "imageInsert", "mediaEmbed", "horizontalLine", "|",
                                            "removeFormat", "|",
                                            "sourceEditing", "|",
                                            "undo", "redo",
                                        ],
                                        simpleUpload: {
                                            uploadUrl: <?= json_encode($this->Url->build(['action' => 'upload'])) ?>,
                                            headers: {
                                                'X-CSRF-TOKEN': <?= json_encode($this->request->getAttribute('csrfToken')) ?>,
                                            }
                                        }
                                    }
                                ).then(editor => {
                                    console.log(Array.from( editor.ui.componentFactory.names() ));
                                });
                            });
                        </script>
                    <?php }
                    else if ($contentBlock->type === 'image') {

                        if ($contentBlock->value) {
                            echo $this->Html->image($contentBlock->value, ['class' => 'content-blocks--image-preview']);
                        }

                        echo $this->Form->control('value', [
                            'type' => 'file',
                            'accept' => 'image/*',
                            'label' => false,
                            'class' => 'form-control'
                        ]);
                    }

                    ?>
                    <div class="form-group" style="margin-top: 20px;">
                        <?= $this->Form->button(__('Save' ), ['class' => 'btn btn-primary']) ?>
                        <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
