<?php

namespace App\Table;


class HtmlRow extends Row
{
    public function show()
    {
        print "<tr>\n";
        
        foreach ($this->contents as $content) {
            $this->cell->show($content);
        }
        
        print "</tr>\n";
    }
}