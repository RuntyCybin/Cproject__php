<?php

class modal {
    private $head;
    private $body;
    private $footer;
    private $id;
    
    public function __construct($id, $h, $b, $f) {
        $this->head = $h;
        $this->body = $b;
        $this->footer = $f;
        $this->id = $id;
    }
    
    public function printHead(){
        echo '<div class="modal fade" id="'.$this->id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">';
        echo $this->head;
    }
    
    public function printBody(){
        echo '</div>
              <div class="modal-body">';
        echo $this->body;
        echo '</div>';
    }
    
    public function printFooter(){
        echo '<div class="modal-footer">';
        echo $this->footer;
        echo '</div>
            </div>
        </div>
    </div>';
    }
}
