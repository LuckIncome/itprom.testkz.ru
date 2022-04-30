Vue.component('slider', {
	data() {
		return {
			width: null,
			valueCarousel: 0,
			carousel: {
				container: 100,
				items: null,
				itemShow: 3,
				speed: .5,
				start: null,
				end: null,
				shift: null
			}
		}
	},
	methods: {
		arrowsLeft() {
			if (Number(this.carousel.start) - Number(this.carousel.shift) >= 0) {
				this.valueCarousel = this.carousel.start -= this.carousel.shift
			} else {
				this.valueCarousel = this.carousel.start = 0
			}
		},
		arrowsRight() {
			if (Number(this.carousel.start) + Number(this.carousel.shift) > this.carousel.end) {
				this.valueCarousel = this.carousel.start = this.carousel.end
			} else if (this.carousel.start < this.carousel.end) {
				this.valueCarousel = this.carousel.start = Number(this.carousel.start) + Number(this.carousel.shift)
			}
		},
		carouselEnd() {
			this.carousel.end = (this.carousel.items - this.carousel.itemShow) * (this.carousel.container / this.carousel.itemShow)
		},
		carouselShift() {
			this.carousel.shift = this.carousel.container / this.carousel.itemShow
		},
		total() {
			this.carousel.start = this.valueCarousel
		},
		setValueTabs(value) {
			if (this.valueTabs !== value) {
				this.valueTabs = value
			}
		},
		updateWidth() {
			this.width = window.innerWidth;
		},
	},
	watch: {
		valueCarousel() {
			this.total()
		},
		width() {
			if (this.width <= 992) {
				this.carousel.itemShow = 2.5
				this.carouselEnd()
				this.carouselShift()
			}
			if (this.width <= 768) {
				this.carousel.itemShow = 1.5
				this.carouselEnd()
				this.carouselShift()
			}
			if (this.width <= 576) {
				this.carousel.itemShow = 1
				this.carouselEnd()
				this.carouselShift()
			}
		}
	},
	created() {
		window.addEventListener('resize', this.updateWidth);
	},
	mounted() {
		this.updateWidth()
		if (this.$refs.carouselItems) {
			this.carousel.items = this.$refs.carouselItems.children.length
		}
		this.carouselEnd()
		this.carouselShift()
	}
})