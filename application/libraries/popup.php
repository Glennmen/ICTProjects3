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
                    <div class="modal-body">
                      <input type="text" name="nicknameText" required>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" id="btnSubmit" class="btn btn-default" data-dismiss="modal" value="Save" />
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <script>
        $(window).load(function(){$("#myModal").modal("show");});
        </script>'
                ."<script>"
                . "$('#btnSubmit').click(function(){"
                . "$('#nicknameform').submit();"
                . "});"
                . "</script>";
        return $main;
    }
}
