$(document).ready(function(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function get_headers() {
    let headers = {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    }
    return headers;
}

function show_error(data) {
    let content = data.responseJSON
    show_error_message(content.message, data.status)
    // Supprimer les messages d'erreur existants
    $('.validation-error-message').empty().hide();
    $('.is-invalid').removeClass('is-invalid');

    if(content.message === 'Unauthenticated.'){
        $(location).attr('href', login_url)
    }

    if (content.errors) {
        Object.entries(content.errors).forEach(entry => {
            const [key, value] = entry;
            $('.' + key).addClass('is-invalid')
            $('.error_' + key).html(value[0])
            $('.error_' + key).show()

            if ($('.error_' + key).hasClass('hidden')) {
                $('.error_' + key).removeClass('hidden')
            }
        });
    }
}

function show_error_message(message_server = "", code="") {
    console.log('show_error_message', message_server, code)
    let message = 'Error...'.message_server

    const errorMessages = {
        '400': {
            en: 'Bad Request',
            fr: 'Requête incorrecte'
        },
        '401': {
            en: 'Unauthorized',
            fr: 'Non autorisé'
        },
        '403': {
            en: 'Forbidden',
            fr: 'Accès refusé'
        },
        '404': {
            en: 'Page not found',
            fr: 'Page non trouvée'
        },
        '500': {
            en: 'Internal Server Error',
            fr: 'Erreur interne du serveur'
        },
        '503': {
            en: 'Service Unavailable',
            fr: 'Service non disponible'
        },
        '504': {
            en: 'Gateway Timeout',
            fr: 'Délai d\'attente dépassé'
        },
        '422': {
            en: 'An error occurred while validating the form. Please fill in all required fields to proceed.',
            fr: 'Une erreur est survenue lors de la validation du formulaire. Veuillez remplir tous les champs obligatoires pour poursuivre.'
        }
        // Ajoutez des codes d'erreur supplémentaires avec leurs messages correspondants
    };

    if (code) {
        const errorMessage = errorMessages[code];
        if (errorMessage) {
            message = (locale_lang && locale_lang === 'fr') ? errorMessage.fr : errorMessage.en;
        }
    }


    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    Toast.fire({
        icon: 'error',
        title: message
    });
}


function show_success(url = null) {
    console.log('show_success')
    let message = 'Operation successful'

    if(locale_lang && locale_lang=='fr'){
        message = 'Operation réussie'
    }
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
        icon: 'success',
        title: message
    })

    if (url) {
        $(location).attr('href', url)
    } else {
        location.reload(true);
    }

}

function redirect_page(url){
    if (url) {
        $(location).attr('href', url)
    }else{
        refresh_page()
    }
}

function refresh_page(){
    location.reload(true);
}

function show_success_2(message) {
    console.log('show_success_2')
    if(!message){
        let message = 'Operation successful'
    
        if(locale_lang && locale_lang=='fr'){
            message = 'Operation réussie'
        }
    }
    
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
        icon: 'success',
        title: message
    })
}

function show_success_import(message = null) {
    if (message == null) {
        message = "Base de donnée mis à jours !!!"
    }

    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
        icon: 'success',
        title: "Opération réussie"
    })

    Swal.fire({
        title: 'Opération réussie!',
        text: message,
        icon: 'success',
        confirmButtonColor: '#dd3333',
        confirmButtonText: 'OK!',
    }).then((result) => {
        if (result.isConfirmed) {
            $(location).attr('href', url)
        }
    })
}

function destroy(id) {
    let message = 'Are you sure to delete?'
    let confirmation_message = 'This action is irreversible!'
    let cancel = 'Cancel'
    let yes_confirm = 'Yes, delete!'

    if(locale_lang && locale_lang=='fr'){
        message = 'Êtes-vous sûr de supprimer?'
        confirmation_message = 'Cette action est irréversible!'
        cancel = 'Annuler'
        yes_confirm = 'Oui, supprimer!'
    }

    Swal.fire({
        title: message,
        text: confirmation_message,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: cancel,
        confirmButtonText: yes_confirm
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'DELETE',
                url: url + '/' + id,
                dataType: 'json',
                headers: get_headers(),
                success: function(res) {
                    show_success()
                },
                error: function(err) {
                    show_error(err)
                }
            })

        }
    })
}


function submit_form_and_return(data, url, type){
    disable_submit_button()

    $.ajax({
        type: type,
        url: url,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            enable_submit_utton()
            show_success_2()
            return res.data
        },
        error: function(errors) {
            enable_submit_utton()
            show_error(errors)
        }
    });
}

function submit_form(data, url, type, url_redirect){
    disable_submit_button()

    $.ajax({
        type: type,
        url: url,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            enable_submit_utton()
            show_success(url_redirect)
        },
        error: function(errors) {
            enable_submit_utton()
            show_error(errors)
        }
    });
}

function import_data(data, url){
    disable_submit_button()

    $.ajax({
        type: 'POST',
        url: url + '/import',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            enable_submit_utton()
            show_success_import("Le traitement s'effectuera en arrière-plan et les données seront disponibles au fur et à mesure")
        },
        error: function(errors) {
            enable_submit_utton()
            show_error(errors)
        }
    });
}



function disable_submit_button(button=null){
    console.log('desable btn')
    if (button) {
        button.attr('disabled', true)
    } else {
        $('button[type=submit]').attr('disabled', true)
        $('button[type=button]').attr('disabled', true)
    }
}

function enable_submit_utton(button=null){
    console.log('desable btn')
    if (button) {
        button.attr('disabled', false)
    } else {
        $('button[type=submit]').attr('disabled', false)
        $('button[type=button]').attr('disabled', false)
    }
}