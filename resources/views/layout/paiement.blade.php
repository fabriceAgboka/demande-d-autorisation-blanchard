<div class="modal fade" id="twoFactorAuth" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-simple">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Selectionnez votre moyen de paiement</h3>
                    <p class="text-muted">
                        You also need to select a method by which the proxy authenticates to the directory serve.
                    </p>
                </div>

                <div class="form-check custom-option custom-option-basic mb-3">
                    <label
                        class="form-check-label custom-option-content ps-3"
                        for="customRadioTemp3"
                        onclick="pack_paiements()"
                    >
                        <input
                        name="customRadioTemp"
                        class="form-check-input d-none"
                        type="radio"
                        value=""
                        id="customRadioTemp3"
                        />
                        <div class="d-flex align-items-start">
                            <i class="fa-brands fa-btc fa-2xl mt-4 me-3"></i>
                            <div>
                                <span class="custom-option-header">
                                    <span class="h4 mb-2">Crypto</span>
                                </span>
                                <span class="custom-option-body">
                                    <p class="mb-0">
                                        We will send a code via SMS if you need to use your backup login method.
                                    </p>
                                </span>
                            </div>
                        </div>
                    </label>
                </div>

                <div class="form-check custom-option custom-option-basic mb-3">
                    <label
                        class="form-check-label custom-option-content ps-3"
                        for="customRadioTemp1"
                        onclick="pack_paiements()"
                    >
                        <input
                        name="customRadioTemp"
                        class="form-check-input d-none"
                        type="radio"
                        value=""
                        id="customRadioTemp1"
                        />
                        <div class="d-flex align-items-start">
                            <i class="ti ti-mobile-phone ti-xl me-3"></i>
                            <i class="fa-solid fa-mobile fa-2xl mt-4 me-3"></i>
                            <div>
                                <span class="custom-option-header">
                                    <span class="h4 mb-2">Mobile money</span>
                                </span>
                                <span class="custom-option-body">
                                    <p class="mb-0">
                                        Get code from an app like Google Authenticator or Microsoft Authenticator.
                                    </p>
                                </span>
                            </div>
                        </div>
                    </label>
                </div>

                <div class="form-check custom-option custom-option-basic mb-3">
                    <label
                        class="form-check-label custom-option-content ps-3"
                        for="customRadioTemp2"
                        onclick="pack_paiements()"
                    >
                        <input
                        name="customRadioTemp"
                        class="form-check-input d-none"
                        type="radio"
                        value=""
                        id="customRadioTemp2"
                        />
                        <div class="d-flex align-items-start">
                            <i class="ti ti-credit-card ti-xl me-3"></i>
                            <div>
                                <span class="custom-option-header">
                                    <span class="h4 mb-2">Carte prépayée</span>
                                </span>
                                <span class="custom-option-body">
                                    <p class="mb-0">
                                        We will send a code via SMS if you need to use your backup login method.
                                    </p>
                                </span>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>