<footer id="footer" class="container">

</footer>

<script>
    const app = new Vue({
        el: '#app',
        data: {
            activeMenu: false,
            isScrolled: false,
        },
        created() {
            window.addEventListener('scroll', this.handleScroll);
        },
        destroyed() {
            window.removeEventListener('scroll', this.handleScroll);
        },
        methods: {
            handleScroll() {
                // Detecta se houve rolagem
                this.isScrolled = window.scrollY > 0;
            }
        }
    });
</script>


</div>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slider.js"></script>
<?php wp_footer(); ?>
</body>

</html>