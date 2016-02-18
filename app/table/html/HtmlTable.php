<?php

namespace App\Table;


class HtmlTable extends Table
{
    public function show()
    {
        print "<table border = 1>\n";
        
        foreach ($this->rows as $row) {
            $row->show();
        }
        
        print "</table>\n";
    }
}