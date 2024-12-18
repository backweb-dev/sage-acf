<?php

namespace Backweb\SageAcf\Providers;

use Backweb\SageAcf\AcfFields\AcfFieldContent;
use Backweb\SageAcf\AcfFields\AcfFieldTitle;
use Backweb\SageAcf\View\Components\Img;
use Illuminate\Support\Facades\Blade;
use Roots\Acorn\Sage\SageServiceProvider;

class SageAcfServiceProvider extends SageServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        // Ajouter des helpers ou logiques (ex: dans un fichier Helpers.php).

    }

    /**
     * Boot services.
     */
    public function boot()
    {
        // Vous pourriez aussi charger des routes ou des traductions ici (optionnel).
        add_filter('acf/fields/wysiwyg/toolbars', [$this, 'acf_toolbars']);
        add_action('acf/init', [$this, 'acf_fields']);
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'Acf');
        $this->acf_components();
        $this->blade_directives();
    }

    /**
     * Adds a new toolbar called "Simple" with a single row of buttons.
     *
     * @param array $toolbars The existing toolbars.
     * @return array The modified toolbars with the new "Simple" toolbar.
     */
    public function acf_toolbars($toolbars)
    {
        /** Add a new toolbar called "Simple"
         *  - this toolbar has 1 row of buttons
         */
        $toolbars['Simple'] = array();
        $toolbars['Simple'][1] = array('formatselect', 'bullist', 'italic', 'bold', 'underline', 'link', 'undo', 'redo');

        /** Return the modified toolbars */
        return $toolbars;
    }

    public function acf_fields()
    {
        new AcfFieldTitle();
        new AcfFieldContent();
    }

    public function acf_components()
    {
        Blade::component('Acf::img', Img::class);
    }

    public function blade_directives()
    {
        // Directive @rows()
        Blade::directive('rows', function ($expression) {
            return "<?php if(have_rows($expression)): while(have_rows($expression)): the_row(); ?>";
        });

        // Directive @endRows()
        Blade::directive('endRows', function () {
            return "<?php endwhile; endif; ?>";
        });

        // Directive @haveRows()
        Blade::directive('haveRows', function ($expression) {
            return "<?php if(have_rows($expression)): ?>";
        });

        // Directive @whileRows()
        Blade::directive('whileRows', function ($expression) {
            return "<?php while(have_rows($expression)): the_row(); ?>";
        });

    }
}
