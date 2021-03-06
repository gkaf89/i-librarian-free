<?php

namespace LibrarianApp;

use Exception;
use Librarian\Html\Bootstrap;
use Librarian\Mvc\TextView;

class ScopusView extends TextView {

    use SharedHtmlView;

    /**
     * @return string
     * @throws Exception
     */
    public function main() {

        $this->title("Scopus {$this->lang->t9n('Search-NOUN')}");

        $this->head();

        /** @var Bootstrap\Breadcrumb $el */
        $el = $this->di->get('Breadcrumb');

        $el->style('margin: 0 -15px');
        $el->addClass('bg-transparent');
        $el->item('IL', '#dashboard');
        $el->item("Scopus {$this->lang->t9n('Search-NOUN')}");
        $bc = $el->render();

        $el = null;

        /** @var Bootstrap\Alert $el */
        $el = $this->di->get('Alert');

        $el->context('danger');
        $el->html(<<<ALERT
            Scopus search is available in <i>I, Librarian Pro</i> only. <a href="https://i-librarian.net">Upgrade now</a>
ALERT
        );
        $alert = $el->render();

        $el = null;

        /** @var Bootstrap\Row $el */
        $el = $this->di->get('Row');

        $el->column($alert, 'col-xl-6 offset-xl-3');
        $row = $el->render();

        $el = null;

        $this->append([
            'html' => $bc . $row
        ]);

        return $this->send();
    }
}
