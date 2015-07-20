<?php
$options += ['method' => 'GET'];

if ((empty($options['url']['controller']) || $this->request->controller === $options['url']['controller']) &&
    (!empty($options['url']['action']) && $this->request->action === $options['url']['action'])
) {
    return;
}

$linkOptions = ['class' => 'btn btn-default'];
if (isset($options['options'])) {
    $linkOptions = $options['options'] + $linkOptions;
}

if ($options['method'] === 'DELETE') {
    $linkOptions += [
        'block' => 'action_link_forms',
        'confirm' => __d('crud', 'Are you sure you want to delete record #{0}?', [$context->{$primaryKey}])
    ];
}

if ($options['method'] !== 'GET') {
    $linkOptions += [
        'method' => $options['method']
    ];
}

if (!empty($options['callback'])) {
    $callback = $options['callback'];
    unset($options['callback']);
    $options['options'] = $linkOptions;
    echo $callback($options, !empty($context) ? $context : null, $this);
    return;
}

$url = $options['url'];
if (!empty($context)) {
    $url[] = $context->{$primaryKey};
}

if ($options['method'] !== 'GET') {
    echo $this->Form->postLink(
        $options['title'],
        $url,
        $linkOptions
    );
    return;
}

echo $this->Html->link(
    $options['title'],
    $url,
    $linkOptions
);
