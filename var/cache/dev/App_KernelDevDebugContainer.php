<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerJbHTdgx\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerJbHTdgx/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerJbHTdgx.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerJbHTdgx\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerJbHTdgx\App_KernelDevDebugContainer([
    'container.build_hash' => 'JbHTdgx',
    'container.build_id' => '81da9266',
    'container.build_time' => 1647535966,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerJbHTdgx');
