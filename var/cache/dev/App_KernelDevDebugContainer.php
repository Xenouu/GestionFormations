<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerMVXYsGP\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerMVXYsGP/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerMVXYsGP.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerMVXYsGP\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerMVXYsGP\App_KernelDevDebugContainer([
    'container.build_hash' => 'MVXYsGP',
    'container.build_id' => '36f36720',
    'container.build_time' => 1647355592,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerMVXYsGP');
