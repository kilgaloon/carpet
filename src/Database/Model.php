<?php 

namespace Carpet\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent
{
    /**
     * Starts to clone data
     *
     * @return void
     */
    public function clone($record) 
    {
        foreach($this->map() as $oldColumn => $newColumn) {
            $this->$newColumn = $record->$oldColumn;
        }

        $this->save();
    }

    abstract protected function map() : array;
}