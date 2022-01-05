<?php namespace app\Presenters;

use Illuminate\Pagination\BootstrapThreePresenter;

class BootstrapTwoPresenter extends BootstrapThreePresenter
{
    public function render()
    {
        if (! $this->hasPages()) {
            return '';
        }

        return sprintf(
      '<ul class="pagination pagination-sm"><li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">',
      $this->getPreviousButton(), '</span>
            </a>
          </li>',
      $this->getLinks(),
      $this->getNextButton(),
      '</ul>'
    );
    }
}
