<?php
foreach ($actions as $action => $options):
    echo $this->CrudView->processAction($action, $singularVar, $options);
endforeach;
