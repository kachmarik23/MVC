<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="reg_login" class="col-sm-2 col-form-label">Логин:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="reg_login" name="reg_login"
                               placeholder="Введите логин">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="reg_pass" class="col-sm-2 col-form-label">Пароль:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="reg_pass" name="reg_pass"
                               placeholder="Введите пароль">
                    </div>
                </div>
            </div>
            <div id="reg_err" class="alert alert-danger ml-3 mr-3" style="display: none"><strong>Error:</strong><span id="message_reg"></span></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть </button>
                <button type="button" class="btn btn-primary"  onclick="makeRegister()">Register</button>
            </div>
        </div>
    </div>
</div>