function notificationError(messageError) {
    $.amaran({
        'theme': 'awesome error',
        'content': {
            title: 'Error!',
            bgcolor: '#fc0000',
            message: messageError,
            info: '',
            icon: 'fas fa-exclamation-circle'
        },
        'position': 'top right',
        'cssanimationIn': 'tada',
        'cssanimationOut': 'zoomOutUp',
        'closeOnClick': false,
        'closeButton': true,
        'sticky': true
    });
}

function notificationInfo(messageInfo) {
    $.amaran({
        'theme': 'awesome ok',
        'content': {
            title: 'Aviso',
            bgcolor: '#fc0000',
            message: messageInfo,
            info: '',
            icon: 'fas fa-exclamation-circle'
        },
        'position': 'top right',
        'inEffect': 'slideRight',
        'cssanimationIn': 'tada',
        'closeOnClick': true,
        'cssanimationOut': 'fadeOutRight',
        'outEffect': 'slideRight'
    });
}
function notificationWarring(messageWarring){
    $.amaran({
        'content':{
            title:'Advertencia!',
            message: messageWarring,
            info:'',
            icon:'fas fa-exclamation'
        },
        'theme':'awesome warning',
        'position': 'top right',
        'closeOnClick': true,
        'cssanimationIn'    :'swing',
        'cssanimationOut'   :'bounceOut',
        'delay'     :10000
    });
}
//https://amaranjs.com/examples