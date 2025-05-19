<?php

declare(strict_types=1);

namespace Softylines\SyliusTestimonialPlugin\Uploader;

use Symfony\Component\HttpFoundation\File\File;

interface AvatarUploaderInterface
{
    public function upload(File $file): string;
    
    public function remove(string $path): bool;
}
