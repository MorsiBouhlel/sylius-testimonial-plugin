<?php

declare(strict_types=1);

namespace Softylines\SyliusTestimonialPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $contentMenu = $menu->getChild('content') ?? $menu->addChild('content')
            ->setLabel('softylines_sylius_testimonial.menu.content');

        $contentMenu->addChild('testimonials', ['route' => 'softylines_sylius_testimonial_admin_testimonial_index'])
            ->setLabel('softylines_sylius_testimonial.menu.testimonials')
            ->setLabelAttribute('icon', 'comment');
    }
}
