//Header buttons

$(document).on('click', '.menu-item-has-children', function (e) {
    if (window.innerWidth <= 880) {
        // let $this = $(e.currentTarget)
        if (this.offsetWidth*0.65 < e.offsetX) {
            e.preventDefault()
            $(this).children('.sub-menu.link__menu').slideToggle( 400 )
        }
    }
});

$( '.menu--treatment' ).click(function () {
    $( '.menu-item--treatment' ).fadeToggle( 400 );
});

//Mobile Header
$( '.button-open-menu' ).click( function () {
    $( this ).toggleClass( 'active' );

    // $( 'body' ).toggleClass( 'overflow-hidden' );
    // $( 'html' ).toggleClass( 'overflow-hidden' );
    $( '.nav' ).addClass( 'overflow-y' )

    $( '.container-for-mob-menu' ).slideToggle( 500 );
});

$( '.open-mob' ).click( function () {
    $( '.mobile__phones' ).slideToggle( 300 );
});
//

//Slider navigation

function openSideInfo(name) {
    $(name).siblings('.gallery-content').removeClass('show-gallery');
    $(name).addClass('show-gallery')
        .find('.slick-horizontal').slick('setPosition');//refresh position
}

$('.gallery__nav-item[data-click]').click(function () {

    $( this ).siblings().removeClass('active');
    $( this ).addClass( 'active' );

    openSideInfo($(this).data("click"));
});

//Slider Initialize

$( function () {
    $( '.slick-vertical' ).slick({
        vertical: true,
        verticalSwiping: true,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    vertical: false,
                    horizontal: true,
                    verticalSwiping: false,
                }
            },
        ]
    })
    $( '.slick-horizontal' ).slick({
        horizontal: true,
        slidesToShow: 8,
        adaptiveHeight: true,
        arrows: false,
        autoplaySpeed: 3500,
        responsive: [
            {
                breakpoint: 900,
                settings: {
                    focusOnSelect: true,
                    slidesToScroll: 1,
                    arrows: true,
                    slidesToShow: 2,
                    infinite:false
                }
            },
            {
                breakpoint: 601,
                settings: {
                    focusOnSelect: true,
                    slidesToScroll: 1,
                    arrows: true,
                    slidesToShow: 1,
                    infinite:false
                }
            }
        ]
    })
    $( '.slick-certificates' ).slick({
        // horizontal: true,
        slidesToShow: 3,
        adaptiveHeight: true,
        arrows: true,
        // dots: true,
        responsive: [
            {
                breakpoint: 900,
                settings: {
                    focusOnSelect: true,
                    slidesToScroll: 1,
                    arrows: false,
                    slidesToShow: 2,
                    infinite:false,
                    dots: true
                }
            },
            {
                breakpoint: 601,
                settings: {
                    focusOnSelect: true,
                    slidesToScroll: 1,
                    arrows: false,
                    slidesToShow: 1,
                    infinite:false,
                    dots: true
                }
            }
        ]
    })
});

//Move blocks on resize to mob
function resizeBlocks() {
    let width = $( window ).width();

    if (width < 880 && $('#move_nav-menu-mob #nav-menu-mob').length === 0) {
        $( "#nav-menu-mob" ).appendTo( "#move_nav-menu-mob" );

    } else if (width > 880 && $('#profile-menu-mob #nav-menu-mob').length === 0) {
        $( "#nav-menu-mob" ).appendTo( "#profile-menu-mob" );
    }

}

window.addEventListener('load', function () {
    resizeBlocks();
    $( window ).resize(function () {
        resizeBlocks();
    });
    // $('.gallery-content').fadeOut(10);
});

$(window).resize(function () {
    resizeBlocks()
});

//Content toggle
$( '.toggle-item__header' ).click( function () {
    if ($(event.target).hasClass('active')) {

    }
    if ( $(this).parent().find('.toggle-item__body').css('display')=='none' ) {
        $('.toggle-item__body' ).slideUp(400);
        $( '.toggle-item__header' ).removeClass( 'active' );

        $( this ).addClass( 'active' );
        $( this ).parent().find( '.toggle-item__body' ).slideDown(400);

    } else {

        $('.toggle-item__body' ).slideUp(400)
        $( '.toggle-item__header' ).removeClass( 'active' );
    }

});

let  header = document.getElementById("nav");
let  sticky = header.offsetTop - window.pageYOffset;
function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}
$(window).scroll(function () {
    $('body').scrollTop();
    myFunction()
});
$(document).on('click', '#toTop', function (e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, 350, 'swing');
})


//Pagination

$('.page-numbers').on('click', function () {
    if($(this).hasClass('active')) {
        event.preventDefault();
    } else {
        $('.page-numbers').removeClass('active');
        $(this).addClass('active');
    }
});

$(document).on('click', '#modal_contact_form', function () {

    if($('#modal_name').attr('data-required') == 'required' && $('#modal_name').val() == ''){
	    $('#modal_name').addClass('required-input');
    }
    else if($('#modal_phone').attr('data-required') == 'required' && $('#modal_phone').val() == ''){
	    $('#modal_phone').addClass('required-input');
    }
    else if($('#modal_phone').val().length < 19){
	    $('#modal_phone').addClass('required-input');
    }
    else{

	    let name = $('#modal_name'),
	        phone = $('#modal_phone');

        name.removeClass('required-input');
        phone.removeClass('required-input');

	    $.ajax({
	        type: "POST",
	        url: targetData.ajaxurl,
	        data: {
	            action: "contact_form",
	            name: name.val(),
	            phone: phone.val(),
	            location: location.href
	        },
	        success: function(status) {
	            console.log(status);
	            if (status) {
	            } else {
	            }

	            $('#modal_contact_form').hide();
	            $('#modal_contact_form_thank').show();

	            $(".thank-popup").addClass("thank-popup--open");
	            name.val('');
	            phone.val('');
	        },
	    });

    }
})

$(document).on('click', '#question_form', function () {
    let name = $('#question_name'),
        email = $('#question_email'),
        comment = $('#question_comment');

    $.ajax({
        type: "POST",
        url: targetData.ajaxurl,
        data: {
            action: "question_form",
            name: name.val(),
            email: email.val(),
            comment: comment.val(),
            location: location.href
        },
        success: function(status) {
            console.log(status);
            if (status) {
            } else {
            }

            name.val('');
            email.val('')
            comment.val('')
        },
    });
})


$(document).on('click', '#modalOrderForm .send-button', function () {

    i = 0;
	$( "#modalOrderForm input[data-required=required], #modalOrderForm textarea[data-required=required]" ).each(function( inp ) {
		if($(this).val() == "" || ($(this).hasClass('modal_phone') && $(this).val().length < 19)){
			$(this).addClass('required-input');
			i++;
		}
	});


    if(i == 0){

	    let name = $('#modalOrderForm .modal_name'),
	        phone = $('#modalOrderForm .modal_phone'),
	        date = $('#modalOrderForm .modal_date'),
	        message = $('#modalOrderForm .modal_message');


        $( "#modalOrderForm input[data-required=required], #modalOrderForm textarea[data-required=required]" ).each(function( inp ) {
			$(this).removeClass('required-input');
		});


	    $.ajax({
	        type: "POST",
	        url: targetData.ajaxurl,
	        data: {
	            action: "contact_form_order",
	            name: name.val(),
	            phone: phone.val(),
	            date: date.val(),
	            message: message.val(),
	            location: location.href
	        },
	        success: function(status) {
	            console.log(status);
	            if (status) {
	            } else {
	            }

	            $('#modalOrderForm .modal_contact_form').hide();
	            $('#modalOrderForm .modal_contact_form_thank').show();

	            $(".thank-popup").addClass("thank-popup--open");
	            name.val('');
	            phone.val('');
	            date.val('');
	            message.val('');
	        },
	    });
    }


})



$(document).on('click', '#modalHimioForm .send-button', function () {

    i = 0;
	$( "#modalHimioForm input[data-required=required], #modalHimioForm textarea[data-required=required]" ).each(function( inp ) {
		if($(this).val() == "" || ($(this).hasClass('modal_phone') && $(this).val().length < 19)){
			$(this).addClass('required-input');
			i++;
		}
	});


    if(i == 0){

	    let name = $('#modalHimioForm .modal_name'),
	        phone = $('#modalHimioForm .modal_phone'),
	        email = $('#modalHimioForm .modal_email'),
	        message = $('#modalHimioForm .modal_message');


        $( "#modalHimioForm input[data-required=required], #modalHimioForm textarea[data-required=required]" ).each(function( inp ) {
			$(this).removeClass('required-input');
		});


	    $.ajax({
	        type: "POST",
	        url: targetData.ajaxurl,
	        data: {
	            action: "contact_form_himio",
	            name: name.val(),
	            phone: phone.val(),
	            email: email.val(),
	            message: message.val(),
	            location: location.href
	        },
	        success: function(status) {
	            console.log(status);
	            if (status) {
	            } else {
	            }

	            $('#modalHimioForm .modal_contact_form').hide();
	            $('#modalHimioForm .modal_contact_form_thank').show();

	            $(".thank-popup").addClass("thank-popup--open");
	            name.val('');
	            phone.val('');
	            email.val('');
	            message.val('');
	        },
	    });
    }


})




$(document).on('click', '#modalCallbackFormCustom .send-button', function () {

    i = 0;
	$( "#modalCallbackFormCustom input[data-required=required], #modalCallbackFormCustom textarea[data-required=required]" ).each(function( inp ) {
		if($(this).val() == "" || ($(this).hasClass('modal_phone') && $(this).val().length < 19)){
			$(this).addClass('required-input');
			i++;
		}
	});


    if(i == 0){

	    let height = $('#modalCallbackFormCustom .modal_height'),
	        phone = $('#modalCallbackFormCustom .modal_phone'),
	        weight = $('#modalCallbackFormCustom .modal_weight'),
	        pils = $('#modalCallbackFormCustom .modal_pils');


        $( "#modalCallbackFormCustom input[data-required=required], #modalCallbackFormCustom textarea[data-required=required]" ).each(function( inp ) {
			$(this).removeClass('required-input');
		});

	    $.ajax({
	        type: "POST",
	        url: targetData.ajaxurl,
	        data: {
	            action: "contact_form_callback",
	            height: height.val(),
	            phone: phone.val(),
	            weight: weight.val(),
	            pils: pils.val(),
	            location: location.href
	        },
	        success: function(status) {
	            console.log(status);
	            if (status) {
	            } else {
	            }

	            $('#modalCallbackForm .modal_contact_form').hide();
	            $('#modalCallbackForm .modal_contact_form_thank').show();

	            $(".thank-popup").addClass("thank-popup--open");
	            height.val('');
	            phone.val('');
	            weight.val('');
	            pils.val('');
	        },
	    });
    }



})
