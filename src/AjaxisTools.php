<?php
namespace Amranidev\Ajaxis;
use Session;
class AjaxisTools
{
    public function __construct() {
    }
    
    protected function generateTD($value) {
        $l = '<td>' . $value . '</td>';
        return $l;
    }
    protected function generateInput($label, $name, $value, $type) {
        $l = '<div class="row"><div class="input-field col s12">';
        $l.= $this->Mtinputcheck($label, $name, $value, $type);
        $l.= '</div></div>';
        return $l;
    }
    protected function startEdit() {
        $l = '<form class="col s12" id = "friendForm" method = "post">
            <input type = "hidden" name = "_token" value = "' . Session::token() . '">
            <div class="modal-content">
                                <h4>Edit</h4>
                                ';
        return $l;
    }
    protected function startCreate() {
        $l = '<form class="col s12"  method = "post">
                    <input type = "hidden" name = "_token" value = "' . Session::token() . '">
                    <div class="modal-content">
                                        <h4>Create</h4>
                                        ';
        return $l;
    }
    protected function endEdit($link) {
        
        $l = '</div>
                    <div class="modal-footer">
                                        <a  href = "#" class=" modal-action waves-effect waves-green btn-flat closeModal">close</a>
                                        <a  href = "#" class="waves-effect waves-green btn-flat update closeModal" data-link = "' . $link . '" type = "submit">agree</a>
                                        
                    </div>
        </form>
        ';
        return $l;
    }
    protected function endCreate($link) {
        
        $l = '</div>
            <div class="modal-footer">
                                <a href = "#" class="modal-action waves-effect waves-green btn-flat closeModal">close</a>
                                <a href = "#" class="waves-effect waves-green btn-flat closeModal save" data-link = "' . $link . '">Create</a>
            </div>
    </form>
    ';
        return $l;
    }
    
    // ************************************************ BootStrap functions ************************************/
    protected function BtHeadModal($title) {
        $l = '<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">' . $title . '</h4>
      </div>
      <div class="modal-body">
      <form  id = "AjaxisForm">
      <input type = "hidden" name = "_token" value = "' . Session::token() . '">
      ';
        return $l;
    }
    protected function BtGenerateInput($label, $name, $value, $type) {
        $l = '<div class="form-group">';
        if ($type == 'select') {
            $l.= '<select class="form-control">';
            foreach ($value as $k => $v) {
                $l.= '<option value = ' . $k . '>' . $v . '</option>';
            }
            $l.= '</select>';
        } 
        else {
            $l.= '<label class="control-label">' . $label . '</label>
            <input id = "' . $name . '" type="' . $type . '" name = "' . $name . '"" class="form-control" value = "' . $value . '" placeholder = "' . $label . '">
            ';
        }
        $l.= '</div>';
        return $l;
    }
    protected function BtEndCreate($link, $action) {
        $l = '
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a class="save btn btn-primary" data-link = "' . $link . '">' . $action . '</a>
      </div>
  </div>
</div>';
        
        return $l;
    }
    protected function BtEndShow() {
        $l = '</form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>';
        return $l;
    }
    private function Mtinputcheck($label, $name, $value, $type) {
        if ($type == 'select') {
            $l = '<select><option value="" disabled selected>Choose your option</option>';
            foreach ($value as $k => $v) {
                $l.= '<option value = ' . $k . '>' . $v . '</option>';
            }
            $l.= '</select>';
            return $l;
        } 
        elseif ($type == 'range') {
            return '<p class="range-field">
                 <input type="range" name="' . $name . '" id = "' . $name . '" min="5" max="100" value = "' . $value . '" /></p>
                 <label for="' . $name . '" class="active">' . $label . '</label>';
        } 
        elseif ($type == 'date') {
            $l = '<input name = "' . $name . '" type="date" class="datepicker"><label for="' . $name . '" class="active">' . $label . '</label>';
            return $l;
        } 
        else {
            $l = '<input  name="' . $name . '" type="' . $type . '" class = "validate" value = "' . $value . '">
                       <label for="' . $name . '" class="active">' . $label . '</label>';
            return $l;
        }
    }
};
