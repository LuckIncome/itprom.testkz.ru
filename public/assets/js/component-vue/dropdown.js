Vue.component('dropdown', {
    data() {
		return {
            isShow: false
        }
    },
    methods: {
        dropdownToggle() {
            this.isShow = !this.isShow
        }
    }
})