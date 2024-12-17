<footer id="footer">
    <div class="container">
        <div class="top">
            <a href="/" class="logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-header.webp"
                    alt="Logo Construtora Zimmermann">
            </a>
            <div class="content">
                <div class="menu">
                    <a href="#" aria-label="Local Matriz">Matriz</a>
                    <a href="#" aria-label="Filial São José">Filial São José</a>
                </div>
                <div class="menu">
                    <a href="mailto:contato@construtorazimmermann.com.br"
                        aria-label="Enviar e-mail para contato@construtorazimmermann.com.br">contato@construtorazimmermann.com.br</a>
                    <a href="https://wa.me/554732681000" target="_blank" rel="noopener noreferrer"
                        aria-label="Abrir WhatsApp para (47) 3268 1000">(47) 3268 1000</a>
                    <a href="https://wa.me/554832678543" target="_blank" rel="noopener noreferrer"
                        aria-label="Abrir WhatsApp para (48) 3267-8543">(48) 3267-8543</a>
                </div>
                <div class="menu">
                    <a href="https://g.co/kgs/XWHPduu" target="_blank" rel="noopener noreferrer"
                        aria-label="Abrir localização da Matriz no Google Maps">
                        R. 232, n 245 - Meia Praia, Itapema/SC 88220-000
                    </a>
                    <a href="https://g.co/kgs/Qr4Kh29" target="_blank" rel="noopener noreferrer"
                        aria-label="Abrir localização da Filial no Google Maps">
                        R. Ademar da Silva, n° 512 - Campinas, São José/SC 88101-001
                    </a>
                </div>
            </div>
        </div>
    </div>
    <p class="bottom">CONSTRUTORA ZIMMERMANN. TODOS OS DIREITOS RESERVADOS | DESENVOLVIDO POR <a
            href="https://blumewebstudio.com.br/" target="_blank">BLUME WEB STUDIO</a>.</p>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const items = document.querySelectorAll('.item');

        items.forEach(function (item) {
            const percentage = parseFloat(item.querySelector('p').textContent.replace('%', '').trim());
            const circle = item.querySelector('.circle-fg');
            const circumference = 2 * Math.PI * circle.r.baseVal.value;
            const offset = circumference - (percentage / 100) * circumference;

            circle.style.strokeDashoffset = offset;
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('search-form');
        const searchInput = document.getElementById('search-input');
        const searchButton = form.querySelector('.search-icon');

        searchInput.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                form.submit();
            }
        });

        searchButton.addEventListener('click', function (event) {
            event.preventDefault();
            form.submit();
        });
    });


    const app = new Vue({
        el: '#app',
        data() {
            return {
                activeMenu: false,
                isScrolled: false,
                isCounterAnimated: false,
                counters: [{
                    target: 10,
                    current: 0,
                    sign: '',
                    text: 'Prêmios de Arquitetura e Design Inovador'
                },
                {
                    target: 12,
                    current: 0,
                    sign: '+',
                    text: 'de Excelência no Mercado Imobiliário'
                },
                {
                    target: 60,
                    current: 0,
                    sign: '+',
                    text: 'Empreendimentos de Alto Padrão Entregues'
                },
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