let app = {

   init() {
      let c, currentScrollTop = 0,
         navbar = document.querySelector('nav')
      let sens = 0;
      window.addEventListener('scroll', function (e) {
         let a = $(window).scrollTop();
         let b = 140;
         currentScrollTop = a;

         if (c > currentScrollTop) {
            if (navbar.style.transitionDuration == "0.3s") {
               setTimeout(() => {
                  navbar.style.transitionDuration = "0s";
               }, 300);

            } else if (sens == 0) {
               navbar.style.transitionDuration = "0.3s"
            }
            navbar.style.transform = "translateY(" + currentScrollTop + "px)";
            sens = 1
         } else {
            navbar.style.transform = "translateY(0px)";
            if (navbar.style.transitionDuration == "0.3s") {
               setTimeout(() => {
               }, 300);

            }
            sens = 0
         }
         c = currentScrollTop;
      });
   },
}

setTimeout(() => {
   app.init()
}, 0)
