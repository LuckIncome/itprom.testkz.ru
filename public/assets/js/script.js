new Vue({
    el: '#app',
    data() {
        return {
            isSearch: false,
            isSearchSolo: false,
            isWrapper: false,
            isMenu: false,
            isSidebar: false,
            menuTabValue: 1,
        }
    },
    methods: {
        toggleSearch() {
            this.isSearch = !this.isSearch
            this.isSearchSolo = !this.isSearchSolo
            this.isWrapper = !this.isWrapper
            this.scrollBlock()
        },
        toggleWrapper() {
            this.isSearch = false
            this.isSearchSolo = false
            this.isWrapper = false
            this.isMenu = false
            this.isSidebar = false
            this.scrollBlock()
        },
        toggleMenu() {
            this.isSearch = !this.isSearch
            this.isWrapper = !this.isWrapper
            this.isMenu = !this.isMenu
            this.isSidebar = !this.isSidebar
            this.scrollBlock()
        },
        toggleMenuTab(value) {
            if (this.menuTabValue !== value) {
                this.menuTabValue = value
            }
        },
        scrollBlock() {
            if (this.isSearch || this.isWrapper || this.isMenu || this.isSidebar) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflowY = 'auto';
            }
        },
    }
})


let lastScroll = 0;
const defaultOffset = 100;
const header = document.querySelector('.header');

const scrollPosition = () => window.pageYOffset || document.documentElement.scrollTop;
const containHide = () => header.classList.contains('hide');

window.addEventListener('scroll', () => {
    if (scrollPosition() > lastScroll && !containHide() && scrollPosition() > defaultOffset) {
        header.classList.add('header__wrapper');
    }
    else if (scrollPosition() < 100) {
        header.classList.remove('header__wrapper');
    }
    if (scrollPosition() > lastScroll && !containHide() && scrollPosition() > defaultOffset) {
        header.classList.add('hide');
    }
    else if (scrollPosition() < lastScroll && containHide()) {
        header.classList.remove('hide');
    }
    lastScroll = scrollPosition();
})


let modal = document.querySelector('#modal');
let themeButton = document.querySelector('#modal__close');

themeButton.onclick = function() {
  modal.classList.toggle('modal__show');
};

function backToTop() {
    if (window.pageYOffset > 0) {
        window.scrollBy(0, -80);setTimeout(backToTop, 0);
    }
}

obt1 = new Vivus('obturateur1', {type: 'delayed', duration: 150});


