$('#cpf').mask('000.000.000-00');



var MaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
maskOptions = {
onKeyPress: function(val, e, field, options) {
    field.mask(MaskBehavior.apply({}, arguments), options);
    }
};

$('#phone').mask(MaskBehavior, maskOptions);