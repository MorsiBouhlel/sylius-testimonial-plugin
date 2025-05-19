# AcmeSyliusTestimonialPlugin

Plugin de témoignages clients pour Sylius.

## Installation

1. Exécutez la commande suivante :

    ```bash
    composer require acme/sylius-testimonial-plugin
    ```

2. Importez les routes dans votre fichier `config/routes.yaml` :

    ```yaml
    acme_sylius_testimonial:
        resource: "@AcmeSyliusTestimonialPlugin/Resources/config/routes.yaml"
    ```

3. Importez les configurations dans votre fichier `config/packages/_sylius.yaml` :

    ```yaml
    imports:
        - { resource: "@AcmeSyliusTestimonialPlugin/Resources/config/app/config.yaml" }
        - { resource: "@AcmeSyliusTestimonialPlugin/Resources/config/grids.yaml" }
        - { resource: "@AcmeSyliusTestimonialPlugin/Resources/config/resources.yaml" }
        - { resource: "@AcmeSyliusTestimonialPlugin/Resources/config/gaufrette.yaml" }
    ```

4. Ajoutez le bundle dans votre fichier `config/bundles.php` :

    ```php
    return [
        // ...
        Acme\SyliusTestimonialPlugin\AcmeSyliusTestimonialPlugin::class => ['all' => true],
    ];
    ```

5. Créez les répertoires nécessaires pour les médias :

    ```bash
    mkdir -p public/media/testimonial/avatar
    ```

6. Mettez à jour votre schéma de base de données :

    ```bash
    bin/console doctrine:schema:update --force
    ```

7. Videz le cache :

    ```bash
    bin/console cache:clear
    ```

## Utilisation

### Administration

Vous pouvez gérer les témoignages depuis le menu "Contenu > Témoignages" dans l'administration de Sylius.

### Front-end

Pour afficher la liste des témoignages, vous pouvez utiliser l'URL `/testimonials`.

Pour afficher une liste de témoignages sur n'importe quelle page (par exemple, la page d'accueil), vous pouvez ajouter le code suivant dans votre template Twig :

```twig
{{ render(url('acme_sylius_testimonial_shop_partial_testimonials')) }}
```

## Personnalisation

Vous pouvez personnaliser le rendu des témoignages en surchargeant les templates :

- `@AcmeSyliusTestimonialPlugin/Shop/Testimonial/index.html.twig` pour la page complète
- `@AcmeSyliusTestimonialPlugin/Shop/Testimonial/_testimonials.html.twig` pour l'affichage partiel

## Licence

Ce plugin est sous licence MIT.
