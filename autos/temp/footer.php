</main>
        <footer class="mt-0 text-warning py-1 text-center border border-4 border-success" style="letter-spacing: 01vw;background-color:#0A5290;font-weight: bold;">
            <!-- place footer here -->
            <span class="fluid" id="textFooter">
                <h4 class="" style="">Marcas Autorizadas</h4>
            </span>
            <span class="border border-2 border-dark" id="footerOne" style="">
                    <marquee behavior="" direction="">
                        <img src="https://images.playground.com/6b3f06a9bbcb4114a9433f332f127057.jpeg" alt="" class="img">
                    </marquee>
                    <marquee behavior="" direction="">
                        <img src="https://1.bp.blogspot.com/-G85ndCjObcE/UNmzWjCiSYI/AAAAAAAAGyw/2cH7SMCdQX0/s1600/Mitsubishi+Logo+2.jpg" alt="" class="img">
                    </marquee>
                    <marquee behavior="" direction="">
                        <img src="https://images.playground.com/4f362605f3be41d7b2d8d421f514cacf.jpeg" alt="" class="img">
                    </marquee>
                    <marquee behavior="" direction="">
                        <img src="https://tse2.explicit.bing.net/th?id=OIP.7xWJkTEMjrr5gVslBPdaHQHaFj&pid=Api&P=0&h=180" alt="" class="img">
                    </marquee>
                    <marquee behavior="" direction="">
                        <img src="https://static.vecteezy.com/system/resources/previews/019/136/341/non_2x/audi-logo-audi-icon-free-free-vector.jpg" alt="" class="img">
                    </marquee>
                    <marquee behavior="" direction="">
                        <img src="http://img3.wikia.nocookie.net/__cb20100627185703/logopedia/images/a/ae/Kia_logo.png" alt="" class="img">
                    </marquee>
                    <marquee behavior="" direction="">
                        <img src="https://wallpapercave.com/wp/wp3072191.jpg" alt="" class="img">
                    </marquee>
                </span>
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script>
            $(document).ready(function() {
                $('#miTabla').DataTable({
                    pageLength:50,
                    lengthMenu :[
                    [3,5,10,50,100],
                    [3,5,10,50,100]
                ],
                        language:{
                            url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json",
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#miTablaTwo').DataTable({
                    pageLength:50,
                    lengthMenu :[
                    [3,5,10,50,100],
                    [3,5,10,50,100]
                ],
                        language:{
                            url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json",
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#tabla_provedores').DataTable({
                    pageLength:50,
                    lengthMenu :[
                    [3,5,10,50,100],
                    [3,5,10,50,100]
                ],
                        language:{
                            url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json",
                    }
                });
            });
        </script>
    </body>
</html>
