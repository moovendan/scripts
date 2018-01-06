<?php

namespace Collections;

interface ConstCollectionInterface extends \Countable
{
    /**
     * Verifies whether a collection is empty
     * @return bool Returns TRUE if the collection is empty; FALSE otherswise.
     */
    public function isEmpty();
}
