function approve_withdrawals(id) {
    let message = 'Are you sure to delete?'
    let confirmation_message = 'This action is irreversible!'
    let cancel = 'Cancel'
    let yes_confirm = 'Yes, delete!'

    if (locale_lang && locale_lang == 'fr') {
        message = 'Êtes-vous sûr de vouloir valider?'
        confirmation_message = 'Cette action est irréversible!'
        cancel = 'Annuler'
        yes_confirm = 'Oui, valider!'
    }

    console.log('approve_withdrawals')
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
                type: 'POST',
                url: '/withdrawals/approve/',
                dataType: 'json',
                data: {
                    data: id
                },
                headers: get_headers(),
                success: function (res) {
                    show_success()
                },
                error: function (err) {
                    show_error(err)
                }
            })
        }
    })
}

function approve_sale(id) {
    let message = 'Are you sure to delete?'
    let confirmation_message = 'This action is irreversible!'
    let cancel = 'Cancel'
    let yes_confirm = 'Yes, delete!'

    if (locale_lang && locale_lang == 'fr') {
        message = 'Êtes-vous sûr de vouloir valider?'
        confirmation_message = 'Cette action est irréversible!'
        cancel = 'Annuler'
        yes_confirm = 'Oui, valider!'
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
                type: 'POST',
                url: '/userpacks/approve/',
                dataType: 'json',
                data: {
                    data: id
                },
                headers: get_headers(),
                success: function (res) {
                    show_success()
                },
                error: function (err) {
                    show_error(err)
                }
            })
        }
    })
}

function get_users(url) {
    console.log(url)
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        headers: get_headers(),
        beforeSend: function () {
            //
        },
        success: function (res) {
            $('#data').val(res.id)
            $('#update_benef_depot').val(res.benef_depot)
            $('#update_benef_retrait').val(res.benef_retrait)

        },
        error: function (err) {
            show_error(err)
        }
    })
}

function getPackId(url) {
    console.log(url)
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        headers: get_headers(),
        beforeSend: function () {
            //
        },
        success: function (res) {
            $('#update_name').val(res.name)
            $('#update_amount').val(res.amount)
            $('#update_days').val(res.days)
            $('#update_total_days').val(res.total_days)
            $('#update_percent').val(res.percent)

            $('#update_id').val(res.id)
            $('#pack_id').val(res.id)
        },
        error: function (err) {
            show_error(err)
        }
    })
}

function revoke_withdrawals(id) {
    $('#data').val(id)

}

function validation_identification(id) {
    let message = 'Are you sure to delete?'
    let confirmation_message = 'This action is irreversible!'
    let cancel = 'Cancel'
    let yes_confirm = 'Yes, delete!'

    if (locale_lang && locale_lang == 'fr') {
        message = 'Êtes-vous sûr de vouloir valider?'
        confirmation_message = 'Cette action est irréversible!'
        cancel = 'Annuler'
        yes_confirm = 'Oui, valider!'
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
                type: 'POST',
                url: '/users/identifications/',
                dataType: 'json',
                data: {
                    data: id
                },
                headers: get_headers(),
                success: function (res) {
                    show_success()
                },
                error: function (err) {
                    show_error(err)
                }
            })
        }
    })
}
$('#beneficeSurParraineForm').on('submit', function (event) {
    event.preventDefault()
    var formData = new FormData(this);
    submit_form(formData, '/users/update/benefice', 'POST')
});

$('#revokeWithdrawalForm').on('submit', function (event) {
    event.preventDefault()
    var formData = new FormData(this);
    submit_form(formData, '/withdrawals/revoke/', 'POST')
});

$('#addPackForm').on('submit', function (event) {
    event.preventDefault()
    var formData = new FormData(this);
    submit_form(formData, url, 'POST')
});

$('#updatePackForm').on('submit', function (event) {
    event.preventDefault()
    var formData = new FormData(this);
    submit_form(formData, url + $('#id').val(), 'POST')
});
