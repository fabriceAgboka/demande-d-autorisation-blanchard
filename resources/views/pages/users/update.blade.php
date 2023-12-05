<div class="modal modal-slide-in sidebar-todo-modal fade" id="UpdateUserModal">
    <div class="modal-dialog sidebar-lg">
        <div class="modal-content p-0">
            <form class="add-new-record modal-content pt-0" id="UpdateUserForm" method="POST">
                <div class="modal-header align-items-center mb-1">
                    <h5 class="modal-title">Modifier un administrateurs</h5>
                    <div class="todo-item-action d-flex align-items-center justify-content-between ms-auto">
                        <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal" stroke-width="3"></i>
                    </div>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="form-group mt-1">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" id="update_nom" name="nom" class="form-control" />
                        <small class="text-danger font-size-xsmall error_nom hidden"></small>
                    </div>

                    <div class="form-group mt-1">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" id="update_prenom" name="prenom" class="form-control" />
                        <small class="text-danger font-size-xsmall error_prenom hidden"></small>
                    </div>

                    <div class="form-group mt-1">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="update_email" name="email" />
                        <small class="text-danger font-size-xsmall error_email hidden"></small>
                    </div>

                    <div class="form-group mt-1">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="text" id="update_phone" name="phone" class="form-control" />
                        <small class="text-danger font-size-xsmall error_phone hidden"></small>
                    </div>

                    <div class="d-flex justify-content-end mt-2">
                        <button type="reset" class="btn btn-outline-secondary" style="margin-right: 10px"
                            data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
