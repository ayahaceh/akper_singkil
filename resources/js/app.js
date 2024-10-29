// require('./bulma');
// require('./modal');
// require('./dropdown');

// utility

$(window).on('load', function () {
    if (feather) {
        feather.replace({
            width: 14,
            height: 14
        });
    }
});

// loading page
$(function () {
    $('.pageloader').removeClass('is-active');
});

// select2
if ($('.select2')[0]) {
    $('.select2').select2();
}

// disabled button on form submit
$('form').submit(function () {
    if ($(this).attr('this-disabled-button') == undefined) {
        $('button[type="submit"]').attr('disabled', 'disabled');
    }
});

setPageLoading = function (boolean = true) {
    if (boolean) {
        $('.pageloader').addClass('is-active');
    } else {
        $('.pageloader').removeClass('is-active');
    }
}

// end Utility

// confirm
confirm = function (title, text, then, confirmButtonText = 'OK', cancelButtonText = 'Batal') {
    Swal.fire({
        title: title === 'default' ? 'Apakah Anda yakin?' : title,
        text: text,
        icon: 'warning',
        showCancelButton: true,
        // confirmButtonColor: 'hsl(217, 71%, 53%)',
        // cancelButtonColor: '#d33',
        confirmButtonText: confirmButtonText,
        cancelButtonText: cancelButtonText,
    }).then((result) => {
        if (result.isConfirmed) {
            then();
        }
    });
};

// ajax delete
ajaxDelete = function (route, csrf_token, redirect = 'reload') {
    setPageLoading();
    $.ajax({
        url: route,
        type: 'DELETE',
        data: {
            _token: csrf_token
        },
        success: function (response) {
            if (response.status === 'success') {
                if (redirect == 'reload') {
                    window.location.reload();
                } else {
                    window.location.href = redirect;
                }
            } else {
                setPageLoading(false);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.message,
                })
            }
        },
        error: function (response) {
            setPageLoading(false);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terjadi kesalahan saat menghapus data.',
            })
        }
    });
}

// select2 pagination
select2Pagination = function (element, route, parameters = {}, modal = false) {
    $(element).select2({
        dropdownParent: modal,
        ajax: {
            url: route,
            data: function (params) {
                const query = {
                    cari: params.term,
                    page: params.page || 1
                }

                $.extend(query, parameters);

                return query;
            },
            processResults: function (response, params) {
                return {
                    results: response.data,
                    pagination: {
                        more: ((params.page || 1) * response.meta.per_page) < response.meta.total
                    }
                };
            },
            dataType: 'json'
        }
    });
}

logout = function (route) {
    confirm('default', 'Anda akan mengakhiri sesi.', function () {
        setPageLoading();
        window.location.href = route;
    }, 'Ya, Keluar');
}

toastSuccess = function (message) {
    toastr.success(message, "Success!", {
        closeButton: true,
        tapToDismiss: false,
        progressBar: true,
    })
}

toastFailed = function (message) {
    toastr.error(message, "Error!", {
        closeButton: true,
        tapToDismiss: false,
        progressBar: true,
    })
}

alertSuccess = function (message) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: message,
    })
}

alertFailed = function (message) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: message,
    })
}