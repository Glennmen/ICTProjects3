<?php

class popup {
    public function get_Popup()
    {     
        $main = '<div class="container">
          <div class="modal fade" id="myModal" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form id = "nicknameform" action="MainController" method="post">
                    <div class="modal-header">
                       <h4 class="modal-title">Enter nickname </h4>
                    </div>
                    <div class="modal-body">'.
                    validation_errors().
                    '<div id="alert" class="alert alert-info" role="alert" style="display: none">Verplicht nickname in te voeren.</div>
                      <input type="text" name="nicknameText" id="nicknameText" onchange="button()" required>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" id="btnSubmit" class="btn btn-default" data-dismiss="modal" value="Save" disabled />
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>';
        return $main;
    }
}
