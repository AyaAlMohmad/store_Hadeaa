

/***********************************
************************************
          PUBLIC JS
************************************
************************************/
// let navbarElement = document.getElementById("navbar");
// window.onscroll = function() {
//     if(window.scrollY > 100){
//         navbarElement.classList.add("sticky")
//     } 
// }



// Click on page header buttons to show the inner list
let headerBtns = document.querySelectorAll('.header-btn');

headerBtns.forEach(headerBtn => {
    headerBtn.onclick = (e) => {
        let btn = e.currentTarget;
        headerBtns.forEach(headerBtn => {
            headerBtn.classList.remove("active");
        })
        btn.classList.toggle("active");

    }
    // When the item lose focus 
    let headerBtnItem = headerBtn.closest(".header-btn-item");
    headerBtnItem.addEventListener('focusout', (event) => {
        if (headerBtnItem.contains(event.relatedTarget)) {
            // don't react to this
            return;
        }
        headerBtn.classList.remove("active");
    });


})

// Colors in the product to change the image according to the color
let productColors = document.querySelectorAll('.product-item-colors span');

productColors.forEach(productColor => {
    productColor.onmouseover = (e) => {
        let color = e.target.dataset['color'];
        let product = productColor.closest('.product-item');

        product.querySelectorAll(`.product-item-images img`).forEach(img => {
            img.classList.remove('active')
        })

        let images = product.querySelectorAll(`.product-item-images img[data-color='${color}']`);

        images.forEach(img => {
            img.classList.add('active')
        });

    }
})



/***********************************
************************************
            HOME PAGE
************************************
************************************/


/* HOME SLIDER */
$('.home-slider-items').owlCarousel({
    rtl: true,
    loop: false,
    responsiveClass: true,
    items: 1,
    nav: true,
    navText: ['<i class="fa fa-angle-right"></i>', '<i class="fa fa-angle-left"></i>'],
    mouseDrag: false,
    animateOut: 'fadeOut',
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true
})

/* CATEGORIES SLIDER */
$('.categories-slider').owlCarousel({
    rtl: true,
    loop: true,
    responsiveClass: true,
    items: 5,
    margin: 20,
    nav: true,
    dots: false,
    navText: ['<i class="fa fa-angle-right"></i>', '<i class="fa fa-angle-left"></i>'],
    mouseDrag: false,
    animateOut: 'fadeOut',
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true
});

/* SELLEST SLIDER */
$('.sellest-slider').owlCarousel({
    rtl: true,
    loop: true,
    responsiveClass: true,
    items: 5,
    margin: 40,
    nav: false,
    dots: false,
    mouseDrag: false,
    animateOut: 'fadeOut',
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true
})

/* PRODUCTS CAT SLIDER */
$('.products-cat-slider').owlCarousel({
    rtl: true,
    loop: true,
    responsiveClass: true,
    items: 4,
    nav: false,
    dots: false,
    mouseDrag: false,
    animateOut: 'fadeOut',
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true
})

/* LATEST PRODUCTS SLIDER */
$('.latest-slider').owlCarousel({
    rtl: true,
    loop: false,
    responsiveClass: true,
    items: 5,
    margin: 30,
    nav: true,
    navText: ['<i class="fa fa-angle-right"></i>', '<i class="fa fa-angle-left"></i>'],
    dots: false,
    mouseDrag: false,
    animateOut: 'fadeOut',
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true
})


/***********************************
************************************
         PRODUCT PAGE
************************************
************************************/

/* PRODUCT IMAGE SLIDER */
// $('.product-images-slider').owlCarousel({
//     items: 3,
//     loop: false,
//     mouseDrag: false,
//     touchDrag: false,
//     pullDrag: false,
//     rewind: true,
//     autoplay: true,
//     margin: 0,
//     nav: true,
//     dots: false
// })

