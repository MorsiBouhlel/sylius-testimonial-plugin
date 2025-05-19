<?php

declare(strict_types=1);

namespace Softylines\SyliusTestimonialPlugin\Controller;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestimonialController extends ResourceController
{
    public function renderTestimonialsAction(Request $request): Response
    {
        $testimonials = $this->repository->findActiveTestimonials();

        return $this->render('@SoftylinesSyliusTestimonialPlugin/Shop/Testimonial/_testimonials.html.twig', [
            'testimonials' => $testimonials,
        ]);
    }
}
