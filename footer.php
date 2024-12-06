<footer id="footer" class="container">

</footer>

<script>
    const app = new Vue({
        el: '#app',
        data() {
            return {
                activeMenu: false,
                isScrolled: false,
                isCounterAnimated: false,
                counters: [
                    { target: 10, current: 0, sign: '', text: 'Prêmios de Arquitetura e Design Inovador' },
                    { target: 12, current: 0, sign: '+', text: 'de Excelência no Mercado Imobiliário' },
                    { target: 60, current: 0, sign: '+', text: 'Empreendimentos de Alto Padrão Entregues' },
                ],
            };
        },
        created() {
            window.addEventListener('scroll', this.handleScroll);
        },
        unmounted() {
            window.removeEventListener('scroll', this.handleScroll);
        },
        methods: {
            handleScroll() {
                this.isScrolled = window.scrollY > 0;
            },
            observeCounters() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting && !this.isCounterAnimated) {
                            this.animateCounters();
                            this.isCounterAnimated = true;
                            observer.disconnect();
                        }
                    });
                });

                const target = document.querySelector(".counter");
                if (target) observer.observe(target);
            },
            animateCounters() {
                this.counters.forEach((counter) => {
                    const increment = counter.target / 100;
                    let start = 0;

                    const interval = setInterval(() => {
                        start += increment;
                        if (start >= counter.target) {
                            counter.current = counter.target;
                            clearInterval(interval);
                        } else {
                            counter.current = Math.floor(start);
                        }
                    }, 20);
                });
            },
        },
        mounted() {
            this.handleScroll();
            this.observeCounters();
        },
    });
</script>

</div>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slider.js"></script>
<?php wp_footer(); ?>
</body>

</html>