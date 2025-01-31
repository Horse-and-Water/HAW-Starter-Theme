// File for custom scripts

// Wait for document load
document.addEventListener("DOMContentLoaded", function() {	

    // To let you know you're loading this file
    alert('You activated the custom.js file - delete this line to get rid of this annoying message');

    // EXAMPLE GLIDE SETUP - Find and set up sliders if their wrapper exists on the page
    // let blogSlider = document.getElementsByClassName('blog-glide');
      
    // if (blogSlider.length > 0) {
    //     new Glide('.blog-glide', {
    //         type: 'carousel',
    //         perView: 3,
    //         gap: 30,
    //         breakpoints:{
    //             1000: {
    //               perView: 2
    //             },
    //             650: {
    //                 perView: 1
    //             }
    //         }
    //     }).mount();
    // }

    // EXAMPLE/TEST FOR RELLAX.js
    // const parallaxElements = document.getElementsByClassName('sb-rellax');

    // if (parallaxElements.length > 0) {
    //     var rellax = new Rellax('.sb-rellax', {
	// 		breakpoints:[576, 782, 1200]
	// 	});
    // }

});