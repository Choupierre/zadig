let app = {

   allLi: null,
   outlineLine: null,
   activeLink: {},

   init() {
      this.allLi = document.querySelectorAll('.navbar-nav .nav-item a.nav-link')
      this.outlineLine = document.querySelector('.outline_active')
      this.outlinePlace()
      this.outlineHover()
      window.addEventListener("resize", (event) => {
         this.outlinePlace()
      })     
   },

   outlinePlace() {    
      let activeLink = document.querySelector('.navbar-nav .nav-item.active .nav-link')
      this.activeLink.width = (activeLink) ? '2em' : 0
      this.activeLink.left = (activeLink) ? 'calc(' + (activeLink.offsetLeft + activeLink.offsetWidth/2) + 'px - 1em)'  : 0
      this.activeLinkUpdate()
   },

   outlineHover() {
      this.allLi.forEach(singleLi => {
         singleLi.addEventListener("mouseover", (event) => {
            let hover_link = event.currentTarget
            if (hover_link) {
               let element = {
                  width: '2em',
                  left: 'calc(' + (hover_link.offsetLeft + hover_link.offsetWidth/2) + 'px - 1em)'
               }
               this.activeLinkUpdate(element)
            }
         }, false);
         singleLi.addEventListener("mouseout", (event) => {
            this.activeLinkUpdate()
         }, false);
      })
   },

   activeLinkUpdate(element = this.activeLink) {
      this.outlineLine.style.width = element.width
      this.outlineLine.style.left = element.left
   }
}



setTimeout(() => {
   app.init()
}, 0)
