
</main>
        <footer class="mt-0 text-warning py-4 text-center border border-4 border-success" style="letter-spacing: 01vw;background-color:#0A5290;font-weight: bold;">
            <!-- place footer here -->
            <span class="fluid" id="textFooter">
                <h4 class="" style="">FOOTER</h4>
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
    </body>
</html>
