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
    })
    $( '.slick-horizontal' ).slick({
        horizontal: true,
        slidesToShow: 8,
        adaptiveHeight: true,
        arrows: false,
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
    let name = $('#modal_name'),
        phone = $('#modal_phone');

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
            $(".thank-popup").addClass("thank-popup--open");
            name.val('');
            phone.val('')
        },
    });
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