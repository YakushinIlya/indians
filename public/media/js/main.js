function age18() {
    localStorage.setItem('age', 18);
}

/*let basketCount = localStorage.getItem('basketCount');
if(basketCount) {
    $('#countBasket').text(basketCount);
}*/


$.fn.setCursorPosition = function(pos) {
    if ($(this).get(0).setSelectionRange) {
        $(this).get(0).setSelectionRange(pos, pos);
    } else if ($(this).get(0).createTextRange) {
        var range = $(this).get(0).createTextRange();
        range.collapse(true);
        range.moveEnd('character', pos);
        range.moveStart('character', pos);
        range.select();
    }
};
$("input[name=phone]").click(function(){
    $(this).setCursorPosition(3);
}).mask("+7(999)999-9999");



$("#formReg").on("submit", function(e){
    e.preventDefault();
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $.ajax({
        type: 'POST',
        url: '/api/v1/register',
        dataType: 'json',
        data: {
            phone: this['phone'].value,
            password: this['password'].value,
            password_confirmation: this['password_confirmation'].value,
            db_day: this['db_day'].value,
            db_month: this['db_month'].value,
            db_year: this['db_year'].value,
        },
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function success(data) {
            if (data.status == 201) {
                console.log(data);
                $('#modalAuth #phoneAuth').val(data.data.phone);
                $('#modalReg').modal('toggle');
                $('#modalAuth').modal('show');
            }
        },
        error: function error(msg) {
            if (msg.status == 422) {
                let errors = msg.responseJSON.errors;
                 $.each(errors, function(k, v){
                     $("input[name="+k+"]").addClass("is-invalid");
                     $("input[name="+k+"]").after('<div class="invalid-feedback">'+v+'</div>');
                 });
            }
        }
    });
});

$("#formAuth").on("submit", function(e){
    e.preventDefault();
    let submit = false;
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $.ajax({
        type: 'POST',
        url: '/api/v1/auth',
        dataType: 'json',
        data: {
            phone: this['phone'].value,
            password: this['password'].value,
        },
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function success(data) {
            console.log(data+111);
            if (data.status == 200) {
                $("#formAuth").unbind('submit').submit();
            }
        },
        error: function error(msg) {
            console.log(msg);
            if (msg.status == 422) {
                let errors = msg.responseJSON.errors;
                 $.each(errors, function(k, v){
                     $("#formAuth input[name="+k+"]").addClass("is-invalid");
                     $("#formAuth input[name="+k+"]").after('<div class="invalid-feedback">'+v+'</div>');
                 });
            }
        }
    });
});


$("#formOrder").on("submit", function(e){
    e.preventDefault();
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').remove();

    let arrErr = {};
    let pattPh = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/;
    let pattEm = /^\S+@\S+\.\S+$/;
    let patt09 = /^[0-9]+$/;
    let pattAZ = /^[А-Яа-я ]+$/;

    if(!pattAZ.test(this['fio'].value)){
        arrErr['fio'] = 'Необходимо заполнить "ФИО"';
    }
    if(!pattPh.test(this['phone'].value)){
        arrErr['phone'] = 'Необходимо заполнить "Телефон"';
    }
    if(!pattEm.test(this['email'].value)){
        arrErr['email'] = 'Необходимо заполнить "E-mail"';
    }

    if(this['shipping'].value==''){
        $("#head-shipping").after('<div class="invalid-feedback d-block h5">Необходимо выбрать способ доставки</div>');
    }
    if(this['payment'].value==''){
        $("#head-payment").after('<div class="invalid-feedback d-block h5">Необходимо выбрать способ оплаты</div>');
    }

    if(this['shipping'].value==1){
        if(!pattAZ.test(this['region_point'].value)){
            arrErr['region_point'] = 'Необходимо заполнить "Область / район"';
        }
        if(!pattAZ.test(this['region_point'].value)){
            arrErr['point'] = 'Необходимо заполнить "Пункт выдачи"';
        }
    }

    if(this['shipping'].value==2){
        if(!pattAZ.test(this['region'].value)){
            arrErr['region'] = 'Необходимо заполнить "Область / район"';
        }
        if(!pattAZ.test(this['city'].value)){
            arrErr['city'] = 'Необходимо заполнить "Город"';
        }
        if(!pattAZ.test(this['street'].value)){
            arrErr['street'] = 'Необходимо заполнить "Улица"';
        }
        if(!patt09.test(this['zipcode'].value)){
            arrErr['zipcode'] = 'Необходимо заполнить "Индекс"';
        }
        if(this['level'].value!='' && !patt09.test(this['level'].value)){
            arrErr['level'] = 'Необходимо заполнить "Этаж"';
        }
        if(!patt09.test(this['home'].value)){
            arrErr['home'] = 'Необходимо заполнить "Дом"';
        }
        if(this['housing'].value!='' && !patt09.test(this['housing'].value)){
            arrErr['housing'] = 'Необходимо заполнить "Корпус"';
        }
        if(this['flat'].value!='' && !patt09.test(this['flat'].value)){
            arrErr['flat'] = 'Необходимо заполнить "Квартира"';
        }
    }

    if (arrErr.length!=0){
        $.each(arrErr, function(k, v){
            $("input[name="+k+"]").addClass("is-invalid");
            $("input[name="+k+"]").after('<div class="invalid-feedback">'+v+'</div>');
        });

    }



    /*$.ajax({
        type: 'POST',
        url: '/api/v1/order',
        dataType: 'json',
        data: {
            fio: this['fio'].value,
            email: this['email'].value,
            phone: this['phone'].value,
            shipping: this['shipping'].value,
            region_point: this['region_point'].value,
            point: this['point'].value,
            region: this['region'].value,
            city: this['city'].value,
            street: this['street'].value,
            zipcode: this['zipcode'].value,
            level: this['level'].value,
            home: this['home'].value,
            housing: this['housing'].value,
            flat: this['flat'].value,
            save_address: this['save_address'].value,
            payment: this['payment'].value,
        },
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function success(data) {
            if (data.status == 201) {
                console.log(data);
                $('#modalAuth #phoneAuth').val(data.data.phone);
                $('#modalReg').modal('toggle');
                $('#modalAuth').modal('show');
            }
        },
        error: function error(msg) {
            if (msg.status == 422) {
                let errors = msg.responseJSON.errors;
                $.each(errors, function(k, v){
                    $("input[name="+k+"]").addClass("is-invalid");
                    $("input[name="+k+"]").after('<div class="invalid-feedback">'+v+'</div>');
                });
            }
        }
    });*/
});




$('#showAllFilters').click(function(){
    $('.allFilters').removeClass('d-none');
});
$("#sbisProductCategoryForm").on("submit", function(e){
    e.preventDefault();
    let count = this["count"].value;
    let page  = this["page"].value;

    if(/^([0-9]\d*)$/.test(page) && /^(0|[1-9]\d*)$/.test(count)) {
        $.ajax({
            type: 'POST',
            url: '/admin/sbis/products-categories/'+page+"/"+count,
            dataType: 'json',
            data: {
                page: page,
                PageSize: count,
            },
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend(){
                $('form#sbisProductCategoryForm').after('<div class="mt-5 spinner-border text-info" role="status">\n' +
                    '  <span class="visually-hidden">...</span>\n' +
                    '</div>');
            },
            success: function success(data) {
                alert("Успешно");
                $('form#sbisProductCategoryForm + div').hide();
            },
            error: function error(msg) {
                alert("Ошибка!");
                console.log(msg);
                $('form#sbisProductCategoryForm + div').hide();
            }
        });
    } else {
        alert("Выберите количество товаров которые нужно обновить и страницу с которой нужно начать.");
    }
});


function shopChange(shopId, userId) {
    if(/^(0|[1-9]\d*)$/.test(shopId) && /^(0|[1-9]\d*)$/.test(shopId)) {
        $.post( "/api/v1/shop-change", { shopId: shopId, userId: userId }, function(data){
            console.log(data);
        } );
    }
}

function productToBasket(price, productId, userId) {
    if(/^(0|[1-9]\d*)$/.test(productId) && /^(0|[1-9]\d*)$/.test(userId)) {
        if(localStorage.getItem('userId')!=null) {
            userId = setUserIdStorage();
        }
        $.post( "/api/v1/product-to-basket", { price: price, productId: productId, userId: userId }, function(data){
            console.log(data);
            $('#countBasket').text(data.count);
            localStorage.setItem('basketCount', data.count);
            localStorage.setItem('sum', data.sum);
            localStorage.setItem('userId', data.userId);
            $('body').append('<div class="modal fade show" id="exampleModalLiveBasket" style="display: block;">\n' +
                '  <div class="modal-dialog">\n' +
                '    <div class="modal-content">\n' +
                '      <div class="modal-body" style="box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.5);">\n' +
                '        <p>Товар успешно добавлен в корзину!</p>\n' +
                '      </div>\n' +
                '    </div>\n' +
                '  </div>\n' +
                '</div>');
            setTimeout(function(){
                $('#exampleModalLiveBasket').remove();
            }, 2000)
        } );
    } else {
        alert("Что то пошло не так...");
    }
}
function setUserIdStorage() {
    return localStorage.getItem('userId');
}
$('#basketSelectAll').change(function() {
    let checkboxes = $(this).closest('form').find(':checkbox');
    checkboxes.prop('checked', $(this).is(':checked'));
});
function basketTrash(productId, userId) {
    if(userId==null){
        userId = setUserIdStorage();
    }
    $.post( "/api/v1/product-trash-basket", { productId: productId, userId: userId }, function(data){
        console.log(data);
        $('#countBasket').text(data.count);
        $('#h1-count').text(data.count);
        $('#basket-sum').text(data.sum);
        localStorage.setItem('basketCount', data.count);
        localStorage.setItem('sum', data.sum);
        localStorage.setItem('userId', data.userId);
    } );
    $('#product-'+productId).fadeOut();
    $('#product-'+productId).remove();
}
function basketCountProduct(e) {
    console.log(this.value);
}
function basketDeleteAll() {
    let productId = [];
    $('.basket_shop-items input:checkbox:checked').each(function() {
        productId.push($(this).val());
    });
    let userId = setUserIdStorage();
    $.post( "/api/v1/product-trash-basket-all", { productId: productId, userId: userId }, function(data){
        console.log(data);
        $('#countBasket').text(data.count);
        $('#h1-count').text(data.count);
        $('#basket-sum').text(data.sum);
        localStorage.setItem('basketCount', data.count);
        localStorage.setItem('sum', data.sum);
        localStorage.setItem('userId', data.userId);
    } );
    $.each(productId, function(k, v){
        $('#product-'+v).fadeOut();
        $('#product-'+v).remove();
    });
}


//console.log($.cookie('guestId'));
