# SoftylinesSyliusTestimonialPlugin

Plugin de témoignages clients pour Sylius.

## Installation

1. Exécutez la commande suivante :

    ```bash
    composer require softylines/sylius-testimonial-plugin
    ```

2. Importez les routes dans votre fichier `config/routes.yaml` :

    ```yaml
    softylines_sylius_testimonial:
        resource: "@SoftylinesSyliusTestimonialPlugin/Resources/config/routes.yaml"
    ```

3. Importez les configurations dans votre fichier `config/packages/_sylius.yaml` :

    ```yaml
    imports:
        - { resource: "@SoftylinesSyliusTestimonialPlugin/Resources/config/app/config.yaml" }
        - { resource: "@SoftylinesSyliusTestimonialPlugin/Resources/config/gaufrette.yaml" }
        - { resource: "@SoftylinesSyliusTestimonialPlugin/Resources/config/grids.yaml" }
        - { resource: "@SoftylinesSyliusTestimonialPlugin/Resources/config/resources.yaml" }
    ```

4. Ajoutez le bundle dans votre fichier `config/bundles.php` :

    ```php
    return [
        // ...
        Softylines\SyliusTestimonialPlugin\SoftylinesSyliusTestimonialPlugin::class => ['all' => true],
    ];
    ```

5. Assurez-vous que les bundles suivants sont correctement activés :

    ```php
    // config/bundles.php
    return [
        // ...
        Knp\Bundle\GaufretteBundle\KnpGaufretteBundle::class => ['all' => true],
        Liip\ImagineBundle\LiipImagineBundle::class => ['all' => true],
        // ...
    ];
    ```

6. Créez les répertoires nécessaires pour les médias :

    ```bash
    mkdir -p public/media/testimonial/avatar
    ```

7. Mettez à jour votre schéma de base de données :

    ```bash
    bin/console doctrine:schema:update --force
    ```

8. Videz le cache :

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
{{ render(url('softylines_sylius_testimonial_shop_partial_testimonials')) }}
```

## Personnalisation

Vous pouvez personnaliser le rendu des témoignages en surchargeant les templates :

- `@SoftylinesSyliusTestimonialPlugin/Shop/Testimonial/index.html.twig` pour la page complète
- `@SoftylinesSyliusTestimonialPlugin/Shop/Testimonial/_testimonials.html.twig` pour l'affichage partiel

## Dépannage

Si vous rencontrez l'erreur "No filesystem is registered for name 'avatar'", assurez-vous que :

1. La configuration Gaufrette est correctement importée dans votre fichier `config/packages/_sylius.yaml`
2. Les dépendances `knp/gaufrette-bundle` et `liip/imagine-bundle` sont installées
3. Les bundles correspondants sont activés dans `config/bundles.php`

## Licence

Ce plugin est sous licence MIT.
