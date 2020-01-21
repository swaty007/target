//Header buttons

$( '.link--menu' ).click( function () {
    $( '.link__menu' ).slideToggle( 400 );
});

$( '.menu--treatment' ).click(function () {
    $( '.menu-item--treatment' ).fadeToggle( 400 );
});

//Mobile Header
$( '.button-open-menu' ).click( function () {
    $( this ).toggleClass( 'active' );

    $( 'body' ).toggleClass( 'overflow-hidden' );
    $( 'html' ).toggleClass( 'overflow-hidden' );
    $( '.nav' ).addClass( 'overflow-y' )

    $( '.container-for-mob-menu' ).slideToggle( 500 );
});

$( '.open-mob' ).click( function () {
    $( '.mobile__phones' ).slideToggle( 300 );
});
//

//Slider navigation

function openSideInfo(name) {
    $('.gallery-content').removeClass('show-gallery');
    $(name).addClass('show-gallery')
        .find('.slick-horizontal').slick('setPosition');//refresh position
}

$('.gallery__nav-item[data-click]').click(function () {

    $( '.gallery__nav-item' ).removeClass('active');
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
    });
    $( '.slick-horizontal' ).slick({
        horizontal: true,
        slidesToShow: 8,
        adaptiveHeight: true,
        arrows: false,
        responsive: [
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

    if (width < 880) {
        $( "#nav-menu-mob" ).appendTo( "#move_nav-menu-mob" );

    } else if (width > 880) {
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

        console.log($(this))

    } else {

        $('.toggle-item__body' ).slideUp(400)
        $( '.toggle-item__header' ).removeClass( 'active' );
    }

});