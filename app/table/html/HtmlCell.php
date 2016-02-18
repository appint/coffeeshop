<?php

namespace App\Table;


class HtmlCell extends Cell
{
    public function show($content)
    {
        $content ? \printf(
                        "<td bgcolor = '#a95e07' width = '30' height = '30'>%d</td>", $content
                    ) :
                   \printf("<td width = '30' height = '30'>%d</td>", $content);
    }
}