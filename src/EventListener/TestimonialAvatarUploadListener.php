<?php

declare(strict_types=1);

namespace Softylines\SyliusTestimonialPlugin\EventListener;

use Softylines\SyliusTestimonialPlugin\Entity\Testimonial;
use Softylines\SyliusTestimonialPlugin\Uploader\AvatarUploaderInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Webmozart\Assert\Assert;

final class TestimonialAvatarUploadListener
{
    private AvatarUploaderInterface $uploader;

    public function __construct(AvatarUploaderInterface $uploader)
    {
        $this->uploader = $uploader;
    }

    public function uploadAvatar(GenericEvent $event): void
    {
        $testimonial = $event->getSubject();
        Assert::isInstanceOf($testimonial, Testimonial::class);

        $avatarFile = $testimonial->getAvatarFile();
        if ($avatarFile === null) {
            return;
        }

        if ($testimonial->getAvatar() !== null) {
            $this->uploader->remove($testimonial->getAvatar());
        }

        $path = $this->uploader->upload($avatarFile);
        $testimonial->setAvatar($path);
    }
}
