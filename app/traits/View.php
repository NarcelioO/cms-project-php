<?php

namespace app\traits;

trait View{

    public function view($data, $path){
        $template = $this->twig->load(str_replace('.', '/', $path.'.html'));

        return $template->display($data);
    }
}