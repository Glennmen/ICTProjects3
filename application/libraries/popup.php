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
                    <div class="modal-body row">'.
                    validation_errors().
                    '<div id="alert" class="alert alert-info" role="alert" style="display: none">Verplicht nickname in te voeren.</div>
                        <div class="col-xs-4">
                      <input type="text" name="nicknameText" class="form-control" id="nicknameText" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" id="btnSubmit" class="btn btn-default" data-dismiss="modal" value="Save" />
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>';
        return $main;
    }
}
