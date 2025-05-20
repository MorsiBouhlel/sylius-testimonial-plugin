<?php

declare(strict_types=1);

namespace Softylines\SyliusTestimonialPlugin\Uploader;

use Gaufrette\FilesystemInterface;
use Symfony\Component\HttpFoundation\File\File;
use Webmozart\Assert\Assert;

class AvatarUploader implements AvatarUploaderInterface
{
    private Filesystem $filesystem;

    public function __construct(FilesystemInterface $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function upload(File $file): string
    {
        Assert::isInstanceOf($file, File::class);

        $path = $this->getFilePath($file);
        
        if ($this->filesystem->has($path)) {
            $this->filesystem->delete($path);
        }
        
        $content = file_get_contents($file->getPathname());
        $this->filesystem->write($path, $content);

        return $path;
    }

    public function remove(string $path): bool
    {
        if ($this->filesystem->has($path)) {
            return $this->filesystem->delete($path);
        }

        return false;
    }

    private function getFilePath(File $file): string
    {
        return sprintf(
            '%s.%s',
            md5(uniqid((string) mt_rand(), true)),
            $file->guessExtension() ?: 'png'
        );
    }
}
