<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
$controller = $this->request->getParam('controller');
$style = ($controller === 'Enquirys') ? 'background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 10px; border-radius: 5px;' : '';
?>
<div style="<?= $style ?>" onclick="this.classList.add('hidden')"><?= $message ?></div>
